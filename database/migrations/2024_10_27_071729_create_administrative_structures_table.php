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
        Schema::create('administrative_structures', function (Blueprint $table) {
            $table->id();
            $table->string('job_title');
            $table->integer('rank')->unique()->nullable();
            $table->foreignId('parent_id')->nullable()->constrained('administrative_structures')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('administrative_structures');
    }
};
