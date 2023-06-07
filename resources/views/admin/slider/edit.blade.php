@extends('admin.admin_master')
@section('admin')
@if (session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{ session('success') }}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
<div class="py-12">
    <div class="container">
        <div class="row">
            <div class="col-12 mb-4 d-flex justify-content-between">
                <h4>Edit Slider</h4>
            </div>
            <div class="col-12">
                <div class="card card-default">
                    <div class="card-body">
                        <form action="{{ url('slider/update/' . $sliders->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="old_image" value="{{ $sliders->image }}">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Slider Title</label>
                                <input type="text" name="title" value="{{ $sliders->title }}" class="form-control"
                                    placeholder="Enter Title">
                                @error('title')
                                <span class="text-danger"> {{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Slider Description</label>
                                <textarea name="description" class="form-control" rows="6">
                                        {{ $sliders->description }}
                                    </textarea>
                            </div>

                            <div class="form-group">
                                <label for="examp"> Slider Image </label>
                                <input type="file" name="image" class="form-control-file" id="examp">
                                @error('image')
                                <span class="text-danger"> {{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <img src="{{ asset($sliders->image) }}" style="width:400px; height:200px;">
                            </div>

                            <div class="form-footer pt-4 pt-5 mt-4 border-top">
                                <button type="submit" class="btn btn-primary btn-default">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
