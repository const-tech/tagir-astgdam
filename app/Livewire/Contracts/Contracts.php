<?php

namespace App\Livewire\Contracts;

use App\Models\Contract;
use Livewire\Component;
use Livewire\WithPagination;

class Contracts extends Component
{
    use WithPagination;
    public $search, $filter_expire;
    public $client_id;
    public $queryString = ['client_id'];
    // public function render()
    // {
    //     $contracts = Contract::where(function ($q) {

    //         if ($this->search) {
    //             $q->where('contract_number', $this->search)->orWhere('id', $this->search);
    //         }
    //         if ($this->filter_expire) {
    //             if ($this->filter_expire == 'active') {
    //                 $q->where('contract_end_at', '>=', now());
    //             }
    //             if ($this->filter_expire == 'inactive') {
    //                 $q->where('contract_end_at', '<', now());
    //             }
    //         }
    //     })->latest()->paginate(10);
    //     return view('livewire.contracts.contracts', compact('contracts'));
    // }
    public function render()
    {
        $contracts = Contract::query()
            ->when($this->client_id, function ($q) {
                $q->where('client_id', $this->client_id);
            })
            ->when($this->search, function ($q) {
                $q->where(function ($q2) {
                    $q2->where('contract_number', $this->search)
                    ->orWhere('id', $this->search);
                });
            })
            ->when($this->filter_expire, function ($q) {
                if ($this->filter_expire == 'active') {
                    $q->where('contract_end_at', '>=', now());
                } elseif ($this->filter_expire == 'inactive') {
                    $q->where('contract_end_at', '<', now());
                }
            })
            ->latest()
            ->paginate(10);

        return view('livewire.contracts.contracts', compact('contracts'));
    }


    public function delete(Contract $contract)
    {
        $contract->delete();
        $this->dispatch('alert', type: 'success', message: __('deleted successfully'));
    }
}
