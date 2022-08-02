<!-- Modal HTML -->
<div style="z-index: 9999" id="newPurchase" class="modal delete-modal fade">
	<div class="modal-dialog modal-confirm">
        <form method="POST" action="{{ route('payments.store') }}" enctype="multipart/form-data">
			@csrf
		<div class="modal-content">
			<div class="modal-header flex-column">
				<h5>Purchase book</h5>
			</div>
			<div style="text-align: left" class="modal-body">
				
                    
                   
                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter email" required>
    
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    {{-- Select books tile, price and book id --}}
                    <div class="mb-3">
                        <label>Book title</label>
                        <select name="book_id" id="book_id" class="form-control @error('book_id') is-invalid @enderror" required>
                            <option value="">Select book</option>
                            @foreach ($books as $book)
                                <option value="{{ $book->id }}">{{ $book->title }} ({{ $book->price }})</option>
                            @endforeach
                        </select>
    
                        @error('book_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>


			</div>
			<div class="modal-footer justify-content-center">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
				<button type="submit" class="btn btn-success">Store</button>
			</div>
		</div>
        </form>
	</div>
</div> 