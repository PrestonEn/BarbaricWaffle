<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
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
            
			return view('mapListing', compact('listingInfo','location'), compact('num'));
		}

		public function mainProfileActiveListings($userId){
			$user = User::where('user_id','=',$userId)->first();
			$listingsActive = Listing::users_listings($userId)->get(); //Is this supposed to also have ->active()?
			return view('profile', compact('listingsActive'), compact('user'));
		}

		public function getProfileProperties($userId){
			$user = User::where('user_id','=',$userId)->first();
			$locations = $user->locations;
			return view ('profileProperties', compact('locations'));
		}

		public function getProfileListings($userId){
			$user = User::where('user_id','=',$userId)->first();
			$listings = Listing::users_listings($userId)->get();
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
			$locations = $user->locations;
			return view('profileView', compact('locations'), compact('user'));
		}

		public function getPropertyListings($locationId){
			$location = Location::where('location_id','=',$locationId)->first();
			$listings = $location->listing;
			return view('listingByProperty', compact('listings'), compact('location'));
		}

}
