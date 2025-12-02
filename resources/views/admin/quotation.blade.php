@extends('admin.layouts.admin')
@section('content')

<section class="main-side " dir="ltr">
    <div class="box-quotation d-flex flex-column mb-3">
        <div class="content-box">
            <div class="row g-4 align-items-center justify-content-between mb-3">
                <div class="col-12 col-md-4 col-xxl-3">
                    <div class="info text-center w-fit">
                        <p class="m-1">
                            <b class="name">Emaar almosanad</b>
                        </p>
                        <p class="m-0">
                            <small>ceo@emaarsck.com</small>
                        </p>
                        <p class="m-0">
                            <small>00966539600010</small>
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
            <h5 class="fw-bold"> Att. ----------------- Company </h5>
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
                            <th>Discription</th>
                            <th>Duration</th>
                            <th>Price per individual</th>
                            <th>Number</th>
                            <th>Nationality</th>
                            <th>Remarks</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>--</td>
                            <td>--</td>
                            <td>--</td>
                            <td>--</td>
                            <td>--</td>
                            <td>--</td>
                            <td>--</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <ul style="list-style:decimal;" class="me-4 fs-6 d-flex flex-column gap-1">
                <li>This offer include Medical test , Iqama renewal, Work permit, ATM fee, Salary transfer, Ajeer cost,
                    Medical insurance, Exit-re, Joining Ticket, Return /Vacation Ticket, ESOB, GOSI fee 2% , Passport
                    Service Charge, Recruitment fees is there</li>
                <li>Price does not include VAT</li>
                <li>Price does not include accommodation and transportation.</li>
                <li>Price does not include cleaning supplies, and uniform.</li>
                <li>Hiring process after candidate selection 20 working days</li>
            </ul>
            <h6>
                In case of any inquiries we are pleased to answer you and give you all the needed support.
            </h6>
            <p class="mb-1">
                <b>Business Development Manager:</b>
            </p>
            <p>
                <b>Maged Salama:</b>
            </p>
            <p> Mobile: 0500258637 or email “
                <a href="mailto:M.salama@emaar-om.com"> <u class="text-primary">M.salama@emaar-om.com</u></a>
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
@endsection