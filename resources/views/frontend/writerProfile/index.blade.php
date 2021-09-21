@extends('frontend.layouts.masterfrontend')
@section('meta_description')Read On Net is a free blog site from Bangladesh where you can read other's thoughts as post plus you can write yours too.@endsection
@section('meta_keywords')Read,Net,read on internet, read online, write blog, read blog, learn online, learn free from internet , free blog post, blog on bangladesh, blog site of Bangladesh, BD blog site, BD blog, readonnet, write blog  @endsection
@section('title'){{$profile->name}}'s Profile @endsection
@section('content')
    <!-- Banner Starts Here -->
    <div class="writerProfile-heading-page header-text mb-2">
        <section class="page-heading  text-center">
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <div class="text-content">
                  <h4><a href="{{route('readonnet.posts.index')}}">Writer's Profile</a></h4>
                  {{-- <h2>Find your interested category and continue learning for free</h2> --}}
                </div>
              </div>
            </div>
          </div>
        </section>
    </div>
      <!-- Banner Ends Here -->


<div class="container">
    <div class="main-body">

          <div class="row gutters-sm" >
            <div class="col-md-4 mb-3" >
              <div class="card">
                <div class="card-body"  style="background-color:rgb(241, 241, 241);">
                  <div class="d-flex flex-column align-items-center text-center">
                    @if($profile->image)
                        <img src="{{ asset('storage/backend/images/profileImage/' . $profile->image) }}" class="rounded-circle img-fluid" width="150" height="150" alt="{{$profile->name}}" title="{{$profile->name}} ">
                    @else
                        <img src="{{ asset('backend/images/default/default_user.png') }}" class="rounded-circle img-fluid" width="150" height="150"
                        alt="{{$profile->name}}" title="{{$profile->name}} ">
                    @endif

                    <div class="mt-3">
                      <h4>{{ $profile->name }}</h4>
                      <p class="text-secondary mb-1">{{$profile->about_title ?? ''}}</p>

                      {{-- <button class="btn btn-primary"> @foreach($profile->roles()->pluck('name') as $role)
                        <span class="label label-info label-many badge badge-info">{{ $role }}</span>
                    @endforeach</button> --}}
                      {{-- <button class="btn btn-outline-primary">Message</button> --}}
                    </div>
                  </div>
                </div>
              </div>
              <div class="card mt-3" >
                <ul class="list-group list-group-flush" >
                    <a href="{{$profile->facebook_link ?? ''}}" target="_blank">
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap"  style="background-color:rgb(241, 241, 241);">
                            <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook mr-2 icon-inline text-primary"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>Facebook</h6>
                            <span class="text-secondary text-warp" style="font-size: 12px">{{$profile->facebook_link ?? ''}}</span>
                        </li>
                    </a>
                    <a href="{{$profile->instagram_link ?? ''}}"target="_blank">
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap" style="background-color:rgb(241, 241, 241);">
                            <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram mr-2 icon-inline text-danger"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>Instagram</h6>
                            <span class="text-secondary " style="font-size: 12px">{{$profile->instagram_link ?? ''}}</span>
                        </li>
                    </a>
                    <a href="{{$profile->twitter_link ?? ''}}"target="_blank">
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap" style="background-color:rgb(241, 241, 241);">
                            <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter mr-2 icon-inline text-info"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg>Twitter</h6>
                            <span class="text-secondary"  style="font-size: 12px">{{$profile->twitter_link ?? ''}}</span>
                        </li>
                    </a>
                  <a href="{{$profile->website_link ?? ''}}"target="_blank">
                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap" style="background-color:rgb(241, 241, 241);">
                        <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe mr-2 icon-inline"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>Website</h6>
                        <span class="text-secondary"  style="font-size: 12px">{{$profile->website_link ?? ''}}</span>
                      </li>
                  </a>

                  {{-- <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><svg ></svg><img class="feather feather-github mr-2 icon-inline" src="{{asset('backend/icons/sprites/youtube.svg')}}" alt=""> YouTube</h6>
                    <span class="text-secondary">bootdey</span>
                  </li> --}}


                </ul>
              </div>
            </div>

            <div class="col-md-8">
              <div class="card mb-3"style="background-color:rgb(241, 241, 241);">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Full Name</h6>
                    </div>
                    <div class="col-sm-9 ">
                        {{ $profile->name ?? ''}}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 ">
                        {{ $profile->email  ?? ''}}
                    </div>
                  </div>
                  <hr>

                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Mobile</h6>
                    </div>
                    <div class="col-sm-9">
                        {{ $profile->phone  ?? ''}}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">About Me</h6>
                    </div>
                    <div class="col-sm-9">
                        {{ $profile->about_description  ?? ''}}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Expertise</h6>
                    </div>
                    <div class="col-sm-9 ">
                        {{ $profile->expertise  ?? ''}}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Interested In</h6>
                    </div>
                    <div class="col-sm-9 ">
                        {{ $profile->interested_in  ?? ''}}
                    </div>
                  </div>


                </div>
              </div>


              <div><h4  class="text-center mb-3">MY POSTS</h4></div>
              @forelse($profile->posts->where('is_active') as $post)
              <div class="row">
                <div class="col-sm-12 ">
                  <div class="card">
                    <div class="card-body"style="background-color:rgb(241, 241, 241);">
                    <h6 class="d-flex align-items-center " ><i class="text-info ">{{ $post->category->name }}  </i>
                        </h6><hr>
                      <small>
                        <a href="{{route('readonnet.posts.show',$post)}}"> <h4>{{ $post->title }}</h4></a>
                        {{$post->created_at->format('d F Y')}}
                       </small>
                    </div>
                  </div>
                </div>
              </div>
              @empty
              <div class="row">
                <div class="col-sm-12 ">
                  <div class="card">
                    <div class="card-body">
                      <small>
                         <h4  class="text-center text-secondary">You Have No Post Published yet..</h4>

                       </small>
                    </div>
                  </div>
                </div>
              </div>
              @endforelse



            </div>
          </div>

        </div>
    </div>
@endsection
