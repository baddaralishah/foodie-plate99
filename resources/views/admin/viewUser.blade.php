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
                    <a class="navbar-brand" href="#">{{$user->name}}</a>
                </div>
                <div class="collapse navbar-collapse">
                </div>
            </div>
        </nav>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    @if(count($error)>0)
                        <div class="alert alert-warning alert-dismissable fade in">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Warning!</strong> {{$error}}.
                        </div>
                        @endif
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Edit Profile</h4>
                            </div>
                            <div class="content">
                                <form class="form-horizontal" role="form" method="POST" action="{{ url('/update')}} " enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <!--<input type="hidden" name="userId" value="<?php echo $user->id?>">-->
                                        <div class="col-md-6">
                                            <label>Name</label>
                                            <input  type="text" name="name" class="form-control" placeholder="Enter your name" value="<?php echo $user->name?>" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="email">Email address</label>
                                            <input type="email" class="form-control" name="email" value="<?php echo $user->email?>" readonly>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <label>Change Profile Image</label>
                                                <div class="file-upload">
                                                    <input type="file" name="image" id="image"/>
                                                </div>
                                        </div>
                                        </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <label>Address</label>
                                                <input type="text" class="form-control" name="address" value="<?php echo $user->address?>" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>City</label>
                                            <input type="text" class="form-control" name="city" value="<?php echo $user->city?>" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Country</label>
                                                <input type="text" class="form-control" name="country" value="<?php echo $user->country?>" required>
                                        </div>

                                        <div class="col-md-4">
                                            <label>Contact Number</label>
                                            <input type="text" class="form-control" name="contact" value="<?php echo $user->contact?>" required>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <label>About Me</label>
                                                <textarea rows="5" class="form-control" name="about" required><?php echo $user->about?></textarea>
                                            <button type="submit" class="btn btn-info btn-fill pull-right">Update Profile</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
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
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Account Settings (Password Settings)</h4>
                            </div>
                            <div class="content">
                                <form class="form-horizontal" role="form" method="POST" action="{{ url('/changePassword')}} " enctype="multipart/form-data">
                                    {{ csrf_field() }}

                                    <div class="row">
                                        <div class="col-md-12">
                                            <label>New Password</label>
                                            <input type="password" class="form-control" placeholder="Enter your new password" name="password" required/><br/>
                                            <label>Confirm New Password</label>
                                            <input  type="password" class="form-control" placeholder="Confirm your new password" name="password_confirmation" required/><br/>
                                            <button type="submit" class="btn btn-info btn-fill pull-right">Reset Password</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
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

@endsection