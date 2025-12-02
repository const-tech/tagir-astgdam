<?php

namespace App\Livewire\Admin\Accounting;

use App\Imports\AccountImport;
use App\Models\Account;
use Livewire\Component;
use App\Traits\livewireResource;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use misterspelik\LaravelPdf\Facades\Pdf;

class Accounts extends Component
{
    use livewireResource;

    public $parent_name, $parent_id, $account_no, $name, $balance_type, $account, $account_data, $file, $account_item, $search, $type, $opening_balance, $opening_balance_type;

    protected function rules()
    {
        return [
            'name' => 'required|max:191',
            'parent_id' => 'nullable',
            'balance_type' => 'required|in:credit,debit',
            'type' => 'nullable',
            'opening_balance' => 'nullable|numeric',
            'opening_balance_type' => 'nullable',
            'account_no' => 'required|unique:accounts,account_no,' . $this->account?->id,
        ];
    }

    public function render()
    {
        $sidebarAssets = Account::whereNull('parent_id')->orderByRaw('CAST(account_no AS UNSIGNED)')->get();
        $all_accounts = Account::all();

        $this->account_item = Account::where('name', $this->search)->orWhere('account_no', $this->search)->first();
        return view('livewire.admin.accounting.accounts', compact('sidebarAssets', 'all_accounts'))->extends('admin.layouts.admin')->section('content');
    }

    public function edit(Account $account)
    {
        $this->skipRender();

        if (!auth()->user()->can('update_accounts')) {
            session()->flash('error', 'عفوا ليس لديك صلاحية للتعديل');
            return;
        }

        $array = array_keys($this->rules());
        foreach ($array as $key) {
            $this->$key = $account->$key;
        }
        $this->account = $account;
    }

    public function chooseAccount($account_id)
    {
        $this->skipRender();

        if (!auth()->user()->can('create_accounts')) {
            session()->flash('error', 'عفوا ليس لديك صلاحية لاضافة حساب');
            return;
        }

        $this->name = '';
        if ($account_id) {
            $account = Account::find($account_id);
            $this->parent_name = $account->name;
            $this->parent_id = $account->id;
            $this->balance_type = $account->balance_type;
            $this->type = $account->type;
            $this->account_no = $this->generateNextChildAccount($account->account_no, $account->subAssets()->pluck('account_no')->toArray());
        } else {
            $this->parent_name = '';
            $this->parent_id = '';
            $this->balance_type = '';
            $this->type = '';
        }
    }

    public function generateNextChildAccount($parentAccountNumber, $existingChildAccounts = [])
    {
        $maxChildNumber = 0;
        foreach ($existingChildAccounts as $childAccount) {
            if (strpos($childAccount, $parentAccountNumber) === 0) {
                $childSuffix = intval(substr($childAccount, strlen($parentAccountNumber)));
                if ($childSuffix > $maxChildNumber) {
                    $maxChildNumber = $childSuffix;
                }
            }
        }

        $nextChildNumber = $maxChildNumber + 1;

        $newChildAccountNumber = $parentAccountNumber . $nextChildNumber;

        return $newChildAccountNumber;
    }

    public function updatedParentId()
    {
        $parent = Account::find($this->parent_id);
        $this->type = $parent->type;
        $this->balance_type = $parent->balance_type;
        $this->account_no = $this->generateNextChildAccount($parent->account_no, $parent->subAssets()->pluck('account_no')->toArray());
    }

    public function beforeDelete($model)
    {
        if ($model->vouchersAccounts()->count()) {
            session()->flash('error', 'لا يمكن حذف حساب بداخلة عمليات برجاء حذف العمليات اولا قبل الحذف');
            return back();
        }
    }

    public function save()
    {
        $data = $this->validate();

        try {
            DB::beginTransaction();
            if (!$this->parent_id) {
                $data['parent_id'] = null;
            }

            if ($data['balance_type'] == '') {
                $data['balance_type'] = null;
            }

            if ($data['opening_balance_type'] == '') {
                $data['opening_balance_type'] = null;
            }

            if ($this->account) {
                $this->account->update($data);
            } else {
                Account::create($data);
            }

            DB::commit();

            $this->reset();
            session()->flash('success', 'تم حفظ البيانات بنجاح');
        } catch (\Exception $ex) {
            DB::rollback();
            session()->flash('error', $ex->getMessage());
            return;
        }
    }


    public function itemId(Account $account)
    {
        $this->skipRender();

        if (!auth()->user()->can('delete_accounts')) {
            session()->flash('error', 'عفوا ليس لديك صلاحية لحذف حساب');
            return;
        }

        $this->account_data = $account;
    }

    public function delete()
    {
        $this->account_data->delete();
        $this->reset();
        session()->flash('success', 'تم حذف البيانات بنجاح');
    }

    public function import()
    {
        $this->validate(['file' => 'required|mimes:xlx,xlsx']);
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Account::truncate();
        Excel::import(new AccountImport, $this->file);
        $this->reset();
        session()->flash('success', 'تم استيراد البيانات بنجاح');
    }

    public function print()
    {
        $accounts = Account::whereNull('parent_id')->get();

        $data = [
            'accounts' => $accounts,
        ];

        $pdf = Pdf::loadView('pdf.accounts_tree', $data);

        $pdf_name = 'accounts_' . date('Y_m_d') . '.pdf';
        $pdf->save(public_path('pdf/' . $pdf_name));

        return  response()->download(public_path('pdf/' . $pdf_name))->deleteFileAfterSend(true);
    }
}
