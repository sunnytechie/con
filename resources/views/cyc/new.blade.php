@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">

    <div class="row">
        <div class="col-md-6 offset-md-2">
          <div class="card mb-4">
            <div class="card-header d-flex justify-content-between pb-0">
              <h5>
                Publish New
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
              
                <form method="POST" action="{{ route('cyc.store') }}" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="form-group">
                      <label for="cyc_title">CYC Title</label>
                      <input type="text" class="form-control @error('cyc_title') is-invalid @enderror" id="cyc_title" name="cyc_title" placeholder="CYC PDF">
      
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
                            <option>2022</option>
                            <option>2023</option>
                            <option>2024</option>
                            <option>2025</option>
                        </select>

                        @error('cyc_year')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                                    
                    <div class="form-group">
                      <label for="cyc_pdf">CYC PDF</label>
                      <input type="file" class="form-control @error('cyc_pdf') is-invalid @enderror" id="cyc_pdf" name="cyc_pdf">
      
                      @error('cyc_pdf')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                    
                    <div class="btn-group" role="group" aria-label="Button group">
                        <a class="btn btn-success" href="{{ route('cyc.index') }}">Back to list</a>
                        <button type="submit" class="btn btn-primary">Publish</button> 
                    </div>                 
                    
                  </form>

            </div>
          </div>
        </div>
      </div>

    @include('footer.nonguest')
  </div>
@endsection