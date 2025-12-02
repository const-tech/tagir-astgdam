{{-- @extends('admin.layouts.admin') --}}
{{-- @section('content') --}}



<div class="p-3 bg-white shadow rounded mt-2">
    <style>
        .main-table tbody tr td {
            text-align: start;
            border: 1px solid #000;
            vertical-align: unset !important;
        }
    </style>
    <a href="{{ route('admin.prices.contract.edite', $price_quotation->id) }}"
        class="btn btn-sm btn-primary mb-2">تعديل</a>
    <table class="main-table" id="html2pdf">
        <tr>
            <td colspan="4" style="width:50%" class="text-center text-decoration-underline fw-bold">
                عقد تقديم خدمات تشغيل وصيانة
            </td>
            <td colspan="4" class="text-center text-decoration-underline fw-bold">
                Maintenance & Operation Contract
            </td>
        </tr>

        <tr>
            <td colspan="4">
                إنه في يوم الاربعاء تاريخ 10 /02/1446 ه الموافق 14/08/2024، تم الاتفاق بين كل من:
            </td>
            <td colspan="4" class="text-end">
                It is on day Wednesday dated 10/02/1446 H. and 14/08/2024 agreement between
            </td>
        </tr>
        <tr>
            <td colspan="4">

                1) شركة اعمار المساند للتشغيل والصيانة سجل تجاري رقم (1128185731) وعنوانها: عنيزة شارع زامل
                العبد
                الله السليم حي الريان الرمز البريدي 56241 الرقم الفرعي 4142 رقم المبني 7776- ويمثلها في التوقيع
                على
                هذه الاتفاقية الاستاذ/ عبد الله غازي عيد المطيري هويه وطنيه 1124831858 رقم بريد الكتروني
                ‏ceo@emaarsck.com
                بصفته المدير العام ويُشار إليها فيما بعد بـ (الطرف الأول).
            </td>
            <td colspan="4" dir='ltr'>

                1) Company Emaar al Mosanad for operation and maintenance CR (1128185731) address : Onaizah,
                zamil
                Abdullah al salim St., postal code 56241, sub.branch 4142 building Nu.7776 represented in this
                contract Mr. Abdullah Ghazy Eid EL Mutairi ID 1124831858 Email ceo@emaarsck.com as the
                authorized
                manager represented in this contract as( first party)
            </td>
        </tr>
        <tr>
            <td colspan="4">
                {!! $price_quotation->head_ar !!}
                {{-- 2) شركة ------------------- سجل تجاري رقم---------------وعنوانها- ---------------------- الرمز
                البريدي -------ويمثلها في هذا العقد الاستاذ – --------------------
                هويه وطنيه رقم ------------------- بصفته – الرئيس التنفيذي بريد الكتروني---------------- رقم
                للجوال
                ------------- ويُشار إليهم فيما بعد بـ (الطرف الثاني). --}}
            </td>
            <td colspan="4" dir='ltr'>
                {!! $price_quotation->head_en !!}
                {{-- 2) Company--------------- CR------ address ---------------- Postal Code ------and represented in
                this contract by ----------- ID----------as he the managing partner represented in this contract
                as(
                second party) --}}
            </td>
        </tr>
        <tr>
            <td colspan="4" class='text-center fw-bold'>التمهيد</td>
            <td colspan="4" class='text-center fw-bold'>Introduction</td>
        </tr>
        <tr>
            <td colspan="4">
                حيث أن الطرف الأول شركة تعمل في مجال التشغيل والصيانة ولديها الخبرة والامكانيات اللازمة لتوفير
                العدد
                المطلوب من العمالة لتقديم الخدمات التي يطلبها الغير وفق اللوائح والتعليمات المعمول بها في
                المملكة
                العربية السعودية، وحيث أن الطرف الثاني يرغب بالاستفادة من خبرات الطرف الأول وبحاجة لخدمات
                العمالة
            </td>
            <td colspan="4" class="text-end">
                Where the first party is working in maintenance and operations field and has the needed
                expertise
                and capabilities to provide the required numbers of personnel to provide the needed services by
                others according to the rules and regulations working in KSA and where the second party is
                interested to use this expertise of the first party and in need of the services.
            </td>
        </tr>
        <tr>
            <td colspan="4" class=" fw-bold">
                البند الأول: - التمهيد
            </td>
            <td colspan="4" class="text-end fw-bold">
                First article: introduction
            </td>
        </tr>
        <tr>
            <td colspan="4" class=" ">
                {!! $price_quotation->band_ar_1 !!}
            </td>
            <td colspan="4" class="text-end">
                {!! $price_quotation->band_en_1 !!}
            </td>
        </tr>
        <tr>
            <td colspan="4" class=" fw-bold">
                البند الثاني: - مدة العقد
            </td>
            <td colspan="4" class="text-end fw-bold">
                Second Articler : Contract duration
            </td>
        </tr>
        <tr>
            <td colspan="4" class=" ">
                {!! $price_quotation->band_ar_2 !!}
                {{-- يبدا تفعيل هذا العقد من تاريخ التوقيع علية ويستمر لمدة 3 سنوات. في حالة انهاء العقد من جانب أحد
                الأطراف ويوجد أحد الأطراف لم يقم بتنفيذ بنود العقد تستمر هذه البنود علي الطرف الثاني لحين انتهاء مدة
                العقد. بنفس الشروط والاحكام. مالم يتفق كلا الطرفين علي خلاف ذلك كتابيا
                <br>
                يحق للطرف الثاني تجديد العقد بعد موافقة كتابية من الطرف الأول قبل انتهاء العقد بثلاث شهور. في حالة
                لم يشعر الطرف الثاني الطرف الأول برغبته في التجديد يعتبر هذا العقد مجدد لمدة مماثله بنفس الشروط و
                المزايا --}}
            </td>
            <td colspan="4" class="text-end">
                {!! $price_quotation->band_en_2 !!}
                {{-- Contract term starts from the date of its signing, and continues for three (3) years. In the event
                that the term of the contract expires and there are cadres who have not completed the term of the
                work contract, the terms of this contract shall be valid against the second party. Until the end of
                the employment contract with the same terms and conditions of this contract. Unless the parties have
                agreed otherwise in writing
                <br>
                The Second Party has the right to renew the contract after a written approval from the First Party,
                notified in three months before the contract expiry date. In the event that the Second Party shall
                not notify the First Party of its desire to renew. This contract is considered renewed for a similar
                period with the same terms and conditions --}}
            </td>
        </tr>
        <tr>
            <td colspan="4" class=" fw-bold">
                البند الثالث: - موضوع العقد
            </td>
            <td colspan="4" class="text-end fw-bold">
                Article Three _ Contract subject
            </td>
        </tr>


        <tr>
            <td>م</td>
            <td>المهنة الفعلية</td>
            <td>الجنسية</td>
            <td>العدد</td>
            <td>السعر الفردي</td>
            <td>قيمة ضريبة القيمة المضافة 15%</td>
            <td>التكلفة الإجمالية شهرياً</td>
        </tr>
        <tr>
            <td>--</td>
            <td>--</td>
            <td>--</td>
            <td>--</td>
            <td>--</td>
            <td>--</td>
            <td>--</td>
        </tr>
        <tr>
            <td colspan="6" style="background: #ededed;" class="text-center">الاجمالي</td>
            <td class=""></td>

        </tr>
        <tr>
            <th>الرقم</th>
            <th colspan="3">الوصف</th>
            <th>مدة التعاقد</th>
            <th>السعر- للفرد</th>
            <th>العدد</th>
            <th>اجمالى التكلفة</th>
        </tr>
        @foreach ($price_quotation->jobs as $job)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td colspan="3">{{ $job->job_title }}</td>
                <td>{{ $job->contract_duration }}</td>
                <td>{{ $job->total_costs }}</td>
                <td>{{ $job->number }}</td>
                <td>{{ $job->total_costs * $job->number }}</td>
            </tr>
        @endforeach
        <tr>
            <td colspan="6" style="background: #ededed;" class="text-center">{!! $price_quotation->special_requirements !!}</td>
            <td></td>
        </tr>
        <tr>
            <td colspan="7">
                <ul>
                    {!! $price_quotation->band_ar_32 !!}
                    {{-- <li>السعر اعلا يشمل جميع تكاليف السائق ماعدا السكن و المواصلات و بدل الرحلات</li>
                    <li>في حال غياب أو تأخير أي عامل عن العمل، والذي يثبت بموجب تقارير من قبل الطرف الثاني يتم خصم
                        مدة الغياب أو ساعات التأخير من الاستحقاق الشهري للطرف الأول بنسبة وتناسب مع راتب السائق
                        الأساسي ، ما لم يكون بسبب المرض وبموجب تقرير طبي وراحة مرضية بما يتفق مع أنظمة العمل السارية
                        داخل المملكة</li>
                    <li>في حالة طلب الطرف الثاني زيادة عدد السائقين يتم زيادة العدد بنفس الشروط و المزايا</li> --}}
                </ul>
                <ul dir="ltr" class="me-3">
                    {!! $price_quotation->band_en_32 !!}
                    {{-- <li>Cost inclusive of driver full cost except housing and transportation and trip allowance</li>
                    <li>Incase of absence or delay of any person which it will be supported by written report from
                        the second party deduction for the delay or absent from his monthly salary by the first
                        party, unless this absent or delay because of illness and supported by official report from
                        approved medical provider according to labor laws applied in KSA</li>
                    <li>Incase the second party want to increase the number of drivers the same cost and terms and
                        conditions will apply</li> --}}
                </ul>
            </td>
        </tr>

        <tr>
            <td colspan="4">
                {!! $price_quotation->band_ar_3 !!}
            </td>
            <td colspan="4" dir="ltr">
                {!! $price_quotation->band_en_3 !!}
            </td>
        </tr>
        <tr>
            <td colspan="4" class="fw-bold">
                البند الرابع - تأمين السائقين
            </td>
            <td colspan="4" class="fw-bold text-end">
                Fourth Article: Providing Driver
            </td>
        </tr>
        <tr>
            <td colspan="4">
                {{-- <ul>
                    <li>
                        يلتزم الطرف الأول بتأمين العدد الذي يطلبه الطرف الثاني حسب إمكانيات الطرف الأول ساعات العمل
                        (8) ساعات للعامل في اليوم و (6) أيام في الأسبوع ويكون يوم الراحة مقرر حسب جدول المناوبة، حسب
                        نظام العمل و العمال السعودي
                    </li>
                    <li>
                        يبدا عقد السائق بمجرد دخوله للمملكة و علي الطرف انهاء إجراءات الكشف الطبي علي نفقة الطرف
                        الثاني
                    </li>
                    <li>
                        يحفظ قانون العمل و العمال السعودي تصريح عمل للسائقين لمدة 3 اشهر علي الطرف الأول استخراج
                        الإقامة خلال هذه الفترة. الطرف الثاني يكون مسؤولا عن السائق خلال هذه الفترة
                    </li>
                    <li>
                        في حالة فشل السائق أداء المهام المنوط بها او إخفاقه في قيادة السيارة يحق للطرف الثاني إعادة
                        السائق للطرف الأول مع تامين الطرف الأول لبديل
                    </li>
                    <li>
                        يحق للطرف الثاني نقل كفالة السائق الذي اكمل فترة التعاقد في حالة سماح الأنظمة و بالاتفاق بين
                        كلا الطرفين علي ان يسدد الطرف الثاني للطرف الأول مبلغ 2000 ريال عن كل عامل يرغب الطرف الثاني
                        في نقلل كفالتة له
                    </li>
                </ul> --}}
                {!! $price_quotation->band_ar_4 !!}
            </td>
            <td colspan="4" dir="ltr">
                {!! $price_quotation->band_en_4 !!}
                {{-- <ul dir="ltr" class="me-3">
                    <li>
                        The first party is committed to provide the needed numbers requested by the second party
                        according to the first party capabilities the working hours shall be 8 hours, 6 days a week
                        with one day off, as per Saudi labour law
                    </li>
                    <li>
                        The candidate employment contract starts once they arrive to KSA, the First Party should
                        complete their medical examination at the expense of the Second Party
                    </li>
                    <li>
                        Saudi law grant a permit period work for (3) months, the First Party require to obtain a
                        permanent residency permit during this period. The Second Party shall be fully responsible
                        for the candidate before all official authorities
                    </li>
                    <li>
                        In case that the driver does not perform his duties or failure in driving skills, the second
                        party has the right to return the worker and compensate him with an alternative or the value
                        of the cost from the first party
                    </li>
                    <li>
                        Second Party will have an option to transfer Employees who have completed their employment
                        contract to their sponsorship if allowed by the Ministry of driver and agreed by both
                        parties and after approval of First Party after paying 2000 for each driver the second party
                        wishes to transfer his sponsorship
                    </li>
                </ul> --}}
            </td>
        </tr>
        <tr>
            <td colspan="4" class="fw-bold">
                البند الخامس: - التزامات الطرف الأول
            </td>
            <td colspan="4" class="fw-bold text-end">
                Fifth Article :
            </td>
        </tr>
        <tr>
            <td colspan="4" class="">
                {!! $price_quotation->band_ar_5 !!}
                {{-- 1. يلتزم الطرف الأول بتوفير العمالة اللازمة التي يطلبها الطرف الثاني وفقاً للوائح والقوانين المعمول
                بها بالمملكة العربية السعودية فيما يخص إجراءات الاستقدام.
                <br>
                2. يلتزم الطرف الأول بتوفير المرشحين طبقا للمطلوب متضمنا الاتي:
                <br>
                - المهنة و العدد المطلوب.
                <br>
                - جنسيات العمالة المطلوبة.
                <br>
                - الرواتب الشهرية.
                <br>
                - تنسيق وصول العمالة الي المقر الرئيسي للطرف الثاني.
                <br>
                - توفير المواصلات للسائقين لاستكمال إجراءات الرخصة و الإجراءات الأخرى المتعلقة بالإصدار. --}}

            </td>
            <td colspan="4" class=" " dir="ltr">
                {!! $price_quotation->band_en_5 !!}
                {{-- 1- The first party is committed to provide the needed driver according to labor law working in KSA.
                <br>
                2- First Party provide candidates as required including:
                <br>
                - Occupations and number of candidates.
                <br>
                - Nationalities of the workers.
                <br>
                - Monthly wages.
                <br>
                - Coordinating the arrival of candidates to the headquarters of the second party.
                <br>
                - When the candidates arrive coordinating and providing transportation to proceed the required for
                issuing the driving license and others matters related to same. --}}
            </td>
        </tr>
        {{-- <tr>
            <td colspan="4" class="">
                3. يلتزم الطرف الأول بسداد نفقات ومصاريف ورسوم الجهات الحكومية اللازمة لاستقدام العمالة وهي: (رسوم
                التأشيرة، رسوم إصدار وتجديد الإقامة مدة العقد، رسوم رخصة العمل وتجديدها، رسوم التأمين الطبي، رسوم
                التأمين ضد الأخطار المهنية، رسوم الكشف الطبي، تذاكر السفر في نهاية العقد، تحمل أجر الإجازة السنوية
                ومكافأة نهاية الخدمة، رسوم تعاقد اجير رسوم نظام مقيم ونظام إنجاز- ) بالإضافة للراتب الشهري للعامل
                وبدلات الإعاشة للعامل وأي مصاريف مالية مرتبطة السائق)
                <br>
                4. يلتزم الطرف الأول سداد المصروفات الحكومية بعد استلامها من الطرف الثاني . بالإضافة الي سداد رسوم و
                مصروفات الرخصة وتحصيلها من الطرف الثاني.
            </td>
            <td colspan="4" class=" " dir="ltr">
                3- The first party is committed to pay the official fees to bring the driver ( Visa- iqama renewal-
                driver license- medical- medical test- tickets- vacation- end of service- ajeer) plus the monthly
                salary of the driver.
                <br>
                4- The First Party pay for Government fees and charges after collect from the Second Party. In
                addition to the fees and expenses of the necessary licenses and permits, each according to his
                profession and charge the second party
            </td>
        </tr>
        <tr>
            <td colspan="4" class="">
                5. اتفق الطرفان مع عدم الاخلال بأحكام العقد على أن تلتزم العمالة بالعمل تحت إشراف ومراقبة وإدارة
                الطرف الثاني.
                <br>
                6. يتم حسم الغياب و مخالفات المرور من راتب السائق بناء علي اشعارات من شركة كانو.
                <br>
                7. يتم احتساب الراتب الشهري بناء علي التقويم الميلادي ماعدا شهر القدوم و شهر الخروج بناء علي الأيام
                الفعلية.
                <br>
                8. يحق للطرف الثاني استرجاع المبالغ من السائق بعد التنسيق مع الطرف الأول و هذه المبالغ تشمل أي
                مصاريف ناتجة عن الأعطال او الخسائر الناتجة عن رعونة السائق او خطاؤه. الطرف الأول يخصم من راتب السائق
                و مزاياه مالم يتم الاتفاق بين السائق و كانو علي خلاف ذلك.
                <br>
                9. يلتزم الطرف الأول بإنهاء خدمات السائق و ترحيله بناء نظام العمل و العمال
            </td>
            <td colspan="4" class=" " dir="ltr">
                5- Both parties agreed without violating the provisions of the contract, the driver is committed to
                work under the supervision of the second party.
                <br>
                6- Absent and traffic fine deduction: It will be deduction from driver salary by service provider
                based on notification by Kanoo.
                <br>
                7- Monthly wages count as (Gregorian) calendar, except for the arrival and departure calculated as
                actual number of days.
                <br>
                8- The Second Party shall claim the employees directly upon coordination with the First party. The
                Second party has right to claim any damages or repair resulting from employees’ error or misuse. The
                service provider will deduct from the driver salary / benefits unless it’s agreed between driver and
                Kanoo.
                <br>
                9- The First Party is obligated to terminate the contracts of candidates and their deportation based
                on labor law
            </td>
        </tr>

        <tr>
            <td colspan="4" class="">
                10. يلتزم الطرف الأول بإصدار الإقامة خلال مدة لا تتجاوز 10 أيام عمل من تاريخ وصول السائق ما لم يكن
                هناك مشكلة في بصمة السائق أو الجواز أو عدم الربط مع الجوزات
            </td>
            <td colspan="4" class=" " dir="ltr">
                10- The first party is committed to issue the iqama of the driver within 10 working days from the
                day of iterance of Saudi Arabia unless there is an issue of the driver fingerprint.
            </td>
        </tr>
        <tr>
            <td colspan="4" class="">
                11. يلتزم الطرف الأول بتزويد الطرف الثاني فيما يخص عمالته صورة جواز السفر مع التأشيرة، أو عمل تأشيرة
                خروج وعودة، أو ترقية التأمين الطبي حسب طلب الطرف الثاني مع تحمل الطرف الثاني لتكلفة الترقية وذلك
                وفقاً لسياسات الطرف الأول
            </td>
            <td colspan="4" class=" " dir="ltr">
                11- First party is committed to provide the second party copy of his passport and the visa or exit
                and re-entry or medical class promotion according to policies of the first party
            </td>
        </tr>
        <tr>
            <td colspan="4" class="">
                12. يلتزم الطرف الأول بعدم نقل او سحب أي من العمالة الموجودة لدي الطرف الثاني الا بعد الحصول علي
                الموافقة الكتابية منه
            </td>
            <td colspan="4" class=" " dir="ltr">
                12- First party is committed not to transfer or withdraw any driver of the second party unless there
                is a written approval from the second party
            </td>
        </tr> --}}
        <tr>
            <td colspan="4" class="fw-bold">
                البند السادس: - التزامات الطرف الثاني
            </td>
            <td colspan="4" class="fw-bold text-end">
                Article Sixth : second party commitment
            </td>
        </tr>
        <tr>
            <td colspan="4" class="">
                {!! $price_quotation->band_ar_6 !!}
                {{-- - يلتزم الطرف الثاني بتشغيل والإشراف وإدارة عمالة الطرف الأول المكلفين بالعمل لديه تنفيذاً لبنود هذا
                العقد ومراقبة حضورهم وانصرافهم ومعاملاتهم بما يحفظ حقوقهم وقدرتهم وبحسب نظام الشركة (الطرف الثاني)
                ولا يجوز له التأجير من الباطن .
                <br>

                - لايحق للطرف الثاني إعادة المرشحين او توجيههم للطرف الأول لاي سبب.
                <br>
                - يلتزم الطرف الثاني إعادة المرشحين الذين انتهت مدة خدمتهم الي المقر الرئيسي للطرف الأول. --}}

            </td>
            <td colspan="4" class=" " dir="ltr">
                {!! $price_quotation->band_en_6 !!}
                {{-- - Second party is committed to operate and supervise the first party driver to achieve the contract
                and monitor their attendance which save their rights and abilities according to the second party and
                is not allowed to rent the driver to other client.
                <br>
                - The Second Party cannot return candidates or direct them to the First Party for any reason.
                <br>
                - The Second Party is obligated to return the candidates whose service period has expired to the
                headquarters of the First Party --}}
            </td>
        </tr>
        {{-- <tr>
            <td colspan="4" class="">
                يلتزم الطرف الثاني بتوفير كل متطلبات السلامة داخل الموقع لحماية العمالة المنفذة لهذا العقد ، أما
                الحوادث المرورية ،المخالفات المرورية ما لم يكن منسوبي الطرف الأول لهم علاقة بالواقعة )
            </td>
            <td colspan="4" class=" " dir="ltr">
                - Second party is committed to provide safety requirements , concerning accidents or traffic
                violation will be after investigation unless the first party driver is the cause of these accidents
                and violations
            </td>
        </tr>
        <tr>
            <td colspan="4" class="">
                -يلتزم الطرف الثاني بسداد المبالغ المتفق عليها وبموجب الفواتير المرسلة نظير تنفيذ الطرف الأول
                لالتزاماته المترتبة عليه بموجب هذا العقد ووفقاً لعدد العمالة المنفذة للعقد وجدول الساعات المتفق
                عليها
            </td>
            <td colspan="4" class=" " dir="ltr">
                - Second party is committed to pay based on the invoices sent by the first party according to the
                numbers and the working days
            </td>
        </tr>
        <tr>
            <td colspan="4" class="">
                - يلتزم الطرف الثاني برفع جدول ساعات العمل في يوم 20 من كل شهر ميلادي حسب سياسة الطرف الثاني
            </td>
            <td colspan="4" class=" " dir="ltr">
                - Second party is committed to send the attendance sheet each 20th of the month
            </td>
        </tr>
        <tr>
            <td colspan="4" class="">
                - يلتزم الطرف الثاني بدفع أي عمولات او ردود شهرية للموظف على أن يتم تحويلها على حساب الطرف الأول
                لإيداعها للعامل وفق محققات الاداء للطرف الثاني وبدلات اخرى ان وجد وتكون هذه المبالغ خارج قيمة العقد
                المتفق عليها اعلاه في البند الثالث
            </td>
            <td colspan="4" class=" " dir="ltr">
                - Second party is committed to pay any commission or trip allowance to the driver where it will be
                transferred to the first party and it will be transferred to the driver account according to the
                performance of the driver and these amounts are excluding this contract in article three.
            </td>
        </tr> --}}
        <tr>
            <td colspan="4" class="fw-bold">
                البند السابع - مكان تنفيذ العقد:
            </td>
            <td colspan="4" class="fw-bold text-end">
                Seventh Article: place of contract
            </td>
        </tr>
        <tr>
            <td colspan="4" class="">
                {!! $price_quotation->band_ar_7 !!}
                {{-- من المتفق عليه بين الطرفين أن مكان عمل العمالة ستوزع على كافة فروع الطرف الثاني داخل المملكة العربية
                السعودية --}}
            </td>
            <td colspan="4" class=" " dir="ltr">
                {!! $price_quotation->band_en_7 !!}
                {{-- It is agreed between both parties that work place is within KSA according to the branches of the
                second party --}}
            </td>
        </tr>
        <tr>
            <td colspan="4" class="fw-bold">
                البند التاسع: - انتهاء العقد
            </td>
            <td colspan="4" class="fw-bold text-end">
                Nineth Article: contract End
            </td>
        </tr>
        <tr>
            <td colspan="4" class="">
                {!! $price_quotation->band_ar_9 !!}
                {{-- ينتهي هذا العقد بانقضاء المدة الزمنية او برغبة الطرفين بعد استلام اخطار قبل الانتهاء بثلاث شهور
                كتابيا و بإقرار من الطرفين --}}
            </td>
            <td colspan="4" class=" " dir="ltr">
                {!! $price_quotation->band_en_9 !!}
                {{-- This contract ends upon its expiry date, or with the desire of the two parties to terminate, after
                three months' written notice before the date expired of the contract term and with the written
                consent of both parties --}}
            </td>
        </tr>
        <tr>
            <td colspan="4" class="">
                1. ينتهي هذا العقد باتفاق الطرفان كتابتاً
            </td>
            <td colspan="4" class=" " dir="ltr">
                This contract end with the both parties written agreement
            </td>
        </tr>
        <tr>
            <td colspan="4" class="">
                2. يفسخ هذه العقد في حال حدوث ظروف طارئة أو قوة قاهرة على سبيل المثال لا الحصر (الزلازل – الفيضانات
                - الأمراض والأوبئة – قرارات تصدر من الجهات الحكومية)، تحول دون تنفيذ الطرفين لالتزاماتها المنصوص
                عليها في هذا العقد
            </td>
            <td colspan="4" class=" " dir="ltr">
                This contract end in case of force majeure for example ( earthquakes- floods – epidemics – any
                decisions by the authorities) with-holding this agreement from implementation
            </td>
        </tr>
        <tr>
            <td colspan="4" class="">
                3. أتفق الطرفان على أنه في حال وجود إخلال أو تقصير من أحد الطرفان في تنفيذ التزاماتهما المحددة بموجب
                هذا العقد فإن الطرف المتضرر يلتزم بإبلاغ الطرف الآخر كتابيا بـ "الاخلال أو التقصير" على أن يلتزم
                الطرف الآخر بتصحيح ذلك وإشعار الطرف المتضرر بما يؤكد التصحيح.
            </td>
            <td colspan="4" class=" " dir="ltr">
                Both parties agreed in case there is not commitment from any party the party should inform in
                written the issue and the other party should fix the issue and notify the second party
            </td>
        </tr>
        <tr>
            <td colspan="4" class="fw-bold">
                البند العاشر: - أحكام عامة
            </td>
            <td colspan="4" class="fw-bold text-end">
                Tenth Article: General rules
            </td>
        </tr>
        <tr>
            <td colspan="4" class="">
                {!! $price_quotation->band_ar_10 !!}
                {{-- 1. يلتزم الطرف الأول بالتنسيق المسبق مع الطرف الثاني عند منح أياً من العمالة أي إجازات سنوية أو
                عرضيه (داخل المملكة أو خارجها) وعدم الموافقة على أي إجازة إلا بموافقة الطرف الثاني على ذلك مع الأخذ
                بالاعتبار أن السائق سيتمتع بإجازته الاعتيادية بعد نهاية عقده --}}
            </td>
            <td colspan="4" class=" " dir="ltr">
                {!! $price_quotation->band_en_10 !!}
                {{-- - First party is committed to coordinate with the second party and acquire written approval prior
                approve any type of vacation inside or outside KSA. Based on the driver will have his vacation when
                the contract end. --}}
            </td>
        </tr>
        <tr>
            <td colspan="4" class="">
                2. يستحق السائق إجازة سنوية مدتها (21) يوم مدفوعة الراتب من حساب الطرف الأول عن كل سنة قضاها السائق
                ويحدد الطرف الثاني تواريخ الإجازات حسب مقتضيات العمل على أن يتمتع السائق بمجموع إجازته بعد نهاية مدة
                التعاقد بالإضافة لاستحقاقه لإجازات الأعياد وأي إجازات أخرى حسب نظام وزارة العمل.
            </td>
            <td colspan="4" class=" " dir="ltr">
                - The driver has the right of paid annual leave of 21 days from the first party for each year the
                driver spend with the second party and the driver to take the vacation each two years after proper
                coordination with the second party
            </td>
        </tr>
        <tr>
            <td colspan="4" class="">
                3. لا يجوز تعديل هذا العقد الا بموافقة الطرفين الكتابية ويُضاف هذا التعديل كملحق للعقد.
            </td>
            <td colspan="4" class=" " dir="ltr">
                - It si not allowed to adjust this agreement unless written approval from both parties and it will
                be an amendment
            </td>
        </tr>
        <tr>
            <td colspan="4" class="">
                4. اللغة العربية هي اللغة المعتمدة لأي مراسلات بين الطرفين، والتاريخ الميلادي هو التاريخ المعتمد في
                هذا العقد.
            </td>
            <td colspan="4" class=" " dir="ltr">
                - Arabic language is the official language for any correspondence and the Gregorian calendar is the
                official date for this contract
            </td>
        </tr>
        <tr>
            <td colspan="4" class="fw-bold">
                البند الحادي عشر: - سرية المعلومات
            </td>
            <td colspan="4" class="fw-bold text-end">
                Eleventh Article : confidentiality
            </td>
        </tr>
        <tr>
            <td colspan="4" class="">
                {!! $price_quotation->band_ar_11 !!}
                {{-- يلتزم الطرفان بالحفاظ على كافة المعلومات والبيانات التي يحصل عليها كلاً منهما عن الأخر بمناسبة إبرام
                هذا العقد أياً كانت نوعها، تحت بند السرية المطلقة، وعدم إفشاءها أو الإدلاء بها الابموافقة كتابية --}}
            </td>
            <td colspan="4" class=" " dir="ltr">
                {!! $price_quotation->band_en_11 !!}
                {{-- Both parties are committed to confidentiality for all information and data which any party or its
                driver acquire because of this agreement and never disclose to any person without written approval --}}
            </td>
        </tr>
        <tr>
            <td colspan="4" class="fw-bold">
                البند الثاني عشر: - الإخطارات
            </td>
            <td colspan="4" class="fw-bold text-end">
                Eleventh Article : confidentiality
            </td>
        </tr>
        <tr>
            <td colspan="4" class="">
                {!! $price_quotation->band_ar_12 !!}
                {{-- أتفق الطرفين على أن كافة الإخطارات والمراسلات التي يتم ارسالها من أحد طرفي هذا العقد للأخر من خلال
                البريد الإلكتروني المعتمد الوارد في صدر هذا العقد تعتبر نافذة في حق الطرفين، وفي حالة حدوث أي تغيير
                في هذا البريد يلتزم كلا الطرفين بإخطار الطرف الآخر بموجب خطاب على البريد الالكتروني المعتمد بما يفيد
                اعتماد بريد الكتروني غيره خلال يوم عمل. --}}
            </td>
            <td colspan="4" class=" " dir="ltr">
                {!! $price_quotation->band_en_12 !!}
                {{-- Both parties agreed that all notification and correspondence which will be sent through the official
                emails mentioned in this agreement, incase of change in this email the concerned party is committed
                to send the new email within one working day --}}
            </td>
        </tr>
        <tr>
            <td colspan="4" class="fw-bold">
                البند الثالث عشر: - حل الخلافات
            </td>
            <td colspan="4" class="fw-bold text-end">
                Thirteenth article: solving disputes
            </td>
        </tr>
        <tr>
            <td colspan="4" class="">
                {!! $price_quotation->band_ar_13 !!}
                {{-- أي نزاع لا قدر الله ينشأ بين الأطراف بخصوص هذه الاتفاقية في تفسيره أو تنفيذ يتم المحاولة على حله
                ودياً، فإن تعذر الحل يتم اللجوء الجهات المختصة في المملكة العربية السعودية --}}
            </td>
            <td colspan="4" class=" " dir="ltr">
                {!! $price_quotation->band_en_13 !!}
                {{-- Any disputes occur in this agreement will be solved first by both parties in case it is still exist
                the official court for KSA will be the responsible court --}}
            </td>
        </tr>
        <tr>
            <td colspan="4" class="fw-bold">
                البند الرابع عشر: نسخ العقد
            </td>
            <td colspan="4" class="fw-bold text-end">
                Fourteenth Article : contract copies
            </td>
        </tr>
        <tr>
            <td colspan="4" class="">
                {!! $price_quotation->band_ar_14 !!}
                {{-- حرر هذا العقد من نسختين واستلم كل طرف نسخته بعد توقيعها والإقرار بما جاء فيها للعمل بموجبه. --}}
            </td>
            <td colspan="4" class=" " dir="ltr">
                {!! $price_quotation->band_en_14 !!}
                {{-- This contract is done in two copies each party has its signed copy from both parties --}}
            </td>
        </tr>
        <tr>
            <td colspan="4">
                الطرف الأول
            </td>
            <td colspan="4">
                الطرف الثاني
            </td>
        </tr>
        <tr>
            <td colspan="4">
                شركة إعمار المساند للتشغيل والصيانة
            </td>
            <td colspan="4">
                شركة
            </td>
        </tr>
        <tr>
            <td colspan="4">
                يمثلها: عبد اللة غازي المطيري
            </td>
            <td colspan="4">
                يمثلها: السيد/
            </td>
        </tr>
        <tr>
            <td colspan="4">
                صفته: المدير العام
            </td>
            <td colspan="4">
                صفته:
            </td>
        </tr>
        <tr>
            <td colspan="4">
                التاريخ: 25-11-2024
            </td>
            <td colspan="4">
                التاريخ:
            </td>
        </tr>
        <tr>
            <td colspan="4">
                التوقيع:
            </td>
            <td colspan="4">
                التوقيع:
            </td>
        </tr>
        <tr>
            <td colspan="4">
                الختم:
            </td>
            <td colspan="4">
                الختم:
            </td>
        </tr>
    </table>
</div>


{{-- @endsection --}}
