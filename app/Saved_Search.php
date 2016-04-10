<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Saved_Search extends Model
{
    //Table associated with this model
    protected $table = 'saved_searches';

    //Primary key
    protected $primaryKey = 'saved_search_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [     
            'date_created_min',
            'date_created_max',
            'is_active',
            'search_description',
            'price_monthly_min',
            'price_monthly_max',
            'rental_length_months_min',
            'rental_length_months_max',
            'rental_available_from',
            'rental_available_to',
            'room_size_sqft_min',
            'room_size_sqft_max',
            'num_roommates_max',
            'has_furnishings',
            'has_kitchen',
            'has_laundry',
            'has_yard',
            'owner_pays_internet',
            'owner_pays_water',
            'owner_pays_electricity',
            'owner_has_pets',
            'allowed_dogs',
            'allowed_cats',
            'allowed_other_pets'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
    ];

    public function user(){
    	return $this->belongsTo('App\User', 'user_id', 'user_id');
    }

}
