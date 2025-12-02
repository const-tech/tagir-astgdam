<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>قيد يومية</title>

    <style>
        body {
            font-family: 'XBRiyaz';
            direction: rtl;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border-collapse: collapse;
            border: solid 1px #000;
        }

        .first_table {
            margin-bottom: 20px;
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
    <table class="table text-nowrap first_table">
        <thead>
            <tr style="border:0;">
                <td style="text-align: right; border:0;" colspan="4">

                </td>
                <td style="text-align: left; border:0;" colspan="2">
                    <img src="{{ public_path('uploads/' . setting('logo')) }}" alt="Logo" width="100">
                </td>
            </tr>

        </thead>
        <tbody>
            <tr>
                <td colspan="7" style="background: #000; color:#fff; text-align: center">
                    قيد يومية رقم {{ $voucher->id }}
                </td>
            </tr>

            <tr>
                <th colspan="3">رقم القيد</th>
                <td>{{ $voucher->id }}</td>
                <th>التاريخ</th>
                <td colspan="2">{{ $voucher->date }}</td>
            </tr>
            <tr>
                <th>م</th>
                <th>مدين</th>
                <th>دائن</th>
                <th>اسم الحساب</th>
                <th>رقم الحساب</th>
                <th width="30%">البيان</th>
                <th>مركز التكلفة</th>
            </tr>
            @foreach ($voucher->accounts as $index => $account)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $account->debit }}</td>
                    <td>{{ $account->credit }}</td>
                    <td>{{ $account->account?->name }}</td>
                    <td>{{ $account->account?->account_no }}</td>
                    <td>{{ $account->description }}</td>
                    <td>{{ $account->center?->name }}</td>
                </tr>
            @endforeach
            <tr>
                <th></th>
                <th>{{ number_format($voucher->accounts()->sum('debit'), 2) }}</th>
                <th>{{ number_format($voucher->accounts()->sum('credit'), 2) }}</th>
                <th colspan="4"></th>
            </tr>
        </tbody>
    </table>
</body>

</html>
