<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function create_user(Request $request)
    {
        // validate input
        $this->validate($request, [
            'email' => 'required|email',
            'username' => 'required',
            'password' => 'required|confirmed',
        ]);

        $mail = $request->email;
        $pwd = $request->password;
        $username = $request->username;

        User::create([
            'email' => $mail,
            'username' => $username,
            'password' => Hash::make($pwd),
        ]);

         // login user
         Auth::attempt(['email' => $mail, 'password' => $pwd]);

         // redirect user to profile
         return redirect('profile');
    }

    public function admin_register()
    {
        return view('auth.admin');
    }

    public function create_admin(Request $request)
    {
        // validate input
        $this->validate($request, [
            'email' => 'required|email',
            'username' => 'required',
            'password' => 'required|confirmed',
        ]);

        $mail = $request->email;
        $pwd = $request->password;
        $username = $request->username;

        User::create([
            'email' => $mail,
            'username' => $username,
            'is_admin' => 1,
            'password' => Hash::make($pwd),
        ]);

         // login user
         Auth::attempt(['email' => $mail, 'password' => $pwd]);

         // redirect user to profile
         return redirect('profile');
    }

    public function specialist_register()
    {
        return view('auth.specialist');
    }

    public function create_specialist(Request $request)
    {
        // validate input
        $this->validate($request, [
            'email' => 'required|email',
            'username' => 'required',
            'password' => 'required|confirmed',
        ]);

        $mail = $request->email;
        $pwd = $request->password;
        $username = $request->username;

        User::create([
            'email' => $mail,
            'username' => $username,
            'is_specialist' => 1,
            'password' => Hash::make($pwd),
        ]);

         // login user
         Auth::attempt(['email' => $mail, 'password' => $pwd]);

         // redirect user to profile
         return redirect('profile');
    }
}
