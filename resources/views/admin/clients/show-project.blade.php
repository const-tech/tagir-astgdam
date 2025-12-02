@extends('admin.layouts.admin')
@section('content')
    <div class="main-side">
        <div class="main-title">
            <div class="small">
                {{ __('admin.Home') }}
            </div>
            <div class="large">
                تفاصيل المشروع
            </div>
        </div>
        <div class="row g-3">
            <div class="col-md-4">
                <form action="" method="POST" class="card">
                    <div class="card-header bg-white py-3">
                        <h6 class="fw-bold mb-0 fs-15px color-666">حالة المشروع</h6>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">

                            <div class="col-12">
                                <label for="range">
                                    تقدم
                                    <span class="fs-6">
                                        (<span class="textInput">0</span>%)
                                    </span>
                                </label>
                                <input type="range" class="form-range inp-range" min="0" max="100"
                                    step="1" id="progressRange" name="progress_rate" value="0"
                                    oninput="updateTextInput(this.value);">
                            </div>

                            <div class="col-12">
                                <div class="inp-holder">
                                    <label for="status">الحالة</label>
                                    <select id="status" class="form-select" name="status">
                                        <option value="">اختر الحالة</option>
                                        <option value="pending">في الانتظار</option>
                                        <option value="active">جاري التنفيذ</option>
                                        <option value="canceled">ملغي</option>
                                        <option value="done">منتهي</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="btn-holder">
                                    <button type="submit" class="main-btn px-3">
                                        تحديث الحالة
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-body">
                        <ul class="nav nav-pills main-nav-pills" id="paymentTabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="info-tab" data-bs-toggle="pill" data-bs-target="#info"
                                    type="button" role="tab" aria-controls="info" aria-selected="true">
                                    البيانات الاساسية
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="comments-tab" data-bs-toggle="pill" data-bs-target="#comments"
                                    type="button" role="tab" aria-controls="comments" aria-selected="false">
                                    التعليقات
                                </button>
                            </li>

                        </ul>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header bg-white py-3">
                        <h6 class="fw-bold mb-0 fs-15px color-666">
                            <span>المشروع:</span>
                            <span>إســـــم الــمـشـــروع</span>
                        </h6>
                    </div>
                    <div class="tab-content" id="projectDetails-tabContent">
                        <!-- info -->
                        <div class="tab-pane fade active show" id="info" role="tabpanel" aria-labelledby="info-tab">
                            <div class="card-body py-3">
                                <div class="row g-0 g-xl-3">
                                    <div class="col-12 col-xl-6">
                                        <div class="table-responsive">
                                            <table class="table mb-0">
                                                <tbody class="text-muted">
                                                    <tr>
                                                        <td class="fs-14px">مسمى/عنوان</td>
                                                        <td class="fs-14px">إســـــم الــمـشـــروع</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="fs-14px">العميل</td>
                                                        <td class="fs-14px">مشاريع خاصة بالشركة</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="fs-14px">المدة المتوقعة للتنفيذ / أيام</td>
                                                        <td class="fs-14px">40 يوم</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="fs-14px">تاريخ البدء</td>
                                                        <td class="fs-14px">
                                                            <i class="far fa-calendar-alt"></i>
                                                            2023-09-25
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="fs-14px">أسماء الموظفين اكسيل</td>
                                                        <td>
                                                            <a href="#" class="fs-13px btn-light-purple"
                                                                style="padding: 2px 20px;">
                                                                <i class="fas fa-download"></i>
                                                                تحميل
                                                            </a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-12 col-xl-6">
                                        <div class="table-responsive">
                                            <table class="table mb-0">
                                                <tbody class="text-muted">

                                                    <tr>
                                                        <td class="fs-14px">الفريق</td>
                                                        <td>
                                                            <div class="team-work p-0 border-0">
                                                                <a href="#" class="team-img"
                                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                                    data-bs-title="معاينة ملف العضو">
                                                                    <img src="{{ asset('admin-asset/img/no-image.jpeg') }}"
                                                                        alt="">
                                                                </a>
                                                                <a href="#" class="team-img"
                                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                                    data-bs-title="معاينة ملف العضو">
                                                                    <img src="{{ asset('admin-asset/img/no-image.jpeg') }}"
                                                                        alt="">
                                                                </a>
                                                                <a href="#" class="team-img"
                                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                                    data-bs-title="معاينة ملف العضو">
                                                                    <img src="{{ asset('admin-asset/img/no-image.jpeg') }}"
                                                                        alt="">
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="fs-14px">تمت الاضافة بواسطة</td>
                                                        <td class="fs-14px">على العايدي</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="fs-14px">الوصف</td>
                                                        <td class="fs-14px">بدون شرح</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="fs-14px">تاريخ الانتهاء</td>
                                                        <td class="fs-14px">
                                                            <i class="far fa-calendar-alt"></i>
                                                            2023-10-07
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- comments -->
                        <div class="tab-pane fade" id="comments" role="tabpanel" aria-labelledby="comments-tab">
                            <div class="card-body py-3">
                                <ul class="timeline">
                                    <li>
                                        <div class="box-content"
                                            style="width: 90%; padding: 10px; border-radius: 4px; background-color: #ebeaea;">
                                            <p class="mb-2">
                                                علي العايدي
                                            </p>
                                            <span class="float-right">منذ ساعة - 2024-10-22</span>
                                            <p class="mb-0">
                                                تللاخرثهخبلارهخسبلاحهرلا
                                            </p>
                                        </div>
                                    </li>


                                    <li>
                                        <div class="box-content"
                                            style="width: 90%; padding: 10px; border-radius: 4px; background-color: #2E5789;color: #fff">
                                            <p class="mb-2">
                                                الادارة
                                            </p>
                                            <span class="float-right text-white">منذ ثانية -
                                                2024-10-22</span>
                                            <p class="mb-0">
                                                jbjdbvjbsd;fjbv
                                            </p>
                                        </div>
                                    </li>
                                </ul>


                                <div class="card">
                                    <div class="card-header">
                                        إضافة تعليق
                                    </div>
                                    <div class="card-body">
                                        <form action="" method="post" class="row g-3" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <textarea name="comment" class="form-control" rows="5" placeholder="أكتب تعليقك"></textarea>
                                            </div>

                                            <div class="text-center mt-2">
                                                <button type="submit" class="main-btn px-4">حفظ</button>
                                            </div>

                                        </form>
                                    </div>
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
        document.querySelector('.textInput').textContent = document.querySelector('.inp-range').value;

        function updateTextInput(val) {
            document.querySelector('.textInput').textContent = val;
        }
    </script>
@endpush
