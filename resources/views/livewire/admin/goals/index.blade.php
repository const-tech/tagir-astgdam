<div class="main-side">
    @if ($screen == 'index')
        <x-admin-alert></x-admin-alert>
        <div class="d-flex align-items-center flex-column flex-xl-row justify-content-between gap-3 mb-3">
            <div class="main-title mb-0 me-auto me-xl-0">
                <div class="small">
                    {{ __('admin.Home') }}
                </div>
                <div class="large">
                    الاهداف
                </div>
            </div>


            <div class="box-search">
                <img src="{{ asset('admin-asset/img/icons/search.png') }}" alt="icon" />
                <input type="search" wire:model.live="search" id="" placeholder="@lang('Search')" />
            </div>
        </div>
        <div class="bar-options d-flex align-items-center justify-content-start flex-wrap gap-1 mb-2">
            <button class="main-btn" wire:click='$set("screen","create")'>@lang('Add') <i
                    class="fas fa-plus"></i></button>


            <button class="main-btn btn-main-color" wire:click='$set("filter_active","")'>كل الاهداف:
                {{ App\Models\Goal::count() }}</button>
            <button class="main-btn bg-warning" wire:click="$set('filter_active','active')">اهداف جارية:
                {{ App\Models\Goal::where('active', 1)->count() }}</button>
            <button class="main-btn bg-success" wire:click="$set('filter_active','inactive')">اهداف مكتملة:
                {{ App\Models\Goal::where('active', 0)->count() }}</button>
        </div>

        <div class="table-responsive">
            <table class="main-table mb-2">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>اسم الهدف</th>
                        <th>تاريخ بدء الهدف</th>
                        <th>محتوى الاهداف</th>
                        <th>حاله الاهداف</th>
                        <th>نسبه تحقيق الاهداف</th>
                        <th>الموظفين</th>
                        <th>التعليمات</th>
                        <th>التحكم</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($goals as $goal)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $goal->name }}</td>
                            <td>{{ $goal->start_goal }}</td>
                            <td>{{ $goal->content_goal }}</td>
                            <td>
                                @if ($goal->active == 0)
                                    <span class="badge bg-success">مكتمل</span>
                                @else
                                    <span class="badge bg-warning">جاري</span>
                                @endif
                            </td>
                            <td>{{ $goal->rate }}</td>
                            <td>
                                @foreach (App\Models\GoalEmploye::where('goal_id', $goal->id)->get() as $d)
                                    {{ $d->user->name }}
                                @endforeach
                            </td>
                            <td>{{ $goal->notes }}</td>

                            {{-- <td>
                                <div class="d-flex align-items-center gap-3">
                                    <button><i class="fa fa-pen table-icon text-info"></i></button>
                                    <button><i class="fa fa-trash table-icon text-danger"></i></button>
                                </div>
                            </td> --}}


                            <td>
                                <div class="d-flex gap-3">

                                    <button title="@lang('admin.Edit')" type="button"
                                        wire:click="edit({{ $goal->id }})"><i></i>
                                        <i class="fa fa-edit text-info icon-table"></i>
                                    </button>
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <i class="fas fa-trash text-danger icon-table"></i>
                                    </button>
                                    <div class="modal fade" id="exampleModal" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">@lang('admin.Delete')
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    @lang('admin.Are you sure you want to delete?')
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary btn-sm px-3"
                                                        data-bs-dismiss="modal">@lang('Cancel')</button>
                                                    <button data-bs-dismiss="modal" class="btn btn-danger btn-sm px-3"
                                                        wire:click='delete({{ $goal->id }})'>@lang('admin.Delete')</button>
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
        </div>
    @else
        <x-admin-alert></x-admin-alert>
        @include('livewire.admin.goals.createOrUpdate')
    @endif
</div>
@push('js')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        function select2init() {
            $(document).ready(function() {
                $('.select2').each(function() {
                    $(this).select2();

                    $(this).on('change', function() {
                        var data = $(this).val();
                        var name = $(this).attr('id');
                        @this.
                        set(name, data);
                    });
                })

            });
        }

        $(document).ready(function() {
            select2init();
        });
        document.addEventListener('refreshSelect2', () => {
            select2init();
        });
    </script>
@endpush
