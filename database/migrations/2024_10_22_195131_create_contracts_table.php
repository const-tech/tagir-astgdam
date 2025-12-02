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
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('client_id')->constrained('users')->cascadeOnDelete();
            $table->string('contract_number')->nullable();
            $table->string('status')->default('pending');
            $table->date('contract_start_at')->nullable();
            $table->string('scheduling_type')->nullable();
            $table->date('payment_start_at')->nullable();
            $table->double('amount')->nullable();
            $table->integer('installments_number')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contracts');
    }
};
