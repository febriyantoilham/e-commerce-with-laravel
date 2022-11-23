@extends('layouts.admin')

@section('title')
    Orders
@endsection

@section('content')
    <div class="card min-vh-100">
        <div class="card-body">
            <div class="row justify-content-between">
                <div class="col-6">
                    <h6>Orders Page</h6>
                </div>
                {{-- <div class="col-1">
                    <a href="{{ url('add_item') }}" class="btn btn-success">Create</a>
                </div> --}}
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table p-0">
                  <table class="table align-items-center mb-0">
                    <thead>
                      <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Invoices</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">User</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Payment</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                        <th class="text-secondary opacity-7"></th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $item)
                        <tr>
                            <td>
                              <div class="d-flex px-2 py-1">
                                <div class="d-flex flex-column justify-content-center">
                                  <h6 class="mb-0 text-sm">{{ date_format($item->created_at,"F, d, Y") }}</h6>
                                  <p class="text-xs text-secondary mb-0">#{{ $item->reference }}</p>
                                </div>
                              </div>
                            </td>
                            <td>
                                {{-- <p class="text-xs text-secondary mb-0">{{ "Rp. " . number_format($item->price , "2", ",", "."); }}</p> --}}
                                <p class="text-capitalize text-xs text-secondary mb-0 text-center">{{ $item->name }}</p>
                            </td>
                            <td class="align-middle text-center text-sm">
                                @if ($item->payment_status == "paid")
                                    <span class="badge badge-sm bg-gradient-success">Paid</span>
                                    @else
                                    <span class="badge badge-sm bg-gradient-danger">Unpaid</span>
                                @endif
                            </td>
                            <td class="align-middle text-center text-sm">
                                @if ($item->status == "waiting")
                                    <span class="badge badge-sm bg-gradient-secondary">waiting</span>
                                    @elseif ($item->status == "confirmed")
                                    <span class="badge badge-sm bg-gradient-success">Confirmed</span>
                                        @elseif ($item->status == "shipping")
                                        <span class="badge badge-sm bg-gradient-primary">Shipping</span>
                                            @elseif ($item->status == "delivered")
                                            <span class="badge badge-sm bg-gradient-primary">delivered</span>
                                                @elseif ($item->status == "finished")
                                                <span class="badge badge-sm bg-gradient-light">finished</span>
                                                    @else
                                                    <span class="badge badge-sm bg-gradient-danger">Canceled</span>
                                @endif
                            </td>
                            <td class="align-middle text-center">
                                <a href="{{ url('edit_item/'.$item->id) }}" class="text-secondary px-2 font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                    <i class="fa fa-pen text-xs"></i>
                                </a>
                                {{-- <a href="{{ url('delete_item/'.$item->id) }}" class="text-secondary px-2 font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                    <i class="fa fa-trash text-xs"></i>
                                </a> --}}
                            </td>
                          </tr>
                        @endforeach
                      
                    </tbody>
                  </table>
                </div>
            </div>
        </div>
    </div>
@endsection