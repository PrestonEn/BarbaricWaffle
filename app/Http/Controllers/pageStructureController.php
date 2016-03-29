<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class pageStructureController extends Controller
{

    public function signIn(){
    	return view('signIn');
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
        return view('addListing');
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
