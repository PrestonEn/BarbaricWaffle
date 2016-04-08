<?php

namespace App\Http\Controllers;

use Request;

use Auth;
use Log;
use Illuminate\Http\Response;
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
    

    public function allListings(){

    	$listings = Listings::all();

    	return view(testing.listingsList).compact(listings);
    }

        
    
    public function addListing(Request $request){
        //adds new listing to database
        //needs login to add session id
        

        $location = new Location;
        $location->street_address = Input::get('address_name');
        $location->province =       Input::get('province_name');
        $location->postal_code =    Input::get('postalCode_name');
        $location->city =           Input::get('city_name');
        $location->country =        Input::get('country_name');
        $location->longitude =      Input::get('longitude_name');
        $location->latitude =       Input::get('latitude_name');
        
        //At this point we can do logic to find if this address already exists in the database.
        //We could then use that address instead of saving a new one.
        //Then we would check for an active listing, etc etc.
        $location->save();
        
        $listing = new Listing;
        $listing->location_id = $location->location_id;
        if(Auth::check()){
            $listing->user_id = $request->user()->user_id;
        }else{
            $listing->user_id = 1;
        }
        $listing->save();
        
        $listingInfo = new Listing_Info;
        $listingInfo->listing_id = $listing->listing_id;
        $listingInfo->date_created= Carbon::now();
       
        $listingInfo->is_active = true;

        $listingInfo->listing_title =       Input::get('title_name');
        $listingInfo->listing_description = Input::get('description_name', 'No Description');

        $listingInfo->price_monthly =       Input::get('rent_name');
        $listingInfo->price_description =    Input::get('priceDescription_name', 'No Description');

        $listingInfo->num_bedrooms_total =  Input::get('bedrooms_name');
        $listingInfo->num_bathrooms_total = Input::get('bathrooms_name');
        $listingInfo->room_size_sqft =      Input::get('sqftsize_name', 0);

        //Booleans
        $listingInfo->has_kitchen =             (Input::has('kitchen')) ? true : false;
        $listingInfo->has_laundry =             (Input::has('laundry')) ? true : false;
        $listingInfo->has_yard =                (Input::has('yard')) ? true : false;
        $listingInfo->owner_pays_internet =     (Input::has('internet')) ? true : false;
        $listingInfo->owner_pays_water =        (Input::has('water')) ? true : false;
        $listingInfo->owner_pays_electricity =  (Input::has('electricity')) ? true : false;
        $listingInfo->owner_has_pets =          (Input::has('pets')) ? true : false;
        $listingInfo->allowed_dogs =            (Input::has('dog')) ? true : false;
        $listingInfo->allowed_cats =            (Input::has('cat')) ? true : false;
        $listingInfo->allowed_other_pets =      (Input::has('otherPet')) ? true : false;
        
        $listingInfo->mls_number = Input::get('mls', 'N/A');
        
        //$usableDateFrom =  Carbon::createFromFormat('d/m/Y', Input::get('dateFrom'));
        $listingInfo->rental_length_months_min = 0;
        $listingInfo->rental_available_from = Input::has('dateFrom_name', Carbon::now());
        $listingInfo->rental_available_to = Input::get('dateTo_name');
        
        $listingInfo->save();

        return redirect('houseTemplate/'.$listing->listing_id);
        
    }
    
    public function updateSidebar(Request $request){
       
        
        if(Request::ajax()){
            if($request::has('id')){
                 //gets data from ajax request
                $ids = $_POST['id'];
                $listingInfo = Listing_Info::whereIn('listing_id', $ids)->get();   
                //returns sidebar view with udpated listings
                return view ('sidebarUpdate', compact('listingInfo'));
		        }
        }
        
       
    }

    
}