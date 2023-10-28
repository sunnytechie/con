<!-- Modal HTML -->
{{-- <div style="z-index: 9999" id="newSubBookCategory" class="modal delete-modal fade">
	<div class="modal-dialog modal-confirm">
        <form method="POST" action="{{ route('books.sub.categories.store') }}" enctype="multipart/form-data">
			@csrf
		<div class="modal-content">
			<div class="modal-header flex-column">
				<h5>Create new Category</h5>
			</div>
			<div style="text-align: left" class="modal-body">

                    <div class="mb-3">
                        <label>Title for Subcategory</label>
                    	<input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" placeholder="Give this category a name" required>

							@error('title')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
					</div>

                    <div class="mb-3">
                        <label>Parent Category</label>
                        <select name="bookcategory_id" class="form-control @error('bookcategory_id') is-invalid @enderror">
                            <option value="">Select Parent Category</option>
                            @foreach($bookcategories as $bookcategory)
                                <option value="{{ $bookcategory->id }}">{{ $bookcategory->title }}</option>
                            @endforeach
                        </select>

                        @error('bookcategory_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

					<div class="mb-3">
                        <label for="thumbnail">Thumbnail</label>
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
				<button type="submit" class="btn btn-success">Save</button>
			</div>
		</div>
        </form>
	</div>
</div> --}}


<div class="modal fade" id="subcategory">

    <div class="modal-dialog modal-dialog-centered" role="document">

        <div class="modal-content modal-content-demo">
            <form style="margin: 0; padding: 0" method="POST" action="{{ route('books.sub.categories.store') }}" enctype="multipart/form-data">
                @csrf
            <div class="modal-header">
                <h6 class="modal-title">Book Sub Category</h6><button type="button" aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">

                <div class="mb-3">
                    <label>Title for Subcategory</label>
                    <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" placeholder="Give this category a name" required>

                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>

                <div class="mb-3">
                    <label>Parent Category</label>
                    <select name="bookcategory_id" class="form-control @error('bookcategory_id') is-invalid @enderror">
                        <option value="">Select Parent Category</option>
                        @foreach($bookcategories as $bookcategory)
                            <option value="{{ $bookcategory->id }}">{{ $bookcategory->title }}</option>
                        @endforeach
                    </select>

                    @error('bookcategory_id')
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
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
            </div>
        </form>
        </div>
    </div>
</div>
