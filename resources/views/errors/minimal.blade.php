<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name') }} | @yield('code')</title>
        <meta name="description" content="">
        <link rel="shortcut icon" href="{{asset('images/logo/favicon.png')}}" />
        <!-- Fonts -->
        <link href="{{asset('dist/antler/fonts/cloudicon/cloudicon.css')}}" rel="stylesheet" media="none" onload="if(media!='all')media='all'">
        <link href="{{asset('dist/antler/fonts/fontawesome/css/all.css')}}" rel="stylesheet" media="none" onload="if(media!='all')media='all'">
        <link href="{{asset('dist/antler/fonts/opensans/opensans.css')}}" rel="stylesheet" media="none" onload="if(media!='all')media='all'">
        <!-- CSS styles -->
        <link href="{{asset('dist/antler/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('dist/antler/css/style.min.css')}}" rel="stylesheet">
        <!-- Custom color styles -->
        <link href="{{asset('dist/antler/css/colors/pink.css')}}" rel="stylesheet" title="pink" media="none" onload="if(media!='all')media='all'"/>
        <link href="{{asset('dist/antler/css/colors/blue.css')}}" rel="stylesheet" title="blue" media="none" onload="if(media!='all')media='all'"/>
        <link href="{{asset('dist/antler/css/colors/green.css')}}" rel="stylesheet" title="green" media="none" onload="if(media!='all')media='all'"/>
    </head>
    <body>
    <!-- ***** LOADING PAGE ****** -->
    <div id="spinner-area">
        <div class="spinner">
            <div class="double-bounce1"></div>
            <div class="double-bounce2"></div>
        </div>
    </div>
    <!-- ***** 404 ****** -->
    <section class="sec-normal notfound pt-150 scrollme">
        <div class="total-grad-pink-blue-intense"></div>
        <div class="container animateme" data-when="exit" data-from="0" data-to="0.75" data-opacity="1" data-translatey="-50">
            <div class="row justify-content-center">
                <div class="col-9">
                    <img class="svg" src="{{asset('dist/antler/patterns/notfound.svg')}}" alt="provisioning">
                </div>
            </div>
            <div class="col-md-12 text-center pt-5">
                <h1 class="c-purple">@yield('code')</h1>
                <p class=" c-grey">@yield('message')<br> Please press the button below to go home page</p>
                <a href="{{route('home')}}" class="btn btn-default-grad-purple-fill mt-3">Go Home Page</a>
            </div>
        </div>
    </section>
    <!-- ***** BUTTON GO TOP ***** -->
    <a href="#0" class="cd-top"> <i class="fas fa-angle-up"></i> </a>
    <!-- Javascript -->
    <script src="{{asset('dist/antler/js/jquery.min.js')}}"></script>
    <script defer src="{{asset('dist/antler/js/popper.min.js')}}"></script>
    <script defer src="{{asset('dist/antler/js/bootstrap.min.js')}}"></script>
    <script defer src="{{asset('dist/antler/js/jquery.countdown.js')}}"></script>
    <script defer src="{{asset('dist/antler/js/jquery.magnific-popup.min.js')}}"></script>
    <script defer src="{{asset('dist/antler/js/slick.min.js')}}"></script>
    <script defer src="{{asset('dist/antler/js/owl.carousel.min.js')}}"></script>
    <script defer src="{{asset('dist/antler/js/isotope.min.js')}}"></script>
    <script defer src="{{asset('dist/antler/js/jquery.scrollme.min.js')}}"></script>
    <script defer src="{{asset('dist/antler/js/swiper.min.js')}}"></script>
    <script defer src="{{asset('dist/antler/js/scripts.min.js')}}"></script>
</body>
</html>


