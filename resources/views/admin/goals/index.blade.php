@extends('admin.layouts.admin')
@section('content')
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
                <a href="{{ route('admin.goals.create') }}" class="main-btn">اضافة <i class="fas fa-plus"></i></a>
                <button class="main-btn btn-main-color">كل الاهداف: 0</button>
                <button class="main-btn">اهداف مكتملة: 0</button>
                <button class="main-btn bg-danger">اهداف منتهية: 0</button>
            </div>
            <div class="box-search">
                <img src="{{ asset('admin-asset/img/icons/search.png') }}" alt="icon" />
                <input type="search" id="" placeholder="ابحث باسم الهدف">
            </div>
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
                    <tr>
                        <td>1</td>
                        <td>---</td>
                        <td>---</td>
                        <td>---</td>
                        <td>---</td>
                        <td>---</td>
                        <td>---</td>
                        <td>---</td>
                        <td>
                            <div class="d-flex align-items-center gap-3">
                                <button><i class="fa fa-pen table-icon text-info"></i></button>
                                <button><i class="fa fa-trash table-icon text-danger"></i></button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
