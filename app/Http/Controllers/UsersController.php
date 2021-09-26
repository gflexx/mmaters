<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Message;
use App\Models\Post;
use App\Models\User;
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
        $posts = Post::where('user_id', $usrId)->get();
        $msgs = Message::where('receiver_id', $usrId)->get();

        return view('profile.index', [
            'categories' => $categories,
            'posts' => $posts,
            'msgs' => $msgs
        ]);
    }

    public function edit($user)
    {
        $usr = User::findOrFail($user);
        return view('profile.edit', [
            'user' => $usr
        ]);
    }

    public function save_edit(Request $request)
    {
        $data = $this->validate($request, [
            'username' => 'required',
            'email' => 'required'
        ]);

        if($request->image)
        {
            $imgName =  $request->file('image')->getClientOriginalName();

            // save file to storage
            $imgPath = $request->file('image')->move('avatars', $imgName);

            // save image to array
            $imgArr = ['image' => $imgName];
        }

        auth()->user()->update(array_merge(
            $data,
            $imgArr ?? []
        ));

        return redirect('profile');
    }
}
