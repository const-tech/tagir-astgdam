<?php

namespace App\Livewire\Admin\Projects;

use App\Models\User;
use App\Models\Project;
use Livewire\Component;
use Livewire\WithPagination;

class Projects extends Component
{
    use WithPagination;
    public $filter_status, $selected_project, $teamwork = [], $search;
    public function render()
    {
        $projects = Project::latest()->where(function ($q) {
            if ($this->filter_status) {
                $q->where('status', $this->filter_status);
            }
            if ($this->search) {
                $q->where('title', 'like', "%$this->search%");
            }
            if (request('client_id')) {
                $q->where('client_id', request('client_id'));
            }
        })->paginate(10);
        $employees = User::employes()->pluck('name', 'id')->toArray();

        return view('livewire.admin.projects.projects', compact('projects', 'employees'));
    }
    public function hydrate()
    {
        $this->dispatch('refreshSelect2');
    }
    public function setProject(Project $project)
    {
        $this->selected_project = $project;
        $this->teamwork = $this->selected_project->users()->pluck('user_id')->toArray();
    }
    public function saveUsers()
    {
        $this->validate(['teamwork' => 'required']);
        $this->selected_project->users()->sync($this->teamwork);
        $this->reset(['teamwork', 'selected_project']);
        $this->dispatch('alert', message: 'تم تعديل الفريق بنجاح');
    }
}