<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Mail\Mailer;
use Mail;
use Hash;
use Auth;
use Image;
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
        

        Mail::raw('This is a message from Homestead.  A property in your saved searches has been found, please visit the website to see the results.' , function ($message) {
            $message->from('homestead.proto@gmail.com', 'Homestead');
            $message->to('sms4f00@gmail.com');
			$message->subject('9059310355');
        });     

        $user->save();
        return redirect('signIn');
    }
    
	public function profileSettingPagePopulation(){
		$user = Auth::user();
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
                return redirect('profileSettings')
                    ->withErrors(['The currently set password was not inputted correctly']);
            }
                $newPass = Hash::make(Input::get('nPass'));
                 $user = Auth::user();
                 Auth::user()->fill([
                     'password' => $newPass])->save();
                     return redirect('profileSettings')
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

        return redirect('profileSettings')
                            ->with('update','Name Change Successful');
    
    }

    public function updatePhoneNumber(Request $request){
        $this->validate($request, [
                'phone' => 'bail|required|confirmed|min:10|max:18|unique:users',
            ]);   

        Auth::user()->fill([
                     'phone' => Input::get('phone')])->save();         

        return redirect('profileSettings')
                            ->with('update','Phone Number Change Successful');
    
    }    


    public function updateImage(Request $request){
        $this->validate($request, [
                'photo' => 'bail|required|image',
            ]);   
        
        if ($request->hasFile('photo')) {
            $user = Auth::user();
            $img = Image::make(Input::file('photo'));
            // resize the image to a width of 300 and constrain aspect ratio (auto height)
            $img->resize(800, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            $img->crop(800, 800);

            $filename = 'images/profile'.$user->user_id.'jpg';
            $img->save($filename, 100);

            $user->fill(['user_image_filename' => $filename])->save();


        return redirect('profileSettings')
                            ->with('update','Profile Image Change Successful');


        }

    }

}
