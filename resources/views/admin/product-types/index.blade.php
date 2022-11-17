@extends('layouts.admin')

@section('content')
    <div class="card min-vh-100">
        <div class="card-body">
            <div class="row justify-content-between">
                <div class="col-6">
                    <h6>Product Type Page</h6>
                </div>
                <div class="col-1">
                    <a href="{{ url('add_type') }}" class="btn btn-success">Create</a>
                </div>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table p-0">
                  <table class="table align-items-center mb-0">
                    <thead>
                      <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Title</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Description</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Popular</th>
                        <th class="text-secondary opacity-7"></th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($product_types as $product_type)
                        <tr>
                            <td>
                              <div class="d-flex px-2 py-1">
                                <div class="d-flex flex-column justify-content-center">
                                  <h6 class="mb-0 text-sm">{{ $product_type->title }}</h6>
                                  <p class="text-xs text-secondary mb-0">{{ $product_type->slug }}</p>
                                </div>
                              </div>
                            </td>
                            <td>
                                <p class="text-xs text-secondary mb-0">{{ $product_type->description }}</p>
                              </td>
                            <td class="align-middle text-center text-sm">
                                
                                    @if ($product_type->status == 1)
                                        <span class="badge badge-sm bg-gradient-success">Active</span>
                                        @else
                                        <span class="badge badge-sm bg-gradient-secondary">Non-Active</span>
                                    @endif
                              </td>
                            <td class="align-middle text-center text-sm">
                                    @if ($product_type->popular == 1)
                                        <span class="badge badge-sm bg-gradient-success">Yes</span>
                                        @else
                                        <span class="badge badge-sm bg-gradient-secondary">No</span>
                                    @endif
                              </td>
                            <td class="align-middle text-center">
                                <a href="{{ url('edit_product_type/'.$product_type->id) }}" class="text-secondary px-2 font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                    <i class="fa fa-pen text-xs"></i>
                                </a>
                                <a href="{{ url('delete_product_type/'.$product_type->id) }}" class="text-secondary px-2 font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
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