<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Listing;
use App\User;
use App\Location;
use App\Listing_Info;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class lisController extends Controller
{
    
		public function allListings(){
			$listingInfo = Listing_Info::where('is_active','=',1)->orderBy('created_at')->get();
			$num = Listing_Info::where('is_active','=',1)->count();	
			return view('testing.listingsList', compact('listingInfo'), compact('num'));
		}

		public function mainProfileActiveListings($userId){
			$user = User::where('user_id','=',$userId)->first();
			$listingsActive = $user->listings;
			//$listingsActive = Listing_Info::all();
			return view('testing.profile', compact('listingsActive'), compact('user'));
		}

		public function getProfileListings($userId){
			$user = User::where('user_id','=',$userId)->first();
			$listingsActive = $user->listings;
			$listingsInactive = $user->listings::where('is_active','=',0)->get();
			return view ('testing.profilePostings', compact('listingActive'), compact('listingInactive'));
		}

/*			print($listings);


			foreach($listings as $listings){
				print(Listing_Info::where('listings_id','=',$listings->listings_id)->get());
			}


			print('<br>');
			//print($listings->listings_id);
			print('<br>');
			print(User::where('users_id','=',12)->first());
			print('<br>');


			//print(Listing_Info::where('listings_id','=',$listings->listings_id)->get());
			

//locInfo = Listing_Info::where('listings_id','=',$listings->listings_id);
		//	print($locInfo->listings_id);


			//return view('testing.listingsList', compact('listings'));
		}

		public function listingsByPerson($user_id){

		}
/*

	    public function allListings(){


	    $listings = Listing::first();
	    $user = User::where('users_id','=',$listings->users_id)->get();

	  //  $user = \App\User::where(
 		

    	return $listings->listings_id;
    	//return view('testing.listingsList', compact('listings'));
    }



*/



}
