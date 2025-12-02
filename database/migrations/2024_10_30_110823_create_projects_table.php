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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('title');
            $table->foreignId('client_id')->nullable()->constrained()->nullOnDelete();
            $table->date('start_at')->nullable();
            $table->date('end_at')->nullable();
            $table->integer('expected_duration')->nullable();
            $table->string('status')->default('pending');
            $table->string('image')->nullable();
            $table->string('excel_file')->nullable();
            $table->text('content')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
