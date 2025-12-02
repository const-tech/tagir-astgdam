<div class="main-side" x-data="{screen:'info'}" x-cloak>
    <div class="main-title">
        <div class="small">
            {{ __('admin.Home') }}
        </div>
        <div class="large">
            تفاصيل المشروع
        </div>
    </div>
    <div class="row g-3">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-white py-3">
                    <h6 class="fw-bold mb-0 fs-15px color-666">حالة المشروع</h6>
                </div>
                <div class="card-body">
                    <div class="row g-3">

                        <div class="col-12">
                            <label for="range">
                                تقدم
                                <span class="fs-6">
                                        (<span class="textInput">{{$this->progress}}</span>%)
                                    </span>
                            </label>
                            <input type="range" class="form-range inp-range" min="0" max="100"
                                   step="1" id="progressRange" name="progress_rate" wire:model.live="progress">
                        </div>

                        <div class="col-12">
                            <div class="inp-holder">
                                <label for="status">الحالة</label>
                                <select wire:model="status" class="form-select">
                                    <option value="">اختر الحالة</option>
                                    <option value="pending">في الانتظار</option>
                                    <option value="active">جاري التنفيذ</option>
                                    <option value="canceled">ملغي</option>
                                    <option value="done">منتهي</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="btn-holder">
                                <button wire:click="changeStatus" type="submit" class="main-btn px-3">
                                    تحديث الحالة
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card mb-3">
                <div class="card-body">
                    <ul class="nav nav-pills main-nav-pills" id="paymentTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" :class="screen === 'info' ? 'active' : ''" @click="screen='info'">
                                البيانات الاساسية
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" :class="screen === 'comments' ? 'active' : ''" @click="screen='comments'">
                                التعليقات
                            </button>
                        </li>

                    </ul>
                </div>
            </div>

            <div class="card">
                <div class="card-header bg-white py-3">
                    <h6 class="fw-bold mb-0 fs-15px color-666">
                        <span>المشروع:</span>
                        <span>{{$project->title}}</span>
                    </h6>
                </div>
                <div>
                    <!-- info -->
                    <div x-show="screen === 'info'" x-transition:enter.duration.500ms
                    >
                        <div class="card-body py-3">
                            <div class="row g-0 g-xl-3">
                                <div class="col-12 col-xl-6">
                                    <div class="table-responsive">
                                        <table class="table mb-0">
                                            <tbody class="text-muted">
                                            <tr>
                                                <td class="fs-14px">مسمى/عنوان</td>
                                                <td class="fs-14px">{{$project->title}}</td>
                                            </tr>
                                            <tr>
                                                <td class="fs-14px">العميل</td>
                                                <td class="fs-14px">{{$project->client?->name}}</td>
                                            </tr>
                                            <tr>
                                                <td class="fs-14px">المدة المتوقعة للتنفيذ / أيام</td>
                                                <td class="fs-14px">{{$project->expected_duration}} يوم</td>
                                            </tr>
                                            <tr>
                                                <td class="fs-14px">تاريخ البدء</td>
                                                <td class="fs-14px">
                                                    <i class="far fa-calendar-alt"></i>
                                                    {{$project->start_at}}
                                                </td>
                                            </tr>
                                            @if($project->excel_file)
                                            <tr>
                                                <td class="fs-14px">أسماء الموظفين اكسيل</td>
                                                <td>
                                                    <a href="{{display_file($project->excel_file)}}" download
                                                       class="fs-13px btn-light-purple"
                                                       style="padding: 2px 20px;">
                                                        <i class="fas fa-download"></i>
                                                        تحميل
                                                    </a>
                                                </td>
                                            </tr>
                                            @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-12 col-xl-6">
                                    <div class="table-responsive">
                                        <table class="table mb-0">
                                            <tbody class="text-muted">

                                            <tr>
                                                <td class="fs-14px">الفريق</td>
                                                <td>
                                                    <div class="team-work p-0 border-0">
                                                        @foreach($project->users as $user)
                                                            <a href="{{display_file($user->image)}}" class="team-img"
                                                               data-bs-toggle="tooltip" data-bs-placement="top"
                                                               data-bs-title="معاينة ملف العضو">
                                                                <img src="{{ asset('admin-asset/img/no-image.jpeg') }}"
                                                                     alt="">
                                                            </a>
                                                        @endforeach

                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="fs-14px">تمت الاضافة بواسطة</td>
                                                <td class="fs-14px">{{$project->user->name}}</td>
                                            </tr>
                                            <tr>
                                                <td class="fs-14px">الوصف</td>
                                                <td class="fs-14px">{{$project->content}}</td>
                                            </tr>
                                            <tr>
                                                <td class="fs-14px">تاريخ الانتهاء</td>
                                                <td class="fs-14px">
                                                    <i class="far fa-calendar-alt"></i>
                                                    {{$project->end_at}}
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- comments -->
                    <div x-show="screen === 'comments'" x-transition:enter.duration.500ms
                    >
                        <div class="card-body py-3">
                            <ul class="timeline">
                                @foreach($project->comments as $comment)
                                    <li     x-transition:enter.duration.500ms
                                            x-transition:leave.duration.400ms
                                    >
                                        <div class="box-content"
                                             style="width: 90%; padding: 10px; border-radius: 4px; background-color: #ebeaea;">
                                            <p class="mb-2">
                                                {{$comment->user?->name}}
                                            </p>
                                            <span class="float-right">{{$comment->created_at->diffForHumans()}}</span>
                                            <p class="mb-0">
                                                {{$comment->content}}
                                            </p>
                                        </div>
                                    </li>
                                @endforeach


                            </ul>


                            <div class="card">
                                <div class="card-header">
                                    إضافة تعليق
                                </div>
                                <div class="card-body">
                                    <form wire:submit.prevent="addComment" class="row g-3"
                                          enctype="multipart/form-data">
                                        <div class="form-group">
                                            <textarea wire:model="content" class="form-control" rows="5"
                                                      placeholder="أكتب تعليقك"></textarea>
                                        </div>

                                        <div class="text-center mt-2">
                                            <button type="submit" class="main-btn px-4">حفظ</button>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
