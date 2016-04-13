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
        $this->validate($request, [
            'firstName' => 'required|max:60',
            'lastName'  => 'required|max:60',
            'email'     => 'bail|required|confirmed|email|max:255|unique:users',
            'pass'      => 'bail|required|confirmed|min:6|max:60',
            'phone'     => 'bail|required|min:10|max:18|unique:users'
        ]);


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

    public function updatePassword(Request $request){

            $validator = Validator::make($request->all(), [
                'oldPass' => 'required'
            ]);
    
            $this->validate($request, [
                'nPass' => 'bail|required|confirmed|min:6|max:60',
            ]);

            if(!Auth::attempt(['email' => Auth::user()->email, 'password' => Input::get('oldPass')])){
                return redirect('profileSettings/'.Auth::user()->user_id)
                    ->withErrors(['The currently set password was not inputted correctly']);
            }
                $newPass = Hash::make(Input::get('nPass'));
                 $user = Auth::user();
                 Auth::user()->fill([
                     'password' => $newPass])->save();
                     return redirect('profileSettings/'.Auth::user()->user_id)
                            ->with('update','Password Change Successful');
    }

    public function updateName(Request $request){
        $this->validate($request, [
                'firstName' => 'required|confirmed|max:60',
                'lastName' => 'required|confirmed|max:60',
            ]);   

        Auth::user()->fill([
                     'first_name' => Input::get('firstName'),
                     'last_name' => Input::get('lastName')])->save();         

        return redirect('profileSettings/'.Auth::user()->user_id)
                            ->with('update','Name Change Successful');
    
    }

    public function updatePhoneNumber(Request $request){
        $this->validate($request, [
                'phone' => 'bail|required|confirmed|min:10|max:18|unique:users',
            ]);   

        Auth::user()->fill([
                     'phone' => Input::get('phone')])->save();         

        return redirect('profileSettings/'.Auth::user()->user_id)
                            ->with('update','Phone Number Change Successful');
    
    }    

}
