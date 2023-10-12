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
                            <p class="text-danger">
                                @error('dishname')
                                    {{ $message }}
                                @enderror
                            </p>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">
                                Image</label>
                            <input type="file" class="form-control" id="image" name="image">
                            <p class="text-danger">
                                @error('image')
                                    {{ $message }}
                                @enderror
                            </p>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Recipe</label>
                            <input type="text" class="form-control" id="nationality" placeholder="Recipe for the dish"
                                name="recipe">
                            <p class="text-danger">
                                @error('recipe')
                                    {{ $message }}
                                @enderror
                            </p>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Description</label>
                            <input type="text" class="form-control" id="nationality" placeholder="Recipe for the dish"
                                name="description">
                            <p class="text-danger">
                                @error('description')
                                    {{ $message }}
                                @enderror
                            </p>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Price</label>
                            <input type="number" class="form-control" id="price" placeholder="Price for the dish"
                                name="price">
                            <p class="text-danger">
                                @error('price')
                                    {{ $message }}
                                @enderror
                            </p>
                        </div>
                        <div class="form-group">
                            <div class="mb-3">
                                <label for="bootstrapDropdown" class="form-label">Select an Option:</label>
                                <select class="form-select" id="bootstrapDropdown" name="selected_option">
                                    <option>Select</option>
                                    @foreach ($cat as $category)
                                        <option value="{{ $category->id }}">{{ $category->category }}</option>

                                        <!-- Add more options as needed -->
                                    @endforeach

                                </select>

                            </div>
                            <p class="text-danger">
                                @error('category')
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
