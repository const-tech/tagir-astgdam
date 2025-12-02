<div class="main-side">
    <div class="main-title">
        <div class="small">
            {{ __('admin.Home') }}
        </div>
        <div class="large">
            المشاريع
        </div>
    </div>

    <div class="btn-holder d-flex align-items-center justify-content-between gap-3 flex-wrap mb-2">
        <div class="btn-holder d-flex align-items-center flex-wrap gap-1">
            <a href="{{ route('admin.projects.create') }}" class="main-btn">اضافة <i class="fas fa-plus"></i></a>
            <button wire:click='$set("filter_status",null)' class="main-btn btn-main-color">كل المشاريع:
                {{ App\Models\Project::count() }}</button>
            <button wire:click='$set("filter_status","active")' class="main-btn">مشاريع جاري التنفيذ:
                {{ App\Models\Project::where('status', 'active')->count() }}</button>
            <button wire:click='$set("filter_status","pending")' class="main-btn bg-warning">مشاريع في الانتظار:
                {{ App\Models\Project::where('status', 'pending')->count() }}</button>
            <button wire:click='$set("filter_status","canceled")' class="main-btn bg-danger">مشاريع ملغية:
                {{ App\Models\Project::where('status', 'canceled')->count() }}</button>
            <button wire:click='$set("filter_status","done")' class="main-btn bg-secondary">مشاريع منتهية:
                {{ App\Models\Project::where('status', 'done')->count() }}</button>
        </div>
        <div class="box-search">
            <img src="{{ asset('admin-asset/img/icons/search.png') }}" alt="icon" />
            <input type="search" id="search" wire:model.live='search' placeholder="ابحث باسم المشروع">
        </div>
    </div>

    <div class="row g-3">
        @foreach ($projects as $project)
            <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                <div class="box-project">
                    <div class="img-holder">
                        <img src="{{ $project->image ? display_file($project->image) : asset('admin-asset/img/image-preview.webp') }}"
                            class="pro-img" alt="project image">
                    </div>
                    <div class="pro-info">
                        <div class="holder-name">
                            <h6 class="name">
                                {{ $project->title }}
                            </h6>
                            <span>عدد العمال : {{ $project->users()->count() }}</span>
                        </div>
                        <div class="bar">
                            <p class="date">
                                بدأ في: {{ $project->start_at }}
                            </p>
                            <p class="date">
                                ينتهي في {{ $project->end_at }}
                            </p>
                        </div>
                    </div>
                    <div class="progress-holder">
                        <div class="progress" role="progressbar" aria-label="Success example" aria-valuenow="25"
                            aria-valuemin="0" aria-valuemax="100">
                            <div class="progress-bar bg-warning" style="width: {{ $project->progress }}%">
                                {{ $project->progress }}%</div>
                        </div>
                    </div>
                    <div class="team-work">
                        @foreach ($project->users as $user)
                            <a href="{{ route('admin.employees.show', $user->id) }}" class="team-img"
                                data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="معاينة ملف العضو">
                                <img src="{{ $user->image ? display_file($user->image) : asset('admin-asset/img/no-image.jpeg') }}"
                                    alt="">
                            </a>
                        @endforeach
                        <button class="btn-team btn-tooltip" data-bs-toggle="modal" data-bs-target="#exampleModal"
                            wire:click='setProject({{ $project->id }})'>
                            <i class="fas fa-plus"></i>
                            <span class="tip">أضف لفريق العمل</span>
                        </button>
                    </div>
                    <div class="bar-options">
                        <div class="btn-holder">
                            <a href="{{ route('admin.projects.show', $project->id) }}" class="btn-light-purple"><i
                                    class="fas fa-eye"></i></a>
                            <div class="dropdown dropdown-effect dropend">
                                <button class="btn-light-blue dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item"
                                            href="{{ route('admin.projects.create', $project->id) }}">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                            تعديل المشروع
                                        </a>
                                    </li>
                                    <li>
                                        <button class="dropdown-item" data-bs-toggle="modal"
                                            data-bs-target="#delete_agent32">
                                            <i class="fa-solid fa-trash-can"></i>
                                            حذف المشروع
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        @php
                            $statusClass = match ($project->status) {
                                'pending' => 'warning',
                                'active' => 'success',
                                'done' => 'secondary',
                                'canceled' => 'danger',
                            };
                        @endphp
                        <span class="badge bg-{{ $statusClass }}">{{ __($project->status) }}</span>
                    </div>
                </div>
            </div>
        @endforeach

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" aria-hidden="true" wire:ignore.self>
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">فريق العمل</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <label for="team" class="form-label">فريق العمل</label>
                        <select wire:model="teamwork" id="teamwork" class="select2" multiple="multiple">
                            @foreach ($employees as $id => $name)
                                <option value="{{ $id }}">{{ $name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary px-3 btn-sm"
                            data-bs-dismiss="modal">الغاء</button>
                        <button type="button" wire:click='saveUsers' data-bs-dismiss="modal"
                            class="btn btn-success px-3 btn-sm">حفظ</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('js')
    <script>
        function select2init() {
            $(document).ready(function() {
                $('.select2').each(function() {
                    $(this).select2({
                        dropdownParent: $(this).parent(),
                        language: {
                            noResults: function() {
                                return "لا توجد نتائج";
                            }
                        }
                    });

                    $(this).on('change', function() {
                        var data = $(this).val();
                        var name = $(this).attr('id');
                        @this.set(name, data);
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
