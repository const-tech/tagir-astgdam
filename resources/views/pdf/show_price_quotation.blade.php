{{-- <!DOCTYPE html>
<html lang="ar"> --}}
@include('admin.layouts.parts.head')
<style>
    body {
        font-family: 'XBRiyaz';
        direction: rtl;
    }
</style>
{{-- <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>عرض سعر </title>

</head> --}}

<body>
    <div class="main-side">
        <div class="app-price">
            <section class="price-page">
                <img src="{{ asset('admin-asset/img/a3mar-logo.png') }}" alt="logo" class="logo-page">
                {{-- <img src="{{ asset('admin-asset/img/a3mar-logo.png') }}" alt="logo" class="fixed-logo"> --}}
                <div class="content-page">
                    <div class="fs-14px mb-2">التاريخ: {{ $price_quotation->created_at->format('Y/m/d') }}</div>
                    <h5>السادة: {{ $price_quotation->client?->name }} الموقرين </h5>
                    <div class="fw-bold mb-1" style="color: #275317"> الموضوع: عرض سعر </div>
                    <div class="mb-1 fw-bold">
                        بعد التحية،
                    </div>
                    <div class="mb-1 fw-bold">
                        نتشرف بتقديم عرض سعر الخاص بتوفير الأيادي العاملة، التسعيرة حسب البيان المرفق أدناه.
                    </div>
                    <div class="mb-1 fw-bold">
                        العرض يشمل الآتي
                    </div>
                    <div class="table-responsive">
                        <table class="table main-table-2">
                            <thead>
                                <tr>
                                    <th>الرقم</th>
                                    <th>الوصف</th>
                                    <th>مدة التعاقد</th>
                                    <th>السعر- للفرد</th>
                                    <th>العدد</th>
                                    <th>اجمالى التكلفة</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($price_quotation->jobs as $job)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $job->job_title }}</td>
                                        <td>{{ $job->contract_duration }}</td>
                                        <td>{{ $job->total_costs }}</td>
                                        <td>{{ $job->number }}</td>
                                        <td>{{ $job->total_costs * $job->number }}</td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    {{--                <ol class="fw-bold"> --}}
                    {{--                    <li>العرض يشمل جميع التكاليف المتعلقة بالراتب، التأمين الطبي، اصدار الإقامة، التأمينات الاجتماعية، نظام --}}
                    {{--                        اجير، الإجازة مع التذكرة، وحساب نهاية الخدمة.</li> --}}
                    {{--                    <li>السعر لا يشمل السكن ولا المواصلات ولا الكارت الصحي ولا الزي ولاوجبة اثناء الدوام </li> --}}
                    {{--                    <li>السعر لا يشمل القيمة المضافة </li> --}}
                    {{--                    <li>ساعات العمل سوف تكون 8 ساعات عمل وساعة بريك لمدة 6 أيام أسبوعيا، وأي أعمال إضافية سوف يتم حساب ساعة --}}
                    {{--                        بساعة ونصف</li> --}}
                    {{--                </ol> --}}
                    {!! $price_quotation->special_requirements !!}
                    <p class="fw-bold mb-2">في حال وجود أي استفسارات أخرى نرجو التواصل معنا نتشرف بخدمتكم ويوم سعيد
                        ولسعادتكم أطيب
                        تحياتي.. </p>
                    <p class="fw-bold mb-2">مدير التطوير الأعمال: ماجد سلامه </p>
                    <p class="fw-bold mb-2"> رقم التواصل : {{ setting('phone') }} </p>
                    <p class="fs-14px mb-0"> Email: <a href="mailto:{{ setting('email') }}"
                            class="text-primary">{{ setting('email') }}</a> </p>
                    <div class="d-flex justify-content-center">
                        <img src="{{ asset('admin-asset/img/khitm.png') }}" class="h-auto" width="110"
                            alt="khitm">
                    </div>
                </div>
                <div class="footer-page">
                    <div class="top-footer-page">
                        <table style="width: 100%">
                            <tr>
                                <td>
                                    <div class="item-footer-page" style="display:block;">
                                        <div class="icon" style="display:inline-flex">
                                            <i class="fa-solid fa-location-dot"></i>
                                        </div>
                                        <span style="color: white;">{{ setting('address') }}</span>
                                    </div>
                                </td>

                                <td>
                                    <div class="item-footer-page" style="display:block; text-align:left;">
                                        <span style="color: white;">{{ setting('email') }}</span>
                                        <div class="icon" style="display:inline-flex">
                                            <i class="fas fa-envelope"></i>
                                        </div>
                                    </div>
                                </td>

                                <td>
                                    <div class="item-footer-page" style="display:block; text-align:left;">
                                        <span style="color: white;">{{ setting('website_url') }}</span>
                                        <div class="icon" style="display:inline-flex">
                                            <i class="fa-solid fa-globe"></i>
                                        </div>
                                    </div>
                                </td>

                                <td>
                                    <div class="item-footer-page" style="display:block; text-align:left;">
                                        <span style="color: white;">{{ setting('phone') }}</span>
                                        <div class="icon" style="display:inline-flex">
                                            <i class="fa-solid fa-phone"></i>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="bottom-footer-page"></div>
                </div>
            </section>
        </div>
    </div>
</body>

</html>

{{-- @include('admin.layouts.parts.footer') --}}
