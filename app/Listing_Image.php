<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Listing_Image extends Model
{
	//Table associated with this model
	protected $table = 'listing_images';

    //Primary key
    protected $primaryKey = 'listing_image_id';

    //Fields the user can set
    protected $fillable = [
    	'image_filename',
    	'image_priority'
    ];

    public function listing(){
    	return $this->belongsTo('App\Listing');
    }
}
