<?php

namespace App\Livewire\Admin\Accounting;

use App\Models\CostCenter;
use App\Traits\livewireResource;
use Livewire\Component;

class CostCenters extends Component
{
    use livewireResource;

    public $name, $parent_id, $cost_center, $search;

    protected function rules()
    {
        return [
            'name' => 'required|max:191',
            'parent_id' => 'nullable',
        ];
    }

    public function render()
    {
        $cost_centers = CostCenter::with('main')->when($this->search, function ($q) {
            $q->where('name', 'LIKE', '%' . $this->search . '%');
        })->latest()->paginate(10);
        $all_centers = CostCenter::whereNull('parent_id')->get();

        return view('livewire.admin.accounting.cost-centers', compact('cost_centers', 'all_centers'))->extends('admin.layouts.admin')->section('content');
    }

    public function beforeSubmit()
    {
        $this->data['parent_id'] = isset($this->parent_id) && $this->parent_id != '' ? $this->parent_id : null;
    }

    public function itemId(CostCenter $cost_center)
    {
        $this->cost_center = $cost_center->id;
    }
}
