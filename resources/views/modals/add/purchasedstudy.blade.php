<!-- Modal HTML -->
<div style="z-index: 9999" id="newPurchaseStudy" class="modal delete-modal fade">
	<div class="modal-dialog modal-confirm">
        <form method="POST" action="{{ route('purchase.studies.store') }}" enctype="multipart/form-data">
			@csrf
		<div class="modal-content">
			<div class="modal-header flex-column">
				<h5>Manually Purchase Devotional</h5>
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

                    {{-- Select Study tile, price and book id --}}
                    <div class="mb-3">
                        <label>Study title</label>
                        <select name="study_id" id="study_id" class="form-control @error('study_id') is-invalid @enderror" required>
                            <option disabled selected>Select book</option>
                            @foreach ($studies as $study)
                                <option value="{{ $study->id }}">{{ $study->study_name }} (500)</option>
                            @endforeach
                        </select>
    
                        @error('study_id')
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