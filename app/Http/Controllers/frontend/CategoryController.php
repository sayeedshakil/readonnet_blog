<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Category $category){

        $category->load('posts')->paginate(4);
        $allposts = Post::where('is_active', '1')->take(5)->orderBy('id','asc')->get();
        $categories = Category::all();
        $tags = Tag::pluck('name')->take(7);
        //dd($category);
        return view('frontend.categoryPosts.index',compact('category','allposts','tags','categories'));
    }
}
