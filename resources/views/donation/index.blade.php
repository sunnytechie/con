@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">

    <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header d-flex justify-content-between pb-0">
              <h6>Donations</h6>
              @if (session('success'))
                <div style="position: absolute; right: 30px; top: 20px" class="alert alert-info alert-dismissible fade show" role="alert">
                <strong>{{ session('success') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
            @endif
              <a href="#addDonation" data-toggle="modal" class="btn btn-default" type="button"> <span><i class="fa fa-plus-circle px-2" aria-hidden="true"></i></span> Manually donate </a>
            </div>
            @include('modals.add.donation')
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center justify-content-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Reason</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Province</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Diocese</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Currency</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Amount</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Method</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Created</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                      $i = 1;
                    @endphp
                    @foreach ($donations as $donation)
                    <tr>
                        <td class="text-left px-4">
                            <span class="text-xs font-weight-bold">{{ $i++ }}</span>
                        </td>
                        <td class="text-left px-4">
                            <span class="text-xs font-weight-bold">{{ $donation->name }}</span>
                        </td>
                        <td class="text-left px-4">
                            <span class="text-xs font-weight-bold">
                                <a href="mailto:  {{ $donation->email }}">  {{ $donation->email }}</a>
                            </span>
                        </td>

                      <td>
                        <p class="text-sm font-weight-bold mb-0">{{ $donation->reason }}</p>
                      </td>

                      <td class="text-left px-4">
                        <span class="text-xs font-weight-bold">{{ $donation->province }}</span>
                    </td>

                    <td class="text-left px-4">
                        <span class="text-xs font-weight-bold">{{ $donation->diocese }}</span>
                    </td>

                    <td class="text-left px-4">
                        <span class="text-xs font-weight-bold">{{ $donation->currency }}</span>
                    </td>

                    <td class="text-left px-4">
                        <span class="text-xs font-weight-bold">{{ $donation->amount }}</span>
                    </td>

                    <td class="text-left px-4">
                        <span class="text-xs font-weight-bold">{{ $donation->method }}</span>
                    </td>

                    <td class="text-left px-4">
                        <span class="text-xs font-weight-bold">{{ $donation->created_at->diffForHumans() }}</span>
                    </td>
                      
                      <td class="align-middle">
                        <div class="btn-group" role="group" aria-label="Button group">
                            <a href="{{ route('donations.destroy', $donation->id) }}" class="shadow border-radius-md bg-white btn btn-link text-secondary m-2" data-toggle="modal">
                              <i class="fa fa-trash text-xs"></i>
                            </a>                  
                        </div>
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