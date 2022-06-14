@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">

    <div class="row">
        <div class="col-12">

            {{-- Comments --}}

            <div class="card h-100">
                <div class="card-header pb-0">
                  <h6>Repoted Comments</h6>
                  <p class="text-sm">
                    <i class="fa fa-arrow-up text-success" aria-hidden="true"></i>
                    <span class="font-weight-bold">100 reported</span> this month
                  </p>
                </div>
                <div class="card-body p-3">
                  <div class="timeline timeline-one-side">
                    
                    <div class="timeline-block mb-3">
                      <span class="timeline-step">
                        <i class="ni ni-bell-55 text-success text-gradient"></i>
                      </span>
                      <div class="timeline-content">
                        <h6 class="text-dark text-sm font-weight-bold mb-0">We Need New lyrics on every video please</h6>
                        <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">22 DEC 7:20 PM</p>
                      </div>
                    </div>

                    <div class="timeline-block mb-3">
                      <span class="timeline-step">
                        <i class="ni ni-html5 text-danger text-gradient"></i>
                      </span>
                      <div class="timeline-content">
                        <h6 class="text-dark text-sm font-weight-bold mb-0">We often have problem with sounds</h6>
                        <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">21 DEC 11 PM</p>
                      </div>
                    </div>

                  </div>
                </div>
              </div>

        </div>
      </div>

    @include('footer.nonguest')
  </div>
@endsection