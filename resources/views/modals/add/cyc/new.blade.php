<div class="modal fade" id="new">

    <div class="modal-dialog modal-dialog-centered" role="document">

        <div class="modal-content modal-content-demo">
            <form style="margin: 0; padding: 0" method="POST" action="{{ route('cyc.store') }}" enctype="multipart/form-data">
                @csrf
            <div class="modal-header">
                <h6 class="modal-title">Publish new</h6><button type="button" aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>

            <div class="modal-body">

                <div class="mb-3">
                    <label>Diocese</label>
                    <input type="title" id="title" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" placeholder="Diocese Name" value="Diocese of " required>

                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label>Date</label>
                    <input type="date" id="cyc_date" name="cyc_date" class="form-control @error('cyc_date') is-invalid @enderror" value="{{ old('cyc_date') }}" placeholder="10/10/2023" required>

                    @error('cyc_date')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label>Thumbnail</label>
                    <input type="file" id="cyc_thumbnail" name="cyc_thumbnail" class="form-control @error('cyc_thumbnail') is-invalid @enderror" value="{{ old('cyc_thumbnail') }}" placeholder="Diocese Name" required>

                    @error('cyc_thumbnail')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label>Fullname</label>
                    <input type="text" id="cyc_name" name="cyc_name" class="form-control @error('cyc_name') is-invalid @enderror" value="{{ old('cyc_name') }}" placeholder="THE RT. REVD DR. CHRISTIAN ONYEKA ONYIA (JP)" required>

                    @error('cyc_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label>Titles</label>
                    <input type="text" id="cyc_name_title" name="cyc_name_title" class="form-control @error('cyc_name_title') is-invalid @enderror" value="{{ old('cyc_name_title') }}" placeholder="M.Ed (Edu. Admin); B.Ed (Edu. Admin); B.Sc (Hons) Pol. Sc;
                    B.LS (Ed) Lib. Sc; Dip. Th; PGD (Rel. Studies)" required>

                    @error('cyc_name_title')
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
                    <label>ECCLESIASTICAL PROVINCE</label>
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
                    <textarea name="content" class="form-control @error('content') is-invalid @enderror" id="editor" placeholder="Provide cyc content">{{ old('content') }}</textarea>

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


