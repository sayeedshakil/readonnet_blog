<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {


        // if(isset($_GET['query'])){
        //     $posts = Post::with('category','tags')
        //             ->where('is_active', '1')
        //             ->take(5)
        //             ->latest()
        //             ->get();
        //     $categories = Category::all();
        //     $tags = Tag::pluck('name')->take(10);

        //     $search_text = $_GET['query'];
        //     $search_results = Post::where('title','LIKE','%'.$search_text.'%')->paginate(3);
        //     return view('frontend.home.index',compact('search_results','posts','categories','tags'));
        // }
        // else{
        //     return view('frontend.home.index');
        // }


    }
    public function clear_search_result()
    {


    }
}
