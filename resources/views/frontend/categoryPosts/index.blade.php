
@extends('frontend.layouts.masterfrontend')
@section('meta_description')Read On Net is a free blog site from Bangladesh where you can read other's thoughts as post plus you can write yours too.@endsection
@section('meta_keywords')Read,Net,read on internet, read online, write blog, read blog, learn online, learn free from internet , free blog post, blog on bangladesh, blog site of Bangladesh, BD blog site, BD blog, readonnet, write blog  @endsection
@section('title')Select any of our categories and find your desired topic to read for free.@endsection

@section('content')
        <!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="heading-page header-text">
        <section class="page-heading text-center">
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <div class="text-content">
                    <h4><a href="{{route('readonnet.category_posts',$category)}}">{{$category->name ?? ''}}</a></h4>
                  <h2>All Posts From {{$category->name}} Categry</h2>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
      <!-- Banner Ends Here -->

      <section class="blog-posts grid-system">
        <div class="container">
          <div class="row">
            <div class="col-lg-8">
              <div class="all-blog-posts">
                <div class="row">

                  @foreach ($category->posts->where('is_active',1) as $post)
                  <div class="col-lg-6">
                    <div class="blog-post">
                      <div class="blog-thumb">
                        @if($post->image)
                                <img src="{{ asset('storage/backend/images/coverImage/' . $post->image) }}" style="height: 196px;border-radius:3px; " class="img-fluid" alt="{{$post->title}} @foreach($post->tags as $key)
                                #{{ $key->name }}@endforeach"
                                title="{{$post->title}} @foreach($post->tags as $key)
                                #{{ $key->name }}@endforeach">
                            @else
                                <img src="{{ asset('backend/images/default/blog_cover/joanna-kosinska-LAaSoL0LrYs-unsplash.jpg') }}" style="height: 196px;border-radius:3px; " class="img-fluid" alt="{{$post->title}} @foreach($post->tags as $key)
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
                          <li><a href="#">12 Comments</a></li>
                        </ul>
                        {{-- <p>Nullam nibh mi, tincidunt sed sapien ut, rutrum hendrerit velit. Integer auctor a mauris sit amet eleifend.</p> --}}
                        <div class="post-options">
                          <div class="row">
                            <div class="col-lg-12">
                              <ul class="post-tags">
                                <li><i class="fa fa-tags"></i></li>

                                @foreach($post->tags()->pluck('name') as $tag)
                                    <li><a href="#">{{ $tag }}</a>,</li>
                                @endforeach

                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  @endforeach


                  <div class="col-lg-12 ">
                      {{-- <div class="float-right">{{ $category->links() }}</div> --}}

                    {{-- <ul class="page-numbers">
                      <li><a href="#">1</a></li>
                      <li class="active"><a href="#">2</a></li>
                      <li><a href="#">3</a></li>
                      <li><a href="#"><i class="fa fa-angle-double-right"></i></a></li>
                    </ul> --}}
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
                <div class="sidebar">
                    <div class="row">
                        <div class="col-lg-12">
                            <form class="card p-2" id="search_form" name="gs" method="GET" action="{{route('readonnet.posts.search')}}">
                                <div class="input-group">
                                  <input type="text" name="search_for" class="form-control " placeholder="type title to search..."autocomplete="on">
                                  <button type="submit" class="btn btn-secondary">Search</button>
                                </div>
                              </form>
                        </div>
                    <div class="col-lg-12">
                        <div class="sidebar-item recent-posts">
                        <div class="sidebar-heading">
                            <h2> Most Viewed</h2>
                        </div>

                        <div class="content">
                            <ul>

                            @foreach ($allposts as $post)
                            <li>
                                <a href="{{route('readonnet.posts.show',$post)}}">
                                    <div class="media">
                                    @if($post->image)
                                            <img src="{{ asset('storage/backend/images/coverImage/' . $post->image) }}" width="100" height="70" alt="{{$post->title}} @foreach($post->tags as $key)
                                            #{{ $key->name }}@endforeach"
                                            title="{{$post->title}} @foreach($post->tags as $key)
                                            #{{ $key->name }}@endforeach">
                                    @else
                                    <img src="{{ asset('backend/images/default/blog_cover/joanna-kosinska-LAaSoL0LrYs-unsplash.jpg') }}" width="100" height="70" alt="{{$post->title}} @foreach($post->tags as $key)
                                        #{{ $key->name }}@endforeach"
                                        title="{{$post->title}} @foreach($post->tags as $key)
                                        #{{ $key->name }}@endforeach">

                                    @endif
                                    <div class="media-body ml-2">
                                        <h5>{{$post->title}}</h5>
                                        <span>{{$post->created_at->format('d F Y')}}</span>
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
                            </ul>
                        </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
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
                    </div>
                </div>
            </div>
          </div>
        </div>
      </section>

@endsection
