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
        Schema::table('contracts', function (Blueprint $table) {
            $table->date('contract_end_at')->nullable();
            $table->double('paid')->nullable();
            $table->double('rest')->nullable();
            $table->foreignId('city_id')->nullable()->constrained('cities')->cascadeOnDelete()->cascadeOnUpdate();
            $table->text('contract_terms')->nullable();
            $table->string('file')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('contracts', function (Blueprint $table) {
            //
        });
    }
};