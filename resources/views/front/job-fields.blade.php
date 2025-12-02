<div class="col-12">
    @if($loop->iteration > 1)
        <button class="btn btn-sm btn-outline-danger mb-3" @click="$wire.removeJob({{$key}})">ازالة المسمى الوظيفى
        </button>
    @endif
    <div class="row g-3">
        <div class="col-12 col-md-6">
            <label for="" class="small-label">
                المسمى الوظيفي
                -
                job title
            </label>
            <input type="text" wire:model="jobs.{{$key}}.job_title" id="job_title{{$key}}" class="form-control">
        </div>
        <div class="col-12 col-md-6">
            <label for="" class="small-label">
                موقع العمل
                -
                work location
            </label>
            <input type="text" wire:model="jobs.{{$key}}.work_location" id="work_location{{$key}}" class="form-control">
        </div>
        <div class="col-12 col-md-6">
            <label for="" class="small-label">
                العدد
                -
                number
            </label>
            <input type="text" wire:model="jobs.{{$key}}.number" oninput="onlyNumbers(event)" id="number{{$key}}"
                   class="form-control">
        </div>
        <div class="col-12 col-md-6">
            <label for="" class="small-label">
                مدة التعاقد
                -
                contract duration
            </label>
            <input type="text" wire:model="jobs.{{$key}}.contract_duration" id="contract_duration{{$key}}"
                   class="form-control">
        </div>
        <div class="col-12 col-md-6">
            <label for="" class="small-label">
                ملاحظات
                -
                notes
            </label>
            <input type="text" wire:model="jobs.{{$key}}.notes" id="notes{{$key}}" class="form-control">
        </div>
        <div class="col-12 col-md-6">
            <label for="" class="small-label">
                الاجازة
                -
                Vacation
            </label>
            <select wire:model.live="jobs.{{$key}}.vacation"
                    wire:change="calculateAllForItem({{$key}})"
                    class="form-control">
                <option value="">حدد الاجازة</option>
                <option value="one_year">سنه</option>
                <option value="two_years">سنتين</option>
            </select>

        </div>
        <div class="col-12 col-md-6">
            <label for="" class="small-label">
                سعر البيع
                -
                Selling cost
            </label>
            <input type="text" wire:change="calculateAllForItem({{$key}})" oninput="onlyNumbers(event)"
                   wire:model="jobs.{{$key}}.selling_cost" id="selling_cost{{$key}}"
                   class="form-control">
        </div>
        <div class="col-12 col-md-6">
            <label for="" class="small-label">
                الراتب
                -
                Salary
            </label>
            <input type="text" oninput="onlyNumbers(event)" wire:change="calculateAllForItem({{$key}})"
                   wire:model="jobs.{{$key}}.salary" id="salary{{$key}}" class="form-control">
        </div>
        <div class="col-12 col-md-6">
            <label for="" class="small-label">
                بدل السكن
                -
                Housing allowance
            </label>
            <input type="text" oninput="onlyNumbers(event)" wire:change="calculateAllForItem({{$key}})"
                   wire:model="jobs.{{$key}}.housing_allowance" id="housing_allowance{{$key}}"
                   class="form-control">
        </div>
        <div class="col-12 col-md-6">
            <label for="" class="small-label">
                بدل المواصلات
                -
                Asportation allowance
            </label>
            <input type="text" oninput="onlyNumbers(event)" wire:change="calculateAllForItem({{$key}})"
                   wire:model="jobs.{{$key}}.transportation_allowance" id="transportation_allowance{{$key}}"
                   class="form-control">
        </div>
        <div class="col-12 col-md-6">
            <label for="" class="small-label">
                بدل طعام
                -
                Food allowance
            </label>
            <input type="text" oninput="onlyNumbers(event)" wire:change="calculateAllForItem({{$key}})"
                   wire:model="jobs.{{$key}}.food_allowance" id="food_allowance{{$key}}"
                   class="form-control">
        </div>
        <div class="col-12 col-md-6">
            <label for="" class="small-label">
                بدلات أخري
                -
                Other allowance
            </label>
            <input type="text" oninput="onlyNumbers(event)" wire:change="calculateAllForItem({{$key}})"
                   wire:model="jobs.{{$key}}.other_allowance" id="other_allowance{{$key}}"
                   class="form-control">
        </div>
        <div class="col-12 col-md-6">
            <label for="" class="small-label">
                إجمالي الراتب
                -
                Total salary
            </label>
            <input disabled type="text" wire:change="calculateAllForItem({{$key}})"
                   wire:model="jobs.{{$key}}.total_salary" id="total_salary{{$key}}"
                   class="form-control">
        </div>
        <div class="col-12 col-md-6">
            <label for="" class="small-label">
                الإقامة
                -
                Iqama
            </label>
            <input type="text" disabled
                   wire:model="jobs.{{$key}}.iqama"
                   id="iqama{{$key}}"
                   class="form-control"
            >
        </div>
        <div class="col-12 col-md-6">
            <label for="" class="small-label">
                كارت العمل
                -
                Labor cart
            </label>
            <input type="text" disabled wire:model="jobs.{{$key}}.labor_card" id="labor_card{{$key}}"
                   class="form-control">
        </div>
        <div class="col-12 col-md-6">
            <label for="" class="small-label">
                تفعيل أجير
                -
                Enable Ajeer
            </label>
            <select wire:model="jobs.{{$key}}.enable_ajeer"
                    wire:change="calculateAllForItem({{$key}})"
                    class="form-control">
                <option value="0">لا - No</option>
                <option value="1">نعم - Yes</option>
            </select>
        </div>

        @if(isset($jobs[$key]['enable_ajeer']) && $jobs[$key]['enable_ajeer'])
            <div class="col-12 col-md-6">
                <label for="" class="small-label">
                    أجير
                    -
                    Ajeer
                </label>
                <input type="text"
                       disabled
                       oninput="onlyNumbers(event)"
                       wire:change="calculateAllForItem({{$key}})"
                       wire:model="jobs.{{$key}}.ajeer"
                       id="ajeer{{$key}}"
                       class="form-control">
            </div>
        @endif
        <div class="col-12 col-md-6">
            <label for="" class="small-label">
                تفعيل الكارت الصحي
                -
                Enable Health card
            </label>
            <select wire:model.live="jobs.{{$key}}.enable_health_card" class="form-control">
                <option value="0">لا - No</option>
                <option value="1">نعم - Yes</option>
            </select>
        </div>

        @if(isset($jobs[$key]['enable_health_card']) && $jobs[$key]['enable_health_card'])
            <div class="col-12 col-md-6">
                <label for="" class="small-label">
                    الكارت الصحي
                    -
                    Health card
                </label>
                <input type="text" wire:change="calculateAllForItem({{$key}})" oninput="onlyNumbers(event)"
                       wire:model="jobs.{{$key}}.health_card" id="health_card{{$key}}"
                       class="form-control">
            </div>
        @endif

        <div class="col-12 col-md-6">
            <label for="" class="small-label">
                تفعيل رخصة القيادة
                -
                Enable Driving licence
            </label>
            <select wire:model.live="jobs.{{$key}}.enable_driving_license" class="form-control">
                <option value="0">لا - No</option>
                <option value="1">نعم - Yes</option>
            </select>
        </div>

        @if(isset($jobs[$key]['enable_driving_license']) && $jobs[$key]['enable_driving_license'])
            <div class="col-12 col-md-6">
                <label for="" class="small-label">
                    رخصة القيادة
                    -
                    Driving licence
                </label>
                <input type="text" wire:change="calculateAllForItem({{$key}})" oninput="onlyNumbers(event)"
                       wire:model="jobs.{{$key}}.driving_license" id="driving_license{{$key}}"
                       class="form-control">
            </div>
        @endif

        <div class="col-12 col-md-6">
            <label for="" class="small-label">
                بطاقة سائق
                -
                Driving card
            </label>
            <input type="text" wire:change="calculateAllForItem({{$key}})" oninput="onlyNumbers(event)"
                   wire:model="jobs.{{$key}}.driver_card" id="driver_card{{$key}}"
                   class="form-control">
        </div>
        <div class="col-12 col-md-6">
            <label for="" class="small-label">
                التأمين الطبي
                -
                Medical insurance
            </label>
            <input type="text" wire:change="calculateAllForItem({{$key}})" oninput="onlyNumbers(event)"
                   wire:model="jobs.{{$key}}.medical_insurance" id="medical_insurance{{$key}}"
                   class="form-control">
        </div>
        <div class="col-12 col-md-6">
            <label for="" class="small-label">
                السعودة
                -
                Saudization
            </label>
            <input type="text" wire:change="calculateAllForItem({{$key}})"

                   oninput="onlyNumbers(event)" wire:model="jobs.{{$key}}.saudization" id="saudization{{$key}}"
                   class="form-control">
        </div>
        <div class="col-12 col-md-6">
            <label for="" class="small-label">
                تكلفة التاشيرة
                -
                Visa Cost
            </label>
            <input type="text"
                   disabled
                   wire:model="jobs.{{$key}}.visa_cost" oninput="onlyNumbers(event)" id="visa_cost{{$key}}"
                   class="form-control">
        </div>
        <div class="col-12 col-md-6">
            <label for="" class="small-label">
                أيام الأجازة
                -
                Vacation days
            </label>
            <input type="number" min="0"
                   wire:model="jobs.{{$key}}.vacation_days" id="vacation_days{{$key}}"
                   disabled
                   class="form-control">
        </div>
        <div class="col-12 col-md-6">
            <label for="" class="small-label">
                تكلفة الأجازة
                -
                Vacation cost
            </label>
            <input type="text"
                   wire:model="jobs.{{$key}}.vacation_cost"
                   oninput="onlyNumbers(event)"
                   disabled
                   id="vacation_cost{{$key}}"
                   class="form-control">
        </div>
        <div class="col-12 col-md-6">
            <label for="" class="small-label">
                تكلفة التذكرة الأجازة
                -
                Cost of vacation ticket
            </label>
            <input type="text"
                   wire:change="calculateAllForItem({{$key}})"
                   disabled
                   wire:model="jobs.{{$key}}.vacation_ticket_cost" id="vacation_ticket_cost{{$key}}"
                   class="form-control">
        </div>
        <div class="col-12 col-md-6">
            <label for="" class="small-label">
                نهاية الخدمة
                -
                End of service
            </label>
            <input type="text"
                   disabled
                   wire:model="jobs.{{$key}}.end_of_service_cost" id="end_of_service_cost{{$key}}"
                   class="form-control">
        </div>
        <div class="col-12 col-md-6">
            <label for="" class="small-label">
                تذكرة نهاية الخدمة
                -
                Ticket for end of service
            </label>
            <input type="text"
                  disabled
                   oninput="onlyNumbers(event)"
                   wire:model="jobs.{{$key}}.end_of_service_ticket_cost"
                   id="end_of_service_ticket_cost{{$key}}"
                   class="form-control">
        </div>
        <div class="col-12 col-md-6">
            <label for="" class="small-label">
                نثريات
                -
                Misclenious
            </label>
            <input type="text"
                   disabled
                   oninput="onlyNumbers(event)"
                   wire:model="jobs.{{$key}}.misclenious"
                   id="misclenious{{$key}}"
                   class="form-control">
        </div>
        <div class="col-12 col-md-6">
            <label for="" class="small-label">
                إجمالي التكلفة الغير مباشرة للفرد
                -
                Total indirect costs
            </label>
            <input disabled type="text" wire:change="calculateAllForItem({{$key}})"
                   wire:model="jobs.{{$key}}.total_indirect_cost" id="total_indirect_cost{{$key}}"
                   class="form-control">
        </div>
        <div class="col-12 col-md-6">
            <label for="" class="small-label">
                إجمالي التكلفة الغير مباشرة للعدد المطلوب
                -
                Total indirect costs for number
            </label>
            <input type="text"
                   disabled
                   wire:model="jobs.{{$key}}.total_indirect_for_number" id="total_indirect_for_number{{$key}}"
                   class="form-control">
        </div>

        <div class="col-12 col-md-6">
            <label for="" class="small-label">
                إجمالي التكلفة
                -
                Total costs
            </label>
            <input type="text"
                   wire:model="jobs.{{$key}}.total_costs" id="total_costs{{$key}}" disabled
                   class="form-control">
        </div>
        <div class="col-12 col-md-6">
            <label for="" class="small-label">
                إجمالي التكلفة للعدد المطلوب
                -
                Total costs for number
            </label>
            <input type="text"
                   wire:model="jobs.{{$key}}.total_costs_for_number" id="total_costs_for_number{{$key}}" disabled
                   class="form-control">
        </div>

        <div class="col-12 col-md-6">
            <label for="" class="small-label">
                صافي الربح
                -
                Net profit
            </label>
            <input type="text" wire:change="calculateAllForItem({{$key}})" wire:model="jobs.{{$key}}.net_profit"
                   id="net_profit{{$key}}" disabled
                   class="form-control">
        </div>

        <div class="col-12 col-md-6">
            <label for="" class="small-label">
                صافي الربح للعدد المطلوب
                -
                Net profit fo number
            </label>
            <input type="text" wire:model="jobs.{{$key}}.total_net_profit_for_number"
                   id="total_net_profit_for_number{{$key}}" disabled
                   class="form-control">
        </div>

        <div class="col-12 col-md-6">
            <label for="" class="small-label">
                اجمالي الراتب للعدد المطلوب
                -
                Total salary for number
            </label>
            <input type="text" wire:model="jobs.{{$key}}.total_salary_for_number" id="total_salary_for_number{{$key}}"
                   disabled
                   class="form-control">
        </div>

        <div class="col-12 col-md-6">
            <label for="" class="small-label">
                نسبة الربح للعدد المطلوب %
                -
                Profit %
            </label>
            <input type="text" wire:change="calculateAllForItem({{$key}})" wire:model="jobs.{{$key}}.profit_percentage"
                   id="profit_percentage{{$key}}" disabled
                   class="form-control">
        </div>
    </div>

</div>
