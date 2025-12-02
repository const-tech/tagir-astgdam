<?php

namespace App\Livewire;

use App\Events\NewPriceMessage;
use App\Models\PriceQuotation;
use App\Models\PriceQuotationMessage;
use Livewire\Component;

class PriceQuotationsChatEditeContract extends Component



{
    public $jobs = [];
    public $price_quotation;
    // chat
    public $message;
    public $special_requirements;
    public $special_requirements_en;
    public $items;
    public $items_contract;
    public $items_en;
    public $items_two;
    public $items_two_contract;
    public $items_two_en;

    public $band_ar_1;
    public $band_en_1;
    public $band_ar_2;
    public $band_en_2;
    public $band_ar_3;
    public $band_en_3;
    public $band_ar_4;
    public $band_en_4;
    public $band_ar_5;
    public $band_en_5;
    public $band_ar_6;
    public $band_en_6;
    public $band_ar_7;
    public $band_en_7;
    public $band_ar_8;
    public $band_en_8;
    public $band_ar_9;
    public $band_en_9;
    public $band_ar_10;
    public $band_en_10;
    public $band_ar_11;
    public $band_en_11;
    public $band_ar_12;
    public $band_en_12;
    public $band_ar_13;
    public $band_en_13;
    public $band_ar_14;
    public $band_en_14;

    public function getListeners()
    {
        return [
            "echo:price_message.{$this->price_quotation->id},NewPriceMessage" => 'loadMessages',
        ];
    }

    public function addJob()
    {
        $this->jobs[] = [
            'job_title' => '',
            'work_location' => '',
            'contract_duration' => '',
            'number' => 0,
            'notes' => '',
            'vacation' => '',
            'selling_cost' => 0,
            'salary' => 0,
            'housing_allowance' => 0,
            'food_allowance' => 0,
            'transportation_allowance' => 0,
            'other_allowance' => 0,
            'total_salary' => 0,
            'total_salary_for_number' => 0,
            'iqama' => 54,
            'saudization' => 257,
            'vacation_days' => 0,
            'vacation_cost' => 0,
            'labor_card' => 808,
            'enable_health_card' => 0,
            'health_card' => 0,
            'enable_driving_license' => 0,
            'driving_license' => 0,
            'driver_card' => 0,
            'vacation_ticket_cost' => 0,
            'misclenious' => 15,
            'total_costs' => 0,
            'total_costs_for_number' => 0,
            'medical_insurance_age' => '',
            'medical_insurance' => 0,
            'end_of_service_cost' => 0,
            'end_of_service_ticket_cost' => 0,
            'net_profit' => 0,
            'total_net_profit_for_number' => 0,
            'enable_ajeer' => 0,
            'ajeer' => 0,
            'total_indirect_cost' => 0,
            'total_indirect_for_number' => 0,
            'profit_percentage' => 0,
            'visa_cost' => 83,
        ];
    }

