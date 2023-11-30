@extends('layouts.v23')

@section('content')
<div class="container-fluid py-4">

    <div class="row">
        <div class="col-md-10 offset-md-1">
          <div class="card mb-4">
            <div class="card-header d-flex justify-content-between pb-0">
              <h6>Compose Notification</h6>
            </div>

            <div class="card-body px-3 pt-0 pb-2">

                <form method="POST" action="{{ route('notifications.store') }}">
                    @csrf

                    <div class="form-group">
                        <label for="title" class="mt-2">Title</label>
                        <input type="text" placeholder="Your notification title" class="form-control @error('title') is-invalid @enderror" id="title" name="title">

                        @error('title')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="details">Body</label>
                        <textarea class="form-control @error('details') is-invalid @enderror" id="details" name="details" placeholder="Write details here..." rows="3"></textarea>

                        @error('details')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                    </div>
                    <div class="btn-group" role="group" aria-label="Button group">
                      <a href="{{ route('notifications.index') }}" type="submit" class="btn btn-primary">Return Back</a>
                      <button type="submit" class="btn btn-success">Publish</button>
                    </div>

                </form>

            </div>
          </div>
        </div>
      </div>

   
  </div>
@endsection
