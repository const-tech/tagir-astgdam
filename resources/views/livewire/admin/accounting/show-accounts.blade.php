<div class="main-side">
    @section('title', ' كشف حساب ' . $account->name)

    <nav aria-label="breadcrumb ">
        <ol class="breadcrumb bg-light p-3">
            <li href="" class="breadcrumb-item" aria-current="page">
                @lang('Home')
            </li>
            <li href="" class="breadcrumb-item" aria-current="page">
                كشف حساب {{ $account->name }}
            </li>
        </ol>
    </nav>
    <div class="card">
        <div class="card-header bg-primary">
            <h3 class="card-title text-white"> كشف حساب {{ $account->name }}</h3>
        </div>
        <div class="card-body">

            <div class="row not-print">
                <div class="col-md-3 col-12">
                    <div class="mb-3">
                        <label class="form-label">بحث بالوصف</label>
                        <input type="text" wire:model.live="search" class="form-control"
                            placeholder="@lang('Search')">
                    </div>
                </div>
                <div class="col-md-3 col-12">
                    <div class="mb-3">
                        <label class="form-label">بحث برقم القيد</label>
                        <input type="text" wire:model.live="voucher_id" class="form-control" placeholder="رقم القيد">
                    </div>
                </div>
                <div class="col-md-3 col-12">
                    <div class="mb-3">
                        <label class="form-label">من</label>
                        <input type="date" wire:model.live="from" class="form-control">
                    </div>
                </div>
                <div class="col-md-3 col-12">
                    <div class="mb-3">
                        <label class="form-label">إلى</label>
                        <input type="date" wire:model.live="to" class="form-control">
                    </div>
                </div>
            </div>

            <div class="row">
                @if ($voucher_accounts->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered align-middle">
                            <thead>
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
                                @if ($from)
                                    <tr>
                                        <td colspan="6" class="text-center">
                                            <strong>رصيد أول المدة</strong>
                                        </td>
                                        <td>{{ number_format($opening_balance, 2) }}</td>
                                    </tr>
                                @endif
                                @php
                                    $balance = 0;
                                    $balance += $opening_balance;

                                    if ($account->opening_balance_type == 'debit') {
                                        $balance -= $account->opening_balance;
                                    } elseif ($account->opening_balance_type == 'credit') {
                                        $balance += $account->opening_balance;
                                    }

                                    $debitTotal = 0;
                                    $creditTotal = 0;
                                @endphp

                                @if ($account && $account->opening_balance > 0)
                                    <tr>
                                        <td colspan="4" class="text-center">الرصيد الافتتاحي</td>
                                        <td class="text-center">
                                            {{ $account->opening_balance_type == 'debit' ? number_format($account->opening_balance, 2) : 0 }}
                                        </td>
                                        <td class="text-center">
                                            {{ $account->opening_balance_type == 'credit' ? number_format($account->opening_balance, 2) : 0 }}
                                        </td>
                                        <td>{{ number_format($balance, 2) }}</td>
                                    </tr>
                                @endif

                                @foreach ($voucher_accounts as $index => $item)
                                    @php
                                        if ($account->balance_type == 'debit') {
                                            $balance += $item->debit - $item->credit;
                                        } else {
                                            $balance += $item->credit - $item->debit;
                                        }
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
                                    <th>{{ number_format(($account->opening_balance_type != '' && $account->opening_balance_type == 'debit' ? round($account->opening_balance, 2) : 0) + $all_voucher_accounts->sum('debit'), 2) }}
                                    </th>
                                    <th>{{ number_format(($account->opening_balance_type != '' && $account->opening_balance_type == 'credit' ? round($account->opening_balance, 2) : 0) + $all_voucher_accounts->sum('credit'), 2) }}
                                    </th>
                                    @if ($account->balance_type == 'debit')
                                        <th>{{ number_format(($account->opening_balance_type == 'debit' ? round($account->opening_balance, 2) : 0) + ($all_voucher_accounts->sum('debit') - $all_voucher_accounts->sum('credit')), 2) }}
                                        </th>
                                    @else
                                        <th>{{ number_format(($account->opening_balance_type == 'credit' ? round($account->opening_balance, 2) : 0) + ($all_voucher_accounts->sum('credit') - $all_voucher_accounts->sum('debit')), 2) }}
                                        </th>
                                    @endif
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    <div class="mt-2">
                        <div class="pagination-buttons">
                            <nav aria-label="Page navigation">
                                <ul class="pagination">
                                    @if ($startPage > 1)
                                        <li class="page-item">
                                            <button wire:click="loadMore(1)" class="page-link">1</button>
                                        </li>
                                        @if ($startPage > 2)
                                            <li class="page-item disabled"><span class="page-link">...</span>
                                            </li>
                                        @endif
                                    @endif

                                    @for ($page = $startPage; $page <= $endPage; $page++)
                                        <li class="page-item {{ $page == $currentPage ? 'active' : '' }}">
                                            <button wire:click="loadMore({{ $page }})"
                                                class="page-link">{{ $page }}</button>
                                        </li>
                                    @endfor

                                    @if ($endPage < $lastPage)
                                        @if ($endPage < $lastPage - 1)
                                            <li class="page-item disabled"><span class="page-link">...</span>
                                            </li>
                                        @endif
                                        <li class="page-item">
                                            <button wire:click="loadMore({{ $lastPage }})"
                                                class="page-link">{{ $lastPage }}</button>
                                        </li>
                                    @endif

                                </ul>
                            </nav>
                        </div>

                    </div>
                @else
                    <div class="alert alert-warning" role="alert">
                        <h3 class="mb-1">لا يوجد بيانات</h3>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
