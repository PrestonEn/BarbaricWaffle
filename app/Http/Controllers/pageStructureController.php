<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;

class pageStructureController extends Controller
{

    public function signIn(){
    	return view('signIn');
    }

    public function searches(){
        return view('addSearches');
    }

    public function signUp(){
    	return view('signUp');
    }

    public function mapListing(){
    	return view('mapListing');
    }

    public function profile(){
    	return view('profile');
    }
    public function portalPage(){
        return view('portalPage');
    }
    
    public function profileFavourites(){
        return view('profileFavourites');
    }

    public function profileSettings(){
        return view('profileSettings');
    }

    public function profilePostings(){
        return view('profilePostings');
    }

    public function addListing(){
        if(!Auth::check()){
            return redirect('signIn')->withErrors(['You need to be signed in to post a listing!']);
        }else{
            $user = User::where('user_id','=', '21')->first();
            $locations = $user->locations;
            return view('addListing', compact('locations'));
        }
    }
    
    public function addProperty(){
        if(!Auth::check()){
           return redirect('signIn')->withErrors(['You need to be signed in to add a property!']);
        }
        return view('addProperty');
    }

    public function houseTemplate(){
        return view('houseTemplate');
    }

    public function profileSearches(){
        return view('profileSearches');
    }

    public function listingsList(){
        return view('listingsList');
    }

    public function passwordRetrieval(){
        return view('passwordRetrieval');
    }

    public function profileMessages(){
        return view('profileMessages');
    }

}
