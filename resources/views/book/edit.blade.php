@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">

    <div class="row">
        <div class="col-md-8">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>You are editing this Book</h6>
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
                <form method="post" action="{{ route('books.update', $bookID) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <label>Title</label>
                  <div class="mb-3">
                    	<input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ $bookTitle ?? old('title') }}" placeholder="Provide a name" required>

							@error('title')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
					</div>

                    
                    <div class="mb-3">
                        <label>Category</label>
                        <select name="bookcategory_id" id="bookcategory_id" class="form-control @error('bookcategory_id') is-invalid @enderror" value="{{ $bookBookcategory ?? old('bookcategory_id') }}" required>
                            <option value="" disabled>Select Category</option>
                            @foreach ($bookcategories as $category)
                                <option value="{{ $category->id }}" {{ $bookBookcategory == $category->id ? 'selected' : '' }}>{{ $category->title }}</option>
                            @endforeach
                        </select>

                        @error('bookcategory_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
 
                    <div class="mb-3">
                        <label>Subcategory</label>
                        <select name="booksubcategory_id" id="booksubcategory_id" class="form-control @error('booksubcategory_id') is-invalid @enderror" value="{{ $bookBooksubcategory ?? old('booksubcategory_id') }}" required>
                            <option value="" disabled>Select Subcategory</option>
                            @foreach ($booksubcategories as $subcategory)
                                <option value="{{ $subcategory->id }}" {{ $bookBooksubcategory == $subcategory->id ? 'selected' : '' }}>{{ $subcategory->title }}</option>
                            @endforeach
                        </select>

                        @error('booksubcategory_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    
                    <div class="mb-3">
                        <label>Type</label>
                        <select name="type" id="type" class="form-control @error('type') is-invalid @enderror" value="{{ $bookType ?? old('type') }}" required>
                            <option value="" disabled>Select Price</option>
                            <option value="0" {{ $bookType == 0 ? 'selected' : '' }}>Free</option>
                            <option value="1" {{ $bookType == 1 ? 'selected' : '' }}>Paid</option>
                        </select>

                        @error('type')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>


                    <div class="mb-3">
                        <label>Price</label>
                        <input type="number" id="price" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ $bookPrice ?? old('price') }}" placeholder="Provide a price" required>

                        @error('price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <img class="img-thumbnail" height="100" width="100" src="/storage/{{ $bookImage }}" alt="No Image">
                        <label>PDF Cover Thumbnail/Picture</label>
                        <input name="image" class="form-control @error('image') is-invalid @enderror" type="file" id="image">

                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    <div class="mb-3">
                        <label for="PDF file">PDF file</label>
                        <input name="file" class="form-control @error('file') is-invalid @enderror" type="file" id="file">

                            @error('file')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    <div class="mb-3">
                        <label>Book author</label>
                        <input name="author" class="form-control @error('author') is-invalid @enderror" type="text" value="{{ $bookAuthor ?? old('author') }}" id="author" placeholder="Provide an author's name">

                            @error('author')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    
                    <div class="mb-3">
                        <label>Description</label>
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" placeholder="Provide a description" required>{{ $bookDescription ?? old('description') }}</textarea>

                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
         

                    <div class="btn-group" role="group" aria-label="Button group">
                        <a href="{{ route('books.index') }}" type="button" class="btn btn-danger" data-dismiss="modal">Back</a>
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
                  <h6> Total Book</h6>
              </div>
              <div class="card-body p-4">
                  <p>{{ $books->count() }}</p>
              </div>
          </div>
      </div>
      </div>

    @include('footer.nonguest')
  </div>
@endsection