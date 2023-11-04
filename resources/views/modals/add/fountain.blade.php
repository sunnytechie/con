
				<input hidden type="text" name="type" value="1">
                <input hidden type="text" name="study_type_name" value="Daily Fountain">

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
                    <label for="price">Study Price(NGN)</label>
                    <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price') }}" placeholder="Provide Name" required>

                    @error('price')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="head_date">Head Date</label>
                    <input type="date" class="form-control @error('head_date') is-invalid @enderror" id="head_date" name="head_date" value="{{ old('head_date') }}" placeholder="Provide Head Date" required>

                    @error('head_date')
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
                    <label for="study_title">Study Title</label>
                    <input type="text" class="form-control @error('study_title') is-invalid @enderror" id="study_title" name="study_title" value="{{ old('study_title') }}" placeholder="Provide Study Title" required>

                    @error('study_title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="study_content">Study Content</label>
                    <textarea class="form-control @error('study_content') is-invalid @enderror" id="editor1" name="study_content" rows="3" placeholder="Provide Study Content">{{ old('study_content') }}</textarea>

                    @error('study_content')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="prayer">Prayer</label>
                    <textarea class="form-control @error('prayer') is-invalid @enderror" id="editor2" name="prayer" rows="3" placeholder="Provide Prayer">{{ old('prayer') }}</textarea>

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



