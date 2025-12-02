@extends('admin.layouts.admin')
@section('content')
    <div class="main-side">
        <div class="main-title">
            <div class="small">
                {{ __('admin.Home') }}
            </div>
            <div class="large">
                معاينة الفاتورة
            </div>
        </div>
        <div class="print-invoice invoice-in-print content_view">
            <div class="px-2">
                <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-2 ">
                    <div class="d-flex justify-content-center text-white gap-1">
                        <a class="btn btn-danger not-print" href="#"
                            style="backgorund-color:#F00200;">
                            <i class="fa-solid fa-file-pdf"></i>
                        </a>
                        <button class="btn btn-warning not-print">
                            <i class="fa-solid fa-print"></i>
                        </button>
                    </div>
                    <h6 class="title-info mt-0 mb-0 text-center">
                        فاتورة ضريبية / Tax Invoice
                    </h6>
                    <span></span>
                </div>

                <div id="html2pdf">
                    <div class="row g-2 my-3 justify-content-between header-invoice">
                        <div class="col-12 col-lg-8">
                            <div class="client-info mt-lg-4">
                                <div class="d-flex un-flex flex-column flex-lg-row align-items-start align-items-lg-center gap-lg-3 g-2">
                                    <div>
                                        <p class="m-0">
                                            <span class="text-nowrap">VAT / الضريبة</span> : 300515112800003
                                        </p>
                                        <p class="mb-0">
                                            <span class="text-nowrap">C.R / السجل التجاري</span> :
                                            2050080923
                                        </p>
                                        <p class="mb-0">
                                            <span class="text-nowrap"> ADDRESS / العنوان : </span>
                                            الدمام / الخضرية
                                        </p>
                                    </div>
                                    <div>
                                        <p class="mb-0">
                                            <span class="text-nowrap"> CONTACT / الجوال : </span>
                                            0547994676
                                        </p>
                                        <p class="m-0">
                                            <span class="text-nowrap">البريد الالكتروني</span> :
                                            albaitalherafy@hotmail.com
                                        </p>
                                        <p class="mb-0">
                                            <span class="text-nowrap">أسم الشارع</span> :
                                        </p>
                                    </div>
                                    <div></div>
                                    <div>
                                        <p class="mb-0">
                                            <span class="text-nowrap"> الحي : </span>
                                        </p>
                                        <p class="mb-0">
                                            <span class="text-nowrap"> الرقم الأضافي : </span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <div class="logo">
                                <img src="{{ asset('admin-asset/img/image-preview.webp') }}" alt=""
                                    class="logo-img">
                            </div>
                            <p class="title mb-2 text-center">كوكبة التقنية</p>
                        </div>
                    </div>

                    <div class="my-3 table-responsive overflow-hidden ">
                        <table class="table mb-0 table-bordered main-table phone-sm">
                            <thead>
                                <tr>
                                    <th class="bg-gray-2">
                                        المدينة
                                    </th>
                                    <th class="bg-gray-2">
                                        الحي
                                    </th>
                                    <th class="bg-gray-2">
                                        أسم الشارع
                                    </th>
                                    <th class="bg-gray-2">
                                        رقم المبني
                                    </th>
                                    <th class="bg-gray-2">
                                        السجل التجاري
                                    </th>
                                    <th class="bg-gray-2">
                                        الرقم الضريبي
                                    </th>

                                    <th class="bg-gray-2">
                                        الرقم الأضافي
                                    </th>
                                    <th class="bg-gray-2">
                                        جوال العميل
                                    </th>
                                    <th class="bg-gray-2">
                                        اسم العميل
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>الإحساء</td>
                                    <td> </td>
                                    <td> </td>
                                    <td> </td>
                                    <td> </td>
                                    <td>300458929500003</td>
                                    <td> </td>
                                    <td></td>
                                    <td>شركة عبد الرحمن العبد القادر للتجارة والمقاولات</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="dataInvoice-holder np my-5">
                        <div class="container">
                            <div class="info-invoice">
                                <div class="info">
                                    <span class="title">
                                        N.number / رقم الفاتورة :
                                    </span>
                                    <span>99</span>
                                </div>

                                <div class="info">
                                    <span class="title">
                                        Pay / الدفع :
                                    </span>
                                    <span>شبكة</span>
                                </div>
                                <div class="info">
                                    <span class="title">
                                        N.Status / حالة الدفع :
                                    </span>
                                    <span>مدفوع</span>
                                </div>
                                <div class="info">
                                    <div class="d-flex  gap-1 ms-4 pb-0">
                                        <div>
                                            <span style="font-size: 12px;">2024-10-23</span>
                                        </div>
                                        <strong>-</strong>
                                        <div>
                                            <span style="font-size: 12px;">8:39:51 ص</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3 table-responsive overflow-hidden ">
                        <table class="table mb-0 table-bordered main-table phone-sm">
                            <thead>
                                <tr>
                                    <th class="bg-gray">
                                        Total /
                                        المجموع
                                    </th>
                                    <th class="bg-gray">
                                        Tax /
                                        الضريبة
                                    </th>
                                    <th class="bg-gray">
                                        B.Tax /
                                        قبل الضريبة
                                    </th>
                                    <th class="bg-gray">
                                        Unit /
                                        وحدة القياس
                                    </th>

                                    <th class="bg-gray">
                                        Unit Price /
                                        سعر الوحدة
                                    </th>
                                    <th class="bg-gray">
                                        Quantity /
                                        الكمية
                                    </th>
                                    <th class="bg-gray">
                                        Service /
                                        البيان
                                    </th>
                                    <th class="bg-gray">#</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>172500.00</td>
                                    <td>22500.00</td>
                                    <td>150000.00</td>
                                    <td></td>
                                    <td>150000</td>
                                    <td>1.00</td>
                                    <td>
                                        <p class="mb-0">دفعة ثانية من عقد أبواب الخشب معهد الدراسات البحربة بالدمام</p>
                                    </td>
                                    <td>1</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="row mt-md-3 align-items-start">

                        <div class="col-md-6 data-buy">
                            <table class="table mb-0 table-bordered main-table">
                                <tbody>
                                    <tr>
                                        <td class="border-bottom">
                                            150000.00SAR
                                        </td>
                                        <th class="border-bottom td-head">
                                            <b> Amount does not include discount and tax <br>
                                                المبلغ غير شامل الخصم و الضريبة</b>
                                        </th>
                                    </tr>


                                    <tr class="duble-border">
                                        <td>172,500.00SAR
                                        </td>
                                        <th class="td-head">
                                            <b> Paid
                                                /
                                                المدفوع
                                            </b>
                                        </th>
                                    </tr>
                                    <tr>
                                        <td class="border-bottom">
                                            0.00SAR
                                        </td>
                                        <th class="border-bottom td-head">
                                            <b> Discount
                                                /
                                                الخصم</b>
                                        </th>
                                    </tr>

                                    <tr>
                                        <td class="border-bottom">
                                            172500.00SAR
                                        </td>
                                        <th class="border-bottom td-head">
                                            <b>
                                                Total Amount
                                                /
                                                الأجمالي بعد الضريبة والخصم
                                            </b>
                                        </th>
                                    </tr>
                                    <tr>
                                        <td class="border-bottom">
                                            0.00SAR
                                        </td>
                                        <th class="border-bottom td-head">
                                            <b>Remaining
                                                /
                                                المتبقي
                                            </b>
                                        </th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div
                            class="parent-barcode text-center d-flex align-items-center justify-content-center d-none qr-print-holder">
                            <span style="width: 150px;"><!--?xml version="1.0" encoding="UTF-8"?-->
                                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="125" height="125"
                                    viewBox="0 0 125 125">
                                    <rect x="0" y="0" width="125" height="125" fill="#ffffff"></rect>
                                    <g transform="scale(3.049)">
                                        <g transform="translate(0,0)">
                                            <path fill-rule="evenodd"
                                                d="M9 0L9 1L8 1L8 3L9 3L9 4L8 4L8 8L6 8L6 9L4 9L4 8L3 8L3 9L2 9L2 8L0 8L0 10L3 10L3 9L4 9L4 10L5 10L5 11L4 11L4 13L3 13L3 12L2 12L2 11L0 11L0 12L2 12L2 14L1 14L1 13L0 13L0 15L1 15L1 16L0 16L0 19L2 19L2 20L3 20L3 21L1 21L1 22L0 22L0 23L1 23L1 24L0 24L0 28L2 28L2 30L3 30L3 31L4 31L4 29L5 29L5 32L4 32L4 33L7 33L7 32L6 32L6 31L8 31L8 30L9 30L9 29L10 29L10 28L9 28L9 27L10 27L10 26L11 26L11 29L13 29L13 30L18 30L18 31L15 31L15 32L14 32L14 33L13 33L13 31L11 31L11 30L10 30L10 32L9 32L9 33L8 33L8 35L9 35L9 34L13 34L13 37L14 37L14 39L12 39L12 38L10 38L10 39L8 39L8 41L10 41L10 40L11 40L11 41L12 41L12 40L14 40L14 41L15 41L15 38L16 38L16 39L17 39L17 40L16 40L16 41L17 41L17 40L19 40L19 41L20 41L20 40L19 40L19 38L20 38L20 39L21 39L21 40L22 40L22 41L25 41L25 40L27 40L27 41L29 41L29 40L30 40L30 37L29 37L29 40L28 40L28 39L24 39L24 38L26 38L26 37L25 37L25 36L26 36L26 35L25 35L25 36L23 36L23 37L22 37L22 35L23 35L23 34L26 34L26 33L28 33L28 35L27 35L27 37L28 37L28 35L29 35L29 34L32 34L32 37L34 37L34 38L33 38L33 39L34 39L34 40L32 40L32 38L31 38L31 40L32 40L32 41L34 41L34 40L35 40L35 41L36 41L36 40L35 40L35 39L34 39L34 38L36 38L36 39L37 39L37 38L38 38L38 37L37 37L37 34L38 34L38 36L39 36L39 38L41 38L41 36L39 36L39 35L40 35L40 34L41 34L41 30L40 30L40 29L41 29L41 28L40 28L40 29L39 29L39 30L36 30L36 28L35 28L35 31L34 31L34 32L33 32L33 30L34 30L34 28L32 28L32 27L33 27L33 26L34 26L34 25L35 25L35 26L36 26L36 27L37 27L37 28L38 28L38 27L37 27L37 26L36 26L36 24L37 24L37 23L36 23L36 24L35 24L35 21L40 21L40 20L38 20L38 19L41 19L41 18L40 18L40 17L39 17L39 18L38 18L38 17L37 17L37 16L36 16L36 15L38 15L38 14L36 14L36 15L33 15L33 16L32 16L32 15L31 15L31 16L30 16L30 15L29 15L29 14L28 14L28 13L30 13L30 14L31 14L31 13L32 13L32 14L33 14L33 13L34 13L34 14L35 14L35 13L36 13L36 12L37 12L37 13L39 13L39 15L40 15L40 16L41 16L41 14L40 14L40 13L41 13L41 12L40 12L40 8L38 8L38 9L37 9L37 8L34 8L34 9L32 9L32 8L33 8L33 5L32 5L32 4L33 4L33 2L31 2L31 1L32 1L32 0L30 0L30 1L29 1L29 0L27 0L27 1L25 1L25 2L26 2L26 3L25 3L25 5L24 5L24 4L23 4L23 3L21 3L21 2L19 2L19 1L21 1L21 0L19 0L19 1L18 1L18 2L17 2L17 1L15 1L15 0L11 0L11 1L10 1L10 0ZM22 0L22 1L23 1L23 2L24 2L24 0ZM11 1L11 4L10 4L10 5L11 5L11 9L12 9L12 8L14 8L14 6L13 6L13 5L12 5L12 3L15 3L15 4L14 4L14 5L15 5L15 4L17 4L17 5L18 5L18 6L17 6L17 7L16 7L16 6L15 6L15 7L16 7L16 9L15 9L15 10L14 10L14 13L13 13L13 10L11 10L11 11L10 11L10 12L8 12L8 13L6 13L6 12L7 12L7 11L8 11L8 10L9 10L9 9L10 9L10 6L9 6L9 8L8 8L8 9L6 9L6 10L7 10L7 11L6 11L6 12L5 12L5 13L6 13L6 14L10 14L10 12L12 12L12 16L9 16L9 15L4 15L4 14L2 14L2 15L3 15L3 17L2 17L2 18L4 18L4 17L5 17L5 18L8 18L8 19L5 19L5 20L4 20L4 22L1 22L1 23L4 23L4 22L5 22L5 24L4 24L4 27L3 27L3 26L2 26L2 28L3 28L3 29L4 29L4 27L6 27L6 28L7 28L7 29L6 29L6 30L8 30L8 28L7 28L7 27L8 27L8 26L9 26L9 25L10 25L10 23L8 23L8 22L7 22L7 21L9 21L9 22L11 22L11 21L9 21L9 20L11 20L11 19L12 19L12 16L13 16L13 14L14 14L14 13L15 13L15 11L16 11L16 9L17 9L17 12L18 12L18 13L16 13L16 14L15 14L15 15L16 15L16 17L18 17L18 18L19 18L19 19L18 19L18 21L17 21L17 20L15 20L15 21L14 21L14 19L16 19L16 18L14 18L14 19L13 19L13 23L16 23L16 21L17 21L17 24L12 24L12 25L16 25L16 26L15 26L15 27L16 27L16 28L17 28L17 25L19 25L19 28L18 28L18 29L19 29L19 28L21 28L21 29L20 29L20 30L19 30L19 32L17 32L17 33L19 33L19 34L18 34L18 35L16 35L16 34L15 34L15 33L16 33L16 32L15 32L15 33L14 33L14 34L15 34L15 35L14 35L14 36L15 36L15 37L16 37L16 38L17 38L17 37L18 37L18 38L19 38L19 36L18 36L18 35L19 35L19 34L20 34L20 35L22 35L22 34L23 34L23 33L24 33L24 32L28 32L28 33L29 33L29 32L28 32L28 30L27 30L27 29L28 29L28 28L29 28L29 29L32 29L32 30L31 30L31 32L30 32L30 33L32 33L32 30L33 30L33 29L32 29L32 28L31 28L31 27L32 27L32 26L30 26L30 25L31 25L31 23L29 23L29 22L27 22L27 21L28 21L28 20L29 20L29 19L28 19L28 17L29 17L29 18L30 18L30 19L31 19L31 20L30 20L30 22L32 22L32 23L34 23L34 21L32 21L32 20L34 20L34 18L35 18L35 19L36 19L36 20L37 20L37 17L36 17L36 16L34 16L34 17L32 17L32 18L30 18L30 17L29 17L29 16L26 16L26 17L25 17L25 18L26 18L26 17L27 17L27 19L24 19L24 18L23 18L23 20L21 20L21 21L22 21L22 24L21 24L21 23L18 23L18 22L19 22L19 19L20 19L20 18L22 18L22 17L24 17L24 15L28 15L28 14L27 14L27 11L28 11L28 12L30 12L30 13L31 13L31 12L30 12L30 11L31 11L31 8L32 8L32 6L31 6L31 5L29 5L29 7L30 7L30 6L31 6L31 8L27 8L27 7L28 7L28 6L27 6L27 7L26 7L26 5L25 5L25 11L24 11L24 10L23 10L23 8L24 8L24 5L23 5L23 7L22 7L22 6L21 6L21 4L20 4L20 3L19 3L19 2L18 2L18 3L19 3L19 5L18 5L18 4L17 4L17 3L15 3L15 1L14 1L14 2L13 2L13 1ZM27 2L27 4L28 4L28 2ZM31 3L31 4L32 4L32 3ZM19 5L19 6L18 6L18 7L17 7L17 9L18 9L18 7L19 7L19 6L20 6L20 7L21 7L21 8L22 8L22 7L21 7L21 6L20 6L20 5ZM12 6L12 7L13 7L13 6ZM26 8L26 10L27 10L27 8ZM20 9L20 10L19 10L19 13L20 13L20 14L23 14L23 15L19 15L19 17L22 17L22 16L23 16L23 15L24 15L24 14L26 14L26 11L25 11L25 13L24 13L24 12L23 12L23 11L20 11L20 10L22 10L22 9ZM28 9L28 11L29 11L29 10L30 10L30 9ZM35 9L35 10L36 10L36 11L34 11L34 10L32 10L32 11L34 11L34 12L36 12L36 11L37 11L37 12L38 12L38 11L39 11L39 9L38 9L38 11L37 11L37 9ZM21 12L21 13L23 13L23 12ZM17 14L17 16L18 16L18 14ZM5 16L5 17L7 17L7 16ZM8 16L8 17L9 17L9 18L10 18L10 17L9 17L9 16ZM14 16L14 17L15 17L15 16ZM35 17L35 18L36 18L36 17ZM27 19L27 20L26 20L26 21L27 21L27 20L28 20L28 19ZM6 20L6 21L5 21L5 22L6 22L6 23L7 23L7 24L6 24L6 25L7 25L7 26L6 26L6 27L7 27L7 26L8 26L8 25L9 25L9 24L8 24L8 23L7 23L7 22L6 22L6 21L7 21L7 20ZM24 21L24 22L25 22L25 24L27 24L27 22L25 22L25 21ZM39 22L39 23L38 23L38 25L39 25L39 27L41 27L41 24L40 24L40 25L39 25L39 23L40 23L40 22ZM28 23L28 25L29 25L29 23ZM19 24L19 25L20 25L20 26L21 26L21 24ZM32 24L32 25L33 25L33 24ZM23 25L23 27L21 27L21 28L22 28L22 31L21 31L21 32L19 32L19 33L20 33L20 34L22 34L22 31L23 31L23 28L24 28L24 31L27 31L27 30L25 30L25 28L27 28L27 27L25 27L25 25ZM26 25L26 26L27 26L27 25ZM12 26L12 27L14 27L14 26ZM28 26L28 27L29 27L29 28L30 28L30 26ZM14 28L14 29L15 29L15 28ZM0 30L0 31L1 31L1 30ZM29 30L29 31L30 31L30 30ZM36 31L36 32L37 32L37 33L39 33L39 34L40 34L40 33L39 33L39 31L38 31L38 32L37 32L37 31ZM0 32L0 33L1 33L1 32ZM2 32L2 33L3 33L3 32ZM11 32L11 33L12 33L12 32ZM33 33L33 36L36 36L36 33ZM34 34L34 35L35 35L35 34ZM15 35L15 36L16 36L16 35ZM10 36L10 37L11 37L11 36ZM20 36L20 37L21 37L21 36ZM8 37L8 38L9 38L9 37ZM23 37L23 38L24 38L24 37ZM36 37L36 38L37 38L37 37ZM22 39L22 40L24 40L24 39ZM39 39L39 40L37 40L37 41L40 41L40 39ZM0 0L7 0L7 7L0 7ZM1 1L1 6L6 6L6 1ZM2 2L5 2L5 5L2 5ZM34 0L41 0L41 7L34 7ZM35 1L35 6L40 6L40 1ZM36 2L39 2L39 5L36 5ZM0 34L7 34L7 41L0 41ZM1 35L1 40L6 40L6 35ZM2 36L5 36L5 39L2 39Z"
                                                fill="#000000"></path>
                                        </g>
                                    </g>
                                </svg>
                            </span>
                        </div>
                        <div
                            class="col-md-6 parent-barcode text-center d-flex align-items-center justify-content-center flex-column  gap-3">

                            <div
                                class="parent-barcode bottom-qr text-center d-flex align-items-center justify-content-center ">
                                <span style="width: 150px;"><!--?xml version="1.0" encoding="UTF-8"?-->
                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="125" height="125"
                                        viewBox="0 0 125 125">
                                        <rect x="0" y="0" width="125" height="125" fill="#ffffff"></rect>
                                        <g transform="scale(3.049)">
                                            <g transform="translate(0,0)">
                                                <path fill-rule="evenodd"
                                                    d="M9 0L9 1L8 1L8 3L9 3L9 4L8 4L8 8L6 8L6 9L4 9L4 8L3 8L3 9L2 9L2 8L0 8L0 10L3 10L3 9L4 9L4 10L5 10L5 11L4 11L4 13L3 13L3 12L2 12L2 11L0 11L0 12L2 12L2 14L1 14L1 13L0 13L0 15L1 15L1 16L0 16L0 19L2 19L2 20L3 20L3 21L1 21L1 22L0 22L0 23L1 23L1 24L0 24L0 28L2 28L2 30L3 30L3 31L4 31L4 29L5 29L5 32L4 32L4 33L7 33L7 32L6 32L6 31L8 31L8 30L9 30L9 29L10 29L10 28L9 28L9 27L10 27L10 26L11 26L11 29L13 29L13 30L18 30L18 31L15 31L15 32L14 32L14 33L13 33L13 31L11 31L11 30L10 30L10 32L9 32L9 33L8 33L8 35L9 35L9 34L13 34L13 37L14 37L14 39L12 39L12 38L10 38L10 39L8 39L8 41L10 41L10 40L11 40L11 41L12 41L12 40L14 40L14 41L15 41L15 38L16 38L16 39L17 39L17 40L16 40L16 41L17 41L17 40L19 40L19 41L20 41L20 40L19 40L19 38L20 38L20 39L21 39L21 40L22 40L22 41L25 41L25 40L27 40L27 41L29 41L29 40L30 40L30 37L29 37L29 40L28 40L28 39L24 39L24 38L26 38L26 37L25 37L25 36L26 36L26 35L25 35L25 36L23 36L23 37L22 37L22 35L23 35L23 34L26 34L26 33L28 33L28 35L27 35L27 37L28 37L28 35L29 35L29 34L32 34L32 37L34 37L34 38L33 38L33 39L34 39L34 40L32 40L32 38L31 38L31 40L32 40L32 41L34 41L34 40L35 40L35 41L36 41L36 40L35 40L35 39L34 39L34 38L36 38L36 39L37 39L37 38L38 38L38 37L37 37L37 34L38 34L38 36L39 36L39 38L41 38L41 36L39 36L39 35L40 35L40 34L41 34L41 30L40 30L40 29L41 29L41 28L40 28L40 29L39 29L39 30L36 30L36 28L35 28L35 31L34 31L34 32L33 32L33 30L34 30L34 28L32 28L32 27L33 27L33 26L34 26L34 25L35 25L35 26L36 26L36 27L37 27L37 28L38 28L38 27L37 27L37 26L36 26L36 24L37 24L37 23L36 23L36 24L35 24L35 21L40 21L40 20L38 20L38 19L41 19L41 18L40 18L40 17L39 17L39 18L38 18L38 17L37 17L37 16L36 16L36 15L38 15L38 14L36 14L36 15L33 15L33 16L32 16L32 15L31 15L31 16L30 16L30 15L29 15L29 14L28 14L28 13L30 13L30 14L31 14L31 13L32 13L32 14L33 14L33 13L34 13L34 14L35 14L35 13L36 13L36 12L37 12L37 13L39 13L39 15L40 15L40 16L41 16L41 14L40 14L40 13L41 13L41 12L40 12L40 8L38 8L38 9L37 9L37 8L34 8L34 9L32 9L32 8L33 8L33 5L32 5L32 4L33 4L33 2L31 2L31 1L32 1L32 0L30 0L30 1L29 1L29 0L27 0L27 1L25 1L25 2L26 2L26 3L25 3L25 5L24 5L24 4L23 4L23 3L21 3L21 2L19 2L19 1L21 1L21 0L19 0L19 1L18 1L18 2L17 2L17 1L15 1L15 0L11 0L11 1L10 1L10 0ZM22 0L22 1L23 1L23 2L24 2L24 0ZM11 1L11 4L10 4L10 5L11 5L11 9L12 9L12 8L14 8L14 6L13 6L13 5L12 5L12 3L15 3L15 4L14 4L14 5L15 5L15 4L17 4L17 5L18 5L18 6L17 6L17 7L16 7L16 6L15 6L15 7L16 7L16 9L15 9L15 10L14 10L14 13L13 13L13 10L11 10L11 11L10 11L10 12L8 12L8 13L6 13L6 12L7 12L7 11L8 11L8 10L9 10L9 9L10 9L10 6L9 6L9 8L8 8L8 9L6 9L6 10L7 10L7 11L6 11L6 12L5 12L5 13L6 13L6 14L10 14L10 12L12 12L12 16L9 16L9 15L4 15L4 14L2 14L2 15L3 15L3 17L2 17L2 18L4 18L4 17L5 17L5 18L8 18L8 19L5 19L5 20L4 20L4 22L1 22L1 23L4 23L4 22L5 22L5 24L4 24L4 27L3 27L3 26L2 26L2 28L3 28L3 29L4 29L4 27L6 27L6 28L7 28L7 29L6 29L6 30L8 30L8 28L7 28L7 27L8 27L8 26L9 26L9 25L10 25L10 23L8 23L8 22L7 22L7 21L9 21L9 22L11 22L11 21L9 21L9 20L11 20L11 19L12 19L12 16L13 16L13 14L14 14L14 13L15 13L15 11L16 11L16 9L17 9L17 12L18 12L18 13L16 13L16 14L15 14L15 15L16 15L16 17L18 17L18 18L19 18L19 19L18 19L18 21L17 21L17 20L15 20L15 21L14 21L14 19L16 19L16 18L14 18L14 19L13 19L13 23L16 23L16 21L17 21L17 24L12 24L12 25L16 25L16 26L15 26L15 27L16 27L16 28L17 28L17 25L19 25L19 28L18 28L18 29L19 29L19 28L21 28L21 29L20 29L20 30L19 30L19 32L17 32L17 33L19 33L19 34L18 34L18 35L16 35L16 34L15 34L15 33L16 33L16 32L15 32L15 33L14 33L14 34L15 34L15 35L14 35L14 36L15 36L15 37L16 37L16 38L17 38L17 37L18 37L18 38L19 38L19 36L18 36L18 35L19 35L19 34L20 34L20 35L22 35L22 34L23 34L23 33L24 33L24 32L28 32L28 33L29 33L29 32L28 32L28 30L27 30L27 29L28 29L28 28L29 28L29 29L32 29L32 30L31 30L31 32L30 32L30 33L32 33L32 30L33 30L33 29L32 29L32 28L31 28L31 27L32 27L32 26L30 26L30 25L31 25L31 23L29 23L29 22L27 22L27 21L28 21L28 20L29 20L29 19L28 19L28 17L29 17L29 18L30 18L30 19L31 19L31 20L30 20L30 22L32 22L32 23L34 23L34 21L32 21L32 20L34 20L34 18L35 18L35 19L36 19L36 20L37 20L37 17L36 17L36 16L34 16L34 17L32 17L32 18L30 18L30 17L29 17L29 16L26 16L26 17L25 17L25 18L26 18L26 17L27 17L27 19L24 19L24 18L23 18L23 20L21 20L21 21L22 21L22 24L21 24L21 23L18 23L18 22L19 22L19 19L20 19L20 18L22 18L22 17L24 17L24 15L28 15L28 14L27 14L27 11L28 11L28 12L30 12L30 13L31 13L31 12L30 12L30 11L31 11L31 8L32 8L32 6L31 6L31 5L29 5L29 7L30 7L30 6L31 6L31 8L27 8L27 7L28 7L28 6L27 6L27 7L26 7L26 5L25 5L25 11L24 11L24 10L23 10L23 8L24 8L24 5L23 5L23 7L22 7L22 6L21 6L21 4L20 4L20 3L19 3L19 2L18 2L18 3L19 3L19 5L18 5L18 4L17 4L17 3L15 3L15 1L14 1L14 2L13 2L13 1ZM27 2L27 4L28 4L28 2ZM31 3L31 4L32 4L32 3ZM19 5L19 6L18 6L18 7L17 7L17 9L18 9L18 7L19 7L19 6L20 6L20 7L21 7L21 8L22 8L22 7L21 7L21 6L20 6L20 5ZM12 6L12 7L13 7L13 6ZM26 8L26 10L27 10L27 8ZM20 9L20 10L19 10L19 13L20 13L20 14L23 14L23 15L19 15L19 17L22 17L22 16L23 16L23 15L24 15L24 14L26 14L26 11L25 11L25 13L24 13L24 12L23 12L23 11L20 11L20 10L22 10L22 9ZM28 9L28 11L29 11L29 10L30 10L30 9ZM35 9L35 10L36 10L36 11L34 11L34 10L32 10L32 11L34 11L34 12L36 12L36 11L37 11L37 12L38 12L38 11L39 11L39 9L38 9L38 11L37 11L37 9ZM21 12L21 13L23 13L23 12ZM17 14L17 16L18 16L18 14ZM5 16L5 17L7 17L7 16ZM8 16L8 17L9 17L9 18L10 18L10 17L9 17L9 16ZM14 16L14 17L15 17L15 16ZM35 17L35 18L36 18L36 17ZM27 19L27 20L26 20L26 21L27 21L27 20L28 20L28 19ZM6 20L6 21L5 21L5 22L6 22L6 23L7 23L7 24L6 24L6 25L7 25L7 26L6 26L6 27L7 27L7 26L8 26L8 25L9 25L9 24L8 24L8 23L7 23L7 22L6 22L6 21L7 21L7 20ZM24 21L24 22L25 22L25 24L27 24L27 22L25 22L25 21ZM39 22L39 23L38 23L38 25L39 25L39 27L41 27L41 24L40 24L40 25L39 25L39 23L40 23L40 22ZM28 23L28 25L29 25L29 23ZM19 24L19 25L20 25L20 26L21 26L21 24ZM32 24L32 25L33 25L33 24ZM23 25L23 27L21 27L21 28L22 28L22 31L21 31L21 32L19 32L19 33L20 33L20 34L22 34L22 31L23 31L23 28L24 28L24 31L27 31L27 30L25 30L25 28L27 28L27 27L25 27L25 25ZM26 25L26 26L27 26L27 25ZM12 26L12 27L14 27L14 26ZM28 26L28 27L29 27L29 28L30 28L30 26ZM14 28L14 29L15 29L15 28ZM0 30L0 31L1 31L1 30ZM29 30L29 31L30 31L30 30ZM36 31L36 32L37 32L37 33L39 33L39 34L40 34L40 33L39 33L39 31L38 31L38 32L37 32L37 31ZM0 32L0 33L1 33L1 32ZM2 32L2 33L3 33L3 32ZM11 32L11 33L12 33L12 32ZM33 33L33 36L36 36L36 33ZM34 34L34 35L35 35L35 34ZM15 35L15 36L16 36L16 35ZM10 36L10 37L11 37L11 36ZM20 36L20 37L21 37L21 36ZM8 37L8 38L9 38L9 37ZM23 37L23 38L24 38L24 37ZM36 37L36 38L37 38L37 37ZM22 39L22 40L24 40L24 39ZM39 39L39 40L37 40L37 41L40 41L40 39ZM0 0L7 0L7 7L0 7ZM1 1L1 6L6 6L6 1ZM2 2L5 2L5 5L2 5ZM34 0L41 0L41 7L34 7ZM35 1L35 6L40 6L40 1ZM36 2L39 2L39 5L36 5ZM0 34L7 34L7 41L0 41ZM1 35L1 40L6 40L6 35ZM2 36L5 36L5 39L2 39Z"
                                                    fill="#000000"></path>
                                            </g>
                                        </g>
                                    </svg>
                                </span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
