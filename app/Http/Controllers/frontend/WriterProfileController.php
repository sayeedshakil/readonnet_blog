<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class WriterProfileController extends Controller
{
    public function index(User $profile){
        $profile->load('posts');
        $categories = Category::all();

        return view('frontend.writerProfile.index', compact('profile','categories'));
    }
}
