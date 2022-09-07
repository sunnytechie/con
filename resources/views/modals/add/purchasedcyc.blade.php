<!-- Modal HTML -->
<div style="z-index: 9999" id="newPurchaseCyc" class="modal delete-modal fade">
	<div class="modal-dialog modal-confirm">
        <form method="POST" action="{{ route('purchased.cyc.store') }}" enctype="multipart/form-data">
			@csrf
		<div class="modal-content">
			<div class="modal-header flex-column">
				<h5>Manually Purchase CYC</h5>
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
                    


                    <div class="mb-3">
                        <label>CYC</label>
                        <select name="cyc_id" id="cyc_id" class="form-control @error('cyc_id') is-invalid @enderror" required>
                            <option disabled>Select book</option>
                            @foreach ($cycs as $cyc)
                                <option value="{{ $cyc->id }}">{{ $cyc->cyc_title }} {{ $cyc->cyc_year }}</option>
                            @endforeach
                        </select>
    
                        @error('cyc_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>


                    <div class="mb-3">
                        <label>Price</label>
                        <input type="number" id="price" name="price" class="form-control @error('price') is-invalid @enderror" value="3000" required>
    
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