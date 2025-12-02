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
            for ($x = 1; $x < 15; $x++) {
                $table->longText("band_ar_$x")->nullable();
                $table->longText("band_en_$x")->nullable();
            }
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