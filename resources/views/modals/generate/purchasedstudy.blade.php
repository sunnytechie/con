<!-- Modal HTML -->
<div style="z-index: 9999" id="generatePurchasedStudy" class="modal delete-modal fade">
	<div class="modal-dialog modal-confirm">
        <form method="POST" action="{{ route('purchase.studies.rangeSearch') }}">
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
                        <label>Devotional Section</label>
                        <select name="study_category" id="study_category" class="form-control @error('study_category') is-invalid @enderror" required>
                            <option disabled selected>Select study</option>
                            <option value="Bible Study">Bible Study</option>
                            <option value="Daily Fountain">Daily Fountain</option>
                            <option value="Daily Dynamite">Daily Dynamite</option>
                        </select>
    
                        @error('study_category')
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