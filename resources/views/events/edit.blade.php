@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">

    <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            
            <div class="card-header d-flex justify-content-between pb-0">
              <h6>Edit Event</h6>
              @if (session('success'))
                <div style="position: absolute; right: 30px; top: 20px" class="alert alert-info alert-dismissible fade show" role="alert">
                <strong>{{ session('success') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
            @endif
            </div>
            <div class="card-body p-4">
              <form method="POST" action="{{ route('events.update', $eventId) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="form-group">
                  <label for="title">Title</label>
                  <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" value="{{ $eventTitle ?? old('title') }}" name="title" placeholder="Title">

                  @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="event_time">Event time</label>
                  <input type="time" class="form-control @error('event_time') is-invalid @enderror" value="{{ $eventTime ?? old('event_time') }}" id="event_time" name="event_time" placeholder="Event time">

                  @error('event_time')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>

                
                <div class="form-group">
                  <label for="event_date">Event date</label>
                  <input type="date" class="form-control @error('event_date') is-invalid @enderror" value="{{ $eventDate ?? old('event_date') }}" id="event_date" name="event_date" placeholder="date">

                  @error('event_date')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>

           
                <div class="form-group">
                  <label for="location">Location</label>
                  <input type="text" class="form-control @error('location') is-invalid @enderror" value="{{ $eventLocation ?? old('location') }}" id="location" name="location" placeholder="Location">

                  @error('location')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                
                               
                <div class="form-group">
                  <label for="thumbnail">Thumbnail</label>
                  <input type="file" class="form-control @error('thumbnail') is-invalid @enderror" id="thumbnail" name="thumbnail">

                  @error('thumbnail')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                
                <div class="form-group">
                  <label for="details">Body</label>
                  <textarea class="form-control @error('details') is-invalid @enderror" id="myeditorinstance" name="details" rows="3">{{ $eventDetails ?? old('details') }}</textarea>

                  @error('detail')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                
                <button type="submit" class="btn btn-primary">Update</button>

              </form>
            </div>
          </div>
        </div>
      </div>

    @include('footer.nonguest')
  </div>
@endsection