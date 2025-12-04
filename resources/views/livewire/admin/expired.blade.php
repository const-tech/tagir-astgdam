<div class="main-side">
    <div class="main-title">
        <div class="small">@lang('admin.Home')</div>
        <div class="large">الوثائق
            المنتهيه
        </div>
    </div>
    <x-admin-alert></x-admin-alert>
    {{-- <div class="d-flex align-items-center justify-content-between flex-wrap gap-1 mb-2">
        <a class="main-btn" href="{{ route('admin.expired') }}">الوثائق الحكوميه ::
            {{ App\Models\Governmental::whereDate('expire_date', '<', now())->count() }}</a>
        <button class="main-btn" wire:click='$set("page","end_id_number")'>انتهاء الهوية ::
            {{ App\Models\User::whereDate('end_id_number', '<', now())->count() }} </button>
        <button class="main-btn" wire:click='$set("page","end_insurance")'>انتهاء التأمين ::
            {{ App\Models\User::whereDate('end_insurance', '<', now())->count() }} </button>
        <button class="main-btn" wire:click='$set("page","end_passport")'>انتهاء جواز السفر ::
            {{ App\Models\User::whereDate('end_passport', '<', now())->count() }} </button>
        <button class="main-btn" wire:click='$set("page","end_driver_card")'>نهاية بطاقة سائق
            ::{{ App\Models\User::whereDate('end_driver_card', '<', now())->count() }} </button>
        <button class="main-btn" wire:click='$set("page","end_health_card")'>نهاية الكارت الصحى ::
            {{ App\Models\User::whereDate('end_health_card', '<', now())->count() }} </button>
        <button class="main-btn" wire:click='$set("page","end_is_employee")'>نهاية أجير ::
            {{ App\Models\User::whereDate('end_is_employee', '<', now())->count() }} </button>
        <button class="main-btn" wire:click='$set("page","end_resident")'> نهاية مقيم ::
            {{ App\Models\User::whereDate('end_resident', '<', now())->count() }} </button>
    </div>

    @if (!$page && $govern == 'yes')
        <div class="table-responsive">
            <table class="main-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>الجهة الحكومية </th>
                        <th>تاريخ الانتهاء</th>
                        <th>الصوره</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($governmentals as $governmental)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $governmental->name }}</td>
                            <td>{{ $governmental->expire_date }}</td>
                            <td>
                                @if (!$governmental->image)
                                    <img src="{{ asset('admin-asset/img/no-image.jpeg') }}" alt=""
                                        class="img-thumbnail img-preview" width="50">
                                @else
                                    <img src="{{ display_file($governmental->image) }}" alt=""
                                        class="img-thumbnail img-preview" width="50">
                                @endif
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
            @if ($governmentals->count())
                {{ $governmentals->links() }}
            @endif

        </div>
    @else
        <div class="table-responsive">
            <table class="main-table">
                <thead>
                    <tr>
                        <th>الرقم الوظيفي</th>
                        <th>الموظف</th>
                        <th>تاريخ الانتهاء</th>
                        <th>المرفق</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($items as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>
                                <div class="user">
                                    <img src="{{ $item->image ? display_file($item->image) : asset('admin-asset/img/no-image.jpeg') }}"
                                        alt="user">
                                    <span>{{ $item->name . ' ' . $item->second_name . ' ' . $item->last_name }}</span>
                                </div>
                            </td>
                            @php
                                if ($page == 'end_driver_card') {
                                    $page_file = 'file_driver_card';
                                } elseif ($page == 'end_health_card') {
                                    $page_file = 'file_health_card';
                                } elseif ($page == 'end_is_employee') {
                                    $page_file = 'file_is_employee';
                                } elseif ($page == 'end_resident') {
                                    $page_file = 'file_resident';
                                } else {
                                    $page_file = 'file_' . $page;
                                }

                            @endphp
                            <td>{{ $item->$page }}</td>
                            <td>
                                @if (!$item->$page_file)
                                    <img src="{{ asset('admin-asset/img/no-image.jpeg') }}" alt=""
                                        class="img-thumbnail img-preview" width="50">
                                @else
                                    <img src="{{ display_file($item->$page_file) }}" alt=""
                                        class="img-thumbnail img-preview" width="50">
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $items->links() }}
        </div>
    @endif --}}

    <div class="d-flex align-items-center justify-content-between flex-wrap gap-1 mb-2">
    <button class="main-btn" wire:click="showGovernmentals">
        الوثائق الحكومية :: {{ $expired_counts['governmentals'] ?? 0 }}
    </button>

    <button class="main-btn" wire:click='filterUserBy("end_id_number")'>
        انتهاء الهوية :: {{ $expired_counts['end_id_number'] ?? 0 }}
    </button>

    <button class="main-btn" wire:click='filterUserBy("end_insurance")'>
        انتهاء التأمين :: {{ $expired_counts['end_insurance'] ?? 0 }}
    </button>

    <button class="main-btn" wire:click='filterUserBy("end_passport")'>
        انتهاء جواز السفر :: {{ $expired_counts['end_passport'] ?? 0 }}
    </button>

    <button class="main-btn" wire:click='filterUserBy("end_driver_card")'>
        نهاية بطاقة سائق :: {{ $expired_counts['end_driver_card'] ?? 0 }}
    </button>

    <button class="main-btn" wire:click='filterUserBy("end_health_card")'>
        نهاية الكارت الصحي :: {{ $expired_counts['end_health_card'] ?? 0 }}
    </button>

    <button class="main-btn" wire:click='filterUserBy("end_is_employee")'>
        نهاية أجير :: {{ $expired_counts['end_is_employee'] ?? 0 }}
    </button>

    <button class="main-btn" wire:click='filterUserBy("end_resident")'>
        نهاية مقيم :: {{ $expired_counts['end_resident'] ?? 0 }}
    </button>
