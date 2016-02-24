<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    //Table associated with this model
    protected $table = 'location';

    //primary key
    $primaryKey = 'location_id';

    //Fields the user can set
    protected $fillable = [
            'street_name'
            'street_num',
            'city',
            'province',
            'postal_code',
            'unit', 
        	'country'
    ];
    
    public function listing(){
        $this->belongsTo('App/Listing');
    }

}
