@extends('admin.layouts.admin')
@section('content')
    <div class="main-side">
        <div class="d-flex align-items-center justify-content-between gap-3 mb-3">
            <div class="main-title mb-0">
                <div class="small">الرئيسية</div>
                <div class="large">اضافة فاتورة</div>
            </div>

            <a href="{{ route('admin.invoices') }}" class="main-btn bg-secondary">
                رجوع
                <i class="fas fa-arrow-left-long"></i>
            </a>
        </div>
        <section class="content_view">
            <div class="top-bar">
                <div class="three-bar">
                    <div class="small-container">
                        <div class="client">
                            <label for="" class="small-label">
                                <b>
                                    العميل
                                </b>
                                <select class="main-select" id="">
                                    <option value="">اختر العميل</option>
                                </select>
                            </label>
                            <a href="{{ route('admin.clients') }}" class="btn-table">
                                <img src="{{ asset('admin-asset/img/add-user.png') }}" alt="">
                                عميل جديد
                            </a>
                        </div>
                        <div class="date ">
                            <label for="" class="small-label">
                                <b>التاريخ</b>
                                <input type="date" class="form-control date-inp">
                                <img src="{{ asset('admin-asset/img/calendar1.png') }}" class="icon" alt="">

                            </label>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-3 flex-wrap">
                        <div>
                            <input type="checkbox" value=""> المبلغ شامل الضريبة
                        </div>
                        <div>
                            <label for="label">ادخل المبلغ شامل الضريبة</label>
                            <input type="text" disabled="" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="table-responsive">
                    <table class="w-100 create-table">
                        <thead>
                            <tr>
                                <th>البيان</th>
                                <th>الكمية</th>
                                <th>سعر الوحدة</th>
                                <th>السعر قبل الضريبة</th>
                                <th>قيمة الضريبة</th>
                                <th>الاجمالي</th>
                                <th>حذف</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <textarea name="0_description" class="form-control  description" id="0_description" cols="30" rows="2"></textarea>
                                </td>
                                <td>
                                    <input type="text" min="1" onkeypress="return event.charCode <= 57"
                                        id="0_quantity" class=" form-control" step="0.01">
                                </td>
                                <td>
                                    <input type="text" class="inp-create form-control" step="0.01">
                                </td>
                                <td><input type="text" oninput="validateInput(this)" id="0_price"
                                        class="inp-create form-control price" step="0.01" disabled="">
                                </td>

                                <td><input type="text" id="0_tax" class="inp-create form-control" disabled=""
                                        step="0.01">
                                </td>
                                <td><input type="text" id="0_total" class="inp-create form-control" disabled=""
                                        step="0.01">
                                </td>

                                <td>
                                    <div class="btn btn-sm py-1 fs-6 btn-danger" wire:click="decrease_item(0)">
                                        <i class="fa-solid fa-xmark"></i>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <div class="btn-add btn-sm  me-4" wire:click="increase_item">
                                        <i class="fa-solid fa-plus"></i>
                                        اضافة
                                    </div>

                                </td>
                                <td>
                                    <div class="total">الاجمالي قبل الضريبة
                                        <span></span>
                                    </div>

                                </td>
                                <td>
                                    <div class="total ">الضريبة <span>
                                            0
                                        </span></div>

                                </td>
                                <td>
                                    <div class="total">المجموع <span>

                                        </span></div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div>
                    <input type="checkbox" value="1"> اظهار الشروط
                </div>
                <div>
                    <input type="checkbox" value="1"> اظهار الملاحظات
                </div>
                <div class="small-container d-flex align-items-center justify-content-between p-3 ">
                    <div class="inp-holders d-flex justify-content-start flex-column   align-items-center gap-2">
                        <div class="inp d-flex align-items-center w-100">
                            <label for="" class="fd-14px w-100">الملاحظات:-</label>
                            <textarea id="" rows="2" placeholder="" class="form-control"></textarea>
                        </div>
                        <div class="inp d-flex  align-items-center w-100">
                            <label for="" class="fd-14px w-100">الشروط و الاحكام:-</label>
                            <textarea id="" rows="2" placeholder="" class="form-control"></textarea>
                        </div>
                    </div>
                    <button type="button" class="btn-submit d-flex align-items-center  justify-content-center gap-2">
                        <i class="fa-solid fa-floppy-disk fs-4"></i>
                        حفظ الفاتورة
                    </button>
                </div>
            </div>
        </section>

        <div class="modal fade" id="modal-print" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true"
            aria-labelledby="myModalLabel" wire:ignore.self="">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">إضافة الفاتورة</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body ">
                        <p class="text-danger mb-2">بيانات الفاتورة المالية</p>
                        <div class="row g-3 mb-4">
                            <div class="col-12 col-md-6">
                                <div class="inp-holder">
                                    <label for="" class="small-label">
                                        إجمالي الفاتورة
                                    </label>
                                    <input type="text" value="" class="form-control" readonly="">
                                </div>
                            </div>


                            <div class="col-12 col-md-6">
                                <div class="inp-holder">
                                    <label for="" class="small-label">
                                        الخصم
                                    </label>
                                    <input type="text" wire:model="discount" class="form-control">
                                </div>
                            </div>



                            <div class="col-12 col-md-6">
                                <div class="inp-holder">
                                    <label for="" class="small-label">
                                        حالة الفاتورة
                                    </label>
                                    <select wire:model="invoice_status" class="main-select w-100">
                                        <option value="">اختر الحالة</option>
                                        <option value="paid">مسدد</option>
                                        <option value="unpaid">غير مسدد</option>
                                        <option value="partially_paid">مسدد جزئياً</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-12 col-md-6 ">
                                <div class="inp-holder">
                                    <label for="" class="small-label">شبكة</label>

                                    <input type="text" wire:model="card" class="form-control">
                                </div>
                                <div class="inp-holder">
                                    <label for="" class="small-label">نقدي</label>
                                    <input type="text" wire:model="cash" class="form-control">
                                </div>
                                <div class="inp-holder">
                                    <label for="" class="small-label">تحويل بنكي</label>
                                    <input type="text" wire:model="bank" class="form-control">
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <div class="inp-holder">
                                    <label for="" class="small-label">
                                        المبلغ المتبقي
                                    </label>
                                    <input wire:model="net" type="text" class="form-control" readonly="">
                                </div>
                            </div>
                        </div>
                        <div class="buttons-container d-flex align-items-center justify-content-center gap-2">
                            <button type="button" data-bs-toggle="modal" data-bs-target="#modal-print" id="print-btn"
                                class="btn-parint btn btn-success" >
                                حفظ وطباعة الفاتورة
                            </button>
                            <button class=" btn btn-success" >
                                حفظ الفاتورة بدون طباعة
                            </button>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm px-4"
                            data-bs-dismiss="modal">رجوع</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
