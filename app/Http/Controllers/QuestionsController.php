<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class QuestionsController extends Controller
{
    public function index()
    {
        $categories = Category::all()->sortBy("title");
        return view('questions.index', [
            'categories' => $categories
        ]);
    }

    public function showAnswers(Request $request)
    {
        $category = $request->category;
        $history = $request->history;
        $historyDescr = $request->history_description;
        if ($category = Category::find($category)){
            $posts = $category->posts->all();
        } else{
            $posts = 0;
        }
        return view('questions.answers', [
            'posts' => $posts,
        ]);
    }
}
