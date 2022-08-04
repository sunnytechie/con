@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">

    <div class="row">
        <div class="col-md-8 offset-md-1">
          <div class="card mb-4">
            <h5 class="card-header">
                Edit this Bible study
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
             
                <form action="{{ route('studies.updateBibleStudy', $id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="study_name">Study Name</label>
                        <input type="text" class="form-control @error('study_name') is-invalid @enderror" id="study_name" name="study_name" value="{{ $study_name ?? old('study_name') }}" placeholder="Privide Name" required>
    
                        @error('study_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

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
                        <label for="theme">Study Theme</label>
                        <input type="text" class="form-control @error('theme') is-invalid @enderror" id="theme" name="theme" value="{{ $theme ?? old('theme') }}" placeholder="Privide Theme" required>
    
                        @error('theme')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    
                    <div class="form-group">
                        <label for="sub_theme">Study Sub Theme</label>
                        <input type="text" class="form-control @error('sub_theme') is-invalid @enderror" id="sub_theme" name="sub_theme" value="{{ $sub_theme ?? old('sub_theme') }}" placeholder="Privide Sub Theme" required>
    
                        @error('sub_theme')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    
                    <div class="form-group">
                        <label for="topic">Study Topic</label>
                        <input type="text" class="form-control @error('topic') is-invalid @enderror" id="topic" name="topic" value="{{ $topic ?? old('topic') }}" placeholder="Privide Topic" required>
    
                        @error('topic')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    
                    <div class="form-group">
                        <label for="study_text">Study Text</label>
                        <textarea class="form-control @error('study_text') is-invalid @enderror" id="study_text" name="study_text" rows="3" placeholder="Privide Text" required>{{ $study_text ?? old('study_text') }}</textarea>
    
                        @error('study_text')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    
                    <div class="form-group">
                        <label for="aims">Study Aims</label>
                        <textarea class="form-control @error('aims') is-invalid @enderror" id="aims" name="aims" rows="3" placeholder="Privide Aims" required>{{ $aims ?? old('aims') }}</textarea>
    
                        @error('aims')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    
                    <div class="form-group">
                        <label for="introduction">Study Introduction</label>
                        <textarea class="form-control @error('introduction') is-invalid @enderror" id="introduction" name="introduction" rows="3" placeholder="Privide Introduction" required>{{ $introduction ?? old('introduction') }}</textarea>
    
                        @error('introduction')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    
                    <div class="form-group">
                        <label for="study_guide">Study Guide</label>
                        <textarea class="form-control @error('study_guide') is-invalid @enderror" id="study_guide" name="study_guide" rows="3" placeholder="Privide Guide" required>{{ $study_guide ?? old('study_guide') }}</textarea>
    
                        @error('study_guide')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    
                    <div class="form-group">
                        <label for="conclusion">Study Conclusion</label>
                        <textarea class="form-control @error('conclusion') is-invalid @enderror" id="conclusion" name="conclusion" rows="3" placeholder="Privide Conclusion" required>{{ $conclusion ?? old('conclusion') }}</textarea>
    
                        @error('conclusion')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    
                    <div class="form-group">
                        <label for="food_for_thought">Study Food For Thought</label>
                        <textarea class="form-control @error('food_for_thought') is-invalid @enderror" id="food_for_thought" name="food_for_thought" rows="3" placeholder="Privide Food For Thought" required>{{ $food_for_thought ?? old('food_for_thought') }}</textarea>
    
                        @error('food_for_thought')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    
                    <div class="form-group">
                        <label for="memory_verse">Study Memory Verse</label>
                        <textarea class="form-control @error('memory_verse') is-invalid @enderror" id="memory_verse" name="memory_verse" rows="3" placeholder="Privide Memory Verse" required>{{ $memory_verse ?? old('memory_verse') }}</textarea>
    
                        @error('memory_verse')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    
                    <div class="form-group">
                        <label for="verse_content">Study Verse Content</label>
                        <textarea class="form-control @error('verse_content') is-invalid @enderror" id="verse_content" name="verse_content" rows="3" placeholder="Privide Verse Content" required>{{ $verse_content ?? old('verse_content') }}</textarea>
    
                        @error('verse_content')
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
                        <a href="{{ route('studies.study') }}" type="button" class="btn btn-danger" data-dismiss="modal">Back</a>
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