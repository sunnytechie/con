@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">

    <div class="row">
        <div class="col-md-6 offset-md-2">
          <div class="card mb-4">
            <div class="card-header d-flex justify-content-between pb-0">
              <h5>
                Edit {{ $cycTitle }} {{ $cycYear }}
              </h5>
            
            </div>

            @if (session('success'))
                <div style="position: absolute; right: 30px; top: 20px" class="alert alert-info alert-dismissible fade show" role="alert">
                <strong>{{ session('success') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
            @endif
            
            <div class="card-body px-4 pt-0 pb-2">
              
                <form method="POST" action="{{ route('cyc.update', $cycID) }}" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group">
                      <label for="cyc_title">CYC Title</label>
                      <input type="text" class="form-control @error('cyc_title') is-invalid @enderror" id="cyc_title" value="{{ $cycTitle ?? old('cyc_title') }}" name="cyc_title" placeholder="CYC PDF">
      
                      @error('cyc_title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>

                    <div class="mb-3">
                        <label for="cyc_year">CYC Year</label>
                        <select name="cyc_year" class="form-control @error('cyc_year') is-invalid @enderror">
                            <option value="" disabled>Select year</option>
                            <option value="2022" {{ $cycYear == '2022' ? 'selected' : '' }}>2022</option>
                            <option value="2023" {{ $cycYear == '2023' ? 'selected' : '' }}>2023</option>
                            <option value="2024" {{ $cycYear == '2024' ? 'selected' : '' }}>2024</option>
                            <option value="2025" {{ $cycYear == '2025' ? 'selected' : '' }}>2025</option>
                        </select>

                        @error('cyc_year')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                                    
                    <div class="form-group">
                      <label for="cyc_pdf">Upload to change CYC PDF</label>
                      <input type="file" class="form-control @error('cyc_pdf') is-invalid @enderror" id="cyc_pdf" name="cyc_pdf">
      
                      @error('cyc_pdf')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                    
                    
                    <div class="btn-group" role="group" aria-label="Button group">
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