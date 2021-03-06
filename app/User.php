<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\CanResetPassword as passReset;
use Illuminate\Auth\Passwords\CanResetPassword;

class User extends Authenticatable
{
    //Table associated with this model
    protected $table = 'users';

    //Primary key
    protected $primaryKey = 'user_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'phone', 'user_image_filename'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // public function listings(){
    //     return $this->hasMany('App\Listing', 'user_id', 'user_id');
    // }

    public function favourite_listings(){
        return $this->belongsToMany('App\Listing', 'favourites_listing_user');
    }

    public function saved_searches(){
        return $this->hasMany('App\Saved_Search', 'user_id', 'user_id');
    }

    public function locations(){
        return $this->hasMany('App\Location', 'user_id', 'user_id');
    }
}
