<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    //Table associated with this model
	protected $table = 'listings';

    //Primary key
    protected $primaryKey = 'listing_id';

    //Fields the user can set
    protected $fillable = [
    ];

    // public function user(){
    // 	return $this->belongsTo('App\User', 'user_id', 'user_id');
    // }

    public function favourite_user(){
        return $this->belongsToMany('App\User', 'favourites_listing_user');
    }

    public function location(){
    	return $this->belongsTo('App\Location');
    }

    public function listing_image(){
    	return $this->hasMany('App\Listing_Image');
    }

    public function listing_info(){
    	return $this->hasMany('App\Listing_Info');
    }

    public function scopeusers_listings($query, $user_id){
        return $query
                ->join('locations', 'locations.location_id', '=', 'listings.location_id')
                ->where('locations.user_id', $user_id);
    }
}
