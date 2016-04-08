<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use Validator;
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
        $v = Validator::make($request->all(), [
            'firstName' => 'required|max:60',
            'lastName'  => 'required|max:60',
            'email'     => 'bail|required|confirmed|email|max:255|unique:users,email',
            'pass'      => 'bail|required|confirmed|min:6|max:60',
            'phone'     => 'bail|required|min:10|max:18|unique:users,phone'
        ]);

        //Check if validation passes. If not, redirect.
        if ($v->fails()) {
            return redirect('signUp')
                ->withErrors($v)
                ->withInput($request->except('pass'));
        }

        $user = new User;
        $user->first_name = Input::get('firstName');
        $user->last_name = Input::get('lastName');

        $user->password = bcrypt(Input::get('pass'));
        
        $user->email = Input::get('email');
        $user->phone = Input::get('phone');
        $user->save();
        return redirect('signIn');
    }
    
	public function profileSettingPagePopulation($userId){
		$user = User::where('user_id','=',$userId);
		$user = $user->first();
		return view('profileSettings', compact('user'));
	}


}
