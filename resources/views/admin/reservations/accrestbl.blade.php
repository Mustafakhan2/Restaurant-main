@extends('admin.admindashboard')
@section('content-Sec')
    <div class="row ">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Reservation </h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th> ID</th>
                                    <th> Name</th>
                                    <th> Email </th>
                                    <th>Phone Number</th>
                                    <th>Number of Guests </th>
                                    <th>Date </th>
                                    <th>Time </th>
                                    <th>Message </th>
                                    <th>Delete </th>


                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reservation as $value)
                                    <tr>
                                        <td>{{ $value->id }}</td>
                                        <td>{{ $value->name }}</td>
                                        <td>{{ $value->email }}</td>
                                        <td>{{ $value->pn }}</td>
                                        <td>{{ $value->nog }}</td>
                                        <td>{{ $value->dmy }}</td>
                                        <td>{{ $value->time }}</td>
                                        <td>{{ $value->message }}</td>
                                        <td>
                                            <a href="{{ route('tbres.del', ['id' => $value->id]) }}"
                                                class="btn btn-danger">Delete</a>
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
