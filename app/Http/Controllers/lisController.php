<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Listing;
use App\User;
use App\Location;
use App\Listing_Info;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class lisController extends Controller
{
   		public function allListings($order){

			if($order==1){
				$listingInfo = Listing_Info::where('is_active','=',1)->orderBy('created_at')->get();
			}
			if($order==2){
				$listingInfo = Listing_Info::where('is_active','=',1)->orderBy('price_monthly','asc')->get();	
			}
			if($order==3){
				$listingInfo = Listing_Info::where('is_active','=',1)->orderBy('price_monthly','desc')->get();	
			}
			$num = Listing_Info::where('is_active','=',1)->count();	
			return view('testing.listingsList', compact('listingInfo'), compact('num'));
		}

		public function mapListings(){
			$listingInfo = Listing_Info::where('is_active','=',1)->get();
			$num = Listing_Info::where('is_active','=',1)->count();	
			return view('testing.mapListing', compact('listingInfo'), compact('num'));
		}

		public function mainProfileActiveListings($userId){
			$user = User::where('user_id','=',$userId)->first();
			$listingsActive = $user->listings;
			return view('testing.profile', compact('listingsActive'), compact('user'));
		}

		public function getProfileListings($userId){
			$user = User::where('user_id','=',$userId)->first();
			$listings = $user->listings;
			$inactiveListings = $user->listings;
			return view ('testing.profilePostings', compact('listings'), compact('inactiveListings'));
		}

		public function getFavouriteListings($userId){
			$user = User::where('user_id','=',$userId)->first();
			$list = Listing::all();
			$listings = $user->favourite_listings;
			return view ('testing.profileFavourites', compact('listings'));
		}

		public function singleListingInfo($listingId){
			$listings = Listing_Info::where('listing_id','=',$listingId)->get();
			$listingInfo = $listings->first();

			$creationDate = $listingInfo->created_at;
			$date = $creationDate->diffInDays();

			return view('testing.houseTemplate', compact('listingInfo'), compact('date'));
		}

		public function viewForeignProfile($userId){
			$user = User::where('user_id','=',$userId)->first();
			$listingsActive = $user->listings;
			return view('testing.profileView', compact('listingsActive'), compact('user'));
		}



}
