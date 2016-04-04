<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class userController extends Controller
{

        /**
     * Access data from registration form
     * Create a new user model
     * Save Model to database
     *
     * Redirect them to login
     */
    public function add(Request $request){
        $this->validate($request, [
            'email' => 'bail|required|max:255'
        ]);

        

    }
    
	public function profileSettingPagePopulation($userId){
		$user = User::where('user_id','=',$userId);
		$user = $user->first();
		return view('profileSettings', compact('user'));
	}


}
