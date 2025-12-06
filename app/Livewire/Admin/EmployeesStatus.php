<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class EmployeesStatus extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $selectedStatus = null;
    public $search = '';
    public $queryString = [
        'selectedStatus' => ['as' => 'status', 'except' => ''],
    ];

    public function updatingSelectedStatus()
    {
        $this->resetPage();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $baseQuery = User::employes();
        $statusCounts = [
            'active'          => (clone $baseQuery)->where('status', 'active')->count(),
            'inactive'        => (clone $baseQuery)->where('status', 'inactive')->count(),
            'resigned'        => (clone $baseQuery)->where('status', 'resigned')->count(),
            'fired'           => (clone $baseQuery)->where('status', 'fired')->count(),
            'death'           => (clone $baseQuery)->where('status', 'death')->count(),
            'exit_and_return' => (clone $baseQuery)->where('status', 'exit_and_return')->count(),
            'final_exit'      => (clone $baseQuery)->where('status', 'final_exit')->count(),
        ];

        $totalEmployees = (clone $baseQuery)->count();
        $employees = (clone $baseQuery)
            ->when($this->selectedStatus, function ($q) {
                $q->where('status', $this->selectedStatus);
            })
            ->when($this->search, function ($q) {
                $q->where(function ($qq) {
                    $qq->where('name', 'LIKE', '%' . $this->search . '%')
                        ->orWhere('id_number', 'LIKE', '%' . $this->search . '%')
                        ->orWhere('phone', 'LIKE', '%' . $this->search . '%');
                });
            })
            ->latest('id')
            ->paginate(10);

        return view('livewire.admin.employees-status', [
            'employees'      => $employees,
            'statusCounts'   => $statusCounts,
            'totalEmployees' => $totalEmployees,
        ])->extends('admin.layouts.admin')->section('content');
    }
}
