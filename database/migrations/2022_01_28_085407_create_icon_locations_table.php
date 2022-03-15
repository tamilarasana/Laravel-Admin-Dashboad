<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIconLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('icon_locations', function (Blueprint $table) {
            $table->id();
             // $table->bigInteger('category_id')->unsigned();
             $table->integer('city')->nullable();
             $table->string('loc_image')->nullable();
             $table->string('title')->nullable();
             $table->string('address')->nullable();
             $table->string('email')->nullable();
             $table->string('phone_number')->nullable();
             $table->string('whatsapp')->nullable();
             $table->string('facebook_id')->nullable();
             $table->string('instagram_id')->nullable();
             $table->string('youtube_id')->nullable();
             $table->string('twitter_id')->nullable();
             $table->string('working_days')->nullable();
             $table->string('working_hours')->nullable();
             $table->timestamps();
             // $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('icon_locations');
    }
}
