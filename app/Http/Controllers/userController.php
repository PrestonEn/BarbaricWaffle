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
    public function add(){
        $user = new User;
        $user->first_name = Input::get('firstName');
        $user->last_name = Input::get('lastName');
        
        $user->password = bcrypt(Input::get('pass'));
        
        $user->email = Input::get('emailAddress1');
        
        $user->save();
        return redirect('signIn');

    }
    
	public function profileSettingPagePopulation($userId){
		$user = User::where('user_id','=',$userId);
		$user = $user->first();
		return view('profileSettings', compact('user'));
	}


}
