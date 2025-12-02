<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $appends =['human_diff'];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    protected function HumanDiff(): Attribute
    {
        return Attribute::make(
            get: fn($value, array $attributes) => $this->created_at?->diffForHumans(),
        );
    }
}
