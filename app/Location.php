<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    //Table associated with this model
    protected $table = 'locations';

    //primary key
    protected $primaryKey = 'location_id';

    //Fields the user can set
    protected $fillable = [
            'street_address',
            'city',
            'province',
            'postal_code',
            'unit', 
        	'country',
            'latitude',
            'longitude',
            'image_path'
    ];
    
    public function listing(){
        return $this->hasMany('App\Listing');
    }

    public function user(){
        return $this->belongsTo('App\User', 'user_id', 'user_id');
    }
}
