<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResTaxesTable extends Migration
{
    public function up()
    {
        Schema::create('res_taxes', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->string('name');
$table->double('percentage');
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
        Schema::dropIfExists('res_taxes');
    }
}