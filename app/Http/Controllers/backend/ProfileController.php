<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.profile.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $profile)
    {
        abort_if(Gate::denies('profile_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $profile->load('posts');

        return view('backend.profile.show', compact('profile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $profile)
    {
        abort_if(Gate::denies('profile_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('backend.profile.edit', compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(ProfileUpdateRequest $request, User $profile)
    {
        abort_if(Gate::denies('profile_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->has('image')) {
            Storage::delete('public/backend/images/profileImage/' . $profile->image);

            $filename = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('backend/images/profileImage/', $filename, 'public');

        }
        $profile->update([
            'name' => $request->name,
            'facebook_link' => $request->facebook_link,
            'twitter_link' => $request->twitter_link,
            'instagram_link' => $request->instagram_link,
            'youtube_link' => $request->youtube_link,
            'website_link' => $request->website_link,
            'email' => $request->email,
            'phone' => $request->phone,
            'expertise' => $request->expertise,
            'interested_in' => $request->interested_in,
            'about_description' => $request->about_description,
            'about_title' => $request->about_title,
            'image' => $filename ?? $profile->image
        ]);

        //$profile->update($request->all());

        $profile->load('posts')->orderBy('id','asc');

        return view('backend.profile.show', compact('profile'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
