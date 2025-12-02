<?php

use App\Models\VoucherAccount;
use Illuminate\Support\Facades\Storage;

function store_file($file, $path)
{
    $name = time() . $file->getClientOriginalName();
    return $value = $file->storeAs($path, $name, 'uploads');
}
function delete_file($file)
{
    if ($file != '' and !is_null($file) and Storage::disk('uploads')->exists($file)) {
        unlink('uploads/' . $file);
    }
}
function display_file($name)
{
    return asset('uploads') . '/' . $name;
}


function generateNextChildAccount($parentAccountNumber, $existingChildAccounts = [])
{
    $maxChildNumber = 0;
    foreach ($existingChildAccounts as $childAccount) {
        if (strpos($childAccount, $parentAccountNumber) === 0) {
            $childSuffix = intval(substr($childAccount, strlen($parentAccountNumber)));
            if ($childSuffix > $maxChildNumber) {
                $maxChildNumber = $childSuffix;
            }
        }
    }

    $nextChildNumber = $maxChildNumber + 1;

    $newChildAccountNumber = $parentAccountNumber . $nextChildNumber;

    return $newChildAccountNumber;
}


function calculateBalance($account, $from, $to)
{
    $array_of_accounts = [];
    collectAccountIds($account, $array_of_accounts);
    $voucher_accounts = VoucherAccount::whereIn('account_id', $array_of_accounts)
        ->whereHas('voucher', function ($query) use ($from, $to) {
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

    return number_format($voucher_accounts->sum('debit') - $voucher_accounts->sum('credit'), 2);
}

function collectAccountIds($asset, &$array_of_accounts)
{
    $array_of_accounts[] = $asset->id;

    foreach ($asset->subAssets as $subAsset) {
        collectAccountIds($subAsset, $array_of_accounts);
    }
}
