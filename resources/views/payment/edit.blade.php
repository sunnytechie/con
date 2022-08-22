@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">

    <div class="row">
        <div class="col-md-8">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Edit Payment</h6>
              {{-- Success Message --}}
            @if (session('success'))
                <div style="position: absolute; right: 30px; top: 20px" class="alert alert-info alert-dismissible fade show" role="alert">
                <strong>{{ session('success') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
            @endif
            </div>
            <div class="card-body p-4">
                <form method="post" action="{{ route('payments.update', $purchasedId) }}">
                    @csrf
                    @method('PUT')

                    <label>Email</label>
                    <div class="mb-3">
                        	<input type="text" disabled id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ $purchasedBookEmail }}" required>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                   
                    <label>Book</label>
                    <div class="mb-3">
                        <select class="form-control @error('book_id') is-invalid @enderror" name="book_id" id="book_id" required>
                            <option value="">Select a book</option>
                            @foreach ($books as $book)
                                <option value="{{ $book->id }}" {{ $book->title == $purchasedBookTitle ? 'selected' : '' }}>{{ $book->title }} ({{ $book->price }})</option>
                            @endforeach
                        </select>
                        @error('book_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                  

                    <div class="btn-group" role="group" aria-label="Button group">
                        <a href="{{ route('payments.index') }}" type="button" class="btn btn-danger" data-dismiss="modal">Back</a>
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </form>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="card mb-4">
              <div class="card-header pb-0">
                  <h6>Total Category</h6>
              </div>
              <div class="card-body p-4">
                  <p>{{ $purchasedBooks->count() }}</p>
              </div>
          </div>
      </div>
      </div>

    @include('footer.nonguest')
  </div>
@endsection