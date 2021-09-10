<?php

namespace App\Http\Controllers\frontend;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::with('category','tags')
                    ->where('is_active', '1')
                    ->take(5)
                    ->latest()
                    ->get();
        $categories = Category::all();
        $tags = Tag::pluck('name')->take(10);
        return view('frontend.home.index', compact('posts','categories','tags'));
    }

}
