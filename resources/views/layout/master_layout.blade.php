<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="Modern Shop create by ASS7" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Modern Shoppe</title>
    @section('style')
    <!-- GLOBAL STYLES - Include these on every page. -->
    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('css/style.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('css/jquery-ui.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('css/flexslider.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('css/flexslider1.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/jquery.mloading.css')}}" rel="stylesheet">
    <link href="{{asset('css/jquery.growl.css')}}" rel="stylesheet">
    <!--web-fonts-->
    <link href='//fonts.googleapis.com/css?family=Raleway:400,100,100italic,200,200italic,300,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic' rel='stylesheet' type='text/css'><link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Pompiere' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Fascinate' rel='stylesheet' type='text/css'>
    <!--web-fonts-->
    <!--animation-effect-->
    <link href="{{asset('css/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/register.css')}}" rel="stylesheet">
    @show
    @yield('head')
</head>
<body>
    @include('layout.partials.header')
    @yield('content')

    
    @include('elements.modal_signin')
    @include('elements.modal_signup')
    @include('layout.partials.footer')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{asset('js/jquery-1.11.1.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.js')}}"></script>
    <script src="{{asset('js/modernizr.custom.js')}}"></script>
    <!-- <script src="{{asset('js/simpleCart.min.js')}}"></script> -->
    <script src="{{asset('js/wow.min.js')}}"></script>
    <script src="{{asset('js/jquery.mloading.js')}}"></script>
    <script src="{{asset('js/jquery.growl.js')}}"></script>
    <script src="{{asset('js/cart.js')}}"></script>
    <script>
        new WOW().init();
    </script>
    <!--start-smooth-scrolling-->
    <script src="{{asset('js/move-top.js')}}"></script>
    <script src="{{asset('js/easing.js')}}"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event){     
                event.preventDefault();
                $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
            });
        });
    </script>
    <!--//end-smooth-scrolling-->
    <script src="{{asset('js/main.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
        
            var defaults = {
                containerID: 'toTop', // fading element id
                containerHoverID: 'toTopHover', // fading element hover id
                scrollSpeed: 1200,
                easingType: 'linear' 
            };
            
            $().UItoTop({ easingType: 'easeOutQuart' });
            
        });
    </script>
    <!--FlexSlider-->
    <script defer src="{{asset('js/jquery.flexslider.js')}}"></script>
    <script type="text/javascript">
        $(window).load(function(){
          $('.flexslider').flexslider({
            animation: "pagination",
            start: function(slider){
              $('body').removeClass('loading');
            }
          });
        });
    </script>
    <!--End-slider-script-->
    <script type="text/javascript" src="{{asset('js/jquery.countdown.min.js')}}"></script>
    <script type="text/javascript">
        $('#example').countdown({
            date: '12/24/2020 15:59:59',
            offset: -8,
            day: 'Day',
            days: 'Days'
        }, function () {
            alert('Done!');
        });
    </script>
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
        function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!--//for-mobile-apps -->

    <script type="text/javascript">
        $(document).bind("ajaxStart.mine", function() {
            $("body").mLoading('show');
        });

        $(document).bind("ajaxStop.mine", function() {
            $("body").mLoading('hide');
        });
    </script>
    @yield('script')
</body>
</html>