    public function mount(PriceQuotation $price_quotation)
    {
        $this->price_quotation = $price_quotation;
        $this->special_requirements = $price_quotation->special_requirements ?? 'السعر لايشمل ضريبة القيمه المضافة';
        $this->special_requirements_en = $price_quotation->special_requirements_en ?? 'The price does not include value added tax';
        $this->items_contract = $price_quotation->items_contract ?? setting('items_contract');
        $this->items_en = $price_quotation->items_en ?? setting('items_en');
        $this->items_two_contract = $price_quotation->items_two_contract ?? setting('items_two_contract');
        $this->items_two_en = $price_quotation->items_two_en ?? setting('items_two_en');



        $this->band_ar_1 = $price_quotation->band_ar_1 ?? "يعتبر التمهيد السابق جزأ لا يتجزأ من هذا العقد ومكمل ومفسر له.";
        $this->band_en_1 = $price_quotation->band_en_1 ?? "The above introduction is part of this agreement.";
        $this->band_ar_2 = $price_quotation->band_ar_2 ?? "
	يبدا تفعيل هذا العقد من تاريخ التوقيع علية ويستمر لمدة 3 سنوات. في حالة انهاء العقد من جانب أحد الأطراف ويوجد أحد الأطراف لم يقم بتنفيذ بنود العقد تستمر هذه البنود علي الطرف الثاني لحين انتهاء مدة العقد. بنفس الشروط والاحكام. مالم يتفق كلا الطرفين علي خلاف ذلك كتابيا.



يحق للطرف الثاني تجديد العقد بعد موافقة كتابية من الطرف الأول قبل انتهاء العقد بثلاث شهور. في حالة لم يشعر الطرف الثاني الطرف الأول برغبته في التجديد يعتبر هذا العقد مجدد لمدة مماثله بنفس الشروط و المزايا.
";
        $this->band_en_2 = $price_quotation->band_en_2 ?? "Contract term starts from the date of its signing, and continues for three (3) years. In the event that the term of the contract expires and there are cadres who have not completed the term of the work contract, the terms of this contract shall be valid against the second party. Until the end of the employment contract with the same terms and conditions of this contract. Unless the parties have agreed otherwise in writing.
The Second Party has the right to renew the contract after a written approval from the First Party, notified in three months before the contract expiry date. In the event that the Second Party shall not notify the First Party of its desire to renew. This contract is considered renewed for a similar period with the same terms and conditions
";
        $this->band_ar_3 = $price_quotation->band_ar_3 ?? "يقدم الطرف الأول، فواتير عن تأمين العمالة خلال المدة المنقضية تشمل الأجور الشهرية المذكورة في البند الثالث والاجور الاضافية (الاوفر تايم) وتشمل ضريبة القيمة المضافة ويلتزم الطرف الثاني بدفع قيمة الفاتورة وخلال مدة لا تتجاوز  (15 يوم) يوم من تاريخ الفاتورة وفي حال عدم التزام الطرف الثاني بسداد الفاتورة يحق للطرف الأول فسخ العقد بعد إشعاره بالفسخ بثلاثة أيام عمل من تاريخ الإشعار مع دفع ما تبقى من المستحقات والتعويض ا لنهاية العقد . ";
        $this->band_en_3 = $price_quotation->band_en_3 ?? "-	First party submit monthly invoices for the previous month of the amount mentioned in article three, plus overtime included VAT and the second party is committed pay the invoice within 15 days from the day of submission the invoice, incase the second party is not committed to pay the invoice the first party has the right to cancel the contract after official notification three days prior to cancelation and paying the remaining amount and compensation till the contract end.";
        $this->band_ar_4 = $price_quotation->band_ar_4 ?? "
	يلتزم الطرف الأول بتأمين العدد الذي يطلبه الطرف الثاني حسب إمكانيات الطرف الأول ساعات العمل (8) ساعات للعامل في اليوم و (6) أيام في الأسبوع ويكون يوم الراحة مقرر حسب جدول المناوبة، حسب نظام العمل و العمال السعودي .
يبدا عقد السائق بمجرد دخوله للمملكة و علي الطرف انهاء إجراءات الكشف الطبي علي نفقة الطرف الثاني .
يحفظ قانون العمل و العمال السعودي تصريح عمل للسائقين لمدة 3 اشهر علي الطرف الأول استخراج الإقامة خلال هذه الفترة. الطرف الثاني يكون مسؤولا عن السائق خلال هذه الفترة.

في حالة فشل السائق أداء المهام المنوط بها او إخفاقه في قيادة السيارة يحق للطرف الثاني إعادة السائق للطرف الأول مع تامين الطرف الأول لبديل .

يحق للطرف الثاني نقل كفالة السائق الذي اكمل فترة التعاقد في حالة سماح الأنظمة و بالاتفاق بين كلا الطرفين علي ان يسدد الطرف الثاني للطرف الأول مبلغ 2000 ريال عن كل عامل يرغب الطرف الثاني في نقلل كفالتة له
";
        $this->band_en_4 = $price_quotation->band_en_4 ?? "•	The first party is committed to provide the needed numbers requested by the second party according to the first party capabilities  the working hours shall be 8 hours, 6 days a week with one day off,  as per Saudi labour law .
•	The candidate employment contract starts once they arrive to KSA, the First Party should complete their medical examination at the expense of the Second Party.
•	Saudi law grant a permit period work for (3) months, the First Party require to obtain a permanent residency permit during this period.  The Second Party shall be fully responsible for the candidate before all official authorities.
•	In case that the driver does not perform his duties or failure in driving skills, the second party has the right to return the worker and compensate him with an alternative or the value of the cost from the first party
•	Second Party will have an option to transfer Employees who have completed their employment contract to their sponsorship if allowed by the Ministry of driver and agreed by both parties and after approval of First Party after paying 2000 for each driver the second party wishes to transfer his sponsorship.


";
        $this->band_ar_5 = $price_quotation->band_ar_5 ?? "1.	يلتزم الطرف الأول بتوفير العمالة اللازمة التي يطلبها الطرف الثاني وفقاً للوائح والقوانين المعمول بها بالمملكة العربية السعودية فيما يخص إجراءات الاستقدام.
2.	يلتزم الطرف الأول بتوفير المرشحين طبقا للمطلوب متضمنا الاتي:
-	المهنة و العدد المطلوب.
-	جنسيات العمالة المطلوبة.
-	الرواتب الشهرية.
-	تنسيق وصول العمالة الي المقر الرئيسي للطرف الثاني.
-	توفير المواصلات للسائقين لاستكمال إجراءات الرخصة و الإجراءات الأخرى المتعلقة بالإصدار.
3.	يلتزم الطرف الأول بسداد نفقات ومصاريف ورسوم الجهات الحكومية اللازمة لاستقدام العمالة وهي: (رسوم التأشيرة، رسوم إصدار وتجديد الإقامة مدة العقد، رسوم رخصة العمل وتجديدها، رسوم التأمين الطبي، رسوم التأمين ضد الأخطار المهنية، رسوم الكشف الطبي، تذاكر السفر في نهاية العقد، تحمل أجر الإجازة السنوية ومكافأة نهاية الخدمة، رسوم تعاقد اجير رسوم نظام مقيم ونظام إنجاز- ) بالإضافة للراتب الشهري للعامل وبدلات الإعاشة للعامل وأي مصاريف مالية مرتبطة السائق)
4.	يلتزم الطرف الأول سداد المصروفات الحكومية بعد استلامها من الطرف الثاني . بالإضافة الي سداد رسوم و مصروفات الرخصة  وتحصيلها من الطرف الثاني.
5.	اتفق الطرفان مع عدم الاخلال بأحكام العقد على أن تلتزم العمالة بالعمل تحت إشراف ومراقبة وإدارة الطرف الثاني.6.	يتم حسم الغياب و مخالفات المرور من راتب السائق بناء علي اشعارات من شركة كانو.
7.	يتم احتساب الراتب الشهري بناء علي التقويم الميلادي ماعدا شهر القدوم و شهر الخروج بناء علي الأيام الفعلية.
8.	يحق للطرف الثاني استرجاع المبالغ من السائق بعد التنسيق مع الطرف الأول و هذه المبالغ تشمل أي مصاريف ناتجة عن الأعطال او الخسائر الناتجة عن رعونة السائق او خطاؤه. الطرف الأول يخصم من راتب السائق و مزاياه مالم يتم الاتفاق بين السائق و كانو علي خلاف ذلك.
9.	يلتزم الطرف الأول بإنهاء خدمات السائق و ترحيله بناء نظام العمل و العمال
10.	يلتزم الطرف الأول بإصدار الإقامة خلال مدة لا تتجاوز 10 أيام عمل من تاريخ وصول السائق ما لم يكن هناك مشكلة في بصمة السائق أو الجواز أو عدم الربط مع الجوزات.11.	يلتزم الطرف الأول بتزويد الطرف الثاني فيما يخص عمالته صورة جواز السفر مع التأشيرة، أو عمل تأشيرة خروج وعودة، أو ترقية التأمين الطبي حسب طلب الطرف الثاني مع تحمل الطرف الثاني لتكلفة الترقية وذلك وفقاً لسياسات الطرف الأول.12.	يلتزم الطرف الأول بعدم نقل او سحب أي من العمالة الموجودة لدي الطرف الثاني الا بعد الحصول علي الموافقة الكتابية منه.";
        $this->band_en_5 = $price_quotation->band_en_5 ?? "1-	The first party is committed to provide the needed driver according to labor law working in KSA.
2-	First Party provide candidates as required including:
- Occupations and number of candidates.
- Nationalities of the workers.
- Monthly wages.
- Coordinating the arrival of candidates to the headquarters of the second party.
- When the candidates arrive coordinating and providing transportation to proceed the required for issuing the driving license and others matters related to same.
3-	The first party is committed to pay the official fees to bring the driver ( Visa- iqama renewal- driver license- medical- medical test- tickets- vacation- end of service- ajeer) plus the monthly salary of the driver.





4-	The First Party pay for Government fees and charges after collect from the Second Party.  In addition to the fees and expenses of the necessary licenses and permits, each according to his profession and charge the second party
5-	Both parties agreed without violating the provisions of the contract, the driver is committed to work under the supervision of the second party.6-	Absent and traffic fine deduction: It will be deduction from driver salary by service provider based on notification by Kanoo.
7-	 Monthly wages count as (Gregorian) calendar, except for the arrival and departure calculated as actual number of days.
8-	The Second Party shall claim the employees directly upon coordination with the First party.   The Second party has right to claim any damages or repair resulting from employees’ error or misuse. The service provider will deduct from the driver salary / benefits unless it’s agreed between driver and Kanoo.
9-	The First Party is obligated to terminate the contracts of candidates and their deportation based on  labor law
10-	The first party is committed to issue the iqama of the driver within 10 working days from the day of iterance of Saudi Arabia unless there is an issue of the driver fingerprint. 11-	First party is committed to provide the second party copy of his passport and the visa or exit and re-entry or medical class promotion according to policies of the first party.12-	First party is committed not to transfer or withdraw any driver of the second party unless there is a written approval from the second party.";
        $this->band_ar_6 = $price_quotation->band_ar_6 ?? "1-	يلتزم الطرف الثاني بتشغيل والإشراف وإدارة عمالة الطرف الأول المكلفين بالعمل لديه تنفيذاً لبنود هذا العقد ومراقبة حضورهم وانصرافهم ومعاملاتهم بما يحفظ حقوقهم وقدرتهم وبحسب نظام الشركة (الطرف الثاني) ولا يجوز له التأجير من الباطن .

-	لايحق للطرف الثاني إعادة المرشحين او توجيههم للطرف الأول لاي سبب.
-	يلتزم الطرف الثاني إعادة المرشحين الذين انتهت مدة خدمتهم الي المقر الرئيسي للطرف الأول.
2-	 يلتزم الطرف الثاني بتوفير كل متطلبات السلامة داخل الموقع لحماية العمالة المنفذة لهذا العقد ، أما الحوادث المرورية ،المخالفات المرورية  ما لم يكن منسوبي الطرف الأول لهم علاقة بالواقعة )3-	يلتزم الطرف الثاني بسداد المبالغ المتفق عليها وبموجب الفواتير المرسلة نظير تنفيذ الطرف الأول لالتزاماته المترتبة عليه بموجب هذا العقد ووفقاً لعدد العمالة المنفذة للعقد وجدول الساعات المتفق عليها.4-	يلتزم الطرف الثاني برفع جدول ساعات العمل في يوم 20 من كل شهر ميلادي حسب سياسة الطرف الثاني5-	يلتزم الطرف الثاني بدفع  أي عمولات او ردود شهرية للموظف على أن يتم تحويلها على حساب الطرف الأول لإيداعها للعامل وفق محققات الاداء للطرف الثاني وبدلات اخرى ان وجد وتكون هذه المبالغ خارج قيمة العقد المتفق عليها اعلاه في البند الثالث.";
        $this->band_en_6 = $price_quotation->band_en_6 ?? "-	Second party is committed to operate and supervise the first party driver to achieve the contract and monitor their attendance which save their rights and abilities according to the second party and is not allowed to rent the driver to other client.
