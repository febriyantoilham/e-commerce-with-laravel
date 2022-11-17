@extends('layouts.admin')

@section('content')
    <div class="card min-vh-100">
        <div class="card-header">
            <h4>Add Product Catalogue</h4>
        </div>
        <div class="card-body">
            <form action="{{ url('create_item') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Item Price</label>
                        <input type="number" class="form-control" name="price">
                    </div>
                    
                    <div class="col-md-12 mb-3">
                        <label for="">Description</label>
                        <textarea name="description" id="" rows="3" class="form-control"></textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Stars</label>
                        <input type="number" class="form-control" name="stars">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Product Type</label>
                        <select class="form-select" name="product_type">
                          <option value="">Choose Product Type</option>
                          @foreach ($product_types as $product_type)
                            <option value="{{ $product_type->title}}">{{ $product_type->title }}</option>
                          @endforeach
                        </select>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Product Images</label>
                        <input type="file" name="img" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection