<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('price_quotations', function (Blueprint $table) {
            $table->dropColumn(
                'vacation',
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
            );
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('price_quotations', function (Blueprint $table) {
            //
        });
    }
};
