<?php

namespace App\Models;

use App\Traits\EmployeeTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Voucher extends Model
{
    use HasFactory, EmployeeTrait;

    protected $fillable = ['description', 'name', 'date', 'employee_id', 'last_update', 'type'];

    public function accounts()
    {
        return $this->hasMany(VoucherAccount::class);
    }

    public function getCreditAttribute()
    {
        return $this->accounts->sum('credit');
    }

    public function getDebitAttribute()
    {
        return $this->accounts->sum('debit');
    }

    public function last_user()
    {
        return $this->belongsTo(User::class, 'last_update');
    }

    public function employee()
    {
        return $this->belongsTo(User::class, 'employee_id');
    }
}
