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

		$images = $listing->listing_image;

		$creationDate = $listingInfo->created_at;
		$date = $creationDate->diffInDays();
		return view('houseTemplate', compact('listingInfo'), compact('date'))->with('user',$user)->with('images', $images);
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

		Auth::user()->favourite_listings()->detach($toRemove);
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

				foreach($listing->listing_image as $image){
					if ($image != null){
						$image->delete();
					}
				}
				$listInfo = $listing->listing_info->first();
				if ($listInfo != null){
					$listInfo->delete();
				}	
				$listing->delete();
			}
			$location->delete();
		}
		return redirect('profileProperties');
	}

	public function getPropertyFromListing($ListingId){
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
		$topPrice = $search->price_monthly_max;

		if ($topPrice == 2000){
			$topPrice = 5000000;
		}

		$listings = Listing_Info::whereIfNotNull('num_bedrooms_total', "=",$search->num_bedrooms_total)
                ->whereIfNotNull('price_monthly',"<=", $search->price_monthly_min)
                ->whereIfNotNull('price_monthly',">=", $topPrice)
                ->whereIfNotNull('num_bathrooms_total', "=",$search->num_bathrooms_total)
                ->whereIfNotNull('has_laundry', "=", $search->has_laundry)
                ->whereIfNotNull('owner_pays_internet', "=",$search->owner_pays_internet)
                ->whereIfNotNull('has_kitchen', "=",$search->has_kitchen)
                ->whereIfNotNull('owner_pays_electricity', "=",$search->owner_pays_electricity)
                ->whereIfNotNull('owner_pays_water', "=",$search->owner_pays_water)
                ->whereIfNotNull('owner_has_pets', "=",$search->owner_has_pets)
                ->whereIfNotNull('allowed_dogs', "=",$search->allowed_dogs)
                ->whereIfNotNull('allowed_cats', "=",$search->allowed_cats)
                ->whereIfNotNull('allowed_other_pets', "=",$search->allowed_other_pets)->get();
                return view('listingBySearch', compact('listings'));
	}
}


