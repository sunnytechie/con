<!-- Modal HTML -->
<div style="z-index: 9999" id="newBible" class="modal delete-modal fade">
	<div class="modal-dialog modal-confirm">
        <form method="POST" action="{{ route('bibles.store') }}" enctype="multipart/form-data">
			@csrf
		<div class="modal-content">
			<div class="modal-header flex-column">
				<h5>New Version</h5>
			</div>
			<div style="text-align: left" class="modal-body">
				
                  <div class="mb-3">
                    <label>Title</label>
                    	<input type="text" id="title" name="name" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" placeholder="Title of version" required>

							@error('title')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
					</div>
                    
                    <div class="mb-3">
                        <label>Version</label>
                            <input type="text" id="version" name="version" class="form-control @error('version') is-invalid @enderror" value="{{ old('version') }}" placeholder="1st edition" required>
    
                                @error('version')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>

                    
                    <div class="mb-3">
                        <label>Shortcode</label>
                            <input type="text" id="shortcode" name="shortcode" class="form-control @error('shortcode') is-invalid @enderror" value="{{ old('shortcode') }}" placeholder="KJV" required>
    
                                @error('shortcode')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>

                    
                    <div class="mb-3">
                        <label>Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="myeditorinstance" cols="30" rows="10">{{ old('description') }}</textarea>
    
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>


					<div class="mb-3">
                        <label>File</label>
						<input name="source" class="form-control" type="file" id="source" required>

							@error('source')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
					</div>
			</div>
			<div class="modal-footer justify-content-center">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
				<button type="submit" class="btn btn-success">Save</button>
			</div>
		</div>
        </form>
	</div>
</div> 