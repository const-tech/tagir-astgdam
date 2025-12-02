<?php

namespace App\Livewire\Admin;

use App\Models\Goal;
use App\Models\GoalEmploye;
use App\Models\User;
use App\Traits\livewireResource;
use Livewire\Component;

class Goals extends Component
{
    use livewireResource;
    public $name, $start_goal, $content_goal, $filter_active, $search, $employes = [], $rate, $notes, $active = 1;
    public function setModelName()
    {
        $this->model = 'App\Models\Goal';
    }


    public function rules()
    {
        return [
            'name' => 'required',
            'start_goal' => 'required',
            'employes' => 'required',
            'rate' => 'nullable|integer|min:0|max:100',
            'notes' => 'nullable',
            'content_goal' => 'nullable',
            'active' => 'nullable'
        ];
    }


    public function submit()
    {
        $this->data = $this->validate();
        unset($this->data['employes']);
        $this->beforeSubmit();

        if ($this->obj) {
            $this->beforeUpdate();
            $this->obj->update($this->data);
            $this->afterUpdate();
            GoalEmploye::where('goal_id', $this->obj->id)->delete();
        } else {
            $this->beforeCreate();
            $this->obj = $this->model::create($this->data);
            $this->afterCreate();
        }
        foreach ($this->employes as $emp) {
            GoalEmploye::create(['goal_id' => $this->obj->id, 'user_id' => $emp]);
        }
        $this->afterSubmit();
        $this->obj = null;
        $this->resetInputs();
        $this->screen = 'index';
        // $this->dispatch('alert', ['ss','sss']);
        session()->flash('success', 'تم الحفظ بنجاح');
    }




    public function edit($id)
    {
        $edit = $this->model::findOrFail($id);
        $this->obj = $edit;
        $emp = GoalEmploye::where('goal_id', $id)->pluck('id')->toArray();
        $this->employes = $emp;
        $this->name = $edit->name;
        $this->rate = $edit->rate;
        $this->start_goal = $edit->start_goal;
        $this->notes = $edit->notes;
        $this->active = $edit->active;
        $this->content_goal = $edit->content_goal;

        $this->screen = 'edit';
    }

    public function afterUpdate() {}

    public function delete($id)
    {
        $delete = $this->model::findOrFail($id);
        GoalEmploye::where('goal_id', $id)->delete();
        $delete->delete();
        // $this->dispatch('alert', ['type' => 'success', 'message' => __('Deleted.')]);
        session()->flash('success', 'تم الحذف بنجاح');
    }

    public function hydrate()
    {
        $this->dispatch('refreshSelect2');
    }

    public function render()
    {
        $goals = Goal::where(function ($q) {
            if ($this->search) {
                $q->where('name', 'LIKE', "%" . $this->search . "%");
            }
            if ($this->filter_active == 'active') {
                $q->where('active', 1);
            }
            if ($this->filter_active == 'inactive') {
                $q->where('active', 0);
            }
        })->latest('id')->paginate();
        $employees = User::employes()->pluck('name', 'id')->toArray();
        return view('livewire.admin.goals.index', compact('goals', 'employees'))->extends('admin.layouts.admin')->section('content');
    }
}