<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Mail;
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
            'firstName' => 'required|bail',
            'lastName' => 'required|bail',
            'email' => 'bail|required|unique:users|max:255|confirmed',
            'pass' => 'bail|min:6|required|confirmed',
            'phone' => 'min:10|unique:users|required'
        ]);

        $user = new User;
        $user->first_name = Input::get('firstName');
        $user->last_name = Input::get('lastName');
        
        $user->password = bcrypt(Input::get('pass'));
        
        $user->email = Input::get('email');
        $user->phone = Input::get('phone');
        $user->save();

        Mail::raw(' ayyy im an ayyylean',function ($message) {
            $message->from('homestead.proto@gmail.com', 'Laravel');

            $message->to('homestead.proto@gmail.com');
        });

        return redirect('signIn');

    }
    
	public function profileSettingPagePopulation($userId){
		$user = User::where('user_id','=',$userId);
		$user = $user->first();
		return view('profileSettings', compact('user'));
	}


}
