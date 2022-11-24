@extends('layouts.store')

@section('title')
    My Orders
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 mt-4">
          <div class="card">
            <div class="card-header pb-0 px-5">
              <h4 class="mb-0">My Orders</h4>
            </div>
            <div class="card-body pt-4 p-3">
              <ul class="list-group">
                @foreach ($order_list as $item)
                    @php $total = 0; @endphp
                    @php $total_item = count($item->products); @endphp
                        <a href="{{ url('order_details/'.$item->id) }}">
                            <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                                <div class="w-100 d-flex flex-column">
                                    <div class="d-flex flex-row justify-content-between">
                                        <div class="d-flex flex-column">
                                            <h6 class="mb-0 text-sm">#{{ $item->reference }}</h6>
                                            <span class="text-sm">{{ date_format($item->created_at,"F, d, Y") }}</span>
                                        </div>
                                        <div class="d-flex flex-row align-items-center">
                                            <div class="me-3">
                                                @if ($item->status == "waiting")
                                                <span class="badge badge-sm bg-gradient-secondary">waiting</span>
                                                    @elseif ($item->status == "confirmed")
                                                    <span class="badge badge-sm bg-gradient-success">Confirmed</span>
                                                    @elseif ($item->status == "shipping")
                                                    <span class="badge badge-sm bg-gradient-primary">Shipping</span>
                                                    @elseif ($item->status == "delivered")
                                                    <span class="badge badge-sm bg-gradient-primary">Delivered</span>
                                                    @elseif ($item->status == "finished")
                                                    <span class="badge badge-sm bg-gradient-light">Finished</span>
                                                        @else
                                                        <span class="badge badge-sm bg-gradient-danger">Canceled</span>
                                                @endif
                                            </div>
                                            <button class="btn btn-link text-secondary p-0 m-0">
                                                <i class="fa fa-ellipsis-v text-xl"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <hr class="horizontal dark my-3">
                                    <div class="d-flex flex-column mb-3 ">
                                        <div class="d-flex px-2 py-1">
                                            <img src="{{ asset('assets/uploads/products/'.$item->products[0]->products->img) }}" class="avatar avatar-xl me-3" alt="user1">
                                            <div class="d-flex flex-column justify-content-center">
                                            <h4 class="mb-0 lead font-weight-bold">{{ $item->products[0]->product_name }}</h6>
                                            <p class="text-sm text-secondary mb-0">Qty: {{ $item->products[0]->qty }}</p>
                                            </div>                        
                                        </div>
                                        @if (($total_item -1) !== 0)
                                            <span class="text-sm px-2">+{{ $total_item - 1 }} More Items</span>
                                            @else
                                                <div></div>
                                        @endif
                                    </div>
                                    <div class="d-flex flex-column">
                                        <span class="text-sm">Total Amount</span>
                                        @foreach ($item->products as $product)
                                            @php $total += $product->qty * $product->price; @endphp
                                        @endforeach
                                        <h6 class="mb-0 text-sm">Rp. {{ number_format( $total , "2", ",", "."); }}</h6>
                                    </div>
                                </div>
                                {{-- <div class="ms-auto text-end">
                                <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="javascript:;"><i class="far fa-trash-alt me-2"></i>Delete</a>
                                <a class="btn btn-link text-dark px-3 mb-0" href="javascript:;"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a>
                                </div> --}}
                            </li>
                        </a>
                @endforeach
              </ul>
            </div>
          </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
@endsection