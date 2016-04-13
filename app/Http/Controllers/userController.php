<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Mail\Mailer;
use Mail;
use Hash;
use Auth;
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
        

        Mail::send('emails.registered', $arrayName = array('a' => 5) , function ($message) use ($user) {
            $message->from('homestead.proto@gmail.com', 'Your Application');
            $message->to($user->email);
        });     

        $user->save();
        return redirect('signIn');
    }
    
	public function profileSettingPagePopulation($userId){
		$user = User::where('user_id','=',$userId);
		$user = $user->first();
		return view('profileSettings', compact('user'));
	}

    public function updatePassword(){
        if(Auth::attempt(['email' => Auth::user()->email, 'password' => Input::get('oldPass')])){
            if (Input::get('nPass') == Input::get('vPass')){
                $newPass = Hash::make(Input::get('vPass'));
                $user = Auth::user();
                Auth::user()->fill([
                    'password' => $newPass])->save();
                    return view('profileSettings', compact('user'));
            }
            else {
                $text = "Inputted new passwords do not match.";
                echo $text;
                return view('profileSettings');
            }
        }else{
            $text = "Inputted current password is incorrect.";
            echo $text;
            return view('profileSettings');
        }
    }




}
