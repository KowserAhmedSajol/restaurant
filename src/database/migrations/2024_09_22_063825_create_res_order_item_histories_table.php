<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResOrderItemHistoriesTable extends Migration
{
    public function up()
    {
        Schema::create('res_order_item_histories', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->unsignedBigInteger('res_order_item_id')->nullable();
            $table->unsignedBigInteger('res_order_id');
$table->string('res_order_uuid', '36');
$table->string('res_order_title', '255');
$table->unsignedBigInteger('res_product_id');
$table->string('res_product_uuid', '36');
$table->string('res_product_title', '255');
$table->integer('qty');
$table->float('rate');
$table->float('amount');

            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();
            $table->softDeletes();
            $table->string('action', 100);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('res_order_item_histories');
    }
}