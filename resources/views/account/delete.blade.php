<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete your account</title>
    {{-- favicon --}}
    <link rel="icon" href="{{ asset('assets/img/Untitled_design__20_-removebg-preview.png') }}">
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> --}}
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        function confirmSubmission() {
            // Display a confirmation dialog using SweetAlert
            swal({
                title: "Are you sure?",
                text: "Once submitted, you won't be able to undo this action!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willSubmit) => {
                // If the user clicks "OK," submit the form
                if (willSubmit) {
                    document.getElementById("myForm").submit();
                } else {
                    // Optional: Handle the case when the user clicks "Cancel"
                    swal("Submission canceled!", {
                        icon: "info",
                    });
                }
            });
        }
    </script>
</head>
<body>
    <div class="container">
        @if(session('error'))
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="alert alert-success mt-5" role="alert">
                        {{ session('error') }}
                    </div>
                </div>
            </div>
            @else
                <div class="mb-5"></div>
            @endif

        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">{{ __('Account Delete') }}</div>

                    <div class="card-body">
                        <form id="myForm" method="POST" action="{{ route('trash.my.account') }}">
                            @csrf
                            @method('DELETE')

                            <div class="form-group row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="E Mail" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="button" class="btn btn-primary" onclick="confirmSubmission()">
                                        {{ __('Confirm Account delete') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center" style="margin-top: 200px">
            <div class="col-md-12 text-center">
                <a href="https://www.conaio.com">
                    Copyrights © {{ date('Y') }}  CONAIO, made with ❤️ by CoN All rights Reserved.
                </a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

