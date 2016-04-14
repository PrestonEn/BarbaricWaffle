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
        }  
    }
    
    public function searchFilters(Request $request){
        if($request->ajax()){
            //dd($request->all());
            
            $region = Input::get('region');
            
            
            $rooms = Input::get('rooms');
            $bathrooms = Input::get('bathrooms');
            $kitchen =             (Input::has('haskitchen')) ? 1 : 0;
            //$laundry =             (Input::has('laundry')) ? 1 : 0;
            $internet =     (Input::has('internet')) ? 1 : 0;
            $water =        (Input::has('water')) ? 1 : 0;
            $electricity =  (Input::has('hydro')) ? 1 : 0;
            $pets =          (Input::has('pets')) ? 1 : 0;
            $dogs =            (Input::has('dogs')) ? 1 : 0;
            $cats =            (Input::has('cats')) ? 1 : 0;
            $other_pets =      (Input::has('other')) ? 1 : 0;
            $numMates = Input::get('MaxNumRoomates');
            
            //$locations = Location::where('city', $region)->get();
            
            //$listings = $locations->listing();    
            $listingInfo = Listing_Info::where('num_bedrooms_total', $rooms)
                ->where('num_bathrooms_total', $bathrooms)
                ->where('owner_pays_internet', $internet)
                ->where('owner_pays_electricity', $electricity)
                ->where('allowed_dogs', $dogs)
                ->where('allowed_cats', $cats)
                ->where('allowed_other_pets', $other)
                ->get();
            $listings = array();
            
            foreach($listingInfo as $list){
                //$listings = Location::where($list->listing->location.city, '=', $region);         
                $location = $list->listing->location;
                if($location['city'] == $region){
                    //dd($list);
                    array_push($listings, $location);
                }
            }
            
            //dd($internet);
           // dd($listings);
            
            return response()->json(['data'=>$listings]);
            
            
        }
        
        
    }
}