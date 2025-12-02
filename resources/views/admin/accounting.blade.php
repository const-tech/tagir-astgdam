@extends('admin.layouts.admin')
@section('title')
    {{ __('Accounting') }}
@endsection
@section('content')
    @php
        $years = [
            now()->subYears(3)->format('Y'),
            now()->subYears(2)->format('Y'),
            now()->subYears(1)->format('Y'),
            now()->format('Y'),
            now()->addYears(1)->format('Y'),
            now()->addYears(2)->format('Y'),
        ];
    @endphp
    <div class="main-side">
        <div class="container">
            <h4 class="main-heading">المحاسبة</h4>
 
            <div class="bg-white p-3 rounded-2 shadow">
                <div class="row g-4">
                    <div class="col-md-6 col-lg-4 col-xl-3">
                        <a href="{{ route('admin.accounts') }}" class="translate">
                            <div class="box-report">
                                <p class="mb-0">شجرة الحسابات</p>
                                <img src="{{ asset('admin-asset/img/money-tree.png') }}" alt="report img" class="report-img">
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6 col-lg-4 col-xl-3">
                        <a href="{{ route('admin.vouchers.index') }}" class="translate">
                            <div class="box-report">
                                <p class="mb-0">قيود اليومية</p>
                                <img src="{{ asset('admin-asset/img/report-9.png') }}" alt="report img" class="report-img">
                            </div>
                        </a>
                    </div>

                    @can('read_accounts')
                        <div class="col-md-6 col-lg-4 col-xl-3">
                            <a href="{{ route('admin.account_statment') }}" class="translate">
                                <div class="box-report">
                                    <p class="mb-0">كشف حساب</p>
                                    <img src="{{ asset('admin-asset/img/report-7.png') }}" alt="report img" class="report-img">
                                </div>
                            </a>
                        </div>
                    @endcan


                    <div class="col-md-6 col-lg-4 col-xl-3">
                        <a href="{{ route('admin.trial_balance') }}" class="translate">
                            <div class="box-report">
                                <p class="mb-0">ميزان المراجعة</p>
                                <img src="{{ asset('admin-asset/img/report-10.png') }}" alt="report img" class="report-img">
                            </div>
                        </a>
                    </div>

                    <div class="col-md-6 col-lg-4 col-xl-3">
                        <a href="{{ route('admin.cost_center.report') }}" class="translate">
                            <div class="box-report">
                                <p class="mb-0">مراكز التكلفة</p>
                                <img src="{{ asset('admin-asset/img/report-7.png') }}" alt="report img" class="report-img">
                            </div>
                        </a>
                    </div>

                    <div class="col-md-6 col-lg-4 col-xl-3">
                        <a href="{{ route('admin.balance_sheet') }}" class="translate">
                            <div class="box-report">
                                <p class="mb-0">الميزانية</p>
                                <img src="{{ asset('admin-asset/img/report-7.png') }}" alt="report img" class="report-img">
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6 col-lg-4 col-xl-3">
                        <a href="{{ route('admin.income_statement') }}" class="translate">
                            <div class="box-report">
                                <p class="mb-0">قائمة الدخل</p>
                                <img src="{{ asset('admin-asset/img/report-7.png') }}" alt="report img" class="report-img">
                            </div>
                        </a>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
@endsection
