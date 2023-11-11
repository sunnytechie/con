<div class="modal fade" id="category">

    <div class="modal-dialog modal-dialog-centered" role="document">

        <div class="modal-content modal-content-demo">
            <form style="margin: 0; padding: 0" method="POST" action="#" enctype="multipart/form-data">
                @csrf
            <div class="modal-header">
                <h6 class="modal-title">New Category</h6><button type="button" aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
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
                    <label>Description</label>
                    <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="editor1" placeholder="Provide cyc content" required>{{ old('description') }}</textarea>

                        @error('description')
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


