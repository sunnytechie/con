<!-- Modal HTML -->
<div style="z-index: 9999" id="newBook" class="modal delete-modal fade">
	<div class="modal-dialog modal-confirm">
        <form method="POST" action="{{ route('books.store') }}" enctype="multipart/form-data">
			@csrf
		<div class="modal-content">
			<div class="modal-header flex-column">
				<h5>Publish New Book</h5>
			</div>
			<div style="text-align: left" class="modal-body">
				<label>Title of the book</label>
                  <div class="mb-3">
                    	<input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" placeholder="Give this book name" required>

							@error('title')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
					</div>

                    <div class="mb-3">
                        <label>Price</label>
                        <select name="type" id="type" class="form-control @error('type') is-invalid @enderror" value="{{ old('type') }}" required>
                            <option value="" disabled>Select type</option>
                            <option value="0">Free</option>
                            <option value="1">Paid</option>
                        </select>

                        @error('type')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Price</label>
                        <input name="price" class="form-control @error('price') is-invalid @enderror" type="number" value="{{ old('price') }}" id="price" placeholder="Price of the book">

                            @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    <div class="mb-3">
                        <label>Category</label>
                        <select name="bookcategory_id" id="bookcategory_id" class="form-control @error('bookcategory_id') is-invalid @enderror" value="{{ old('bookcategory_id') }}" required>
                            <option value="" disabled>Select Category</option>
                            @foreach ($bookcategories as $category)
                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                            @endforeach
                        </select>

                        @error('bookcategory_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Sub Category</label>
                        <select name="booksubcategory_id" id="booksubcategory_id" class="form-control @error('booksubcategory_id') is-invalid @enderror" value="{{ old('booksubcategory_id') }}">
                            <option value="" disabled>Select Sub Category</option>
                            @foreach ($booksubcategories as $subcategory)
                                <option value="{{ $subcategory->id }}">{{ $subcategory->title }}</option>
                            @endforeach
                        </select>

                        @error('booksubcategory_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Author of the book</label>
                    	<input type="text" id="author" name="author" class="form-control @error('author') is-invalid @enderror" value="{{ old('author') }}" placeholder="Fullname" required>

							@error('author')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
					</div>

                    <div class="mb-3">
                        <label>Description of the book</label>
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description">{{ old('description') }}</textarea>
                    

							@error('description')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
					</div>

                    
                    <div class="mb-3">
                        <label>Cover Page thumbnail(Image should not be above 2mb)</label>
                        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="" required>

                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    <div class="mb-3">
                        <label>PDF file</label>
                        <input type="file" name="file" class="form-control @error('file') is-invalid @enderror" id="file" required>

                            @error('file')
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