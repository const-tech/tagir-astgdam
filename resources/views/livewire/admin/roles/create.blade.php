{{-- resources/views/livewire/admin/roles/roles.blade.php --}}
<form wire:submit="submit()">
    <div class="row w-100 mx-0 p-3 mb-5 mt-5 bg-white">
        <button class="main-btn btn-main-color"
                wire:click='$set("screen","index")'>@lang('admin.Show all roles')</button>

        <div class="col-md-12 mb-3">
            @if (!$role_id)
                <h3 class="mb-3">@lang('admin.Add a group')</h3>
            @else
                <h3 class="mb-3">@lang('admin.Edit group')</h3>
            @endif
        </div>

        <div class="col-md-12 mb-4">
            <div class="form-group">
                <label for="" class="mb-2">@lang('admin.Group name')</label>
                <div class="d-flex">
                    <input type="text" class="form-control" wire:model="name" wire:keydown.enter="submit()">
                </div>
                @error('name')
                <p class="text-danger" style="font-size: 12px">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-hover mt-5">
                <tbody>
                @foreach ($permissionGroups as $model => $actions)
                    <tr>
                        <th scope="row">{{ __($model) }}</th>
                        @foreach ($actions as $action)
                            @php
                                $permissionName = "{$action}_{$model}";
                            @endphp
                            <td>
                                <input type="checkbox"
                                       class="form-check-input"
                                       id="{{ $permissionName }}"
                                       wire:model="permission_request"
                                       value="{{ $permissionName }}"
                                    {{ in_array($permissionName, $rolePermissions) ? 'checked' : '' }}>
                                <label class="form-check-label " for="{{ $permissionName }}">
                                    {{ __($action) }}
                                </label>
                            </td>
                        @endforeach
                    </tr>

                @endforeach
                </tbody>
            </table>
        </div>


        <div class="col-md-12">
            <button type="submit" class="btn btn-primary">@lang('Save')</button>
        </div>
    </div>
</form>
