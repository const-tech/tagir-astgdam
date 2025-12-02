<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PriceQuotationRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'vacation' => ['nullable'],
            'selling_cost' => ['nullable', 'numeric'],
            'salary' => ['nullable', 'numeric'],
            'housing_allowance' => ['nullable', 'numeric'],
            'transportation_allowance' => ['nullable', 'numeric'],
            'other_allowance' => ['nullable', 'numeric'],
            'total_salary' => ['nullable', 'numeric'],
            'iqama' => ['nullable', 'numeric'],
            'saudization' => ['nullable', 'numeric'],
            'vacation_days' => ['nullable', 'integer'],
            'vacation_cost' => ['nullable', 'numeric'],
            'vacation_ticket_cost' => ['nullable', 'numeric'],
            'misclenious' => ['nullable', 'numeric'],
            'total_costs' => ['nullable', 'numeric'],
            'net_profit' => ['nullable', 'numeric'],
            'profit_percentage' => ['nullable', 'numeric'],
            'status' => ['nullable', 'numeric'],
            'manager_id' => ['nullable'],
            'medical_insurance' => ['nullable', 'numeric'],
            'end_of_service_cost' => ['nullable', 'numeric'],
            'end_of_service_ticket_cost' => ['nullable', 'numeric'],
            'total_indirect_cost' => ['nullable', 'numeric'],
            'food_allowance' => ['nullable'],
            'labor_card' => ['nullable', 'numeric'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
