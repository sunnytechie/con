<!-- Modal HTML -->
<div style="z-index: 9999" id="generate" class="modal delete-modal fade">
	<div class="modal-dialog modal-confirm">
        <form method="POST" action="{{ route('payments.rangeSearch') }}">
			@csrf
		<div class="modal-content">
			<div class="modal-header flex-column">
				<h5>Generate Report on table</h5>
			</div>
			<div style="text-align: left" class="modal-body">

                  	<div class="mb-2">
						<label>Range From</label>
                    	<input type="date" id="from" name="from" class="form-control" required>
					</div>

					<div class="mb-2">
						<label>Range To</label>
                    	<input type="date" id="to" name="to" class="form-control" required>
					</div>

					{{-- Select book purchased book name --}}
                    <div class="mb-2">
                        <label>Book purchased</label>
                        <select name="book_title" id="book_title" class="form-control @error('book_title') is-invalid @enderror" required>
                            <option value="">Select book</option>
                            @foreach ($books as $book)
                                <option value="{{ $book->title }}">{{ $book->title }}</option>
                            @endforeach
                        </select>

                        @error('book_title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>


			</div>
			<div class="modal-footer justify-content-center">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
				<button type="submit" class="btn btn-success">Generate</button>
			</div>
		</div>
        </form>
	</div>
</div>
