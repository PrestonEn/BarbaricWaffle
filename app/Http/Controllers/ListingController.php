<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Listing
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ListingController extends Controller
{
    

    public function allListings(){

    	$listings = Listings::all();

    	return view(testing.listingsList).compact(listings);
    }


}