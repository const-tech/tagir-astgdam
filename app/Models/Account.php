<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Account extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'parent_id', 'account_no', 'balance_type', 'type'];

    protected $appends = ['balance'];

    public function parent()
    {
        return $this->belongsTo(Account::class, 'parent_id');
    }

    public function subAssets()
    {
        return $this->hasMany(Account::class, 'parent_id')->orderByRaw('CAST(account_no AS UNSIGNED)');
    }

    public static function parents()
    {
        return self::whereNull('parent_id')->get();
    }

    public function accounts()
    {
        return $this->hasMany(VoucherAccount::class);
    }

    public function getBalanceAttribute()
    {
        $array_of_accounts = [];

        $this->collectAccountIds($this, $array_of_accounts);

        $voucher_accounts = VoucherAccount::whereIn('account_id', $array_of_accounts)->get();

        $balance = $voucher_accounts->sum($this->balance_type == 'debit' ? 'debit' : 'credit') - $voucher_accounts->sum($this->balance_type == 'debit' ? 'credit' : 'debit');

        return $balance;
    }

    private function collectAccountIds($asset, &$array_of_accounts)
    {
        $array_of_accounts[] = $asset->id;

        if ($asset->subAssets->isNotEmpty()) {
            foreach ($asset->subAssets as $subAsset) {
                $this->collectAccountIds($subAsset, $array_of_accounts);
            }
        }
    }

    public function getAccountBalance($from = null, $to = null)
    {
        $array_of_accounts = [];

        $this->collectAccountIds($this, $array_of_accounts);

        $voucher_accounts = VoucherAccount::whereIn('account_id', $array_of_accounts)->whereHas('voucher', function ($query) use ($from, $to) {
            if ($from && $to) {
                $query->whereBetween('date', [$from, $to]);
            } elseif ($from) {
                $query->where('date', '>=', $from);
            } elseif ($to) {
                $query->where('date', '<=', $to);
            } else {
                $query;
            }
        })->get();

        $balance = $voucher_accounts->sum($this->balance_type == 'debit' ? 'debit' : 'credit') -
            $voucher_accounts->sum($this->balance_type == 'debit' ? 'credit' : 'debit');

        return $balance;
    }
}
