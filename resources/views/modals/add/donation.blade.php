

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

					<div class="mb-2">
                        <label>Province</label>
                        <select name="province" id="province" class="form-control">
                            <option selected>Select</option>
                            @foreach ($provinces as $province)
                            <option
                            value="{{ $province->id }}">{{ $province->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-12">
                        <label for="diocese">Diocese</label>
                        <select name="diocese" id="diocese" class="form-control">
                            <option selected>Select</option>
                            @foreach ($dioceses as $diocese)
                            <option
                             value="{{ $diocese->id }}">{{ $diocese->name }}</option>
                            @endforeach
                        </select>
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

