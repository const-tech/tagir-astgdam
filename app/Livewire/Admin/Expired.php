<?php

namespace App\Livewire\Admin;

use App\Models\Governmental;
use App\Models\User;
use App\Traits\livewireResource;
use Livewire\Component;

class Expired extends Component
{

    use livewireResource;

    public $page;
    public $govern = 'yes';
    protected function rules()
    {
        return [];
    }

    public function render()
    {


        $governmentals = [];
        if (!$this->page && $this->govern == 'yes') {
            $governmentals = Governmental::whereDate('expire_date', '<', now())
                ->latest()->paginate(10);
        }
        $items = User::where(function ($q) {
            if ($this->page) {
                $q->whereDate($this->page, '<', now());
            }
        })->latest()->paginate(10);
        return view('livewire.admin.expired', compact('items', 'governmentals'))->extends('admin.layouts.admin')->section('content');
    }


    // public function render()
    // {
    //     $governmentals = Governmental::where(function ($q) {
    //         if (request('expired')) {
    //             $q->whereDate('expire_date', '<', now());
    //         }
    //     })->latest()->paginate(10);
    //     return view('livewire.admin.governmentals', compact('governmentals'))->extends('admin.layouts.admin')->section('content');
    // }
}