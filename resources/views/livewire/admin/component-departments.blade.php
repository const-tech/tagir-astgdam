<div class="main-side">
    <div class="main-title">
        <div class="small">@lang('Home')</div>
        <div class="large">الأقسام</div>
    </div>

    <div class="row g-4">
        <div class="col-md-4">
            <div class="issue-main-info">
                <div class="content-header">
                    اضف قسم جديد
                </div>
                <x-admin-alert></x-admin-alert>
                <div class="col-md-12">
                    <label class="small-label" for="">
                        اسم القسم
                        <span class="text-danger">*</span>
                    </label>
                    <div class="box-input">
                        <input type="text" class="form-control" wire:model="name" />
                        @error('name')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="d-flex justify-content-center mt-4">
                    <button type="button" wire:click="submit" class="main-btn">
                        @lang('Save')
                    </button>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <form action="" class="issue-main-info">
                <div class="content-header">
                    عرض كل الأقسام
                </div>

                <div class="bar-obtions d-flex align-items-center justify-content-end flex-wrap gap-3 mb-4">
                    <div class="box-search">
                        <img src="{{ asset('admin-asset/img/icons/search.png') }}" alt="icon" />
                        <input type="search" wire:model.live="search" placeholder="@lang('Search')" />
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="main-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>اسم القسم</th>
                                <th>@lang('Actions')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($departments as $department)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $department->name }}</td>
                                    <td>
                                        <div class="btn-holder d-flex align-items-center gap-3">
                                            <button type="button" wire:click="edit({{ $department->id }})">
                                                <i class="fas fa-pen text-info icon-table"></i>
                                            </button>

                                            <button type="button" data-bs-toggle="modal"
                                                data-bs-target="#deleteDepartment{{ $department->id }}">
                                                <i class="fas fa-trash text-danger icon-table"></i>
                                            </button>

                                            <div class="modal fade" id="deleteDepartment{{ $department->id }}"
                                                tabindex="-1" aria-labelledby="deleteDepartmentLabel{{ $department->id }}"
                                                aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="deleteDepartmentLabel{{ $department->id }}">
                                                                حذف
                                                            </h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            هل متأكد من حذف هذا القسم؟
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">إلغاء</button>
                                                            <button type="button" class="btn btn-danger"
                                                                wire:click="delete({{ $department->id }})"
                                                                data-bs-dismiss="modal">
                                                                نعم، حذف
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3">
                                        <div class="alert alert-warning mb-0">
                                            @lang('No results')
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    {{ $departments->links() }}
                </div>
            </form>
        </div>
    </div>
</div>

