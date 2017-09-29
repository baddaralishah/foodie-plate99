<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>PLATE99</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <link rel="shortcut icon" href="{{asset('/img/favBlack.png')}}" type="image/x-icon">
    <!-- Bootstrap core CSS     -->
    <link href="{{asset('/css/bootstrap.min.css')}}" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="{{asset('/css/animate.min.css')}}" rel="stylesheet"/>
    <!--  Light Bootstrap Table core CSS    -->
    <link href="{{asset('/css/light-bootstrap-dashboard.css')}}" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="{{asset('/css/pe-icon-7-stroke.css')}}" rel="stylesheet" />
    <link href="{{asset('/ionicons/css/ionicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('/css/styleFrontEnd.css')}}" rel="stylesheet">
    <script src="{{asset('/js/modernizr.js')}}"></script>
</head>
<body id="app-layout">


<!-- Preloader -->
<div id="preloader">
    <div class="pre-container">
        <div class="spinner">
            <div class="double-bounce1"></div>
            <div class="double-bounce2"></div>
        </div>
    </div>
</div>
<!-- end Preloader -->

<div class="container-fluid">
    <!-- box header -->
    <header class="box-header">
        <div class="box-logo">
            <a href="/"><img src="img/fav.png" width="50" alt="Logo"></a>
        </div>
        <!-- box-nav -->
        <a class="box-primary-nav-trigger" href="#0">
            <span class="box-menu-text">Menu</span><span class="box-menu-icon"></span>
        </a>
        <!-- box-primary-nav-trigger -->
    </header>
    <!-- end box header -->

    <!-- nav -->
    <nav>
        <ul class="box-primary-nav">
            <li class="box-label">Menu</li>

            <li><a href="/">Intro</a></li>
            <li><a href="/about">About me</a></li>
            <li><a href="/contact">contact me</a></li>

            <!-- Authentication Links -->
            @if (Auth::guest())
                <li><a href="{{ url('/login') }}">Login</a></li>
                <li><a href="{{ url('/register') }}">Register</a></li>
            @else
                <li><a href="{{ url('/home') }}">{{ Auth::user()->name }}</a></li>
                <li><a href="{{ url('/logout') }}">Logout</a></li>
        @endif

            <!--
                            <li class="box-label">Follow me</li>

                            <li class="box-social"><a href="#0"><i class="ion-social-facebook"></i></a></li>
                            <li class="box-social"><a href="#0"><i class="ion-social-instagram-outline"></i></a></li>
                            <li class="box-social"><a href="#0"><i class="ion-social-twitter"></i></a></li>
                            <li class="box-social"><a href="#0"><i class="ion-social-dribbble"></i></a></li> -->
        </ul>
    </nav>

    @yield('content')

    <footer class="footer">
        <div class="container-fluid">

            <p class="copyright">
                &copy; <script>document.write(new Date().getFullYear())</script> Design and Developed by<a href="https://github.com/baddaralishah">Badar Ali</a>
            </p>
        </div>
    </footer>

    </div>
    </div>


</body>

<!--   Core JS Files   -->
<script src="{{asset('/js/jquery-1.10.2.js')}}" type="text/javascript"></script>
<script src="{{asset('/js/bootstrap.min.js')}}" type="text/javascript"></script>

<!--  Checkbox, Radio & Switch Plugins -->
<script src="{{asset('/js/bootstrap-checkbox-radio-switch.js')}}"></script>

<!--  Charts Plugin -->
<script src="{{asset('/js/chartist.min.js')}}"></script>

<!--  Notifications Plugin    -->
<script src="{{asset('/js/bootstrap-notify.js')}}"></script>

<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>

<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="{{asset('/js/light-bootstrap-dashboard.js')}}"></script>

<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
<script src="{{asset('/js/demo.js')}}"></script>

<script src="js/jquery-2.1.1.js"></script>
<!--  plugins -->
<script src="js/bootstrap.min.js"></script>
<script src="js/menu.js"></script>
<script src="js/animated-headline.js"></script>
<script src="js/isotope.pkgd.min.js"></script>


<!--  custom script -->
<script src="js/custom.js"></script>

</html>