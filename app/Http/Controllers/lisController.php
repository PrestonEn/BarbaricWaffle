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
/*			$listingInfo = Listing_Info::all();
			print($listingInfo);
*/

			//$listingInfo = Listing::find(1)->listing_info->active();
			$listingInfo = Listing_Info::where('is_active','=',1)->get();			
			
			//$listTest = Listing_Info::find(1)->location;
			return view('testing.listingsList', compact('listingInfo'));
		

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
