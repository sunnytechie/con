<div class="modal fade" id="new">

    <div class="modal-dialog modal-dialog-centered" role="document">

        <div class="modal-content modal-content-demo">
            <form style="margin: 0; padding: 0" method="POST" action="{{ route('cyc.calendar.store') }}" enctype="multipart/form-data">
                @csrf
            <div class="modal-header">
                <h6 class="modal-title">Publish new</h6><button type="button" aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>

            <div class="modal-body">

                <div class="mb-3">
                    <label>Date</label>
                    <input type="date" id="date" name="date" class="form-control @error('date') is-invalid @enderror" value="{{ old('date') }}" placeholder="Enter date" required>

                    @error('date')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label>Color</label>
                    <input type="text" id="color" name="color" class="form-control @error('color') is-invalid @enderror" value="{{ old('color') }}" placeholder="#000000" required>

                    @error('color')
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


