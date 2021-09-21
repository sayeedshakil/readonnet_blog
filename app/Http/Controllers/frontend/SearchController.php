<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request) {

        if(isset($_GET['search_for'])){
            $search_text = $_GET['search_for'];
            $search_results = Post::where('title','LIKE','%'.$search_text.'%')->paginate(3);

            $posts = Post::with('category','tags')
                    ->where('is_active', '1')
                    ->take(5)
                    ->latest()
                    ->get();
            $categories = Category::all();
            $tags = Tag::pluck('name')->take(10);
            return view('frontend.search.index',compact('search_results','posts','categories','tags'));
        }


    }
}
