<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Image;
use Auth;
use Log;
use Illuminate\Http\Response;
use App\User;
use App\Listing;
use App\Location;
use App\Saved_Search;
use App\Listing_Info;
use App\Listing_Image;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use Mail;


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
            'image.*'               => 'required|image', 
            'mls'                   => 'alpha_num',

            // 'files_name[]'          => 'required|images',
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

        $listingInfo->listing_title =       ucwords(Input::get('title_name'));
        $listingInfo->listing_description = Input::get('description_name', 'No Description');

        $listingInfo->price_monthly =       Input::get('rent_name');
        $listingInfo->price_description =   Input::get('priceDescription_name', 'No Description');

        $listingInfo->unit =                Input::get('unitNum_name');
        $listingInfo->room_level =          Input::get('floorNum_name');

        $listingInfo->num_bedrooms_total =  Input::get('bedrooms_name');
        $listingInfo->num_bathrooms_total = Input::get('bathrooms_name');
        $listingInfo->num_roommates_max =   Input::get('roommatesNum_name');
        $listingInfo->room_size_sqft =      Input::get('sqft_name', 0);

        //Booleans
        $listingInfo->has_kitchen =             (Input::has('kitchen_name')) ? true : false;
        $listingInfo->has_laundry =             (Input::has('laundry_name')) ? true : false;
        $listingInfo->has_yard =                (Input::has('yard_name')) ? true : false;
        $listingInfo->has_furnishings =          (Input::has('furnishing_name')) ? true : false;

        $listingInfo->owner_pays_internet =     (Input::has('internet_name')) ? true : false;
        $listingInfo->owner_pays_water =        (Input::has('water_name')) ? true : false;
        $listingInfo->owner_pays_electricity =  (Input::has('electricity_name')) ? true : false;
        $listingInfo->owner_has_pets =          (Input::has('allergy_name')) ? true : false;
        $listingInfo->allowed_dogs =            (Input::has('dogs_name')) ? true : false;
        $listingInfo->allowed_cats =            (Input::has('cats_name')) ? true : false;
        $listingInfo->allowed_other_pets =      (Input::has('otherPets_name')) ? true : false;
        $listingInfo->smoke_free =              (Input::has('smoke_name')) ? true : false;
        $listingInfo->details_pets =            Input::get('petDescription_name');

        $listingInfo->mls_number =              Input::get('mls', 'N/A');
        
        $listingInfo->rental_length_months_min = Input::get('rentalLength_name');
        $listingInfo->rental_available_from = Input::get('dateFrom_name');
        $listingInfo->rental_available_to = Input::get('dateTo_name', NULL);
        
        $listingInfo->save();

        $imageNum = 0;

        foreach ($request->file('image') as $file) {
            $imageNum = $imageNum + 1;
            $file_prefix = 'images/listing_photos/';

            $img = Image::make($file);
            $img_t = Image::make($file);

            $img->resize(600, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            $img->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            });


            $filename = $file_prefix . time() . '_imgNum' . $imageNum . '_' . $listing->listing_id;

            $img->save($filename);
            $img_t->save($filename . '_thumb', 100);

            $lis_img = new Listing_Image;
            $lis_img->listing_id = $listing->listing_id;
            $lis_img->image_filename = $filename;
            $lis_img->image_filename_thumbnail = $filename . '_thumb';
            $lis_img->save();
        }

		/* Scan new listing for saved searches match, and send SMS message */

		$dbg = false;  //set to true for testing

		$query = <<<SQL
			SELECT 	*
			FROM 	homestead.saved_searches AS SEARCH
			INNER 	JOIN homestead.users AS USER ON SEARCH.user_id = USER.user_id
