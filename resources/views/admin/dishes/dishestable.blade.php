@extends('admin.admindashboard')
@section('content-Sec')
    <div class="row ">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Dishes </h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Dish Name</th>
                                    <th>Image</th>
                                    <th>Recipe</th>
                                    <th>Description</th>
                                    <th>Category</th>
                                    <th>Created At</th>
                                    <th>Delete</th>
                                    <th>Edit</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $value)
                                    <tr>
                                        <td>{{ $value->id }}</td>
                                        <td>{{ $value->name }}</td>
                                        <td><img src="{{ asset('uploads/' . $value->image) }}" alt="Image"></td>
                                        <td>{{ $value->recipe }}</td>
                                        <td>{{ $value->description }}</td>
                                        <td>
                                            {{-- Find the associated category for the dish --}}
                                            @php
                                                $category = $cat->where('id', $value->category)->first();
                                            @endphp
                                            {{ $category ? $category->category : 'Category not found' }}
                                        </td>
                                        <td>{{ $value->created_at }}</td>
                                        <td>
                                            <a href="{{ route('dishes.del', ['id' => $value->id]) }}"
                                                class="btn btn-danger">Delete</a>
                                        </td>
                                        <td>
                                            <a href="{{ route('dishes.edit', ['id' => $value->id]) }}"
                                                class="btn btn-success">Edit</a>
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
@endsection
