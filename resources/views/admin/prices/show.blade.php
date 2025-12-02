@extends('admin.layouts.admin')
@section('content')
@if(request('lang') === 'en')
    <section class="main-side " dir="ltr">
        <div class="box-quotation d-flex flex-column mb-3">
            <div class="content-box">
                <div class="row g-4 align-items-center justify-content-between mb-3">
                    <div class="col-12 col-md-4 col-xxl-3">
                        <div class="info text-center w-fit">
                            <p class="m-1">
                                <b class="name">{{setting('website_name')}}</b>
                            </p>
                            <p class="m-0">
                                <small>{{setting('email')}}</small>
                            </p>
                            <p class="m-0">
                                <small>{{setting('phone')}}</small>
                            </p>
                        </div>
                    </div>

                    <div class="col-12 col-md-4 col-xxl-3">
                        <div class="logo">
                            <img src="{{display_file(setting('logo'))}}" width="80" alt="">
                            <div class="title">شركة إعمار المساند لتشغيل والصيانة</div>
                        </div>
                    </div>
                </div>
                <h5 class="fw-bold"> Att. {{$price_quotation->client?->name}} Company </h5>
                <h5 class="fw-bold">Subject: Quotation </h5>
                <h6 class="fw-bold">Greetings:</h6>
                <h6 class="fw-normal">We are pleased to offer you the following manpower supply quotation, along with its price
                    list according to the following</h6>
                <h6 class="fw-normal">Quotation Include:</h6>
                <div class="table-responsive">
                    <table class="main-table table main-table-2 mb-2">
                        <thead>
                        <tr>
                            <th>Ser</th>
                            <th>Description</th>
                            <th>Duration</th>
                            <th>Price per individual</th>
                            <th>Number</th>
{{--                            <th>Nationality</th>--}}
                            <th>Remarks</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($price_quotation->jobs as $job)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$job->job_title}}</td>
                                <td>{{$job->contract_duration}}</td>
                                <td>{{$job->total_costs}}</td>
                                <td>{{$job->number}}</td>
                                <td>{{$job->notes}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                    {!! $price_quotation->special_requirements_en !!}
                <h6>
                    In case of any inquiries we are pleased to answer you and give you all the needed support.
                </h6>
                <p class="mb-1">
                    <b>Business Development Manager:</b>
                </p>
                <p>
                    <b>Maged Salama:</b>
                </p>
                <p> Mobile: {{setting('phone')}} or email “
                    <a href="mailto:{{setting('email')}}"> <u class="text-primary">{{setting('email')}}</u></a>
                </p>
            </div>
            <div class="footer-page">
                <div class="top-footer-page">
                    <div class="d-flex justify-content-between flex-wrap align-items-center gap-3">
                        <div class="item-footer-page">
                            <div class="icon">
                                <i class="fa-solid fa-location-dot"></i>
                            </div>
                            {{setting('address')}}
                        </div>
                        <div class="d-flex flex-wrap align-items-center gap-3">
                            <div class="item-footer-page">
                                {{setting('email')}}
                                <div class="icon">
                                    <i class="fas fa-envelope"></i>
                                </div>
                            </div>
                            <div class="item-footer-page">
                                {{setting('website_url')}}
                                <div class="icon">
                                    <i class="fa-solid fa-globe"></i>
                                </div>
                            </div>
                            <div class="item-footer-page">
                                {{setting('phone')}}
                                <div class="icon">
                                    <i class="fa-solid fa-phone"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bottom-footer-page">
                </div>
            </div>
        </div>
    </section>


@else
    <div class="main-side">
        <button onclick="generateHTML2PDF()" class="btn btn-success">{{ __('download PDF') }}</button>
        <div class="app-price" id="html2pdf">
            <section class="price-page">
                <img src="{{ asset('admin-asset/img/a3mar-logo.png') }}" alt="logo" class="logo-page">
                <img src="{{ asset('admin-asset/img/a3mar-logo.png') }}" alt="logo" class="fixed-logo">
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
                                    </tr>
                                @endforeach

                        </tbody>
                    </table>
                </div>
                {!! $price_quotation->special_requirements !!}
                <p class="fw-bold mb-2">في حال وجود أي استفسارات أخرى نرجو التواصل معنا نتشرف بخدمتكم ويوم سعيد ولسعادتكم أطيب
                    تحياتي.. </p>
                <p class="fw-bold mb-2">مدير التطوير الأعمال: ماجد سلامه </p>
                <p class="fw-bold mb-2"> رقم التواصل : {{setting('phone')}} </p>
                <p class="fs-14px mb-0"> Email: <a href="mailto:{{setting('email')}}" class="text-primary">{{setting('email')}}</a> </p>
                <div class="d-flex justify-content-center">
                    <img src="{{asset('admin-asset/img/khitm.png')}}" class="h-auto" width="110" alt="khitm">
                </div>
            </div>
            <div class="footer-page">
                <div class="top-footer-page">
                    <div class="d-flex justify-content-between flex-wrap align-items-center gap-3">
                        <div class="item-footer-page">
                            <div class="icon">
                                <i class="fa-solid fa-location-dot"></i>
                            </div>
                             {{setting('address')}}
                        </div>
                        <div class="d-flex flex-wrap align-items-center gap-3">
                            <div class="item-footer-page">
                                {{setting('email')}}
                                <div class="icon">
                                    <i class="fas fa-envelope"></i>
                                </div>
                            </div>
                            <div class="item-footer-page">
                                {{setting('website_url')}}
                                <div class="icon">
                                    <i class="fa-solid fa-globe"></i>
                                </div>
                            </div>
                            <div class="item-footer-page">
                                {{setting('phone')}}
                                <div class="icon">
                                    <i class="fa-solid fa-phone"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bottom-footer-page">
                </div>
            </div>
        </section>
    </div>
</div>
@endif
@endsection

@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js"></script>
<script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
<script>
    function generateHTML2PDF() {
        var element = document.getElementById('html2pdf');

        html2canvas(element, {
            scale: 4 // يمكنك زيادة الرقم للحصول على جودة أعلى
        }).then(function(canvas) {
            var imgData = canvas.toDataURL('image/jpeg');
            var pdf = new jsPDF('p', 'mm', 'a4'); // تأكد من ضبط حجم الورق ليكون A4

            // تحديد الهوامش
            var margin = 5; // يمكنك تغيير القيمة حسب الحاجة
            var imgWidth = pdf.internal.pageSize.getWidth() - 2 * margin;
            var imgHeight = 250;
            // var imgHeight = (canvas.height * imgWidth) / canvas.width;

            // إضافة الصورة مع مراعاة الهوامش
            pdf.addImage(imgData, 'JPEG', margin, margin, imgWidth, imgHeight);
            pdf.save('عرض_سعر.pdf');
        });
    }
</script>
@endpush
