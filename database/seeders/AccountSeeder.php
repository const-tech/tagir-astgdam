<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Account;
use Illuminate\Support\Facades\DB;

class AccountSeeder extends Seeder
{
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Clear existing accounts
        Account::truncate();

        // Assets (الأصول) - DEBIT type
        $assets = Account::create([
            'name' => 'الأصول',
            'account_no' => '1',
            'balance_type' => 'debit',
        ]);

        // Current Assets (الأصول المتداولة)
        $currentAssets = Account::create([
            'name' => 'الأصول المتداولة',
            'account_no' => '11',
            'balance_type' => 'debit',
            'parent_id' => $assets->id,
        ]);

        $cashAccounts = [
            ['name' => 'النقد في الصندوق', 'account_no' => '111'],
            ['name' => 'البنك حساب جاري', 'account_no' => '112'],
            ['name' => 'البنك ودائع', 'account_no' => '113'],
        ];

        foreach ($cashAccounts as $account) {
            Account::create([
                'name' => $account['name'],
                'account_no' => $account['account_no'],
                'balance_type' => 'debit',
                'parent_id' => $currentAssets->id,
            ]);
        }

        // Liabilities (الخصوم) - CREDIT type
        $liabilities = Account::create([
            'name' => 'الخصوم',
            'account_no' => '2',
            'balance_type' => 'credit',
        ]);

        $currentLiabilities = Account::create([
            'name' => 'الخصوم المتداولة',
            'account_no' => '21',
            'balance_type' => 'credit',
            'parent_id' => $liabilities->id,
        ]);

        $liabilityAccounts = [
            ['name' => 'حسابات الموردين', 'account_no' => '211'],
            ['name' => 'أوراق الدفع', 'account_no' => '212'],
            ['name' => 'مصروفات مستحقة', 'account_no' => '213'],
        ];

        foreach ($liabilityAccounts as $account) {
            Account::create([
                'name' => $account['name'],
                'account_no' => $account['account_no'],
                'balance_type' => 'credit',
                'parent_id' => $currentLiabilities->id,
            ]);
        }

        // Equity (حقوق الملكية) - CREDIT type
        $equity = Account::create([
            'name' => 'حقوق الملكية',
            'account_no' => '3',
            'balance_type' => 'credit',
        ]);

        $equityAccounts = [
            ['name' => 'رأس المال', 'account_no' => '31'],
            ['name' => 'الاحتياطي القانوني', 'account_no' => '32'],
            ['name' => 'الأرباح المحتجزة', 'account_no' => '33'],
        ];

        foreach ($equityAccounts as $account) {
            Account::create([
                'name' => $account['name'],
                'account_no' => $account['account_no'],
                'balance_type' => 'credit',
                'parent_id' => $equity->id,
            ]);
        }

        // Revenue (الإيرادات) - CREDIT type
        $revenues = Account::create([
            'name' => 'الإيرادات',
            'account_no' => '4',
            'balance_type' => 'credit',
        ]);

        $revenueAccounts = [
            ['name' => 'إيرادات المبيعات', 'account_no' => '41'],
            ['name' => 'إيرادات الخدمات', 'account_no' => '42'],
            ['name' => 'إيرادات أخرى', 'account_no' => '43'],
        ];

        foreach ($revenueAccounts as $account) {
            Account::create([
                'name' => $account['name'],
                'account_no' => $account['account_no'],
                'balance_type' => 'credit',
                'parent_id' => $revenues->id,
            ]);
        }

        // Expenses (المصروفات) - DEBIT type
        $expenses = Account::create([
            'name' => 'المصروفات',
            'account_no' => '5',
            'balance_type' => 'debit',
        ]);

        $expenseAccounts = [
            ['name' => 'الرواتب والأجور', 'account_no' => '51'],
            ['name' => 'الإيجارات', 'account_no' => '52'],
            ['name' => 'الكهرباء والمياه', 'account_no' => '53'],
            ['name' => 'مصاريف الصيانة', 'account_no' => '54'],
            ['name' => 'مصاريف التسويق', 'account_no' => '55'],
        ];

        foreach ($expenseAccounts as $account) {
            Account::create([
                'name' => $account['name'],
                'account_no' => $account['account_no'],
                'balance_type' => 'debit',
                'parent_id' => $expenses->id,
            ]);
        }
    }
}
