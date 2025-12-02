<div class="main-side">
    @section('title', 'تفاصيل القيد رقم ' . $voucher->id)

    <nav aria-label="breadcrumb ">
        <ol class="breadcrumb bg-light p-3">
            <li href="" class="breadcrumb-item" aria-current="page">
                @lang('Home')
            </li>
            <li href="" class="breadcrumb-item" aria-current="page">
                تفاصيل القيد رقم {{ $voucher->id }} </li>
        </ol>
    </nav>
    <div>
        <button class="btn btn-sm btn-warning" wire:click='print'><i class="fa-solid fa-print"></i></button>
        <a href="{{ route('admin.vouchers.index') }}" class="btn btn-sm btn-secondary">رجوع</i></a>
    </div>
    <div id="prt-content">
        <x-header-invoice />
        <div class="card">
            <div class="card-header bg-primary">
                <div class="">
                    <h3 class="card-title text-white">
                        تفاصيل القيد رقم {{ $voucher->id }}
                    </h3>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8 col-12">
                        <div>
                            <label class="form-label">البيان</label>
                            <h3>{{ $voucher->description }}</h3>

                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                        <div class="mb-3">
                            <label class="form-label">التاريخ</label>
                            <input type="date" disabled value="{{ $voucher->date }}" class="form-control">
                        </div>
                    </div>
                </div>

                @if (count($voucher->accounts) > 0)
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>المدين</th>
                                    <th>الدائن</th>
                                    <th>رقم الحساب</th>
                                    <th>اسم الحساب</th>
                                    <th>البيان</th>
                                    <th>مركز التكلفة</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($voucher->accounts)
                                    @foreach ($voucher->accounts as $key => $account)
                                        <tr>
                                            <td>{{ $account->debit }}</td>
                                            <td>{{ $account->credit }}</td>
                                            <td>{{ $account->account?->account_no }}</td>
                                            <td>{{ $account->account?->name }}</td>
                                            <td>{{ $account->description }}</td>
                                            <td>{{ $account->cost_center?->name }}</td>
                                        </tr>
                                    @endforeach
                                @endif
                                <tr>
                                    <td>{{ $voucher->accounts()->sum('debit') }}</td>
                                    <td>{{ $voucher->accounts()->sum('credit') }}</td>
                                    <td colspan="4"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                @endif

                <div class="row">
                    <div class="col-6 text-start">
                        <p>أضيف بواسطة</p>
                        <p>{{ $voucher->employee?->username ?? $voucher->employee?->name }}</p>
                    </div>
                    <div class="col-6 text-end">
                        <p>آخر تحديث</p>
                        <p>{{ $voucher->last_user?->username ?? $voucher->last_user?->name }}</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
