<?php

namespace App\Livewire\Admin;

use App\Models\Governmental;
use App\Traits\livewireResource;
use Livewire\Component;

class Governmentals extends Component
{
    use livewireResource;

    public $name, $image, $expire_date;
    protected function rules()
    {
        return [
            'name' => ['string', 'required'],
            'image' => 'nullable',
            'expire_date' => 'required',
        ];
    }



    public function beforeSubmit()
    {
        if ($this->image) {
            if ($this->obj) {
                if ($this->obj->image !== $this->image) {
                    delete_file($this->obj->image);
                    $this->data['image'] = store_file($this->image, 'governmentals');
                }
            } else {
                $this->data['image'] = store_file($this->image, 'governmentals');
            }
        }
    }

    public function render()
    {
        $governmentals = Governmental::where(function ($q) {
            if (request('expired')) {
                $q->whereDate('expire_date', '<', now());
            }
        })->latest()->paginate(10);
        return view('livewire.admin.governmentals', compact('governmentals'))->extends('admin.layouts.admin')->section('content');
    }
}