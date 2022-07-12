@extends('layouts.app')

@section('content')

<section>
    <div class="page-header min-vh-75">
      <div class="container">
        <div class="row">
          <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
            <div class="card card-plain mt-8">
              <div style="color: purple" class="card-header pb-0 text-left bg-transparent">
                <div style="font-weight: 700; font-size: 25px"><span><img height="70" width="70" src="{{ asset('assets/img/Untitled_design__20_-removebg-preview.png') }}" alt=""></span>Welcome Back</div>
                @if(session()->has('error'))
                <p class="mb-0" style="color: red">
                        {{ session()->get('error') }}
                </p>
                @else
                  <p class="mb-0 p-2">Sign in with your email and password</p>
                @endif
                
              </div>
              <div class="card-body pt-1">
                    <form role="form" method="POST" action="{{ route('login') }}">
                        @csrf
                  <label>Email</label>
                  <div class="mb-3">
                    <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="Email" aria-label="Email" aria-describedby="email-addon">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>

                  <label>Password</label>
                  <div class="mb-3">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" aria-label="Password" aria-describedby="password-addon">
                    
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="rememberMe" checked="" name="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="rememberMe">Remember me</label>
                  </div>
                  <div class="text-center">
                    <button style="background: purple; border-radius: 0;" type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Sign in</button>
                  </div>
                </form>
              </div>
              <div class="card-footer text-center pt-0 px-lg-2 px-1">
                <p class="mb-4 text-sm mx-auto">
                  Don't have an account?
                  <a href="#" class="text-info text-gradient font-weight-bold">Contact the admin</a>
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
              <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6" style="background-image:url('{{ asset("assets/img/anglican.jpg") }}')"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

    @include('footer.guest')
@endsection
