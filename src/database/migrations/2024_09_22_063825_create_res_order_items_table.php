<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResOrderItemsTable extends Migration
{
    public function up()
    {
        Schema::create('res_order_items', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->unsignedBigInteger('res_order_id')->nullable();
$table->string('res_order_uuid', '36')->nullable();
$table->string('res_order_title', '255')->nullable();
$table->unsignedBigInteger('res_product_id')->nullable();
$table->string('res_product_uuid', '36')->nullable();
$table->string('res_product_title', '255')->nullable();
$table->integer('qty');
$table->float('rate');
$table->float('amount');

            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('res_order_items');
    }
}