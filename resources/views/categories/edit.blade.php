@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">

    <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>You are editing this Category</h6>
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
                <form method="post" action="{{ route('categories.update', $categoryID) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <label>Title for Category</label>
                  <div class="mb-3">
                    	<input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ $categoryTitle ?? old('title') }}" required>

							@error('title')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
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
                        <a href="{{ route('categories.index') }}" type="button" class="btn btn-danger" data-dismiss="modal">Cancel</a>
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