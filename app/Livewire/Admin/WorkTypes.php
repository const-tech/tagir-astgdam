<?php

namespace App\Livewire\Admin;

use App\Models\WorkType;
use App\Traits\livewireResource;
use Livewire\Component;

class WorkTypes extends Component
{
    use livewireResource;
    public $name,$hours, $search;
    public function rules()
    {
        return [
            'name' => 'required',
            'hours'=>'required|numeric|gt:0'
        ];
    }

    public function setModelName()
    {
        $this->model = 'App\Models\WorkType';
    }
    public function render()
    {
        $works = WorkType::where(function ($q) {
            if ($this->search) {
                $q->where('name', 'LIKE', "%" . $this->search . "%");
            }
        })->latest('id')->paginate();
        return view('livewire.admin.work-types', compact('works'))->extends('admin.layouts.admin')->section('content');
    }
}
