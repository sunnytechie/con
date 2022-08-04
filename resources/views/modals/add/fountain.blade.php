<!-- Modal HTML -->
<div style="z-index: 9999" id="addFountain" class="modal delete-modal fade">
	<div class="modal-dialog modal-confirm" style="width: 850px">
        <form method="POST" action="{{ route('studies.store') }}" enctype="multipart/form-data">
			@csrf
		<div class="modal-content">
			<div class="modal-header flex-column">
				<h5>Publish New Daily Fountain</h5>
			</div>
			<div style="text-align: left" class="modal-body">
				<input hidden type="text" name="type" value="1">
                <input hidden type="text" name="study_type_name" value="Daily Fountain">
                    
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
                    <label for="head_date">Head Date</label>
                    <input type="date" class="form-control @error('head_date') is-invalid @enderror" id="head_date" name="head_date" value="{{ old('head_date') }}" placeholder="Privide Head Date" required>
                    
                    @error('head_date')
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
                    <label for="study_text">Study Text</label>
                    <textarea class="form-control @error('study_text') is-invalid @enderror" id="study_text" name="study_text" rows="3" placeholder="Privide Study Text" required>{{ old('study_text') }}</textarea>
                    
                    @error('study_text')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                
                <div class="form-group">
                    <label for="study_title">Study Title</label>
                    <input type="text" class="form-control @error('study_title') is-invalid @enderror" id="study_title" name="study_title" value="{{ old('study_title') }}" placeholder="Privide Study Title" required>
                    
                    @error('study_title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                
                <div class="form-group">
                    <label for="study_content">Study Content</label>
                    <textarea class="form-control @error('study_content') is-invalid @enderror" id="study_content" name="study_content" rows="3" placeholder="Privide Study Content" required>{{ old('study_content') }}</textarea>
                    
                    @error('study_content')
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