-	The Second Party cannot return candidates or direct them to the First Party for any reason.
-	The Second Party is obligated to return the candidates whose service period has expired to the headquarters of the First Party
-	Second party is committed to provide safety requirements , concerning accidents or traffic violation will be after investigation unless the first party driver is the cause of these accidents and violations -	Second party is committed to pay based on the invoices sent by the first party according to the numbers and the working days.-	Second party is committed to send the attendance sheet each 20th  of the month.-	Second party is committed to pay any commission or trip allowance to the driver where it will be transferred to the first party and it will be transferred to the driver account according to the performance of the driver and these amounts are excluding this contract in article three.";
        $this->band_ar_7 = $price_quotation->band_ar_7 ?? "	من المتفق عليه بين الطرفين أن مكان عمل العمالة ستوزع على كافة فروع الطرف الثاني داخل المملكة العربية السعودية.";
        $this->band_en_7 = $price_quotation->band_en_7 ?? "It is agreed between both parties that work place is within KSA according to the branches of the second party	";
        $this->band_ar_8 = $price_quotation->band_ar_8 ?? "";
        $this->band_en_8 = $price_quotation->band_en_8 ?? "";
        $this->band_ar_9 = $price_quotation->band_ar_9 ?? "ينتهي هذا العقد بانقضاء المدة الزمنية او برغبة الطرفين بعد استلام اخطار قبل الانتهاء بثلاث شهور كتابيا و بإقرار من الطرفين.";
        $this->band_en_9 = $price_quotation->band_en_9 ?? "This contract ends upon its expiry date, or with the desire of the two parties to terminate, after three months' written notice before the date expired of the contract term and with the written consent of both parties";
        $this->band_ar_10 = $price_quotation->band_ar_10 ?? "1.	يلتزم الطرف الأول بالتنسيق المسبق مع الطرف الثاني عند منح أياً من العمالة أي إجازات سنوية أو عرضيه (داخل المملكة أو خارجها) وعدم الموافقة على أي إجازة إلا بموافقة الطرف الثاني على ذلك مع الأخذ بالاعتبار أن السائق سيتمتع بإجازته الاعتيادية بعد نهاية عقده.";
        $this->band_en_10 = $price_quotation->band_en_10 ?? "-	First party is committed to coordinate with the second party and acquire written approval prior approve any type of vacation inside or outside KSA. Based on the driver will have his vacation when the contract end";
        $this->band_ar_11 = $price_quotation->band_ar_11 ?? "يلتزم الطرفان بالحفاظ على كافة المعلومات والبيانات التي يحصل عليها كلاً منهما عن الأخر بمناسبة إبرام هذا العقد أياً كانت نوعها، تحت بند السرية المطلقة، وعدم إفشاءها أو الإدلاء بها  الابموافقة كتابية";
        $this->band_en_11 = $price_quotation->band_en_11 ?? "Both parties are committed to confidentiality for all information and data which any party or its driver acquire because of this agreement and never disclose to any person without written approval  ";
        $this->band_ar_12 = $price_quotation->band_ar_12 ?? "أتفق الطرفين على أن كافة الإخطارات والمراسلات التي يتم ارسالها من أحد طرفي هذا العقد للأخر من خلال البريد الإلكتروني المعتمد الوارد في صدر هذا العقد تعتبر نافذة في حق الطرفين، وفي حالة حدوث أي تغيير في هذا البريد يلتزم كلا الطرفين بإخطار الطرف الآخر بموجب خطاب على البريد الالكتروني المعتمد بما يفيد اعتماد بريد الكتروني غيره خلال يوم عمل.";
        $this->band_en_12 = $price_quotation->band_en_12 ?? "Both parties agreed that all notification and correspondence which will be sent through the official emails mentioned in this agreement, incase of change in this email the concerned party is committed to send the new email within one working day ";
        $this->band_ar_13 = $price_quotation->band_ar_13 ?? "أي نزاع لا قدر الله ينشأ بين الأطراف بخصوص هذه الاتفاقية في تفسيره أو تنفيذ يتم المحاولة على حله ودياً، فإن تعذر الحل يتم اللجوء الجهات المختصة في المملكة العربية السعودية ";
        $this->band_en_13 = $price_quotation->band_en_13 ?? "Any disputes occur in this agreement will be solved first by both parties in case it is still exist the official court for KSA will be the responsible court  ";
        $this->band_ar_14 = $price_quotation->band_ar_14 ?? "حرر هذا العقد من نسختين واستلم كل طرف نسخته بعد توقيعها والإقرار بما جاء فيها للعمل بموجبه.";
        $this->band_en_14 = $price_quotation->band_en_14 ?? "This contract is done in two copies each party has its signed copy from both parties ";





        $this->jobs = $price_quotation->jobs()->get()->toArray();
        if (empty($this->jobs)) {
            $this->addJob();
        }
    }

    public function removeJob($key): void
    {
        unset($this->jobs[$key]);
    }



    private function calculateBasicSalary($key)
    {
        $allowances = [
            'housing_allowance',
            'salary',
            'transportation_allowance',
            'food_allowance',
            'other_allowance'
        ];

        $total = 0;
        foreach ($allowances as $allowance) {
            $total += (float)$this->jobs[$key][$allowance];
        }

        $this->jobs[$key]['total_salary'] = $total;
    }

    private function calculateBenefits(string $key): void
    {
        $months = $this->getMonths($key);

        $this->jobs[$key]['visa_cost'] = $months ? ($months === 12 ? 167 : 83) : 0;
        $this->jobs[$key]['vacation_days'] = $months ? ($months === 12 ? 30 : 42) : '';

        $totalSalary = (float)$this->jobs[$key]['total_salary'];
        $salary = (float)$this->jobs[$key]['salary'];

        $this->jobs[$key]['vacation_ticket_cost'] = $this->calculateVacationTicketCost($totalSalary, $months);
        $this->jobs[$key]['end_of_service_cost'] = $this->calculateEndOfServiceCost($salary);
        $this->jobs[$key]['vacation_cost'] = $this->calculateVacationCost($key, $months);
        $this->jobs[$key]['end_of_service_ticket_cost'] = $months ? round(1000 / $months, 2) : 0;
    }

    private function calculateIndirectCosts(string $key): void
    {
        $this->jobs[$key]['ajeer'] = $this->jobs[$key]['enable_ajeer'] ? 20 : 0;

        $indirectCostFields = [
            'iqama',
            'labor_card',
            'ajeer',
            'health_card',
            'driving_license',
            'driver_card',
            'medical_insurance',
            'saudization',
            'visa_cost',
            'vacation_cost',
            'vacation_ticket_cost',
            'end_of_service_ticket_cost',
            'end_of_service_cost',
            'misclenious'
        ];

        $total = 0;
        foreach ($indirectCostFields as $field) {
            $total += (float)$this->jobs[$key][$field];
        }

        $this->jobs[$key]['total_indirect_cost'] = round($total, 2);
    }

    public function getMonths($key): int
    {
        $vacation = $this->jobs[$key]['vacation'];
        return $vacation ? ($vacation === 'one_year' ? 12 : 24) : 0;
    }

    private function calculateVacationTicketCost(float $totalSalary, int $months): float
    {
        return $totalSalary && $months ? round($totalSalary / $months, 2) : 0;
    }

    private function calculateEndOfServiceCost(float $salary): float
    {
        return $salary ? round(($salary / 2) / 12, 2) : 0;
    }
    private function calculateVacationCost(string $key, int $months): float
    {
        $salary = (float)$this->jobs[$key]['salary'];
        $vacationDays = (float)$this->jobs[$key]['vacation_days'];
        return round(($salary / 30) * ($vacationDays * $months), 2);
    }
    public function calculateAllForItem(string $key): void
    {
        $this->calculateBasicSalary($key);
        $this->calculateBenefits($key);
        $this->calculateIndirectCosts($key);
        $this->calculateTotalsAndProfits($key);
    }
    private function calculateTotalsAndProfits(string $key): void
    {
        $number = (int)$this->jobs[$key]['number'];

        $this->calculateMultipleEmployeeTotals($key, $number);

        $sellingCost = max((float)$this->jobs[$key]['selling_cost'], 1);
        $totalCosts = round((float)$this->jobs[$key]['total_indirect_cost'] - $sellingCost, 2);
        $netProfit = round($sellingCost - $totalCosts, 2);

        $this->jobs[$key]['total_costs'] = $totalCosts;
        $this->jobs[$key]['net_profit'] = $netProfit;
        $this->jobs[$key]['selling_cost'] = $sellingCost;
        $this->jobs[$key]['profit_percentage'] = $netProfit ? ceil($netProfit / $sellingCost * 100) : 0;
    }

    private function calculateMultipleEmployeeTotals(string $key, int $number): void
    {
        $fields = [
            'total_indirect_cost' => 'total_indirect_for_number',
            'net_profit' => 'total_net_profit_for_number',
            'total_salary' => 'total_salary_for_number',
            'total_costs' => 'total_costs_for_number'
        ];

        foreach ($fields as $source => $target) {
            $this->jobs[$key][$target] = round((float)$this->jobs[$key][$source] * $number, 2);
        }
    }


    public function changeStatus($status): void
    {
        $this->price_quotation->update([
            'status' => $status
        ]);
        $this->dispatch('alert', message: 'تم التعديل بنجاح', type: 'success');
    }

    public function submit(): void
    {
        $this->price_quotation->update([
            'special_requirements' => $this->special_requirements,
            'special_requirements_en' => $this->special_requirements_en,
            'items_contract' => $this->items_contract,
            'items_en' => $this->items_en,
            'items_two_contract' => $this->items_two_contract,
            'items_two_en' => $this->items_two_en,


            'band_ar_1' => $this->band_ar_1,
            'band_en_1' => $this->band_en_1,
            'band_ar_2' => $this->band_ar_2,
            'band_en_2' => $this->band_en_2,
            'band_ar_3' => $this->band_ar_3,
            'band_en_3' => $this->band_en_3,
            'band_ar_4' => $this->band_ar_4,
            'band_en_4' => $this->band_en_4,
            'band_ar_5' => $this->band_ar_5,
            'band_en_5' => $this->band_en_5,
            'band_ar_6' => $this->band_ar_6,
            'band_en_6' => $this->band_en_6,
            'band_ar_7' => $this->band_ar_7,
            'band_en_7' => $this->band_en_7,
            'band_ar_8' => $this->band_ar_8,
            'band_en_8' => $this->band_en_8,
            'band_ar_9' => $this->band_ar_9,
            'band_en_9' => $this->band_en_9,
            'band_ar_10' => $this->band_ar_10,
            'band_en_10' => $this->band_en_10,
            'band_ar_11' => $this->band_ar_11,
            'band_en_11' => $this->band_en_11,
            'band_ar_12' => $this->band_ar_12,
            'band_en_12' => $this->band_en_12,
            'band_ar_13' => $this->band_ar_13,
            'band_en_13' => $this->band_en_13,
            'band_ar_14' => $this->band_ar_14,
            'band_en_14' => $this->band_en_14,
        ]);
        $this->price_quotation->jobs()->delete();
        $this->price_quotation->jobs()->createMany($this->jobs);
        $this->redirect(route('admin.prices.show',  ['price_quotation' => $this->price_quotation->id, 'lang' => 'ar', 'contract' => 'lang']));
    }

    public function addMessage(): void
    {
        $this->validate([
            'message' => 'required',
        ], [
            'message.required' => 'حقل الرسالة مطلوب'
        ]);
        $message = $this->price_quotation->messages()->create([
            'user_id' => auth()->id(),
            'content' => $this->message,
        ]);
        event(new NewPriceMessage($message));
        $this->reset('message');
    }

    public function loadMessages()
    {
        $this->dispatch('$refresh');
        $this->dispatch('scrollToBottom');
    }




    public function render()
    {
        $messages = PriceQuotationMessage::where('price_quotation_id', $this->price_quotation->id)
            ->get();
        return view('livewire.price-quotations-chat-edite-contract', compact('messages'))->extends('admin.layouts.admin')->section('content');
    }
}