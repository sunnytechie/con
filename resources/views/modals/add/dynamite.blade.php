<!-- Modal HTML -->
<div style="z-index: 9999" id="addDynamite" class="modal delete-modal fade">
	<div class="modal-dialog modal-confirm" style="width: 850px">
        <form method="POST" action="{{ route('studies.store') }}" enctype="multipart/form-data">
			@csrf
		<div class="modal-content">
			<div class="modal-header flex-column">
				<h5>Publish New Daily Dynamite</h5>
			</div>
			<div style="text-align: left" class="modal-body">
				<input hidden type="text" name="type" value="3">
                <input hidden type="text" name="study_type_name" value="Daily Dynamite">

                
                <div class="form-group">
                    <label for="study_date">Study Date</label>
                    <input type="date" class="form-control @error('study_date') is-invalid @enderror" id="study_date" name="study_date" value="{{ old('study_date') }}" placeholder="Privide Date" required>
    
                    @error('study_date')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                
                <div class="form-group">
                    <label for="study_text">Study Text</label>
                    <textarea class="form-control @error('study_text') is-invalid @enderror" id="study_text" name="study_text" rows="3" placeholder="Privide Study Text" required>{{ old('study_text') }}</textarea>
    
                    @error('study_text')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                
                <div class="form-group">
                    <label for="topic">Topic</label>
                    <input type="text" class="form-control @error('topic') is-invalid @enderror" id="topic" name="topic" value="{{ old('topic') }}" placeholder="Privide Topic" required>
    
                    @error('topic')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                
                <div class="form-group">
                    <label for="anchor_verse_number">Anchor Verse Number</label>
                    <input type="text" class="form-control @error('anchor_verse_number') is-invalid @enderror" id="anchor_verse_number" name="anchor_verse_number" value="{{ old('anchor_verse_number') }}" placeholder="Privide Anchor Verse Number" required>
    
                    @error('anchor_verse_number')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                
                <div class="form-group">
                    <label for="anchor_verse_text">Anchor Verse Text</label>
                    <textarea class="form-control @error('anchor_verse_text') is-invalid @enderror" id="anchor_verse_text" name="anchor_verse_text" rows="3" placeholder="Privide Anchor Verse Text" required>{{ old('anchor_verse_text') }}</textarea>
    
                    @error('anchor_verse_text')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                
                <div class="form-group">
                    <label for="anchor_verse_contents">Anchor Verse Contents</label>
                    <textarea class="form-control @error('anchor_verse_contents') is-invalid @enderror" id="anchor_verse_contents" name="anchor_verse_contents" rows="3" placeholder="Privide Anchor Verse Contents" required>{{ old('anchor_verse_contents') }}</textarea>
    
                    @error('anchor_verse_contents')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                
                <div class="form-group">
                    <label for="food_for_thought">Food For Thought</label>
                    <textarea class="form-control @error('food_for_thought') is-invalid @enderror" id="food_for_thought" name="food_for_thought" rows="3" placeholder="Privide Food For Thought" required>{{ old('food_for_thought') }}</textarea>
    
                    @error('food_for_thought')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                
                <div class="form-group">
                    <label for="prayer">Prayer</label>
                    <textarea class="form-control @error('prayer') is-invalid @enderror" id="prayer" name="prayer" rows="3" placeholder="Privide Prayer" required>{{ old('prayer') }}</textarea>
    
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
                        <option value="2022">2022</option>
                        <option value="2023">2023</option>
                        <option value="2024">2024</option>
                        <option value="2025">2025</option>
                    </select>
                    @error('study_year')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

			</div>
			<div class="modal-footer justify-content-end">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
				<button type="submit" class="btn btn-success">Publish</button>
			</div>
		</div>
        </form>
	</div>
</div> 