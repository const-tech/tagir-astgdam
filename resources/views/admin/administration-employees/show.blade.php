@extends('admin.layouts.admin')
@section('content')
    <div class="main-side">
        <div class="main-title">
            <div class="small">
                {{ __('admin.Home') }}
            </div>
            <div class="large">
                ملف العضو / خالد الغامدي بن المولد
            </div>
        </div>
        <div class="row g-3" x-data="{ show: 'deal' }">
            <div class="col-12 col-md-3 col-lg-4">
                <div class="profile-bar">
                    <div class="main-info">
                        <div class="user">
                            <div class="img-holder"><img src="{{ asset('admin-asset/img/no-image.jpeg') }}"
                                    alt="user photo">
                                <div class="icon-holder">
                                    <i class="fa-solid fa-circle-check"></i>
                                </div>
                            </div>
                            <div class="data">
                                <p class="name">خالد الغامدي</p><span class="title"></span>
                            </div>
                        </div>
                        <span class="status">نشيط</span>
                    </div>
                    <ul class="bar-list-no">
                        <li>
                            <div class="key">
                                <i class="fa-solid fa-user"></i>
                                <span class="name">المدير/المشرف المباشر</span>
                                <button type="button" class="tooltip-ques" data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-title="المدير/المشرف المباشر">
                                    <i class="fas fa-circle-question"></i>
                                </button>
                            </div>
                            <a class="value" href="#">مروان ناصر</a>
                        </li>
                        <li>
                            <div class="key">
                                <i class="fa-solid fa-envelope"></i>
                                <span class="name"> بريد الالكتروني</span>
                            </div>
                            <p class="value">marwan.nasser@gmail.com</p>
                        </li>
                    </ul>
                    <div class="nav flex-column list-option">
                        <!-- اتفاقيه -->
                        <button @click="show = 'deal'" :class="{ 'active': show === 'deal' }" class="nav-link">
                            <div class="name">
                                <i class="fa-solid fa-lock"></i>
                                اتفافية
                            </div>
                            <i class="fa-solid fa-angle-left"></i>
                        </button>
                        <!-- معلومات اساسية -->
                        <button @click="show = 'mainInfo'" :class="{ 'active': show === 'mainInfo' }" class="nav-link">
                            <div class="name">
                                <i class="fa-brands fa-wpforms"></i>
                                معلومات اساسية
                            </div>
                            <i class="fa-solid fa-angle-left arrow"></i>
                        </button>
                        <!-- معلومات شخصية -->
                        <button @click="show = 'personalInfo'" :class="{ 'active': show === 'personalInfo' }" class="nav-link">
                            <div class="name">
                                <i class="fa-solid fa-user"></i>
                                معلومات شخصية
                            </div>
                            <i class="fa-solid fa-angle-left arrow"></i>
                        </button>
                        <!-- الصوره الشخصيه -->
                        <button @click="show = 'personalImage'" :class="{ 'active': show === 'personalImage' }" class="nav-link">
                            <div class="name">
                                <i class="fa-regular fa-image"></i>
                                الصوره الشخصيه
                            </div>
                            <i class="fa-solid fa-angle-left arrow"></i>
                        </button>
                        <!-- معلومات الدخول للموقع -->
                        <button @click="show = 'loginInfo'" :class="{ 'active': show === 'loginInfo' }" class="nav-link">
                            <div class="name">
                                <i class="fa-solid fa-book"></i>
                                معلومات الدخول للموقع
                            </div>
                            <i class="fa-solid fa-angle-left arrow"></i>
                        </button>
                        <!-- وثائق -->
                        <button @click="show = 'documents'" :class="{ 'active': show === 'documents' }" class="nav-link">
                            <div class="name">
                                <i class="fa-solid fa-file-lines"></i>
                                وثائق
                            </div>
                            <i class="fa-solid fa-angle-left arrow"></i>
                        </button>
                        <!-- تغيير كلمة المرور -->
                        <button @click="show = 'changePassword'" :class="{ 'active': show === 'changePassword' }" class="nav-link">
                            <div class="name">
                                <i class="fa-solid fa-shield"></i>
                                تغيير كلمة المرور
                            </div>
                            <i class="fa-solid fa-angle-left arrow"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-9 col-lg-8">
                    <!-- اتفاقيه -->
                    <div class="content-holder" x-show="show === 'deal'" x-transition>
                        <div class="alert alert-info fs-13px" role="alert">
                            <div class="title mb-2">
                                <i class="fa-solid fa-circle-info"></i>
                                بنود العقد
                            </div>
                            تحديد خيارات الرواتب مع بداية العقد وتاريخ انتهاء.
                        </div>
                        <div class="content_view">
                            <div class="content_header">
                                <div class="title fs-11px">
                                    <i class="fa-solid fa-lock fs-12px main-color"></i>
                                    تعيين العقد
                                </div>
                            </div>
                            <ul class="nav nav-pills mb-3 main-tab-color" id="pills-tab" role="tablist">
                                <!-- اتفاقية -->
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pills-deal-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-deal" type="button" role="tab" aria-selected="true">
                                        اتفاقية
                                    </button>
                                </li>
                                <!-- البدلات -->
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-allowances-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-allowances" type="button" role="tab"
                                        aria-selected="false">
                                        البدلات
                                    </button>
                                </li>
                                <!-- العمولات -->
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-commotion-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-commotion" type="button" role="tab"
                                        aria-selected="false">
                                        العمولات
                                    </button>
                                </li>
                                <!-- الحسميات -->
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-ended-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-ended" type="button" role="tab"
                                        aria-selected="false">
                                        الحسميات
                                    </button>
                                </li>
                                <!-- تسديد -->
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-pay-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-pay" type="button" role="tab" aria-selected="false">
                                        تسديد
                                    </button>
                                </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <!-- اتفاقية -->
                                <div class="tab-pane fade show active" id="pills-deal" role="tabpanel">
                                    <form action="" method="" class="row g-4">
                                        <div class="col-12 col-md-6">
                                            <div class="inp-holder">
                                                <label for="" class="small-label">بداية العقد <span
                                                        class="text-danger">*</span></label>
                                                <div class="input-group flex-nowrap">
                                                    <input type="date" class="form-control"
                                                        aria-describedby="addon-wrapping" />
                                                    <span class="input-group-text" id="addon-wrapping">
                                                        <i class="fa-solid fa-calendar-days"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="inp-holder">
                                                <label for="" class="small-label">نهاية العقد</label>
                                                <div class="input-group flex-nowrap">
                                                    <input type="date" class="form-control"
                                                        aria-describedby="addon-wrapping" />
                                                    <span class="input-group-text" id="addon-wrapping">
                                                        <i class="fa-solid fa-calendar-days"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label for="" class="small-label">
                                                الأقسام/الفروع
                                                <span class="text-danger">*</span>
                                            </label>
                                            <select name="" id="" class="form-select">
                                                <option value="">اختر قسم</option>
                                            </select>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label for="" class="small-label">
                                                المسمى الوظيفي
                                                <span class="text-danger">*</span>
                                            </label>
                                            <select name="" id="" class="form-select">
                                                <option value="">اختر المسمي</option>
                                            </select>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <label for="" class="small-label">راتب اساسي <span
                                                    class="text-danger">*</span></label>
                                            <div class="input-group flex-nowrap">
                                                <span class="input-group-text fs-12px" id="addon-wrapping">SAR</span>
                                                <input type="number" class="form-control"
                                                    aria-describedby="addon-wrapping" />
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <label for="" class="small-label">المعدل بالساعة</label>
                                            <div class="input-group flex-nowrap">
                                                <span class="input-group-text fs-12px" id="addon-wrapping">SAR</span>
                                                <input type="number" class="form-control"
                                                    aria-describedby="addon-wrapping" />
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <label for="" class="small-label">
                                                نوع كشف الراتب
                                                <span class="text-danger">*</span>
                                            </label>
                                            <select name="" id="" class="form-select">
                                                <option value="">اختر النوع</option>
                                            </select>
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <label for="" class="small-label">
                                                الورديات/الشفتات
                                                <span class="text-danger">*</span>
                                            </label>
                                            <select name="" id="" class="form-select">
                                                <option value="">اختر الورديه / الشفت</option>
                                            </select>
                                        </div>
                                        <div class="col-12 col-md-12">
                                            <div class="inp-holder">
                                                <label for="" class="small-label">الوصف الوظيفي <span
                                                        class="text-danger">*</span></label>
                                                <textarea class="form-control" id="" rows="3"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-12">
                                            <button class="btn btn-sm main-btn">تحديث العقد</button>
                                        </div>
                                    </form>
                                </div>
                                <!-- البدلات -->
                                <div class="tab-pane fade" id="pills-allowances" role="tabpanel">
                                    <form action="" method="" class="row g-4">
                                        <div class="col-12 col-md-12">
                                            <label for="" class="small-label mb-0">عرض الكل البدلات</label>
                                        </div>
                                        <div class="col-12 col-md-12">
                                            <div class="row g-3">
                                                <div class="col-sm-12 col-md-6">
                                                    <div class="d-flex align-items-center gap-1">
                                                        عرض
                                                        <select class="form-select w-auto form-select-sm">
                                                            <option value="10">10</option>
                                                            <option value="25">25</option>
                                                            <option value="50">50</option>
                                                            <option value="100">100</option>
                                                        </select>
                                                        سجلات
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-6">
                                                    <div class="d-flex align-items-center gap-1">
                                                        بحث
                                                        <input type="search"
                                                            class="search-table form-control w-auto form-control-sm" />
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-12">
                                                    <div class="main-table table-responsive">
                                                        <table class="table table-borderless">
                                                            <tr>
                                                                <th>مسمى/عنوان</th>
                                                                <th>مبلغ</th>
                                                                <th>خيارات البدلات</th>
                                                                <th>خيارات المبلغ</th>
                                                                <th>التحكم</th>
                                                            </tr>
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        بدل خطر
                                                                    </td>
                                                                    <td>200.00</td>
                                                                    <td>بدون ضرائب</td>
                                                                    <td>ثابت</td>
                                                                    <td>
                                                                        <div class="d-flex align-items-center gap-1">
                                                                            <button type="button"
                                                                                class="btn btn-sm btn-outline-primary">
                                                                                <i class="fa-solid fa-pen-to-square"></i>
                                                                            </button>
                                                                            <button type="button"
                                                                                class="btn btn-sm btn-outline-danger">
                                                                                <i class="fa-solid fa-trash-can"></i>
                                                                            </button>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <ul
                                                        class="pagination main-pagination mt-3 mb-0 d-flex justify-content-end">
                                                        <li class="page-item">
                                                            <a class="page-link" href="#">سابق</a>
                                                        </li>
                                                        <li class="page-item active">
                                                            <a class="page-link" href="#">1</a>
                                                        </li>
                                                        <li class="page-item">
                                                            <a class="page-link" href="#">تالي</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label for="" class="small-label">مسمى/عنوان <span
                                                    class="text-danger">*</span></label>
                                            <div class="input-holer">
                                                <input type="text" class="form-control" placeholder="مسمى/عنوان" />
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label for="" class="small-label">مبلغ</label>
                                            <div class="input-group flex-nowrap">
                                                <span class="input-group-text fs-12px" id="addon-wrapping">SAR</span>
                                                <input type="number" class="form-control" placeholder="مبلغ"
                                                    aria-describedby="addon-wrapping" />
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label for="" class="small-label">
                                                خيارات البدلات
                                                <span class="text-danger">*</span>
                                            </label>
                                            <select name="" id="" class="form-select">
                                                <option value="">بدون ضرائب</option>
                                                <option value="">شامل الضريبة</option>
                                            </select>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label for="" class="small-label">
                                                خيارات المبلغ
                                                <span class="text-danger">*</span>
                                            </label>
                                            <select name="" id="" class="form-select">
                                                <option value="">ثابت</option>
                                                <option value="">مئوي</option>
                                            </select>
                                        </div>
                                        <div class="col-12 col-md-12">
                                            <button class="btn btn-sm main-btn px-4">حفظ</button>
                                        </div>
                                    </form>
                                </div>
                                <!-- العمولات -->
                                <div class="tab-pane fade" id="pills-commotion" role="tabpanel">
                                    <form action="" method="" class="row g-4">
                                        <div class="col-12 col-md-12">
                                            <label for="" class="small-label mb-0">عرض الكل العمولات</label>
                                        </div>
                                        <div class="col-12 col-md-12">
                                            <div class="row g-3">
                                                <div class="col-sm-12 col-md-6">
                                                    <div class="d-flex align-items-center gap-1">
                                                        عرض
                                                        <select class="form-select w-auto form-select-sm">
                                                            <option value="10">10</option>
                                                            <option value="25">25</option>
                                                            <option value="50">50</option>
                                                            <option value="100">100</option>
                                                        </select>
                                                        سجلات
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-6">
                                                    <div class="d-flex align-items-center gap-1">
                                                        بحث
                                                        <input type="search"
                                                            class="search-table form-control w-auto form-control-sm" />
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-12">
                                                    <div class="main-table table-responsive">
                                                        <table class="table table-borderless">
                                                            <tr>
                                                                <th>مسمى/عنوان</th>
                                                                <th>مبلغ</th>
                                                                <th>خيارات العمولة</th>
                                                                <th>خيارات المبلغ</th>
                                                                <th>التحكم</th>
                                                            </tr>
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        بدل خطر
                                                                    </td>
                                                                    <td>200.00</td>
                                                                    <td>بدون ضرائب</td>
                                                                    <td>ثابت</td>
                                                                    <td>
                                                                        <div class="d-flex align-items-center gap-1">
                                                                            <button type="button"
                                                                                class="btn btn-sm btn-outline-primary">
                                                                                <i class="fa-solid fa-pen-to-square"></i>
                                                                            </button>
                                                                            <button type="button"
                                                                                class="btn btn-sm btn-outline-danger">
                                                                                <i class="fa-solid fa-trash-can"></i>
                                                                            </button>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <ul
                                                        class="pagination main-pagination mt-3 mb-0 d-flex justify-content-end">
                                                        <li class="page-item">
                                                            <a class="page-link" href="#">سابق</a>
                                                        </li>
                                                        <li class="page-item active">
                                                            <a class="page-link" href="#">1</a>
                                                        </li>
                                                        <li class="page-item">
                                                            <a class="page-link" href="#">تالي</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label for="" class="small-label">مسمى/عنوان <span
                                                    class="text-danger">*</span></label>
                                            <div class="input-holer">
                                                <input type="text" class="form-control" placeholder="مسمى/عنوان" />
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label for="" class="small-label">مبلغ</label>
                                            <div class="input-group flex-nowrap">
                                                <span class="input-group-text fs-12px" id="addon-wrapping">SAR</span>
                                                <input type="number" class="form-control" placeholder="مبلغ"
                                                    aria-describedby="addon-wrapping" />
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label for="" class="small-label">
                                                خيارات العمولة
                                                <span class="text-danger">*</span>
                                            </label>
                                            <select name="" id="" class="form-select">
                                                <option value="">بدون ضرائب</option>
                                                <option value="">شامل الضريبة</option>
                                            </select>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label for="" class="small-label">
                                                خيارات المبلغ
                                                <span class="text-danger">*</span>
                                            </label>
                                            <select name="" id="" class="form-select">
                                                <option value="">ثابت</option>
                                                <option value="">مئوي</option>
                                            </select>
                                        </div>
                                        <div class="col-12 col-md-12">
                                            <button class="btn btn-sm main-btn px-4">حفظ</button>
                                        </div>
                                    </form>
                                </div>
                                <!-- الحسميات -->
                                <div class="tab-pane fade" id="pills-ended" role="tabpanel">
                                    <form action="" method="" class="row g-4">
                                        <div class="col-12 col-md-12">
                                            <label for="" class="small-label mb-0">عرض الكل الحسميات</label>
                                        </div>
                                        <div class="col-12 col-md-12">
                                            <div class="row g-3">
                                                <div class="col-sm-12 col-md-6">
                                                    <div class="d-flex align-items-center gap-1">
                                                        عرض
                                                        <select class="form-select w-auto form-select-sm">
                                                            <option value="10">10</option>
                                                            <option value="25">25</option>
                                                            <option value="50">50</option>
                                                            <option value="100">100</option>
                                                        </select>
                                                        سجلات
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-6">
                                                    <div class="d-flex align-items-center gap-1">
                                                        بحث
                                                        <input type="search"
                                                            class="search-table form-control w-auto form-control-sm" />
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-12">
                                                    <div class="main-table table-responsive">
                                                        <table class="table table-borderless">
                                                            <tr>
                                                                <th>مسمى/عنوان</th>
                                                                <th>مبلغ</th>
                                                                <th>خيارات الخصم</th>
                                                                <th>التحكم</th>
                                                            </tr>
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        بدل خطر
                                                                    </td>
                                                                    <td>200.00</td>
                                                                    <td>بدون ضرائب</td>
                                                                    <td>
                                                                        <div class="d-flex align-items-center gap-1">
                                                                            <button type="button"
                                                                                class="btn btn-sm btn-outline-primary">
                                                                                <i class="fa-solid fa-pen-to-square"></i>
                                                                            </button>
                                                                            <button type="button"
                                                                                class="btn btn-sm btn-outline-danger">
                                                                                <i class="fa-solid fa-trash-can"></i>
                                                                            </button>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <ul
                                                        class="pagination main-pagination mt-3 mb-0 d-flex justify-content-end">
                                                        <li class="page-item">
                                                            <a class="page-link" href="#">سابق</a>
                                                        </li>
                                                        <li class="page-item active">
                                                            <a class="page-link" href="#">1</a>
                                                        </li>
                                                        <li class="page-item">
                                                            <a class="page-link" href="#">تالي</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <label for="" class="small-label">مسمى/عنوان <span
                                                    class="text-danger">*</span></label>
                                            <div class="input-holer">
                                                <input type="text" class="form-control" placeholder="مسمى/عنوان" />
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <label for="" class="small-label">مبلغ</label>
                                            <div class="input-group flex-nowrap">
                                                <span class="input-group-text fs-12px" id="addon-wrapping">SAR</span>
                                                <input type="number" class="form-control" placeholder="مبلغ"
                                                    aria-describedby="addon-wrapping" />
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <label for="" class="small-label">
                                                خيارات الخصم
                                                <span class="text-danger">*</span>
                                            </label>
                                            <select name="" id="" class="form-select">
                                                <option value="">بدون ضرائب</option>
                                                <option value="">شامل الضريبة</option>
                                            </select>
                                        </div>
                                        <div class="col-12 col-md-12">
                                            <button class="btn btn-sm main-btn px-4">حفظ</button>
                                        </div>
                                    </form>
                                </div>
                                <!-- تسديد -->
                                <div class="tab-pane fade" id="pills-pay" role="tabpanel">
                                    <form action="" method="" class="row g-4">
                                        <div class="col-12 col-md-12">
                                            <label for="" class="small-label mb-0">عرض الكل تسديد</label>
                                        </div>
                                        <div class="col-12 col-md-12">
                                            <div class="row g-3">
                                                <div class="col-sm-12 col-md-6">
                                                    <div class="d-flex align-items-center gap-1">
                                                        عرض
                                                        <select class="form-select w-auto form-select-sm">
                                                            <option value="10">10</option>
                                                            <option value="25">25</option>
                                                            <option value="50">50</option>
                                                            <option value="100">100</option>
                                                        </select>
                                                        سجلات
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-6">
                                                    <div class="d-flex align-items-center gap-1">
                                                        بحث
                                                        <input type="search"
                                                            class="search-table form-control w-auto form-control-sm" />
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-12">
                                                    <div class="main-table table-responsive">
                                                        <table class="table table-borderless">
                                                            <tr>
                                                                <th>مسمى/عنوان</th>
                                                                <th>مبلغ</th>
                                                                <th>طرق السداد</th>
                                                                <th>خيارات المبلغ</th>
                                                                <th>التحكم</th>
                                                            </tr>
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        بدل خطر
                                                                    </td>
                                                                    <td>200.00</td>
                                                                    <td>بدون ضرائب</td>
                                                                    <td>ثابت</td>
                                                                    <td>
                                                                        <div class="d-flex align-items-center gap-1">
                                                                            <button type="button"
                                                                                class="btn btn-sm btn-outline-primary">
                                                                                <i class="fa-solid fa-pen-to-square"></i>
                                                                            </button>
                                                                            <button type="button"
                                                                                class="btn btn-sm btn-outline-danger">
                                                                                <i class="fa-solid fa-trash-can"></i>
                                                                            </button>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <ul
                                                        class="pagination main-pagination mt-3 mb-0 d-flex justify-content-end">
                                                        <li class="page-item">
                                                            <a class="page-link" href="#">سابق</a>
                                                        </li>
                                                        <li class="page-item active">
                                                            <a class="page-link" href="#">1</a>
                                                        </li>
                                                        <li class="page-item">
                                                            <a class="page-link" href="#">تالي</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label for="" class="small-label">مسمى/عنوان <span
                                                    class="text-danger">*</span></label>
                                            <div class="input-holer">
                                                <input type="text" class="form-control" placeholder="مسمى/عنوان" />
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label for="" class="small-label">مبلغ</label>
                                            <div class="input-group flex-nowrap">
                                                <span class="input-group-text fs-12px" id="addon-wrapping">SAR</span>
                                                <input type="number" class="form-control" placeholder="مبلغ"
                                                    aria-describedby="addon-wrapping" />
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label for="" class="small-label">
                                                طرق السداد
                                                <span class="text-danger">*</span>
                                            </label>
                                            <select name="" id="" class="form-select">
                                                <option value="">بدون ضرائب</option>
                                                <option value="">شامل الضريبة</option>
                                            </select>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label for="" class="small-label">
                                                خيارات المبلغ
                                                <span class="text-danger">*</span>
                                            </label>
                                            <select name="" id="" class="form-select">
                                                <option value="">ثابت</option>
                                                <option value="">مئوي</option>
                                            </select>
                                        </div>
                                        <div class="col-12 col-md-12">
                                            <button class="btn btn-sm main-btn px-4">حفظ</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- معلومات اساسية -->
                    <div class="content-holder" x-show="show === 'mainInfo'" x-transition>
                        <div class=" content_view">
                            <div class="content_header">
                                <div class="title fs-11px">
                                    <i class="fa-brands fa-wpforms fs-12px main-color"></i>
                                    معلومات اساسية
                                </div>
                            </div>
                            <form action="" method="" class="row g-4">
                                <div class="col-12 col-md-6">
                                    <div class="inp-holder">
                                        <label for="" class="small-label">الاسم الاول
                                            <span class="text-danger">*</span></label>
                                        <div class="input-group flex-nowrap">
                                            <input type="text" class="form-control"
                                                aria-describedby="addon-wrapping" />
                                            <span class="input-group-text" id="addon-wrapping">
                                                <i class="fa-solid fa-user"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="inp-holder">
                                        <label for="" class="small-label">اسم العائلة
                                            <span class="text-danger">*</span></label>
                                        <div class="input-group flex-nowrap">
                                            <input type="text" class="form-control"
                                                aria-describedby="addon-wrapping" />
                                            <span class="input-group-text" id="addon-wrapping">
                                                <i class="fa-solid fa-user"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="inp-holder">
                                        <label for="" class="small-label">رقم الاتصال
                                            <span class="text-danger">*</span></label>
                                        <div class="input-holder">
                                            <input type="tel" class="form-control" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label for="" class="small-label"> جنس </label>
                                    <select name="" id="" class="form-select">
                                        <option>1</option>
                                    </select>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4">
                                    <label for="" class="small-label">
                                        رقم الموظف
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="number" name="" class="form-control" id="" />
                                </div>
                                <div class="col-12 col-md-6 col-lg-4">
                                    <label for="" class="small-label">تاريخ الميلاد </label>
                                    <div class="input-group flex-nowrap">
                                        <input type="text" class="form-control" aria-describedby="addon-wrapping" />
                                        <span class="input-group-text fs-12px" id="addon-wrapping">
                                            <i class="fa-solid fa-calendar-days"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4">
                                    <label for="" class="small-label">حالة</label>
                                    <div class="input-holder">
                                        <select name="" id="" class="form-select">
                                            <option></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <label for="" class="small-label">
                                        الحالة الإجتماعية
                                    </label>
                                    <select name="" id="" class="form-select">
                                        <option value=""></option>
                                    </select>
                                </div>
                                <div class="col-12 col-md-4">
                                    <label for="" class="small-label">
                                        دور
                                        <span class="text-danger">*</span>
                                    </label>
                                    <select name="" id="" class="form-select">
                                        <option value=""></option>
                                    </select>
                                </div>
                                <div class="col-12 col-md-4">
                                    <label for="" class="small-label">
                                        السكن
                                    </label>
                                    <input type="text" name="" id="" class="form-control">
                                </div>
                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="inp-holder">
                                        <label for="" class="small-label">الدولة / المقاطعة</label>
                                        <div class="input-holder">
                                            <input type="text" class="form-control" value=""
                                                placeholder="الدولة / المقاطعة" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="inp-holder">
                                        <label for="" class="small-label">مدينة</label>
                                        <div class="input-holder">
                                            <input type="text" class="form-control" value=""
                                                placeholder="مدينة" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="inp-holder">
                                        <label for="" class="small-label">الرمز البريدي / الرمز البريدي</label>
                                        <div class="input-holder">
                                            <input type="text" class="form-control" value=""
                                                placeholder="الرمز البريدي / الرمز البريدي" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="inp-holder">
                                        <label for="" class="small-label">الديانة</label>
                                        <div class="input-holder">
                                            <select name="" id="" class="form-select">
                                                <option value="">الديانة</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="inp-holder">
                                        <label for="" class="small-label">فصيلة الدم</label>
                                        <div class="input-holder">
                                            <select name="" id="" class="form-select">
                                                <option value="">فصيلة الدم</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="inp-holder">
                                        <label for="" class="small-label">جنسية</label>
                                        <div class="input-holder">
                                            <select name="" id="" class="form-select">
                                                <option>
                                                    5
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="inp-holder">
                                        <label for="" class="small-label">رقم الإقامة
                                            <span class="text-danger">*</span></label>
                                        <div class="input-holder">
                                            <input type="number" name="" value="" class="form-control"
                                                id="" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="inp-holder">
                                        <label for="" class="small-label">تاريخ نهاية الإقامة
                                            <span class="text-danger">*</span></label>
                                        <div class="input-holder">
                                            <input type="text" name="" value="" class="form-control"
                                                id="" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="inp-holder">
                                        <label for="" class="small-label">مبلغ التامين الطبي السنوي</label>
                                        <div class="input-holder">
                                            <input type="number" name="" value="" class="form-control"
                                                id="" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="inp-holder">
                                        <label for="" class="small-label">رسوم الإقامة سنويا</label>
                                        <div class="input-holder">
                                            <input type="number" name="" value="" class="form-control"
                                                id="" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="inp-holder">
                                        <label for="" class="small-label">العنوان السطر 1</label>
                                        <div class="input-holder">
                                            <input type="text" name="" value=""
                                                placeholder="العنوان السطر 1" class="form-control" id="" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="inp-holder">
                                        <label for="" class="small-label">العنوان السطر 2</label>
                                        <div class="input-holder">
                                            <input type="text" name="" value=""
                                                placeholder="العنوان السطر 2" class="form-control" id="" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-12">
                                    <button class="btn btn-sm main-btn">
                                        تحديث الملف الشخصي
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- معلومات شخصية -->
                    <div class="content-holder" x-show="show === 'personalInfo'" x-transition>
                        <div class=" content_view">
                            <div class="content_header">
                                <div class="title fs-11px">
                                    <i class="fa-solid fa-user fs-12px main-color"></i>
                                    معلومات شخصية
                                </div>
                            </div>
                            <ul class="nav nav-tabs tap-outline-color" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <!-- السيرة الذاتية -->
                                    <button class="nav-link active" id="about-tab" data-bs-toggle="tab"
                                        data-bs-target="#about-tab-pane" type="button" role="tab"
                                        aria-selected="true">
                                        السيرة الذاتية
                                    </button>
                                </li>
                                <!-- الملف الشخصي الاجتماعي -->
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="social-tab" data-bs-toggle="tab"
                                        data-bs-target="#social-tab-pane" type="button" role="tab"
                                        aria-selected="false">
                                        الملف الشخصي الاجتماعي
                                    </button>
                                </li>
                                <!-- حساب البنك -->
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="bank-tab" data-bs-toggle="tab"
                                        data-bs-target="#bank-tab-pane" type="button" role="tab"
                                        aria-selected="false">
                                        حساب البنك
                                    </button>
                                </li>
                                <!-- الاتصال بالطوارىء -->
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="call-tab" data-bs-toggle="tab"
                                        data-bs-target="#call-tab-pane" type="button" role="tab"
                                        aria-selected="false">
                                        الاتصال بالطوارىء
                                    </button>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <!-- السيرة الذاتية -->
                                <div class="tab-pane fade show active" id="about-tab-pane" role="tabpanel">
                                    <form action="" method="" class="row g-4 py-3">
                                        <div class="col-12 col-md-12">
                                            <div class="inp-holder">
                                                <label for="" class="small-label">السيرة الذاتية <span
                                                        class="text-danger">*</span></label>
                                                <textarea class="form-control" id="" rows="4"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <label for="" class="small-label"> خبرة </label>
                                            <select name="" id="" class="form-select">
                                                <option value=""></option>
                                            </select>
                                        </div>
                                        <div class="col-12 col-md-12">
                                            <button class="btn btn-sm main-btn">تحديث السيرة</button>
                                        </div>
                                    </form>
                                </div>
                                <!-- الملف الشخصي الاجتماعي -->
                                <div class="tab-pane fade" id="social-tab-pane" role="tabpanel">
                                    <form action="" method="" class="row g-4 py-3">
                                        <div class="col-12 col-md-12">
                                            <label for="" class="small-label">Facebook</label>
                                            <div class="input-group flex-nowrap">
                                                <span class="input-group-text" id="addon-wrapping"><i
                                                        class="fa-brands fa-facebook-f"></i>
                                                </span>
                                                <input type="url" name="" id=""
                                                    aria-describedby="addon-wrapping" class="form-control"
                                                    placeholder="رابط الملف الشخصي" />
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-12">
                                            <label for="" class="small-label">Twitter</label>
                                            <div class="input-group flex-nowrap">
                                                <span class="input-group-text" id="addon-wrapping"><i
                                                        class="fa-brands fa-twitter"></i>
                                                </span>
                                                <input type="url" name="" id=""
                                                    aria-describedby="addon-wrapping" class="form-control"
                                                    placeholder="رابط الملف الشخصي" />
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-12">
                                            <label for="" class="small-label">Google Plus</label>
                                            <div class="input-group flex-nowrap">
                                                <span class="input-group-text" id="addon-wrapping"><i
                                                        class="fa-brands fa-google-plus-g"></i>
                                                </span>
                                                <input type="url" name="" id=""
                                                    aria-describedby="addon-wrapping" class="form-control"
                                                    placeholder="رابط الملف الشخصي" />
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-12">
                                            <label for="" class="small-label">Linkedin</label>
                                            <div class="input-group flex-nowrap">
                                                <span class="input-group-text" id="addon-wrapping"><i
                                                        class="fa-brands fa-linkedin-in"></i>
                                                </span>
                                                <input type="url" name="" id=""
                                                    aria-describedby="addon-wrapping" class="form-control"
                                                    placeholder="رابط الملف الشخصي" />
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-12">
                                            <button class="btn btn-sm main-btn">
                                                تحديث حسابات التواصل
                                            </button>
                                        </div>
                                    </form>
                                </div>
                                <!-- حساب البنك -->
                                <div class="tab-pane fade" id="bank-tab-pane" role="tabpanel">
                                    <form action="" method="" class="row g-4 py-3">
                                        <div class="col-12 col-md-6">
                                            <label for="" class="small-label">
                                                اسم الحساب
                                                <span class="text-danger">*</span></label>
                                            <div class="inp-holder">
                                                <input type="text" name="" id="" class="form-control"
                                                    placeholder="اسم الحساب" />
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label for="" class="small-label">
                                                رقم الحساب البنكي
                                                <span class="text-danger">*</span></label>
                                            <div class="inp-holder">
                                                <input type="text" name="" id="" class="form-control"
                                                    placeholder="رقم الحساب البنكي" />
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label for="" class="small-label">
                                                اسم البنك
                                                <span class="text-danger">*</span></label>
                                            <div class="inp-holder">
                                                <input type="text" name="" id="" class="form-control"
                                                    placeholder="اسم البنك" />
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label for="" class="small-label">
                                                رقم الآيبان
                                                <span class="text-danger">*</span></label>
                                            <div class="inp-holder">
                                                <input type="number" name="" id="" class="form-control"
                                                    placeholder="رقم الآيبان" />
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label for="" class="small-label">
                                                Swift Code
                                                <span class="text-danger">*</span></label>
                                            <div class="inp-holder">
                                                <input type="number" name="" id="" class="form-control"
                                                    placeholder="Swift Code" />
                                            </div>
                                        </div>
                                        <hr class="m-0 bg-transparent border-0" />
                                        <div class="col-12 col-md">
                                            <div class="inp-holder">
                                                <label for="" class="small-label">فرع بنك <span
                                                        class="text-danger">*</span></label>
                                                <textarea class="form-control" placeholder="فرع بنك" id="" rows="4"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-12">
                                            <button class="btn btn-sm main-btn">
                                                تحديث معلومات البنك
                                            </button>
                                        </div>
                                    </form>
                                </div>
                                <!-- الاتصال بالطوارىء -->
                                <div class="tab-pane fade" id="call-tab-pane" role="tabpanel">
                                    <form action="" method="" class="row g-4 py-3">
                                        <div class="col-12 col-md-12">
                                            <label for="" class="small-label">الاسم الكامل <span
                                                    class="text-danger">*</span></label>
                                            <div class="input-group flex-nowrap">
                                                <span class="input-group-text" id="addon-wrapping"><i
                                                        class="fa-solid fa-user"></i>
                                                </span>
                                                <input type="text" name="" id="" value=""
                                                    aria-describedby="addon-wrapping" class="form-control"
                                                    placeholder="الاسم الكامل" />
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label for="" class="small-label">رقم الاتصال <span
                                                    class="text-danger">*</span></label>
                                            <div class="input-holder">
                                                <input type="number" name="" id=""
                                                    aria-describedby="addon-wrapping" class="form-control"
                                                    placeholder="رقم الاتصال" />
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label for="" class="small-label">بريد الالكتروني <span
                                                    class="text-danger">*</span></label>
                                            <div class="input-group flex-nowrap">
                                                <span class="input-group-text" id="addon-wrapping"><i
                                                        class="fa-solid fa-envelope"></i>

                                                </span>
                                                <input type="email" name="" id="" value=""
                                                    aria-describedby="addon-wrapping" class="form-control"
                                                    placeholder="الاسم الكامل" />
                                            </div>
                                        </div>
                                        <div class="col-12 col-md">
                                            <div class="inp-holder">
                                                <label for="" class="small-label">تبوك <span
                                                        class="text-danger">*</span></label>
                                                <textarea class="form-control" placeholder="تبوك" id="" rows="4"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-12">
                                            <button class="btn btn-sm main-btn">
                                                تحديث الاتصال
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- الصوره الشخصيه -->
                    <div class="content-holder" x-show="show === 'personalImage'">
                        <div class=" content_view">
                            <div class="content_header">
                                <div class="title fs-11px">
                                    <i class="fa-regular fa-image fs-12px main-color"></i>
                                    الصوره الشخصيه
                                </div>
                            </div>
                            <form action="" method="" class="row g-4">
                                <div class="col-12 col-md-12">
                                    <div class="inp-holder">
                                        <label for="" class="small-label">الصوره الشخصيه <span
                                                class="text-danger">*</span></label>
                                        <div class="inp-holder">
                                            <input type="file" accept="image/gif, image/jpeg, image/jpg, image/png"
                                                value="" class="form-control" />
                                        </div>
                                        <small class="text-danger">تحميل الملفات فقط: gif, png, jpg, jpeg</small>
                                    </div>
                                </div>
                                <div class="col-12 col-md-12">
                                    <button class="btn btn-sm main-btn">تحديث الصورة</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- معلومات الدخول للموقع -->
                    <div class="content-holder" x-show="show === 'loginInfo'" x-transition>
                        <div class=" content_view">
                            <div class="content_header">
                                <div class="title fs-11px">
                                    <i class="fa-solid fa-book fs-12px main-color"></i>
                                    معلومات الدخول للموقع
                                    <br>
                                    <small>تغيير معلومات حسابك</small>
                                </div>
                            </div>
                            <form action="" method="" class="row g-4">
                                <div class="col-12 col-md-6">
                                    <div class="inp-holder">
                                        <label for="" class="small-label">اسم المستخدم <span
                                                class="text-danger">*</span></label>
                                        <div class="input-group flex-nowrap">
                                            <input type="text" :value="firstName" class="form-control"
                                                aria-describedby="addon-wrapping" />
                                            <span class="input-group-text" id="addon-wrapping">
                                                <i class="fa-solid fa-user"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="inp-holder">
                                        <label for="" class="small-label">حساب البريد الإلكتروني <span
                                                class="text-danger">*</span></label>
                                        <div class="input-group flex-nowrap">
                                            <input type="text" class="form-control" :value="familyName"
                                                aria-describedby="addon-wrapping" />
                                            <span class="input-group-text" id="addon-wrapping">
                                                <i class="fa-solid fa-envelope"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-12">
                                    <button class="btn btn-sm main-btn px-4">
                                        حفظ
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- وثائق -->
                    <div class="content-holder" x-show="show === 'documents'" x-transition>
                        <div class="content_view">
                            <div class="content_header">
                                <div class="title fs-11px">
                                    <i class="fa-solid fa-file-lines fs-12px main-color"></i>
                                    وثائق
                                </div>
                            </div>
                            <form action="" method="" class="row g-4">
                                <div class="col-12 col-md-12">
                                    <div class="row g-3">
                                        <div class="col-sm-12 col-md-6">
                                            <div class="d-flex align-items-center gap-1">
                                                عرض
                                                <select class="form-select w-auto form-select-sm">
                                                    <option value="10">10</option>
                                                    <option value="25">25</option>
                                                    <option value="50">50</option>
                                                    <option value="100">100</option>
                                                </select>
                                                سجلات
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <div class="d-flex align-items-center gap-1">
                                                بحث
                                                <input type="search"
                                                    class="search-table form-control w-auto form-control-sm" />
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-12">
                                            <div class="main-table table-responsive">
                                                <table class="table table-borderless">
                                                    <tr>
                                                        <th>اسم الملف</th>
                                                        <th>نوع الوثيقة</th>
                                                        <th>ملف المستند</th>
                                                        <th>التحكم</th>
                                                    </tr>
                                                    <tbody>
                                                        <tr>
                                                            <td>اختبار</td>
                                                            <td>اختبار</td>
                                                            <td>اختبار</td>
                                                            <td>
                                                                <div class="d-flex align-items-center gap-1">
                                                                    <button type="button"
                                                                        class="btn btn-sm btn-outline-primary">
                                                                        <i class="fa-solid fa-pen-to-square"></i>
                                                                    </button>
                                                                    <button type="button"
                                                                        class="btn btn-sm btn-outline-danger">
                                                                        <i class="fa-solid fa-trash"></i>
                                                                    </button>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <ul class="pagination main-pagination mt-3 mb-0 d-flex justify-content-end">
                                                <li class="page-item">
                                                    <a class="page-link" href="#">سابق</a>
                                                </li>
                                                <li class="page-item active">
                                                    <a class="page-link" href="#">1</a>
                                                </li>
                                                <li class="page-item">
                                                    <a class="page-link" href="#">تالي</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label for="" class="small-label">اسم الملف <span
                                            class="text-danger">*</span></label>
                                    <div class="input-holer">
                                        <input type="text" class="form-control" placeholder="اسم الملف" />
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label for="" class="small-label">نوع الوثيقة <span
                                            class="text-danger">*</span></label>
                                    <div class="input-holer">
                                        <input type="text" class="form-control" placeholder="نوع الوثيقة" />
                                    </div>
                                </div>
                                <div class="col-12 col-md-12">
                                    <label for="" class="small-label">ملف المستند<span
                                            class="text-danger">*</span></label>
                                    <div class="input-holer">
                                        <input type="file" class="form-control" placeholder="ملف المستند" />
                                    </div>
                                    <small class="text-danger">تحميل الملفات فقط: png, jpg, jpeg, gif, txt, pdf, xls,
                                        xlsx, doc, docx</small>
                                </div>
                                <div class="col-12 col-md-12">
                                    <button class="btn btn-sm main-btn">
                                        إضافة المستند
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- تغيير كلمة المرور -->
                    <div class="content-holder" x-show="show === 'changePassword'" x-transition>
                        <div class="alert alert-warning fs-13px" role="alert">
                            <div class="title mb-2">
                                <i class="fa-solid fa-circle-info"></i>
                                انذار!
                            </div>
                            لا تشارك كلمة المرور هذه لأي شخص.يجب تغيير كلمة المرور مرة واحدة على الأقل
                            في 3 أشهر.
                        </div>
                        <div class=" content_view">
                            <div class="content_header">
                                <div class="title fs-11px">
                                    <i class="fa-solid fa-shield fs-12px main-color"></i>
                                    تغيير كلمة المرور
                                </div>
                            </div>
                            <form action="" method="" class="row g-4">
                                <div class="col-12 col-md-6">
                                    <div class="inp-holder">
                                        <label for="" class="small-label">كلمة المرور الحالية <span
                                                class="text-danger">*</span></label>
                                        <div class="input-group flex-nowrap">
                                            <input type="password" class="form-control" disabled autocomplete="on"
                                                aria-describedby="addon-wrapping" />
                                            <span class="input-group-text" id="addon-wrapping">
                                                <i class="fa-solid fa-eye"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <hr class="m-0 bg-transparent border-0">
                                <div class="col-12 col-md-6">
                                    <div class="inp-holder">
                                        <label for="" class="small-label">كلمة السر الجديدة <span
                                                class="text-danger">*</span></label>
                                        <div class="input-group flex-nowrap">
                                            <input type="password" class="form-control" autocomplete="on"
                                                placeholder="كلمة السر الجديدة" aria-describedby="addon-wrapping" />
                                            <span class="input-group-text" id="addon-wrapping">
                                                <i class="fa-solid fa-eye"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="inp-holder">
                                        <label for="" class="small-label">كرر كلمة مرور جديدة <span
                                                class="text-danger">*</span></label>
                                        <div class="input-group flex-nowrap">
                                            <input type="password" class="form-control" autocomplete="on"
                                                placeholder="كرر كلمة مرور جديدة" aria-describedby="addon-wrapping" />
                                            <span class="input-group-text" id="addon-wrapping">
                                                <i class="fa-solid fa-eye"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-12">
                                    <button class="btn btn-sm main-btn">تغيير كلمة المرور</button>
                                </div>
                            </form>
                        </div>
                    </div>
            </div>
        </div>
    </div>
@endsection
