<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>دليل الحسابات</title>

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

        .level-1 {
            font-weight: bold !important;
            padding-right: 10px !important;
        }

        .level-2 {
            padding-right: 40px !important;
        }

        .level-3 {
            padding-right: 70px !important;
        }

        .level-4 {
            padding-right: 100px !important;
        }

        .level-5 {
            padding-right: 130px !important;
        }

        .level-6 {
            padding-right: 160px !important;
        }
    </style>

</head>

<body>
    <table class="first_table" style="margin-inline: auto; display:block; width:100%;">
        <thead>
            <tr>
                <th>رقم الحساب</th>
                <th>اسم الحساب</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($accounts as $asset)
                @php
                    renderAccounts([$asset], 6);
                @endphp
            @endforeach
        </tbody>
    </table>
</body>

</html>
