<link rel="stylesheet" href="{{ asset('admin/assets/vendors/mdi/css/materialdesignicons.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}">

@extends('admin.admindashboard')
@section('content-Sec')
    <div class="row">
        <div class="col-md-8 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Default form</h4>
                    <p class="card-description"> Basic form layout </p>
                    <form class="forms-sample" action="{{ route('chefs.edit', ['id' => $editchef->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputUsername1">Name</label>
                            <input type="text" class="form-control" id="exampleInputUsername1"
                                placeholder="Enter the Chefs Name" name="name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">
                                Speciality</label>
                            <input type="text" class="form-control" id="speciality" placeholder="What's his Speciality?"
                                name="speciality">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nationality</label>
                            <input type="text" class="form-control" id="nationality"
                                placeholder="From which country is he?" name="nationality">
                        </div>
                        <div class="col-md-4">
                            <label for="" class="form-label">Image</label>
                            <input type="file" name="image" id="file" class="form-control"
                                placeholder="Select Image" aria-describedby="helpId">
                            <p class="text-danger">
                                @error('image')
                                    {{ $message }}
                                @enderror
                            </p>
                        </div>


                        <button type="submit" class="btn btn-primary me-2 mt-1">Submit</button>
                        <button class="btn btn-dark mt-1">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    @endsection
