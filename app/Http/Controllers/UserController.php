<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use App\Http\Controllers\LoginController;

class UserController extends Controller
{
    public function postSignUp(Request $request)
    {   
        $this->validate($request,[
            'name' => 'required|max:20',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:4'
        ]);

        $user = new User;
        $user->fullname = $request['name'];
        $user->email = $request['email'];
        $user->password = bcrypt($request['password']);

        $user->save();

        return redirect('/dashboard')->with('signup-success', 'Your account has been created.');
    }

    public function postSignIn(Request $request)
    {
        $this->validate($request,[
            'email' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt(['email' => $request['email'], 'password' => $request['password']])){
            return redirect('/dashboard')->with('signin-success', 'You have successfully Signed in.');           
        }
        return redirect()->back()->with('signin-faliure', 'Email or password incorrect. Try again with correct email address and password.'); 
        
    }

    public function postLogout(Request $request)
    {
        Auth::logout();
        return redirect('/')->with('logout-success', 'You have succesfully logged out.');
    }
}