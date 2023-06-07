@extends('admin.admin_master')
@section('admin')
    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-4 d-flex justify-content-between">
                    <h4>Contact Page </h4>
                    <a href="{{ route('add.contact') }}"> <button class="btn btn-info">Add Contact</button></a>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header"> All Contact Data </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">SL No</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($contacts as $key=>$con)
                                <tr>
                                    <th scope="row">{{ $key+1 }}</th>
                                    <td>{{ $con->address }}</td>
                                    <td>{{ $con->email }}</td>
                                    <td>{{ $con->phone }}</td>
                                    <td>
                                        <a href="{{ url('contact/edit/'.$con->id) }}" class="btn btn-info">Edit</a>
                                        <a href="{{ url('contact/delete/'.$con->id) }}" onclick="return confirm('Are you sure to delete')" class="btn btn-danger">Delete</a>
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
