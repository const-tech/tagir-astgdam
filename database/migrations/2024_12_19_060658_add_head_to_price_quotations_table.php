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
        Schema::table('price_quotations', function (Blueprint $table) {
            $table->text('head_ar')->nullable();
            $table->text('head_en')->nullable();
            $table->text('head')->nullable();
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