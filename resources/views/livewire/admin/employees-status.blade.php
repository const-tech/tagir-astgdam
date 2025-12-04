<div class="main-side">
    <div class="d-flex align-items-center justify-content-between flex-wrap gap-1 mb-3">
        <div class="main-title">
            <div class="small">@lang('admin.Home')</div>
            <div class="large">
                احصائيات حالات الموظفين
                @if($selectedStatus)
                    ({{ __($selectedStatus) }})
                @endif
            </div>
        </div>

        <a href="{{ route('admin.employes') }}" class="main-btn btn-main-color">
            <i class="fas fa-users"></i>
            صفحة الموظفين
        </a>
    </div>

    @php
        $statusLabels = [
            'active'          => 'نشطين',
            'inactive'        => 'غير نشطين',
            'resigned'        => 'مستقيلين',
            'fired'           => 'مفصولين',
            'death'           => 'حالة وفاة',
            'exit_and_return' => 'خروج وعودة',
            'final_exit'      => 'خروج نهائي',
        ];
    @endphp

    <div class="row g-3 mb-3">
        <div class="col-6 col-md-3 col-lg-3">
            <div class="card p-2 text-center h-100 {{ $selectedStatus === null ? 'border-primary' : '' }}"
                 style="cursor: pointer"
                 wire:click="$set('selectedStatus', null)">
                <div class="fw-bold mb-1">كل الموظفين</div>
                <div class="fs-4 fw-bold">{{ $totalEmployees }}</div>
            </div>
        </div>

        {{-- @foreach($statusLabels as $key => $label)
            <div class="col-6 col-md-3 col-lg-2">
                <div class="card p-2 text-center h-100 {{ $selectedStatus === $key ? 'border-primary' : '' }}"
                     style="cursor: pointer"
                     wire:click="$set('selectedStatus', '{{ $key }}')"
                     >
                    <div class="fw-bold mb-1">{{ $label }}</div>
                    <div class="fs-4 fw-bold">{{ $statusCounts[$key] ?? 0 }}</div>
                </div>
            </div>
        @endforeach --}}
        @foreach($statusLabels as $key => $label)
            <div class="col-6 col-md-3 col-lg-3">
                <a href="{{ route('admin.employes', ['status' => $key]) }}"
                class="text-decoration-none text-dark">
                    <div class="card p-2 text-center h-100"
                        style="cursor: pointer">
                        <div class="fw-bold mb-1">{{ $label }}</div>
                        <div class="fs-4 fw-bold">{{ $statusCounts[$key] ?? 0 }}</div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>


</div>

