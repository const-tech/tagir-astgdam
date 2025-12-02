<?php

namespace App\Livewire\Contracts;

use App\Models\Contract;
use Livewire\Component;
use Livewire\WithPagination;

class Contracts extends Component
{
    use WithPagination;
    public $search, $filter_expire;
    public function render()
    {
        $contracts = Contract::where(function ($q) {
            if ($this->search) {
                $q->where('contract_number', $this->search)->orWhere('id', $this->search);
            }
            if ($this->filter_expire) {
                if ($this->filter_expire == 'active') {
                    $q->where('contract_end_at', '>=', now());
                }
                if ($this->filter_expire == 'inactive') {
                    $q->where('contract_end_at', '<', now());
                }
            }
        })->latest()->paginate(10);
        return view('livewire.contracts.contracts', compact('contracts'));
    }

    public function delete(Contract $contract)
    {
        $contract->delete();
        $this->dispatch('alert', type: 'success', message: __('deleted successfully'));
    }
}
