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
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('health_card')->nullable();
            $table->date('start_health_card')->nullable();
            $table->date('end_health_card')->nullable();

            $table->boolean('driver_card')->nullable();
            $table->date('start_driver_card')->nullable();
            $table->date('end_driver_card')->nullable();

            $table->boolean('is_employee')->nullable();
            $table->date('start_is_employee')->nullable();
            $table->date('end_is_employee')->nullable();

            $table->boolean('resident')->nullable();
            $table->date('start_resident')->nullable();
            $table->date('end_resident')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};