@extends('frontend.layouts.masterfrontend')
@section('top-banner')

<div class="main-banner header-text">
    <div class="container-fluid">
      <div class="owl-banner owl-carousel">
        @foreach ($posts as $post)

        <div class="item" style="background:black;">
            <a href="{{route('readonnet.posts.show',$post)}}">
            @if($post->image)<img src="{{ asset('storage/backend/images/coverImage/' . $post->image) }}" height="220px" style="max-height:206px;  opacity: 0.4;" class="img-fluid" alt="{{$post->title}} @foreach($post->tags as $key)
                #{{ $key->name }}@endforeach"
                title="{{$post->title}} @foreach($post->tags as $key)
                #{{ $key->name }}@endforeach">
            @else
                <img src="{{ asset('backend/images/default/blog_cover/joanna-kosinska-LAaSoL0LrYs-unsplash.jpg') }}"height="220px" style="max-height:206px;  opacity: 0.4;" class="img-fluid" alt="{{$post->title}} @foreach($post->tags as $key)
                #{{ $key->name }}@endforeach"
                title="{{$post->title}} @foreach($post->tags as $key)
                #{{ $key->name }}@endforeach">
            </a>

            @endif
          <div class="item-content">
            <div class="main-content">
              {{-- <div class="meta-category">
                <span>{{$post->category->name ?? ''}}</span>
              </div> --}}
              <a href="{{route('readonnet.posts.show',$post)}}"><h4>{{ $post->title ?? '' }}</h4></a>
              <ul class="post-info">
                <li><a href="{{route('readonnet.category_posts',$post->category )}}">{{$post->category->name ?? ''}}</a></li>
                {{-- <li><a href="#">{{$post->user->name ?? ''}}</a></li> --}}
                <li><a href="#">{{$post->created_at->format('d F Y')}}</a></li>

                {{-- <li><a href="#">12 Comments</a></li> --}}
              </ul>
            </div>
          </div>
        </div>

        @endforeach
      </div>
    </div>
</div>

@endsection

