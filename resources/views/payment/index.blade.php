@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">

    <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header d-flex justify-content-between pb-0">
              <h6>Books/Materials Payments</h6>
              {{-- Success Message --}}
             @if (session('success'))
             <div style="position: absolute; right: 30px; top: 20px" class="alert alert-info alert-dismissible fade show" role="alert">
                <strong>{{ session('success') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
            @endif
              <button class="btn btn-default" href="#newPurchase" data-toggle="modal" type="button"> <span><i class="fa fa-plus-circle px-2" aria-hidden="true"></i></span> Purchase manually </button>
              @include('modals.add.purchase')
            </div>

            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center justify-content-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Book title</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">User email</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Price</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Transaction ref</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Date created</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                      $i = 1;
                    @endphp
                    @foreach ($purchasedBooks as $purchase)
                    <tr>
                        <td class="text-left px-4">
                            <span class="text-xs font-weight-bold">{{ $i++ }}</span>
                        </td>
                      
                      <td>
                        {{-- Note* This could throw an error if the book is deleted. --}}
                        <p class="text-sm font-weight-bold mb-0">{{ $purchase->book->title }}</p>
                      </td>

                      <td>
                        <p class="text-sm font-weight-bold mb-0">{{ $purchase->email }}</p>
                      </td>

                      <td>
                        <p class="text-sm font-weight-bold mb-0">{{ $purchase->price }}</p>
                      </td>

                      <td>
                        <p class="text-sm font-weight-bold mb-0">{{ $purchase->transaction_ref }}</p>
                      </td>

                      <td>
                        <p class="text-sm font-weight-bold mb-0">{{ $purchase->created_at->diffForHumans() }}</p>
                      </td>
                      
                      <td class="align-middle">
                        <div class="btn-group" role="group" aria-label="Button group">

                          
                          <a class="shadow border-radius-md bg-white btn btn-link text-secondary m-2" href="{{ route('payments.edit', $purchase->id) }}">
                            <i class="fa fa-pencil text-xs"></i>
                          </a>
                          
                            <form method="post" action="{{ route('payments.destroy', $purchase->id) }}">
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
                {!! $purchasedBooks->links() !!}
              </div>
            </div>
          </div>
        </div>
      </div>

  </div>

  {{-- Flutterwave inline payment --}}
<script>
    function makePayment() {
      FlutterwaveCheckout({
        public_key: "FLWPUBK_TEST-SANDBOXDEMOKEY-X",
        tx_ref: "titanic-48981487343MDI0NzMx",
        amount: 54600,
        currency: "NGN",
        payment_options: "card, banktransfer, ussd",
        redirect_url: "https://glaciers.titanic.com/handle-flutterwave-payment",
        meta: {
          consumer_id: 23,
          consumer_mac: "92a3-912ba-1192a",
        },
        customer: {
          email: "rose@unsinkableship.com",
          phone_number: "08102909304",
          name: "Rose DeWitt Bukater",
        },
        customizations: {
          title: "The Titanic Store",
          description: "Payment for an awesome cruise",
          logo: "https://www.logolynx.com/images/logolynx/22/2239ca38f5505fbfce7e55bbc0604386.jpeg",
        },
      });
    }
  </script>
@endsection