@extends('layouts.store')

@section('title')
    Catalog
@endsection

@section('content')
    <div class="container-fluid">
        <div class="card mt-4">
        <div class="card-header pb-0 px-5">
            <h4 class="mb-0">Our Catalog</h4>
        </div>
        <div class="card-body">
            <div class="row">
                @foreach ($catalogs  as $item)    
                <div class="col-md-4">
                    <div class="item pb-5">
                        <a href="{{ url('details/'.$item->id) }}">
                            <div class="card card-profile">
                                <img src="{{ asset('assets/uploads/products/'.$item->img) }}" alt="Product Image" class="fit-cover from-top card-img-top" height="512">
                                <div class="card-body">
                                    <h1 class="text-center">{{ $item->name }}</h1>
                                    <p class="text-center">{{ $item->description }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection