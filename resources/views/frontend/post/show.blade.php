@extends('frontend.layouts.masterfrontend')

@section('content')
        <!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="heading-page header-text ">
        <section class="page-heading text-center">
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <div class="text-content">
                  <h4><a href="{{route('readonnet.category_posts',$post->category)}}">{{$post->category->name ?? ''}}</a></h4>
                  <h2>{{$post->title}}</h2>
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
                  <div class="col-lg-12">
                    <div class="blog-post">
                      <div class="blog-thumb">
                        @if($post->image)
                                <img src="{{ asset('storage/backend/images/coverImage/' . $post->image) }}" style="max-height: 300px;border-radius:3px; " class="img-fluid" alt="{{$post->title}} @foreach($post->tags as $key)
                                #{{ $key->name }}@endforeach"
                                title="{{$post->title}} @foreach($post->tags as $key)
                                #{{ $key->name }}@endforeach">
                            @else
                                <img src="{{ asset('backend/images/default/blog_cover/joanna-kosinska-LAaSoL0LrYs-unsplash.jpg') }}"  style="max-height: 300px;border-radius:3px; " class="img-fluid" alt="{{$post->title}} @foreach($post->tags as $key)
                                #{{ $key->name }}@endforeach"
                                title="{{$post->title}} @foreach($post->tags as $key)
                                #{{ $key->name }}@endforeach">

                        @endif
                      </div>
                      <div class="down-content">
                        <a href="#"><h4>{{$post->title}}</h4></a>
                        <ul class="post-info">
                          <li><a href="{{route('readonnet.writer_profile',$post->user)}}">{{$post->user->name}}</a></li>
                          <li><a href="#">{{$post->created_at->format('d F Y')}}</a></li>

                        </ul>
                        <hr>
                        <p>{!!$post->post !!}</p>
                        <hr>
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
                  {{-- <div class="col-lg-12">
                    <div class="sidebar-item comments">
                      <div class="sidebar-heading">
                        <h2>4 comments</h2>
                      </div>
                      <div class="content">
                        <ul>
                          <li>
                            <div class="author-thumb">
                              <img src="assets/images/comment-author-01.jpg" alt="">
                            </div>
                            <div class="right-content">
                              <h4>Charles Kate<span>May 16, 2020</span></h4>
                              <p>Fusce ornare mollis eros. Duis et diam vitae justo fringilla condimentum eu quis leo. Vestibulum id turpis porttitor sapien facilisis scelerisque. Curabitur a nisl eu lacus convallis eleifend posuere id tellus.</p>
                            </div>
                          </li>
                          <li class="replied">
                            <div class="author-thumb">
                              <img src="assets/images/comment-author-02.jpg" alt="">
                            </div>
                            <div class="right-content">
                              <h4>Thirteen Man<span>May 20, 2020</span></h4>
                              <p>In porta urna sed venenatis sollicitudin. Praesent urna sem, pulvinar vel mattis eget.</p>
                            </div>
                          </li>
                          <li>
                            <div class="author-thumb">
                              <img src="assets/images/comment-author-03.jpg" alt="">
                            </div>
                            <div class="right-content">
                              <h4>Belisimo Mama<span>May 16, 2020</span></h4>
                              <p>Nullam nec pharetra nibh. Cras tortor nulla, faucibus id tincidunt in, ultrices eget ligula. Sed vitae suscipit ligula. Vestibulum id turpis volutpat, lobortis turpis ac, molestie nibh.</p>
                            </div>
                          </li>
                          <li class="replied">
                            <div class="author-thumb">
                              <img src="assets/images/comment-author-02.jpg" alt="">
                            </div>
                            <div class="right-content">
                              <h4>Thirteen Man<span>May 22, 2020</span></h4>
                              <p>Mauris sit amet justo vulputate, cursus massa congue, vestibulum odio. Aenean elit nunc, gravida in erat sit amet, feugiat viverra leo.</p>
                            </div>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="sidebar-item submit-comment">
                      <div class="sidebar-heading">
                        <h2>Your comment</h2>
                      </div>
                      <div class="content">
                        <form id="comment" action="#" method="post">
                          <div class="row">
                            <div class="col-md-6 col-sm-12">
                              <fieldset>
                                <input name="name" type="text" id="name" placeholder="Your name" required="">
                              </fieldset>
                            </div>
                            <div class="col-md-6 col-sm-12">
                              <fieldset>
                                <input name="email" type="text" id="email" placeholder="Your email" required="">
                              </fieldset>
                            </div>
                            <div class="col-md-12 col-sm-12">
                              <fieldset>
                                <input name="subject" type="text" id="subject" placeholder="Subject">
                              </fieldset>
                            </div>
                            <div class="col-lg-12">
                              <fieldset>
                                <textarea name="message" rows="6" id="message" placeholder="Type your comment" required=""></textarea>
                              </fieldset>
                            </div>
                            <div class="col-lg-12">
                              <fieldset>
                                <button type="submit" id="form-submit" class="main-button">Submit</button>
                              </fieldset>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div> --}}
                </div>
              </div>
            </div>
            <div class="col-lg-4">
                <div class="sidebar">
                    <div class="row">
                    <div class="col-lg-12">
                        <div class="sidebar-item search">
                        <form id="search_form" name="gs" method="GET" action="#">
                            <input type="text" name="q" class="searchText" placeholder="type to search..." autocomplete="on">
                        </form>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="sidebar-item recent-posts">
                        <div class="sidebar-heading">
                            <h2>Related Posts</h2>
                        </div>

                        <div class="content">
                            <ul>

                            @foreach ($posts as $post)
                            <li>
                                <a href="{{route('readonnet.posts.show',$post)}}">
                                    <div class="media">
                                    @if($post->image)
                                            <img src="{{ asset('storage/backend/images/coverImage/' . $post->image) }}" width="100" height="80" alt="{{$post->title}} @foreach($post->tags as $key)
                                            #{{ $key->name }}@endforeach"
                                            title="{{$post->title}} @foreach($post->tags as $key)
                                            #{{ $key->name }}@endforeach">
                                        @else
                                            <img src="{{ asset('backend/images/default/blog_cover/joanna-kosinska-LAaSoL0LrYs-unsplash.jpg') }}"   width="100" height="80" alt="{{$post->title}} @foreach($post->tags as $key)
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
