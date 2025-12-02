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
        DB::table('price_quotation_messages')->delete();
        Schema::table('price_quotation_messages', function (Blueprint $table) {
            $table->dropColumn('price_quotation_id');
        });
        Schema::table('price_quotation_messages', function (Blueprint $table) {
            $table->foreignId('price_quotation_id')->constrained('price_quotations')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('price_quotation_messages', function (Blueprint $table) {
            //
        });
    }
};
