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
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('side_job');
            $table->foreignId('side_job_id')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('price_quotation_job_id')
                ->nullable()->constrained('price_quotation_jobs')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('side_job');
            $table->dropConstrainedForeignId('price_quotation_job_id');
            $table->dropConstrainedForeignId('side_job_id');
        });
    }
};
