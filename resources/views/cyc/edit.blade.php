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

                <form method="POST" action="{{ route('cyc.update', $cyc->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('put')


                    <div class="mb-3 mt-2">
                        <label>Title</label>
                        <input type="title" id="title" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ $cyc->cyc_title ?? old('title') }}" placeholder="Enter title" required>

                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>


                    <div class="mb-3">
                        <label>Date</label>
                        <input type="date" id="cyc_date" name="cyc_date" class="form-control @error('cyc_date') is-invalid @enderror" value="{{ $cyc->cyc_date ?? old('cyc_date') }}" placeholder="10/10/2023" required>

                        @error('cyc_date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Thumbnail</label>
                        <input type="file" id="cyc_thumbnail" name="cyc_thumbnail" class="form-control @error('cyc_thumbnail') is-invalid @enderror" value="{{ $cyc->cyc_thumbnail ?? old('cyc_thumbnail') }}" placeholder="Diocese Name">

                        @error('cyc_thumbnail')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Fullname</label>
                        <input type="text" id="cyc_name" name="cyc_name" class="form-control @error('cyc_name') is-invalid @enderror" value="{{ $cyc->cyc_name ?? old('cyc_name') }}" placeholder="THE RT. REVD DR. CHRISTIAN ONYEKA ONYIA (JP)" required>

                        @error('cyc_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Titles</label>
                        <input type="text" id="cyc_name_title" name="cyc_name_title" class="form-control @error('cyc_name_title') is-invalid @enderror" value="{{ $cyc->cyc_name_title ?? old('cyc_name_title') }}" placeholder="M.Ed (Edu. Admin); B.Ed (Edu. Admin); B.Sc (Hons) Pol. Sc;
                        B.LS (Ed) Lib. Sc; Dip. Th; PGD (Rel. Studies)" required>

                        @error('cyc_name_title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Subcategory</label>
                        <select name="subcategory_id" id="subcategory_id" class="form-control @error('subcategory_id') is-invalid @enderror" required>
                            <option value="" disabled>Select Subcategory</option>
                            @foreach ($subcategories as $subcategory)
                                <option @if ($subcategory->id == $cyc->cycsubcategory_id)
                                selected
                                @endif value="{{ $subcategory->id }}">{{ $subcategory->title }}</option>
                            @endforeach
                        </select>

                        @error('subcategory_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>


                    <div class="mb-3">
                        <label>Content</label>
                        <textarea name="content" class="form-control @error('content') is-invalid @enderror" id="editor" placeholder="Provide cyc content">{{ $cyc->content ?? old('content') }}</textarea>

                            @error('content')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>


                    <div class="btn-group my-4" role="group" aria-label="Button group">
                        <a class="btn btn-success" href="{{ route('cyc.index') }}">Back to list</a>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                  </form>

            </div>
          </div>
        </div>
      </div>

    @include('footer.nonguest')
  </div>
@endsection
