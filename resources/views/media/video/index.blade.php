@extends('layouts.v23')
@section('content')
     <!-- Row -->
 <div class="row row-sm">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h3 class="card-title">Video</h3>
                <a class="btn btn-default" href="{{ route('media.video.create') }}"> <span><i class="fa fa-plus-circle px-2" aria-hidden="true"></i></span> New Video </a>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                        <thead>
                            <tr>
                                <th class="wd-25 border-bottom-0 ps-2">ID</th>
                                <th class="wd-25 border-bottom-0 ps-2">Title</th>
                                <th class="wd-25 border-bottom-0 ps-2 ps-2">Description</th>
                                <td class="wd-25 border-bottom-0 ps-2">Options</td>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($videos as $data)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ Illuminate\Support\Str::limit($data->title, 35) }}</td>
                                <td>{{ Illuminate\Support\Str::limit($data->description, 35) }}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="{{ route('video.edit', $data->id) }}" class="btn btn-sm btn-warning"><i class="fe fe-edit-3"></i> Edit</a>
                                        <!-- MODAL EFFECTS -->

                                        <form style="margin: 0; padding: 0" method="post" action="{{ route('video.destroy', $data->id) }}">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this record?')"><i class="fe fe-trash"></i> Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- End Row -->
@endsection
