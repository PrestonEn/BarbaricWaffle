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

            //All the address data below.
            $table->string('street_address', 255);
            $table->string('city', 255);
            $table->string('province', 255);
            $table->string('postal_code', 6);
            $table->string('unit', 31)->nullable;
            $table->string('country', 255);

            //Latitude longitude values may be overkill, change to smaller double if needed.
            $table->double('latitude', 10, 6)->nullable;
            $table->double('longitude', 10, 6)->nullable;

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
