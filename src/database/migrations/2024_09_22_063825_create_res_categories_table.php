<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('res_categories', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->string('name', 255);
$table->string('slug', 255)->nullable();
$table->string('image', 255)->nullable();
$table->string('serial', 255)->nullable();
$table->string('color', 255)->nullable();
$table->boolean('is_active')->default(0);

            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('res_categories');
    }
}