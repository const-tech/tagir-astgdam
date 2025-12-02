<?php

namespace App\Livewire\Admin\Accounting;

use App\Models\Account;
use Livewire\Component;

class TrialBalance extends Component
{
    public $date, $from, $to;

    public function render()
    {
        $accounts = Account::parents();

        return view('livewire.admin.accounting.trial-balance', compact('accounts'))->extends('admin.layouts.admin')->section('content');
    }
}
