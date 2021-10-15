<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all()->sortBy("title");

        return view('categories.index', [
            'categories' => $categories
        ]);
    }

    public function create()
    {
        return view('categories.create');
    }

    public function save(Request $request)
    {
        // validate input
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
        ]);

        $title = $request->title;
        $description = $request->description;

        // create object
        Category::create([
            'title' => $title,
            'description' => $description
        ]);

        return redirect('profile');
    }

    public function show($category)
    {
        $category = Category::findOrFail($category);
        $posts = $category->posts->all();

        return view('categories.show', [
            'category' => $category,
            'posts' => $posts
        ]);
    }
}
