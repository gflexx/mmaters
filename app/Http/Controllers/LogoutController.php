<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function index()
    {
        // use Auth to logout
        Auth::logout();

        // redirect to home
        return redirect('/');
    }
}
