<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function save_comment(Request $request){
        // validate input
        $data = $this->validate($request, [
            'user_id' => 'required',
            'post_id' => 'required',
            'text' => 'required',
        ]);

        $post_id = $request->post_id;
        $post = Post::findOrFail($post_id);

        $post->comments()->create($data);
        return redirect()->route('show_post', $post_id);
    }
}
