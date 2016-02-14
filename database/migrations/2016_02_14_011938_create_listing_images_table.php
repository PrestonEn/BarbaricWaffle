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
            Schema::create('listing_image', function (Blueprint $table) {
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
            $table->string('image_filename')->unique();

            //Image purpose.
            //Number specifies order of appearance, with
            //0 being the listings main image and higher
            //values showing up later in the listing details.
            $table->integer('image_priority');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('listing_image');
    }
}
