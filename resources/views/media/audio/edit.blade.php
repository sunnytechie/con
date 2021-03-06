@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">

    <div class="row">
        <div class="col-md-8">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>You are editing this Audio</h6>
              {{-- Success Message --}}
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
                <form method="post" action="{{ route('audio.update', $audioID) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <label>Title</label>
                  <div class="mb-3">
                    	<input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ $audioTitle ?? old('title') }}" placeholder="Provide a name" required>

							@error('title')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
					</div>

                    
                    <div class="mb-3">
                        <label>Category</label>
                        <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror" value="{{ $audioCategory ?? old('category_id') }}" required>
                            <option value="" disabled>Select Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ $audioCategory == $category->id ? 'selected' : '' }}>{{ $category->title }}</option>
                            @endforeach
                        </select>

                        @error('category_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Audio Cover</label>
                        <input type="text" id="thumbnail" name="thumbnail" class="form-control @error('thumbnail') is-invalid @enderror" value="{{ $audioThumbnail ?? old('thumbnail') }}" placeholder="Thumbnail url" required>
                            @error('thumbnail')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    <div class="mb-3">
                        <label for="audio">audio (Optional if you're providing a URL)</label>
                        <input name="audio" class="form-control @error('audio') is-invalid @enderror" type="file" id="audio">

                            @error('audio')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    <div class="mb-3">
                        <label>audio URL (Optional if you uploaded from your computer)</label>
                        <input name="url" class="form-control @error('url') is-invalid @enderror" type="text" value="{{ $audioUrl ?? old('category_id') }}" id="url" placeholder="Provide a URL">

                            @error('url')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    
                    <div class="mb-3">
                        <label>Description</label>
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" placeholder="Provide a description" required>{{ $audioDescription ?? old('description') }}</textarea>

                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    
                    <div class="mb-3">
                        <label>Duration (Format 00:00)</label>
                        <input name="duration" class="form-control @error('duration') is-invalid @enderror" type="text" value="{{ $audioDuration ?? old('duration') }}" id="duration" placeholder="Provide a duration" required>

                            @error('duration')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    
                    <div class="mb-3">
                        <label>Downloadable</label>
                        <select name="downloadable" class="form-control @error('downloadable') is-invalid @enderror" required>
                            @php
                                $downloadable = $audioDownloadable ?? old('downloadable');
                                $yes = 1;
                                $no = 0;
                            @endphp
                            <option value="">Select a status</option>
                            <option value="1" {{ $yes == $audioDownloadable ? 'selected' : '' }}>Yes</option>
                            <option  value="0" {{ $no == $audioDownloadable ? 'selected' : '' }}>No</option>
                        </select>

                        @error('downloadable')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Send Notification</label>
                        <select name="notification" class="form-control @error('notification') is-invalid @enderror" required>
                            @php
                            $notification = $audioNotification ?? old('notification');
                            $yes = 1;
                            $no = 0;
                            @endphp
                            <option value="">Select a status</option>
                            <option value="1" {{ $yes == $audioNotification ? 'selected' : '' }}>Yes</option>
                            <option  value="0" {{ $no == $audioNotification ? 'selected' : '' }}>No</option>
                        </select>

                        @error('notification')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="btn-group" role="group" aria-label="Button group">
                        <a href="{{ route('media.audio') }}" type="button" class="btn btn-danger" data-dismiss="modal">Back</a>
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </form>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="card mb-4">
              <div class="card-header pb-0">
                  <h6>Total Category</h6>
              </div>
              <div class="card-body p-4">
                  <p>{{ $categories->count() }}</p>
              </div>
          </div>

          <div class="card mb-4">
              <div class="card-header pb-0">
                  <h6> Total audio</h6>
              </div>
              <div class="card-body p-4">
                  <p>{{ $totalAudios }}</p>
              </div>
          </div>
      </div>
      </div>

    @include('footer.nonguest')
  </div>
@endsection