@extends('layouts.store')

@section('title')
    My Cart
@endsection

@section('content')

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
                                    <button type="button" class="m-0 px-3 py-2 dec-btn btn btn-dark">-</button>
                                    <input type="button" class="m-0 px-4 py-2 btn btn-dark qty-input text-center" value="{{ $item->qty }}">
                                    <button type="button" class="m-0 px-3 py-2 inc-btn btn btn-dark">+</button>
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
                  
                <div class="card card-body border card-plain border-radius-lg">
                    <div class="row">
                        <div class="col-sm-10">
                            <div class="d-flex">
                                <button class="btn btn-icon-only btn-rounded btn-outline-secondary text-black mb-0 me-3 btn-sm d-flex align-items-center justify-content-center">A</button>
                                <div class="px-3 w-100">
                                    <p class="text-uppercase text-sm">User Information</p>
                                    <div class="d-flex">
                                        <p class="text-capitalize font-weight-bolder me-3">{{ Auth::user()->name }}</p>
                                        <p class="font-weight-bolder">({{ Auth::user()->email }})</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2 d-flex align-items-center justify-content-center">
                            <button type="button" class="btn btn-light m-0">CHANGE</button>
                        </div>
                    </div>
                </div>
                <div class="card card-body border card-plain border-radius-lg mt-3">
                    <div class="row">
                        <div class="col-sm-10">
                            <div class="d-flex">
                                <button class="btn btn-icon-only btn-rounded btn-outline-secondary text-black mb-0 me-3 btn-sm d-flex align-items-center justify-content-center">B</button>
                                <div class="px-3 w-100">
                                    <p class="text-uppercase text-sm">Shipping Address</p>
                                    <div style="">
                                        <p class="text-capitalize font-weight-bolder mb-2">Brady Cooper, New Civil Colony, Salt Lake City, Utah, United State, 2971 Avenue</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2 d-flex align-items-center justify-content-center">
                            <button type="button" class="btn btn-light m-0">CHANGE</button>
                        </div>
                    </div>
                </div>
                <div class="card card-body border card-plain border-radius-lg mt-3">
                    <div class="d-flex">
                        <button class="btn btn-icon-only btn-rounded btn-outline-secondary text-black mb-0 me-3 btn-sm d-flex align-items-center justify-content-center">C</button>
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
@endsection

@section('scripts')
@endsection