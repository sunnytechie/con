@extends('layouts.v23')

@section('content')
<div class="container-fluid py-4">

    <div class="row">
        <div class="col-md-12">
          <div class="card mb-4">
            <h5 class="card-header">
                Edit this Bible study
            </h5>
            

            <div class="card-body pt-0">

                <form action="{{ route('studies.updateBibleStudy', $id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group mt-2">
                        <label for="study_name">Study Name</label>
                        <input type="text" class="form-control @error('study_name') is-invalid @enderror" id="study_name" name="study_name" value="{{ $study_name ?? old('study_name') }}" placeholder="Provide Name" required>

                        @error('study_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="price">Study Price</label>
                        <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ $price ?? old('price') }}" placeholder="Provide Name" required>

                        @error('price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="study_date">Study Date</label>
                        <input type="date" class="form-control @error('study_date') is-invalid @enderror" id="study_date" name="study_date" value="{{ $study_date ?? old('study_date') }}" placeholder="Provide Date" required>

                        @error('study_date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="theme">Study Theme</label>
                        <input type="text" class="form-control @error('theme') is-invalid @enderror" id="theme" name="theme" value="{{ $theme ?? old('theme') }}" placeholder="Provide Theme" required>

                        @error('theme')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="sub_theme">Study Sub Theme</label>
                        <input type="text" class="form-control @error('sub_theme') is-invalid @enderror" id="sub_theme" name="sub_theme" value="{{ $sub_theme ?? old('sub_theme') }}" placeholder="Provide Sub Theme" required>

                        @error('sub_theme')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="topic">Study Topic</label>
                        <input type="text" class="form-control @error('topic') is-invalid @enderror" id="topic" name="topic" value="{{ $topic ?? old('topic') }}" placeholder="Provide Topic" required>

                        @error('topic')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="study_text">Study Text</label>
                        <textarea class="form-control @error('study_text') is-invalid @enderror" id="editor" name="study_text" rows="3" placeholder="Provide Text">{{ $study_text ?? old('study_text') }}</textarea>

                        @error('study_text')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="aims">Study Aims</label>
                        <textarea class="form-control @error('aims') is-invalid @enderror" id="editor1" name="aims" rows="3" placeholder="Provide Aims">{{ $aims ?? old('aims') }}</textarea>

                        @error('aims')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="introduction">Study Introduction</label>
                        <textarea class="form-control @error('introduction') is-invalid @enderror" id="editor2" name="introduction" rows="3" placeholder="Provide Introduction">{{ $introduction ?? old('introduction') }}</textarea>

                        @error('introduction')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="study_guide">Study Guide</label>
                        <textarea class="form-control @error('study_guide') is-invalid @enderror" id="editor4" name="study_guide" rows="3" placeholder="Provide Guide">{{ $study_guide ?? old('study_guide') }}</textarea>

                        @error('study_guide')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="conclusion">Study Conclusion</label>
                        <textarea class="form-control @error('conclusion') is-invalid @enderror" id="editor5" name="conclusion" rows="3" placeholder="Provide Conclusion">{{ $conclusion ?? old('conclusion') }}</textarea>

                        @error('conclusion')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="food_for_thought">Study Food For Thought</label>
                        <textarea class="form-control @error('food_for_thought') is-invalid @enderror" id="editor6" name="food_for_thought" rows="3" placeholder="Provide Food For Thought">{{ $food_for_thought ?? old('food_for_thought') }}</textarea>

                        @error('food_for_thought')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="memory_verse">Study Memory Verse</label>
                        <textarea class="form-control @error('memory_verse') is-invalid @enderror" id="editor7" name="memory_verse" rows="3" placeholder="Provide Memory Verse">{{ $memory_verse ?? old('memory_verse') }}</textarea>

                        @error('memory_verse')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="verse_content">Study Verse Content</label>
                        <textarea class="form-control @error('verse_content') is-invalid @enderror" id="editor8" name="verse_content" rows="3" placeholder="Provide Verse Content">{{ $verse_content ?? old('verse_content') }}</textarea>

                        @error('verse_content')
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
                        <a href="{{ route('studies.study') }}" type="button" class="btn btn-danger" data-dismiss="modal">Back</a>
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </form>

            </div>
          </div>
        </div>
      </div>


  </div>
@endsection
