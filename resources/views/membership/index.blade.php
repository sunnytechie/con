@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">

    <div class="row">
        <div class="col-12">
            
          <div class="card mb-4">
            
            <div class="card-header d-flex justify-content-between pb-0">
              <h6>Membership listing</h6>
              
              <div class="btn-group" role="group" aria-label="Button group">
                {{-- <div class="input-group">
                    <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                    <input type="text" class="form-control" placeholder="Type here...">
                </div> --}}
                
                <a href="#" class="btn btn-default" type="button"> <span><i class="fa fa-file-excel-o px-2" aria-hidden="true"></i></span> Export </a>
              </div>
              
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center justify-content-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Email</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Phone</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Email2</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">State</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Diocese</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Province</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Street</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">City</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Date of Birth</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Local Church Address</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($memberships as $membership)
                      <tr>
                        <td class="text-left px-4"> <span class="text-xs font-weight-bold">{{ $i++ }}</span> </td>
                      <td> <p class="text-sm font-weight-bold mb-0">{{ $membership->first_name }} {{ $membership->last_name }}</p> </td>
                      <td> <p class="text-sm font-weight-bold mb-0">{{ $membership->email }}</p> </td>
                      <td> <p class="text-sm font-weight-bold mb-0">{{ $membership->phone }}</p> </td>
                      <td> <p class="text-sm font-weight-bold mb-0">{{ $membership->email2 }}</p> </td>
                      <td> <p class="text-sm font-weight-bold mb-0">{{ $membership->state }}</p> </td>
                      <td> <p class="text-sm font-weight-bold mb-0">{{ $membership->diocease }}</p> </td>
                      <td> <p class="text-sm font-weight-bold mb-0">{{ $membership->province }}</p> </td>
                      <td> <p class="text-sm font-weight-bold mb-0">{{ $membership->street }}</p> </td>
                      <td> <p class="text-sm font-weight-bold mb-0">{{ $membership->city }}</p> </td>
                      <td> <p class="text-sm font-weight-bold mb-0">{{ $membership->date_of_birth }}</p> </td>
                      <td> <p class="text-sm font-weight-bold mb-0">{{ $membership->local_church_address }}</p> </td> 
                      <td> 
                        <form method="post" action="{{ route('memberships.destroy', $membership->id) }}">
                          @method('delete')
                          @csrf
                          <button type="submit" onclick="return confirm('Are you sure you want to delete this record?')" class="shadow border-radius-md bg-white btn btn-link text-secondary m-2"><i class="fa fa-trash text-xs"></i></button>
                      </form>
                      </td>                
                    </tr>  
                    @endforeach                    
                   
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

    @include('footer.nonguest')
  </div>
@endsection