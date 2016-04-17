<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
use Validator;

class ListingController extends Controller
{
    public function allListings(){
    	$listings = Listings::all();
    	return view(testing.listingsList).compact(listings);
    }

    public function addListing(Request $request){
        //needs login to add session id
        if(!Auth::check()){
            //This should not be possible
            //But in the case the user SOMEHOW is not logged in, redirect
            return redirect('signIn');
        }

        $v = Validator::make($request->all(), [
            //In order which they appear, to make the error readable
            
            //Listing Title
            'title_name'            => 'bail|required',

            'location_name'     => 'bail|required|numeric',
            'floorNum_name'     => 'bail|alpha_num',
            'unitNum_name'      => 'bail|alpha_num',
            
            'dateFrom_name'         => 'bail|required',
            'dateTo_name'           => 'bail',

            'rent_name'             => 'bail|required|numeric|min:0',
            'rentalLength_name'     => 'bail|numeric|min:0',
            'priceDescription_name' => '',

            'sqft_name'             => 'min:0',
            'bedrooms_name'         => 'bail|numeric|min:0',
            'bathrooms_name'        => 'bail|numeric|min:0',
            'sqftSize_name'         => 'bail|numeric|min:0',

            'mls'                   => 'alpha_num',
        ]);

        //Check if validation passes. If not, redirect.
        if ($v->fails()) {
            return redirect('addListing')
                ->withErrors($v)
                ->withInput();
        }
        
        $listing = new Listing;
        $listing->location_id = Input::get('location_name');
        $listing->save();
        
        $listingInfo = new Listing_Info;
        $listingInfo->listing_id = $listing->listing_id;
        $listingInfo->date_created= Carbon::now();
       
        $listingInfo->is_active = true;

        $listingInfo->listing_title =       Input::get('title_name');
        $listingInfo->listing_description = Input::get('description_name', 'No Description');

        $listingInfo->price_monthly =       Input::get('rent_name');
        $listingInfo->price_description =   Input::get('priceDescription_name', 'No Description');

        $listingInfo->unit =                Input::get('unitNum_name');
        $listingInfo->room_level =          Input::get('floorNum_name');

        $listingInfo->num_bedrooms_total =  Input::get('bedrooms_name');
        $listingInfo->num_bathrooms_total = Input::get('bathrooms_name');
        $listingInfo->num_roommates_max =   Input::get('roommatesNum_name');
        $listingInfo->room_size_sqft =      Input::get('sqftSize_name', 0);

        //Booleans
        $listingInfo->has_kitchen =             (Input::has('kitchen_name')) ? true : false;
        $listingInfo->has_laundry =             (Input::has('laundry_name')) ? true : false;
        $listingInfo->has_yard =                (Input::has('yard_name')) ? true : false;
        $listingInfo->has_furnishingS =          (Input::has('furnishing_name')) ? true : false;

        $listingInfo->owner_pays_internet =     (Input::has('internet_name')) ? true : false;
        $listingInfo->owner_pays_water =        (Input::has('water_name')) ? true : false;
        $listingInfo->owner_pays_electricity =  (Input::has('electricity_name')) ? true : false;
        $listingInfo->owner_has_pets =          (Input::has('allergy_name')) ? true : false;
        $listingInfo->allowed_dogs =            (Input::has('dogs_name')) ? true : false;
        $listingInfo->allowed_cats =            (Input::has('cats_name')) ? true : false;
        $listingInfo->allowed_other_pets =      (Input::has('otherPets_name')) ? true : false;
        
        $listingInfo->mls_number =              Input::get('mls', 'N/A');
        
        $listingInfo->rental_length_months_min = Input::get('rentalLength_name');
        $listingInfo->rental_available_from = Input::get('dateFrom_name');
        $listingInfo->rental_available_to = Input::get('dateTo_name', NULL);
        
        $listingInfo->save();

        return redirect('houseTemplate/'.$listing->listing_id);
    }
    
    public function updateSidebar(Request $request){
        if($request->ajax()){
            if($request->has('id')){
                 //gets data from ajax request
                $ids = $_POST['id'];
                $listingInfo = Listing_Info::whereIn('listing_id', $ids)->get();   
                //returns sidebar view with udpated listings
               
                return view ('sidebarUpdate', compact('listingInfo'));
            }
        }  
    }
    
    public function searchFilters(Request $request){
        if($request->ajax()){
            //dd($request->all());
            
            $region = Input::get('region');
            $maxPrice = Input::get('maxPrice');
            $minPrice = Input::get('minPrice');
            $rooms = Input::get('rooms');
            $bathrooms = Input::get('bathrooms');
            $kitchen =             (Input::has('haskitchen')) ? 1 : 0;
            $laundry = Input::get('laundry');
            $internet =     (Input::has('internet')) ? 1 : 0;
            $water =        (Input::has('water')) ? 1 : 0;
            $electricity =  (Input::has('hydro')) ? 1 : 0;
            $pets =          (Input::has('pets')) ? 1 : 0;
            $dogs =            (Input::has('dogs')) ? 1 : 0;
            $cats =            (Input::has('cats')) ? 1 : 0;
            $other_pets =      (Input::has('other')) ? 1 : 0;
            $numMates = Input::get('MaxNumRoomates');
            
            $locations = explode(',', $region);
            if($laundry == "") $laundry = null;
            //$locations = Location::where('city', $region)->get();
            
            //$listings = $locations->listing();    
            $query = Listing_Info::whereIfNotNull('num_bedrooms_total', "=",$rooms)
                ->whereIfNotNull('price_monthly',"<=", $maxPrice)
                ->whereIfNotNull('price_monthly',">=", $minPrice)
                ->whereIfNotNull('num_bathrooms_total', "=",$bathrooms)
                ->whereIfNotNull('num_roomates_max', "<=", $numMates)
                ->whereIfNotNull('has_laundry', "=", $laundry);
                //->whereIfNotNull('owner_pays_internet', "=",$internet)
                //->whereIfNotNull('owner_pays_electricity', "=",$electricity);
                //->whereIfNotNull('allowed_dogs', "=",$dogs)
                //->whereIfNotNull('allowed_cats', "=",$cats)
                //->whereIfNotNull('allowed_other_pets', "=",$other_pets);
            
            
            $listingInfo = $query->get();
            $listings = array();
            
            foreach($listingInfo as $list){
                //$listings = Location::where($list->listing->location.city, '=', $region);         
                $location = $list->listing->location;
                if($region != "All"){
                    if($location['city'] == $locations[0]){
                        //dd($list);
                        array_push($listings, $location);
                    }
                }
                else{
                     array_push($listings, $location);
                }
                
                
            }
            
            //dd($internet);
           // dd($listings);
            
            return response()->json(['data'=>$listings]);
            
            
        }
        
        
    }
}