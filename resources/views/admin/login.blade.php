@include('admin.layouts.parts.head')

<!-- Start layout -->
<section class="login_page">
    <img src="{{ asset('admin-asset') }}/img/login/login-bg.webp" alt="img-bg" class="bg" />
    <div class="container">
        <div class="logo-holder">
            <img src="{{ asset('admin-asset/img/login/const-logo.png') }}" alt="" class="const-logo">
        </div>
        @if (session()->has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                {{ session()->get('error') }}
            </div>
        @endif
        <form action="{{ route('admin.login.post') }}" method="POST" class="form_content">
            @csrf
            <div class="content-holder">
                <div class="header_title">
                    <h4 class="title">تسجيل الدخول إلى حسابك!</h4>
                    <p class="text">مرحبا بك مرة أخري, يرجي تسجيل الدخول</p>
                </div>
                <div class="row g-4">
                    <div class="col-12">
                        <div class="group-inp">
                            <div class="box">
                                <img src="{{ asset('admin-asset') }}/img/login/user-icon.png" class="icon"
                                    alt="">
                            </div>
                            <input type="email" placeholder="البريد الالكتروني" name="email" id=""
                                class="inp">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="group-inp">
                            <div class="box">
                                <img src="{{ asset('admin-asset') }}/img/login/lock-icon.png" class="icon"
                                    alt="">
                            </div>
                            <input type="password" placeholder="كلمة المرور" name="password" id=""
                                class="inp inp-pass">
                            <div class="box box-btn" onclick="showPsss('.inp-pass')">
                                <img src="{{ asset('admin-asset') }}/img/login/eye-icon.png" class="icon"
                                    alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 d-flex align-items-center justify-content-between">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="remmber_me"
                                id="flexRadioDefault1">
                            <label class="form-check-label" for="remmber_me">
                                تذكرني دائما
                            </label>
                        </div>
                        <a href="#" class="reseat">نسيت كلمة السر؟</a>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="sub_btn btn btn-primary w-100">تسجيل دخول</button>
                    </div>
                </div>
                {{-- <div class="ask">
                    ليس لديك حساب؟ <a href="#">سجل الان</a>
                </div> --}}
            </div>
        </form>
    </div>

</section>
<!-- End layout -->
