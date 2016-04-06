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
        	'country'
    ];
    
    public function listing(){
        return $this->hasOne('App\Listing');
    }

}
