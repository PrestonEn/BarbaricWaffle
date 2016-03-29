<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class userController extends Controller
{
    
	public function makeInactive(){
			return view('mapListing');
	}
}
