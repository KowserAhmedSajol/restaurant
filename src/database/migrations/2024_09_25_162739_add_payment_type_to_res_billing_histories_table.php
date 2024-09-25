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
        Schema::table('res_billing_histories', function (Blueprint $table) {
            $table->string('payment_type');
            $table->string('phone_number')->nullable();
            $table->string('transaction_id')->nullable();
            $table->string('total_amount');
            $table->string('received_amount')->nullable();
            $table->string('returned_amount')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('res_billing_histories', function (Blueprint $table) {
            //
        });
    }
};
