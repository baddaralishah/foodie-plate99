@extends('layouts.admin.adminTemplate')
@section('content')

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">TimeLine</a><br>
                </div>
                <div class="collapse navbar-collapse">
                </div>
            </div>
        </nav><br/>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <form class="form-horizontal .form-inline" role="form" method="POST" action="{{ url('/searchIt')}} " enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input class=" col-md-12 form-control" type="text" id="searchIT" name="search" placeholder="Search Location, Dish Name or City" onchange="searchFunction()">
                        <button type="submit" class="btn btn-info btn-fill col-md-12">Search</button>
                    </form>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    @foreach($dishes as $dish)

                        @if (\App\Dish::find($dish->dish_id)->status=='active')

                    <div class="col-md-4">
                        <div class="card card-user">
                            <div class="image" style="height: 200px">
                                <img src="{{asset('storyImages')."/".\App\Dish::find($dish->dish_id)->image}}" alt="Dish Name {{\App\Dish::find($dish->dish_id)->name}}"/>
                            </div>
                            <div class="content">
                                <div class="author">
                                    <a href="#">
                                        <img class="avatar border-gray" src="{{asset('profileImages')."/".\App\User::find($dish->uploader_id)->image}}" style=" width: 90px;height: 90px;" alt="{{\App\User::find($dish->uploader_id)->name}}"/>
                                        <h4 class="title">Dish Name : {{\App\Dish::find($dish->dish_id)->name}}<br />
                                            <small style="color:CORAL;">Uploaded as : {{\App\Dish::find($dish->dish_id)->upload_type}}</small><br/>
                                            <small>City : {{\App\UserDish::find($dish->dish_id)->city}}</small></br>
                                            <small>Address : {{\App\UserDish::find($dish->dish_id)->location}}</small></br>
                                            <small>User : {{\App\User::find($dish->uploader_id)->name}}</small></br>
                                            <small>User : {{\App\User::find($dish->uploader_id)->contact}}</small></br>
                                        </h4>
                                    </a>
                                </div>

                            </div>

                        </div>
                    </div>
                        @endif
                        @endforeach
                </div>
            </div>
        </div>
        <footer class="footer">
            <div class="container-fluid">

                <p class="copyright">
                    &copy; <script>document.write(new Date().getFullYear())</script> Design and Developed by <a href="https://github.com/baddaralishah">Badar Ali</a>
                </p>
            </div>
        </footer>
    </div>


</div>

    @endsection