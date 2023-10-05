@extends('admin.admindashboard')
@section('content-Sec')
    <div class="row">
        <div class="col-md-8 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add Dishes</h4>
                    <form class="forms-sample" action="{{ route('dishes.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputUsername1">Dish Name</label>
                            <input type="text" class="form-control" id="exampleInputUsername1"
                                placeholder="Enter the Dish Name" name="dishname">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">
                                Image</label>
                            <input type="file" class="form-control" id="image" name="image">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Recipe</label>
                            <input type="text" class="form-control" id="nationality" placeholder="Recipe for the dish"
                                name="recipe">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Description</label>
                            <input type="text" class="form-control" id="nationality" placeholder="Recipe for the dish"
                                name="description">
                        </div>



                        <button type="submit" class="btn btn-primary me-2 mt-1">Submit</button>
                        <button class="btn btn-dark mt-1">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    @endsection
