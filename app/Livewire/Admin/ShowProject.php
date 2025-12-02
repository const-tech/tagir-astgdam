<?php

namespace App\Livewire\Admin;

use App\Models\Project;
use Livewire\Component;

class ShowProject extends Component
{
    public $project,$status,$content,$progress;

    public function mount(Project $project)
    {
        $this->project = $project;
        $this->status = $project->status;
        $this->progress =$project->progress ?? 0;
    }

    public function changeStatus()
    {
        $this->project->update([
            'status' => $this->status,
            'progress' => $this->progress
        ]);
        $this->dispatch('alert',type :'success', message:'تم تعديل الحالة بنجاح');
        $this->dispatch('$refresh');

    }

    public function addComment()
    {
        $this->project->comments()->create([
            'content' => $this->content,
            'user_id' => auth()->user()->id
        ]);
        $this->dispatch('alert',type :'success', message:'تم اضافة التعليق بنجاح');
        $this->reset('content');
        $this->dispatch('$refresh');

    }
    public function render()
    {
        return view('livewire.admin.show-project');
    }
}