SQL;
		$searches = DB::select($query);


		foreach($searches as $s) {
			$match = true;

			if($dbg)print "User {$s->first_name} has a search<br>";

			$str = $s->phone;
			$ph = "";

			for($i=0; $i<strlen($str); $i++) {
				if( is_numeric($str[$i]) )
					$ph = $ph . $str[$i];
			}


			if($ph[0] == 1)
				$ph = substr($ph, 0, 11);
			else
				$ph = substr($ph, 0, 10);


			if($dbg)printf("The phone is : " .  $ph . "<br>");


			/* Check price range if max pricing is not in saved search */
			if( $s->price_monthly_max < 2000) {
				if( ($listingInfo->price_monthly >= $s->price_monthly_min) &&
					  ($listingInfo->price_monthly <= $s->price_monthly_max) ) {
					if($dbg)print "Price matches search criteria<br>";

				}
				else
					$match = false;
			}


			if( $listingInfo->num_bedrooms_total < $s->num_bedrooms_total )
				$match = false;
			if($dbg){if(!$match) print "No match 1<br>";}

			if( $listingInfo->num_bathrooms_total < $s->num_bathrooms_total )
				$match = false;
			if($dbg){if(!$match) print "No match 2<br>";}

			if( $listingInfo->num_roommates_max > $s->num_roommates_max )
				$match = false;
			if($dbg){if(!$match) print "No match 3<br>";}

			if( ($s->has_kitchen == 1 ? true : false) && !$listingInfo->has_kitchen )
				$match = false;
			if($dbg){if(!$match) print "No match 4 {$listingInfo->has_kitchen} {$listingInfo->has_kitchen} " . (Input::has('kitchen_name') ? "A" : "B") . "<br>";}

			if( ($s->has_laundry == 1 ? true : false) && !$listingInfo->has_laundry )
				$match = false;
			if($dbg){if(!$match) print "No match 5<br>";}

			if( ($s->has_yard == 1 ? true : false) && !$listingInfo->has_yard )
				$match = false;
			if($dbg){if(!$match) print "No match 6<br>";}

			if( ($s->has_furnishings == 1 ? true : false) && !$listingInfo->has_furnishings )
				$match = false;
			if($dbg){if(!$match) print "No match 7<br>";}

			if( ($s->owner_pays_internet == 1 ? true : false) && !$listingInfo->owner_pays_internet )
				$match = false;
			if($dbg){if(!$match) print "No match 8<br>";}

			if( ($s->owner_pays_water == 1 ? true : false) && !$listingInfo->owner_pays_water )
				$match = false;
			if($dbg){if(!$match) print "No match 9<br>";}

			if( !($s->owner_has_pets == 1 ? true : false) && $listingInfo->owner_has_pets )
				$match = false;
			if($dbg){if(!$match) print "No match 10<br>";}

			if( ($s->allowed_dogs == 1 ? true : false) && !$listingInfo->allowed_dogs )
				$match = false;
			if($dbg){if(!$match) print "No match 11<br>";}

			if( ($s->allowed_cats == 1 ? true : false) && !$listingInfo->allowed_cats )
				$match = false;
			if($dbg){if(!$match) print "No match 12<br>";}

			if( ($s->allowed_other_pets == 1 ? true : false) && !$listingInfo->allowed_other_pets )
				$match = false;
			if($dbg){if(!$match) print "No match 13<br>";}


			if($match && strlen($ph) == 10) {
				if($dbg)print "This listing matches your search criteria<br>";


				$msg = <<<MSG
Hello {$s->first_name}!
Homestead has found a {$listingInfo->num_bedrooms_total} bedroom,{$listingInfo->num_bathrooms_total} bathroom property that matches the criteria in your saved search #{$s->saved_search_id}.

Please visit our website to check out the listing for more details!

Regards,
 The Homestead Team

MSG;

				$em = $s->email;

				Mail::raw($msg, function ($message) use ($ph, $msg) {
					$message->from('homestead.proto@gmail.com', 'Homestead');
					$message->to('sms4f00@gmail.com');
					$message->subject($ph);
				});     

				Mail::raw($msg, function ($message) use ($ph, $msg, $em) {
					$message->from('homestead.proto@gmail.com', 'Homestead');
					$message->to($em);
					$message->subject('Homestead listing search results');

					//print "SMS sent to $ph<br>";
				});     

			}
			else {if($dbg)print "This listing does not match your search criteria<br>";}
		}


		if($dbg)return (var_dump($searches) . var_dump($listingInfo));

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
            $laundry = (Input::has('laundry')) ? 1 : null;
            $internet =     (Input::has('internet')) ? 1 : null;
            $water =        (Input::has('water')) ? 1 : null;
            $electricity =  (Input::has('hydro')) ? 1 : null;
            $smoke =  (Input::has('smoke')) ? 1 : null;
            $yard =  (Input::has('yard')) ? 1 : null;
            $pets = (Input::has('nopets')) ? 1 : null;
            $dogs =            (Input::has('dogs')) ? 1 : null;
            $cats =            (Input::has('cats')) ? 1 : null;
            $other_pets =      (Input::has('other')) ? 1 : null;
            $numMates = Input::get('MaxNumRoommates');
            
            if($maxPrice == 2000) $maxPrice = 99999;
            //$locations = Location::where('city', $region)->get();
            
            //$listings = $locations->listing();    
            $query = Listing_Info::whereIfNotNull('num_bedrooms_total', "<=",$rooms)
                ->whereIfNotNull('price_monthly',"<=", $maxPrice)
                ->whereIfNotNull('price_monthly',">=", $minPrice)
                ->whereIfNotNull('num_bathrooms_total', "<=",$bathrooms)
                ->whereIfNotNull('has_laundry', "=", $laundry)
                ->whereIfNotNull('owner_pays_internet', "=",$internet)
                ->whereIfNotNull('has_kitchen', "=",$kitchen)
                ->whereIfNotNull('owner_pays_electricity', "=",$electricity)
                ->whereIfNotNull('owner_pays_water', "=",$water)
                ->whereIfNotNull('has_laundry', "=",$laundry)
                ->whereIfNotNull('has_yard', "=",$yard)
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
                    $count = $count + 1;
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
            
            //$locations = explode(',', $region);
            
            //gonna add country later
            $save = new Saved_Search;
            
            $save->user()->associate(Auth::user());
          
            $save->country = Input::get('country');
            $save->city = Input::get('region');
            //$save->country = $locations[1];
            $save->price_monthly_min = Input::get('minPrice');
            $save->price_monthly_max = Input::get('maxPrice');
            $save->num_bathrooms_total = Input::get('bathrooms');
            $save->num_bedrooms_total = Input::get('rooms');
            $save->has_kitchen = (Input::has('hasKitchen')) ? 1: 0;
            $save->owner_pays_internet = (Input::has('internet')) ? 1: 0;
            $save->owner_pays_water = (Input::has('water')) ? 1: 0;
            $save->owner_pays_electricity = (Input::has('hydro')) ? 1: 0;
            $save->owner_has_pets = (Input::has('nopets')) ? 1 : 0;
            $save->allowed_dogs = (Input::has('dogs')) ? 1 : 0;
            $save->allowed_cats = (Input::has('cats')) ? 1 : 0;
            $save->has_yard = (Input::has('yard')) ? 1 : 0;
            $save->has_laundry= (Input::has('laundry')) ? 1 : 0;
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