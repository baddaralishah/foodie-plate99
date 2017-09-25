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
                    <a class="navbar-brand" href="#">All Users</a>
                </div>
                <div class="collapse navbar-collapse">
                </div>
            </div>
        </nav>
        <div class="content">
            <div class="row">
                @foreach($users as $user)
                    <div class="col-md-4">
                        <div class="card card-user">
                            <div class="image">

                            </div>
                            <div class="content">
                                <div class="author">
                                    <a href="#">
                                        <img class="avatar border-gray" src="{{asset('profileImages')."/".$user->image}}" alt="{{$user->name}}"/>

                                        <h4 class="title">{{$user->name}}<br />
                                            <small>{{$user->email}}</small><br/>
                                            <small>{{$user->contact}}</small>
                                        </h4>
                                    </a>
                                </div>
                                <p class="description text-center"> {{$user->about}}
                                </p>
                                <p class="description text-center"> {{$user->address}}
                                </p>
                            </div>
                            <hr>
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('/statusProfile/'.$user->id)}}">
                                {{ csrf_field() }}
                            &nbsp; <button class="btn btn-warning" type="submit"><?php echo $user->status?></button>
                            </form>
                        </div>
                    </div>
                    @endforeach
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
@endsection