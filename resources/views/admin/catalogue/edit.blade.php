@extends('layouts.admin')

@section('content')
    <div class="card min-vh-100">
        <div class="card-header">
            <h4>Edit Product Catalogue</h4>
        </div>
        <div class="card-body">
            <form action="{{ url('update_item/'.$catalogue_item->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name" value="{{ $catalogue_item->name }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Item Price</label>
                        <input type="number" class="form-control" name="price" value="{{ $catalogue_item->price }}">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Description</label>
                        <textarea name="description" id="" rows="3" class="form-control">{{ $catalogue_item->description }}</textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Stars</label>
                        <input type="number" class="form-control" name="stars" value="{{ $catalogue_item->stars }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Product Type</label>
                        <select class="form-select" name="product_type">
                          <option value="{{ $catalogue_item->product_type }}">{{ $catalogue_item->product_type }}</option>
                          @foreach ($product_types as $product_type)
                            <option value="{{ $product_type->title}}">{{ $product_type->title }}</option>
                          @endforeach
                        </select>
                    </div>
                    @if ($catalogue_item->img)
                        <div class="col-md-12 mb-3">
                            <img src="{{ asset('assets/uploads/products/'.$catalogue_item->img) }}" style="max-height: 500px; max-width: 100%;" class=" border-radius-xl">
                        </div>
                    @endif
                    <div class="col-md-12 mb-3">
                        <label for="">Product Images</label>
                        <input type="file" name="img" class="form-control">
                    </div>
                    <div class="col-md-12 d-flex justify-content-end">
                        <a class="btn btn-danger me-3" href="{{ url('catalogue') }}" role="button">Cancel</a>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection