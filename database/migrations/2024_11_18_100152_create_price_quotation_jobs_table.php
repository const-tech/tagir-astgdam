<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('price_quotation_jobs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('price_quotation_id')->constrained('price_quotations')->cascadeOnDelete();

            $table->string('job_title')->nullable();
            $table->string('work_location')->nullable();
            $table->string('contract_duration')->nullable();
            $table->integer('number')->nullable();
            $table->text('notes')->nullable();


            $table->string('vacation')->nullable();
            $table->double('selling_cost')->nullable();
            $table->double('salary')->nullable();
            $table->double('housing_allowance')->nullable();
            $table->double('food_allowance')->nullable();
            $table->double('transportation_allowance')->nullable();
            $table->double('other_allowance')->nullable();
            $table->double('visa_cost')->nullable();

            $table->double('total_salary')->nullable();
            $table->double('total_salary_for_number')->nullable();

            $table->double('iqama')->nullable();
            $table->double('saudization')->nullable();
            $table->integer('vacation_days')->nullable();
            $table->double('vacation_cost')->nullable();
            $table->double('labor_card')->nullable();
            $table->double('driver_card')->nullable();

            $table->boolean('enable_health_card')->default(false);
            $table->double('health_card')->nullable();

            $table->boolean('enable_driving_license')->default(false);
            $table->double('driving_license')->nullable();

            $table->double('vacation_ticket_cost')->nullable();
            $table->double('misclenious')->nullable();

            $table->double('total_costs')->nullable();
            $table->double('total_costs_for_number')->nullable();

            $table->string('medical_insurance_age')->nullable();
            $table->double('medical_insurance')->nullable();

            $table->double('end_of_service_cost')->nullable();
            $table->double('end_of_service_ticket_cost')->nullable();

            $table->double('net_profit')->nullable();
            $table->double('total_net_profit_for_number')->nullable();


            $table->boolean('enable_ajeer')->default(false);
            $table->double('ajeer')->nullable();


            $table->double('total_indirect_cost')->nullable();
            $table->double('total_indirect_for_number')->nullable();

            $table->double('profit_percentage')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('price_quotation_jobs');
    }
};
