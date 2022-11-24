@extends('layouts.store')

@section('title')
    Order Details
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-md-7 mb-3">
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <div class="card p-4">
                            <div class="d-flex flex-row justify-content-between">
                                @if ($order_item->status == "waiting")
                                <span class="badge badge-sm bg-gradient-secondary">waiting</span>
                                    @elseif ($order_item->status == "confirmed")
                                    <span class="badge badge-sm bg-gradient-success">Confirmed</span>
                                    @elseif ($order_item->status == "shipping")
                                    <span class="badge badge-sm bg-gradient-primary">Shipping</span>
                                    @elseif ($order_item->status == "delivered")
                                    <span class="badge badge-sm bg-gradient-primary">Delivered</span>
                                    @elseif ($order_item->status == "finished")
                                    <span class="badge badge-sm bg-gradient-light">Finished</span>
                                        @else
                                        <span class="badge badge-sm bg-gradient-danger">Canceled</span>
                                @endif
                            </div>
                            <hr class="horizontal dark my-3">
                            <div class="d-flex flex-row justify-content-between mb-2">
                                <span class="plain">#{{ $order_item->reference }}</span>
                            </div>
                            <div class="d-flex flex-row justify-content-between">
                                <span class="plain">Order Date</span>
                                <span class="plain">{{ date_format($order_item->created_at,"F d Y, H:i") }}</span>
                            </div>
                        </div>
                    </div> 
                    <div class="col-md-12 mb-3">
                        <div class="card p-4">
                            <div class="d-flex flex-row justify-content-between mb-3">
                                <h6 class="mb-0 p-0">Delivery Details</h6>
                            </div>
                            <hr class="horizontal dark my-3">
                            <div class="row">
                                <div class="col-4 mb-2">
                                    <span class="text-sm">Delivery Status</span>
                                </div>
                                <div class="col-8 mb-2">
                                    @if ($order_item->status == "shipping")
                                    <span class="badge badge-sm bg-gradient-primary">Shipping</span>
                                    @elseif ($order_item->status == "delivered")
                                    <span class="badge badge-sm bg-gradient-success">Delivered</span>
                                    @else
                                    <span class="badge badge-sm bg-gradient-secondary">On Process</span>
                                    @endif
                                </div>
                                <div class="col-4">
                                    <span class="text-sm">Address</span>
                                </div>
                                <div class="col-8 d-flex flex-column">
                                    <span class="text-sm text-capitalize">{{ $order_item->name }}</span>
                                    <span class="text-sm text-capitalize">{{ $order_item->address }}, {{ $order_item->city }}, {{ $order_item->country }}, {{ $order_item->postalcode }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <div class="card p-4">
                            @php $total = 0; $delivery_amount = 0; $discount = 0; @endphp
                            <div class="d-flex flex-row justify-content-between mb-3">
                                <h6 class="mb-0 p-0">Payment Details</h6>
                                @if ($order_item->payment_status == "paid")
                                <span class="badge badge-sm bg-gradient-success">Paid</span>
                                    @else
                                    <span class="badge badge-sm bg-gradient-danger">Unpaid</span>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-8">
                                    <span class="text-sm">Payment Method</span>
                                </div>
                                <div class="col-4 d-flex flex-row justify-content-end">
                                    <span class="text-sm text-capitalize">{{ $order_item->payment_method }}</span>
                                </div>
                            </div>
                            <hr class="horizontal dark my-3">
                            <div class="row">
                                
                                <div class="col-8 mb-2">
                                    <span class="text-sm">Total Amount</span>
                                </div>
                                <div class="col-4 d-flex flex-row justify-content-end mb-2">
                                        @foreach ($order_item->products as $item)
                                        <div class="d-flex flex-column">
                                            @php $total += $item->qty * $item->price; @endphp
                                        </div>
                                        @endforeach
                                        <h6 class="mb-0 text-sm">Rp. {{ number_format( $total , "2", ",", "."); }}</h6>
                                </div>
                                <div class="col-8 mb-2">
                                    <span class="text-sm">Delivery Amount</span>
                                </div>
                                <div class="col-4 d-flex flex-row justify-content-end">
                                        <h6 class="mb-0 text-sm">Rp. {{ number_format( $delivery_amount , "2", ",", "."); }}</h6>
                                </div>
                                <div class="col-8 mb-2">
                                    <span class="text-sm">Discount</span>
                                </div>
                                <div class="col-4 d-flex flex-row justify-content-end">
                                        <h6 class="mb-0 text-sm">Rp. {{ number_format( $discount , "2", ",", "."); }}</h6>
                                </div>
                            </div>
                            <hr class="horizontal dark my-3">
                            <div class="row">
                                <div class="col-8">
                                    <h6 class="mb-0 p-0">Total Order</h6>
                                </div>
                                <div class="col-4 d-flex flex-row justify-content-end">
                                    <h6 class="mb-0 p-0">Rp. {{ number_format( $total + $delivery_amount + $discount , "2", ",", "."); }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="col-md-5">
                <div class="card p-4">
                    <div class="d-flex flex-row justify-content-between mb-3">
                        <h6 class="mb-0">Product Details</h6>
                    </div>
                    @foreach ($order_item->products as $item)
                        <div class="card card-body border card-plain border-radius-lg d-flex flex-column mb-3">
                            <div class="d-flex">
                                <img src="{{ asset('assets/uploads/products/'.$item->products->img) }}" class="avatar avatar-xl me-3" alt="user1">
                                <div class="d-flex flex-column justify-content-center">
                                <h4 class="mb-0 lead font-weight-bold">{{ $item->product_name }}</h6>
                                <p class="text-sm text-secondary mb-0">{{ $item->qty }} x Rp. {{ number_format( $item->price , "0", ",", "."); }}</p>
                                </div>                        
                            </div>
                            <hr class="horizontal dark my-3">
                            <div class="d-flex flex-row justify-content-between">
                                <div class="d-flex flex-column">
                                    <span class="text-sm">Total Amount</span>
                                    <h6 class="mb-0 text-sm">Rp. {{ number_format( $item->price * $item->qty , "2", ",", "."); }}</h6>
                                </div>
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