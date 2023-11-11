@extends('layouts.v23')

@section('content')


 <!-- Row -->
 <div class="row row-sm">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h3 class="card-title">Daily Fountains</h3>
                <a class="btn btn-default modal-effect" href="#new" data-bs-effect="effect-scale" data-bs-toggle="modal"> <span><i class="fa fa-plus-circle px-2" aria-hidden="true"></i></span> New </a>
            </div>

            <!-- MODAL EFFECTS -->
            <div class="modal fade" id="new">

                <div class="modal-dialog modal-dialog-centered" role="document">

                    <div class="modal-content modal-content-demo">
                        <form style="margin: 0; padding: 0" method="POST" action="{{ route('studies.store') }}" enctype="multipart/form-data">
                            @csrf
                        <div class="modal-header">
                            <h6 class="modal-title">Daily Fountains</h6><button type="button" aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">

                            @include('modals.add.fountain')

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Publish</button>
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>


            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                        <thead>
                            <tr>
                                <th class="wd-25 border-bottom-0 ps-2">ID</th>
                                <th class="wd-25 border-bottom-0 ps-2">Topic</th>
                                <th class="wd-25 border-bottom-0 ps-2">Study Date</th>
                                <th class="wd-25 border-bottom-0 ps-2">Devotional</th>
                                {{-- <th class="wd-25 border-bottom-0 ps-2">Price</th> --}}
                                <th class="wd-25 border-bottom-0 ps-2 ps-2">Created</th>
                                <th class="wd-25 border-bottom-0 ps-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i=1;
                            @endphp
                            @foreach ($studies as $book)
                            <tr>
                                 <td> {{ $i++ }} </td>

                                 <td>{{ Illuminate\Support\Str::limit($book->topic, 35) }} </td>

                                 <td>{{ date('l, d F Y', strtotime($book->study_date)) }} </td>

                                 <td>{{ $book->study_type_name }} {{ $book->study_year }} </td>
                                 {{-- <td>{{ $book->price }} </td> --}}
                                 <td>{{ $book->created_at->diffForHumans() }} </td>


                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="{{ route('studies.editFountain', $book->id) }}" class="btn btn-sm btn-warning"><i class="fe fe-edit-3"></i> Edit</a>

                                        <form style="margin: 0; padding: 0" method="post" action="{{ route('studies.destroy', $book->id) }}">
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
