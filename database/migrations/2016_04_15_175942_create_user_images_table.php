<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('user_images', function (Blueprint $table) {
            //Primary key
            $table->increments('user_image_id');

            //Foreign Key
            //References the id on the users table which this image belongs to.
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('user_id')->on('users');

            //Filename of image
            //Do not include file path. 
            //Should be in form of [filename].[file_type]
            //Filename should be unique.
            $table->string('user_image_filename')->unique();

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
        Schema::drop('user_images');
    }

}
