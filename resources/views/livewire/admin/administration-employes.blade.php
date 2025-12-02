<div class="main-side">
    <x-admin-alert></x-admin-alert>
    @if ($screen == 'index')
        <div class="btn-holder d-flex align-items-center justify-content-between gap-3 flex-wrap mb-2">
            <div class="main-title">
                <div class="small">
                    {{ __('admin.Home') }}
                </div>
                <div class="large">
                    موظفين الادارة
                </div>
            </div>


        </div>
        <button class="main-btn mb-3" wire:click='$set("screen","create")'>
            @lang('admin.Add')
            <i class="fas fa-plus"></i>
        </button>
        <table class="main-table">
            <thead>
                <tr>
                    <th>الاسم </th>
                    <th>البريد الالكتروني</th>
                    <th>الوظيفه</th>
                    <th>الجهة الحكومية</th>
                    <th>الهوية/ الاقامة</th>
                    <th>انتهاء الهوية/ الاقامة</th>
                    <th>انتهاء عقد العمل</th>
                    <th>انتهاء الجواز </th>
                    <th> انتهاء التامين </th>
                    <th>الحساب البنكي</th>
                    <th>@lang('admin.Group')</th>
                    <th>التحكم</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ App\Models\Job::find($user->job_id)?->name }}</td>
                        <td>{{ $user->governmental_entity }}</td>
                        <td>{{ $user->id_number }}</td>
                        <td>{{ $user->end_id_number }}</td>
                        <td>{{ $user->end_work }}</td>
                        <td>{{ $user->end_passport }}</td>
                        <td>{{ $user->end_insurance }}</td>
                        <td>{{ $user->bank_account }}</td>
                        <td>{{ $user->role?->name }}</td>
                        <td>
                            <div class="d-flex align-items-center gap-3">
                                <a href="{{ route('admin.administration-employees.show') }}"><i
                                        class="fas fa-eye table-icon"></i></a>
                                <button wire:click="edit({{ $user->id }})"><i
                                        class="fa fa-pen table-icon text-info"></i></button>
                                <button data-bs-target="#deleteModal{{ $user->id }}" data-bs-toggle="modal"><i
                                        class="fa fa-trash table-icon text-danger"></i></button>


                                <div class="modal fade" id="deleteModal{{ $user->id }}" aria-hidden="false">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalLabel">@lang('admin.Delete')
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                @lang('admin.Are you sure you want to delete?') {{ $user->name }}
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary btn-sm px-3"
                                                    data-bs-dismiss="modal">{{ __('admin.Cancel') }}</button>
                                                <button data-bs-dismiss="modal" class="btn btn-danger btn-sm px-3"
                                                    wire:click='softDelete({{ $user->id }})'>{{ __('admin.Delete') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        @include('admin.administration-employees.create')
    @endif
</div>
