<div class="d-flex align-items-center justify-content-between gap-3 mb-3">
    <button class="main-btn btn-main-color" wire:click='$set("screen","index")'>عرض كل الوثائق</button>
</div>
<div class="row g-3">
    <div class="col-xs-12 col-sm-4 mb-3">
        <label for="">الجهة الحكومية <span class="text-red">*</span></label>
        <input class=" form-control " type="text" placeholder="" wire:model="name" />
    </div>

    <div class="col-xs-12 col-sm-4 mb-3">
        <label for="">
            تاريخ الانتهاء</label>
        <input class=" form-control " type="date" placeholder="  " wire:model="expire_date" />
    </div>
    <div class="col-xs-12 col-sm-4 mb-3">
        <label for="">
            الصوره</label>
        <input class=" form-control " type="file" placeholder="  " wire:model="image" />
    </div>

    <div class="d-flex justify-content-center">
        <button type="button" class="btn btn-sm btn-success" wire:click="submit">@lang('Save') <i
                class="fas fa-plus"></i></button>

    </div>
</div>
