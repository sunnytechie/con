@extends('layouts.v23')

@section('content')
<div class="container-fluid py-4">

    <div class="row">
        <div class="col-md-8">
          <div class="card mb-4">

            <div class="card-body p-4">
                <form method="post" action="{{ route('video.update', $videoID) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')


                  <div class="mb-3 mt-2">
                    <label>Title</label>
                    	<input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ $videoTitle ?? old('title') }}" placeholder="Provide a name" required>

							@error('title')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
					</div>


                    <div class="mb-3">
                        <label>Category</label>
                        <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror" value="{{ $videoCategory ?? old('category_id') }}" required>
                            <option value="" disabled>Select Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ $videoCategory == $category->id ? 'selected' : '' }}>{{ $category->title }}</option>
                            @endforeach
                        </select>

                        @error('category_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Video Cover</label>
                        <input type="url" id="thumbnail" name="thumbnail" class="form-control @error('thumbnail') is-invalid @enderror" value="{{ $videoThumbnail ?? old('thumbnail') }}" placeholder="Thumbnail url">

                            @error('thumbnail')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    {{-- <div class="mb-3">
                        <label for="video">Video (Optional if you're providing a URL)</label>
                        <input name="video" class="form-control @error('video') is-invalid @enderror" type="file" id="video">

                            @error('video')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div> --}}

                    <div class="mb-3">
                        <label>Youtube video URL</label>
                        <input name="url" class="form-control @error('url') is-invalid @enderror" type="text" value="{{ $videoUrl ?? old('category_id') }}" id="url" placeholder="Provide a URL">

                            @error('url')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>


                    <div class="mb-3">
                        <label>Description</label>
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" placeholder="Provide a description" required>{{ $videoDescription ?? old('description') }}</textarea>

                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>


                    <div class="mb-3">
                        <label>Duration (Format 00:00)</label>
                        <input name="duration" class="form-control @error('duration') is-invalid @enderror" type="text" value="{{ $videoDuration ?? old('duration') }}" id="duration" placeholder="Provide a duration" required>

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
                                $downloadable = $videoDownloadable ?? old('downloadable');
                                $yes = 1;
                                $no = 0;
                            @endphp
                            <option value="">Select a status</option>
                            <option value="1" {{ $yes == $videoDownloadable ? 'selected' : '' }}>Yes</option>
                            <option  value="0" {{ $no == $videoDownloadable ? 'selected' : '' }}>No</option>
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
                            $notification = $videoNotification ?? old('notification');
                            $yes = 1;
                            $no = 0;
                            @endphp
                            <option value="">Select a status</option>
                            <option value="1" {{ $yes == $videoNotification ? 'selected' : '' }}>Yes</option>
                            <option  value="0" {{ $no == $videoNotification ? 'selected' : '' }}>No</option>
                        </select>

                        @error('notification')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="btn-group" role="group" aria-label="Button group">
                        <a href="{{ route('media.video') }}" type="button" class="btn btn-danger" data-dismiss="modal">Back</a>
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
                  <h6> Total Video</h6>
              </div>
              <div class="card-body p-4">
                  <p>{{ $totalVideos }}</p>
              </div>
          </div>
      </div>
      </div>

    @include('footer.nonguest')
  </div>
@endsection
