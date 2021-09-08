<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::all()->sortByDesc("created_at");

        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    public function create()
    {
        $categories = Category::all()->sortBy("title");
        return view('posts.create', [
            'categories' => $categories
        ]);
    }

    public function add(Request $request)
    {
        // validate input
        $this->validate($request, [
            'title' => 'required',
            'text' => 'required',
            'category' => 'required',
            'img' => 'required|mimes:png,jpg,jpeg',
        ]);

        // get image name
        $imgName =  $request->file('img')->getClientOriginalName();

        // save path and uploaded image 
        $imgPath = $request->file('img')->move('posts', $imgName);

        $title = $request->title;
        $text = $request->text;
        $category = $request->category;

        // create object
        auth()->user()->posts()->create([
            'title' => $title,
            'text' => $text,
            'category_id' => $category,
            'image' => $imgPath,
        ]);

        return redirect('profile');
    }

    public function show($post)
    {
        $post = Post::findOrFail($post);

        return view('posts.show', [
            'post' => $post
        ]);
    }
}
