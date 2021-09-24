<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//home
Route::get('/', [App\Http\Controllers\frontend\HomeController::class, 'index'])->name('home');
//frontend
Route::group(['as'=>'readonnet.'],function(){
    //posts
    Route::get('posts', [App\Http\Controllers\frontend\PostController::class, 'index'])->name('posts.index');
    Route::get('posts/{post}', [App\Http\Controllers\frontend\PostController::class, 'show'])->name('posts.show');
    Route::get('category/{category:name}', [App\Http\Controllers\frontend\CategoryController::class, 'index'])->name('category_posts');
    Route::get('writer/profile/{profile:unique_user_id}', [App\Http\Controllers\frontend\WriterProfileController::class, 'index'])->name('writer_profile');
    // Route::view('about', 'pages.about')->name('about');
    Route::get('search',[App\Http\Controllers\frontend\SearchController::class, 'search'])->name('posts.search');

});


//backend routes
Auth::routes();
Route::group(['middleware'=>'auth','prefix'=>'backend', 'as'=>'backend.'], function(){
    Route::get('/dashboard', [App\Http\Controllers\backend\HomeController::class, 'index'])->name('dashboard');
    Route::post('/mark-as-read', [App\Http\Controllers\backend\HomeController::class, 'markNotification'])->name('markNotification');

    //categories
    Route::delete('categories_mass_destroy', [App\Http\Controllers\backend\CategoryController::class, 'massDestroy'])->name('categories.mass_destroy');
    Route::resource('categories', App\Http\Controllers\backend\CategoryController::class);
    //users
    Route::delete('users_mass_destroy', [App\Http\Controllers\backend\UserController::class, 'massDestroy'])->name('users.mass_destroy');
    //Route::get('users_mass', [App\Http\Controllers\backend\UserController::class, 'mass'])->name('users.mass');
    Route::resource('users', App\Http\Controllers\backend\UserController::class);
    //roles
    Route::delete('roles_mass_destroy', [App\Http\Controllers\backend\RoleController::class, 'massDestroy'])->name('roles.mass_destroy');
    Route::resource('roles', App\Http\Controllers\backend\RoleController::class);
    // Permissions
    Route::delete('permissions/destroy', [App\Http\Controllers\backend\PermissionController::class, 'massDestroy'])->name('permissions.mass_destroy');
    Route::resource('permissions', App\Http\Controllers\backend\PermissionController::class);
    // posts
    Route::post('posts/editor/upload', [App\Http\Controllers\backend\PostController::class, 'editorUpload'])->name('posts.editor_upload');
    Route::put('posts/review/{post}', [App\Http\Controllers\backend\PostController::class, 'reviewPost'])->name('post.review');
    Route::delete('posts/destroy', [App\Http\Controllers\backend\PostController::class, 'massDestroy'])->name('post.mass_destroy');
    Route::get('posts/check_slug',[App\Http\Controllers\backend\PostController::class, 'checkSlug'])->name('post.checkSlug');
    Route::resource('posts', App\Http\Controllers\backend\PostController::class);
    //allPosts
    Route::put('allPosts/review/{allPost}', [App\Http\Controllers\backend\AllPostController::class, 'reviewPost'])->name('allPosts.review');
    Route::resource('allPosts', App\Http\Controllers\backend\AllPostController::class);
    // Change Password Routes...
    Route::get('change_password', [App\Http\Controllers\Auth\ChangePasswordController::class, 'showChangePasswordForm'])->name('auth.change_password');
    Route::patch('change_password', [App\Http\Controllers\Auth\ChangePasswordController::class,'changePassword'])->name('auth.change_password');
    //profile
    Route::resource('profiles', App\Http\Controllers\backend\ProfileController::class);


});

Route::get('/clear', function() {

    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    // Artisan::call('route:cache');
    // Artisan::call('migrate');
    return "Cleared!";
    });
