@extends('admin.layouts.admin')
@section('content')
    <div class="main-side">
        <div class="main-title">
            <div class="small">
                {{ __('admin.Home') }}
            </div>
            <div class="large">
                مشاريع العميل / علي العايدي
            </div>
        </div>

        <div class="btn-holder d-flex align-items-center justify-content-between gap-3 flex-wrap mb-2">
            <div class="btn-holder d-flex align-items-center flex-wrap gap-1">
                <a href="{{ route('admin.projects.create') }}" class="main-btn">اضافة <i class="fas fa-plus"></i></a>
                <button class="main-btn btn-main-color">كل المشاريع: 0</button>
                <button class="main-btn">مشاريع مفعلة: 0</button>
                <button class="main-btn bg-warning">مشاريع غير مفعلة: 0</button>
                <button class="main-btn bg-danger">مشاريع ملغية: 0</button>
                <button class="main-btn bg-secondary">مشاريع منتهية: 0</button>
            </div>
            <div class="box-search">
                <img src="{{ asset('admin-asset/img/icons/search.png') }}" alt="icon" />
                <input type="search" id="" placeholder="ابحث باسم المشروع">
            </div>
        </div>

        <div class="row g-3">
            <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                <div class="box-project">
                    <div class="img-holder">
                        <img src="{{ asset('admin-asset/img/image-preview.webp') }}" class="pro-img" alt="project image">
                    </div>
                    <div class="pro-info">
                        <div class="holder-name">
                            <h6 class="name">
                                إســـــم الــمـشـــروع
                            </h6>
                            <span>عدد العمال : 5</span>
                        </div>
                        <div class="bar">
                            <p class="date">
                                بدأ في: 2023-09-26
                            </p>
                            <p class="date">
                                ينتهي في 2023-09-29
                            </p>
                        </div>
                    </div>
                    <div class="progress-holder">
                        <div class="progress" role="progressbar" aria-label="Success example" aria-valuenow="25"
                            aria-valuemin="0" aria-valuemax="100">
                            <div class="progress-bar bg-warning" style="width: 25%">25%</div>
                        </div>
                    </div>
                    <div class="team-work">
                        <a href="{{ route('admin.employees.show') }}" class="team-img" data-bs-toggle="tooltip"
                            data-bs-placement="top" data-bs-title="معاينة ملف العضو">
                            <img src="{{ asset('admin-asset/img/no-image.jpeg') }}" alt="">
                        </a>
                        <a href="{{ route('admin.employees.show') }}" class="team-img" data-bs-toggle="tooltip"
                            data-bs-placement="top" data-bs-title="معاينة ملف العضو">
                            <img src="{{ asset('admin-asset/img/no-image.jpeg') }}" alt="">
                        </a>
                        <a href="{{ route('admin.employees.show') }}" class="team-img" data-bs-toggle="tooltip"
                            data-bs-placement="top" data-bs-title="معاينة ملف العضو">
                            <img src="{{ asset('admin-asset/img/no-image.jpeg') }}" alt="">
                        </a>
                        <button class="btn-team btn-tooltip" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <i class="fas fa-plus"></i>
                            <span class="tip">أضف لفريق العمل</span>
                        </button>
                    </div>
                    <div class="bar-options">
                        <div class="btn-holder">
                            <a href="{{ route('admin.clients.show-project') }}" class="btn-light-purple"><i
                                    class="fas fa-eye"></i></a>
                            <div class="dropdown dropdown-effect dropend">
                                <button class="btn-light-blue dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                            تعديل المشروع
                                        </a>
                                    </li>
                                    <li>
                                        <button class="dropdown-item" data-bs-toggle="modal"
                                            data-bs-target="#delete_agent32">
                                            <i class="fa-solid fa-trash-can"></i>
                                            حذف المشروع
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <span class="badge bg-warning">إســم الـحـالــة</span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                <div class="box-project">
                    <div class="img-holder">
                        <img src="{{ asset('admin-asset/img/image-preview.webp') }}" class="pro-img" alt="project image">
                    </div>
                    <div class="pro-info">
                        <div class="holder-name">
                            <h6 class="name">
                                إســـــم الــمـشـــروع
                            </h6>
                            <span>عدد العمال : 5</span>
                        </div>
                        <div class="bar">
                            <p class="date">
                                بدأ في: 2023-09-26
                            </p>
                            <p class="date">
                                ينتهي في 2023-09-29
                            </p>
                        </div>
                    </div>
                    <div class="progress-holder">
                        <div class="progress" role="progressbar" aria-label="Success example" aria-valuenow="50"
                            aria-valuemin="0" aria-valuemax="100">
                            <div class="progress-bar bg-primary" style="width: 50%">50%</div>
                        </div>
                    </div>
                    <div class="team-work">
                        <a href="{{ route('admin.employees.show') }}" class="team-img" data-bs-toggle="tooltip"
                            data-bs-placement="top" data-bs-title="معاينة ملف العضو">
                            <img src="{{ asset('admin-asset/img/no-image.jpeg') }}" alt="">
                        </a>
                        <a href="{{ route('admin.employees.show') }}" class="team-img" data-bs-toggle="tooltip"
                            data-bs-placement="top" data-bs-title="معاينة ملف العضو">
                            <img src="{{ asset('admin-asset/img/no-image.jpeg') }}" alt="">
                        </a>
                        <a href="{{ route('admin.employees.show') }}" class="team-img" data-bs-toggle="tooltip"
                            data-bs-placement="top" data-bs-title="معاينة ملف العضو">
                            <img src="{{ asset('admin-asset/img/no-image.jpeg') }}" alt="">
                        </a>
                        <button class="btn-team btn-tooltip" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <i class="fas fa-plus"></i>
                            <span class="tip">أضف لفريق العمل</span>
                        </button>
                    </div>
                    <div class="bar-options">
                        <div class="btn-holder">
                            <a href="{{ route('admin.clients.show-project') }}" class="btn-light-purple"><i
                                    class="fas fa-eye"></i></a>
                            <div class="dropdown dropdown-effect dropend">
                                <button class="btn-light-blue dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                            تعديل المشروع
                                        </a>
                                    </li>
                                    <li>
                                        <button class="dropdown-item" data-bs-toggle="modal"
                                            data-bs-target="#delete_agent32">
                                            <i class="fa-solid fa-trash-can"></i>
                                            حذف المشروع
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <span class="badge bg-primary">إســم الـحـالــة</span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                <div class="box-project">
                    <div class="img-holder">
                        <img src="{{ asset('admin-asset/img/image-preview.webp') }}" class="pro-img"
                            alt="project image">
                    </div>
                    <div class="pro-info">
                        <div class="holder-name">
                            <h6 class="name">
                                إســـــم الــمـشـــروع
                            </h6>
                            <span>عدد العمال : 5</span>
                        </div>
                        <div class="bar">
                            <p class="date">
                                بدأ في: 2023-09-26
                            </p>
                            <p class="date">
                                ينتهي في 2023-09-29
                            </p>
                        </div>
                    </div>
                    <div class="progress-holder">
                        <div class="progress" role="progressbar" aria-label="Success example" aria-valuenow="75"
                            aria-valuemin="0" aria-valuemax="100">
                            <div class="progress-bar bg-secondary" style="width: 75%">75%</div>
                        </div>
                    </div>
                    <div class="team-work">
                        <a href="{{ route('admin.employees.show') }}" class="team-img" data-bs-toggle="tooltip"
                            data-bs-placement="top" data-bs-title="معاينة ملف العضو">
                            <img src="{{ asset('admin-asset/img/no-image.jpeg') }}" alt="">
                        </a>
                        <a href="{{ route('admin.employees.show') }}" class="team-img" data-bs-toggle="tooltip"
                            data-bs-placement="top" data-bs-title="معاينة ملف العضو">
                            <img src="{{ asset('admin-asset/img/no-image.jpeg') }}" alt="">
                        </a>
                        <a href="{{ route('admin.employees.show') }}" class="team-img" data-bs-toggle="tooltip"
                            data-bs-placement="top" data-bs-title="معاينة ملف العضو">
                            <img src="{{ asset('admin-asset/img/no-image.jpeg') }}" alt="">
                        </a>
                        <button class="btn-team btn-tooltip" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <i class="fas fa-plus"></i>
                            <span class="tip">أضف لفريق العمل</span>
                        </button>
                    </div>
                    <div class="bar-options">
                        <div class="btn-holder">
                            <a href="{{ route('admin.clients.show-project') }}" class="btn-light-purple"><i
                                    class="fas fa-eye"></i></a>
                            <div class="dropdown dropdown-effect dropend">
                                <button class="btn-light-blue dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                            تعديل المشروع
                                        </a>
                                    </li>
                                    <li>
                                        <button class="dropdown-item" data-bs-toggle="modal"
                                            data-bs-target="#delete_agent32">
                                            <i class="fa-solid fa-trash-can"></i>
                                            حذف المشروع
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <span class="badge bg-secondary">إســم الـحـالــة</span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                <div class="box-project">
                    <div class="img-holder">
                        <img src="{{ asset('admin-asset/img/image-preview.webp') }}" class="pro-img"
                            alt="project image">
                    </div>
                    <div class="pro-info">
                        <div class="holder-name">
                            <h6 class="name">
                                إســـــم الــمـشـــروع
                            </h6>
                            <span>عدد العمال : 5</span>
                        </div>
                        <div class="bar">
                            <p class="date">
                                بدأ في: 2023-09-26
                            </p>
                            <p class="date">
                                ينتهي في 2023-09-29
                            </p>
                        </div>
                    </div>
                    <div class="progress-holder">
                        <div class="progress" role="progressbar" aria-label="Success example" aria-valuenow="100"
                            aria-valuemin="0" aria-valuemax="100">
                            <div class="progress-bar bg-success" style="width: 100%">100%</div>
                        </div>
                    </div>
                    <div class="team-work">
                        <a href="{{ route('admin.employees.show') }}" class="team-img" data-bs-toggle="tooltip"
                            data-bs-placement="top" data-bs-title="معاينة ملف العضو">
                            <img src="{{ asset('admin-asset/img/no-image.jpeg') }}" alt="">
                        </a>
                        <a href="{{ route('admin.employees.show') }}" class="team-img" data-bs-toggle="tooltip"
                            data-bs-placement="top" data-bs-title="معاينة ملف العضو">
                            <img src="{{ asset('admin-asset/img/no-image.jpeg') }}" alt="">
                        </a>
                        <a href="{{ route('admin.employees.show') }}" class="team-img" data-bs-toggle="tooltip"
                            data-bs-placement="top" data-bs-title="معاينة ملف العضو">
                            <img src="{{ asset('admin-asset/img/no-image.jpeg') }}" alt="">
                        </a>
                        <button class="btn-team btn-tooltip" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <i class="fas fa-plus"></i>
                            <span class="tip">أضف لفريق العمل</span>
                        </button>
                    </div>
                    <div class="bar-options">
                        <div class="btn-holder">
                            <a href="{{ route('admin.clients.show-project') }}" class="btn-light-purple"><i
                                    class="fas fa-eye"></i></a>
                            <div class="dropdown dropdown-effect dropend">
                                <button class="btn-light-blue dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                            تعديل المشروع
                                        </a>
                                    </li>
                                    <li>
                                        <button class="dropdown-item" data-bs-toggle="modal"
                                            data-bs-target="#delete_agent32">
                                            <i class="fa-solid fa-trash-can"></i>
                                            حذف المشروع
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <span class="badge bg-success">إســم الـحـالــة</span>
                    </div>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">فريق العمل</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <label for="team" class="form-label">فريق العمل</label>
                            <select name="teamwork[]" id="teamwork" class="select2" multiple="multiple">
                                <option value="1">موظف 1</option>
                                <option value="2">موظف 2</option>
                                <option value="3">موظف 3</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary px-3 btn-sm"
                                data-bs-dismiss="modal">الغاء</button>
                            <button type="button" class="btn btn-success px-3 btn-sm">حفظ</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            $('#teamwork').select2();
        });
    </script>
@endpush
