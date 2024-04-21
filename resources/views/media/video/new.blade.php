@extends('layouts.v23')
@section('content')
     <!-- Row -->
 <div class="row row-sm">
    <div class="col-md-6 offset-md-2">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Upload Video</h3>
            </div>

            <div class="card-body">
                <form style="margin: 0; padding: 0" method="POST" action="{{ route('video.store') }}" enctype="multipart/form-data">
                    @csrf

                        @include('modals.add.video')

                        <div class="form-btn">
                            <button type="submit" class="btn btn-primary">Publish</button>
                        </div>

                </form>
            </div>

        </div>
    </div>
</div>
<!-- End Row -->
@endsection
