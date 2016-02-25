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
        'password'			=> bcrypt(str_random(10).'_password'),
        'remember_token'	=> str_random(10),
    ];
});

$factory->define(App\Location::class, function (Faker\Generator $faker) {
    return [
        'street_name'	=> $faker->streetName,
        'street_num'	=> $faker->buildingNumber,
        'city'			=> $faker->city,
        'province'		=> $faker->state,
        'postal_code'	=> $faker->postcode,
        'unit'			=> $faker->streetName, 
    	'country'		=> $faker->country,
    	'longitude'		=> $faker->longitude($min = -90, $max = 90),
    	'latitude'		=> $faker->latitude($min = -180, $max = 180)
    ];
});

$factory->define(App\Listing::class, function (Faker\Generator $faker) {
    return [
    ];
});
