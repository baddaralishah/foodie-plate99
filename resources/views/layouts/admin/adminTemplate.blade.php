<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>PLATE99</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="{{asset('/css/bootstrap.min.css')}}" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="{{asset('/css/animate.min.css')}}" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="{{asset('/css/light-bootstrap-dashboard.css')}}" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="{{asset('/css/demo.css')}}" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="{{asset('/css/pe-icon-7-stroke.css')}}" rel="stylesheet" />
</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="assets/img/sidebar-5.jpg">

        <!--   you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" -->


        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="http://www.creative-tim.com" class="simple-text">
                    PLATE99
                </a>
            </div>

            <ul class="nav">
                <li>
                    <a href="/timeline">
                        <i class="pe-7s-graph"></i>
                        <p>TIMELINE</p>
                    </a>
                </li>
                <li>
                    <a href="/home">
                        <i class="pe-7s-user"></i>
                        <p>Profile</p>
                    </a>
                </li>
                <li>
                    <a href="/allUsers">
                        <i class="pe-7s-users"></i>
                        <p>All Users Info.</p>
                    </a>
                </li>
                <li>
                    <a href="/storyControlSection">
                        <i class="pe-7s-photo-gallery"></i>
                        <p>Stories Control</p>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="pe-7s-note2"></i>
                        <p>History</p>
                    </a>
                </li>
                <li>
                    <a href="/viewStoryForm">
                        <i class="pe-7s-news-paper"></i>
                        <p>Add New Story</p>
                    </a>
                </li>

                <li>
                    <a href="/addCategory">
                        <i class="pe-7s-ribbon"></i>
                        <p>Category and Sub-Category</p>
                    </a>
                </li>


                <li class="active-pro">
                    <a href="/logout">
                        <i class="pe-7s-rocket"></i>
                        <p>LOGOUT</p>
                    </a>
                </li>

            </ul>
        </div>
    </div>

    @yield('content')



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

</html>
