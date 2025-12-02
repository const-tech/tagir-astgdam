<?php

namespace App\Livewire\Admin\Accounting;

use App\Models\Account;
use Livewire\Component;

class AccountsSettings extends Component
{
    public $items = [
        ['name' => 'حساب العملاء', 'model' => 'clients_account_id'],

        ['name' => 'حساب الموردين', 'model' => 'suppliers_account_id'],

        ['name' => 'حساب الموظفين', 'model' => 'employees_account_id'],

        ['name' => 'حساب المخازن', 'model' => 'stores_account_id'],

        ['name' => 'حساب الإيرادات', 'model' => 'revenue_account_id'],

        ['name' => 'حساب ضريبة المبيعات', 'model' => 'sales_tax_account_id'],

        ['name' => 'حساب ضريبة المشتريات', 'model' => 'purchases_tax_account_id'],
    ];

    public  $clients_account_id, $suppliers_account_id, $employees_account_id, $stores_account_id, $revenue_account_id, $sales_tax_account_id, $purchases_tax_account_id;

    public $rules = [
        'sales_tax_account_id' => 'nullable',
        'purchases_tax_account_id' => 'nullable',
        'revenue_account_id' => 'nullable',
        'stores_account_id' => 'nullable',
        'employees_account_id' => 'nullable',
        'suppliers_account_id' => 'nullable',
        'clients_account_id' => 'nullable',
    ];

    public function render()
    {
        $accounts = Account::all();
        return view('livewire.admin.accounting.accounts-settings', compact('accounts'))->extends('admin.layouts.admin')->section('content');
    }

    public function mount()
    {
        $this->setScreenData();
    }

    public function setScreenData()
    {
        $keys = array_keys($this->rules);
        foreach ($keys as $item) {
            $this->{$item} = setting($item);
        }
    }

    public function save($model, $value)
    {
        setting([$model => $value])->save();
        session()->flash('success', 'تم الحفظ بنجاح');
    }
}
