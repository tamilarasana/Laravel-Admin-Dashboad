<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->integer('city')->nullable();
            $table->bigInteger('category_id')->unsigned();
            $table->string('location_name')->nullable();
            $table->string('phone')->nullable();
            $table->string('alternate_phone')->nullable();
            $table->string('address')->nullable();
            $table->string('pincode')->nullable();
            $table->string('powered_by')->nullable();
            $table->string('rating')->nullable();
            $table->string('type')->nullable();
            $table->string('map_link')->nullable();
            $table->string('review_form_link')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longtitude')->nullable();
            $table->string('website')->nullable();
            $table->string('email')->nullable();
            $table->string('open_time')->nullable();
            $table->string('close_time')->nullable();
            $table->string('image');
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('locations');
    }
}
