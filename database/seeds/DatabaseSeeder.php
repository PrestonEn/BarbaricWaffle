<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//Creates a number of users and associated listings
		$this->call(UsersTableSeeder::class);
    }
}
