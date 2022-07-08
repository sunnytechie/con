@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">

    <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            
            <div class="card-header d-flex justify-content-between pb-0">
              <div>
                <h4 class="mb-0">Edit Stream key</h4>
                <h6>
                  Manually activate or deactivate a livestream. Users will be able subscribe and watch an active livestream.
  You have to set a livestream status to inactive when the livestream is finished or you dont want users to watch the livestream.
                </h6>
              </div>
              
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
              <form method="POST" action="{{ route('stream.update', $id) }}">
                @csrf
                @method('PUT')
                
                
                <div class="form-group">
                  <label for="title">Title</label>
                  <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" value="{{ $title ?? old('title') }}" name="title" placeholder="Title">
  
                  @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>

                  
                    <div class="form-group">
                        <label for="stream_url">Stream URL</label>
                        <input type="text" class="form-control @error('stream_url') is-invalid @enderror" id="stream_url" value="{{ $stream_url ?? old('stream_url') }}" name="stream_url" placeholder="Stream URL">
    
                        @error('stream_url')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    
                    <div class="form-group">
                        <label for="stream_type">Stream Type</label>
                        <select class="form-control @error('stream_type') is-invalid @enderror" id="stream_type" name="stream_type">
                            <option value="RTMP" @if($stream_type == "RTMP") selected @endif>RTMP</option>
                            <option value="HLS" @if($stream_type == "HLS") selected @endif>HLS</option>
                            <option value="MP4" @if($stream_type == "MP4") selected @endif>MP4</option>
                            <option value="youtube" @if($stream_type == "youtube") selected @endif>Youtube</option>
                        </select>
    
                        @error('stream_type')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                 
                    <div class="form-group">
                        <label for="stream_status">Stream Status</label>
                        <select class="form-control @error('stream_status') is-invalid @enderror" id="stream_status" name="stream_status">
                            <option value="1" @if($stream_status == 1) selected @endif>Live</option>
                            <option value="0" @if($stream_status == 0) selected @endif>Offline</option>
                        </select>
    
                        @error('stream_status')
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