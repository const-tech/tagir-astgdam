@extends('admin.layouts.admin')
@section('content')

<div class="main-side">
  <div class="main-title">
    <div class="small">
        @lang("Home")
    </div>
    <div class="large">
        عرض الاسعار
    </div>
</div>
  <div class="row g-4">
    <div class="col-sm-6">
      <label for="" class="small-label">اسم العميل</label>
      <input type="text" class="form-control">
    </div>
    <div class="col-sm-6">
      <label for="" class="small-label">رقم الجوال</label>
      <input type="text" class="form-control">
    </div>
    <div class="col-12 col-md-12 col-lg-12 col-xl-12">
      <div class="btn-holder mt-2">
          <a href="{{route('admin.prices.chat')}}" class="main-btn">التالي</a>
      </div>
  </div>
  </div>
</div>
@endsection