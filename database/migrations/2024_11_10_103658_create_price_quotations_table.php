<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('price_quotations', function (Blueprint $table) {
            $table->id();
            $table->string('client_name');
            $table->string('client_phone')->nullable();
            $table->string('vacation')->nullable();
            $table->double('selling_cost')->nullable();
            $table->double('salary')->nullable();
            $table->double('housing_allowance')->nullable();
            $table->double('food_allowance')->nullable();
            $table->double('transportation_allowance')->nullable();
            $table->double('other_allowance')->nullable();
            $table->double('total_salary')->nullable();
            $table->double('iqama')->nullable();
            $table->double('saudization')->nullable();
            $table->integer('vacation_days')->nullable();
            $table->double('vacation_cost')->nullable();
            $table->double('labor_card')->nullable();
            $table->double('health_card')->nullable();
            $table->double('driving_license')->nullable();
            $table->double('vacation_ticket_cost')->nullable();
            $table->double('misclenious')->nullable();
            $table->double('total_costs')->nullable();
            $table->double('medical_insurance')->nullable();
            $table->double('end_of_service_cost')->nullable();
            $table->double('end_of_service_ticket_cost')->nullable();
            $table->double('net_profit')->nullable();
            $table->double('ajeer')->nullable();
            $table->double('total_indirect_cost')->nullable();
            $table->double('profit_percentage')->nullable();
            $table->enum('status',['pending','accepted','finished','canceled'])->default('pending');
            $table->foreignId('manager_id')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('price_quotations');
    }
};
