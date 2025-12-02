{{--
<!DOCTYPE html>
<html lang="ar"> --}}
@include('admin.layouts.parts.head')
<style>
    body {
        font-family: 'XBRiyaz';
        direction: ltr;
    }
</style>


<body>
    <section class=" " dir="ltr">
        <div class="box-quotation d-flex flex-column mb-3">
            <div class="content-box p-3">
                <div class="row g-4 align-items-center justify-content-between mb-3">
                    <div class="col-12 col-md-4 col-xxl-3">
                        <div class="info text-center w-fit">
                            <p class="m-1">
                                <b class="name">{{ setting('website_name') }}</b>
                            </p>
                            <p class="m-0">
                                <small>{{ setting('email') }}</small>
                            </p>
                            <p class="m-0">
                                <small>{{ setting('phone') }}</small>
                            </p>
                        </div>
                    </div>

                    <div class="col-12 col-md-4 col-xxl-3" style="text-align: right">
                        <div class="logo">
                            <img src="{{ display_file(setting('logo')) }}" width="80" alt="">
                            <div class="title">شركة إعمار المساند لتشغيل والصيانة</div>
                        </div>
                    </div>
                </div>
                <h5 class="fw-bold"> Att. {{ $price_quotation->client?->name }} Company </h5>
                <h5 class="fw-bold">Subject: Quotation </h5>
                <h6 class="fw-bold">Greetings:</h6>
                <h6 class="fw-normal">We are pleased to offer you the following manpower supply quotation, along
                    with
                    its price
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
                                <th>Total Cost</th>
                                <th>Remarks</th>
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
                                <td>{{ $job->notes }}</td>
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
                <p> Mobile: {{ setting('phone') }} or email “
                    <a href="mailto:{{ setting('email') }}"> <u class="text-primary">{{ setting('email') }}</u></a>
                </p>
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
                                <div class="item-footer-page" style="display:block; text-align:right;">
                                    <span style="color: white;">{{ setting('email') }}</span>
                                    <div class="icon" style="display:inline-flex">
                                        <i class="fas fa-envelope"></i>
                                    </div>
                                </div>
                            </td>

                            <td>
                                <div class="item-footer-page" style="display:block; text-align:right;">
                                    <span style="color: white;">{{ setting('website_url') }}</span>
                                    <div class="icon" style="display:inline-flex">
                                        <i class="fa-solid fa-globe"></i>
                                    </div>
                                </div>
                            </td>

                            <td>
                                <div class="item-footer-page" style="display:block; text-align:right;">
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
        </div>
    </section>
</body>

</html>

{{-- @include('admin.layouts.parts.footer') --}}
