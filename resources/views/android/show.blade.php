@extends('layouts.v23')

@section('content')
<div class="container-fluid py-4">

    <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header d-flex justify-content-between pb-0">
              <h6>User's Information</h6>
              <button class="btn btn-danger" onclick="return confirm('Are you sure you want to block this user?')"><i class="fe fe-info"></i> Block User</button>
            </div>
            <div class="card-body p-4">
              {{-- User details --}}
                <p>Full Name: {{ $user->name }}</p>
                <p>Email: {{ $user->email }}</p>
                <p>Phone: {{ $user->phone }}</p>
                <p>Street: {{ $user->street }}</p>
                <p>City: {{ $user->city }}</p>
                <p>State: {{ $user->state }}</p>
                <p>Country: {{ $user->country }}</p>
                <p>Province: {{ $user->province }}</p>
                <p>Diocese: {{ $user->date_of_birth }}</p>
                <p>Birthdate: {{ $user->wedding_date }}</p>
                <p>Local Church Address: {{ $user->local_church_address }}</p>
            </div>
          </div>
        </div>
      </div>

  </div>
@endsection
