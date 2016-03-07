<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListingInfoTable extends Migration
{
    /**
     * Run the migrations.
     * Creates the listing_info table.
     * Contains all the information about a listing, and acts as a listing history.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listing_infos', function (Blueprint $table) {
            //Primary Key
            $table->increments('listing_info_id');

            //Foreign Key
            //Each Listing can have any number of listing_info records.
            $table->integer('listing_id')->unsigned();
            $table->foreign('listing_id')->references('listing_id')->on('listings');

            //When the listing was posted and removed.
            //End date will be set to some date far in the future until the posting is deleted.
            $table->dateTime('date_created');
            $table->dateTime('date_deleted')->default('3000_01_01 00:00:00');
            $table->boolean('is_active')->default(true);

            //Listing info.
            $table->string('listing_title', 255);
            $table->string('listing_description',255);

            //Price
            $table->double('price_monthly', 10, 2);
            $table->string('price_description', 255);
            
            //Length of rental
            $table->integer('rental_length_months_min')->unsigned();
            $table->date('rental_available_from');
            $table->date('rental_available_to');


            //House details
            $table->integer('room_level');
            $table->integer('room_size_sqft')->unsigned();

            $table->integer('num_bedrooms_total')->unsigned();
            $table->integer('num_bathrooms_total')->unsigned();
            $table->integer('num_roommates_max')->unsigned();

            $table->boolean('has_furnishings');
            $table->string('details_furnishings', 255);

            //Utilities & extras
            $table->boolean('has_kitchen');
            $table->boolean('has_laundry');
            $table->boolean('has_yard');

            $table->boolean('owner_pays_internet');
            $table->boolean('owner_pays_water');
            $table->boolean('owner_pays_electricity');

            //Pet details
            //Note: Should these booleans be one bitmasked unsigned int?
            $table->boolean('owner_has_pets');
            $table->boolean('allowed_dogs');
            $table->boolean('allowed_cats');
            $table->boolean('allowed_other_pets');
            $table->string('details_pets', 255);

            //MLS number storage.
            //Has a small prefix of 2 letters, then 7 digits.
            $table->string('mls_number', 10);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     * Drops the listing_info table.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('listing_infos');
    }
}
