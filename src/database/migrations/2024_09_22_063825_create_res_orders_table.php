<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('res_orders', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->unsignedBigInteger('res_category_id');
$table->string('res_category_uuid', '36');
$table->string('res_category_title', '255');
$table->unsignedBigInteger('res_product_id');
$table->string('res_product_uuid', '36');
$table->string('res_product_title', '255');
$table->string('order_no');
$table->date('order_date');
$table->integer('total_qty');
$table->string('status')->default(0);
$table->time('order_time');

            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('res_orders');
    }
}