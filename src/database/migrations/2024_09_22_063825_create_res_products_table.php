<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResProductsTable extends Migration
{
    public function up()
    {
        Schema::create('res_products', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->unsignedBigInteger('res_category_id');
$table->string('res_category_uuid', '36');
$table->string('res_category_title', '255');
$table->string('name', 255);
$table->float('price');
$table->string('image', 255)->nullable();
$table->boolean('status')->default(1);
$table->string('serial', 255)->nullable();

            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('res_products');
    }
}