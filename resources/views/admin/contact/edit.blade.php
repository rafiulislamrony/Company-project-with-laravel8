@extends('admin.admin_master')
@section('admin')
<div class="py-12">
    <div class="container">
        <div class="row">
            <div class="col-12 mb-4 d-flex justify-content-between">
                <h4>Edit Contact</h4>
            </div>
            <div class="col-12">
                <div class="card card-default">
                    <div class="card-body">
                        <form action="{{ url('contact/update/'.$contacts->id) }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Email</label>
                                <input type="email" name="email" class="form-control" value="{{ $contacts->email }}" >
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlInput1">Phone</label>
                                <input type="number" name="phone" class="form-control" value="{{ $contacts->phone }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Address </label>
                                <textarea name="address" class="form-control" rows="3">
                                    {{ $contacts->address }}
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
