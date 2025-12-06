{{-- <table class="main-table">
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
</table> --}}


<table class="main-table">
    <thead>
        <tr>
            <th>الرقم الوظيفي (ID)</th>
            <th>اسم المستخدم</th>
            <th>الاسم الأول</th>
            <th>الاسم الثاني</th>
            <th>اسم العائلة</th>
            <th>الجنس</th>
            <th>الجنسية</th>
            <th>رقم الهوية / الاقامة</th>
            <th>بداية الهوية / الاقامة</th>
            <th>انتهاء الهوية / الاقامة</th>
            <th>الجوال</th>
            <th>البريد الإلكتروني</th>
            <th>حالة الموظف</th>
            <th>نوع الدوام</th>
            <th>المهنة</th>
            <th>جهة العمل</th>
            <th>تاريخ مباشرة العمل</th>
            <th>تاريخ انتهاء التأمين</th>
            <th>شركة التأمين</th>
            <th>تاريخ انتهاء جواز السفر</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                {{-- ID --}}
                <td>{{ $user->id }}</td>

                {{-- Username --}}
                <td>{{ $user->name }}</td>

                {{-- Names --}}
                <td>{{ $user->first_name }}</td>
                <td>{{ $user->second_name }}</td>
                <td>{{ $user->last_name }}</td>

                {{-- Gender --}}
                <td>
                    @if($user->gender === 'male')
                        ذكر
                    @elseif($user->gender === 'female')
                        أنثى
                    @else
                        —
                    @endif
                </td>

                {{-- Nationality --}}
                <td>
                    @if($user->nationality === 'sudia')
                        سعودي
                    @elseif($user->nationality === 'not-sudia')
                        غير سعودي
                    @else
                        —
                    @endif
                </td>

                {{-- ID / Iqama --}}
                <td>{{ $user->id_number }}</td>
                <td>{{ $user->start_id_number }}</td>
                <td>{{ $user->end_id_number }}</td>

                {{-- Contact --}}
                <td>{{ $user->phone }}</td>
                <td>{{ $user->email }}</td>

                {{-- Status --}}
                <td>{{ __($user->status) }}</td>

                {{-- Work type --}}
                <td>{{ optional($user->workType)->name }}</td>

                {{-- Job (من علاقة jobrelation) --}}
                <td>{{ optional($user->jobrelation)->name }}</td>

                {{-- Side job (جهة العمل) --}}
                <td>{{ $user->side_job }}</td>

                {{-- Work dates --}}
                <td>{{ $user->start_work }}</td>
                <td>{{ $user->end_insurance }}</td>

                {{-- Insurance company --}}
                <td>{{ optional($user->insuranceCompany)->name }}</td>

                {{-- Passport --}}
                <td>{{ $user->end_passport }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
