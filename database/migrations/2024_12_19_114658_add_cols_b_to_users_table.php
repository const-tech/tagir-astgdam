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
            $table->string('file_end_id_number')->nullable();
            $table->string('file_end_insurance')->nullable();
            $table->string('file_end_passport')->nullable();
            $table->string('file_health_card')->nullable();
            $table->string('file_is_employee')->nullable();
            $table->string('file_resident')->nullable();
            $table->string('file_driver_card')->nullable();
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