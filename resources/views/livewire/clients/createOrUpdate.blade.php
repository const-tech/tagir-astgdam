<div class='main-section'>
    <div class="container">
        <div class="d-flex align-items-center justify-content-between gap-3 mb-3">
            <div class="main-heading mb-0 me-auto me-xl-0">
                <div class="large"> اضافة عميل </div>
            </div>
            <div class="d-flex gap-2">
                <button class="main-btn btn-main-color" wire:click='$set("screen","index")'>عرض كل العملاء</button>
            </div>
        </div>
        <div class="row g-3">
            <div class="col-12 col-md-4 col-lg-3">
                <label for="">@lang('Name')</label>
                <input type="text" wire:model="name" class="form-control">
            </div>
            <div class="col-12 col-md-4 col-lg-3">
                <label for="">الرقم الضريبي</label>
                <input type="number" class="form-control" wire:model="tax_number">
            </div>
            <div class="col-12 col-md-4 col-lg-3">
                <label for="">@lang('Phone')</label>
                <input type="text" wire:model="phone" class="form-control">
            </div>
            <div class="col-12 col-md-4 col-lg-3">
                <label for="">@lang('City')</label>
                <select wire:model="city_id" class="form-control">
                    <option value="">اختر المدينة</option>
                    @foreach(\App\Models\City::all() as $city)
                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                    @endforeach

                </select>
            </div>

            <div class="col-12 col-md-4 col-lg-3">
                <label for="">جوال المسئول</label>
                <input type="text" wire:model="phone" class="form-control">
            </div>
            <div class="col-12 col-md-4 col-lg-3">
                <label for="">@lang('Address')</label>
                <input type="text" wire:model="address" class="form-control">
            </div>
            <div class="col-12 col-md-4 col-lg-3">
                <label for="">رقم السجل التجاري</label>
                <input type="number" class="form-control" wire:model="commercial_register">
            </div>
            <div class="col-12 col-md-4 col-lg-3">
                <label for=""> مرفق السجل التجارى </label>
                <input type="file" wire:model="file_commercial_register" class="form-control">
                @if ($screen == 'edit')
                    <img src="{{ display_file($file_commercial_register) }}" alt="">
                @endif
            </div>
            <div class="col-12 col-md-4 col-lg-3">
                <label for="">@lang('E-Mail Address')</label>
                <input type="email" wire:model="email" class="form-control">
            </div>
            {{-- <div class="col-12 col-md-4 col-lg-3">
                <label for="">@lang('Password')</label>
                <input type="password" wire:model="password" class="form-control">
            </div> --}}

            <div class="col-12 col-md-4 col-lg-3">
                <label for="">@lang('Active')</label>
                <select wire:model.live="active" class="form-control">
                    {{-- <option value="">@lang("Choose status")</option> --}}
                    <option value="1">@lang('Active')</option>
                    <option value="0">غير مفعل</option>
                </select>
            </div>

            <div class="col-12 col-md-4 col-lg-3">
                <label for="">العنوان الوطني</label>
                <input type="text" wire:model="national_address" class="form-control">
            </div>
            <div class="col-12 col-md-4 col-lg-3">
                <label for=""> مرفق العنوان الوطني</label>
                <input type="file" wire:model="file_national_address" class="form-control">
                @if ($screen == 'edit')
                    <img src="{{ display_file($file_national_address) }}" alt="">
                @endif
            </div>
            <div class="col-12 col-md-4 col-lg-3">
                <label for="">هوية المدير </label>
                <input type="text" wire:model="manager_identity" class="form-control">
            </div>
            <div class="col-12 col-md-4 col-lg-3">
                <label for=""> مرفق هوية المدير </label>
                <input type="file" wire:model="file_manager_identity" class="form-control">
                @if ($screen == 'edit')
                    <img src="{{ display_file($file_manager_identity) }}" alt="">
                @endif
            </div>
            <div class="col-12 col-md-4 col-lg-3">
                <label for="">شهادة ال VAT </label>
                <input type="text" wire:model="vat_certificate" class="form-control">
            </div>
            <div class="col-12 col-md-4 col-lg-3">
                <label for=""> مرفق شهادة ال VAT </label>
                <input type="file" wire:model="file_vat_certificate" class="form-control">
                @if ($screen == 'edit')
                    <img src="{{ display_file($file_vat_certificate) }}" alt="">
                @endif
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5>العقود</h5>
                        <button type="button" class="main-btn" wire:click="addContract">+ اضافة عقد</button>
                    </div>
                    <div class="card-body">
                        @foreach($contracts as $index => $contract)
                            <div class="row g-3 mb-4 pb-3 border-bottom">
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="button" class="btn btn-danger btn-sm" wire:click="removeContract({{ $index }})">
                                        حذف
                                    </button>
                                </div>
                                <div class="col-12 col-md-4">
                                    <label>ملف العقد</label>
                                    <div class="position-relative">
                                        <input type="file"
                                               class="form-control"
                                               wire:model="contracts.{{ $index }}.contract_path"
                                               accept=".pdf"
                                               wire:loading.class="opacity-50">

                                        <div wire:loading wire:target="contracts.{{ $index }}.contract_path"
                                             class="position-absolute top-50 start-50 translate-middle">
                                            <div class="spinner-border spinner-border-sm text-primary" role="status">
                                                <span class="visually-hidden">جاري التحميل...</span>
                                            </div>
                                        </div>
                                    </div>

                                    @error("contracts.{{ $index }}.contract_path")
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    @php
                                        $path =is_string($contract['contract_path']) ? display_file($contract['contract_path']): $contract['contract_path']?->temporaryUrl() ;
                                    @endphp
                                    @if (isset($contract['contract_path']))
                                        <div class="mt-2 border rounded p-2">
                                            <div class="d-flex align-items-center gap-2">
                                                <i class="fas fa-file-pdf text-danger fs-4"></i>
                                                <div class="flex-grow-1">
                                                    <div class="small fw-bold text-truncate">العقد</div>
                                                    <div class="d-flex align-items-center gap-2">
                                                       {{-- <a href="{{ $path }}"
                                                           class="btn btn-sm btn-primary"
                                                           target="_blank">
                                                            <i class="fas fa-eye me-1"></i> عرض
                                                        </a>--}}
                                                        <a href="{{ $path }}"
                                                           class="btn btn-sm btn-secondary"
                                                           download>
                                                            <i class="fas fa-download me-1"></i> تحميل
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div class="col-12 col-md-4">
                                    <label>تاريخ البداية</label>
                                    <input type="date" class="form-control" wire:model="contracts.{{ $index }}.start_date">
                                </div>
                                <div class="col-12 col-md-4">
                                    <label>تاريخ النهاية</label>
                                    <input type="date" class="form-control" wire:model="contracts.{{ $index }}.end_date">
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-12">
                <button class="main-btn" wire:click='submit'>@lang('Save')</button>
            </div>
        </div>
    </div>

</div>
