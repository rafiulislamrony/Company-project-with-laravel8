@extends('admin.admin_master')
@section('admin')
<div class="py-12">
    <div class="container">
        <div class="row">
            <div class="col-12 mb-4 d-flex justify-content-between">
                <h4>Edit About</h4>
            </div>
            <div class="col-12">
                <div class="card card-default">
                    <div class="card-body">
                        <form action="{{ url('update/homeabout/'.$homeabout->id) }}" method="post">
                            @csrf

                            <div class="form-group">
                                <label for="exampleFormControlInput1">About Title</label>
                                <input type="text" name="title" value="{{ $homeabout->title }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Short Description</label>
                                <textarea name="short_dis" class="form-control" rows="3">
                                    {{ $homeabout->short_dis }}
                                </textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Long Description</label>
                                <textarea name="long_dis" class="form-control" rows="3">
                                    {{ $homeabout->long_dis }}
                                </textarea>
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
