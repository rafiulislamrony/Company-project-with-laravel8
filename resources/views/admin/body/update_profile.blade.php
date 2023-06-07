@extends('admin.admin_master')

@section('admin')

<div class="card card-default">
    <div class="card-header card-header-border-bottom">
        <h2>User Profile Update</h2>
    </div>
    <div class="card-body">
        <form class="form-pill" action="{{ route('update.user.profile') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="exampleFormControlInput3">User Name</label>
                <input type="text" name="name" class="form-control" value="{{ $user['name'] }}">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput3">User Email</label>
                <input type="email" name="email" class="form-control" value="{{ $user['email'] }}">
            </div>

            <!-- Profile Photo File Input -->
            <div class="form-group">
                <label for="examp"> Profile Image </label>
                <input type="file" name="image" class="form-control-file" id="examp">
                @error('image')
                <span class="text-danger"> {{ $message }}</span>
                @enderror
            </div>

            <!-- Current Profile Photo -->
            <div class="form-group">
                <img src="{{ $user['profile_photo_url'] }}" style="width:400px; height:200px;">
            </div>

            <button type="submit" class="btn btn-primary btn-default">Update </button>
        </form>
    </div>
</div>
@endsection
