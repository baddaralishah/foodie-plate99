@extends('layouts.app')
@section('content')


    <!-- Top bar -->
    <div class="top-bar">
        <h1>About US</h1>
        <p><a href="welcome.blade.php">Home</a> / About US</p>
    </div>
    <!-- end Top bar -->

    <!-- Main container -->
    <div class="container main-container clearfix">
        <div class="col-md-6">
          <div class="col-md-3"></div>
          <div class="col-md-6" style="margin-top:10%;">
            <img src="img/favBlack.png" class="img-responsive" alt="" />
            </div>
            <div class="col-md-3"></div>
        </div>
        <div class="col-md-6">
           <h3 class="uppercase">About Me </h3>
           <h5>We promote food and recipe sharing platfrom</h5>
           <div class="h-30"></div>
            <p>This is a best and first most platfrom for food sharing and recipe uploading. Main focus are foodies who don't like home cooked meal and want to swap it.</p>

            <p>This idea was proposed by Mujtaba Haider to Badar Ali. Application is developed in Laravel 5.4</p>
            <div class="h-10"></div>
            <!-- <ul class="social-ul">
                <li class="box-social"><a href="#0"><i class="ion-social-facebook"></i></a></li>
                <li class="box-social"><a href="#0"><i class="ion-social-instagram-outline"></i></a></li>
                <li class="box-social"><a href="#0"><i class="ion-social-twitter"></i></a></li>
                <li class="box-social"><a href="#0"><i class="ion-social-dribbble"></i></a></li>
            </ul>
 -->

        </div>
    </div>
    <!-- end Main container -->

    <!-- back to top -->
    <a href="#0" class="cd-top"><i class="ion-android-arrow-up"></i></a>
    </div>
@endsection
