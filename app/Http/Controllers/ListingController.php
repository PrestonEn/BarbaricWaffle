<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Listing;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ListingController extends Controller
{
    

    public function allListings(){

    	$listings = Listings::all();

    	return view(testing.listingsList).compact(listings);
    }

        
    public function add(){
        $user = new User;
        $user->first_name = Input::get('firstName');
        $user->last_name = Input::get('lastName');
        
        $user->password = bcrypt(Input::get('pass'));
        
        $user->email = Input::get('emailAddress1');
        
        
        $user->save();

    }

}