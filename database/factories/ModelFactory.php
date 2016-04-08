<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'first_name'		=> $faker->firstName,
        'last_name'			=> $faker->lastName,
        'email'				=> $faker->email,
        'phone'             => $faker->phoneNumber,
        'password'			=> bcrypt(str_random(10).'_password'),
        'remember_token'	=> str_random(10),
    ];
});

$factory->define(App\Location::class, function (Faker\Generator $faker) {
    return [
        'street_address'=> $faker->buildingNumber . ' ' . $faker->streetName,
        'city'			=> $faker->city,
        'province'		=> $faker->state,
        'postal_code'	=> $faker->postcode,
        'unit'			=> $faker->numberBetween(0, 100), 
    	'country'		=> $faker->country,
    	'longitude'		=> $faker->randomFloat(6, 0, 10) - 80,
    	'latitude'		=> $faker->randomFloat(6, 40, 50)
    ];
});

$factory->define(App\Listing::class, function (Faker\Generator $faker) {
    return [
    ];
});

$factory->define(App\Listing_Info::class, function (Faker\Generator $faker) {
    return [
            'listing_title'         => 'title_'.        $faker->text(30),
            'listing_description'   => 'description_'.  $faker->text(120),

            'price_monthly'     =>  $faker->randomFloat(2,0,5000),
            'price_description' =>  $faker->text(200),

            'rental_length_months_min'  =>  $faker->randomDigit,
            'rental_available_from'     =>  $faker->dateTimeBetween('now','1 year'),
            'rental_available_to'       =>  $faker->dateTimeBetween('2 years', '4 years'),

            'room_level'            =>  $faker->randomDigit,
            'room_size_sqft'        =>  $faker->numberBetween(20, 1000),
            'num_bedrooms_total'    =>  $faker->randomDigit,
            'num_bathrooms_total'   =>  $faker->randomDigit,
            'num_roommates_max'     =>  $faker->randomDigit,

            'has_furnishings'       =>  $faker->boolean,
            'details_furnishings'   =>  $faker->text(200),

            'has_kitchen'       =>  $faker->boolean,
            'has_laundry'       =>  $faker->boolean,
            'has_yard'          =>  $faker->boolean,

            'owner_pays_internet'       =>  $faker->boolean,
            'owner_pays_water'          =>  $faker->boolean,
            'owner_pays_electricity'    =>  $faker->boolean,

            'owner_has_pets'        =>  $faker->boolean,
            'allowed_dogs'          =>  $faker->boolean,
            'allowed_cats'          =>  $faker->boolean,
            'allowed_other_pets'    =>  $faker->boolean,
            'details_pets'          =>  $faker->text(200),

            'mls_number'    =>  $faker->text(10)
    ];
});
