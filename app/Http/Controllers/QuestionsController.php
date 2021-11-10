<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
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

        // check if inputs are present
        // compaire inputs to posts with values like inputs
        if($request->filled('other_topics')){
            $otherTopics = $request->other_topics;
            $hist_posts = Post::where([
                ['text', 'LIKE', '%'.$otherTopics.'%']
            ])
            ->get()
            ->toArray();
        }

        if($request->filled('history_description')){
            $historyDescr = $request->history_description;
            $did_heal = $request->did_heal;

            // check posts if patient did not heal
            if ($did_heal == 0){
                $descr_posts = Post::where([
                    ['text', 'LIKE', '%'.$historyDescr.'%']
                ])->get()->toArray();
            }
        }

        if ($category = Category::find($category)){
            $cat_posts = collect($category->posts->all())->toArray();
        }

        // merge all query arrays or none if nothing in array
        $all_posts = collect(array_merge(
            $hist_posts ?? [],
            $descr_posts ?? [],
            $cat_posts ?? [],
        ));

        // remove duplicate posts using ids
        $_posts  = $all_posts->unique('id')->all();

        if($_posts){
            $posts = $_posts;
        } else{
            $posts = 0;
        }

        return view('questions.answers', [
            'posts' => $posts,
        ]);
    }
}
