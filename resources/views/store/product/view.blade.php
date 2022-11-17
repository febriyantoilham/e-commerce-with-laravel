@extends('layouts.store')

@section('title', $product->name)

@section('content')
    <div class="d-flex vh-100 product-view mb-5 product_data">
        <div class="" style="background-color: white; height: 100%; width: 100%">
            <div class="d-flex flex-column p-5">
                <div class="mt-5">
                <small style="font-size: 16px; font-weight: 500; color: orange; ">{{ $product->product_type }}</small>
                <small style="font-size: 16px; font-weight: 500;" class="px-2">.</small>
                <small style="font-size: 16px; font-weight: 500;">{{ $product->name }}</small>
            </div>
                <h1 style="font-size: 90px; font-weight: 500;">{{ $product->name }}</h1>
                <div>
                    <small style="font-size: 30px; font-weight: 400; margin-right: 30px">{{ "Rp. " . number_format($product->price , "2", ",", "."); }}</small>
                    @for ($i = 0; $i < $product->stars; $i++)
                        <small style="font-size: 24px; font-weight: 400; color: orange;">&#9733;</small>
                    @endfor
                </div>
                
                <div class="my-4 mb-4 d-flex sm-flex-column">
                    <div style="" class="mb-2 me-4">
                        <input type="hidden" value="{{ $product->id }}" class="product_id">
                        <button class="dec-btn py-2 btn btn-dark">-</button>
                        <input type="button" class="btn btn-dark py-2 qty-input text-center" value="0">
                        <button class="inc-btn py-2 btn btn-dark">+</button>
                    </div>
                    <div>
                        <small class="mb-2 px-5 py-2 btn btn-warning addToCartBtn" href="#" role="button" style="font-size: 18px; font-weight: 700;">+ Add to cart</small>
                    </div>
                </div>
                <p>{{ $product->description }}</p>
            </div>
        </div>
        <div class="" style="background-color:blanchedalmond; height: 100%; width: 100%">
            <img src="{{ asset('assets/uploads/products/'.$product->img) }}" alt="" class="fit-cover from-top" height="100%" width="100%">
        </div>
    </div>
@endsection