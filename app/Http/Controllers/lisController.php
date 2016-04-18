<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Image;
use App\Listing;
use App\User;
use App\Location;
use App\Listing_Info;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Saved_Search;
use Auth;
class lisController extends Controller
{
	public function allListings($order){
		$listingInfoQuery = Listing_Info::active();
		if ($order == 1) {
			$listingInfoQuery->orderBy('created_at');
		}elseif ($order == 2) {
			$listingInfoQuery->orderBy('price_monthly','asc');
		}elseif ($order == 3) {
			$listingInfoQuery->orderBy('price_monthly','desc');	
		}
		$listingInfo = $listingInfoQuery->get();
		$num = $listingInfoQuery->count();	
		return view('listingsList', compact('listingInfo'), compact('num'))->with('order', $order);
	} 
    
	public function mapListings(){
		$listingInfo = Listing_Info::where('is_active','=',1)->get();
		$num = Listing_Info::where('is_active','=',1)->count();	
        $location = Location::select('city', 'country')->groupBy('city')->get();
   		if(Auth::check()){
        	$savedSearch = Saved_Search::where('user_id', '=', Auth::user()->user_id)->get();
    	}else{
    		$savedSearch = null;
    	}
		return view('mapListing', compact('listingInfo','location', 'savedSearch'), compact('num'));
	}

	public function mainProfileActiveListings(){
		$user = Auth::user();
		$listingsActive = Listing::users_listings($user->user_id)->get(); //Is this supposed to also have ->active()?
		return view('profile', compact('listingsActive'), compact('user'));
	}

	public function getProfileProperties(){
		$user = Auth::user();
		$locations = $user->locations;
		return view ('profileProperties', compact('locations'));
	}

	public function getProfileListings(){
		$user = Auth::user();
		$listings = Listing::users_listings($user->user_id)->get();
		return view ('profilePostings', compact('listings'));
	}

	public function getFavouriteListings(){
		if(!Auth::check()){
        	return redirect('signIn')->withErrors(['You need to be signed in to save and view favorites!']);
		}else{
			$user = Auth::user();//User::where('user_id','=',$userId)->first();
			$listings = $user->favourite_listings;
			return view ('profileFavourites', compact('listings'));
		}
	}

	public function singleListingInfo($listingId){
		//Should this have an ->active()?
		$listing = Listing::where('listing_id','=',$listingId)->first();
		$user = $listing->location->user;


		$listings = Listing_Info::where('listing_id','=',$listingId)->get();
		$listingInfo = $listings->first();

		$creationDate = $listingInfo->created_at;
		$date = $creationDate->diffInDays();
		return view('houseTemplate', compact('listingInfo'), compact('date'))->with('user',$user);
	}

	public function viewForeignProfile($userId){
		$user = User::where('user_id','=',$userId)->first();
		//$locations = $user->locations;
		$listings = Listing::users_listings($userId)->get();
		return view('profileView', compact('listings'), compact('user'));
	}

	public function getPropertyListings($locationId){
		$location = Location::where('location_id','=',$locationId)->first();
		$listings = $location->listing;
		return view('listingByProperty', compact('listings'), compact('location'));
	}

	public function addToFavourites($listingId){
		$user = Auth::user();

		foreach ($user->favourite_listings as $fav) {
			if ($fav->listing_id == $listingId){
				return redirect('profileFavourites');
			}
		}
		$listing = Listing::where('listing_id','=',$listingId)->first();
		$user->favourite_listings()->save($listing);
		return redirect('profileFavourites');
	}

	public function removeFromFavourites(){
		$toRemove = json_decode(Input::get('array'));
		$user->favourite_listings()->detach($toRemove);
		return redirect('../profileFavourites');
	}

	public function removeFromListings(){
		$toRemove = json_decode(Input::get('array'));
		foreach ($toRemove as $remove) {
			$listings = Listing::where('listing_id','=',$remove)->first();
			$listInfo = $listings->listing_info->first();
			$listInfo->is_active = 0;
			$listInfo->save();
		}
		return redirect('profilePostings');
	}

	public function removeProperties(){
		$toRemove = json_decode(Input::get('array'));
		foreach ($toRemove as $rem) {
			$location = Location::where('location_id','=',$rem)->first();;
			$listings = $location->listing;
			foreach ($listings as $listing) {
				$listInfo = $listing->listing_info->first();
				$listInfo->delete();	
				$listing->delete();
			}
			$location->delete();
		}
		return redirect('profileProperties');
	}

	public function getProperyFromListing($ListingId){
		$list = Listing::where('listing_id','=',$ListingId)->first();
		$location = $list->location;
		$listings = $location->listing;
		return view('listingByProperty', compact('listings'), compact('location'));
	}

	public function removeSearches(){
		$toRemove = json_decode(Input::get('array'));

		foreach ($toRemove as $rem) {
			$search = Saved_Search::where('saved_search_id','=',$rem)->first();
			$search->delete();
		}
	return redirect('profileSearches');
	}

	public function getSearchListings($searchId){
		$search = Saved_Search::where('saved_search_id','=',$searchId)->first();
		$listing = Listing::where('date_created_min','>=',$search->date_created_min)->first();
		dd($listing);
	}
}


/*
'date_created_min',
            'date_created_max',
            'is_active',
            'search_description',
            'price_monthly_min',
            'price_monthly_max',
            'rental_length_months_min',
            'rental_length_months_max',
            'rental_available_from',
            'rental_available_to',
            'room_size_sqft_min',
            'room_size_sqft_max',
            'num_roommates_max',
            'has_furnishings',
            'has_kitchen',
            'has_laundry',
            'has_yard',
            'owner_pays_internet',
            'owner_pays_water',
            'owner_pays_electricity',
            'owner_has_pets',
            'allowed_dogs',
            'allowed_cats',
            'allowed_other_pets'

*/