<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>@yield('title') | {{ config('app.name', 'Read On Net') }}</title>

    {{-- <link rel="shortcut icon" href="favicon/favicon.ico"> --}}
    <meta name="apple-mobile-web-app-title" content="Read On Net">
    <meta name="application-name" content="Read On Net">
    {{-- <link rel="shortcut icon" href="/favicon.ico" /> --}}

    <meta name="description" content="@yield('meta_description')">
    <meta name="keyword" content="@yield('meta_keywords')">

    <meta name="robots" content="index, follow"/>
    <meta name="author" content="Read On Net">

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-MR7WL6P');</script>
    <!-- End Google Tag Manager -->

    <link rel="icon" href="{{ url('frontend/assets/favicon.png') }}">

    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap" rel="stylesheet">

    {{-- <link rel="apple-touch-icon" sizes="57x57" href="assets/favicon/apple-icon-57x57.png"> --}}
     <!-- CSRF Token -->
     <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('social-media-links')


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
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MR7WL6P"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

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
                <p>All Right Reserved By <a href="{{route('home')}}" target="_parent">Read On Net</a> @2021 <br> Developed By <a  href="https://www.facebook.com/sayeed.shakil.1143/" target="_blank">Abu Sayeed Shakil</a></p>
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
