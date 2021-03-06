<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListingsTable extends Migration
{
    /**
     * Run the migrations.
     * Creates the listings table.
     * Contains references to the user who created the listing, and the location of that listing.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listings', function (Blueprint $table) {
            //Primary key
            $table->increments('listing_id');

            //Foreign Key
            //References location table, the address of the listing
            $table->integer('location_id')->unsigned();
            $table->foreign('location_id')
                  ->references('location_id')
                  ->on('locations');

            //Foreign Key
            //References the user table, id of the user who put up the listing
            // $table->integer('user_id')->unsigned();
            // $table->foreign('user_id')
            //       ->references('user_id')
            //       ->on('users');
                //->onDelete('cascade');    //This may be appropriate when we properly implement soft deletion.

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     * Drops the listings table
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('listings');
    }
}
