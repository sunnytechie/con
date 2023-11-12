@extends('layouts.v23')

@section('content')
<div class="container-fluid py-4">

    <div class="row">
        <div class="col-md-12">
          <div class="card mb-4">
            <div class="card-header d-flex justify-content-between pb-0">
              <h5>
                {{ $title }}
            </div>


            <div class="card-body px-4 pt-0 pb-2">

                <form method="POST" action="{{ route('bcp.update', $bcp->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('put')

                <div class="mb-3">
                    <label>Title</label>
                    <input type="title" id="title" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ $bcp->title ?? old('title') }}" placeholder="Enter title" required>

                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                    <div class="mb-3">
                        <label>Category</label>
                        <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror" required>
                            <option value="" disabled>Select Category</option>
                            @foreach ($categories as $category)
                                <option @if ($category->id == $bcp->bcpcategory_id)
                                    selected
                                    @endif value="{{ $category->id }}">{{ $category->title }}</option>
                            @endforeach
                        </select>

                        @error('category_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>


                    <div class="mb-3">
                        <label>Content</label>
                        <textarea name="content" class="form-control @error('content') is-invalid @enderror" id="editor" placeholder="Provide cyc content">{{ $bcp->content ?? old('content') }}</textarea>

                            @error('content')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    <div class="btn-group my-4" role="group" aria-label="Button group">
                        <a class="btn btn-success" href="{{ route('bcp.index') }}">Back to list</a>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                  </form>

            </div>
          </div>
        </div>
      </div>

  </div>
@endsection
