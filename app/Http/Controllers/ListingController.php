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

        
}