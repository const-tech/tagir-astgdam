<?php

namespace App\Livewire\Admin;

use App\Models\User;
use App\Traits\livewireResource;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class AdministrationEmployes extends Component
{
    use livewireResource;
    public $user_id, $name, $last_name, $governmental_entity, $second_name, $email, $password, $job_id, $filter_status, $search_employeeId, $search_name_number, $filter_nationality,
        $type = 'administration-employe', $status, $phone, $nationality, $start_id_number, $job, $side_job, $start_work, $image;
    public $id_number, $end_id_number, $end_work, $end_passport, $end_insurance, $address, $bank_account, $role_id;

    public function setModelName()
    {
        $this->model = 'App\Models\User';
    }
    protected function rules()
    {
        return [
            'name' => ['string', 'required'],
            'email' => ['required', 'email', 'unique:users,email,' . $this->obj?->id],
            'phone' => ['required'],
            'password' => ['nullable'],
            'id_number' => ['nullable', 'digits:10'],
            'end_id_number' => ['nullable'],
            'end_work' => ['nullable'],
            'governmental_entity' => ['nullable'],
            'end_passport' => ['nullable'],
            'end_insurance' => ['nullable'],
            'address' => ['nullable'],
            'bank_account' => ['nullable'],
            'type' => ['nullable'],
            'job_id' => ['nullable'],
            'role_id' => ['required'],
        ];
    }

    public function beforeSubmit()
    {
        unset($this->data['role_id']);
        if ($this->password) {
            if ($this->password == null) {
                $this->data['password'] = Hash::make('123456');
            }
            $this->data['password'] = Hash::make($this->password);
        } else {
            $this->data['password'] = $this->obj->password;
        }

        if ($this->image) {
            if ($this->obj) {
                if ($this->obj->image !== $this->image) {
                    delete_file($this->obj->image);
                    $this->data['image'] = store_file($this->image, 'employes');
                }
            } else {
                $this->data['image'] = store_file($this->image, 'employes');
            }
        }
    }


    public function afterSubmit()
    {
        $this->obj?->syncRoles($this->role_id);
    }
    public function whileEditing()
    {
        $this->role_id = $this->obj->role?->id;
    }


    public function render()
    {
        $roles = Role::all();
        $users = User::administration()->where(function ($q) {
            if ($this->search_employeeId) {
                $q->where('id', 'LIKE', '%' . $this->search_employeeId . '%');
            }
            if ($this->search_name_number) {
                $q->where('phone', 'LIKE', '%' . $this->search_name_number . '%');
            }
            if (request('status')) {
                $q->where('status', request('status'));
            }
            if ($this->filter_status) {
                $q->where('status', $this->filter_status);
            }
            if ($this->filter_nationality) {
                $q->where('nationality', $this->filter_nationality);
            }
        })->latest()->paginate(10);
        return view('livewire.admin.administration-employes', compact('users', 'roles'))->extends('admin.layouts.admin')->section('content');
    }



    public function softDelete($id)
    {
        $delete = $this->model::withTrashed()->find($id);
        $delete->forceDelete();
        // $this->dispatch('alert', ['type' => 'success', 'message' => __('Deleted.')]);
        session()->flash('success', 'تم الحذف بنجاح');
    }
}