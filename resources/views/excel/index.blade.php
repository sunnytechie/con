@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">

    <div class="row">
        <div class="col-12">
          <div class="card mb-4 p-4">
            <div class="card-header d-flex justify-content-between pb-0">
              <h6>Import</h6>
            </div>

            @if (session('success'))
                <div style="position: absolute; right: 30px; top: 20px" class="alert alert-info alert-dismissible fade show" role="alert">
                <strong>{{ session('success') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
            @endif
            
            <div class="card-body mt-3">
              
              <form action="{{ route('user.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="file">User File</label>
                  <input type="file" class="form-control-file" id="file" name="file">
                </div>
                <button type="submit" class="btn btn-primary">Import</button>
              </form>
            </div>

            <div class="card-body mt-3">
              
              <form action="{{ route('media.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="file">Media File</label>
                  <input type="file" class="form-control-file" id="file" name="file">
                </div>
                <button type="submit" class="btn btn-primary">Import</button>
              </form>
            </div>

            <div class="card-body mt-3">
              
              <form action="{{ route('donation.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="file">Donation File</label>
                  <input type="file" class="form-control-file" id="file" name="file">
                </div>
                <button type="submit" class="btn btn-primary">Import</button>
              </form>
            </div>

            <div class="card-body mt-3">
              
              <form action="{{ route('purchasedbook.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="file">Purchase book File</label>
                  <input type="file" class="form-control-file" id="file" name="file">
                </div>
                <button type="submit" class="btn btn-primary">Import</button>
              </form>
            </div>

            <div class="card-body mt-3">
              
              <form action="{{ route('testimony.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="file">Testimony File</label>
                  <input type="file" class="form-control-file" id="file" name="file">
                </div>
                <button type="submit" class="btn btn-primary">Import</button>
              </form>
            </div>

            <div class="card-body mt-3">
              
              <form action="{{ route('membership.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="file">membership File</label>
                  <input type="file" class="form-control-file" id="file" name="file">
                </div>
                <button type="submit" class="btn btn-primary">Import</button>
              </form>

          </div>

          <div class="card-body mt-3">
              
            <form action="{{ route('book.import') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <label for="file">Books File</label>
                <input type="file" class="form-control-file" id="file" name="file">
              </div>
              <button type="submit" class="btn btn-primary">Import</button>
            </form>

        </div>

        <div class="card-body mt-3">
              
          <form action="{{ route('feedback.import') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="file">Feedbacks File</label>
              <input type="file" class="form-control-file" id="file" name="file">
            </div>
            <button type="submit" class="btn btn-primary">Import</button>
          </form>

      </div>


        </div>
      </div>

    @include('footer.nonguest')
  </div>
@endsection