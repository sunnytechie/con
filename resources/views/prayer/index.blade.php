@extends('layouts.v23')
@section('content')

 <!-- Row -->
 <div class="row row-sm">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h6>Prayer Requests Recieved</h6>
                <a href="{{ route('prayers.export') }}" class="btn btn-default" type="button">Download report</a>
            </div>


            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                        <thead>
                            <tr>
                                <th class="wd-25 border-bottom-0 ps-2">ID</th>
                                <th class="wd-25 border-bottom-0 ps-2">Name</th>
                                <th class="wd-25 border-bottom-0 ps-2 ps-2">Phone</th>
                                <th class="wd-25 border-bottom-0 ps-2 ps-2">Email</th>
                                <th class="wd-25 border-bottom-0 ps-2 ps-2">Title</th>
                                <th class="wd-25 border-bottom-0 ps-2 ps-2">Prayer Request</th>
                                <th class="wd-25 border-bottom-0 ps-2 ps-2">Created At</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($prayers as $prayer)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td> <p class="text-sm font-weight-bold mb-0">  </p> {{ $prayer->fullname }} </td>
                                <td> <p class="text-sm font-weight-bold mb-0">  </p> {{ $prayer->phone }} </td>
                                <td> <p class="text-sm font-weight-bold mb-0">  </p> {{ $prayer->email }} </td>

                                <td> <p class="text-sm font-weight-bold mb-0">  </p> {{ $prayer->title }} </td>
                                <td> <p class="text-sm font-weight-bold mb-0">  </p> {{ $prayer->prayer_request }} </td>
                                <td> <p class="text-sm font-weight-bold mb-0">  </p> {{ $prayer->created_at->diffForHumans() }} </td>

                                <td><a href="{{ route('prayers.show', $prayer->id) }}" class="btn btn-success btn-sm mt-2" type="button">Respond to request</a></td>
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
