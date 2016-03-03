<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class pageStructureController extends Controller
{

    public function signIn(){
    	return view('testing.signIn');
    }

    public function signUp(){
    	return view('testing.signUp');
    }

    public function mapListing(){
    	return view('testing.mapListing');
    }

    public function profile(){
    	return view('testing.profile');
    }
    public function portalPage(){
        return view('testing.portalPage');
    }
    
    public function profileFavourites(){
        return view('testing.profileFavourites');
    }

    public function profileSettings(){
        return view('testing.profileSettings');
    }

    public function profilePostings(){
        return view('testing.profilePostings');
    }

    public function addListing(){
        return view('testing.addListing');
    }

    public function houseTemplate(){
        return view('testing.houseTemplate');
    }

    public function profileSearches(){
        return view('testing.profileSearches');
    }

    public function listingsList(){
        return view('testing.listingsList');
    }

    public function passwordRetrieval(){
        return view('testing.passwordRetrieval');
    }

    public function profileMessages(){
        return view('testing.profileMessages');
    }

}
