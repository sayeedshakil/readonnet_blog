<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReviewAllPostRequest;
use App\Http\Requests\ReviewPostRequest;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;


class AllPostController extends Controller
{
    /**
    * Display a listing of User.
    *
    * @return \Illuminate\Http\Response
    */

   public function index()

   {
       abort_if(Gate::denies('allpost_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
       $posts = Post::with('category', 'user')->get();
       return view('backend.allPosts.index', compact('posts'));
   }

   /**
    * Show the form for editing User.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function edit(Post $allPost)
   {

       if ($allPost->is_active===0) {
       abort_if(Gate::denies('allpost_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $categories = Category::all();
       $tags = $allPost->tags->implode('name', ', ');

       return view('backend.allPosts.edit', compact('allPost', 'tags', 'categories'));

       }else{
           abort(Response::HTTP_FORBIDDEN,'Post has been Published!');
       }


   }

   /**
    * Update User in storage.
    *
    * @param  \App\Http\Requests\UpdateUsersRequest  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function update(UpdatePostRequest $request, Post $allPost)
   {
       abort_if(Gate::denies('allpost_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
       if ($allPost->is_active===0) {
       $tags = explode(',', $request->tags);

       if ($request->has('image')) {
           Storage::delete('public/backend/images/coverImage/' . $allPost->image);

           $filename = time() . '_' . $request->file('image')->getClientOriginalName();
           $request->file('image')->storeAs('backend/images/coverImage/', $filename, 'public');
       }

       $allPost->update([
           'title' => $request->title,
           'image' => $filename ?? $allPost->image,
           'post' => $request->post,
           'category_id' => $request->category
       ]);

       $newTags = [];
       foreach ($tags as $tagName) {
           $tag = Tag::firstOrCreate(['name' => $tagName]);
           array_push($newTags, $tag->id);
       }
       $allPost->tags()->sync($newTags);

       return redirect()->route('backend.allPosts.index');
       }else{
           abort(Response::HTTP_FORBIDDEN,'Post has been Published!');
       }
   }


   public function reviewPost(ReviewAllPostRequest $request, Post $allPost)
   {

       abort_if(Gate::denies('post_review'), Response::HTTP_FORBIDDEN, '403 Forbidden');
       // $request->all();
       //dd($request);
       $allPost->update([
           'is_active'         =>$request->is_active,
           'meta_keywords'     =>$request->meta_keywords,
           'meta_description'  =>$request->meta_description,
           'slug'  =>$request->slug
       ]);
       return redirect()->route('backend.allPosts.index');

   }

   public function show(Post $allPost)
    {
        abort_if(Gate::denies('post_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $allPost->load('category', 'user', 'tags');

        return view('backend.allPosts.show', compact('allPost'));
    }

    /**
     * Remove User from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $allPost)
    {
        abort_if(Gate::denies('post_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        if ($allPost->image) {
            Storage::delete('public/backend/images/coverImage/' . $allPost->image);
        }

        $allPost->tags()->detach();
        $allPost->delete();

        return redirect()->route('backend.allPosts.index');
    }

    /**
     * Delete all selected User at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        abort_if(Gate::denies('post_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $post = Post::whereIn('id', request('ids'))->delete();

        return response()->noContent();
    }


   public function editorUpload(Request $request)
   {
       $original_name = $request->upload->getClientOriginalName();
       $filename_org = pathinfo($original_name, PATHINFO_FILENAME);
       $ext = $request->upload->getClientOriginalExtension();
       $filename = $filename_org.'_'.time().'.'.$ext;

       $request->upload->move(storage_path('app/public/blog/postImages'), $filename);

       $CKEditorFuncNum = $request->input('CKEditorFuncNum');

       $url = asset('storage/blog/postImages/'.$filename);
       $message = "Your Photo Uploaded";

       $res = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, `$url`, `$message`)</script>";
       @header("Content-Type: text/html; charset=utf-8");

       echo $res;

   }

   public function checkSlug(Request $request)
   {
       $slug = SlugService::createSlug(Post::class,'slug', $request->title);
       return response()->json(['slug'=>$slug]);
   }

}
