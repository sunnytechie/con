@extends('layouts.v23')
@section('content')

 <!-- Row -->
 <div class="row row-sm">
    <div class="col-lg-12">
        <div class="card p-5">
            <form method="POST" action="{{ route('hymnal.update', $hymnal->id) }}" enctype="multipart/form-data">
                @method('put')
                @csrf

                    <div class="mb-3">
                        <label>Number</label>
                        <input type="number" id="number" name="number" class="form-control @error('number') is-invalid @enderror" value="{{ $hymnal->number }}" placeholder="Enter number" required>

                        @error('number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>


                    <div class="mb-3">
                        <label>Title</label>
                        <input type="title" id="title" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ $hymnal->title }}" placeholder="Enter title" required>

                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>


                    <div class="mb-3">
                        <label>Content</label>
                        <textarea name="content" class="form-control @error('content') is-invalid @enderror" id="content" cols="30" rows="10">{{ $hymnal->content }}</textarea>

                        @error('content')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Save changes</button>

            </form>
        </div>
    </div>
</div>
<!-- End Row -->

@endsection
