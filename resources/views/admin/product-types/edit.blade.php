@extends('layouts.admin')

@section('content')
    <div class="card min-vh-100">
        <div class="card-header">
            <h4>Edit Product Type</h4>
        </div>
        <div class="card-body">
            <form action="{{ url('update_product_type/'.$product_type->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="">Title</label>
                        <input type="text" class="form-control" name="title" value="{{ $product_type->title }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Code</label>
                        <input type="text" class="form-control" name="slug" value="{{ $product_type->slug }}">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Description</label>
                        <textarea name="description" id="" rows="3" class="form-control">{{ $product_type->description }}</textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Status</label>
                        <input type="checkbox" name="status" 
                        {{ $product_type->status == 1 ? 'checked' : ''}}
                        >
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Popular</label>
                        <input type="checkbox" name="popular"
                        {{ $product_type->popular == 1 ? 'checked' : ''}}
                        >
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ url('product_types') }}" class="btn btn-danger">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection