<?php

namespace App\Livewire;

use App\Events\NewPriceMessage;
use App\Models\PriceQuotation;
use App\Models\PriceQuotationMessage;
use Livewire\Component;

class PriceQuotationsChatEdite extends Component
{
    public $jobs = [];
    public $price_quotation;
    // chat
    public $message;
    public $special_requirements;
    public $special_requirements_en;
    public $items;
    public $items_en;
    public $items_two;
    public $items_two_en;
    public $item_1;
    public $item_2;
    public $item_3;
    public $item_4;
    public $item_5;
    public $item_6;
    public $item_7;
    public $item_8;
    public $item_9;
    public $item_10;
    public $item_11;
    public $item_12;
    public $item_13;
    public $item_14;

    public $head_ar;
    public $head_en;
    public $head;

    public $band_ar_32;
    public $band_en_32;


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
        $this->head_ar = $price_quotation->head_ar ?? '2) شركة ------------------- سجل تجاري رقم---------------وعنوانها- ---------------------- الرمز البريدي -------ويمثلها في هذا العقد الاستاذ – -------------------- هويه وطنيه رقم ------------------- بصفته – الرئيس التنفيذي بريد الكتروني---------------- رقم للجوال ------------- ويُشار إليهم فيما بعد بـ (الطرف الثاني).';
        $this->head_en = $price_quotation->head_en ?? '2) Company--------------- CR------ address ---------------- Postal Code ------and represented in this contract by ----------- ID----------as he the managing partner represented in this contract as( second party)';
        $this->head = $price_quotation->head ?? 'شركة Similique eius moles سجل تجاري رقم---------------وعنوانها- ---------------------- الرمز البريدي -------ويمثلها في هذا العقد الاستاذ – -------------------- هويه وطنيه رقم ------------------- بصفته – الرئيس التنفيذي بريد الكتروني---------------- رقم للجوال Quia aut iste recusa ويُشار إليهم فيما بعد بـ (الطرف الثاني).';
        $this->special_requirements = $price_quotation->special_requirements ?? 'السعر لايشمل ضريبة القيمه المضافة';
        $this->special_requirements_en = $price_quotation->special_requirements_en ?? 'The price does not include value added tax';

        $default_items = config()->get('price-quotation.items');
        foreach ($default_items as $key =>$value) {
            $this->$key = $price_quotation->$key ?? $value;
        }


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
            'items' => $this->items ?? setting('items'),
            'items_en' => $this->items_en ?? setting('items_en'),
            'items_two' => $this->items_two ?? setting('items_two'),
            'items_two_en' => $this->items_two_en ?? setting('items_two_en'),
            'item_1' => $this->item_1,
            'item_2' => $this->item_2,
            'item_3' =>  $this->item_3,
            'item_4' => $this->item_4,
            'item_5' => $this->item_5,
            'item_6' =>  $this->item_6,
            'item_7' =>  $this->item_7,
            'item_8' =>  $this->item_8,
            'item_9' =>  $this->item_9,
            'item_10' =>  $this->item_10,
            'item_11' =>   $this->item_11,
            'item_12' =>  $this->item_12,
            'item_13' =>   $this->item_13,
            'item_14' =>   $this->item_14,
            'head_en' => $this->head,
        ]);
        $this->price_quotation->jobs()->delete();
        $this->price_quotation->jobs()->createMany($this->jobs);
        $this->redirect(route('admin.prices.show', ['price_quotation' => $this->price_quotation->id, 'lang' => 'ar', 'contract' => 'ar']));
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
        return view('livewire.price-quotations-chat-edite', compact('messages'))->extends('admin.layouts.admin')->section('content');
    }
}
