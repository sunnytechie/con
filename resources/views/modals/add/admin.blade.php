<!-- Modal HTML -->
<div style="z-index: 9999" id="newAccount" class="modal delete-modal fade">
	<div class="modal-dialog modal-confirm">
        <form method="POST" action="{{ route('admin.store') }}" enctype="multipart/form-data">
			@csrf
		<div class="modal-content">
			<div class="modal-header flex-column">
				<h5>Create new account</h5>
			</div>
			<div style="text-align: left" class="modal-body">
				<label>Name</label>
                  <div class="mb-3">
                    	<input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Provide a Name" required>

							@error('name')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
					</div>
                    
                    {{-- Hide is_admin --}}
                    <input type="hidden" name="is_admin" value="1">
                    
                   
                    <div class="mb-3">
                        <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="Enter email" required>
    
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    
                    <div class="mb-3">
                        <select name="role" id="role" class="form-control @error('role') is-invalid @enderror">
                            <option value="">Select Role</option>
                            <option value="admin">Admin</option>
                            <option value="finance">Finance Control</option>
                            <option value="db">Database Officer</option>
                            <option value="ict">ICT Control</option>
                        </select>
    
                        @error('role')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    
                    <div class="mb-3">
                        <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" placeholder="Enter password" required>
    
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>


			</div>
			<div class="modal-footer justify-content-center">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
				<button type="submit" class="btn btn-success">Create</button>
			</div>
		</div>
        </form>
	</div>
</div> 