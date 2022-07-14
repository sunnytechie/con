@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">

    <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header d-flex justify-content-between pb-0">
              <h6>Registered Android Users</h6>
              {{-- <button class="btn btn-default" type="button"> <span><i class="fa fa-plus-circle px-2" aria-hidden="true"></i></span> Add New </button> --}}
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center table-striped justify-content-center mb-0 table-condensed table-hover">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Email</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                      $i = 1;
                    @endphp
                    @foreach ($users as $user)
                        <tr>
                        <td class="text-left px-4">
                            <span class="text-xs font-weight-bold">{{ $i++ }}</span>
                        </td>
                      
                      <td>
                        <p class="text-sm font-weight-bold mb-0">{{ $user->name }}</p>
                      </td>

                      <td>
                        <p class="text-sm font-weight-bold mb-0">{{ $user->email }}</p>
                      </td>
                      
                      <td class="align-middle">
                        <div class="btn-group" role="group" aria-label="Button group">
                     
                            <a class="shadow border-radius-md bg-white btn btn-link text-secondary m-2" href="{{ route('androidusers.show', $user->id) }}">
                              <i class="fa fa-eye text-xs"></i>
                            </a>

                            <a class="shadow border-radius-md bg-white btn btn-link text-secondary m-2" href="#">
                              <i class="fa fa-ban text-xs"></i>
                            </a>
                          
                            {{-- <a href="#myModal" class="shadow border-radius-md bg-white btn btn-link text-secondary m-2" data-toggle="modal">
                              <i class="fa fa-trash text-xs"></i>
                            </a> --}}
                        
                          
                        </div>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              
              <div class="d-flex">
                {!! $users->links() !!}
              </div>
            </div>
          </div>
        </div>
      </div>

    @include('footer.nonguest')
  </div>
@endsection