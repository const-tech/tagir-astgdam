<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CostCenter extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function subCenters()
    {
        return $this->hasMany(CostCenter::class, 'parent_id');
    }

    public static function parents()
    {
        return self::whereNull('parent_id')->get();
    }

    public function main()
    {
        return $this->belongsTo(CostCenter::class, 'parent_id');
    }


    public function accounts()
    {
        return $this->hasMany(VoucherAccount::class);
    }
}
