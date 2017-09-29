
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
                    <a class="navbar-brand" href="#">Add New Story Section</a>
                </div>
                <div class="collapse navbar-collapse">
                </div>
            </div>
        </nav>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Upload Story</h4>
                            </div>
                            <div class="content">
                                <form class="form-horizontal" role="form" method="POST" action="{{ url('/createStory')}} " enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-md-8 col-md-offset-2">
                                            <div class="form-group">
                                                <label>Tile</label>
                                                <input type="text" class="form-control" name="name" placeholder="Enter New Title" required>
                                            </div>

                                            <div class="form-group">
                                                <label>Description</label>
                                                <textarea class="form-control" name="description" required></textarea>
                                            </div>

                                            <div class="form-group">
                                                <label>Upload Story Image</label>
                                                <input type="file" class="form-control" name="image" required/>
                                            </div>

                                            <div class="form-group">
                                                <label>Story Type</label>
                                                <select class="form-control" name="type" required>
                                                    <option value="Share">Share Dish</option>
                                                    <option value="recepie">Upload Recipe</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label>Select Sub-Category</label>
                                                <select class="form-control" name="subCat_id" required>
                                                    @foreach($cat as $subCat)
                                                        <option value="{{$subCat->id}}">{{$subCat->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label>City</label>
                                                <input type="text" class="form-control" name="city" placeholder="Enter city name where you want story to show" required>
                                            </div>

                                            <div class="form-group">
                                                <label>Location</label>
                                                <input type="text" class="form-control" name="location" placeholder="Enter location where you want story to show" required>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-info btn-fill pull-right">Publish</button>
                                    </div>

                                    <div class="clearfix"></div>
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