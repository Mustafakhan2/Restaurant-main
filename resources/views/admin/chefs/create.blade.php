@extends('admin.admindashboard')
@section('content-Sec')
    <div class="row">
        <div class="col-md-8 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Default form</h4>
                    <p class="card-description"> Basic form layout </p>
                    <form class="forms-sample">
                        <div class="form-group">
                            <label for="exampleInputUsername1">Name</label>
                            <input type="text" class="form-control" id="exampleInputUsername1"
                                placeholder="Enter the Chefs Name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">
                                Speciality</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="What's his Speciality?">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nationality</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="From which country is he?">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputConfirmPassword1">Confirm Password</label>
                            <input type="password" class="form-control" id="exampleInputConfirmPassword1"
                                placeholder="Password">
                        </div>
                        <div class="form-check form-check-flat form-check-primary">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input"> Remember me </label>
                        </div>
                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                        <button class="btn btn-dark">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    @endsection
