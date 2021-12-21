<?php

namespace App\Http\Controllers;

use App\Models\Email;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function admin(){
        $users = User::all()->except(auth()->user()->id);
        $posts = Post::all();
        $emails = [];

        return view('email.index', [
            'users' => $users,
            'posts' => $posts,
            'emails' => $emails,
        ]);
    }
}
