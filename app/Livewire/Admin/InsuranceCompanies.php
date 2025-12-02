<?php

namespace App\Livewire\Admin;

use App\Models\InsuranceCompany;
use App\Traits\livewireResource;
use Livewire\Component;

class InsuranceCompanies extends Component
{
    use livewireResource;
    public $name, $search;
    public function rules()
    {
        return ['name' => 'required'];
    }

    public function setModelName()
    {
        $this->model = 'App\Models\InsuranceCompany';
    }


    public function render()
    {
        $companies = InsuranceCompany::where(function ($q) {
            if ($this->search) {
                $q->where('name', 'LIKE', "%" . $this->search . "%");
            }
        })->latest('id')->paginate();
        return view('livewire.admin.insurance-companies', compact('companies'))->extends('admin.layouts.admin')->section('content');
    }
}