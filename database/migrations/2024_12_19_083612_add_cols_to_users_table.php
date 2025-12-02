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
            $table->string('national_address')->nullable();
            $table->string('file_national_address')->nullable();
            $table->string('manager_identity')->nullable();
            $table->string('file_manager_identity')->nullable();
            // $table->string('commercial_register')->nullable();
            $table->string('file_commercial_register')->nullable();
            $table->string('vat_certificate')->nullable();
            $table->string('file_vat_certificate')->nullable();
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