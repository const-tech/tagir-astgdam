<?php

namespace App\Livewire\Contracts;

use App\Models\Contract;
use App\Models\User;
use App\Traits\livewireResource;
use Livewire\Component;
use Livewire\WithFileUploads;

class ContractForm extends Component
{
    use livewireResource;
    use WithFileUploads;
    public $user_id, $client_id, $contract_number, $paid, $rest, $contract_terms, $file, $city_id, $status, $contract_start_at, $contract_end_at, $scheduling_type, $payment_start_at, $amount, $installments_number;
    public $model = Contract::class;

    public function rules()
    {
        return [
            'client_id' => 'required',
            'contract_number' => 'required',
            // 'status' => 'required',
            'contract_start_at' => 'required',
            'contract_end_at' => 'required',
            // 'scheduling_type' => 'required',
            // 'payment_start_at' => 'required',
            'amount' => 'required',
            'paid' => 'required',
            'rest' => 'required',
            'city_id' => 'nullable',
            'contract_terms' => 'nullable',
            'file' => 'nullable',
            // 'installments_number' => 'required'
        ];
    }
    public function mount($id = null)
    {
        if ($id) {
            $this->edit($id);
        } else {
            $this->contract_number = Contract::latest()->first()?->contract_number + 1 ?? 1;
        }
    }






    public function render()
    {
        $clients = User::clients()->pluck('name', 'id')->toArray();
        return view('livewire.contracts.contract-form', compact('clients'));
    }

    public function beforeSubmit()
    {
        $this->data['user_id'] = auth()->id();
        if ($this->file) {
            if ($this->obj) {
                if ($this->obj->file !== $this->file) {
                    delete_file($this->obj->file);
                    $this->data['file'] = store_file($this->file, 'contracts');
                }
            } else {
                $this->data['file'] = store_file($this->file, 'contracts');
            }
        }
    }
    public function afterSubmit()
    {
        return redirect()->route('admin.contracts')->with('success', __('Added successfully'));
    }
}
