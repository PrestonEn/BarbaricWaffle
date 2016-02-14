<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class pageStructureController extends Controller
{

    public function navbarTop(){
    	return view('testing.profileSection');
    }

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

    public function profileEdit(){
        return view('testing.profileFavourites');
    }

}
