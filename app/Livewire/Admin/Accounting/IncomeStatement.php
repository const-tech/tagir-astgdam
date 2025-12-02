<?php

namespace App\Livewire\Admin\Accounting;

use App\Models\Account;
use App\Models\VoucherAccount;
use Livewire\Component;

class IncomeStatement extends Component
{
    public $from, $to, $level = 1;

    public function between($query)
    {
        if ($this->from && $this->to) {
            $query->whereBetween('date', [$this->from, $this->to]);
        } elseif ($this->from) {
            $query->where('date', '>=', $this->from);
        } elseif ($this->to) {
            $query->where('date', '<=', $this->to);
        } else {
            $query;
        }
    }

    public function render()
    {
        $accounts = Account::whereIn('account_no', [3, 4])->whereNull('parent_id')->get();

        $revenues = VoucherAccount::whereHas('voucher', function ($query) {
            $this->between($query);
        })->whereHas('account', function ($query) {
            $query->where('type', 'revenue');
        })->sum('credit');

        $expenses = VoucherAccount::whereHas('voucher', function ($query) {
            $this->between($query);
        })->whereHas('account', function ($query) {
            $query->where('type', 'expenses');
        })->sum('debit');

        $net_profit = $revenues - $expenses;

        return view('livewire.admin.accounting.income-statement', get_defined_vars())->extends('admin.layouts.admin')->section('content');
    }
}
