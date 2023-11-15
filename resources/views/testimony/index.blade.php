@extends('layouts.v23')
@section('content')

 <!-- Row -->
 <div class="row row-sm">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h3 class="card-title">Testimonies</h3>
            </div>


            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                        <thead>
                            <tr>
                                <th class="wd-25 border-bottom-0 ps-2">ID</th>
                                <th class="wd-25 border-bottom-0 ps-2">Name</th>
                                <th class="wd-25 border-bottom-0 ps-2">Email</th>
                                <th class="wd-25 border-bottom-0 ps-2">Title</th>
                                <th class="wd-25 border-bottom-0 ps-2">Body</th>
                                <th class="wd-25 border-bottom-0 ps-2">Created At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($testimonies as $testimony)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td> <p class="text-sm font-weight-bold mb-0">  </p> {{ $testimony->fullname }} </td>
                                <td> <p class="text-sm font-weight-bold mb-0">  </p> {{ $testimony->email }} </td>
                                <td> <p class="text-sm font-weight-bold mb-0">  </p> {{ $testimony->title }} </td>
                                <td> <p class="text-sm font-weight-bold mb-0">  </p> {{ Illuminate\Support\Str::limit($testimony->body, 35) }} </td>
                                <td> <p class="text-sm font-weight-bold mb-0">  </p> {{ $testimony->created_at->diffForHumans() }} </td>
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
