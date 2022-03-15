<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colors', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('carmodel_id')->unsigned();
            $table->bigInteger('varient_id')->unsigned();
            $table->bigInteger('product_id')->unsigned();
            $table->string('colour_name')->nullable();
            $table->string('colour_code')->nullable();
            $table->timestamps();
            $table->foreign('carmodel_id')->references('id')->on('car_models')->onDelete('cascade');
            $table->foreign('varient_id')->references('id')->on('varients')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('colors');
    }
}
