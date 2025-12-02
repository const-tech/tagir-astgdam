@extends('admin.layouts.admin')

@section('content')
    <div class="main-side">
        <div class="main-title">
            <div class="small">
                @lang('Home')
            </div>
            <div class="large">
                @lang('admin.Dashboard')
            </div>
        </div>
        <div class="row g-3 mb-2">
            <div class="col-12 ">
                <div class="d-flex gap-3 flex-wrap">
                    <a href="{{ route('admin.contracts') }}" class="box-icon">
                        <i class="fas fa-file-signature"></i>
                        <div class="text">@lang('contracts')</div>
                    </a>
                    <a href="{{ route('admin.invoices') }}" class="box-icon">
                        <img src="{{ asset('admin-asset/img/invoice.svg') }}" alt="">
                        <div class="text">@lang('invoices')</div>
                    </a>
                    <a href="{{ route('admin.employes') }}" class="box-icon">
                        <img src="{{ asset('admin-asset/img/employees.svg') }}" alt="">
                        <div class="text">@lang('employees')</div>
                    </a>
                    <a href="{{ route('admin.goals') }}" class="box-icon">
                        <img src="{{ asset('admin-asset/img/documents.svg') }}" alt="">
                        <div class="text">@lang('goals')</div>
                    </a>
                    <a href="{{ route('admin.projects') }}" class="box-icon">
                        <i class="fab fa-buffer"></i>
                        <div class="text"> المشاريع</div>
                    </a>
                    <a href="{{ route('admin.notifications.index') }}" class="box-icon">
                        <img src="{{ asset('admin-asset/img/bell.svg') }}" alt="">
                        <div class="text">@lang('notifications')</div>
                    </a>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                <div class="status_box blue-box">
                    <div class="data">
                        <h3 class="num-stat" data-goal="{{ App\Models\User::employes()->count() }}">0</h3>
                        <p class="mb-3">@lang('all_employees')</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user-tie blue-icon"></i>
                    </div>
                    <a href="{{ route('admin.employes') }}" class="more">
                        <i class="fa-solid fa-money-bills blue-icon"></i>
                        @lang('more_info')
                    </a>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                <div class="status_box warning-box">
                    <div class="data">
                        <h3 class="num-stat" data-goal="100">0</h3>
                        <p class="mb-3">@lang('delayed_employees')</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user-tie warning-icon"></i>
                    </div>
                    <a href="{{ route('admin.employes') }}" class="more">
                        <i class="fa-solid fa-circle-arrow-right"></i>
                        @lang('more_info')
                    </a>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                <div class="status_box danger-box">
                    <div class="data">
                        <h3 class="num-stat"
                            data-goal="{{ App\Models\User::employes()->where('status', 'exit_and_return')->count() }}">0
                        </h3>
                        <p class="mb-3">@lang('exit_return_employees')</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user-tie danger-icon"></i>
                    </div>
                    <a href="{{ route('admin.employes', ['status' => 'exit_and_return']) }}" class="more">
                        <i class="fa-solid fa-circle-arrow-right"></i>
                        @lang('more_info')
                    </a>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                <div class="status_box success-box">
                    <div class="data">
                        <h3 class="num-stat" data-goal="100">0</h3>
                        <p class="mb-3">@lang('vacation_employees')</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user-tie success-icon"></i>
                    </div>
                    <a href="{{ route('admin.employes') }}" class="more">
                        <i class="fa-solid fa-circle-arrow-right"></i>
                        @lang('more_info')
                    </a>
                </div>
            </div>

            <div class="col-12 col-md-12">
                <div class="row g-3">
                    <div class="col-12 col-md-6">
                        <div class="card">
                            <div class="card-header bg-white">
                                @lang('profit')
                            </div>
                            <div class="card-body">
                                <canvas class="w-100" id="myChartDate" height="250"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="row g-3">
                            <div class="col-12 col-md-6">
                                <div class="status_box main-box">
                                    <div class="data">
                                        <h3 class="num-stat" data-goal="{{ App\Models\User::clients()->count() }}">0</h3>
                                        <p class="mb-3">@lang('Companies')</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-users main-icon"></i>
                                    </div>
                                    <a href="{{ route('admin.clients') }}" class="more">
                                        <i class="fa-solid fa-circle-arrow-right"></i>
                                        @lang('more_info')
                                    </a>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="status_box purple-box">
                                    <div class="data">
                                        <h3 class="num-stat" data-goal="{{ App\Models\Project::count() }}">0</h3>
                                        <p class="mb-3">@lang('projects_tasks')</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-briefcase purple-icon"></i>
                                    </div>
                                    <a href="{{ route('admin.projects') }}" class="more">
                                        <i class="fa-solid fa-circle-arrow-right"></i>
                                        @lang('more_info')
                                    </a>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="status_box sky-box">
                                    <div class="data">
                                        <h3 class="num-stat" data-goal="{{ App\Models\Goal::count() }}">0</h3>
                                        <p class="mb-3">@lang('goals')</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa-solid fa-bullseye sky-icon"></i>
                                    </div>
                                    <a href="{{ route('admin.goals') }}" class="more">
                                        <i class="fa-solid fa-circle-arrow-right"></i>
                                        @lang('more_info')
                                    </a>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="status_box orange-box">
                                    <div class="data">
                                        <h3 class="num-stat" data-goal="{{ App\Models\Contract::count() }}">0</h3>
                                        <p class="mb-3">@lang('contracts')</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-file-signature orange-icon"></i>
                                    </div>
                                    <a href="{{ route('admin.contracts') }}" class="more">
                                        <i class="fa-solid fa-circle-arrow-right"></i>
                                        @lang('more_info')
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
@push('js')
    <script>
        let xValues = ["January", "February", "March", "April", "May", "June", "July"];
        new Chart("myChartDate", {
            type: "bar", // الرسم البياني من نوع الأعمدة
            data: {
                labels: xValues,
                datasets: [{
                        label: 'الأرباح',
                        data: [00, 100, 400, 500, 600, 700, 100],
                        backgroundColor: "#22baa6",
                        borderWidth: 1,
                        barThickness: 20,
                    },
                    {
                        type: 'line',
                        label: 'الطلبات',
                        data: [0, 50, 500, 200, 400, 300, 100],
                        borderWidth: 2,
                        pointRadius: 1,
                        borderColor: "#405189",
                        backgroundColor: "rgb(64 81 137 / 10%)",
                        fill: true
                    },
                    {
                        label: 'الربح',
                        data: [100, 200, 700, 800, 500, 600, 300],
                        type: 'line',
                        borderWidth: 2,
                        pointRadius: 1,
                        borderColor: "#f06548",
                        borderDash: [5, 5] // تحديد نمط متقطع للخط
                    }
                ],
                options: {
                    responsive: true,
                    legend: {
                        display: true
                    },
                    tooltips: {
                        mode: 'index',
                        intersect: false
                    },
                    hover: {
                        mode: 'index',
                        intersect: false
                    }
                }
            },
        });


        if (document.querySelectorAll(".num-stat")) {
            let numStats = document.querySelectorAll(".num-stat");
            let started = false;
            document.addEventListener("DOMContentLoaded", function() {
                numStats.forEach((num) => startCount(num));
            });

            function startCount(el) {
                let goal = el.dataset.goal;
                let duration = 2000; // تحديد المدة الزمنية
                let start = null;

                function updateCount(timestamp) {
                    if (!start) start = timestamp;
                    let progress = timestamp - start;
                    let increment = Math.floor((progress / duration) * goal);
                    el.textContent = increment > goal ? goal : increment;
                    if (progress < duration) {
                        requestAnimationFrame(updateCount);
                    }
                }
                requestAnimationFrame(updateCount);
            }
        }
    </script>
@endpush
