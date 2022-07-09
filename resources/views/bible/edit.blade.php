@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">

    <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header d-flex justify-content-between pb-0">
              <h6>Edit this Bible</h6>
              <a href="#newBible" class="btn btn-default" data-toggle="modal" type="button"> <span><i class="fa fa-plus-circle px-2" aria-hidden="true"></i></span> Add New version </a>
              @include('modals.add.bible')
            </div>
             {{-- Success Message --}}
             @if (session('success'))
                <div style="position: absolute; right: 30px; top: 20px" class="alert alert-info alert-dismissible fade show" role="alert">
                <strong>{{ session('success') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
            @endif
            <div class="card-body p-4">
              <form method="POST" action="{{ route('bibles.update', $bibleId) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label>Title</label>
                    	<input type="text" id="title" name="name" class="form-control @error('title') is-invalid @enderror" value="{{ $bibleName ?? old('title') }}" placeholder="Title of version" required>

							@error('title')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
					</div>
                    
                    <div class="mb-3">
                        <label>Version</label>
                            <input type="text" id="version" name="version" class="form-control @error('version') is-invalid @enderror" value="{{ $bibleVersion ?? old('version') }}" placeholder="1st edition" required>
    
                                @error('version')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>

                    
                    <div class="mb-3">
                        <label>Shortcode</label>
                            <input type="text" id="shortcode" name="shortcode" class="form-control @error('shortcode') is-invalid @enderror" value="{{ $bibleShortcode ?? old('shortcode') }}" placeholder="KJV" required>
    
                                @error('shortcode')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>

                    
                    <div class="mb-3">
                        <label>Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="myeditorinstance" cols="30" rows="10">{{ $bibleDescription ?? old('description') }}</textarea>
    
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>


					<div class="mb-3">
                        <label>File</label>
						<input name="source" class="form-control" type="file" id="source">

							@error('source')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
					</div>

                    <button type="submit" class="btn btn-success">Save</button>
                </form>
            </div>
          </div>
        </div>
      </div>

    @include('footer.nonguest')
  </div>
@endsection