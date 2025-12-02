<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('voucher_accounts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('voucher_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('account_id')->nullable()->constrained()->cascadeOnDelete();
            $table->float('debit')->nullable()->default(0);
            $table->float('credit')->nullable()->default(0);
            $table->text('description')->nullable();
            $table->foreignId('cost_center_id')->nullable()->constrained()->cascadeOnDelete();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('voucher_accounts');
    }
};
