<input hidden type="text" name="type" value="2">
<input hidden type="text" name="study_type_name" value="Bible Study">

<div class="form-group">
    <label for="study_name">Study Name</label>
    <input type="text" class="form-control @error('study_name') is-invalid @enderror" id="study_name" name="study_name"
        value="{{ old('study_name') }}" placeholder="Provide Name" required>

    @error('study_name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

{{-- <div class="form-group">
    <label for="price">Study Price(NGN)</label>
    <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price"
        value="{{ old('price') }}" placeholder="Provide Name" required>

    @error('price')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div> --}}

<div class="form-group">
    <label for="study_date">Study Date</label>
    <input type="date" class="form-control @error('study_date') is-invalid @enderror" id="study_date"
        name="study_date" value="{{ old('study_date') }}" placeholder="Provide Date" required>

    @error('study_date')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group">
    <label for="theme">Study Theme</label>
    <input type="text" class="form-control @error('theme') is-invalid @enderror" id="theme" name="theme"
        value="{{ old('theme') }}" placeholder="Provide Theme" required>

    @error('theme')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group">
    <label for="sub_theme">Study Sub Theme</label>
    <input type="text" class="form-control @error('sub_theme') is-invalid @enderror" id="sub_theme" name="sub_theme"
        value="{{ old('sub_theme') }}" placeholder="Provide Sub Theme" required>

    @error('sub_theme')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group">
    <label for="topic">Study Topic</label>
    <input type="text" class="form-control @error('topic') is-invalid @enderror" id="topic" name="topic"
        value="{{ old('topic') }}" placeholder="Provide Topic" required>

    @error('topic')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group">
    <label for="study_text">Study Text</label>
    <textarea class="form-control @error('study_text') is-invalid @enderror" id="editor" name="study_text" rows="3"
        placeholder="Provide Study Text">{{ old('study_text') }}</textarea>

    @error('study_text')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group">
    <label for="aims">Study Aims</label>
    <textarea class="form-control @error('aims') is-invalid @enderror" id="editor1" name="aims" rows="3"
        placeholder="Provide Study Aims">{{ old('aims') }}</textarea>

    @error('aims')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group">
    <label for="introduction">Study Introduction</label>
    <textarea class="form-control @error('introduction') is-invalid @enderror" id="editor2" name="introduction"
        rows="3" placeholder="Provide Study Introduction">{{ old('introduction') }}</textarea>

    @error('introduction')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group">
    <label for="study_guide">Study Guide</label>
    <textarea class="form-control @error('study_guide') is-invalid @enderror" id="editor3" name="study_guide"
        rows="3" placeholder="Provide Study Guide">{{ old('study_guide') }}</textarea>
    @error('study_guide')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group">
    <label for="conclusion">Study Conclusion</label>
    <textarea class="form-control @error('conclusion') is-invalid @enderror" id="editor4" name="conclusion"
        rows="3" placeholder="Provide Study Conclusion">{{ old('conclusion') }}</textarea>
    @error('conclusion')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group">
    <label for="food_for_thought">Study Food For Thought</label>
    <textarea class="form-control @error('food_for_thought') is-invalid @enderror" id="editor5"
        name="food_for_thought" rows="3" placeholder="Provide Study Food For Thought">{{ old('food_for_thought') }}</textarea>
    @error('food_for_thought')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group">
    <label for="memory_verse">Study Memory Verse</label>
    <textarea class="form-control @error('memory_verse') is-invalid @enderror" id="editor6" name="memory_verse"
        rows="3" placeholder="Provide Study Memory Verse">{{ old('memory_verse') }}</textarea>
    @error('memory_verse')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group">
    <label for="verse_content">Study Verse Content</label>
    <textarea class="form-control @error('verse_content') is-invalid @enderror" id="editor7" name="verse_content"
        rows="3" placeholder="Provide Study Verse Content">{{ old('verse_content') }}</textarea>
    @error('verse_content')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>


<div class="form-group">
    <label for="study_year">Study Year</label>
    <select class="form-control @error('study_year') is-invalid @enderror" id="study_year" name="study_year"
        required>
        <option value="" disabled>Select Study Year</option>
        <option>2021</option>
        <option selected>2022</option>
        <option>2023</option>
        <option>2024</option>
        <option>2025</option>
        <option>2026</option>
        <option>2027</option>
        <option>2028</option>
        <option>2029</option>
        <option>2030</option>
        <option>2031</option>
        <option>2032</option>
        <option>2033</option>
        <option>2034</option>
        <option>2035</option>
        <option>2036</option>
        <option>2037</option>
        <option>2038</option>
        <option>2039</option>
        <option>2040</option>
    </select>
    @error('study_year')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
