@extends('layouts.admin')

@section('title')
    Users
@endsection

@section('content')
    <div class="card min-vh-100">
        <div class="card-body">
            <div class="row justify-content-between">
                <div class="col-6">
                    <h6>User Page</h6>
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
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Phone</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Domicile</th>
                        <th class="text-secondary opacity-7"></th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>
                              <div class="d-flex px-2 py-1">
                                <div class="d-flex flex-column justify-content-center">
                                  <h6 class="mb-0 text-sm">{{ $user->name }}</h6>
                                  <p class="text-xs text-secondary mb-0">{{ $user->email }}</p>
                                </div>
                              </div>
                            </td>
                            <td>
                                <p class="text-capitalize text-xs text-secondary mb-0 text-center">{{ $user->phone }}</p>
                            </td>
                            <td>
                                <p class="text-capitalize text-xs text-secondary mb-0 text-center">{{ $user->country }}</p>
                            </td>
                            <td class="align-middle text-center">
                                <a href="{{ url('edit_user/'.$user->id) }}" class="text-secondary px-2 font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                    <i class="fa fa-pen text-xs"></i>
                                </a>
                                <a href="{{ url('delete_user/'.$user->id) }}" class="text-secondary px-2 font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
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