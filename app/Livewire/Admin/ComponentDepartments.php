<?php

namespace App\Livewire\Admin;

use App\Models\Department;
use App\Traits\livewireResource;
use Livewire\Component;

class ComponentDepartments extends Component
{
    use livewireResource;

    public $name, $search;

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
        ];
    }

    public function setModelName()
    {
        $this->model = Department::class;
    }

    public function render()
    {
        $departments = Department::where(function ($q) {
                if ($this->search) {
                    $q->where('name', 'LIKE', '%' . $this->search . '%');
                }
            })
            ->latest('id')
            ->paginate();

        return view('livewire.admin.component-departments', compact('departments'))
            ->extends('admin.layouts.admin')
            ->section('content');
    }
}

