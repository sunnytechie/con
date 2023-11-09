@extends('layouts.v23')
@section('content')
@include('v23.dashboard.dashboard')

@include('snippets.booktable')

<div class="row my-4">
    {{-- Column Chart --}}
    <div class="col-lg-6 mb-lg-0 mb-4">
      <div class="card h-100 p-3">
        <div id="columnChart" style="height: 370px; max-width: 100%;"></div>
      </div>
    </div>
    @include('charts.column')


    {{-- Column Chart --}}
    <div class="col-lg-6">
      <div class="card h-100 p-3">
        <div id="pieChart" style="height: 370px; max-width: 100%;"></div>
      </div>
    </div>
      @include('charts.pie')
  </div>



  <div class="row mt-4">
    <div class="col-lg-12 mb-lg-0 mb-4">
      <div class="card h-100 p-3">
        <div id="lineChart" style="height: 470px; max-width: 100%;"></div>
      </div>
    </div>
    @include('charts.line')
  </div>
@endsection
