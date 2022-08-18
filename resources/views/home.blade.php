@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">

    <div class="row first-app-row">

      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
          <div class="card-body p-3">
            <div class="row">
              <div class="col-8">
                <div class="numbers">
                  <p class="text-sm mb-0 text-capitalize font-weight-bold">Total App Users</p>
                  <h5 class="font-weight-bolder mb-0">
                    {{ $totalUsers }}
                    <span class="text-success text-sm font-weight-bolder">+10%</span>
                  </h5>
                </div>
              </div>
              <div class="col-4 text-end">
                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                  <i class="fa fa-users text-lg opacity-10" aria-hidden="true"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
          <div class="card-body p-3">
            <div class="row">
              <div class="col-8">
                <div class="numbers">
                  <p class="text-sm mb-0 text-capitalize font-weight-bold">Reg. Members</p>
                  <h5 class="font-weight-bolder mb-0">
                    {{ $totalMemberships }}
                    <span class="text-success text-sm font-weight-bolder">+3%</span>
                  </h5>
                </div>
              </div>
              <div class="col-4 text-end">
                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                  <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
          <div class="card-body p-3">
            <div class="row">
              <div class="col-8">
                <div class="numbers">
                  <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Admins</p>
                  <h5 class="font-weight-bolder mb-0">
                    {{ $totalAdmins }}
                    {{-- <span class="text-danger text-sm font-weight-bolder">-2%</span> --}}
                  </h5>
                </div>
              </div>
              <div class="col-4 text-end">
                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                  <i class="fa fa-users text-lg opacity-10" aria-hidden="true"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


      <div class="col-xl-3 col-sm-6">
        <div class="card">
          <div class="card-body p-3">
            <div class="row">
              <div class="col-8">
                <div class="numbers">
                  <p class="text-sm mb-0 text-capitalize font-weight-bold">Books</p>
                  <h5 class="font-weight-bolder mb-0">
                    {{ $totalBooks }}
                  </h5>
                </div>
              </div>
              <div class="col-4 text-end">
                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                  <i class="ni ni-books text-lg opacity-10" aria-hidden="true"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-xl-3 mt-4 col-sm-6">
        <div class="card">
          <div class="card-body p-3">
            <div class="row">
              <div class="col-8">
                <div class="numbers">
                  <p class="text-sm mb-0 text-capitalize font-weight-bold">Videos</p>
                  <h5 class="font-weight-bolder mb-0">
                    {{ $totalVideos }}
                  </h5>
                </div>
              </div>
              <div class="col-4 text-end">
                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="fa fa-video-camera text-lg opacity-10" aria-hidden="true"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-xl-3 mt-4 col-sm-6">
        <div class="card">
          <div class="card-body p-3">
            <div class="row">
              <div class="col-8">
                <div class="numbers">
                  <p class="text-sm mb-0 text-capitalize font-weight-bold">Audio</p>
                  <h5 class="font-weight-bolder mb-0">
                    {{ $totalAudios }}
                  </h5>
                </div>
              </div>
              <div class="col-4 text-end">
                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="fa fa-music text-lg opacity-10" aria-hidden="true"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-xl-3 mt-4 col-sm-6">
        <div class="card">
          <div class="card-body p-3">
            <div class="row">
              <div class="col-8">
                <div class="numbers">
                  <p class="text-sm mb-0 text-capitalize font-weight-bold">Comments</p>
                  <h5 class="font-weight-bolder mb-0">
                    {{ $totalComments }}
                  </h5>
                </div>
              </div>
              <div class="col-4 text-end">
                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="fa fa-comments text-lg opacity-10" aria-hidden="true"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


      <div class="col-xl-3 mt-4 col-sm-6">
        <div class="card">
          <div class="card-body p-3">
            <div class="row">
              <div class="col-8">
                <div class="numbers">
                  <p class="text-sm mb-0 text-capitalize font-weight-bold">Reported</p>
                  <h5 class="font-weight-bolder mb-0">
                    {{ $totalReportedComments }}
                  </h5>
                </div>
              </div>
              <div class="col-4 text-end">
                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="fa fa-comments text-lg opacity-10" aria-hidden="true"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      

    </div>
    

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


    @include('footer.nonguest')
  </div>
@endsection
