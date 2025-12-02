<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>كشف حساب {{ $account->name }} _ {{ $start_date }} _ {{ $end_date }}</title>

    <style>
        body {
            font-family: 'XBRiyaz';
            direction: rtl;
        }

        table {
            border-collapse: collapse;
        }

        th,
        td {
            border-collapse: collapse;
            border: solid 1px #000;
        }

        .first_table {
            margin-bottom: 20px;
            width: 100%;
        }

        .first_table th {
            text-align: center;
            background: #ddd;
            padding: 7px;
        }

        .first_table td {
            text-align: center;
            padding: 7px;
        }
    </style>
</head>

<body>
    @if ($voucher_accounts->count() > 0)
        <table class="table text-nowrap first_table">
            <thead>
                <tr style="border:0;">
                    <td style="text-align: right; border:0;" colspan="4">

                    </td>
                    <td style="text-align: left; border:0;" colspan="2">
                        <img src="{{ public_path('uploads/' . setting('logo')) }}" alt="Logo" width="100">
                    </td>
                </tr>
                <tr>
                    <td colspan="6" style="background: #000; color:#fff; text-align: center">كشف حساب
                        {{ $account->name }} - من {{ $start_date }} إلى {{ $end_date }}</td>
                </tr>

                @php
                    $balance = 0;
                    if ($account->opening_balance_type == 'debit') {
                        $balance += $account->opening_balance;
                    } elseif ($account->opening_balance_type == 'credit') {
                        $balance -= $account->opening_balance;
                    }

                    $debitTotal = 0;
                    $creditTotal = 0;
                @endphp

                @if ($account && $account->opening_balance > 0)
                    <tr>
                        <td colspan="5" class="text-center">الرصيد الافتتاحي</td>
                        <td class="text-center">
                            {{ number_format($account->opening_balance, 2) }}
                        </td>
                    </tr>
                @endif
                <tr>
                    <th>م</th>
                    <th>التاريخ</th>
                    <th width="30%">البيان</th>
                    <th>مدين</th>
                    <th>دائن</th>
                    <th>الرصيد</th>
                </tr>
            </thead>
            <tbody>
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
                        <td>{{ number_format($item->debit, 2) }}</td>
                        <td>{{ number_format($item->credit, 2) }}</td>
                        <td>{{ number_format($balance, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="3"></th>
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
    @endif
</body>

</html>
