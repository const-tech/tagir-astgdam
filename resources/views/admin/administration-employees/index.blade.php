@extends('admin.layouts.admin')
@section('content')
<div class="main-side">

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
    <div class="btn-holder">
        <a href="{{ route('admin.administration-employees.create') }}" class="main-btn">اضافة <i class="fas fa-plus"></i></a>
    </div>
    <div class="table-responsive">
        <table class="main-table">
            <thead>
                <tr>
                    <th>الاسم </th>
                    <th>البريد الالكتروني</th>
                    <th>الوظيفه</th>
                    <th>الفرع او الشركة</th>
                    <th>الهوية/ الاقامة</th>
                    <th>انتهاء الهوية/ الاقامة</th>
                    <th>انتهاء عقد العمل</th>
                    <th>انتهاء الجواز </th>
                    <th> انتهاء التامين </th>
                    <th>الحساب البنكي</th>
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
                    <td>---</td>
                    <td>---</td>
                    <td>
                        <div class="d-flex align-items-center gap-3">
                            <a href="{{ route('admin.administration-employees.show') }}"><i class="fas fa-eye table-icon"></i></a>
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
