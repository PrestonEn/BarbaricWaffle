<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListingImagesTable extends Migration
{
    /**
     * Run the migrations.
     * Adds a table which contains the locations of images for listings.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('listing_images', function (Blueprint $table) {
            //Primary key
            $table->increments('listing_image_id');

            //Foreign Key
            //References the id on the listing table which this image belongs to.
            $table->integer('listing_id')->unsigned();
            $table->foreign('listing_id')->references('listing_id')->on('listings');

            //Filename of image
            //Do not include file path. 
            //Should be in form of [filename].[file_type]
            //Filename should be unique.
            $table->string('image_filename')->default('../images/houseDefault.jpeg');
            $table->string('image_filename_thumbnail')->default('../images/houseDefault.jpeg');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('listing_images');
    }
}
