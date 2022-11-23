@extends('layouts.store')

@section('title')
    My Cart
@endsection

@section('content')
    @if (count($cartItem) !== 0)
    <div>
        <div class="container-fluid py-4">
            <div class="card p-3">
                <div class="card-body p-3">
                  <div class="row gx-4">
                    <div class="col-auto my-auto">
                      <div class="h-100">
                        <h3 class="mb-1">
                          Shopping Cart
                        </h5>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
              <div class="col-md-4">
                <div class="card p-5">
                    <div class="card-header p-0">
                      <div class="d-flex align-items-center">
                        <h4 class="mb-0 font-weight-bold">Your Order</h4>
                      </div>
                    </div>
                    <div class="card-body p-0">
                        <hr class="horizontal dark my-4">
                        @php $total = 0; @endphp
                        @foreach ($cartItem as $item)
                            <div class="row product_data" style="">
                                <div class="col-3 d-flex align-items-center">
                                    <div class="avatar avatar-xxl">
                                        <img src="{{ asset('assets/uploads/products/'.$item->products->img) }}" alt="profile_image" class="w-100 h-100 fit-cover from-top border-radius-lg shadow-sm">
                                    </div>
                                </div>
                                <div class="col-8 d-flex flex-column justify-content-around">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">{{ $item->products->name }}</p>
                                    <p class="mb-0"><span class="text-success text-sm font-weight-bolder">{{ $item->products->description }}</span></p>
                                    <div class="d-flex">
                                        <p class="font-weight-bolder">Rp. {{ number_format($item->products->price , "2", ",", "."); }}</p>
                                        <p class="mx-3">x</p>
                                        <input type="button" class="btn btn-link p-0 disabled qty-input text-center" value="{{ $item->qty }}" style="color:black">
                                    </div>
                                    <div class="">
                                        <input type="hidden" class="m-0 p-0 product_id" value="{{ $item->product_id }}">
                                        <button type="button" class="m-0 px-3 py-2 dec-btn qty-update btn btn-dark">-</button>
                                        <input type="button" class="m-0 px-4 py-2 btn btn-dark qty-input text-center" value="{{ $item->qty }}" style="pointer-events: none;">
                                        <button type="button" class="m-0 px-3 py-2 inc-btn qty-update btn btn-dark">+</button>
                                    </div>
                                </div>
                                <a class="col-1 btn btn-outline-danger text-danger delete-item p-0 m-0 d-flex align-items-center justify-content-center"><i class="far fa-trash-alt"></i></a>
                            </div>
                            <hr class="horizontal dark my-4">
                            @php $total += $item->products->price * $item->qty; @endphp
                            @endforeach
                        <div class="my-2">
                            <div class="d-flex justify-content-between">
                                <div class=""><p class="">Delivery</p></div>
                                <div class=""><p class="font-weight-bolder">Rp. 10.000,00</p></div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div class=""><p class="">Discount</p></div>
                                <div class=""><p class="font-weight-bolder">Rp. 10.000,00</p></div>
                            </div>
                        </div>
                        <hr class="horizontal dark mt-4 mb-5">
                        <div class="d-flex justify-content-between">
                            <div class=""><h3>Total</h3></div>
                            <div class=""><h3>Rp. {{ number_format($total , "2", ",", "."); }}</h3></div>
                        </div>
                    </div>
                  </div>
              </div>
              <div class="col-md-8">
                <div class="card">
                  <div class="card-body">
                    
                    <div class="card card-body border card-plain border-radius-lg mt-3">
                        <div class="row">
                            <div class="col-sm-10 sm-mb-4">
                                <div class="d-flex">
                                    <button style="pointer-events: none;" class="btn btn-icon-only btn-rounded btn-outline-secondary text-black mb-0 me-3 btn-sm d-flex align-items-center justify-content-center">A</button>
                                    <div class="px-3 w-100">
                                        <p class="text-uppercase text-sm">Shipping Address</p>
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-md text-capitalize">{{ Auth::user()->name }} {{ Auth::user()->lname }}</h6>
                                            <p class="text-sm text-secondary mb-0">{{ Auth::user()->email }}</p>
                                            <p class="text-sm text-secondary mb-0">{{ Auth::user()->phone }}</p>
                                            <p class="text-sm text-secondary mb-0">{{ Auth::user()->address }}, {{ Auth::user()->city }}, {{ Auth::user()->country }}</p>
                                            <p class="text-sm text-secondary mb-0">{{ Auth::user()->postalcode }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2 d-flex align-items-center justify-content-center">
                                <!-- Button trigger modal -->
                                @if (Auth::user()->address !== "")
                                    <button type="button" class="btn btn-light m-0" data-bs-toggle="modal" data-bs-target="#shippingaddressmodal">
                                        Change
                                    </button>
                                    @else
                                    <button type="button" class="btn btn-light m-0" data-bs-toggle="modal" data-bs-target="#shippingaddressmodal">
                                        Add Address
                                    </button>
                                    @endif
                                
                            </div>
                        </div>
                    </div>
                    <div class="card card-body border card-plain border-radius-lg mt-3">
                        <div class="d-flex">
                            <button style="pointer-events: none;" class="btn btn-icon-only btn-rounded btn-outline-secondary text-black mb-0 me-3 btn-sm d-flex align-items-center justify-content-center">B</button>
                            <div class="px-3 w-100">
                                <p class="text-uppercase text-sm">Payment Method</p>
                            </div>
                        </div>
                        <div class="mt-3">
                            <button class="btn btn-light bg-white w-100" type="button" data-bs-toggle="collapse" data-bs-target="#debit" aria-expanded="true" aria-controls="debit">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex align-items-center justify-content-center" style="width: 50px; height: 50px; border: 1px solid black; border-radius: 10px; margin-right: 20px;">
                                        <h4 class="m-0 p-0"><i class="fa fa-credit-card-alt" aria-hidden="true"></i></h4>
                                    </div>
                                    <p class="text-capitalize font-weight-bolder mb-2">Debit / Credit Card</p>
                                </div>
                            </button>
                            <div class="collapse" id="debit">
                                <div class="card card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                          <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Enter Card Number *</label>
                                            <input class="form-control" type="text">
                                          </div>
                                        </div>
                                        <div class="col-md-4">
                                          <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Valid Date</label>
                                            <input class="form-control" type="date">
                                          </div>
                                        </div>
                                        <div class="col-md-4">
                                          <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">CVV*</label>
                                            <input class="form-control" type="text">
                                          </div>
                                        </div>
                                        <div class="col-md-4 d-flex align-items-end">
                                          <div class="form-group m-0 w-100">
                                            <button class="w-100 btn btn-success d-flex align-items-center justify-content-center">Pay</button>
                                          </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <button class="btn btn-light bg-white w-100" type="button" data-bs-toggle="collapse" data-bs-target="#mbanking" aria-expanded="true" aria-controls="mbanking">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex align-items-center justify-content-center" style="width: 50px; height: 50px; border: 1px solid black; border-radius: 10px; margin-right: 20px;">
                                        <h4 class="m-0 p-0"><i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i></h4>
                                    </div>
                                    <p class="text-capitalize font-weight-bolder mb-2">Internet Banking</p>
                                </div>
                            </button>
                            <div class="collapse" id="mbanking">
                                <div class="card card-body">
                                    Some placeholder content for the collapse component. This panel is hidden by default but revealed when the user activates the relevant trigger.
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <button class="btn btn-light bg-white w-100" type="button" data-bs-toggle="collapse" data-bs-target="#COD" aria-expanded="true" aria-controls="COD">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex align-items-center justify-content-center" style="width: 50px; height: 50px; border: 1px solid black; border-radius: 10px; margin-right: 20px;">
                                        <h4 class="m-0 p-0"><i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i></h4>
                                    </div>
                                    <p class="text-capitalize font-weight-bolder mb-2">Cash On Delivery</p>
                                </div>
                            </button>
                            <div class="collapse" id="COD">
                                <div class="card card-body">
                                    Some placeholder content for the collapse component. This panel is hidden by default but revealed when the user activates the relevant trigger.
                                </div>
                            </div>
                        </div>
                    </div>
              </div>
            </div>
        </div>
    </div>
    @else
    <div>
        <div class="container-fluid py-4">
            <div class="card p-3">
                <div class="card-body p-3">
                  <div class="row gx-4">
                    <div class="col-auto my-auto">
                      <div class="h-100">
                        <h3 class="mb-1">
                          Shopping Cart
                        </h5>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
        <div class="container-fluid py-4">
            <div class="card p-3">
                <div class="card-body d-flex flex-column align-items-center">
                    <img src="{{ asset('assets/img/EmptyCart.png') }}" alt="Product Image" class="" style="max-height: 400px; max-width: 400px;">
                    <h2 class="mt-5">Your Cart is Empty</h2>
                    <p class="text-center">Looks like you haven't added anything to your cart yet</p>
                    <a class="btn btn-dark text-white px-4" href="{{ url('/') }}">Go to Catalog</a>
                </div>
            </div>
        </div>
    </div>
    @endif

    <!-- Modal -->
    <div class="modal fade" id="shippingaddressmodal" tabindex="-1" aria-labelledby="shippingAddressModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-fullscreen-lg-down modal-lg p-4">
            <form action="{{ url('updateUser') }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="shippingAddressModalLabel">Shipping Address</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">First name</label>
                                    <input class="form-control text-capitalize" name="name" type="text" value="{{ Auth::user()->name }}" placeholder="First Name" disabled>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Email address</label>
                                        <input class="form-control" name="email" type="email" value="{{ Auth::user()->email }}" placeholder="Email Address" disabled>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Phone Number</label>
                                        <input class="form-control" name="phone" type="text" value="{{ Auth::user()->phone }}" placeholder="Phone Number">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Address</label>
                                        <input class="form-control" name="address" type="text" value="{{ Auth::user()->address }}" placeholder="Address">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">City</label>
                                        <input class="form-control" name="city" type="text" value="{{ Auth::user()->city }}" placeholder="City">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Country</label>
                                        <input class="form-control" name="country" type="text" value="{{ Auth::user()->country }}" placeholder="Country">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Postal code</label>
                                        <input class="form-control" name="postalcode" type="text" value="{{ Auth::user()->postalcode }}" placeholder="Postal Code">
                                    </div>
                                </div>
                        </div>
                    </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
@endsection

@section('scripts')
@endsection