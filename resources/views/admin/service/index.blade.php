@extends('admin.admin_master')
@section('admin')
    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-4 d-flex justify-content-between">
                    <h4>Our Services</h4>
                    <a href="{{ route('add.service') }}"> <button class="btn btn-info">Add Services</button></a>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{ session('success') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        <div class="card-header"> All Service Data </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">SL No</th>
                                    <th scope="col">Icon</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($services as $key=>$service)
                                <tr>
                                    <th scope="row">{{ $key+1 }}</th>
                                    <td>{{ $service->icon }}</td>
                                    <td>{{ $service->title }}</td>
                                    <td>{{ Str::limit($service->description, 30) }}</td>
                                    <td>
                                        <a href="{{ url('edit/service/'.$service->id) }}" class="btn btn-info">Edit</a>
                                        <a href="{{ url('delete/service/'.$service->id) }}" onclick="return confirm('Are you sure to delete')" class="btn btn-danger">Delete</a>
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
