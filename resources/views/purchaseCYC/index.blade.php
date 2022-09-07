@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">

    <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header d-flex justify-content-between pb-0">
                <h5>Purchased CYC list</h5>
              <div>
                <button class="btn btn-default" href="#newPurchaseCyc" data-toggle="modal" type="button"> <span><i class="fa fa-plus-circle px-2" aria-hidden="true"></i></span> Purchase manually </button>
              </div>
            
            </div>
            @include('modals.add.purchasedcyc') 
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
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Title</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Year</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Transaction Ref</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Purchased time</th>
                      <th></th>
                    </tr>
                  </thead>
                   <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($purchasedCycs as $item)
                    <tr>
                      <td class="text-left px-4">
                          <span class="text-xs font-weight-bold">{{ $i++ }}</span>
                      </td>
                   
                    <td> <p class="text-sm font-weight-bold mb-0">  </p> {{ $item->email }} </td>
                    <td> <p class="text-sm font-weight-bold mb-0">  </p> {{ $item->cyc_title }} </td>
                    <td> <p class="text-sm font-weight-bold mb-0">  </p> {{ $item->cyc_year }} </td>
                    <td> <p class="text-sm font-weight-bold mb-0">  </p> {{ $item->transaction_ref }} </td>

                    <td> <p class="text-sm font-weight-bold mb-0">  </p> {{ $item->created_at->diffForHumans() }} </td>
                    

                    <td class="align-middle">
                      <div class="btn-group" role="group" aria-label="Button group">

                          <form method="post" action="{{ route('purchased.cyc.destory', $item->id) }}">
                            @method('delete')
                            @csrf
                            <button type="submit" onclick="return confirm('Are you sure you want to delete this record?')" class="shadow border-radius-md bg-white btn btn-link text-secondary m-2"><i class="fa fa-trash text-xs"></i></button>
                        </form>
                          
                        
                      </div>
                    </td>
                  </tr>
                    @endforeach
                    
                   
                  </tbody>
                </table>
              </div>
              <div class="d-flex">
                 {!! $purchasedCycs->links() !!}
              </div>
            </div>
          </div>
        </div>
      </div>

    @include('footer.nonguest')
  </div>
@endsection