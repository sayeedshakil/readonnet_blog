<header class="">

    <nav class="navbar navbar-expand-lg">
        <div class="container">
        <a class="navbar-brand" href="{{route('home')}}"><h2> <span class="default-theme-color">read </span> on net<em></em></h2></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
            <li class="nav-item {{ request()->is('/')  ? 'active' : '' }}">
                <a class="nav-link" href="{{route('home')}}">Home
                <span class="sr-only">(current)</span>
                </a>
            </li>


            <li class="nav-item dropdown {{ request()->is('ReadOnNet/category') || request()->is('ReadOnNet/category/*') ? 'active' : '' }}">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Categories
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    @foreach ($categories as $category)
                    <a class="dropdown-item" href="{{route('readonnet.category_posts',$category)}}">{{$category->name}}</a>
                    @endforeach
                </div>
            </li>

            <li class="nav-item  {{ request()->is('ReadOnNet/posts') || request()->is('ReadOnNet/posts/*') ? 'active' : '' }}">
                <a class="nav-link " href="{{route('readonnet.posts.index')}}">Posts
                <span class="sr-only">(current)</span>
                </a>
            </li>

            <li class="nav-item">
            @if(auth()->check())
                <a class="nav-link btn  btn-non-important" target="_blank" href="{{route('backend.dashboard')}}">Go To Dashboard</a>
            @else
                <a class="nav-link btn btn-theme" target="_blank" href="{{route('login')}}">Write Here</a>
            @endif
            </li>
            </ul>
        </div>
        </div>
    </nav>
    {{-- <div class="nav-scroller py-1 mb-2">
        <nav class="nav d-flex justify-content-between">
          <a class="p-2 link-secondary" href="#">World</a>
          <a class="p-2 link-secondary" href="#">U.S.</a>
          <a class="p-2 link-secondary" href="#">Technology</a>
          <a class="p-2 link-secondary" href="#">Design</a>
          <a class="p-2 link-secondary" href="#">Culture</a>
          <a class="p-2 link-secondary" href="#">Business</a>
          <a class="p-2 link-secondary" href="#">Politics</a>
          <a class="p-2 link-secondary" href="#">Opinion</a>
          <a class="p-2 link-secondary" href="#">Science</a>
          <a class="p-2 link-secondary" href="#">Health</a>
          <a class="p-2 link-secondary" href="#">Style</a>
          <a class="p-2 link-secondary" href="#">Travel</a>
        </nav>
    </div> --}}
</header>
<style>
    .nav-scroller {
  position: relative;
  z-index: 2;
  height: 2.75rem;
  overflow-y: hidden;
}

.nav-scroller .nav {
  display: flex;
  flex-wrap: nowrap;
  padding-bottom: 1rem;
  margin-top: -1px;
  overflow-x: auto;
  text-align: center;
  white-space: nowrap;
  -webkit-overflow-scrolling: touch;
}

.nav-scroller .nav-link {
  padding-top: .75rem;
  padding-bottom: .75rem;
  font-size: .875rem;
}
</style>

