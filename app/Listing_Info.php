<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Listing_Info extends Model
{
	//Table associated with this model
	protected $table = 'listing_info';

    //Primary key
    protected $primaryKey = 'listing_info_id';

    //Fields the user can set
    protected $fillable = [
            'listing_title',
            'listing_description',

            'price_monthly',
            'price_description',

            'rental_length_months_min',
            'rental_available_from',
            'rental_available_to',

            'room_level',
            'room_size_sqft',
            'num_bedrooms_total',
            'num_bathrooms_total',
            'num_roommates_max',

            'has_furnishings',
            'details_furnishings',

            'has_kitchen',
            'has_laundry',
            'has_yard',

            'owner_pays_internet',
            'owner_pays_water',
            'owner_pays_electricity',

            'owner_has_pets',
            'allowed_dogs',
            'allowed_cats',
            'allowed_other_pets',
            'details_pets',

            'mls_number'
    ];

    public function listing(){
    	$this->belongsTo('App/Listing');
    }

    public function user(){
    	//This method is something I can't test now.
    	//Hopefully it works as intended.
    	$this->belongsTo('App/Listing')->belongsTo('User');
    }

    public function scopeActive($query){
    	return $query->where('is_active', 1);
    }
}
