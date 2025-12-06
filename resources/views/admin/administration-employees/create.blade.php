<div class="d-flex align-items-center justify-content-between gap-3 mb-3">
    <div class="main-title mb-0">
        <div class="small">الرئيسية</div>
        <div class="large">اضافة موظفين الادارة</div>
    </div>

    <a href="#" wire:click='$set("screen","index")' class="main-btn bg-secondary">رجوع <i
            class="fas fa-arrow-left-long"></i></a>
</div>
<div class="row g-3">
    <div class="col">
        <label for="">الاسم</label>
        <input class="form-control" type="text" wire:model="name" />
    </div>

    <div class="col-xs-12 col-sm-4 mb-3">
        <label for="">البريد الألكتروني</label>
        <input class=" form-control" type="email" wire:model="email" />
    </div>
    <div class="col-xs-12 col-sm-4 mb-3">
        <label for="">جوال</label>
        <input class="form-control" type="number" wire:model="phone" />
    </div>

    <div class="col-xs-12 col-sm-4 mb-3">
        <label for=""> كلمة المرور</label>
        <input class="form-control" type="password" wire:model="password" />
    </div>
    <div class="col-xs-12 col-sm-4 mb-3">
        <label for=""> المجموعة:</label>

        <select class=" form-select " wire:model="role_id" id="">
            <option value="">اختر المجموعة</option>
            @foreach ($roles as $role)
                <option value="{{ $role->id }}">{{ $role->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-xs-12 col-sm-4 mb-3">
        <label for=""> القسم</label>
        <select class="form-select" wire:model="department_id">
            <option value="">اختر القسم</option>
            @foreach ($departments as $department)
                <option value="{{ $department->id }}">{{ $department->name }}</option>
            @endforeach
        </select>
    </div>


    <div class="col-xs-12 col-sm-4 mb-3">
        <label for=""> الوظيفه</label>
        <select class="form-select" wire:model="job_id" id="">
            <option value="">اختر الوظيفه</option>
            @foreach (App\Models\Job::all() as $job)
                <option value="{{ $job->id }}">{{ $job->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-xs-12 col-sm-4 mb-3">
        <label for=""> الجهة الحكومية</label>
        <input class="form-control" type="text" wire:model="governmental_entity" />

    </div>

    <div class="col-xs-12 col-sm-4 mb-3">
        <label for=""> الهوية/ الاقامة</label>
        <input class="form-control" type="text" min="0" maxlength="10" wire:model="id_number" />
    </div>
    <div class="col-xs-12 col-sm-4 mb-3">
        <label for=""> انتهاء الهوية/ الاقامة</label>
        <input class="form-control" type="date" wire:model="end_id_number" />
    </div>
    <div class="col-xs-12 col-sm-4 mb-3">
        <label for=""> انتهاء عقد العمل </label>
        <input class="form-control" type="date" wire:model="end_work">
    </div>
    <div class="col-xs-12 col-sm-4 mb-3">
        <label for=""> انتهاء الجواز </label>
        <input class="form-control" type="date" wire:model="end_passport">
    </div>
    <div class="col-xs-12 col-sm-4 mb-3">
        <label for=""> انتهاء التامين </label>
        <input class="form-control" type="date" wire:model="end_insurance">
    </div>
    <div class="col-xs-12 col-sm-4 mb-3">
        <label for=""> العنوان الوطني </label>
        <input class="form-control" type="text" wire:model="address">
    </div>
    <div class="col-xs-12 col-sm-4 mb-3">
        <label for=""> الحساب البنكي </label>
        <input class="form-control" type="number" wire:model="bank_account">
    </div>
    <div class="col-xs-12 col-sm-4 mb-3">
        <label for="">عقد العمل</label>
        <input class="form-control" type="file" wire:model="admin_contract_file" />

        @error('admin_contract_file')
            <span class="text-danger small">{{ $message }}</span>
        @enderror

        @if(isset($obj) && $obj?->admin_contract_file)
            <a href="{{ display_file($obj->admin_contract_file) }}" target="_blank" class="btn btn-sm btn-outline-primary mt-2">
                عرض العقد الحالي
            </a>
        @endif
    </div>


    <div class="col-12">
        <button type="button" class="main-btn px-4" wire:click="submit">
            حفظ
        </button>
    </div>
</div>
