@extends('admin.layouts.admin')
@section('content')
    <div class="main-side">
        <div class="d-flex align-items-center justify-content-between gap-2 flex-wrap mb-3">
            <div class="main-title">
                <div class="small">
                    {{ __('admin.Home') }}
                </div>
                <div class="large">
                    احصائيات الموظف / خالد الغامدي بن المولد
                </div>
            </div>
            <button class="main-btn bg-secondary not-print">طباعة <i class="fa-solid fa-print"></i></button>
        </div>
        <div class="content_view">
            <div class="print-content" id="prt-content">
                <div class="row g-3">
                    <div class="col-6 col-md-6">
                        <div class="content-section">
                            <div class="title my-2 p-2" style="background: #2E5789;">
                                <h3 class="mb-0 text-white" style="font-size:14px">
                                    بيانات الموظف
                                </h3>
                            </div>
                            <div class="row gx-3">
                                <div class="col-6 col-md-6 col-lg-4">
                                    <div class="input-holder mt-3">
                                        <label for="" class="form-label" style="color:#9fa5a7;font-size:11px">
                                            اسم الموظف
                                        </label>
                                    </div>
                                    <input type="text" disabled="" class="form-control" value="SOHAQ">
                                </div>
                                <div class="col-6 col-md-6 col-lg-4">
                                    <div class="input-holder mt-3">
                                        <label for="" class="form-label" style="color:#9fa5a7;font-size:11px">
                                            الرقم الوظيفي
                                        </label>
                                        <input type="text" disabled="" class="form-control" value="1525">
                                    </div>
                                </div>
                                <div class="col-6 col-md-6 col-lg-4">
                                    <div class="input-holder mt-3">
                                        <label for="" class="form-label" style="color:#9fa5a7;font-size:11px">
                                            رقم الهوية / الاقامة
                                        </label>
                                        <input type="text" disabled="" class="form-control" value="2561605268">
                                    </div>
                                </div>
                                <div class="col-6 col-md-6 col-lg-4">
                                    <div class="input-holder mt-3">
                                        <label for="" class="form-label" style="color:#9fa5a7;font-size:11px">
                                            الجواز
                                        </label>
                                        <input type="text" disabled="" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="col-6 col-md-6 col-lg-4">
                                    <div class="input-holder mt-3">
                                        <label for="" class="form-label" style="color:#9fa5a7;font-size:11px">
                                            تاريخ بداية العقد
                                        </label>
                                        <input type="text" disabled="" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="col-6 col-md-6 col-lg-4">
                                    <div class="input-holder mt-3">
                                        <label for="" class="form-label" style="color:#9fa5a7;font-size:11px">
                                            تاريخ نهايه العقد
                                        </label>
                                        <input type="text" disabled="" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="col-6 col-md-6 col-lg-4">
                                    <div class="input-holder mt-3">
                                        <label for="" class="form-label" style="color:#9fa5a7;font-size:11px">
                                            الحالة الوظيفية
                                        </label>
                                        <input type="text" disabled="" class="form-control" value="نشط">
                                    </div>
                                </div>
                                <div class="col-6 col-md-6 col-lg-4">
                                    <div class="input-holder mt-3">
                                        <label for="" class="form-label" style="color:#9fa5a7;font-size:11px">
                                            تاريخ انتهاء الهوية
                                        </label>
                                        <input type="text" disabled="" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="col-6 col-md-6 col-lg-4">
                                    <div class="input-holder mt-3">
                                        <label for="" class="form-label" style="color:#9fa5a7;font-size:11px">
                                            تاريخ انتهاء الجواز
                                        </label>
                                        <input type="text" disabled="" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="col-6 col-md-6 col-lg-4">
                                    <div class="input-holder mt-3">
                                        <label for="" class="form-label" style="color:#9fa5a7;font-size:11px">
                                            الجنسية
                                        </label>
                                        <input type="text" disabled="" class="form-control" value="">
                                    </div>
                                </div>
                            </div>
                            <hr>
                        </div>
                    </div>
                    <div class="col-6 col-md-6">
                        <div class="content-section">
                            <div class="title my-2 p-2" style="background: #2E5789;">
                                <h3 class="mb-0 text-white" style="font-size:14px">
                                    البيانات المالية
                                </h3>
                            </div>
                            <div class="row gx-3">
                                <div class="col-6 col-md-6 col-lg-4">
                                    <div class="input-holder mt-3">
                                        <label for="" class="form-label" style="color:#9fa5a7;font-size:11px">
                                            الراتب الاساسي
                                        </label>
                                    </div>
                                    <input type="text" disabled="" class="form-control" value="400">
                                </div>
                                <div class="col-6 col-md-6 col-lg-4">
                                    <div class="input-holder mt-3">
                                        <label for="" class="form-label" style="color:#9fa5a7;font-size:11px">
                                            المسمى الوظيفي
                                        </label>
                                    </div>
                                    <input type="text" disabled="" class="form-control" value="">
                                </div>
                                <div class="col-6 col-md-6 col-lg-4">
                                    <div class="input-holder mt-3">
                                        <label for="" class="form-label" style="color:#9fa5a7;font-size:11px">
                                            المستوي الوظيفي
                                        </label>
                                    </div>
                                    <input type="text" disabled="" class="form-control" value="">
                                </div>
                                <div class="col-6 col-md-6 col-lg-4">
                                    <div class="input-holder mt-3">
                                        <label for="" class="form-label" style="color:#9fa5a7;font-size:11px">
                                            الدرجة الوظيفية
                                        </label>
                                        <input type="text" disabled="" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="col-6 col-md-6 col-lg-4">
                                    <div class="input-holder mt-3">
                                        <label for="" class="form-label" style="color:#9fa5a7;font-size:11px">
                                            البدلات
                                        </label>
                                        <input type="text" disabled="" class="form-control" value="600">
                                    </div>
                                </div>
                                <div class="col-6 col-md-6 col-lg-4">
                                    <div class="input-holder mt-3">
                                        <label for="" class="form-label" style="color:#9fa5a7;font-size:11px">
                                            الحسميات
                                        </label>
                                        <input type="text" disabled="" class="form-control" value="0">
                                    </div>
                                </div>
                                <div class="col-6 col-md-6 col-lg-4">
                                    <div class="input-holder mt-3">
                                        <label for="" class="form-label" style="color:#9fa5a7;font-size:11px">
                                            العلاوات
                                        </label>
                                        <input type="text" disabled="" class="form-control" value="0">
                                    </div>
                                </div>
                                <div class="col-6 col-md-6 col-lg-4">
                                    <div class="input-holder mt-3">
                                        <label for="" class="form-label" style="color:#9fa5a7;font-size:11px">
                                            تذاكر الطيران
                                        </label>
                                        <input type="text" disabled="" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="col-6 col-md-6 col-lg-4">
                                    <div class="input-holder mt-3">
                                        <label for="" class="form-label" style="color:#9fa5a7;font-size:11px">
                                            العلاوة السنوية
                                        </label>
                                        <input type="text" disabled="" class="form-control" value="">
                                    </div>
                                </div>
                            </div>
                            <hr>
                        </div>
                    </div>
                    <div class="col-6 col-md-6">
                        <div class="content-section">
                            <div class="title my-2 p-2" style="background: #2E5789;">
                                <h3 class="mb-0 text-white" style="font-size:14px">
                                    الاجازات و الغياب
                                </h3>
                            </div>
                            <div class="row gx-3">
                                <div class="col-6 col-md-6 col-lg-4">
                                    <div class="input-holder mt-3">
                                        <label for="" class="form-label" style="color:#9fa5a7;font-size:11px">
                                            الرصيد الحالي
                                        </label>
                                    </div>
                                    <input type="text" disabled="" class="form-control" value="0">
                                </div>
                                <div class="col-6 col-md-6 col-lg-4">
                                    <div class="input-holder mt-3">
                                        <label for="" class="form-label" style="color:#9fa5a7;font-size:11px">
                                            الغياب
                                        </label>
                                    </div>
                                    <input type="text" disabled="" class="form-control" value="">
                                </div>
                                <div class="col-6 col-md-6 col-lg-4">
                                    <div class="input-holder mt-3">
                                        <label for="" class="form-label" style="color:#9fa5a7;font-size:11px">
                                            الإنذارات
                                        </label>
                                        <input type="text" disabled="" class="form-control" value="">
                                    </div>
                                </div>
                            </div>
                            <hr>
                        </div>
                    </div>
                    <div class="col-6 col-md-6">
                        <div class="content-section">
                            <div class="title my-2 p-2" style="background: #2E5789;">
                                <h3 class="mb-0 text-white" style="font-size:14px">
                                    خروج / عودة
                                </h3>
                            </div>
                            <div class="row gx-3">
                                <div class="col-6 col-md-6 col-lg-4">
                                    <div class="input-holder mt-3">
                                        <label for="" class="form-label" style="color:#9fa5a7;font-size:11px">
                                            تاريخ الخروج
                                        </label>
                                    </div>
                                    <input type="date" disabled="" class="form-control" value="">
                                </div>
                                <div class="col-6 col-md-6 col-lg-4">
                                    <div class="input-holder mt-3">
                                        <label for="" class="form-label" style="color:#9fa5a7;font-size:11px">
                                            تاريخ العودة
                                        </label>
                                    </div>
                                    <input type="date" disabled="" class="form-control" value="">
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
                <div class="col-6 col-md-6">
                    <div class="content-section">
                        <div class="title my-2 p-2" style="background: #2E5789;">
                            <h3 class="mb-0 text-white" style="font-size:14px">
                                المشاريع
                            </h3>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
