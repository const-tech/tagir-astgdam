<div class="main-side">
    <div class="d-flex align-items-center justify-content-between gap-3 mb-3">
        <div class="main-title mb-0">
            <div class="small">الرئيسية</div>
            <div class="large">اضافة مشروع</div>
        </div>

        <a href="{{ route('admin.projects') }}" class="main-btn bg-secondary">رجوع <i
                class="fas fa-arrow-left-long"></i></a>
    </div>
    <x-message-admin></x-message-admin>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 g-3">
        <div class="col">
            <div class="inp-holder">
                <label class="special-input">
                    <span>أسم المشروع<span>
                            <input type="text" wire:model='title' class="form-control">
                </label>
            </div>
        </div>
        <div class="col">
            <label for="">العميل</label>
            <select class="form-control" wire:model='client_id'>
                <option value="">اختر العميل</option>
                @foreach ($clients as $id => $name)
                    <option value="{{ $id }}">{{ $name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col">
            <div class="inp-holder">
                <label class="special-input">
                    <span>تاريخ بداية المشروع</span>
                    <input type="date" wire:model='start_at' class="form-control">
                </label>
            </div>
        </div>
        <div class="col">
            <div class="inp-holder">
                <label class="special-input">
                    <span>تاريخ نهاية المشروع</span>
                    <input type="date" wire:model='end_at' class="form-control">
                </label>
            </div>
        </div>
        <div class="col">
            <div class="inp-holder">
                <label class="special-input">
                    <span>عدد الايام المتوقعة</span>
                    <input type="number" wire:model='expected_duration' class="form-control">
                </label>
            </div>
        </div>
        <div class="col">
            <label for="">حالة المشروع</label>
            <select class="form-control" wire:model='status'>
                <option value="">اختر الحالة</option>
                <option value="pending">في الانتظار</option>
                <option value="active">جاري التنفيذ</option>
                <option value="canceled">ملغي</option>
                <option value="done">منتهي</option>
            </select>
        </div>
        <div class="col">
            <label for="">فريق العمل</label>
            <select wire:model="teamwork" id="teamwork" class="select2" multiple="multiple">
                @foreach ($employees as $id => $name)
                    <option value="{{ $id }}">{{ $name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col">
            <div class="inp-holder">
                <label class="special-input">
                    <span>صورة المشروع</span>
                    <input type="file" wire:model='image' class="form-control">
                </label>
            </div>
        </div>
        <div class="col">
            <div class="inp-holder">
                <label class="special-input">
                    <span>ارفاق اسماء الموظفين اكسل</span>
                    <input type="file" wire:model='excel_file' class="form-control">
                </label>
            </div>
        </div>

        <div class="col-12 col-md-12 col-lg-12 col-xl-8">
            <label for="">وصف المشروع</label>
            <textarea wire:model="content" id="content" rows="5" class="form-control"></textarea>
        </div>
        <div class="col-12 col-md-12 col-lg-12 col-xl-12">
            <div class="btn-holder mt-2">
                <button class="main-btn" wire:click='submit'>حفظ</button>
            </div>
        </div>
    </div>
</div>
@push('js')
    <script>
        function select2init() {
            $(document).ready(function() {
                $('.select2').each(function() {
                    $(this).select2();

                    $(this).on('change', function() {
                        var data = $(this).val();
                        var name = $(this).attr('id');
                        @this.
                        set(name, data);
                    });
                })

            });
        }

        $(document).ready(function() {
            select2init();
        });
        document.addEventListener('refreshSelect2', () => {
            select2init();
        });
    </script>
@endpush
