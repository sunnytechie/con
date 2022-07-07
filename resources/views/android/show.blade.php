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
                <p>Full Name: {{ $membershipFirstName }} {{ $membershipLastName }}</p>
                <p>Email: {{ $membershipEmail }}, {{ $membershipEmail2 }}</p>
                <p>Phone: 1. {{ $membershipPhone }}, 2. {{ $membershipPhone2 }}</p>
                <p>Street: {{ $membershipStreet }}</p>
                <p>City: {{ $membershipCity }}</p>
                <p>State: {{ $membershipState }}</p>
                <p>Country: {{ $membershipCountry }}</p>
                <p>Province: {{ $membershipProvince }}</p>
                <p>Diocese: {{ $membershipDiocese }}</p>
                <p>Birthdate: {{ $membershipDateOfBirth }}</p>
                <p>Local Church Address: {{ $membershipLocalChurchAddress }}</p>
            </div>
          </div>
        </div>
      </div>

    @include('footer.nonguest')
  </div>
@endsection