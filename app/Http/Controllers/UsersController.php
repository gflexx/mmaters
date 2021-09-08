<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    // prevent unathorized access by auth middleware
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    
    public function index()
    {
        $categories = Category::all();
        $usrId = auth()->user()->id;
        $qs = DB::table('posts')->where('user_id', $usrId);
        $posts = Post::where('user_id', $usrId)->get();
        

        return view('profile.index', [
            'categories' => $categories,
            'posts' => $posts
        ]);
    }

    public function edit()
    {
        return view('profile.edit');
    }
}
