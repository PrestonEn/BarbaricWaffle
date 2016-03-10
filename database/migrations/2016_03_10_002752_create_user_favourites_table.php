<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserFavouritesTable extends Migration
{
    /**
     * Run the migrations.
     * Table to represent user favourite listings.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('favourites_listing_user', function (Blueprint $table) {
            //Foreign key
            $table->integer('listing_id')->unsigned();
            $table->foreign('listing_id')
                  ->references('listing_id')
                  ->on('listings');

            //Foreign Key
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                  ->references('user_id')
                  ->on('users');

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
        Schema::drop('favourites_listing_user');
    }
}