</div>

@if (!$page && $govern === 'yes')
    {{-- جدول الحكومية --}}
    <div class="table-responsive">
        <table class="main-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>الجهة الحكومية</th>
                    <th>تاريخ الانتهاء</th>
                    <th>الصورة</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($governmentals as $governmental)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $governmental->name }}</td>
                        <td>{{ $governmental->expire_date }}</td>
                        <td>
                            <img src="{{ $governmental->image ? display_file($governmental->image) : asset('admin-asset/img/no-image.jpeg') }}"
                                 class="img-thumbnail img-preview" width="50" alt="">
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="text-center text-muted">لا توجد وثائق منتهية</td></tr>
                @endforelse
            </tbody>
        </table>

        @if($governmentals instanceof \Illuminate\Contracts\Pagination\Paginator)
            {{ $governmentals->links() }}
        @endif
    </div>
@else
    {{-- جدول الموظفين حسب الحقل المختار --}}
    <div class="table-responsive">
        <table class="main-table">
            <thead>
                <tr>
                    <th>الرقم الوظيفي</th>
                    <th>الموظف</th>
                    <th>تاريخ الانتهاء</th>
                    <th>المرفق</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($items as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>
                            <div class="user">
                                <img src="{{ $item->image ? display_file($item->image) : asset('admin-asset/img/no-image.jpeg') }}"
                                     alt="user">
                                <span>{{ trim($item->name . ' ' . $item->second_name . ' ' . $item->last_name) }}</span>
                            </div>
                        </td>
                        <td>{{ $page ? ($item->{$page} ?? '—') : '—' }}</td>
                        @php
                            $fileKey = $current_file_key; // مُمرّر من الكومبوننت
                        @endphp
                        <td>
                            @if (empty($fileKey) || empty($item->{$fileKey}))
                                <img src="{{ asset('admin-asset/img/no-image.jpeg') }}" class="img-thumbnail img-preview" width="50" alt="">
                            @else
                                <a href="{{ display_file($item->{$fileKey}) }}" target="_blank">
                                    <img src="{{ display_file($item->{$fileKey}) }}" class="img-thumbnail img-preview" width="50" alt="">
                                </a>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="text-center text-muted">لا توجد سجلات</td></tr>
                @endforelse
            </tbody>
        </table>

        @if($items instanceof \Illuminate\Contracts\Pagination\Paginator)
            {{ $items->links() }}
        @endif
    </div>
@endif

</div>
