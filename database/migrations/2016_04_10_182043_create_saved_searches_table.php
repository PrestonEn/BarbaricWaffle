<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSavedSearchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saved_searches', function (Blueprint $table) {
            $table->increments('saved_search_id');

            //Foreign Key
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                  ->references('user_id')
                  ->on('users');        

            $table->dateTime('date_created_min')->nullable;
            $table->dateTime('date_created_max')->nullable;
            $table->boolean('is_active')->default(true)->nullable;

            //Listing info.
            $table->string('search_description', 255)->nullable;

            //Price
            $table->double('price_monthly_min', 10, 2)->nullable;
            $table->double('price_monthly_max', 10, 2)->nullable;
            
            //Length of rental
            $table->integer('rental_length_months_min')->unsigned()->nullable;
            $table->integer('rental_length_months_max')->unsigned()->nullable;

            $table->date('rental_available_from')->nullable;
            $table->date('rental_available_to')->nullable;


            //House details
            //$table->integer('room_level')->nullable;
            $table->integer('room_size_sqft_min')->unsigned()->nullable;
            $table->integer('room_size_sqft_max')->unsigned()->nullable;

            //$table->integer('num_bedrooms_total')->unsigned()->nullable;
            //$table->integer('num_bathrooms_total')->unsigned();
            $table->integer('num_roommates_max')->unsigned()->nullable;


            //Utilities & extras
            $table->boolean('has_furnishings')->nullable;

            $table->boolean('has_kitchen')->nullable;
            $table->boolean('has_laundry')->nullable;
            $table->boolean('has_yard')->nullable;

            $table->boolean('owner_pays_internet')->nullable;
            $table->boolean('owner_pays_water')->nullable;
            $table->boolean('owner_pays_electricity')->nullable;

            //Pet details
            $table->boolean('owner_has_pets')->nullable;
            $table->boolean('allowed_dogs')->nullable;
            $table->boolean('allowed_cats')->nullable;
            $table->boolean('allowed_other_pets')->nullable;

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
        Schema::drop('saved_searches');
    }
}
