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
            $table->string('id_number')->nullable();
            $table->date('end_id_number')->nullable();
            $table->date('end_work')->nullable();
            $table->date('end_passport')->nullable();
            $table->date('end_insurance')->nullable();
            $table->string('address')->nullable();
            $table->string('bank_account')->nullable();
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