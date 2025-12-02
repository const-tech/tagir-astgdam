<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PriceQuotationMessage extends Model
{
    protected $fillable = [
        'price_quotation_id',
        'user_id',
        'content',
    ];

    public function priceQuotation(): BelongsTo
    {
        return $this->belongsTo(PriceQuotation::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
