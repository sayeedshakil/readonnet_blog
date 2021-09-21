<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
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

use function GuzzleHttp\Promise\all;

class PostController extends Controller
{
     /**
     * Display a listing of User.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('post_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $posts = Post::with('category', 'user')->get();
        return view('backend.post.index', compact('posts'));
    }

    /**
     * Show the form for creating new User.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('post_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        // $this->authorize('view_this_option');
        $categories = Category::get()->pluck('name','id');
        $users = User::get()->pluck('name','id');
        return view('backend.post.create', compact('categories','users'));
    }

    /**
     * Store a newly created User in storage.
     *
     * @param  \App\Http\Requests\StoreUsersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {

        abort_if(Gate::denies('post_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $tags = explode(',', $request->tags);

        if ($request->has('image')) {
            $filename = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('backend/images/coverImage', $filename, 'public');
        }

        if ($request->has('user')) {
            $post = Post::create([
                'title' => $request->title,
                'image' => $filename ?? null,
                'post' => $request->post,
                'category_id' => $request->category,
                'user_id'=>$request->user,
                'meta_keywords'     =>$request->meta_keywords,
                'meta_description'  =>$request->meta_description
            ]);
        } else {

            $post = auth()->user()->posts()->create([
                'title' => $request->title,
                'image' => $filename ?? null,
                'post' => $request->post,
                'category_id' => $request->category,
                'meta_keywords'     =>$request->meta_keywords,
                'meta_description'  =>$request->meta_description,
                'slug' => SlugService::createSlug(Post::class,'slug', $request->title)
            ]);
        }


        foreach ($tags as $tagName) {
            $tag = Tag::firstOrCreate(['name' => $tagName]);
            $post->tags()->attach($tag);
        }

        return redirect()->route('backend.posts.index');
    }


    /**
     * Show the form for editing User.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {

        abort_if(Gate::denies('post_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        if ($post->user->id === Auth::user()->id && $post->is_active===0) {
         $categories = Category::all();
        $tags = $post->tags->implode('name', ', ');

        return view('backend.post.edit', compact('post', 'tags', 'categories'));

        }else{
            abort(Response::HTTP_FORBIDDEN,'You Do not own this Post OR Post has been Published!');
        }


    }

    /**
     * Update User in storage.
     *
     * @param  \App\Http\Requests\UpdateUsersRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        abort_if(Gate::denies('post_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        if ($post->user->id === Auth::user()->id && $post->is_active===0) {
        $tags = explode(',', $request->tags);

        if ($request->has('image')) {
            Storage::delete('public/backend/images/coverImage/' . $post->image);

            $filename = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('backend/images/coverImage/', $filename, 'public');
        }

        $post->update([
            'title' => $request->title,
            'image' => $filename ?? $post->image,
            'post' => $request->post,
            'category_id' => $request->category
        ]);

        $newTags = [];
        foreach ($tags as $tagName) {
            $tag = Tag::firstOrCreate(['name' => $tagName]);
            array_push($newTags, $tag->id);
        }
        $post->tags()->sync($newTags);

        return redirect()->route('backend.posts.index');
        }else{
            abort(Response::HTTP_FORBIDDEN,'You Do not own this Post OR Post has been Published!');
        }
    }


    public function reviewPost(ReviewPostRequest $request, Post $post)
    {
//TODO
        abort_if(Gate::denies('post_review'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        // $request->all();
        //dd($request);
        $post->update([
            'is_active'         =>$request->is_active,
            'meta_keywords'     =>$request->meta_keywords,
            'meta_description'  =>$request->meta_description,
            'slug'  =>$request->slug
        ]);
        return redirect()->route('backend.posts.index');

    }

    public function show(Post $post)
    {
        abort_if(Gate::denies('post_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $post->load('category', 'user', 'tags');

        return view('backend.post.show', compact('post'));
    }

    /**
     * Remove User from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        abort_if(Gate::denies('post_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        if ($post->image) {
            Storage::delete('public/backend/images/coverImage/' . $post->image);
        }

        $post->tags()->detach();
        $post->delete();

        return redirect()->route('backend.posts.index');
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
