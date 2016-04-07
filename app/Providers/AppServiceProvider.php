<?php

namespace App\Providers;

use Validator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    //Do not load unless needed.
    protected $defer = true;

    /**
     * Bootstrap any application services.
     *
     * @return void
     */

    public function boot() {
        /*
            Here is where we will have our custom validator methods.
            This is where they work, do not question it.
        */
        Validator::extend('validZipPostal', function($attribute, $value, $parameters, $validator) {
            $rule = "#(\d{5}(-\d{4})?)|([ABCEGHJKLMNPRSTVXY]{1}\d{1}[A-Z]{1} *\d{1}[A-Z]{1}\d{1})#";
            return preg_match($rule, $value);;
        });

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
        //
    }
}
