<div class="main-side">
    <nav aria-label="breadcrumb ">
        <ol class="breadcrumb bg-light p-3">
            <li href="" class="breadcrumb-item" aria-current="page">
                @lang('Home')
            </li>
            <li href="" class="breadcrumb-item" aria-current="page">
                قيود اليومية
            </li>
        </ol>
    </nav>
    @section('title', 'قيود اليومية')
    <x-message-admin />

    <div class="card">
        <div class="card-header bg-primary">
            <h3 class="card-title text-white">
                @if (isset($voucher))
                    تعديل {{ $voucher->description }}
                @else
                    اضافة قيد
                @endif
            </h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-8 col-12">
                    <div>
                        <label class="d-block">البيان</label>
                        <input type="text" wire:model="description" class="form-control" placeholder="البيان">
                        @error('description')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="mb-3">
                        <label class="d-block">التاريخ</label>
                        <input type="date" wire:model="date" class="form-control">
                        @error('date')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

            </div>
            @if (count($vouchers) > 0)
                <table class="table table-bordered mt-3">
                    <thead class="bg-dark-lt">
                        <tr class="text-center">
                            <td>م</td>
                            <td width="20%">رقم / اسم الحساب</td>
                            <td width="15%">مركز التكلفة</td>
                            <td width="20%">البيان</td>
                            <td>مدين</td>
                            <td>دائن</td>
                            <td>إجراءات</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($vouchers as $index => $voucher_item)
                            <tr class="align-middle">
                                <td>{{ $index + 1 }}</td>
                                <td>
                                    <div class="form-group">
                                        <div wire:ignore>
                                            <label class="d-block">رقم / اسم الحساب</label>
                                            <select class="select2" id="select{{ $index }}"
                                                wire:model="vouchers.{{ $index }}.account_id"
                                                data-pharaonic="select2" data-component-id="{{ $this->getId()  }}"
                                                data-placeholder="اختر" data-language="ar" data-dir="rtl">
                                                <option value="">اختر</option>
                                                @foreach ($accounts as $account)
                                                    <option
                                                        {{ $voucher_item['account_id'] == $account->id ? 'selected' : '' }}
                                                        value="{{ $account->id }}">{{ $account->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('vouchers.' . $index . '.account_id')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </td>

                                <td>
                                    <div class="form-group">
                                        <div wire:ignore>
                                            <label class="d-block">مركز التكلفة</label>
                                            <select class="select2" id="selectCenter{{ $index }}"
                                                wire:model="vouchers.{{ $index }}.cost_center_id"
                                                data-pharaonic="select2" data-component-id="{{ $this->getId()  }}"
                                                data-placeholder="اختر" data-language="ar" data-dir="rtl">
                                                <option value="">اختر</option>
                                                @foreach ($cost_centers as $cost_center)
                                                    <option
                                                        {{ $voucher_item['cost_center_id'] == $cost_center->id ? 'selected' : '' }}
                                                        value="{{ $cost_center->id }}">
                                                        {{ $cost_center->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('vouchers.' . $index . '.cost_center_id')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </td>

                                <td>
                                    <div>
                                        <label class="d-block">البيان</label>
                                        <textarea class="form-control" wire:model="vouchers.{{ $index }}.description" rows="3"></textarea>
                                        @error('vouchers.' . $index . '.description')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </td>

                                <td>
                                    <div>
                                        <label class="d-block">مدين</label>
                                        <input {{ $vouchers[$index]['credit'] ? 'readonly' : '' }} type="text"
                                            wire:change="computeAll" class="form-control"
                                            wire:model="vouchers.{{ $index }}.debit">
                                        @error('vouchers.' . $index . '.debit')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </td>
                                <td>
                                    <div>
                                        <label class="d-block">دائن</label>
                                        <input {{ $vouchers[$index]['debit'] ? 'readonly' : '' }} type="text"
                                            wire:change="computeAll" class="form-control"
                                            wire:model="vouchers.{{ $index }}.credit">

                                        @error('vouchers.' . $index . '.credit')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </td>

                                <td>
                                    @if ($index == 0)
                                        <button class="btn btn-sm btn-success m-1" wire:click="addVoucher"><i
                                                class="fa fa-plus"></i> </button>
                                    @endif

                                    @if (count($vouchers) > 1)
                                        <button class="btn btn-sm btn-danger m-1" wire:loading.remove
                                            wire:click.prevent="removeVoucher({{ $index }})">
                                            <i class="fa fa-trash"></i></button>
                                        <button wire:loading wire:target="removeVoucher({{ $index }})"
                                            class="btn btn-sm btn-danger m-1">
                                            <i class="fa fa-spinner fa-spin text-2xl"></i>
                                        </button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="4" class="bg-dark-lt"></th>
                            <th class="{{ $total_debit != $total_credit ? 'bg-danger' : '' }}">
                                {{ number_format($total_debit, 2) }}</th>
                            <th class="{{ $total_debit != $total_credit ? 'bg-danger' : '' }}">
                                {{ number_format($total_credit, 2) }}</th>
                            <th class="bg-dark-lt">
                                {{ number_format($total_debit - $total_credit, 2) }}</th>
                        </tr>
                    </tfoot>
                </table>
            @endif
        </div>
        <div class="card-footer text-end">
            <button class="btn btn-primary" wire:click="save"> حفظ</button>
        </div>
    </div>
</div>
@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <x:pharaonic-select2::scripts />
@endpush
@push('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" type="text/css">
    <style>
        .select2-container .select2-selection--single {
            height: 36px;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 35px;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 35px;
        }

        .select2-container {
            width: 100% !important;
        }
    </style>
@endpush
