@extends('layouts.v23')

@section('content')
<div class="container-fluid py-4">

    <div class="row">
        <div class="col-md-8">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Edit Account</h6>
            </div>
            <div class="card-body p-4">
                <form method="post" action="{{ route('admin.update', $adminId) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label>Admin Name</label>
                        	<input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $adminName ?? old('name') }}" required>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>


                    <div class="mb-3">
                        <label>Admin Role</label>
                        <select name="role" class="form-control @error('role') is-invalid @enderror">
                            <option value="">Select Role</option>
                            <option value="admin" {{ $adminRole == 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="user" {{ $adminRole == 'user' ? 'selected' : '' }}>User</option>
                            <option value="finance" {{ $adminRole == 'finance' ? 'selected' : '' }}>Financial Control</option>
                            <option value="db" {{ $adminRole == 'db' ? 'selected' : '' }}>Database Office</option>
                            <option value="ict" {{ $adminRole == 'ict' ? 'selected' : '' }}>ICT Control</option>
                        </select>
                        @error('role')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>


                    <div class="mb-3">
                        <label>Change Password</label>
                        	<input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" value="{{ $adminPassword ?? old('password') }}" placeholder="New Password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>


                    <div class="mb-3">
                        <label>Email</label>
                        	<input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ $adminEmail ?? old('email') }}" required>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    <div class="btn-group" role="group" aria-label="Button group">
                        <a href="{{ route('admin.index') }}" type="button" class="btn btn-danger" data-dismiss="modal">Back</a>
                        <button type="submit" class="btn btn-success">Publish</button>
                    </div>
                </form>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="card mb-4">
              <div class="card-header pb-0">
                  <h6>Total Accounts</h6>
              </div>
              <div class="card-body p-4">
                  <p>{{ $users->count() }}</p>
              </div>
          </div>


      </div>
      </div>

  </div>
@endsection
