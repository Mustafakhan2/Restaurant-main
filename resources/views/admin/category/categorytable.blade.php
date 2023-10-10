@extends('admin.admindashboard')
@section('content-Sec')
    <div class="row ">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Categories </h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th> ID</th>
                                    <th> Category</th>
                                    <th>Created At </th>
                                    <th>Delete </th>
                                    <th>Edit </th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $value)
                                    <tr>
                                        <td>{{ $value->id }}</td>
                                        <td>{{ $value->category }}</td>
                                        <td>{{ $value->created_at }}</td>
                                        <td>
                                            <a href="{{ route('category.del', ['id' => $value->id]) }}"
                                                class="btn btn-danger">Delete</a>
                                        </td>
                                        <td><a href="{{ route('category.edit', ['id' => $value->id]) }}"
                                                class="btn btn-success">Edit</a></td>


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
