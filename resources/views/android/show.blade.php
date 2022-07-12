@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">

    <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header d-flex justify-content-between pb-0">
              <h6>Membership Profile</h6>
            </div>
            <div class="card-body p-4">
              {{-- User details --}}
                <p>Full Name: {{ $first_name }} {{ $last_name }}</p>
                <p>Email: {{ $users->email }}, {{ $email2 }}</p>
                <p>Phone: {{ $phone }} {{ $phone2 }}</p>
                <p>Street: {{ $street }}</p>
                <p>City: {{ $city }}</p>
                <p>State: {{ $state }}</p>
                <p>Country: {{ $country }}</p>
                <p>Province: {{ $province }}</p>
                <p>Diocese: {{ $date_of_birth }}</p>
                <p>Birthdate: {{ $wedding_date }}</p>
                <p>Local Church Address: {{ $local_church_address }}</p>
            </div>
          </div>
        </div>
      </div>

    @include('footer.nonguest')
  </div>
@endsection