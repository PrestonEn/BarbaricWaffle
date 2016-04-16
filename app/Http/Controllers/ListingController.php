<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Log;
use Illuminate\Http\Response;
use App\User;
use App\Listing;
use App\Location;
use App\Saved_Search;
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
        //$temp = $this->validate($request, [
        $v = Validator::make($request->all(), [
            //In order which they appear, to make the error readable
            
            //Listing Title
            'title_name'            => 'bail|required',
            'description_name'      => '',

            //Location
            'location_name'      => 'bail|required|numeric',

            //Listinginfo
            'rent_name'             => 'bail|required|numeric',
            'priceDescription_name' => '',

            'bedrooms_name'         => 'bail|numeric',
            'bathrooms_name'        => 'bail|numeric',
            'sqftSize_name'         => 'bail|numeric',

            'mls'                   => 'alpha_num',

            'dateFrom_name'         => 'bail|required',
            'dateTo_name'           => 'bail',
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
        $listingInfo->price_description =    Input::get('priceDescription_name', 'No Description');

        $listingInfo->num_bedrooms_total =  Input::get('bedrooms_name');
        $listingInfo->num_bathrooms_total = Input::get('bathrooms_name');
        $listingInfo->room_size_sqft =      Input::get('sqftSize_name', 0);

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
        if($request->ajax()){
            if($request->has('id')){
                 //gets data from ajax request
                $ids = $_POST['id'];
                $listingInfo = Listing_Info::whereIn('listing_id', $ids)->get();   
                //returns sidebar view with udpated listings
                
                
                return view ('sidebarUpdate', compact('listingInfo'));
            }
            else return view('noListingPage');
        }  
    }
    
    
    
    public function searchFilters(Request $request){
        if($request->ajax()){
            //dd($request->all());
            
            $country = Input::get('country');
            $region = Input::get('region');
            
            $maxPrice = Input::get('maxPrice');
            $minPrice = Input::get('minPrice');
            $rooms = Input::get('rooms');
            $bathrooms = Input::get('bathrooms');
            $kitchen =             (Input::has('hasKitchen')) ? 1 : null;
            $laundry = Input::get('laundry');
            $internet =     (Input::has('internet')) ? 1 : null;
            $water =        (Input::has('water')) ? 1 : null;
            $electricity =  (Input::has('hydro')) ? 1 : null;
            $pets =          Input::get('pets');
            $dogs =            (Input::has('dogs')) ? 1 : null;
            $cats =            (Input::has('cats')) ? 1 : null;
            $other_pets =      (Input::has('other')) ? 1 : null;
            $numMates = Input::get('MaxNumRoommates');
            
            if($laundry == "na") $laundry = 0;
            if($maxPrice == 2000) $maxPrice = 99999;
            //$locations = Location::where('city', $region)->get();
            
            //$listings = $locations->listing();    
            $query = Listing_Info::whereIfNotNull('num_bedrooms_total', "=",$rooms)
                ->whereIfNotNull('price_monthly',"<=", $maxPrice)
                ->whereIfNotNull('price_monthly',">=", $minPrice)
                ->whereIfNotNull('num_bathrooms_total', "=",$bathrooms)
                ->whereIfNotNull('has_laundry', "=", $laundry)
                ->whereIfNotNull('owner_pays_internet', "=",$internet)
                ->whereIfNotNull('has_kitchen', "=",$kitchen)
                ->whereIfNotNull('owner_pays_electricity', "=",$electricity)
                ->whereIfNotNull('owner_pays_water', "=",$water)
                ->whereIfNotNull('owner_has_pets', "=",$pets)
                ->whereIfNotNull('allowed_dogs', "=",$dogs)
                ->whereIfNotNull('allowed_cats', "=",$cats)
                ->whereIfNotNull('allowed_other_pets', "=",$other_pets);
            
            if($numMates == "99") $query = $query->where('num_roommates_max', "<=", "99");
            else $query = $query->where('num_roommates_max', "=", $numMates);
            
            $listingInfo = $query->get();
            $listings = array();
            $long = 0;
            $lat = 0;
            $count = 0;
            
            foreach($listingInfo as $list){
                //$listings = Location::where($list->listing->location.city, '=', $region);         
                $location = $list->listing->location;
                
                if($country != "all"){
                    if($location['city'] == $region && $location['country'] == $country){
                        //dd($list);
                        array_push($listings, $location);
                        $count = $count +1;
                        $long = $long + $location->longitude;
                        $lat = $lat + $location->latitude; 
                    }
                }
                else{
                    array_push($listings, $location);
                    $count = $count +1;
                    $long = $long + $location->longitude;
                    $lat = $lat + $location->latitude; 
                }
            }
            if($count != 0){
                $long = $long/$count;
                $lat = $lat/$count;
            }
            array_push($listings, $lat);
            array_push($listings, $long);
            //dd($internet);
           // dd($listings);
            
            return response()->json(['data'=>$listings]);
            
            
        }
        
        
    }
    
    
    public function saveFilter(Request $request){
        
            //dd($request->all());
        if($request->ajax()){
            
            $region = Input::get('region');
            
            //$locations = explode(',', $region);
            
            //gonna add country later
            $save = new Saved_Search;
            
            $save->user()->associate(Auth::user());
            $save->city = $region;
            $save->country = Input::get('country');
            
            //$save->country = $locations[1];
            $save->price_monthly_min = Input::get('minPrice');
            $save->price_monthly_max = Input::get('maxPrice');
            $save->num_bathrooms_total = Input::get('bathrooms');
            $save->num_bedrooms_total = Input::get('rooms');
            $save->has_kitchen = (Input::has('hasKitchen')) ? 1: 0;
            $save->owner_pays_internet = (Input::has('internet')) ? 1: 0;
            $save->owner_pays_water = (Input::has('water')) ? 1: 0;
            $save->owner_pays_electricity = (Input::has('hydro')) ? 1: 0;
            $save->owner_has_pets = Input::get('pets');
            $save->allowed_dogs = (Input::has('dogs')) ? 1 : 0;
            $save->allowed_cats = (Input::has('cats')) ? 1 : 0;
            $save->allowed_other_pets = (Input::has('other')) ? 1 : 0;
            $save->has_furnishings = (Input::has('furnished')) ? 1 : 0;
            
            
            $save->num_roommates_max = Input::get('MaxNumRoommates');
            $save->save();    
            
            return response()->json(['data'=>$save]);
        }
        
    }
    


    public function getFilter(Request $request){
        if($request->ajax()){
            $id = $_POST['id'];
            $savedFilters = Saved_Search::where('saved_search_id', '=', $id)
                ->get();
            
            
            
            return response()->json(['data'=>$savedFilters]);
            
        }
    
    }
    
    public function getCitiesFromCountry(Request $request){
        if($request->ajax()){
            $country = $_POST['country'];
            $locations = Location::where('country', '=', $country)
                ->get();
            
            $city = array();
            
            foreach($locations as $location){
                //$listings = Location::where($list->listing->location.city, '=', $region);         
                $listings = $location->listing;
                foreach($listings as $list){
                    $listingInfo = $list->listing_info;  
                    foreach($listingInfo as $listInfo){
                     
                        if($listInfo['is_active'] == 1){
                            array_push($city, $location->city);
                        }  
                        
                    }
                }
            }
            //dd($city);
            return $city;
            
        }
        
    }
}