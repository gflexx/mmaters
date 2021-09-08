<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // validate input
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);

        $username = $request->username;
        $pwd = $request->password;
        $remember = $request->remember;

        // if user not logged in return with status
        if(! Auth::attempt(['username' => $username, 'password' => $pwd], $remember)){
            return back()->with('status', 'Incorrect email or password');
        }
         
        // redirect user to profile
        return redirect('profile');
    }
}
