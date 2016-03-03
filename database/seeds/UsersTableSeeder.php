<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        

        //We seed a faker to ensure data is always the same, for testing.
        //Change the seed to generate new data sets.
        //This faker is autmatically used (somehow) by the factory calls
        $my_faker = Faker\Factory::create();
        $my_faker->seed(1337);

        //Manual data insertion
        DB::table('users')->insert([
            'first_name' => 'manualinsert_first',
            'last_name' => 'manualinsert_last',

            'email' => 'manualinsert@gmail.com',
            'password' => bcrypt('ManualInsertPass'),
        ]);

        //Some users with no listings.
        factory(App\User::class, 10)->create();

        //Some users with one listing.
        factory(App\User::class, 10)
            ->create()
            ->each(function($u){
                $tloc = factory(App\Location::class)->create()->location_id;
                $tlist = factory(App\Listing::class)->create([
                    'location_id'   => $tloc,
                    'users_id'      => $u->id,
                ])->listings_id;
                $listing_infos = factory(App\Listing_Info::class)->create([
                    'listings_id' => $tlist,
                ]);
            });
    }
}
