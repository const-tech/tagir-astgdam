<div class="main-side">
    @section('title', 'كشف حساب')

    <nav aria-label="breadcrumb ">
        <ol class="breadcrumb bg-light p-3">
            <li href="" class="breadcrumb-item" aria-current="page">
                @lang('Home')
            </li>
            <li href="" class="breadcrumb-item" aria-current="page">
                كشف حساب
            </li>
        </ol>
    </nav>

    <div class="container-fluid">
        <div class="bg-white p-3 rounded-2 shadow">
            <div class="d-flex align-items-center justify-content-between gap-2 flex-wrap mb-3">
                <div class="d-flex align-items-center gap-2">
                   
                    <h4 class="main-heading m-0">كشف حساب</h4>
                </div>
                <div class="btn-holder d-flex align-items-center gap-1">
                    <a href="{{ route('admin.vouchers.index') }}" class="btn btn-sm btn-success">قيود اليومية <i
                            class="fas fa-link fs-13px"></i></a>
                    <a href="{{ route('admin.accounts') }}" class="btn btn-sm btn-success">شجرة الحسابات <i
                            class="fas fa-link fs-13px"></i></a>
                </div>
            </div>

            <div class="btn-holder d-flex align-items-center justify-content-end gap-1 mb-1">
                @if ($account)
                    <button class="btn btn-sm btn-warning" wire:click="print({{ $account->id }})">
                        <i class="fa-solid fa-print"></i>
                    </button>
                @endif
            </div>
            <div class="row g-3 mb-2">
                <div class="col-12 col-md-3">
                    <div class="inp-holder">
                        <label class="d-block"> اسم الحساب</label>
                        <select class="form-control" class="select2" id="select" wire:model="account_id"
                            data-pharaonic="select2" data-component-id="{{ $this->getId() }}" data-placeholder="اختر"
                            data-language="ar" data-dir="rtl">
                            <option value="">اختر</option>
                            @foreach ($accounts as $account_item)
                                <option value="{{ $account_item->id }}">{{ $account_item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="inp-holder">
                        <label class="small-label">من تاريخ</label>
                        <input type="date" wire:model="from" class="form-control">
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="inp-holder">
                        <label class="small-label">الي تاريخ</label>
                        <input type="date" wire:model="to" class="form-control">
                    </div>
                </div>
            </div>
            <h4 class="main-heading d-none d-block-print mb-2">كشف حساب</h4>

            @if ($voucher_accounts->count() > 0)
                <div class="table-responsive">
                    <table class="table table-bordered align-middle">
                        <thead>
                            @php
                                $balance = 0;
                                /* $balance += $opening_balance; */
                                $balance -= $account->opening_balance;

                                $debitTotal = 0;
                                $creditTotal = 0;
                            @endphp

                            @if ($account && $account->opening_balance > 0)
                                <tr>
                                    <td colspan="6" class="text-center">الرصيد الافتتاحي</td>
                                    <td class="text-center">
                                        {{ number_format($account->opening_balance, 2) }}
                                    </td>
                                </tr>
                            @endif

                            <tr>
                                <td>م</td>
                                <td>التاريخ</td>
                                <td width="30%">البيان</td>
                                <td>رقم القيد</td>
                                <td>مدين</td>
                                <td>دائن</td>
                                <td>الرصيد</td>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @if ($from)
                                <tr>
                                    <td colspan="6" class="text-center">
                                        <strong>رصيد أول المدة</strong>
                                    </td>
                                    <td>{{ number_format($opening_balance, 2) }}</td>
                                </tr>
                            @endif --}}

                            @foreach ($voucher_accounts as $index => $item)
                                @php
                                    $balance += $item->debit - $item->credit;
                                    $debitTotal += $item->debit;
                                    $creditTotal += $item->credit;
                                @endphp
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $item->voucher?->date }}</td>
                                    <td>{{ $item->description }}</td>
                                    <td>
                                        <strong>
                                            <a target="_blank" class="btn btn-success btn-sm px-2"
                                                href="{{ route('admin.vouchers.show', $item->voucher->id) }}">{{ $item->voucher?->id }}</a>
                                        </strong>
                                    </td>
                                    <td>{{ number_format($item->debit, 2) }}</td>
                                    <td>{{ number_format($item->credit, 2) }}</td>
                                    <td>{{ number_format($balance, 2) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th class="text-center" colspan="4"><strong>الاجمالي</strong></th>
                                <th>
                                    {{ $account->opening_balance_type == 'debit' ? number_format($account->opening_balance + $all_voucher_accounts->sum('debit'), 2) : number_format($all_voucher_accounts->sum('debit'), 2) }}
                                </th>
                                <th>
                                    {{ $account->opening_balance_type == 'credit' ? number_format($account->opening_balance + $all_voucher_accounts->sum('credit'), 2) : number_format($all_voucher_accounts->sum('credit'), 2) }}
                                </th>
                                <th>
                                    @if ($account->balance_type == 'debit')
                                        {{ number_format(($account->opening_balance_type == 'debit' ? $account->opening_balance : -$account->opening_balance) + $all_voucher_accounts->sum('debit') - $all_voucher_accounts->sum('credit'), 2) }}
                                    @else
                                        {{ number_format(($account->opening_balance_type == 'credit' ? $account->opening_balance : -$account->opening_balance) + $all_voucher_accounts->sum('credit') - $all_voucher_accounts->sum('debit'), 2) }}
                                    @endif
                                </th>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <div class="mt-2">

                </div>
            @else
                <div class="alert alert-warning" role="alert">
                    <h3 class="mb-1">لا يوجد بيانات</h3>
                </div>
            @endif

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
