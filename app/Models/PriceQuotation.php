<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PriceQuotation extends Model
{
    protected $fillable = [
        'client_id',
        'selling_cost',
        'salary',
        'housing_allowance',
        'food_allowance',
        'transportation_allowance',
        'other_allowance',
        'total_salary',
        'iqama',
        'saudization',
        'vacation_days',
        'vacation_cost',
        'labor_card',
        'health_card',
        'driving_license',
        'vacation_ticket_cost',
        'misclenious',
        'total_costs',
        'medical_insurance',
        'end_of_service_cost',
        'end_of_service_ticket_cost',
        'net_profit',
        'ajeer',
        'total_indirect_cost',
        'profit_percentage',
        'status',
        'manager_id',
        'special_requirements_en',
        'special_requirements',
        'items',
        'items_two',
        'items_en',
        'items_two_en',
        'items_contract',
        'items_two_contract',
        'head_ar',
        'head_en',
        'head',
        'band_ar_32',
        'band_en_32',
        'created_by',
        'created_by_phone'
    ];

    public function manager(): BelongsTo
    {
        return $this->belongsTo(User::class, 'manager_id');
    }

    public function jobs(): HasMany
    {
        return $this->hasMany(PriceQuotationJob::class, 'price_quotation_id');
    }

    public function client(): BelongsTo
    {
        return $this->belongsTo(User::class,'client_id');
    }
    public function messages(): HasMany
    {
        return $this->hasMany(PriceQuotationMessage::class, 'price_quotation_id');
    }
}
