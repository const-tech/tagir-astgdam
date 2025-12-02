@extends('admin.layouts.admin')

@section('content')
    <div class="main-side">
        <x-message-admin/>

        <div class="d-flex align-items-center justify-content-between gap-3 flex-wrap">
            <div class="main-title">
                <div class="small">
                    @lang("Home")
                </div>
                <div class="large">
                    التذاكر - عرض تذكرة
                </div>
            </div>
            <a href="{{ route('admin.tickets.index') }}" class="btn btn-secondary">عودة للتذاكر <i
                    class="fas fa-arrow-left-long"></i></a>
        </div>

        <div class="section_content content_view">

            <ul class="timeline">

                <li>
                    <div class="box-content"
                         style="width: 90%; padding: 10px; border-radius: 4px; background-color: #ebeaea;">
                        <p class="mb-0">
                            {{ucfirst($ticket->user->name)  }}
                        </p>
                        <a href="javascript:void(0);">{{$ticket->title}}</a>
                        <a href="javascript:void(0);" class="float-right">{{$ticket->created_at?->format('Y-m-d')}}</a>
                        <p class="mb-0">
                            {{$ticket->description}}
                        </p>
                        <a target="_blank" href="{{display_file($ticket->file)}}" class="btn btn-success btn-sm mt-1">تحميل
                            المرفق</a>
                    </div>
                </li>

                @if ($ticket->comments->count() > 0)
                    @foreach ($ticket->comments as $comment)

                        <li>
                            <div class="box-content"
                                 @if($comment->user_id !== $ticket->user_id)
                                     style="width: 90%; padding: 10px; border-radius: 4px; background-color: #2E5789;color: #fff"
                                @endif
                            >
                                <p class="mb-0">
                                    @if($comment->user_id !== $ticket->user_id)
                                        الادارة
                                    @else
                                        {{$comment->user->name}}
                                    @endif
                                </p>
                                <a href="javascript:void(0);" class="float-right text-white">{{$comment->human_date}} -
                                    {{$comment->created_at?->format('Y-m-d')}}</a>
                                <p class="mb-0">
                                    {{$comment->comment}}
                                </p>
                            </div>
                        </li>
                    @endforeach
                @endif

            </ul>


            <div class="card">
                <div class="card-header">
                    إضافة تعليق
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.tickets.storeComment') }}" method="post" class="row g-3"
                          enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="user_id" value="{{auth()->id()}}">
                        <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">

                        <div class="form-group">
                            <textarea name="comment" class="form-control" rows="5" placeholder="أكتب تعليقك"></textarea>
                        </div>

                        <div class="text-center mt-2">
                            <button type="submit" class="main-btn px-4">@lang("Save")</button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
