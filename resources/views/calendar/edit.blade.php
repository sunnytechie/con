@extends('layouts.v23')

@section('content')
<div class="container-fluid py-4">

    <div class="row">
        <div class="col-md-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>{{ $title ?? "CYC Calendar" }}</h6>
              {{-- Success Message --}}

            </div>
            <div class="card-body p-4">
                <form method="post" action="{{ route('cyc.calendar.update', $calendar->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label>Date</label>
                        <input type="date" id="date" name="date" class="form-control @error('date') is-invalid @enderror" value="{{ $calendar->date ?? old('date') }}" placeholder="Enter date" required>

                        @error('date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Color</label>
                        <input type="text" id="color" name="color" class="form-control @error('color') is-invalid @enderror" value="{{ $calendar->color ?? old('color') }}" placeholder="#000000" required>

                        @error('color')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>


                    <div class="mb-3">
                        <label>Content</label>
                        <textarea name="content" class="form-control @error('content') is-invalid @enderror" id="editor" placeholder="Provide cyc content">{{ $calendar->content ?? old('content') }}</textarea>

                            @error('content')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>


                    <div class="btn-group" role="group" aria-label="Button group">
                        <a href="{{ route('cyc.calendar') }}" type="button" class="btn btn-danger" data-dismiss="modal">Back</a>
                        <button type="submit" class="btn btn-success">Publish</button>
                    </div>
                </form>
            </div>
          </div>
        </div>


      </div>


  </div>
@endsection
