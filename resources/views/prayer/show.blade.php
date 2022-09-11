@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">

    <div class="row">
        <div class="col-md-5 offset-md-1">
          {{-- Success Message --}}
          @if (session('success'))
          <div style="position: top: 20px" class="alert alert-info alert-dismissible fade show" role="alert">
          <strong>{{ session('success') }}</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
          </div>
          @endif
          
          <div class="card">
            
            <div class="card-body">
                <h5 class="card-title">User Details</h5>
                <span class="small-text">{{ $fullName }}</span> <br>
                <span class="small-text">{{ $prayerEmail }}</span>

                <h5 class="card-title mt-2">Title</h5>
                <p class="card-text">{{ $prayerTitle }}</p>

                <h5 class="card-title">Prayer Request</h5>
                <p class="card-text">{{ $prayerRequest }}</p>

                <div class="mt-4">
                  <a href="{{ route('prayers.index') }}" class="btn btn-sm btn-info">Back to list</a>
                </div>
            </div>

           
            
          </div>
        </div>

        <div class="col-md-6">
          <div class="card">
            <div class="card-body">
                <h4>Respond to prayer request</h4>

                <form method="POST" action="{{ route('prayers.email') }}">
                    @csrf

                    <input type="hidden" name="email" value="{{ $prayerEmail }}">
                    <input type="hidden" name="subject" value="{{ $prayerTitle }}">
                    <input type="hidden" name="username" value="{{ $fullName }}">

                    <div class="form-group">
                        <label for="details">Body</label>
                        <textarea class="form-control @error('details') is-invalid @enderror" id="myeditorinstance" name="message" rows="3"></textarea>
      
                        @error('details')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Send</button>
                </form>
            </div>
          </div>
        </div>
      </div>

    @include('footer.nonguest')
  </div>
@endsection