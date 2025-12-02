<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdministrativeStructure extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function parent()
    {
        return $this->belongsTo(AdministrativeStructure::class, 'parent_id');
    }
}