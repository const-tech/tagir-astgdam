<?php

namespace App\Livewire\Admin\Accounting;

use App\Models\Account;
use App\Models\VoucherAccount;
use Livewire\Component;
use Livewire\WithPagination;

class ShowAccounts extends Component
{
    use WithPagination;

    public $account, $from, $to, $search, $voucher_id, $array_of_accounts = [], $perPage = 30, $loadAmount = 10, $currentPage = 1, $pageRange = 5, $opening_balance = 0;

    public function mount(Account $account)
    {
        $this->account = $account;
    }

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
        if ($this->account->subAssets()->count() > 0) {
            foreach ($this->account->subAssets as $key => $asset) {
                $this->array_of_accounts[] += $asset->id;
                if ($asset->subAssets->isNotEmpty()) {
                    $this->renderedNestedAccounts($asset->subAssets);
                }
            }
        } else {
            $this->array_of_accounts[] += $this->account->id;
        }

        $this->opening_balance = 0;
        if ($this->from) {
            $opening_voucher_accounts = VoucherAccount::whereIn('account_id', $this->array_of_accounts)
                ->whereHas('voucher', function ($query) {
                    $query->where('date', '<', $this->from);
                })->get();

            foreach ($opening_voucher_accounts as $item) {
                if ($this->account->balance_type == 'debit') {
                    $this->opening_balance += $item->debit - $item->credit;
                } else {
                    $this->opening_balance += $item->credit - $item->debit;
                }
            }
        }

        $voucher_accounts = VoucherAccount::whereIn('account_id', $this->array_of_accounts)->when($this->search, function ($q) {
            $q->where('description', 'LIKE', "%$this->search%");
        })->when($this->voucher_id, function ($q) {
            $q->where('voucher_id', 'LIKE', "%$this->voucher_id%");
        })->where(function ($q) {
            $q->whereHas('voucher', function ($query) {
                $this->between($query);
            });
        })->orderBy('voucher_id', 'asc')->take($this->currentPage * $this->perPage)->get();


        $all_voucher_accounts = VoucherAccount::whereIn('account_id', $this->array_of_accounts)->where(function ($q) {
            $q->whereHas('voucher', function ($query) {
                $this->between($query);
            });
        });

        $totalItems =  $all_voucher_accounts->count();
        $lastPage = ceil($totalItems  / $this->perPage);

        $startPage = max($this->currentPage - $this->pageRange, 1);
        $endPage = min($this->currentPage + $this->pageRange, $lastPage);

        return view('livewire.admin.accounting.show-accounts', get_defined_vars())->extends('admin.layouts.admin')->section('content');
    }

    public function loadMore($page)
    {
        $this->currentPage = $page;
    }

    public function renderedNestedAccounts($assets)
    {
        foreach ($assets as $key => $asset) {
            $this->array_of_accounts[] += $asset->id;

            if ($asset->subAssets->isNotEmpty()) {
                $this->renderedNestedAccounts($asset->subAssets);
            }
        }
    }
}
