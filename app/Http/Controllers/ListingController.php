<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Listing;
use App\Location;
use App\Listing_Info;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ListingController extends Controller
{
    
    public function addLongLat(){
        $long = Input::get('long');
        $lat = Input::get('lat');
        var_dump($long);
    }

    public function allListings(){

    	$listings = Listings::all();

    	return view(testing.listingsList).compact(listings);
    }

        
    
    public function addListing(){
        //adds new listing to database
        //needs login to add session id
        
        $long = Input::get('long');
        $lat = Input::get('lat');
        dd($long);
        $location = new Location;
        $location->street_address = Input::get('address');
        $location->province = Input::get('province');
        $location->postal_code = Input::get('postalCode');
        $location->city = Input::get('city');
        $location->country = Input::get('country');
        $location->longitude = $long;
        $location->latitude = $lat;
        $location->save();
        
        $listing = new Listing;
        $listing->location_id = $location->location_id;
        $listing->user_id = '2';//temporary user id until login
        
        $listing->save();
        
        $listingInfo = new Listing_Info;
        $listingInfo->listing_id = $listing->listing_id;
        $listingInfo->date_created= Carbon::now();
       
        $listingInfo->is_active = '1';
        $listingInfo->listing_title = Input::get('title');
        $listingInfo->listing_description = Input::get('description');
        $listingInfo->price_monthly = Input::get('rent');
        $listingInfo->num_bedrooms_total = Input::get('bedrooms');
        $listingInfo->num_bathrooms_total = Input::get('bathrooms');
        $listingInfo->room_size_sqft = Input::get('size');
        $listingInfo->has_kitchen = (Input::has('kitchen')) ? true : false;
        $listingInfo->has_laundry = (Input::has('laundry')) ? true : false;
        $listingInfo->has_yard = (Input::has('yard')) ? true : false;
        $listingInfo->owner_pays_internet = (Input::has('internet')) ? true : false;
        $listingInfo->owner_pays_water = (Input::has('water')) ? true : false;
        $listingInfo->owner_pays_electricity = (Input::has('electricity')) ? true : false;
        $listingInfo->owner_has_pets = (Input::has('pets')) ? true : false;
        $listingInfo->allowed_dogs = (Input::has('dog')) ? true : false;
        $listingInfo->allowed_cats = (Input::has('cat')) ? true : false;
        $listingInfo->allowed_other_pets = (Input::has('otherPet')) ? true : false;
        //$listingInfo->mls_number = Input::get('mls');
        
        $usableDateFrom =  Carbon::createFromFormat('d/m/Y', Input::get('dateFrom'));
        
        $listingInfo->rental_available_from = $usableDateFrom;
        
        $usableDateTo = Input::get('dateTo');
        $listingInfo->rental_available_to = $usableDateTo;
        
        $listingInfo->save();

        return redirect('houseTemplate/'.$listing->listing_id);
        
    }

    
}