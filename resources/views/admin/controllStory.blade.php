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

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    @foreach($dishes as $dish)
                        @if ($dish->status=='active')
                        <div class="col-md-4">
                                <div class="card card-user">
                                    <div class="image" style="height: 200px">
                                        <img src="{{asset('storyImages')."/".$dish->image}}" alt="Dish Name {{$dish->name}}"/>
                                    </div>
                                    <div class="content">
                                        <div class="author">
                                            <a href="#">
                                                <img class="avatar border-gray" src="{{asset('profileImages')."/".$user->image}}" style=" width: 90px;height: 90px;" alt="{{$dish->name}}"/>
                                                <h4 class="title">Dish Name : {{$dish->name}}<br />
                                                </h4>
                                                <p>
                                                    <small style="color:CORAL;">Uploaded as : {{$dish->upload_type}}</small><br/>
                                                    <small style="color:CORAL;">Description : {{$dish->description}}</small><br/>

                                                </p>
                                            </a>
                                        </div>

                                    </div>
                                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/statusStory/'.$dish->id)}}">
                                        {{ csrf_field() }}
                                        &nbsp; <button class="btn btn-warning" type="submit"><?php echo $dish->status?></button>
                                    </form>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
        <h3 style="text-align: center">Data End or Bad Search </h3>
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