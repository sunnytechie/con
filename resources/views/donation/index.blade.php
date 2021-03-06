<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} Donations</title>

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    {{-- favicon --}}
    <link rel="icon" href="{{ asset('assets/img/Untitled_design__20_-removebg-preview.png') }}">

    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('assets/css/soft-ui-dashboard.css?v=1.0.6') }}" rel="stylesheet" />
    {{-- Custom css --}}
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">

    <style>
        .table> :not(caption)>*>* {
            padding: 0.1rem 0.5rem !important;
        }

        .table .m-2 {
            margin: 0.2rem 0.5rem !important;
        }

        .search-form {
            width: 300px;
        }
    </style>

</head>

<body class="g-sidenav-show  bg-gray-100">
    <div id="app">
        {{-- Navbare --}}
        @guest
            @include('navigator.guest')
        @else
            {{-- Sidebar --}}
            @include('navigator.aside')
        @endguest

        {{-- Main application --}}
        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
            
            @guest
            @else
                @include('navigator.notguest')
            @endguest
<div class="container-fluid py-4">

    <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header d-flex justify-content-between pb-0">
              <h6>Donations</h6>
              <div class="search-form">
                <div class="input-group">
                  <input type="text" id="search" name="search" class="form-control" placeholder="Search...">
              </div>
              </div>
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
                <table class="table align-items-center table-striped justify-content-center mb-0">
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
                  <tbody id="searchResults"></tbody>
                  <tbody id="allResults">
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
                            <form method="post" action="{{ route('donations.destroy', $donation->id) }}">
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
                {!! $donations->links() !!}
              </div>
            </div>
          </div>
        </div>
      </div>

    @include('footer.nonguest')
  </div>
</main>
</div>

<!--   Core JS Files   -->
<script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/chartjs.min.js') }}"></script>

<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{ asset('assets/js/soft-ui-dashboard.min.js?v=1.0.6') }}"></script>
{{-- Bootstrap links --}}
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
{{-- Preview file upload --}}

{{-- Flutterwave inline payment --}}
<script src="https://checkout.flutterwave.com/v3.js"></script>
{{-- Google CDN --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    setTimeout(function() {
        $('.alert').fadeOut('fast');
    }, 5000);
</script>

<script src="{{ asset('assets/js/canvasjs.min.js') }}"></script>

{{-- on window load, load two function --}}
<script>
    window.onload = function() {
        columnChart();
        pieChart();
    };
</script>

{{-- Tinymce editor --}}
<script src="{{ asset('js/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
<script>
tinymce.init({
selector: 'textarea#myeditorinstance', // Replace this CSS selector to match the placeholder element for TinyMCE
plugins: 'code table lists',
toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table'
});
</script>

{{-- ajax search --}}
<script>
  $('#search').on('keyup', function(){
    var search = $(this).val();
      if(search) {
        $('#allResults').hide();
      }
    $.ajax({
      url: "{{ route('donations.search') }}",
      method: 'get',
      data: {'search': search},
      success: function(data){
        $('#searchResults').html(data);
      }
    });
  });
</script>

</body>
</html>
