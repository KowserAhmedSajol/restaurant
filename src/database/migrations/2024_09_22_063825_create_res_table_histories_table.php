<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResTableHistoriesTable extends Migration
{
    public function up()
    {
        Schema::create('res_table_histories', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->unsignedBigInteger('res_table_id')->nullable();
            $table->string('name', 255);
$table->integer('capacity');
$table->boolean('status', 255)->default(1);
$table->string('color', 255)->nullable();
$table->boolean('is_occupied')->default(0);

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
        Schema::dropIfExists('res_table_histories');
    }
}