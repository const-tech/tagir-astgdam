<section class="loginPage py-5">
    <style>
        /* Login Page Container */
        .loginPage {
            min-height: 100vh;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            display: flex;
            align-items: center;
        }

        /* Login Box */
        .login_box {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            transform: translateY(20px);
            opacity: 0;
            animation: slideUp 0.6s ease forwards;
        }

        /* Image Holder */
        .image_holder {
            height: 100%;
            position: relative;
            overflow: hidden;
        }

        .image_holder img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transform: scale(1.1);
            animation: zoomIn 1s ease forwards;
        }

        /* Form Section */
        .form-login {
            padding: 40px;
            height: 100%;
        }

        .login_content {
            opacity: 0;
            animation: fadeIn 0.6s ease forwards;
            animation-delay: 0.3s;
        }

        /* Title */
        .title {
            font-size: 24px;
            color: #333;
            margin-bottom: 30px;
            position: relative;
        }

        .title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 50px;
            height: 3px;
            background: #007bff;
            transform: scaleX(0);
            animation: growLine 0.4s ease forwards;
            animation-delay: 0.8s;
        }

        /* Input Styles */
        .inp_holder {
            margin-bottom: 25px;
            position: relative;
        }

        .login-label {
            color: #666;
            font-size: 14px;
            margin-bottom: 8px;
            display: block;
            transform: translateY(5px);
            opacity: 0;
            animation: slideDown 0.4s ease forwards;
            animation-delay: 0.9s;
        }

        .login-inp {
            border: 2px solid #eee;
            border-radius: 10px;
            padding: 12px;
            transition: all 0.3s ease;
        }

        .login-inp:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 3px rgba(0, 123, 255, 0.1);
        }

        /* Button Styles */
        .btn_holder {
            margin-top: 30px;
        }

        .login-btn {
            width: 100%;
            padding: 12px;
            background: #007bff;
            color: white;
            border-radius: 10px;
            border: none;
            font-weight: 600;
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .login-btn:hover {
            background: #0056b3;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 123, 255, 0.3);
        }

        .login-btn:active {
            transform: translateY(0);
        }

        /* Links */
        .form-login a {
            color: #666;
            text-decoration: none;
            font-size: 14px;
            transition: color 0.3s ease;
        }

        .form-login a:hover {
            color: #007bff;
        }

        /* Footer */
        .login_footer {
            opacity: 0;
            animation: fadeIn 0.6s ease forwards;
            animation-delay: 1s;
        }

        .login_footer a {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 12px;
        }

        .login_footer img {
            transition: transform 0.3s ease;
        }

        .login_footer a:hover img {
            transform: rotate(360deg);
        }

        /* Animations */
        @keyframes slideUp {
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        @keyframes fadeIn {
            to {
                opacity: 1;
            }
        }

        @keyframes zoomIn {
            to {
                transform: scale(1);
            }
        }

        @keyframes growLine {
            to {
                transform: scaleX(1);
            }
        }

        @keyframes slideDown {
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .login_box {
                margin: 20px;
            }

            .form-login {
                padding: 20px;
            }

            .image_holder {
                display: none;
            }
        }
    </style>
    <div class="container">
        <x-message-admin></x-message-admin>
        <div class="row login_box shadow-lg">
            <div class="col-md-6 px-0">
                <div class="image_holder shadow-sm">
                    <img src="{{asset('front-asset/img/login_bg.png')}}" alt="login image" srcset="">
                </div>
            </div>
            <div class="col-md-6 px-0">
                <div class="form-login">
                    @if($screen == 'index')
                    <div class="login_content">
                        <h6 class="title">تسجيل الدخول</h6>
                        <div class="inp_holder">
                            <label for="" class="login-label">رقم الهاتف</label>
                            <input type="number" class="login-inp form-control" wire:model="phone">
                        </div>
                        <div class="btn_holder">
                            <button type="button" wire:click='login' class="btn login-btn">تسجيل الدخول</button>
                        </div>
                        <a href="" class="mt-2  d-block">
                            ليس لديك عضوية ؟
                        </a>
                        <a href="" class=" d-block">
                            استعادة @lang("Password")
                        </a>
                        <hr class="my-4">
                        <div class="login_footer d-flex align-items-center justify-content-center">
                            <a href="https://www.const-tech.org/">
                                برمجة وتطوير كوكبة التقنية
                                <img src="{{asset('front-asset/img/login_logo.png')}}" width="60" alt="logo_login">
                            </a>
                        </div>
                    </div>
                    @elseif($screen == 'verify')
                    <div class="login_content">
                        <h6 class="title">تأكيد رقم الهاتف</h6>
                        <div class="inp_holder">
                            <label for="" class="login-label">كود الدخول</label>
                            <input type="number" class="login-inp form-control" wire:model="code">
                        </div>
                        <div class="btn_holder">
                            <button type="button" wire:click='verify' class="btn login-btn">تأكيد</button>
                        </div>
                        <a href="" class="mt-2  d-block">
                            ليس لديك عضوية ؟
                        </a>
                        <a href="" class=" d-block">
                            استعادة @lang("Password")
                        </a>
                        <hr class="my-4">
                        <div class="login_footer d-flex align-items-center justify-content-center">
                            <a href="https://www.const-tech.org/">
                                برمجة وتطوير كوكبة التقنية
                                <img src="{{asset('front-asset/img/login_logo.png')}}" width="60" alt="logo_login">
                            </a>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
