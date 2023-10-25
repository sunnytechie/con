<div class="modal fade" id="edit">

    <div class="modal-dialog modal-dialog-centered" role="document">

        <div class="modal-content modal-content-demo">
            <form style="margin: 0; padding: 0" method="POST" action="{{ route('books.update', $book->id) }}" enctype="multipart/form-data">
                @method('put')
                @csrf
            <div class="modal-header">
                <h6 class="modal-title">Edit Book(PDF)</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">

                <div class="mb-3">
                    <label>Title</label>
                    <input type="title" id="title" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ $book->title ?? old('title') }}" placeholder="Enter title" required>

                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label>Pdf Tag</label>
                    <select name="tag" id="tag" class="form-control @error('tag') is-invalid @enderror" value="{{ $book->tag ?? old('tag') }}" required>
                        @php
                            $tags = ['Anglicanism', 'Others'];
                        @endphp

                        <option value="" disabled>Select</option>
                        @foreach ($tags as $tag)
                            <option value="{{ $tag }}" {{ $book->tag == $tag ? 'selected' : '' }}>{{ $tag }}</option>
                        @endforeach
                    </select>

                    @error('tag')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label>Category</label>
                    <select name="bookcategory_id" id="bookcategory_id" class="form-control @error('bookcategory_id') is-invalid @enderror" value="{{ $book->bookcategory_id ?? old('bookcategory_id') }}" required>
                        <option value="" disabled>Select Category</option>
                        @foreach ($bookcategories as $category)
                            <option value="{{ $category->id }}" {{ $book->bookcategory_id == $category->id ? 'selected' : '' }}>{{ $category->title }}</option>
                        @endforeach
                    </select>

                    @error('bookcategory_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label>Subcategory</label>
                    <select name="booksubcategory_id" id="booksubcategory_id" class="form-control @error('booksubcategory_id') is-invalid @enderror" value="{{ $book->booksubcategory_id ?? old('booksubcategory_id') }}" required>
                        <option value="" disabled>Select Subcategory</option>
                        @foreach ($booksubcategories as $subcategory)
                            <option value="{{ $subcategory->id }}" {{ $book->booksubcategory_id == $subcategory->id ? 'selected' : '' }}>{{ $subcategory->title }}</option>
                        @endforeach
                    </select>

                    @error('booksubcategory_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


                <div class="mb-3">
                    <label>Type</label>
                    <select name="type" id="type" class="form-control @error('type') is-invalid @enderror" value="{{ $book->type ?? old('type') }}" required>
                        <option value="" disabled>Select Price</option>
                        <option value="0" {{ $book->type == 0 ? 'selected' : '' }}>Free</option>
                        <option value="1" {{ $book->type == 1 ? 'selected' : '' }}>Paid</option>
                    </select>

                    @error('type')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


                <div class="mb-3">
                    <label>Price</label>
                    <input type="number" id="price" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ $book->price ?? old('price') }}" placeholder="Provide a price" required>

                    @error('price')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <img class="img-thumbnail" height="100" width="100" src="/storage/{{ $book->image }}" alt="No Image">
                    <label>PDF Cover Thumbnail/Picture</label>
                    <input name="image" class="form-control @error('image') is-invalid @enderror" type="file" id="image">

                        @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>

                <div class="mb-3">
                    <label for="PDF file">PDF file</label>
                    <input name="file" class="form-control @error('file') is-invalid @enderror" type="file" id="file">

                        @error('file')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>

                <div class="mb-3">
                    <label>Book author</label>
                    <input name="author" class="form-control @error('author') is-invalid @enderror" type="text" value="{{ $book->author ?? old('author') }}" id="author" placeholder="Provide an author's name">

                        @error('author')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>


                <div class="mb-3">
                    <label>Description</label>
                    <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" placeholder="Provide a description" required>{{ $book->description ?? old('description') }}</textarea>

                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>






            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Update</button>
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
            </div>
        </form>
        </div>
    </div>
</div>
