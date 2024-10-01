<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResComboProductsTable extends Migration
{
    public function up()
    {
        Schema::create('res_combo_products', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->unsignedBigInteger('res_category_id');
            $table->string('res_category_uuid', '36');
            $table->string('res_category_title', '255');
            $table->unsignedBigInteger('res_product_id');
            $table->string('res_product_uuid', '36');
            $table->string('res_product_title', '255');
            $table->unsignedBigInteger('combo_product_id');
            $table->string('combo_product_uuid', '36');
            $table->string('combo_product_title', '255');
            $table->float('price');
            $table->integer('qty');
            $table->boolean('status')->default(1);
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('res_combo_products');
    }
}
