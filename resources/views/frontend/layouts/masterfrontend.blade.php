<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="This is my blog">
    <meta name="author" content="Abu Sayeed Shakil">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap" rel="stylesheet">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Bootstrap core CSS -->
    <link href="{{asset('frontend/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/fontawesome.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/templatemo-stand-blog.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/owl.css')}}">

    <!-- Fonts -->
    {{-- <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> --}}

</head>
<body>
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
    @include('frontend.layouts.header')

    <!-- Page Content -->
    <!-- Banner Starts Here -->
    @yield('top-banner')
      <!-- Banner Ends Here -->

    @yield('content')

    <footer>
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <ul class="social-icons">
                <li><a href="#">Facebook</a></li>
                <li><a href="#">Twitter</a></li>
                <li><a href="#">Behance</a></li>
                <li><a href="#">Linkedin</a></li>
                <li><a href="#">Dribbble</a></li>
              </ul>
            </div>
            <div class="col-lg-12">
              <div class="copyright-text">
                <p>All Right Reserved By <a href="{{route('home')}}" target="_parent">Read On Net</a> @2021 <br> Developed By <a  href="" target="_parent">Abu Sayeed Shakil</a></p>
              </div>
            </div>
          </div>
        </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="{{asset('frontend/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('frontend/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Additional Scripts -->
    <script src="{{asset('frontend/assets/js/custom.js')}}"></script>
    <script src="{{asset('frontend/assets/js/owl.js')}}"></script>
    <script src="{{asset('frontend/assets/js/slick.js')}}"></script>
    <script src="{{asset('frontend/assets/js/isotope.js')}}"></script>
    <script src="{{asset('frontend/assets/js/accordions.js')}}"></script>

    <script language = "text/Javascript">
        cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
        function clearField(t){                   //declaring the array outside of the
        if(! cleared[t.id]){                      // function makes it static and global
            cleared[t.id] = 1;  // you could use true and false, but that's more typing
            t.value='';         // with more chance of typos
            t.style.color='#fff';
            }
        }
    </script>
</body>
</html>
