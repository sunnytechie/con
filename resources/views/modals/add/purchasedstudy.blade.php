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
                        <label>Devotional</label>
                        <select name="study_id" id="study_id" class="form-control @error('study_id') is-invalid @enderror" required>
                            <option disabled selected>Select book</option>
                            <option value="2">Bible Study</option>
                            <option value="1">Daily Fountain</option>
                            <option value="3">Daily Dynamite</option>
                        </select>
    
                        @error('study_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Valid through</label>
                        <select name="valid_year" id="valid_year" class="form-control @error('valid_year') is-invalid @enderror" required>
                            <option disabled selected>Select book</option>
                            <option>2022</option>
                            <option>2023</option>
                            <option>2024</option>
                            <option>2025</option>
                        </select>
    
                        @error('valid_year')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>


                    <div class="mb-3">
                        <label>Price</label>
                        <input type="number" id="price" name="price" class="form-control @error('price') is-invalid @enderror" value="500" required>
    
                        @error('price')
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