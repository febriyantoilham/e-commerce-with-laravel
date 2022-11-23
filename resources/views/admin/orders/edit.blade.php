@extends('layouts.admin')

@section('content')
    <div class="card min-vh-100">
        <div class="card-header">
            <h4>Edit Order</h4>
        </div>
        <div class="card-body">
            <form action="{{ url('update_order/'.$order_item->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="">Order Id</label>
                        <input type="text" class="form-control text-capitalize" name="name" value="{{ $order_item->reference }}">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="">Order Date</label>
                        <input type="text" class="form-control" name="email" value="{{ date_format($order_item->created_at,"F, d, Y") }}" disabled>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="">Order Status</label>
                        <select class="form-select text-capitalize" name="status">
                        <option value="{{ $order_item->status }}">{{ $order_item->status }}</option>
                            <option value="waiting">Waiting</option>
                            <option value="confirmed">Confirmed</option>
                            <option value="shipping">Shipping</option>
                            <option value="delivered">Delivered</option>
                            <option value="finished">Finished</option>
                            <option value="canceled">Canceled</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Total Items</label>
                        <input type="text" class="form-control text-capitalize" name="name" value="{{ $total_qty }}" disabled>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Total Amount</label>
                        <input type="text" class="form-control text-capitalize" name="name" value="{{ "Rp. " . number_format($total_amount , "2", ",", "."); }}" disabled>
                    </div>
                </div>
                {{-- User Info --}}
                <div>
                    <button class="card card-body border card-plain d-flex align-items-center flex-row btn btn-light w-100" type="button" data-bs-toggle="collapse" data-bs-target="#UserInformation" aria-expanded="true" aria-controls="UserInformation">
                        <div class="d-flex align-items-center">
                            <a style="pointer-events: none;" class="btn btn-icon-only btn-rounded btn-outline-primary m-0 me-3 btn-sm">A</a>
                            <p class="text-uppercase text-sm m-0">User Contact Information</p>
    
                        </div>
                    </button>
                    <div class="collapse" id="UserInformation">
                        <div class="card card-body border card-plain mb-3">
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="">Name</label>
                                    <input type="text" class="form-control text-capitalize" name="name" value="{{ $order_item->name }}">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="">Email</label>
                                    <input type="text" class="form-control" name="email" value="{{ $order_item->email }}">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="">Phone</label>
                                    <input type="text" class="form-control" name="phone" value="{{ $order_item->phone }}">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="">Address</label>
                                    <input type="text" class="form-control text-capitalize" name="address" value="{{ $order_item->address }}">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="">City</label>
                                    <input type="text" class="form-control text-capitalize" name="city" value="{{ $order_item->city }}">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="">Country</label>
                                    <input type="text" class="form-control text-capitalize" name="country" value="{{ $order_item->country }}">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="">Postal Code</label>
                                    <input type="text" class="form-control" name="postalcode" value="{{ $order_item->postalcode }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                {{-- Product Details --}}
                <div>
                    <button class="card card-body border card-plain d-flex align-items-center flex-row btn btn-light w-100" type="button" data-bs-toggle="collapse" data-bs-target="#ProductDetails" aria-expanded="true" aria-controls="ProductDetails">
                        <div class="d-flex align-items-center">
                            <a style="pointer-events: none;" class="btn btn-icon-only btn-rounded btn-outline-primary m-0 me-3 btn-sm">A</a>
                            <p class="text-uppercase text-sm m-0">Product Details</p>
    
                        </div>
                    </button>
                    <div class="collapse" id="ProductDetails">
                        <div class="card card-body border card-plain mb-3">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                    <tr>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Product Id</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Product Name</th>
                                        <th class="text-end pe-0 text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Price</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Quantity</th>
                                        <th class="text-end pe-0 text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Total</th>
                                        <th class="text-secondary opacity-7"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($order_details as $item)
                                            <tr>
                                                <td>
                                                    <h6 class="text-sm text-center mb-0">{{ $item->product_id }}</h6>
                                                </td>
                                                <td>
                                                    <div class="d-flex px-2 py-1 justify-content-center">
                                                        <div>
                                                            <img src="{{ asset('assets/uploads/products/'.$item->products->img) }}" class="avatar avatar-sm me-3" alt="user1">
                                                        </div>
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="text-sm mb-0">{{ $item->product_name }}</h6>
                                                        </div>                        
                                                    </div>
                                                </td>
                                                <td>
                                                    <h6 class="text-sm text-end mb-0">{{ "Rp. " . number_format($item->price , "2", ",", "."); }}</h6>
                                                </td>
                                                <td>
                                                    <h6 class="text-sm text-center mb-0">{{ $item->qty }}</h6>
                                                </td>
                                                <td>
                                                    <h6 class="text-sm text-end mb-0">{{ "Rp. " . number_format($item->price * $item->qty , "2", ",", "."); }}</h6>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <a href="{{ url('delete_order_item/'.$item->id) }}" class="text-secondary px-2 font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                                        <i class="fa fa-trash text-xs"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                            
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                
                {{-- Payment --}}
                <div>
                    <button class="card card-body border card-plain d-flex align-items-center flex-row btn btn-light w-100" type="button" data-bs-toggle="collapse" data-bs-target="#Payment" aria-expanded="true" aria-controls="Payment">
                        <div class="w-100 d-flex flex-row align-items-center justify-content-between">
                            <div class="d-flex flex-row">
                                <a style="pointer-events: none;" class="btn btn-icon-only btn-rounded btn-outline-primary m-0 me-3 btn-sm">A</a>
                                <p class="text-uppercase text-sm m-0">Payment Details</p>
                            </div>
                            <div class="d-flex flex-row">
                                @if ($order_item->payment_status == "paid")
                                    <span class="badge badge-sm bg-gradient-success">Paid</span>
                                    @else
                                    <span class="badge badge-sm bg-gradient-danger">Unpaid</span>
                                @endif
                            </div>
                        </div>
                    </button>
                    <div class="collapse" id="Payment">
                        <div class="card card-body border card-plain mb-3">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="">Payment Method</label>
                                    <select class="form-select text-capitalize" name="payment_method">
                                    <option value="{{ $order_item->payment_method }}">{{ $order_item->payment_method }}</option>
                                        <option value="transfer bank">Transfer Bank</option>
                                        <option value="cash on delivery">Cash On Delivery</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">Payment Status</label>
                                    <select class="form-select text-capitalize" name="payment_status">
                                    <option value="{{ $order_item->payment_status }}">{{ $order_item->payment_status }}</option>
                                        <option value="unpaid">unpaid</option>
                                        <option value="paid">paid</option>
                                    </select>
                                </div>
                                @if ($order_item->payment_reference)
                                    <div class="col-md-12 mb-3">
                                        <img src="{{ asset('assets/uploads/payments/'.$order_item->payment_reference) }}" style="max-height: 500px; max-width: 100%;">
                                    </div>
                                @endif
                                <div class="col-md-12 mb-3">
                                    <label for="">Payment Images</label>
                                    <input type="file" name="payment_reference" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Message</label>
                    <textarea name="message" id="" rows="3" class="form-control">{{ $order_item->message }}</textarea>
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection