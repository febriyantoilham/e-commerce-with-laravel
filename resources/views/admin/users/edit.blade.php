@extends('layouts.admin')

@section('content')
    <div class="card min-vh-100">
        <div class="card-header">
            <h4>Edit User Data</h4>
        </div>
        <div class="card-body">
            <form action="{{ url('update_user/'.$user_data->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="">Name</label>
                        <input type="text" class="form-control text-capitalize" name="name" value="{{ $user_data->name }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Email</label>
                        <input type="text" class="form-control" name="email" value="{{ $user_data->email }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Phone</label>
                        <input type="text" class="form-control" name="phone" value="{{ $user_data->phone }}">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Address</label>
                        <input type="text" class="form-control text-capitalize" name="address" value="{{ $user_data->address }}">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="">City</label>
                        <input type="text" class="form-control text-capitalize" name="city" value="{{ $user_data->city }}">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="">Country</label>
                        <input type="text" class="form-control text-capitalize" name="country" value="{{ $user_data->country }}">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="">Postal Code</label>
                        <input type="text" class="form-control" name="postalcode" value="{{ $user_data->postalcode }}">
                    </div>
                </div>
                <div class="col-md-12 d-flex justify-content-end">
                    <a class="btn btn-danger me-3" href="{{ url('users') }}" role="button">Cancel</a>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection