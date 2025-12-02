<?php

namespace App\Livewire\Admin;

use App\Models\AdministrativeStructure;
use App\Traits\livewireResource;
use Livewire\Component;

class AdministrativeStructures extends Component
{
    use livewireResource;

    public $job_title, $parent_id, $rank,$structure_data=[];
    protected function rules()
    {
        return [
            'job_title' => ['string', 'required'],
            'parent_id' => 'nullable',
            'rank' => 'required|unique:administrative_structures,rank,' . $this->obj?->id,
        ];
    }

    public function mount()
    {
        $this->rank = AdministrativeStructure::max('rank') + 1;
        $this->structure_data = [];
        foreach (AdministrativeStructure::all() as $structure) {
            $info = [
                'name' => $structure->job_title,
                'key' => $structure->id,
            ];
            if ($structure->parent_id) {
                $info['parent']=$structure->parent_id;
            }
            $this->structure_data[] = $info;
        }

    }
    public function render()
    {
        $structures = AdministrativeStructure::orderBy('rank')->paginate(10);

        return view('livewire.admin.administrative-structures', compact('structures'))->extends('admin.layouts.admin')->section('content');
    }

    public function afterSubmit()
    {
        return redirect()->route('admin.administrative-structure')->with('success', __('Added successfully'));
    }
}
