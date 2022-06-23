<!-- Modal HTML -->
<div style="z-index: 9999" id="addCategory" class="modal delete-modal fade">
	<div class="modal-dialog modal-confirm">
        <form method="POST" action="{{ route('categories.store') }}" enctype="multipart/form-data">
			@csrf
		<div class="modal-content">
			<div class="modal-header flex-column">
				<h5>Create new Category</h5>
			</div>
			<div style="text-align: left" class="modal-body">
				<label>Title for Category</label>
                  <div class="mb-3">
                    	<input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" placeholder="Give this category a name" required>

							@error('title')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
					</div>

					<div class="mb-3">
						<input name="thumbnail" class="form-control" type="file" id="thumbnail" required>

							@error('thumbnail')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
					</div>
			</div>
			<div class="modal-footer justify-content-center">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
				<button type="submit" class="btn btn-success">Publish</button>
			</div>
		</div>
        </form>
	</div>
</div> 