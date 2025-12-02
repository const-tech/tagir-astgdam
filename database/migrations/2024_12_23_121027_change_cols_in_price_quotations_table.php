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
            $table->dropColumn('client_name');
            $table->dropColumn('email');
            $table->dropColumn('client_phone');
            $table->foreignId('client_id')->nullable()
                ->after('id')->constrained('users')->nullOnDelete();
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
