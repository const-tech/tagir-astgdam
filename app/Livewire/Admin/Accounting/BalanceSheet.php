<?php

namespace App\Livewire\Admin\Accounting;

use App\Models\Account;
use Livewire\Component;

class BalanceSheet extends Component
{
    public $from, $to;

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
        $assets = Account::with(['accounts' => function ($query) {
            $query->whereHas('voucher', function ($query) {
                $this->between($query);
            });
        }])->where('type', 'asset')->get();

        $liabilities = Account::with(['accounts' => function ($query) {
            $query->whereHas('voucher', function ($query) {
                $this->between($query);
            });
        }])->where('type', 'liability')->get();

        $equities = Account::with(['accounts' => function ($query) {
            $query->whereHas('voucher', function ($query) {
                $this->between($query);
            });
        }])->where('type', 'equity')->get();

        $totalAssets = $assets->sum(function ($account) {
            $totalDebit = $account->accounts->sum('debit');
            $totalCredit = $account->accounts->sum('credit');
            return $totalDebit - $totalCredit;
        });

        $totalLiabilities = $liabilities->sum(function ($account) {
            $totalDebit = $account->accounts->sum('debit');
            $totalCredit = $account->accounts->sum('credit');
            return $totalCredit - $totalDebit;
        });

        $totalEquities = $equities->sum(function ($account) {
            $totalDebit = $account->accounts->sum('debit');
            $totalCredit = $account->accounts->sum('credit');
            return $totalCredit - $totalDebit;
        });

        return view('livewire.admin.accounting.balance-sheet', get_defined_vars())->extends('admin.layouts.admin')->section('content');
    }
}
