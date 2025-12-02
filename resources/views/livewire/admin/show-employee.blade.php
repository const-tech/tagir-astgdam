<div class="main-side">
    <div class="main-title">
        <div class="small">
            {{ __('admin.Home') }}
        </div>
        <div class="large">
            ملف العضو / {{ $employee->name }}
        </div>
    </div>
    <div class="row g-3" x-data="{ show: 'deal' }">
        <div class="col-12 col-md-3 col-lg-4">
            <div class="profile-bar">
                <div class="main-info">
                    <div class="user">
                        <div class="img-holder"><img
                                src="{{ $employee->image ? display_file($employee->image) : asset('admin-asset/img/no-image.jpeg') }}"
                                alt="user photo">
                            <div class="icon-holder">
                                <i class="fa-solid fa-circle-check"></i>
                            </div>
                        </div>
                        <div class="data">
                            <p class="name">{{ $employee->name }}</p><span class="title"></span>
                        </div>
                    </div>
                    <span class="status">{{ $employee->active ? __('admin.Active') : __('admin.Inactive') }}</span>
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
                        <a class="value" href="#"> {{ $employee->name }}</a>
                    </li>
                    <li>
                        <div class="key">
                            <i class="fa-solid fa-envelope"></i>
                            <span class="name"> بريد الالكتروني</span>
                        </div>
                        <p class="value">{{ $employee->email }}</p>
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
                    <button @click="show = 'personalInfo'" :class="{ 'active': show === 'personalInfo' }"
                        class="nav-link">
                        <div class="name">
                            <i class="fa-solid fa-user"></i>
                            معلومات شخصية
                        </div>
                        <i class="fa-solid fa-angle-left arrow"></i>
                    </button>
                    <!-- الصوره الشخصيه -->
                    <button @click="show = 'personalImage'" :class="{ 'active': show === 'personalImage' }"
                        class="nav-link">
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
                    <button @click="show = 'changePassword'" :class="{ 'active': show === 'changePassword' }"
                        class="nav-link">
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
                                data-bs-target="#pills-ended" type="button" role="tab" aria-selected="false">
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
                        <x-message-admin />
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
                        <!-- العمولات -->
                        <div class="tab-pane fade" id="pills-commotion" role="tabpanel">
                            <div class="col-12 col-md-12">
                                <label for="" class="small-label mb-0">عرض الكل العمولات</label>
                            </div>
                            <div class="col-12 col-md-12">
                                <div class="row g-3">
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
                                                    @forelse ($commissions as $commission)
                                                        <tr>
                                                            <td>
                                                                {{ $commission->commission_name }}
                                                            </td>
                                                            <td>{{ $commission->commission_value }}</td>
                                                            <td>{{ __($commission->commission_type) }}</td>
                                                            <td>{{ __($commission->commission_value_type) }}</td>
                                                            <td>
                                                                <div class="d-flex align-items-center gap-1">
                                                                    <button type="button"
                                                                        wire:click="editCommission({{ $commission->id }})"
                                                                        class="btn btn-sm btn-outline-primary">
                                                                        <i class="fa-solid fa-pen-to-square"></i>
                                                                    </button>
                                                                    <button type="button" data-bs-toggle="modal"
                                                                        data-bs-target="#delete{{ $commission->id }}"
                                                                        class="btn btn-sm btn-outline-danger">
                                                                        <i class="fa-solid fa-trash-can"></i>
                                                                    </button>

                                                                    <div class="modal fade"
                                                                        id="delete{{ $commission->id }}"
                                                                        aria-hidden="true">
                                                                        <div class="modal-dialog">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title"
                                                                                        id="exampleModalLabel">حذف
                                                                                    </h5>
                                                                                    <button type="button"
                                                                                        class="btn-close"
                                                                                        data-bs-dismiss="modal"
                                                                                        aria-label="Close"></button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    هل أنت متأكد من الحذف ؟
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button"
                                                                                        class="btn btn-secondary btn-sm px-3"
                                                                                        data-bs-dismiss="modal">إلغاء</button>
                                                                                    <button
                                                                                        wire:click="deleteCommission({{ $commission->id }})"
                                                                                        data-bs-dismiss="modal"
                                                                                        class="btn btn-danger btn-sm px-3">نعم</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="5">
                                                                <div class="text-center alert alert-warning">
                                                                    {{ __('No results') }}
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforelse

                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <form action="" wire:submit.prevent="saveCommission" method=""
                                class="row g-4">

                                <div class="col-12 col-md-6">
                                    <label for="" class="small-label">مسمى/عنوان <span
                                            class="text-danger">*</span></label>
                                    <div class="input-holer">
                                        <input type="text" wire:model="commission_name" class="form-control"
                                            placeholder="مسمى/عنوان" />
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label for="" class="small-label">مبلغ</label>
                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text fs-12px" id="addon-wrapping">SAR</span>
                                        <input type="number" wire:model="commission_value" class="form-control"
                                            placeholder="مبلغ" aria-describedby="addon-wrapping" />
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label for="" class="small-label">
                                        خيارات العمولة
                                        <span class="text-danger">*</span>
                                    </label>
                                    <select name="" wire:model="commission_type" id=""
                                        class="form-select">
                                        <option value="">اختر</option>
                                        <option value="without_tax">بدون ضرائب</option>
                                        <option value="with_tax">شامل الضريبة</option>
                                    </select>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label for="" class="small-label">
                                        خيارات المبلغ
                                        <span class="text-danger">*</span>
                                    </label>
                                    <select name="" wire:model="commission_value_type" id=""
                                        class="form-select">
                                        <option value="">اختر</option>
                                        <option value="fixed">ثابت</option>
                                        <option value="percentage">مئوي</option>
                                    </select>
                                </div>
                                <div class="col-12 col-md-12">
                                    <button class="btn btn-sm main-btn px-4">حفظ</button>
                                </div>
                            </form>
                        </div>
                        <!-- الحسميات -->
                        <div class="tab-pane fade" id="pills-ended" role="tabpanel">
                            <div class="col-12 col-md-12">
                                <label for="" class="small-label mb-0">عرض الكل الحسميات</label>
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
                                            @forelse ($deductions as $deduction)
                                                <tr>
                                                    <td>
                                                        {{ $deduction->deduction_name }}
                                                    </td>
                                                    <td>{{ $deduction->deduction_amount }}</td>
                                                    <td> {{ __($deduction->deduction_type) }}</td>
                                                    <td>
                                                        <div class="d-flex align-items-center gap-1">
                                                            <button type="button"
                                                                wire:click="editDeduction({{ $deduction->id }})"
                                                                class="btn btn-sm btn-outline-primary">
                                                                <i class="fa-solid fa-pen-to-square"></i>
                                                            </button>
                                                            <button type="button"
                                                                data-bs-target="#delete{{ $deduction->id }}"
                                                                data-bs-toggle="modal"
                                                                class="btn btn-sm btn-outline-danger">
                                                                <i class="fa-solid fa-trash-can"></i>
                                                            </button>

                                                            <div class="modal fade" id="delete{{ $deduction->id }}"
                                                                aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title"
                                                                                id="exampleModalLabel">حذف
                                                                            </h5>
                                                                            <button type="button" class="btn-close"
                                                                                data-bs-dismiss="modal"
                                                                                aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            هل أنت متأكد من الحذف ؟
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                class="btn btn-secondary btn-sm px-3"
                                                                                data-bs-dismiss="modal">إلغاء</button>
                                                                            <button
                                                                                wire:click="deleteDeduction({{ $deduction->id }})"
                                                                                data-bs-dismiss="modal"
                                                                                class="btn btn-danger btn-sm px-3">نعم</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="5">
                                                        <div class="alert alert-warning mb-0">
                                                            @lang('No results')
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforelse

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <form action="" wire:submit.prevent="saveDeduction" method="" class="row g-4">

                                <div class="col-12 col-md-6 col-lg-4">
                                    <label for="" class="small-label">مسمى/عنوان <span
                                            class="text-danger">*</span></label>
                                    <div class="input-holer">
                                        <input type="text" wire:model="deduction_name" class="form-control"
                                            placeholder="مسمى/عنوان" />
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4">
                                    <label for="" class="small-label">مبلغ</label>
                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text fs-12px" id="addon-wrapping">SAR</span>
                                        <input type="number" wire:model="deduction_amount" class="form-control"
                                            placeholder="مبلغ" aria-describedby="addon-wrapping" />
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4">
                                    <label for="" class="small-label">
                                        خيارات الخصم
                                        <span class="text-danger">*</span>
                                    </label>
                                    <select name="" id="" wire:model="deduction_type"
                                        class="form-select">
                                        <option value="">اختر</option>
                                        <option value="without_tax">بدون ضرائب</option>
                                        <option value="with_tax">شامل الضريبة</option>
                                    </select>
                                </div>
                                <div class="col-12 col-md-12">
                                    <button class="btn btn-sm main-btn px-4">حفظ</button>
                                </div>
                            </form>
                        </div>
                        <!-- تسديد -->
                        <div class="tab-pane fade" id="pills-pay" role="tabpanel">
                            <div class="col-12 col-md-12">
                                <label for="" class="small-label mb-0">عرض الكل تسديد</label>
                            </div>
                            <div class="col-12 col-md-12">
                                <div class="row g-3">
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
                                                    @forelse ($settlements as $settlement)
                                                        <tr>
                                                            <td>
                                                                {{ $settlement->settlement_name }}
                                                            </td>
                                                            <td>{{ $settlement->settlement_amount }}</td>
                                                            <td>{{ __($settlement->settlement_type) }}</td>
                                                            <td>{{ __($settlement->settlement_amount_type) }}</td>
                                                            <td>
                                                                <div class="d-flex align-items-center gap-1">
                                                                    <button type="button"
                                                                        wire:click="editSettlement({{ $settlement->id }})"
                                                                        class="btn btn-sm btn-outline-primary">
                                                                        <i class="fa-solid fa-pen-to-square"></i>
                                                                    </button>
                                                                    <button type="button" data-bs-toggle="modal"
                                                                        data-bs-target="#delete{{ $settlement->id }}"
                                                                        class="btn btn-sm btn-outline-danger">
                                                                        <i class="fa-solid fa-trash-can"></i>
                                                                    </button>

                                                                    <div class="modal fade"
                                                                        id="delete{{ $settlement->id }}"
                                                                        aria-hidden="true">
                                                                        <div class="modal-dialog">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title"
                                                                                        id="exampleModalLabel">حذف
                                                                                    </h5>
                                                                                    <button type="button"
                                                                                        class="btn-close"
                                                                                        data-bs-dismiss="modal"
                                                                                        aria-label="Close"></button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    هل أنت متأكد من الحذف ؟
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button"
                                                                                        class="btn btn-secondary btn-sm px-3"
                                                                                        data-bs-dismiss="modal">إلغاء</button>
                                                                                    <button
                                                                                        wire:click="deleteSettlement({{ $settlement->id }})"
                                                                                        data-bs-dismiss="modal"
                                                                                        class="btn btn-danger btn-sm px-3">نعم</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="5">
                                                                <div class="alert alert-warning mb-0">
                                                                    @lang('No results')
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforelse

                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <form action="" wire:submit.prevent="saveSettlement" method=""
                                class="row g-4">

                                <div class="col-12 col-md-6">
                                    <label for="" class="small-label">مسمى/عنوان <span
                                            class="text-danger">*</span></label>
                                    <div class="input-holer">
                                        <input type="text" wire:model="settlement_name" class="form-control"
                                            placeholder="مسمى/عنوان" />
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label for="" class="small-label">مبلغ</label>
                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text fs-12px" id="addon-wrapping">SAR</span>
                                        <input type="number" wire:model="settlement_amount" class="form-control"
                                            placeholder="مبلغ" aria-describedby="addon-wrapping" />
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label for="" class="small-label">
                                        طرق السداد
                                        <span class="text-danger">*</span>
                                    </label>
                                    <select name="" wire:model="settlement_type" id=""
                                        class="form-select">
                                        <option value="">اختر</option>
                                        <option value="without_tax">بدون ضرائب</option>
                                        <option value="with_tax">شامل الضريبة</option>
                                    </select>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label for="" class="small-label">
                                        خيارات المبلغ
                                        <span class="text-danger">*</span>
                                    </label>
                                    <select name="" wire:model="settlement_amount_type" id=""
                                        class="form-select">
                                        <option value="">اختر</option>
                                        <option value="fixed">ثابت</option>
                                        <option value="percentage">مئوي</option>
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
                    <x-message-admin />
                    <form action="" wire:submit.prevent="updateMainInfo" method="" class="row g-4">
                        <div class="col-12 col-md-6">
                            <div class="inp-holder">
                                <label for="" class="small-label">الاسم الاول
                                    <span class="text-danger">*</span></label>
                                <div class="input-group flex-nowrap">
                                    <input type="text" wire:model="first_name" class="form-control"
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
                                    <input type="text" wire:model="last_name" class="form-control"
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
                                    <input type="tel" wire:model="phone" class="form-control" />
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-6 col-lg-4">
                            <label for="" class="small-label">تاريخ الميلاد </label>
                            <div class="input-group flex-nowrap">
                                <input type="date" wire:model="birthday" class="form-control"
                                    aria-describedby="addon-wrapping" />
                                <span class="input-group-text fs-12px" id="addon-wrapping">
                                    <i class="fa-solid fa-calendar-days"></i>
                                </span>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <label for="" class="small-label">حالة</label>
                            <div class="input-holder">
                                <select class="form-select" id="" wire:model="status">
                                    <option value="">اختر الحالة</option>
                                    <option value="active">نشط</option>
                                    <option value="inactive">غير نشط</option>
                                    <option value="resigned">مستقيل</option>
                                    <option value="fired">مفصول</option>
                                    <option value="death">وفاة</option>
                                    <option value="exit_and_return">خروج وعودة</option>
                                    <option value="final_exit">خروج نهائي</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="inp-holder">
                                <label for="" class="small-label">الجنس</label>
                                <div class="input-holder">
                                    <select class="form-select" id="" wire:model.live="gender">
                                        <option value="">اختر الجنس</option>
                                        <option value="male">ذكر</option>
                                        <option value="female">انثى</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="inp-holder">
                                <label for="" class="small-label">جنسية</label>
                                <div class="input-holder">
                                    <select class="form-select" id="" wire:model.live="nationality">
                                        <option value="">اختر الجنسية</option>
                                        <option value="sudia">سعودي</option>
                                        <option value="not-sudia">غير سعودي</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        {{-- <div class="col" {{ $nationality == 'not-sudia' ? '' : 'hidden' }}>
                            <label for="">الجنسية</label>
                            <x-select2 id="nationality_id" wire:model="nationality_id" :url="'/select2/nationalities'" />
                        </div> --}}

                        @if ($nationality == 'not-sudia')
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="inp-holder">
                                    <label for="" class="small-label">جنسية</label>
                                    <div class="input-holder">
                                        <select class="form-select" id="" wire:model.live="nationality_id">
                                            <option value="">اختر الجنسية</option>
                                            @foreach ($nationalities as $nationality)
                                                <option value="{{ $nationality->id }}">{{ $nationality->name_ar }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <div class="col-12 col-md-6">
                            <div class="inp-holder">
                                <label for="" class="small-label">رقم الإقامة
                                    <span class="text-danger">*</span></label>
                                <div class="input-holder">
                                    <input type="number" wire:model="id_number" name="" value=""
                                        class="form-control" id="" />
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="inp-holder">
                                <label for="" class="small-label">تاريخ نهاية الإقامة
                                    <span class="text-danger">*</span></label>
                                <div class="input-holder">
                                    <input type="date" wire:model="end_id_number" name="" value=""
                                        class="form-control" id="" />
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="inp-holder">
                                <label for="" class="small-label">العنوان </label>
                                <div class="input-holder">
                                    <input type="text" wire:model="address" name="" value=""
                                        placeholder="العنوان" class="form-control" id="" />
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <label> بطاقة سائق : </label>
                            <input type="radio" wire:model.live="driver_card" value="1" />
                            <label for="">نعم</label>
                            <input type="radio" wire:model.live="driver_card" value="0" />
                            <label for="">لا</label>
                        </div>
                        @if ($driver_card)
                            <div class="col-12 col-md-6">
                                <label for="">تاريخ بداية بطاقة سائق </label>
                                <input class="form-control" type="date" wire:model="start_driver_card" />
                            </div>
                            <div class="col-12 col-md-6">
                                <label for="">تاريخ نهاية بطاقة سائق </label>
                                <input class="form-control" type="date" wire:model="end_driver_card" />
                            </div>
                        @endif

                        <div class="col-12 col-md-6">
                            <label>الكارت الصحي : </label>
                            <input type="radio" wire:model.live="health_card" value="1" />
                            <label for="">نعم</label>
                            <input type="radio" wire:model.live="health_card" value="0" />
                            <label for="">لا</label>
                        </div>
                        @if ($health_card)
                            <div class="col-12 col-md-6">
                                <label for="">تاريخ بداية الكارت الصحى </label>
                                <input class="form-control" type="date" wire:model="start_health_card" />
                            </div>
                            <div class="col-12 col-md-6">
                                <label for="">تاريخ نهاية الكارت الصحى </label>
                                <input class="form-control" type="date" wire:model="end_health_card" />
                            </div>
                        @endif


                        <div class="col-12 col-md-6">
                            <label> أجير : </label>
                            <input type="radio" wire:model.live="is_employee" value="1" />
                            <label for="">نعم</label>
                            <input type="radio" wire:model.live="is_employee" value="0" />
                            <label for="">لا</label>
                        </div>
                        @if ($is_employee)
                            <div class="col-12 col-md-6">
                                <label for="">تاريخ بداية أجير </label>
                                <input class="form-control" type="date" wire:model="start_is_employee" />
                            </div>
                            <div class="col-12 col-md-6">
                                <label for="">تاريخ نهاية أجير </label>
                                <input class="form-control" type="date" wire:model="end_is_employee" />
                            </div>
                        @endif


                        <div class="col-12 col-md-6">
                            <label> مقيم : </label>
                            <input type="radio" wire:model.live="resident" value="1" />
                            <label for="">نعم</label>
                            <input type="radio" wire:model.live="resident" value="0" />
                            <label for="">لا</label>
                        </div>
                        @if ($resident)
                            <div class="col-12 col-md-6">
                                <label for="">تاريخ بداية مقيم </label>
                                <input class="form-control" type="date" wire:model="start_resident" />
                            </div>
                            <div class="col-12 col-md-6">
                                <label for="">تاريخ نهاية مقيم </label>
                                <input class="form-control" type="date" wire:model="end_resident" />
                            </div>
                        @endif
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
                                data-bs-target="#about-tab-pane" type="button" role="tab" aria-selected="true">
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
                                data-bs-target="#bank-tab-pane" type="button" role="tab" aria-selected="false">
                                حساب البنك
                            </button>
                        </li>
                        <!-- الاتصال بالطوارىء -->
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="call-tab" data-bs-toggle="tab"
                                data-bs-target="#call-tab-pane" type="button" role="tab" aria-selected="false">
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
                    <x-message-admin />
                    <form action="" wire:submit.prevent="updatePersonalImage" method="" class="row g-4">
                        <div class="col-12 col-md-12">
                            <div class="inp-holder">
                                <label for="" class="small-label">الصوره الشخصيه <span
                                        class="text-danger">*</span></label>
                                <div class="inp-holder">
                                    <input type="file" accept="image/gif, image/jpeg, image/jpg, image/png"
                                        wire:model="image" class="form-control" />
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
                    <x-message-admin />
                    <div class="content_header">
                        <div class="title fs-11px">
                            <i class="fa-solid fa-book fs-12px main-color"></i>
                            معلومات الدخول للموقع
                            <br>
                            <small>تغيير معلومات حسابك</small>
                        </div>
                    </div>
                    <form action="" wire:submit.prevent="updateLoginInfo" method="" class="row g-4">
                        <div class="col-12 col-md-6">
                            <div class="inp-holder">
                                <label for="" class="small-label">الجوال <span
                                        class="text-danger">*</span></label>
                                <div class="input-group flex-nowrap">
                                    <input type="text" wire:model="phone" class="form-control"
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
                                    <input type="text" class="form-control" wire:model="email"
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
                    <x-message-admin />
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
                                    @forelse ($documents as $document)
                                        <tr>
                                            <td>{{ $document->document_name }}</td>
                                            <td>{{ $document->document_type }}</td>
                                            <td>
                                                <a href="{{ display_file($document->document_file) }}"
                                                    target="_blank" class="btn btn-sm btn-outline-primary">
                                                    <i class="fa-solid fa-eye"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center gap-1">
                                                    <button type="button"
                                                        wire:click="editDocument({{ $document->id }})"
                                                        class="btn btn-sm btn-outline-primary">
                                                        <i class="fa-solid fa-pen-to-square"></i>
                                                    </button>
                                                    <button type="button" data-bs-toggle="modal"
                                                        data-bs-target="#delete{{ $document->id }}"
                                                        class="btn btn-sm btn-outline-danger">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </button>

                                                    <div class="modal fade" id="delete{{ $document->id }}"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">
                                                                        حذف
                                                                    </h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    هل أنت متأكد من الحذف ؟
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button"
                                                                        class="btn btn-secondary btn-sm px-3"
                                                                        data-bs-dismiss="modal">إلغاء</button>
                                                                    <button
                                                                        wire:click="deleteDocument({{ $document->id }})"
                                                                        data-bs-dismiss="modal"
                                                                        class="btn btn-danger btn-sm px-3">نعم</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6">
                                                <div class="alert alert-warning text-center">
                                                    {{ __('No results') }}
                                                </div>
                                            </td>
                                        </tr>
                                    @endforelse

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <form action="" wire:submit.prevent="saveDocument" method="" class="row g-4">

                        <div class="col-12 col-md-6">
                            <label for="" class="small-label">اسم الملف <span
                                    class="text-danger">*</span></label>
                            <div class="input-holer">
                                <input type="text" wire:model="document_name" class="form-control"
                                    placeholder="اسم الملف" />
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <label for="" class="small-label">نوع الوثيقة <span
                                    class="text-danger">*</span></label>
                            <div class="input-holer">
                                <input type="text" wire:model="document_type" class="form-control"
                                    placeholder="نوع الوثيقة" />
                            </div>
                        </div>
                        <div class="col-12 col-md-12">
                            <label for="" class="small-label">ملف المستند<span
                                    class="text-danger">*</span></label>
                            <div class="input-holer">
                                <input type="file" wire:model="document_file" class="form-control"
                                    placeholder="ملف المستند" />
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
                    <x-message-admin />
                    <form action="" wire:submit.prevent="changePassword" method="" class="row g-4">
                        <div class="col-12 col-md-6">
                            <div class="inp-holder">
                                <label for="" class="small-label">رقم الجوال</label>
                                <div class="input-group flex-nowrap">
                                    <input type="phone" wire:model="phone" class="form-control" disabled
                                        autocomplete="on" aria-describedby="addon-wrapping" />
                                </div>
                            </div>
                        </div>
                        <hr class="m-0 bg-transparent border-0">
                        <div class="col-12 col-md-6">
                            <div class="inp-holder">
                                <label for="" class="small-label">كلمة السر الجديدة <span
                                        class="text-danger">*</span></label>
                                <div class="input-group flex-nowrap">
                                    <input type="password" wire:model="password" class="form-control"
                                        autocomplete="on" placeholder="كلمة السر الجديدة"
                                        aria-describedby="addon-wrapping" />
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
                                    <input type="password" wire:model="password_confirmation" class="form-control"
                                        autocomplete="on" placeholder="كرر كلمة مرور جديدة"
                                        aria-describedby="addon-wrapping" />
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
