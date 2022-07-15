<!-- Modal HTML -->
<div style="z-index: 9999" id="addDonation" class="modal delete-modal fade">
	<div class="modal-dialog modal-confirm">
        <form method="POST" action="{{ route('donations.store') }}" enctype="multipart/form-data">
			@csrf
		<div class="modal-content">
			<div class="modal-header flex-column">
				<h5>New Donation</h5>
			</div>
			<div style="text-align: left" class="modal-body">
				
                  <div class="mb-3">
					<label>Name</label>
                    	<input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Full Name" required>

							@error('name')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
					</div>
					
					<div class="mb-3">
						<label>Email</label>
						<input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="Email" required>
							@error('email')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
					</div>

					
					<div class="mb-3">
						<label>Currency</label>
						<select class="form-control" name="currency" id="currency" required>
							<option value="">Select Currency</option>
							<option selected value="NGN">NGN</option>
							<option value="USD">USD</option>
							<option value="EUR">EUR</option>
							<option value="GBP">GBP</option>
							<option value="AUD">AUD</option>
							<option value="CAD">CAD</option>
							<option value="CHF">CHF</option>
							<option value="CNY">CNY</option>
							<option value="CZK">CZK</option>
							<option value="DKK">DKK</option>
							<option value="HKD">HKD</option>
							<option value="HUF">HUF</option>
							<option value="IDR">IDR</option>
							<option value="ILS">ILS</option>
							<option value="INR">INR</option>
							<option value="JPY">JPY</option>
							<option value="KRW">KRW</option>
							<option value="MYR">MYR</option>
							<option value="MXN">MXN</option>
							<option value="NOK">NOK</option>
							<option value="NZD">NZD</option>
							<option value="PHP">PHP</option>
							<option value="RUB">RUB</option>

						</select>
					</div>

					<div class="mb-3">
						<label>Amount</label>
						<input type="number" id="amount" name="amount" class="form-control @error('amount') is-invalid @enderror" value="{{ old('amount') }}" placeholder="Amount" required>
							@error('amount')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
					</div>

					
					<div class="mb-3">
						<label>Method</label>
						<select class="form-control" name="method" id="method" required>
							<option value="">Select Method</option>
							<option selected value="FlutterWave">FlutterWave</option>
							<option value="Paypal">Paypal</option>
							<option value="Bank">Bank</option>
							<option value="Cash">Cash</option>
							<option value="Other">Other</option>
						</select>
					</div>

					
					<div class="mb-3">
						<label>Reference</label>
						<input type="text" id="reference" name="reference" class="form-control @error('reference') is-invalid @enderror" value="{{ old('reference') }}" placeholder="Reference" required>
							@error('reference')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
					</div>

					<div class="mb-3">
						<label>Province</label>
						<input type="text" id="province" name="province" class="form-control @error('province') is-invalid @enderror" value="{{ old('province') }}" placeholder="province" required>
							@error('province')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
					</div>

					
					<div class="mb-3">
						<label>Diocese</label>
						<input type="text" id="diocese" name="diocese" class="form-control @error('diocese') is-invalid @enderror" value="{{ old('diocese') }}" placeholder="diocese" required>
							@error('diocese')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
					</div>

					<div class="mb-3">
						<label>Reason</label>
						<textarea id="reason" name="reason" class="form-control @error('reason') is-invalid @enderror" value="{{ old('reason') }}" placeholder="reason" required></textarea>
							@error('reason')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
					</div>

					
			</div>
			<div class="modal-footer justify-content-center">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
				<button type="submit" class="btn btn-success">Submit</button>
			</div>
		</div>
        </form>
	</div>
</div> 