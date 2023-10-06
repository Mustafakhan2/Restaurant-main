<link rel="stylesheet" href="{{ asset('admin/assets/vendors/mdi/css/materialdesignicons.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}">

@extends('admin.admindashboard')
@section('content-Sec')
    <div class="row">
        <div class="col-md-8 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit the chefs information</h4>
                    <form class="forms-sample" action="{{ route('category.edit', ['id' => $editcat->id]) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputUsername1">Category</label>
                            <input type="text" class="form-control" id="category" placeholder="Edit Category"
                                name="category">
                        </div>


                        <button type="submit" class="btn btn-primary me-2 mt-1">Submit</button>
                        <button class="btn btn-dark mt-1">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    @endsection
