<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    //Table associated with this model
	protected $table = 'listings';

    //Primary key
    protected $primaryKey = 'listings_id';

    //Fields the user can set
    protected $fillable = [
    ];

    public function user(){
    	$this->belongsTo('App/User');
    }

    public function location(){
    	$this->hasOne('App/Location');
    }

    public function listing_image(){
    	$this->hasMany('App/Listing_Image');
    }

    public function listing_info(){
    	$this->hasMany('App/Listing_Info');
    }
}
