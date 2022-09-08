@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">

    <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <h5 class="card-header">
                Edit this daily dynamite
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
             
              <form action="{{ route('studies.updateDailyDynamite', $id) }}" method="POST">
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
                  <label for="study_text">Study Text</label>
                  <textarea class="form-control @error('study_text') is-invalid @enderror" id="study_text" name="study_text" rows="3" placeholder="Privide Study Text" required>{{ $study_text ?? old('study_text') }}</textarea>

                  @error('study_text')
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
                  <label for="anchor_verse_number">Anchor Verse Number</label>
                  <input type="text" class="form-control @error('anchor_verse_number') is-invalid @enderror" id="anchor_verse_number" name="anchor_verse_number" value="{{ $anchor_verse_number ?? old('anchor_verse_number') }}" placeholder="Privide Anchor Verse Number" required>
  
                  @error('anchor_verse_number')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>

              
              <div class="form-group">
                  <label for="anchor_verse_text">Anchor Verse Text</label>
                  <textarea class="form-control @error('anchor_verse_text') is-invalid @enderror" id="anchor_verse_text" name="anchor_verse_text" rows="3" placeholder="Privide Anchor Verse Text" required>{{ $anchor_verse_text ?? old('anchor_verse_text') }}</textarea>
  
                  @error('anchor_verse_text')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>

              
              <div class="form-group">
                  <label for="anchor_verse_contents">Anchor Verse Contents</label>
                  <textarea class="form-control @error('anchor_verse_contents') is-invalid @enderror" id="anchor_verse_contents" name="anchor_verse_contents" rows="3" placeholder="Privide Anchor Verse Contents" required>{{ $anchor_verse_contents ?? old('anchor_verse_contents') }}</textarea>
  
                  @error('anchor_verse_contents')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>

              
              <div class="form-group">
                  <label for="food_for_thought">Food For Thought</label>
                  <textarea class="form-control @error('food_for_thought') is-invalid @enderror" id="food_for_thought" name="food_for_thought" rows="3" placeholder="Privide Food For Thought" required>{{ $food_for_thought ?? old('food_for_thought') }}</textarea>
  
                  @error('food_for_thought')
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
                            <option value="" disabled>Select Study Year</option>
                            <option value="2021" {{ $study_year == "2021" ? 'selected' : '' }}>2021</option>
                            <option value="2022" {{ $study_year == "2022" ? 'selected' : '' }}>2022</option>
                            <option value="2023" {{ $study_year == "2023" ? 'selected' : '' }}>2023</option>
                            <option value="2024" {{ $study_year == "2024" ? 'selected' : '' }}>2024</option>
                            <option value="2025" {{ $study_year == "2025" ? 'selected' : '' }}>2025</option>
                            <option value="2026" {{ $study_year == '2026' ? 'selected' : '' }}>2026</option>
                            <option value="2027" {{ $study_year == '2027' ? 'selected' : '' }}>2027</option>
                            <option value="2028" {{ $study_year == '2028' ? 'selected' : '' }}>2028</option>
                            <option value="2029" {{ $study_year == '2029' ? 'selected' : '' }}>2029</option>
                            <option value="2030" {{ $study_year == '2030' ? 'selected' : '' }}>2030</option>
                            <option value="2031" {{ $study_year == '2031' ? 'selected' : '' }}>2031</option>
                            <option value="2032" {{ $study_year == '2032' ? 'selected' : '' }}>2032</option>
                            <option value="2033" {{ $study_year == '2033' ? 'selected' : '' }}>2033</option>
                            <option value="2034" {{ $study_year == '2034' ? 'selected' : '' }}>2034</option>
                            <option value="2035" {{ $study_year == '2035' ? 'selected' : '' }}>2035</option>
                            <option value="2036" {{ $study_year == '2036' ? 'selected' : '' }}>2036</option>
                            <option value="2037" {{ $study_year == '2037' ? 'selected' : '' }}>2037</option>
                            <option value="2038" {{ $study_year == '2038' ? 'selected' : '' }}>2038</option>
                            <option value="2039" {{ $study_year == '2039' ? 'selected' : '' }}>2039</option>
                            <option value="2040" {{ $study_year == '2040' ? 'selected' : '' }}>2040</option>
                </select>
            </div>

                    

                    <div class="btn-group" role="group" aria-label="Button group">
                        <a href="{{ route('studies.dynamite') }}" type="button" class="btn btn-danger" data-dismiss="modal">Back</a>
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