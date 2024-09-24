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
        Schema::table('res_orders', function (Blueprint $table) {
            $table->string('token_no');
            $table->string('total_amount');
            $table->unsignedBigInteger('res_table_id')->nullable();
            $table->string('res_table_uuid', '36')->nullable();
            $table->string('res_table_title', '255')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('res_orders', function (Blueprint $table) {
            //
        });
    }
};
