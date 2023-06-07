@extends('admin.admin_master')
@section('admin')
    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-4 d-flex justify-content-between">
                    <h4>Create Slider</h4>
                </div>
                <div class="col-12">
                    <div class="card card-default">
                        <div class="card-body">
                            <form action="{{ route('store.slider') }}" method="post" enctype="multipart/form-data" >
                                @csrf

                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Slider Title</label>
                                    <input type="text" name="title" class="form-control" placeholder="Enter Title">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Slider Description</label>
                                    <textarea name="description" class="form-control" rows="3">

                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="examp">Choose Slider Image </label>
                                    <input type="file" name="image" class="form-control-file" id="examp">
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
