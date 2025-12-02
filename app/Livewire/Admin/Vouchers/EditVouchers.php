<?php

namespace App\Livewire\Admin\Vouchers;

use App\Models\Account;
use App\Models\CostCenter;
use App\Models\Voucher;
use App\Models\VoucherAccount;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class EditVouchers extends Component
{
    public  $date, $description, $vouchers = [];

    public $total_credit, $total_debit;

    public $voucher = null;

    protected $listeners = [
        'voucherAdded' => 'afterVoucherAdded',
    ];

    public function rules(): array
    {
        return [
            'description' => 'required',
            'date' => 'required|date',
            'vouchers.*.account_id' => 'required',
            'vouchers.*.cost_center_id' => 'nullable',
            'vouchers.*.credit' => 'required_if:vouchers.*.debit,0|numeric',
            'vouchers.*.debit' => 'required_if:vouchers.*.credit,0|numeric',
            'vouchers.*.description' => 'required',
        ];
    }

    public function render()
    {
        $accounts = Account::all();
        $cost_centers = CostCenter::all();
        $this->dispatch('pharaonic.select2.init');
        return view('livewire.admin.vouchers.form', compact('accounts', 'cost_centers'))->extends('admin.layouts.admin')->section('content');
    }

    public function mount(Voucher $voucher)
    {
        $this->voucher = $voucher;
        $this->description = $voucher->description;
        $this->date = $voucher->date;
        $this->vouchers = $voucher->accounts()->get()->toArray();
        $this->computeAll();
    }

    public function addVoucher()
    {
        $this->vouchers[] = [
            'account_id' => '',
            'cost_center_id' => '',
            'credit' => '',
            'debit' => '',
            'description' => '',
            'centers' => '',

        ];
        $this->computeAll();

        $this->dispatch('voucherAdded');
    }

    public function afterVoucherAdded()
    {
        $this->dispatch('pharaonic.select2.init');
    }

    public function removeVoucher($index)
    {
        $this->total_debit -= (float)$this->vouchers[$index]['debit'];
        $this->total_credit -= (float)$this->vouchers[$index]['credit'];
        unset($this->vouchers[$index]);
        $this->vouchers = array_values($this->vouchers);
    }

    public function computeAll()
    {
        $this->total_credit = array_reduce($this->vouchers, function ($carry, $item) {
            $carry += doubleval($item['credit'] ? $item['credit'] : 0);
            return $carry;
        });
        $this->total_debit = array_reduce($this->vouchers, function ($carry, $item) {
            $carry += doubleval($item['debit'] ? $item['debit'] : 0);
            return $carry;
        });
    }

    public function save()
    {
        $data = $this->validate();
        $voucher = $this->voucher;

        $this->computeAll();

        try {
            DB::beginTransaction();
            $epsilon = 1e-6;

            if (abs($this->total_credit - $this->total_debit) > $epsilon) {
                session()->flash('error', 'يوجد خطأ في البيانات المدخلة');
                return back();
            }

            unset($data['vouchers']);

            $data['last_update'] = auth()->user()->id;

            $voucher->update($data);
            $voucher->accounts()->delete();

            foreach ($this->vouchers as $index => $item) {
                if ($item['credit'] == 0 && $item['debit'] == 0) {
                    session()->flash('error', 'يجب تحديد قيمة في الدائن أو المدين في الصف ' . $index + 1);
                    return back();
                }
                VoucherAccount::create([
                    'voucher_id' => $voucher->id,
                    'account_id' => $item['account_id'],
                    'cost_center_id' => isset($item['cost_center_id']) && $item['cost_center_id'] != '' ? $item['cost_center_id'] : null,
                    'credit' => isset($item['credit']) && $item['credit'] != '' ? $item['credit'] : 0,
                    'debit' => isset($item['debit']) && $item['debit'] != '' ? $item['debit'] : 0,
                    'description' => $item['description'],
                ]);
            }

            DB::commit();

            return redirect()->route('admin.vouchers.index')->with('success', 'تم حفظ البيانات بنجاح');
        } catch (\Exception $ex) {
            DB::rollback();
            session()->flash('error', $ex->getMessage());
            return;
        }
    }
}
