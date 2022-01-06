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

    public function delete_user(Request $request){
        $user_id = $request->object_id;
        $user = User::findOrFail($user_id);

        //  delete user messages and comments first
        $user->sent_messages()->delete();
        $user->received_messages()->delete();
        $user->comments()->delete();

        // delete user
        $user->delete();
        return redirect('admin');
    }

    public function delete_post(Request $request){
        $post_id = $request->object_id;
        $post = Post::findOrFail($post_id);
        $post->delete();
        return redirect('admin');
    }

    public function delete_confirm(Request $request){
        $type = $request->type;
        $object_id = $request->object_id;

        // get object type and name`
        if($type == 1){
            $object_type = "User";
            $user = User::findOrFail($object_id);
            $object_name = $user->username;
        } else{
            $object_type = "Post";
            $post = Post::findOrFail($object_id);
            $object_name = $post->title;
        }

        return view('email.confirm_delete', [
            'type' => $type,
            'object_id' => $object_id,
            'object_type' => $object_type,
            'object_name' => $object_name
        ]);
    }
}
