@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">

    <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card mb-4">
            
            <div class="card-header d-flex justify-content-between pb-0">
              <div>
                <h4 class="mb-0">Push this Notification</h4>
                <h6>
                    Send Notifications to users on Android and iOS devices.
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
                <form method="POST" action="{{ route('notifications.push') }}" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-title">Title</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="basic-default-title" value="{{ old('title') }}" id="title" name="title" placeholder="Type..." />
                        
                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                      </div>
    
                      <div class="mb-3">
                        <label class="form-label" for="basic-default-title">Thumbnail</label>
                        <input type="file" class="form-control @error('img') is-invalid @enderror" id="basic-default-img" value="{{ old('img') }}" id="img" name="img" />
                        
                        @error('img')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                      </div>
        
                      <div class="mb-3">
                        <label class="form-label" for="basic-default-content">Content</label>
                        <textarea
                          class="form-control @error('body') is-invalid @enderror"
                          placeholder="Type content..."
                          id="body"
                          name="body"
                        >{{ old('body') }}</textarea>
        
                        @error('body')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                      </div>

                
                <button type="submit" class="btn btn-primary">Push Notification</button>

              </form>
            </div>
          </div>
        </div>
      </div>

    @include('footer.nonguest')
  </div>
@endsection