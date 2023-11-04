
<input hidden type="text" name="type" value="3">
<input hidden type="text" name="study_type_name" value="Daily Dynamite">


<div class="form-group">
    <label for="study_date">Study Date</label>
    <input type="date" class="form-control @error('study_date') is-invalid @enderror" id="study_date" name="study_date" value="{{ old('study_date') }}" placeholder="Provide Date" required>

    @error('study_date')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group">
    <label for="study_year">Study Year</label>
    <select class="form-control @error('study_year') is-invalid @enderror" id="study_year" name="study_year" required>
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

<div class="form-group">
    <label for="price">Study Price(NGN)</label>
    <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price') }}" required>

    @error('price')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group">
    <label for="topic">Topic</label>
    <input type="text" class="form-control @error('topic') is-invalid @enderror" id="topic" name="topic" value="{{ old('topic') }}" placeholder="Provide Topic" required>

    @error('topic')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>


<div class="form-group">
    <label for="study_text">Study Text</label>
    <textarea class="form-control @error('study_text') is-invalid @enderror" id="editor" name="study_text" rows="3" placeholder="Provide Study Text">{{ old('study_text') }}</textarea>

    @error('study_text')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>



<div class="form-group">
    <label for="anchor_verse_number">Anchor Verse Number</label>
    <input type="text" class="form-control @error('anchor_verse_number') is-invalid @enderror" id="anchor_verse_number" name="anchor_verse_number" value="{{ old('anchor_verse_number') }}" placeholder="Provide Anchor Verse Number" required>

    @error('anchor_verse_number')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>


<div class="form-group">
    <label for="anchor_verse_text">Anchor Verse Text</label>
    <textarea class="form-control @error('anchor_verse_text') is-invalid @enderror" id="editor1" name="anchor_verse_text" rows="3" placeholder="Provide Anchor Verse Text">{{ old('anchor_verse_text') }}</textarea>

    @error('anchor_verse_text')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>


<div class="form-group">
    <label for="anchor_verse_contents">Anchor Verse Contents</label>
    <textarea class="form-control @error('anchor_verse_contents') is-invalid @enderror" id="editor2" name="anchor_verse_contents" rows="3" placeholder="Provide Anchor Verse Contents">{{ old('anchor_verse_contents') }}</textarea>

    @error('anchor_verse_contents')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>


<div class="form-group">
    <label for="food_for_thought">Food For Thought</label>
    <textarea class="form-control @error('food_for_thought') is-invalid @enderror" id="editor3" name="food_for_thought" rows="3" placeholder="Provide Food For Thought">{{ old('food_for_thought') }}</textarea>

    @error('food_for_thought')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>


<div class="form-group">
    <label for="prayer">Prayer</label>
    <textarea class="form-control @error('prayer') is-invalid @enderror" id="editor4" name="prayer" rows="3" placeholder="Provide Prayer">{{ old('prayer') }}</textarea>

    @error('prayer')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>



