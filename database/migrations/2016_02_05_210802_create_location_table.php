<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * Creates the location table.
     * Contains the exact address for a listing.
     * 
     * 
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            //Primary Key: location_id
            $table->increments('location_id');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                  ->references('user_id')
                  ->on('users');
                //->onDelete('cascade');    //This may be appropriate when we properly implement deletion.

            //All the address data below.
            $table->string('street_address', 255);
            $table->string('city', 255);
            $table->string('province', 255);
            $table->string('postal_code', 6);
            $table->string('country', 255);
            //$table->string('unit', 31)->nullable;//Moved to listingInfo

            //Latitude longitude values may be overkill, change to smaller double if needed.
            $table->double('latitude', 12, 7)->nullable;
            $table->double('longitude', 12, 7)->nullable;

            //To be changed later, google walkscore
            $table->integer('walkscore')->nullable;

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     * Drops the location table.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('locations');
    }
}
