<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('price_quotation_messages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('price_quotation_id')->nullable();
            $table->foreignId('user_id');
            $table->text('content');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('price_quotation_messages');
    }
};
