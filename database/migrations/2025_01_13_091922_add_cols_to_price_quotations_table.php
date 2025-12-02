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
            $table->string('created_by')->nullable();
            $table->string('created_by_phone')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('price_quotations', function (Blueprint $table) {
            $table->dropColumn('created_by','created_by_phone');
        });
    }
};
