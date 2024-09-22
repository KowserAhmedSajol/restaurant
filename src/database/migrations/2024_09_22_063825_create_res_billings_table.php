<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResBillingsTable extends Migration
{
    public function up()
    {
        Schema::create('res_billings', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->unsignedBigInteger('res_order_id');
$table->string('res_order_uuid', '36');
$table->string('res_order_title', '255');
$table->unsignedBigInteger('res_table_id');
$table->string('res_table_uuid', '36');
$table->string('res_table_title', '255');
$table->string('status');
$table->date('date');
$table->time('time');

            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('res_billings');
    }
}