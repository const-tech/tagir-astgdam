    <div class="d-flex align-items-center justify-content-between gap-3 mb-3">
        <div class="main-title mb-0">
            <div class="small">الرئيسية</div>
            <div class="large">اضافة هدف</div>
        </div>

        <a href="{{ route('admin.goals') }}" class="main-btn bg-secondary">رجوع <i class="fas fa-arrow-left-long"></i></a>
    </div>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 g-3">
        <div class="col">
            <div class="inp-holder">
                <label class="special-input">
                    <span>اسم الهدف<span>
                            <input type="text" wire:model="name" class="form-control">
                </label>
            </div>
        </div>
        <div class="col">
            <div class="inp-holder">
                <label class="special-input">
                    <span>تاريخ بدء الهدف</span>
                    <input type="date" wire:model="start_goal" class="form-control">
                </label>
            </div>
        </div>
        <div class="col">
            <label for="">حاله الاهداف</label>
            <select class="form-control" wire:model="active">
                <option value="0">جاري</option>
                <option value="1">مكتمل</option>
            </select>
        </div>
        <div class="col">
            <div class="inp-holder">
                <label class="special-input">
                    <span>نسبه تحقيق الاهداف</span>
                    <input type="number" wire:model="rate" min="0" max="100" class="form-control">
                </label>
            </div>
        </div>
        {{-- <div class="col" wire:ignore>
        <label for="">الموظفين</label>
        <select name="teamwork" wire:model="employes" id="teamwork" class="select2 " multiple="multiple">
            @foreach (App\Models\User::where('type', 'employe')->get() as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>



    </div> --}}
        <div class="col">
            <label for="">الموظفين</label>
            <select wire:model="employes" id="employes" class="select2" multiple>
                @foreach ($employees as $id => $name)
                    <option value="{{ $id }}">{{ $name }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-12 col-md-12 col-lg-12 col-xl-6">
            <label for="">محتوى الاهداف</label>
            <textarea name="" id="" rows="5" wire:model="content_goal" class="form-control"></textarea>
        </div>
        <div class="col-12 col-md-12 col-lg-12 col-xl-6">
            <label for="">التعليمات</label>
            <textarea name="" id="" rows="5" wire:model="notes" class="form-control"></textarea>
        </div>
        <div class="col-12 col-md-12 col-lg-12 col-xl-12">
            <div class="btn-holder mt-2">
                <button class="main-btn" wire:click='submit'>@lang('Save')</button>
            </div>
        </div>
    </div>


