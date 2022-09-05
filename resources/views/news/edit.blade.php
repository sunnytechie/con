@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">

    <div class="row">
      <div class="col-md-8 offset-md-1">
          <div class="card mb-4">
            
            <div class="card-header d-flex justify-content-between pb-0">
              <h6>Edit News</h6>
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
              <form method="POST" action="{{ route('news.update', $newsId) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="form-group">
                  <label for="title">Title</label>
                  <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" value="{{ $newsTitle ?? old('title') }}" name="title" placeholder="Title">

                  @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>

                
                <div class="form-group">
                  <label for="url">Url</label>
                  <input type="text" class="form-control @error('url') is-invalid @enderror" id="url" value="{{ $newsUrl ?? old('url') }}" name="url" placeholder="Url">
                  @error('url')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>

                
                <div class="form-group">
                  <label for="news_date">News date</label>
                  <input type="date" class="form-control @error('news_date') is-invalid @enderror" value="{{ $newsDate ?? old('news_date') }}" id="news_date" name="news_date" placeholder="date">

                  @error('news_date')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                
                <div class="form-group">
                  <label for="author">Author</label>
                  <input type="text" class="form-control @error('author') is-invalid @enderror" value="{{ $newsAuthor ?? old('author') }}" id="author" name="author" placeholder="Author">

                  @error('author')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                
                               
                <div class="form-group">
                  <label for="thumbnail">Thumbnail</label>
                  <input type="file" class="form-control @error('thumbnail') is-invalid @enderror" id="thumbnail" name="thumbnail">

                  @error('thumbnail')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                
                <div class="form-group">
                  <label for="details">Body</label>
                  <textarea class="form-control @error('details') is-invalid @enderror" id="myeditorinstance" name="details" rows="3">{{ $newsDetails ?? old('details') }}</textarea>

                  @error('detail')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                
                <div class="btn-group" role="group" aria-label="Button group">
                  <a href="{{ route('news.index') }}" class="btn btn-info">Back</a>
                  <button type="submit" class="btn btn-success">Update</button>
                </div>
                

              </form>
            </div>
          </div>
        </div>
      </div>

    @include('footer.nonguest')
  </div>
@endsection