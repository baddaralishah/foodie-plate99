
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
                    <a class="navbar-brand" href="#">Category Section</a>
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
                                <h4 class="title">Add New Category</h4>
                            </div>
                            <div class="content">
                                <form class="form-horizontal" role="form" method="POST" action="{{ url('/createCategory')}} " enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                <div class="row">
                                        <div class="col-md-8 col-md-offset-2">
                                            <div class="form-group">
                                                <label>Name of Category</label>
                                                <input type="text" class="form-control" name="name" placeholder="Enter New Category" required>
                                            </div>
                                        </div>
                                    <button type="submit" class="btn btn-info btn-fill pull-right">Submit</button>
                                </div>

                                    <div class="clearfix"></div>
                                </form>

                            </div>
                        </div>
                    </div>


                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Add New Sub-category</h4>
                            </div>
                            <div class="content">
                                <form class="form-horizontal" role="form" method="POST" action="{{ url('/createSubCategory')}} " enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-md-8 col-md-offset-2">
                                            <div class="form-group">
                                                <label>Name of Sub-Category</label>
                                                <input type="text" class="form-control" name="name" placeholder="Enter New Sub-Category" required>
                                            </div>
                                        </div>

                                        <div class="col-md-8 col-md-offset-2">
                                            <div class="form-group">
                                                <label>Attached with Category</label>
                                                <select class="form-control" name="catPatch"required>
                                                    @foreach($cat as $cate)
                                                            <option value="{{$cate->id}}">{{$cate->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-info btn-fill pull-right">Submit</button>
                                    </div>

                                    <div class="clearfix"></div>
                                </form>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="card">
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                    <th>Category Name</th>
                                    <th>Sub-Category Name</th>
                                    <th>Delete Category</th>
                                    <th>Delete Sub-Category</th>
                                    </thead>
                                    <tbody>
                                        @foreach($subCat as $sub)

                                    <tr>
                                        <td>
                                            <?php $patchedCat = $sub->Category()->get();
                                            echo $patchedCat[0]->name ?>
                                        </td>
                                        <td>{{$sub->name}}</td>
                                        <td>
                                            <a href="/deleteCategory/{{$patchedCat = $sub->Category()->get()[0]->id}}" class="btn btn-warning">Delete Category</a>
                                        </td>
                                        <td>
                                            <a href="/deleteSubCategory/{{$sub->id}}" class="btn btn-warning">Delete Sub-Category</a>
                                        </td>
                                    </tr>

                                        @endforeach

                                    </tbody>
                                </table>

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