<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     * File for the creation of the users table.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            //Primary key
            $table->increments('users_id');

            //User details required for account creation
            $table->string('first_name', 60);
            $table->string('last_name', 60);
            $table->string('email', 255)->unique();
            $table->string('password', 60);

            //Additional User Information
            

            //Laravel Generated
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     * Drops the users table.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
