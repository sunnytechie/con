
                    <div class="mb-4">
                        <label for="title">Title</label>
                    	<input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" placeholder="Provide a name" required>

							@error('title')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
					</div>

                    <div class="mb-4">
                        <label for="category_id">Category</label>
                        <select id="category_id" name="category_id" class="form-control @error('category_id') is-invalid @enderror" required>
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

                    <div class="mb-4">
                        <label for="thumbnail">Video Cover Thumbnail/Picture</label>
                        <input name="thumbnail" class="form-control @error('thumbnail') is-invalid @enderror" placeholder="provide url for thumbnail" type="url" id="thumbnail">

                            @error('thumbnail')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    <div class="mb-3">
                        <label for="video">Video (Optional if you're providing a URL)</label>
                        <input name="video" accept=".mp4" class="form-control @error('video') is-invalid @enderror" type="file" id="video">

                            @error('video')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    <div class="mb-4">
                        <label for="url">Youtube video ID</label>
                        <input name="url" class="form-control @error('url') is-invalid @enderror" type="text" id="url" placeholder="8954bghjb">

                            @error('url')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    <div class="mb-4">
                        <label for="description">Description</label>
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" placeholder="Provide a description" required></textarea>

                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    <div class="mb-4">
                        <label for="duration">Duration (Format 00:00)</label>
                        <input name="duration" class="form-control @error('duration') is-invalid @enderror" type="text" id="duration" placeholder="Provide a duration" required>

                            @error('duration')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    {{-- <div class="mb-4">
                        <label for="downloadable">Downloadable</label>
                        <select id="downloadable" name="downloadable" class="form-control @error('downloadable') is-invalid @enderror" required>
                            <option value="">Select a status</option>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>

                        @error('downloadable')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div> --}}

                    <div class="mb-4">
                        <label for="notification">Send Notification</label>
                        <select id="notification" name="notification" class="form-control @error('notification') is-invalid @enderror" required>
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