@section('content')
    <section class="blog-posts index-page">
        <div class="container">

          <div class="sidebar-heading">
            <h2>Recent Posts</h2>
          </div>
          <div class="row">
            <div class="col-lg-8">
              <div class="all-blog-posts">
                <div class="row">

                @foreach ($posts as $post)
                <a href="{{route('readonnet.posts.show',$post)}}">
                  <div class="col-lg-12">
                    <div class="blog-post">
                      <div class="blog-thumb">
                        @if($post->image)
                                <img src="{{ asset('storage/backend/images/coverImage/' . $post->image) }}" style="max-height: 300px;border-radius:3px; " class="img-fluid" alt="{{$post->title}} @foreach($post->tags as $key)
                                #{{ $key->name }}@endforeach"
                                title="{{$post->title}} @foreach($post->tags as $key)
                                #{{ $key->name }}@endforeach">
                            @else
                                <img src="{{ asset('backend/images/default/blog_cover/joanna-kosinska-LAaSoL0LrYs-unsplash.jpg') }}" style="max-height: 300px;border-radius:3px; " class="img-fluid" alt="{{$post->title}} @foreach($post->tags as $key)
                                #{{ $key->name }}@endforeach"
                                title="{{$post->title}} @foreach($post->tags as $key)
                                #{{ $key->name }}@endforeach">

                        @endif
                      </div>
                      <div class="down-content">
                        <span>{{$post->category->name}}</span>
                        <a href="{{route('readonnet.posts.show',$post)}}"><h4>{{$post->title}}</h4></a>
                        <ul class="post-info">
                          <li><a href="{{route('readonnet.writer_profile',$post->user)}}">{{$post->user->name}}</a></li>
                          <li><a href="#">{{$post->created_at->format('d F Y')}}</a></li>
                          {{-- <li><a href="#"></a></li> --}}
                        </ul>
                        {{-- <p>{!!$post->post!!}</p> --}}
                        <div class="post-options">
                          <div class="row">
                            <div class="col-6">
                              <ul class="post-tags">
                                <li><i class="fa fa-tags"></i></li>
                                @foreach($post->tags()->pluck('name') as $tag)
                                <li><a href="#">{{ $tag }}</a>,</li>
                                @endforeach
                              </ul>
                            </div>
                            <div class="col-6">
                              <ul class="post-share">
                                <li><i class="fa fa-share-alt"></i></li>
                                <li><a href="#">Facebook</a>,</li>
                                <li><a href="#"> Twitter</a></li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </a>
                @endforeach



                  <div class="col-lg-12">
                    <div class="main-button">
                      <a href="{{route('readonnet.posts.index')}}">View All Posts</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>


            {{-- ------------------------- --}}

            <div class="col-lg-4">

                <div class="sidebar">
                    <div class="row">
                    <div class="col-lg-12">
                        {{-- <div class="sidebar-item search"> --}}
                        {{-- <form id="search_form" name="gs" method="GET" action="#">
                            <input type="text" name="q" class="searchText" placeholder="type to search..." autocomplete="on">

                        </form> --}}
                        {{-- </div> --}}
                        <form class="card p-2" id="search_form" name="gs" method="GET" action="#">
                            <div class="input-group">
                              <input type="text" name="query" class="form-control " placeholder="type to search..."autocomplete="on">
                              <button type="submit" class="btn btn-secondary">Search</button>
                            </div>
                          </form>
                    </div>

                    {{-- @if (count($search_results)>0)
                    <div class="col-lg-12">
                        <div class="sidebar-item recent-posts">
                        <div class="sidebar-heading">
                            <h2>Are You Looking For this?</h2>
                        </div>

                        <div class="content">
                            <ul>

                            @foreach ($search_results as $post)
                            <li>
                                <a href="{{route('readonnet.posts.show',$post)}}">
                                    <div class="media">
                                    @if($post->image)
                                            <img src="{{ asset('storage/backend/images/coverImage/' . $post->image) }}" width="100" height="80" alt="{{$post->title}} @foreach($post->tags as $key)
                                            #{{ $key->name }}@endforeach"
                                            title="{{$post->title}} @foreach($post->tags as $key)
                                            #{{ $key->name }}@endforeach">

                                    @endif
                                    <div class="media-body ml-2">
                                        <h5>{{$post->title}}</h5>
                                        <span>{{$post->created_at->format('d F Y')}}</span>
                                        <span>{{$post->user->name}}</span>
                                    </div>
                                    </div>
                                </a>
                                </li>
                            @endforeach



                            </ul>
                        </div>
                        </div>
                    </div>
                    @endif --}}

                    <div class="col-lg-12">
                        <div class="sidebar-item recent-posts">
                        <div class="sidebar-heading">
                            <h2>Most Viewed</h2>
                        </div>

                        <div class="content">
                            <ul>

                            @foreach ($posts as $post)
                            <li>
                                <a href="{{route('readonnet.posts.show',$post)}}">
                                    <div class="media">
                                    @if($post->image)
                                        <img src="{{ asset('storage/backend/images/coverImage/' . $post->image) }}" width="90" height="65" alt="{{$post->title}} @foreach($post->tags as $key)
                                        #{{ $key->name }}@endforeach"
                                        title="{{$post->title}} @foreach($post->tags as $key)
                                        #{{ $key->name }}@endforeach">
                                    @else
                                        <img src="{{ asset('backend/images/default/blog_cover/joanna-kosinska-LAaSoL0LrYs-unsplash.jpg') }}" width="90" height="65" alt="{{$post->title}} @foreach($post->tags as $key)
                                        #{{ $key->name }}@endforeach"
                                        title="{{$post->title}} @foreach($post->tags as $key)
                                        #{{ $key->name }}@endforeach">

                                    @endif
                                    <div class="media-body ml-2">
                                        <h5>{{$post->title}}</h5>
                                        <span>{{$post->created_at->format('d F Y')}}</span>
                                        <span>{{$post->user->name}}</span>
                                    </div>
                                    </div>
                                </a>
                                </li>
                            @endforeach

                            </ul>
                        </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="sidebar-item categories">
                        <div class="sidebar-heading">
                            <h2>Categories</h2>
                        </div>
                        <div class="content">
                            <ul>
                            @foreach ($categories as $category)
                                <li><a href="{{route('readonnet.category_posts',$category)}}">- {{$category->name}}</a></li>
                            @endforeach
                            {{-- <li><a href="#">- Awesome Layouts</a></li>
                            <li><a href="#">- Creative Ideas</a></li>
                            <li><a href="#">- Responsive Templates</a></li>
                            <li><a href="#">- HTML5 / CSS3 Templates</a></li>
                            <li><a href="#">- Creative &amp; Unique</a></li> --}}
                            </ul>
                        </div>
                        </div>
                    </div>
                    {{-- <div class="col-lg-12">
                        <div class="sidebar-item tags">
                        <div class="sidebar-heading">
                            <h2>Tags</h2>
                        </div>
                        <div class="content">
                            <ul>
                            @foreach ($tags as $tag)
                            <li><a href="#">{{$tag}}</a></li>
                            @endforeach
                            </ul>
                        </div>
                        </div>
                    </div>
                    </div> --}}
                </div>

            </div>
          </div>
        </div>
    </section>
@endsection






