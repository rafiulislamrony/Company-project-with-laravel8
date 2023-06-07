@extends('admin.admin_master')
@section('admin')
    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-4 d-flex justify-content-between">
                    <h4>Admin Message Page </h4>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header"> All Message Data </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">SL No</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Subject</th>
                                    <th scope="col">Messsage</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($messages as $key=>$mess)
                                <tr>
                                    <th scope="row">{{ $key+1 }}</th>
                                    <td>{{ $mess->name }}</td>
                                    <td>{{ $mess->email }}</td>
                                    <td>{{ $mess->subject }}</td>
                                    <td>{{ $mess->message }}</td>
                                    <td>
                                        <a href="{{ url('message/delete/'.$mess->id) }}" onclick="return confirm('Are you sure to delete')" class="btn btn-danger">Delete</a>
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
