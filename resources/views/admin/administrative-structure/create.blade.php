<div class="d-flex align-items-center justify-content-between gap-3 mb-3">
    {{-- <div class="main-title mb-0">
        <div class="small">الرئيسية</div>
        <div class="large">اضافة الهيكل الاداري</div>
    </div> --}}

    <a href="#" wire:click='$set("screen","index")' class="main-btn bg-secondary">رجوع <i
            class="fas fa-arrow-left-long"></i></a>
</div>
<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 g-3">
    <div class="col">
        <div class="inp-holder">
            <label class="special-input">
                <span>المسمي الوظيفي<span>
                        <input type="text" class="form-control" wire:model="job_title">
            </label>
        </div>
    </div>
    <div class="col">
        <div class="inp-holder">
            <label class="special-input">
                <span> متفرعه من<span>
            </label>
            <select id="" class="form-control" wire:model='parent_id'>
                <option value="">اختر </option>
                @foreach (App\Models\AdministrativeStructure::get() as $item)
                    <option value="{{ $item->id }}">{{ $item->job_title }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col">
        <div class="inp-holder">
            <label class="special-input">
                <span>الموظفين<span>
            </label>
            <select id="" class="form-control" wire:model=''>
                <option value="">اختر </option>
                @foreach (App\Models\User::administration()->get() as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col">
        <div class="inp-holder">
            <label class="special-input">
                <span>الترتيب<span>
                        <input type="number" class="form-control" wire:model="rank">
            </label>
        </div>
    </div>
    <div class="col-12 col-md-12 col-lg-12 col-xl-12">
        <div class="btn-holder mt-2">
            <button class="main-btn" wire:click="submit">حفظ</button>
        </div>
    </div>
</div>
