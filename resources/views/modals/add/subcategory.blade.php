<!-- Modal HTML -->
<div style="z-index: 9999" id="addSubCategory" class="modal delete-modal fade">
	<div class="modal-dialog modal-confirm">
        <form method="POST" action="{{ route('subcategories.store') }}">
			@csrf
		<div class="modal-content">
			<div class="modal-header flex-column">
				<h5>Create New Sub Category</h5>
			</div>
			<div style="text-align: left" class="modal-body">
				<label>Title for Sub Category</label>
                  <div class="mb-3">
                    	<input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" placeholder="Give this sub category a name" required>

							@error('title')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
					</div>

                    <div class="mb-3">
                        <label>Slug</label>
                    	<input type="text" id="slug" name="slug" class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug') }}" placeholder="Slug, tags" required>

							@error('slug')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
					</div>

                    <div class="mb-3">
                        <label>Select Category</label>
                        <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror">
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                            @endforeach
                        </select>

                            @error('category_id')
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