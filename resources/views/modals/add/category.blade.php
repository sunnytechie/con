
                    <div class="mb-3">
					    <label>Title for Category</label>
                    	<input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" placeholder="Give this category a name" required>

							@error('title')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
					</div>

					<div class="mb-3">
						<label>Type of Category</label>
						<select class="form-control" name="type" id="type" required>
							<option disabled>Select type</option>
							<option value="audio">Audio</option>
							<option value="video">Video</option>
							<option value="image">Image</option>
						</select>
					</div>

					<div class="mb-3">
						<input name="thumbnail" class="form-control" type="file" id="thumbnail" required>

							@error('thumbnail')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
					</div>
