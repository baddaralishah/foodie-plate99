@extends('layouts.app')
@section('content')

    <!-- top bar -->
    <div class="top-bar">
        <h1>contact Me</h1>
        <p><a href="welcome.blade.php">Home</a> / Contact Me</p>
    </div>
    <!-- end top bar -->

    <!-- main-container -->
    <div class="container main-container">
        <div class="col-md-6">
            <form action="#" method="post">
                <div class="row">
                    <div class="col-md-6">
                        <div class="input-contact">
                            <input type="text" name="name">
                            <span>Your name</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-contact">
                            <input type="text" name="email">
                            <span>Your email</span>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="input-contact">
                            <input type="text" name="object">
                            <span>object</span>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="textarea-contact">
                            <textarea name="message"></textarea>
                            <span>message</span>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <a href="#" class="btn btn-box pull-right">Send</a>
                    </div>
                </div>
            </form>
        </div>

        <div class="col-md-6">
            <h3 class="text-uppercase">contact US</h3>
            <h5>Plate99</h5>
            <div class="h-30"></div>
            <p>H-37 Wahdat Colony 54000 Lahore, Pakistan </p>
            <div class="contact-info">
                <p><i class="ion-android-call"></i> 0092 332 4243699</p>
                <p><i class="ion-ios-email"></i> info@plate99.com</p>
            </div>
        </div>


    </div>
    <!-- end main-container -->
    <!-- back to top -->
    <a href="#0" class="cd-top"><i class="ion-android-arrow-up"></i></a>
    </div>
@endsection