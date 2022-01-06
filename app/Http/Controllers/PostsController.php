<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::all()->sortByDesc("created_at");

        return view('posts.index', [
            'posts' => $posts,
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
        $comments = Comment::where('post_id', $post->id)
            ->get()
            ->reverse()
            ->values();

        return view('posts.show', [
            'post' => $post,
            'comments' => $comments,
        ]);
    }

    public function edit_post($post){
        $post = Post::findOrFail($post);
        $categories = Category::all()->except($post->category->id);
        return view('posts.edit', [
            'post' => $post,
            'categories' => $categories,
        ]);
    }

    public function save_edit(Request $request){
        $post_id = $request->post_id;

        $post = Post::findOrFail($post_id);

        $data = $this->validate($request, [
            'title' => 'required',
            'text' => 'required',
            'category' => 'required',
        ]);

        if($request->image)
        {
            $imgName =  $request->file('image')->getClientOriginalName();

            // save file to storage
            $imgPath = $request->file('image')->move('posts', $imgName);

            // save image to array
            $imgArr = ['image' => $imgPath];
        }

        $post->update(
            array_merge($data, $imgArr ?? [])
        );

        return redirect('profile');
    }
}
