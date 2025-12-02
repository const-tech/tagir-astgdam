<div class="main-side">
    @section('title', 'ميزان المراجعة')
    <div class="container-fluid">
        <div class="p-3 shadow rounded-3 bg-white">
            <div class="d-flex align-items-center gap-3 mb-3">
                <a href="{{ route('admin.accounting') }}" class="btn btn-sm btn-secondary">
                    <i class="fas fa-angle-right"></i>
                </a>
                <h4 class="main-heading mb-0">
                    ميزان المراجعة
                </h4>
            </div>
            <x-message-admin />
            <div class="d-flex align-items-end justify-content-between mb-2">
                <div class="d-flex gap-2">
                    <div class="mb-3">
                        <label for="duration-to" class="small-label">من</label>
                        <input type="date" class="form-control" wire:model="from" id="duration-to" />
                    </div>
                    <div class="mb-3">
                        <label for="duration-to" class="small-label">إلى</label>
                        <input type="date" class="form-control" wire:model="to" id="duration-to" />
                    </div>
                </div>
                <button class="btn btn-warning btn-sm text-light" id="btn-prt-content">
                    <i class="fas fa-print"></i> طباعة
                </button>
            </div>

            <div class="table-responsive" id="prt-content">
                <table class="table main-table" dir="rtl">
                    <thead>
                        <tr>
                            <th rowspan="2" class="border pb-4">رقم الحساب</th>
                            <th rowspan="2" class="border pb-4">اسم الحساب</th>
                            <th colspan="2" class="border">الرصيد الافتتاحي</th>
                            <th colspan="2" class="border">الحركة السنوية</th>
                            <th rowspan="2" class="border pb-4">الرصيد</th>
                        </tr>
                        <tr>
                            <th class="border">
                                مدين
                            </th>
                            <th class="border">
                                دائن
                            </th>
                            <th class="border">
                                مدين
                            </th>
                            <th class="border">
                                دائن
                            </th>
                        </tr>

                    </thead>
                    <tbody>
                        @php
                            $to = \Carbon\Carbon::parse($to)->endOfDay();

                            function applyDateFilter($query, $from, $to)
                            {
                                if ($from && $to) {
                                    $query->where('created_at', '>=', $from)->where('created_at', '<=', $to);
                                } elseif ($from) {
                                    $query->where('created_at', '>=', $from);
                                } elseif ($to) {
                                    $query->where('created_at', '<=', $to);
                                }
                                return $query;
                            }

                            function calculateOpeningBalance($query, $to)
                            {
                                return $query->where('created_at', '<', $to)->sum('debit') -
                                    $query->where('created_at', '<', $to)->sum('credit');
                            }

                            function renderNestedAccounts($assets, $from, $to)
                            {
                                foreach ($assets as $asset) {
                                    $open_debit = applyDateFilter($asset->accounts()->get(), $from, $to)->sum('debit');
                                    $open_credit = applyDateFilter($asset->accounts()->get(), $from, $to)->sum(
                                        'credit',
                                    );
                                    $debit = applyDateFilter($asset->accounts(), $from, $to)->sum('debit');
                                    $credit = applyDateFilter($asset->accounts(), $from, $to)->sum('credit');
                                    $balance = $debit - $credit;

                                    echo '<tr>';
                                    echo '<td class="border">' . $asset->account_no . '</td>';
                                    echo '<td class="border">' . $asset->name . '</td>';
                                    echo '<td class="border">' . $open_debit . '</td>';
                                    echo '<td class="border">' . $open_credit . '</td>';
                                    echo '<td class="border">' . $debit . '</td>';
                                    echo '<td class="border">' . $credit . '</td>';
                                    echo '<td class="border">' . $balance . '</td>';
                                    echo '</tr>';

                                    if ($asset->subAssets->isNotEmpty()) {
                                        renderNestedAccounts($asset->subAssets, $from, $to);
                                    }
                                }
                            }
                        @endphp

                        @foreach ($accounts as $account)
                            @php
                                $adjustedTo = $to ? \Carbon\Carbon::parse($to)->endOfDay() : null;

                                $opening_debit = calculateOpeningBalance($account->accounts(), $adjustedTo);
                                $opening_credit = calculateOpeningBalance($account->accounts(), $adjustedTo);

                                $total_debit = applyDateFilter($account->accounts(), $from, $to)->sum('debit');
                                $total_credit = applyDateFilter($account->accounts(), $from, $to)->sum('credit');
                                $balance = $total_debit - $total_credit + $opening_debit - $opening_credit;
                            @endphp
                            <tr>
                                <td class="border">{{ $account->account_no }}</td>
                                <td class="border">{{ $account->name }}</td>
                                <td class="border">{{ $opening_debit }}</td>
                                <td class="border">{{ $opening_credit }}</td>
                                <td class="border">{{ $total_debit }}</td>
                                <td class="border">{{ $total_credit }}</td>
                                <td class="border">{{ $balance }}</td>
                            </tr>

                            @if ($account->subAssets->isNotEmpty())
                                @php
                                    renderNestedAccounts($account->subAssets, $from, $adjustedTo);
                                @endphp
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
