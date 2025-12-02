@extends('admin.layouts.admin')
@section('content')
    <div class="main-side">
        <div class="btn-holder d-flex align-items-center justify-content-between gap-3 flex-wrap mb-2">
            <div class="main-title">
                <div class="small">
                    {{ __('admin.Home') }}
                </div>
                <div class="large">
                    الانذارات
                </div>
            </div>
            <a href="{{ route('admin.warnings.create') }}" class="main-btn">اضافة <i class="fas fa-plus"></i></a>
        </div>

        <div class="table-responsive">
            <table class="main-table mb-2">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>الموظف</th>
                        <th>الانذار</th>
                        <th>التحكم</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
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
