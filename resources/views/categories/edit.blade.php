@extends('layouts.v23')

@section('content')
<div class="container-fluid py-4">

    <div class="row">
        <div class="col-md-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>You are editing this Category</h6>
              {{-- Success Message --}}

            </div>
            <div class="card-body p-4">
                <form method="post" action="{{ route('categories.update', $categoryID) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')


                  <div class="mb-3">
                    <label>Title for Category</label>
                    	<input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ $categoryTitle ?? old('title') }}" required>

							@error('title')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
					</div>

                    <div class="mb-3">
                        <label>Type of Category</label>
                        <select class="form-control" name="type" id="type">
                            <option value="audio" {{ $categoryType == 'audio' ? 'selected' : '' }}>Audio</option>
                            <option value="video" {{ $categoryType == 'video' ? 'selected' : '' }}>Video</option>
                            <option value="image" {{ $categoryType == 'image' ? 'selected' : '' }}>Image</option>
                        </select>
                    </div>

					<div class="mb-3">
						<input name="thumbnail" class="form-control" type="file" id="thumbnail">

							@error('thumbnail')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
					</div>

                    <div class="btn-group" role="group" aria-label="Button group">
                        <a href="{{ route('categories.index') }}" type="button" class="btn btn-danger" data-dismiss="modal">Back</a>
                        <button type="submit" class="btn btn-success">Publish</button>
                    </div>
                </form>
            </div>
          </div>
        </div>


      </div>


  </div>
@endsection
