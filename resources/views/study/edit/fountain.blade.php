@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">

    <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <h5 class="card-header">
                Edit this daily fountain
            </h5>
            @if (session('success'))
                <div style="position: absolute; right: 30px; top: 20px" class="alert alert-info alert-dismissible fade show" role="alert">
                <strong>{{ session('success') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
            @endif
            
            <div class="card-body pt-0">
             
              <form action="{{ route('studies.updateFountain', $id) }}" method="POST">
                @csrf
                @method('PUT')
                    
                <div class="form-group">
                  <label for="study_date">Study Date</label>
                  <input type="date" class="form-control @error('study_date') is-invalid @enderror" id="study_date" name="study_date" value="{{ $study_date ?? old('study_date') }}" placeholder="Privide Date" required>

                  @error('study_date')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>

              <div class="form-group">
                <label for="price">Study Price</label>
                <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ $price ?? old('price') }}" placeholder="Privide Name" required>

                @error('price')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
              
              <div class="form-group">
                  <label for="head_date">Head Date</label>
                  <input type="date" class="form-control @error('head_date') is-invalid @enderror" id="head_date" name="head_date" value="{{ $head_date ?? old('head_date') }}" placeholder="Privide Head Date" required>
                  
                  @error('head_date')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>

              
              <div class="form-group">
                  <label for="topic">Topic</label>
                  <input type="text" class="form-control @error('topic') is-invalid @enderror" id="topic" name="topic" value="{{ $topic ?? old('topic') }}" placeholder="Privide Topic" required>
                  
                  @error('topic')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>

              
              <div class="form-group">
                  <label for="study_text">Study Text</label>
                  <textarea class="form-control @error('study_text') is-invalid @enderror" id="study_text" name="study_text" rows="3" placeholder="Privide Study Text" required>{{ $study_text ?? old('study_text') }}</textarea>
                  
                  @error('study_text')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>

              
              <div class="form-group">
                  <label for="study_title">Study Title</label>
                  <input type="text" class="form-control @error('study_title') is-invalid @enderror" id="study_title" name="study_title" value="{{ $study_title ?? old('study_title') }}" placeholder="Privide Study Title" required>
                  
                  @error('study_title')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>

              
              <div class="form-group">
                  <label for="study_content">Study Content</label>
                  <textarea class="form-control @error('study_content') is-invalid @enderror" id="study_content" name="study_content" rows="3" placeholder="Privide Study Content" required>{{ $study_content ?? old('study_content') }}</textarea>
                  
                  @error('study_content')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>

              
              <div class="form-group">
                  <label for="prayer">Prayer</label>
                  <textarea class="form-control @error('prayer') is-invalid @enderror" id="prayer" name="prayer" rows="3" placeholder="Privide Prayer" required>{{ $prayer ?? old('prayer') }}</textarea>
                  
                  @error('prayer')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>

              <div class="form-group">
                <label for="study_year">Study Year</label>
                <select class="form-control @error('study_year') is-invalid @enderror" id="study_year" name="study_year" required>
                    <option value="">Select Study Year</option>
                    <option value="2022" {{ $study_year == "2022" ? 'selected' : '' }}>2022</option>
                    <option value="2023" {{ $study_year == "2023" ? 'selected' : '' }}>2023</option>
                    <option value="2024" {{ $study_year == "2024" ? 'selected' : '' }}>2024</option>
                    <option value="2025" {{ $study_year == "2025" ? 'selected' : '' }}>2025</option>

                </select>
            </div>

                    <div class="btn-group" role="group" aria-label="Button group">
                        <a href="{{ route('studies.fountain') }}" type="button" class="btn btn-danger" data-dismiss="modal">Back</a>
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </form>

            </div>
          </div>
        </div>
      </div>

    @include('footer.nonguest')
  </div>
@endsection