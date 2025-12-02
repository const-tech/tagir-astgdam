<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PriceQuotationJob extends Model
{
    use HasFactory;
    protected $guarded =['id'];

    public function priceQuotation(): BelongsTo
    {
        return $this->belongsTo(PriceQuotation::class);
    }
}
