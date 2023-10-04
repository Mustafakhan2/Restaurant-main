@extends('admin.admindashboard')
@section('content-Sec')
    <div class="row">
        <div class="col-md-8 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Default form</h4>
                    <p class="card-description"> Basic form layout </p>
                    <form class="forms-sample" action="{{ route('chefs.store') }}" method="POST">
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
                        <div class="form-group">
                            <label for="exampleInputConfirmPassword1">Michelin star</label>
                            <input type="text" class="form-control" id="michelinstar" placeholder="How many he got?"
                                name="michelinstar">
                        </div>

                        <button type="submit" class="btn btn-primary me-2 mt-1">Submit</button>
                        <button class="btn btn-dark mt-1">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    @endsection
