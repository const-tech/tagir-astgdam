<nav class="top-nav">
    <div class="container">
        <a href="#" class="tog-show" data-show=".top-nav .list-item"><i class="fa-solid fa-bars"></i></a>
        <ul class="list-item">
            <li><a href="{{ route('settings') }}">الأعدادات</a></li>
            <li><a href="#">الموظفين</a></li>
            <li><a href="#">الصلاحيات</a></li>
            <li><a href="#">المدن</a></li>
            <li><a href="#">التقارير</a></li>
            <li><a href="{{ route('contact') }}">أتصل بنا</a></li>
        </ul>


        <div class="d-flex gap-2 align-items-center">
            <div class="dropdown">
                <button class="btn btn-light dropdown-toggle btn-sm px-4" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    {{ LaravelLocalization::getSupportedLocales()[app()->getLocale()]['native'] }}
                </button>
                <ul class="dropdown-menu">
                    @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    <li><a class="dropdown-item text-dark text-center" rel="alternate" hreflang="{{ $localeCode }}"
                            href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">{{
                                    $properties['native'] }}</a>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="dropdown-hover" data-show="dropdown-lang">

                <div class="icon-drop">
                    <i class="fa-solid fa-user icon"></i>
                </div>
                <p class="text">admin</p>
                <div class="arrow-icon">
                    <i class="fa-solid fa-angle-down"></i>
                </div>

                <ul class="listis-item" id="dropdown-lang">
                    <li class="item-drop">
                        <a href="{{ route('tickets.index') }}">
                            <p class="text">الدعم الفني</p>
                        </a>
                    </li>
                    <li class="item-drop">
                        <a href="{{ route('profile') }}">
                            <p class="text">الملف الشخصى</p>
                        </a>
                    </li>
                    @auth
                    <li class="item-drop">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit">
                                <p class="text">تسجيل الخروج</p>
                            </button>
                        </form>
                    </li>
                    @endauth
                </ul>
            </div>
        </div>
    </div>
</nav>
