<div class="modal fade" id="new">

    <div class="modal-dialog modal-dialog-centered" role="document">

        <div class="modal-content modal-content-demo">
            <form style="margin: 0; padding: 0" method="POST" action="#" enctype="multipart/form-data">
                @csrf
            <div class="modal-header">
                <h6 class="modal-title">Publish new</h6><button type="button" aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>

            <div class="modal-body">

                <div class="mb-3">
                    <label>Title</label>
                    <input type="title" id="title" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" placeholder="Enter title" required>

                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>



                {{-- <div class="mb-3">
                    <label>Category</label>
                    <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror" value="{{ $->category_id ?? old('category_id') }}" required>
                        <option value="" disabled>Select Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                        @endforeach
                    </select>

                    @error('category_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div> --}}

                <div class="mb-3">
                    <label>Subcategory</label>
                    <select name="subcategory_id" id="subcategory_id" class="form-control @error('subcategory_id') is-invalid @enderror" required>
                        <option value="" disabled>Select Subcategory</option>
                        @foreach ($subcategories as $subcategory)
                            <option value="{{ $subcategory->id }}">{{ $subcategory->title }}</option>
                        @endforeach
                    </select>

                    @error('subcategory_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


                <div class="mb-3">
                    <label>Content</label>
                    <textarea name="content" class="form-control @error('content') is-invalid @enderror" id="editor" placeholder="Provide cyc content" required>{{ old('content') }}</textarea>

                        @error('content')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>

            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Publish</button>
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
            </div>
        </form>
        </div>
    </div>
</div>


