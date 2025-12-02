<?php

namespace App\Livewire\Admin;

use App\Traits\livewireResource;
use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Roles extends Component
{
    use livewireResource;

    public $name;
    public $permission_request = [];
    public $rolePermissions = [];
    public $edit_mode = false;
    public $create_mode = false;
    public $role_id;
    public $screen = 'index';

    protected $permissionGroups = [];

    protected function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'permission_request' => ['nullable'],
        ];
    }

    public function setModelName()
    {
        $this->model = 'Spatie\Permission\Models\Role';
    }

    public function afterSubmit()
    {
        $this->obj->syncPermissions($this->permission_request);
    }

    public function whileEditing()
    {
        $this->permission_request = $this->obj->permissions->pluck('name')->toArray();
    }

    public function render()
    {
        $permissions = Permission::get()->groupBy(function($permission) {
            return explode('_', $permission->name)[1]; // Groups by the model name (e.g., "create_users" -> "users")
        });
        $permissionGroups = config('permissionsname.models');
        $roles = Role::paginate();

        return view('livewire.admin.roles.roles', [
            'roles' => $roles,
            'permissions' => $permissions,
            'permissionGroups' => $permissionGroups
        ])->extends('admin.layouts.admin')->section('content');
    }
}
