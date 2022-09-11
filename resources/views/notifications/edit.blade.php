@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">

    <div class="row">
        <div class="col-md-10 offset-md-1">
          <div class="card mb-4">
            <div class="card-header d-flex justify-content-between pb-0">
              <h6>Edit this Notification</h6>
            </div>
            @if (session('success'))
                <div style="position: absolute; right: 30px; top: 20px" class="alert alert-info alert-dismissible fade show" role="alert">
                <strong>{{ session('success') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
            @endif
            <div class="card-body px-3 pt-0 pb-2">
              
                <form method="POST" action="{{ route('notifications.update', $notificationId) }}">
                    @csrf
                   @method('put')

                    <div class="form-group">
                        <label for="title">Tile</label>
                        <input type="text" placeholder="Give the push notification a title" class="form-control @error('title') is-invalid @enderror" id="title" value="{{ $notificationTitle ?? old('title') }}" name="title">
      
                        @error('title')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="details">Body</label>
                        <textarea class="form-control @error('details') is-invalid @enderror" id="myeditorinstance" name="details" rows="3">{{ $notificationDetails }}</textarea>
      
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

    @include('footer.nonguest')
  </div>
@endsection