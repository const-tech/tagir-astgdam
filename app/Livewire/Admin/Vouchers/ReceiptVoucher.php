<?php

namespace App\Livewire\Admin\Vouchers;

use App\Models\Account;
use App\Models\PaymentMethod;
use App\Models\Voucher;
use App\Models\VoucherAccount;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ReceiptVoucher extends Component
{
    public  $account_id, $date, $description, $amount, $type, $payment_method;

    public function render()
    {
        $accounts = Account::all();
        $payment_methods = PaymentMethod::all();
        return view('livewire.admin.vouchers.receipt-voucher', compact('accounts', 'payment_methods'))->extends('admin.layouts.admin')->section('content');
    }

    public function mount()
    {
        $this->date = date('Y-m-d');
        $this->type = 'receipt';
    }

    public function save()
    {
        $data = $this->validate([
            'account_id' => 'required',
            'date' => 'required|date',
            'description' => 'required',
            'amount' => 'required|numeric|gt:0',
            'type' => 'required',
            'payment_method' => 'required',
        ]);

        try {
            DB::beginTransaction();
 
            $voucher = Voucher::create($data);

            VoucherAccount::create([
                'voucher_id' => $voucher->id,
                'account_id' => $this->account_id,
                'credit' => $this->amount,
                'debit' => 0,
                'description' => $voucher->description,
            ]);

            VoucherAccount::create([
                'voucher_id' => $voucher->id,
                'account_id' => $this->payment_method,
                'credit' => 0,
                'debit' => $this->amount,
                'description' => $voucher->description,
            ]);

            DB::commit();

            return redirect()->route('admin.vouchers.index')->with('success', 'تم حفظ البيانات بنجاح');
        } catch (\Exception $ex) {
            DB::rollback();
            session()->flash('error', $ex->getMessage());
            return;
        }
    }
}
