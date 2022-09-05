@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">

    <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header d-flex justify-content-between pb-0">
              <h6>Prayer Requests Recieved</h6>
                <a href="{{ route('prayers.export') }}" class="btn btn-success" type="button">Download report</a>
            </div>

            @if (session('success'))
                <div style="position: absolute; right: 30px; top: 20px" class="alert alert-info alert-dismissible fade show" role="alert">
                <strong>{{ session('success') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
            @endif
            
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center table-striped justify-content-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Phone</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Email</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Title</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Prayer Request</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Created At</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($prayers as $prayer)
                    <tr>
                        <td class="text-left px-4">
                            <span class="text-xs font-weight-bold">{{ $i++ }}</span>
                        </td>
                    
                        <td> <p class="text-sm font-weight-bold mb-0">  </p> {{ $prayer->fullname }} </td>
                        <td> <p class="text-sm font-weight-bold mb-0">  </p> {{ $prayer->phone }} </td>
                        <td> <p class="text-sm font-weight-bold mb-0">  </p> {{ $prayer->email }} </td>
                        
                        <td> <p class="text-sm font-weight-bold mb-0">  </p> {{ $prayer->title }} </td>
                        <td> <p class="text-sm font-weight-bold mb-0">  </p> {{ $prayer->prayer_request }} </td>
                        <td> <p class="text-sm font-weight-bold mb-0">  </p> {{ $prayer->created_at->diffForHumans() }} </td>

                        <td><a href="{{ route('prayers.show', $prayer->id) }}" class="btn btn-success btn-sm mt-2" type="button">Respond to request</a></td>
                    </tr>
                    @endforeach
                    
                   
                  </tbody>
                </table>
              </div>
              <div class="d-flex">
                {!! $prayers->links() !!}
              </div>
            </div>
          </div>
        </div>
      </div>

    @include('footer.nonguest')
  </div>
@endsection