@extends('admin.layouts.admin')
@section('content')
    <div class="main-side">
        <div class="main-title">
            <div class="small">
                {{ __('admin.Home') }}
            </div>
            <div class="large">
                الفواتير
            </div>
        </div>

        <div class="btn-holder d-flex align-items-center flex-wrap gap-1 mb-2">
            <a href="{{ route('admin.invoices.create') }}" class="main-btn">اضافة <i class="fas fa-plus"></i></a>
            <button class="main-btn btn-main-color">كل الفواتير: 0</button>
            <button class="main-btn">فواتير مسددة: 0</button>
            <button class="main-btn bg-danger">فواتير غير مسددة: 0</button>
            <button class="main-btn bg-secondary px-4">تصدير Excel</button>
        </div>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 g-2 mb-2">
            <div class="col">
                <div class="box-search">
                    <img src="{{ asset('admin-asset/img/icons/search.png') }}" alt="icon" />
                    <input type="search" id="" placeholder="ابحث برقم الفاتورة">
                </div>
            </div>
            <div class="col d-flex align-items-center">
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1">من</span>
                    <input type="date" class="form-control" aria-describedby="basic-addon1">
                </div>
            </div>
            <div class="col d-flex align-items-center">
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1">الى</span>
                    <input type="date" class="form-control" aria-describedby="basic-addon1">
                </div>
            </div>
            <div class="col d-flex align-items-center">
                <select class="form-select" id="">
                    <option value="">اختر طريقة الدفع</option>
                    <option value="">تحويل بنكي</option>
                    <option value="">شبكة</option>
                    <option value="">نقدا</option>
                </select>
            </div>
            <div class="col d-flex align-items-center">
                <select class="form-select" id="">
                    <option value="">اختر العميل</option>
                </select>
            </div>
        </div>

        <div class="table-responsive">
            <table class="main-table mb-2">
                <thead>
                    <tr>
                        <th>رقم الفاتورة</th>
                        <th>العميل</th>
                        <th>حالة الفاتورة</th>
                        <th>طريقة الدفع</th>
                        <th>تاريخ الفاتورة</th>
                        <th>مبلغ الفاتورة</th>
                        <th>الضريبة</th>
                        <th>المبلغ الإجمالي</th>
                        <th>المدفوع</th>
                        <th>الخصم</th>
                        <th>إجمالي السندات</th>
                        <th>المتبقي</th>
                        <th class="text-center"> التحكم</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>99</td>
                        <td>شركة عبد الرحمن العبد القادر للتجارة والمقاولات</td>
                        <td>مدفوع</td>
                        <td>شبكة</td>
                        <td>2024-10-23</td>
                        <td>150000.00</td>
                        <td>22500</td>
                        <td>172500.00</td>
                        <td>172500</td>
                        <td>0.00</td>
                        <td>0</td>
                        <td>0.00</td>
                        <td>
                            <div class="d-flex align-items-center gap-1">
                                <a href="{{ route('admin.invoices.show') }}" data-bs-toggle="tooltip" data-bs-placement="top"
                                data-bs-title="معاينة الفاتورة" class="btn-light-purple"><i class="fas fa-eye icon-table"></i></a>

                                <button type="button" class="btn-tooltip btn-light-green" data-bs-toggle="modal"
                                    data-bs-target="#reterve">
                                    <i class="fas fa-retweet icon-table"></i>
                                    <span class="tip">استرجاع مبلغ</span>
                                </button>
                            </div>
                            <div class="modal fade" id="reterve" aria-hidden="false">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            استرجاع مبلغ
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="">نوع الاسترجاع</label>
                                                <select id="" class="form-control">
                                                    <option value="">اختر نوع الاسترجاع</option>
                                                    <option value="part">جزئي</option>
                                                    <option value="all">كامل</option>
                                                </select>
                                            </div>
                                            <div class="form-group d-none">
                                                <label for="">المبلغ</label>
                                                <input type="number" min="0" class="form-control" id="">
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-sm btn-secondary px-3"
                                                data-bs-dismiss="modal">إلغاء</button>
                                            <button class="btn btn-sm btn-success px-3" data-bs-dismiss="modal">نعم</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
