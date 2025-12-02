@extends('admin.layouts.admin')
@section('title', 'اضافة انذار')
@section('content')
    <div class="main-side">
        <div class="d-flex align-items-center justify-content-between gap-3 mb-3">
            <div class="main-title mb-0">
                <div class="small">الرئيسية</div>
                <div class="large">اضافة انذار</div>
            </div>

            <a href="{{ route('admin.warnings') }}" class="main-btn bg-secondary">رجوع <i
                    class="fas fa-arrow-left-long"></i></a>
        </div>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 g-3">
            <div class="col">
                <div class="inp-holder">
                    <label class="special-input">
                        <span>الانذار<span>
                                <input type="text" class="form-control">
                    </label>
                </div>
            </div>
            <div class="col">
                <label for="">الموظفين</label>
                <select name="teamwork[]" id="teamwork" class="select2" multiple="multiple">
                    <option value="all">كل الموظفين</option>
                    <option value="1">موظف 1</option>
                    <option value="2">موظف 2</option>
                    <option value="3">موظف 3</option>
                </select>
            </div>

            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                <div class="btn-holder mt-2">
                    <button class="main-btn">حفظ</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            $('#teamwork').select2();
        });
    </script>
@endpush
