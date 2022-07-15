<!-- Modal HTML -->
<div style="z-index: 9999" id="generate" class="modal delete-modal fade">
	<div class="modal-dialog modal-confirm">
        <form method="POST" action="#" enctype="multipart/form-data">
			@csrf
		<div class="modal-content">
			<div class="modal-header flex-column">
				<h5>Generate Report on table</h5>
			</div>
			<div style="text-align: left" class="modal-body">
				<label>Range From</label>
                  <div class="mb-0">
                    	<input type="date" id="selectDateFrom" name="selectDateFrom" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>

							@error('name')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
					</div>
			</div>
            <div style="text-align: left" class="modal-body">
				<label>Range To</label>
                  <div class="mb-3">
                    	<input type="date" id="selectDateTo" name="selectDateTo" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>

							@error('name')
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