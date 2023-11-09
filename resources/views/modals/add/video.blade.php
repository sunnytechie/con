
                    <div class="mb-3 mt-2">
                        <label>Title</label>
                    	<input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" placeholder="Provide a name" required>

							@error('title')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
					</div>

                    <div class="mb-3">
                        <label>Category</label>
                        <select name="category_id" class="form-control @error('category_id') is-invalid @enderror" required>
                            <option value="">Select a category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                            @endforeach
                        </select>

                        @error('category_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Video Cover Thumbnail/Picture</label>
                        <input name="thumbnail" class="form-control @error('thumbnail') is-invalid @enderror" placeholder="provide url for thumbnail" type="url" id="thumbnail">

                            @error('thumbnail')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    {{-- <div class="mb-3">
                        <label for="video">Video (Optional if you're providing a URL)</label>
                        <input name="video" class="form-control @error('video') is-invalid @enderror" type="file" id="video">

                            @error('video')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div> --}}

                    <div class="mb-3">
                        <label>Youtube video URL</label>
                        <input name="url" class="form-control @error('url') is-invalid @enderror" type="text" id="url" placeholder="Provide a URL">

                            @error('url')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    <div class="mb-3">
                        <label>Description</label>
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" placeholder="Provide a description" required></textarea>

                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    <div class="mb-3">
                        <label>Duration (Format 00:00)</label>
                        <input name="duration" class="form-control @error('duration') is-invalid @enderror" type="text" id="duration" placeholder="Provide a duration" required>

                            @error('duration')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    <div class="mb-3">
                        <label>Downloadable</label>
                        <select name="downloadable" class="form-control @error('downloadable') is-invalid @enderror" required>
                            <option value="">Select a status</option>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>

                        @error('downloadable')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Send Notification</label>
                        <select name="notification" class="form-control @error('notification') is-invalid @enderror" required>
                            <option value="">Select a status</option>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>

                        @error('notification')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
