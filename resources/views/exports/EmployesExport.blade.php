<table class="main-table">
    <thead>
        <tr>
            <th>الرقم الوظيفي</th>
            <th>الموظف</th>
            <th>الجوال</th>
            <th>رقم الاقامة</th>
            <th>انتهاء الاقامة</th>
            <th>حالة الموظف</th>
            <th>جهة العمل</th>
            <th>تاريخ مباشرة العمل</th>
            <th>تاريخ انتهاء التأمين</th>
            <th>التأمين</th>
            <th>المهنة</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>
                    <div class="user">
                        <span>{{ $user->name . ' ' . $user->second_name . ' ' . $user->last_name }}</span>
                    </div>
                </td>
                <td>{{ $user->phone }}</td>
                <td>{{ $user->id_number }}</td>
                <td>{{ $user->end_id_number }}</td>
                <td>{{ __($user->status) }}</td>
                <td>{{ $user->side_job }}</td>
                <td>{{ $user->start_work }}</td>
                <td>{{ $user->end_insurance }}</td>
                <td>--</td>
                <td>{{ $user->job }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
