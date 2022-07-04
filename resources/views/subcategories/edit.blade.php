@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">

    <div class="row">
        <div class="col-8">
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
                <form method="post" action="{{ route('subcategories.update', $subcategoryID) }}">
                    @csrf
                    @method('PUT')

                    <label>Title for Category</label>
                  <div class="mb-3">
                    	<input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ $subcategoryTitle ?? old('title') }}" required>

							@error('title')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
					</div>

                    <label>Slug</label>
                    <div class="mb-3">
                        <input type="text" id="slug" name="slug" class="form-control @error('slug') is-invalid @enderror" value="{{ $subcategorySlug ?? old('slug') }}" required>

                        @error('slug')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    
                  <div class="mb-3">
                    <label>Category</label>
                        <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror" value="{{ $subcategoryCategoryID ?? old('category_id') }}" required>
                            <option value="" disabled>Select Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ $subcategoryCategoryID == $category->id ? 'selected' : '' }}>{{ $category->title }}</option>
                            @endforeach
                        </select>

                            @error('category_id')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
					</div>

					

                    <div class="btn-group" role="group" aria-label="Button group">
                        <a href="{{ route('subcategories.index') }}" type="button" class="btn btn-danger" data-dismiss="modal">Back</a>
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </form>
            </div>
          </div>
        </div>

        <div class="col-4">
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
                    <h6> Total Sub Category</h6>
                </div>
                <div class="card-body p-4">
                    <p>{{ $subcategories->count() }}</p>
                </div>
            </div>
        </div>
        
      </div>

    @include('footer.nonguest')
  </div>
@endsection