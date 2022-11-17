@extends('layouts.admin')

@section('content')
    <div class="card min-vh-100">
        <div class="card-body">
            <div class="row justify-content-between">
                <div class="col-6">
                    <h6>Catalogue Page</h6>
                </div>
                <div class="col-1">
                    <a href="{{ url('add_item') }}" class="btn btn-success">Create</a>
                </div>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table p-0">
                  <table class="table align-items-center mb-0">
                    <thead>
                      <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Price</th>
                        {{-- <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Stars</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Image</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Product Type</th> --}}
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Stars</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Image</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Product Type</th>
                        <th class="text-secondary opacity-7"></th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($catalogue as $item)
                        <tr>
                            <td>
                              <div class="d-flex px-2 py-1">
                                <div class="d-flex flex-column justify-content-center">
                                  <h6 class="mb-0 text-sm">{{ $item->name }}</h6>
                                  <p class="text-xs text-secondary mb-0">{{ $item->description }}</p>
                                </div>
                              </div>
                            </td>
                            <td>
                                <p class="text-xs text-secondary mb-0">{{ "Rp. " . number_format($item->price , "2", ",", "."); }}</p>
                                
                            </td>
                            <td>
                                <p class="text-xs text-secondary mb-0 text-center">{{ $item->stars }}</p>
                            </td>
                            <td>
                              <div class="d-flex justify-content-center">
                                <div>
                                  <img src="{{ asset('assets/uploads/products/'.$item->img) }}" class="avatar avatar-lg" alt="ImageProduct">
                                </div>
                              </div>
                            </td>
                            <td>
                              <p class="text-xs text-secondary mb-0 text-center">{{ $item->product_type }}</p>
                            </td>
                            <td class="align-middle text-center">
                                <a href="{{ url('edit_item/'.$item->id) }}" class="text-secondary px-2 font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                    <i class="fa fa-pen text-xs"></i>
                                </a>
                                <a href="{{ url('delete_item/'.$item->id) }}" class="text-secondary px-2 font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
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
@endsection