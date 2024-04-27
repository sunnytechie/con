@extends('layouts.v23')
@section('content')
     <!-- Row -->
 <div class="row row-sm">
    <div class="col-md-8 offset-md-2">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Upload Audio</h3>
            </div>

            <div class="card-body">
                <form style="margin: 0; padding: 0" method="POST" action="{{ route('audio.store') }}" enctype="multipart/form-data">
                    @csrf

                        @include('modals.add.audio')

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
