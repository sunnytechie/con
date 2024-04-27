@extends('layouts.v23')
@section('content')

 <!-- Row -->
 <div class="row row-sm">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h3 class="card-title">Feedback Recieved</h3>

                <div class="btn-group" role="group" aria-label="Basic example">
                    <div class="dropdown">
                        <form id="all" action="{{ route('export.feedbacks') }}" method="POST">@csrf<input type="hidden" id="tag" name="tag" value="all"></form>
                        <form id="thismonth" action="{{ route('export.feedbacks') }}" method="POST">@csrf<input type="hidden" id="tag" name="tag" value="thismonth"></form>
                        <button class="btn btn-info modal-effect dropdown-toggle" data-bs-effect="effect-scale" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                          Download Report
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                          <li><button type="submit" form="thismonth" class="dropdown-item">This Month</button></li>
                          <li><button type="submit" form="all" class="dropdown-item">All Report</button></li>
                        </ul>
                    </div>
                </div>
            </div>


            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                        <thead>
                            <tr>
                                <th class="wd-25 border-bottom-0 ps-2">ID</th>
                                <th class="wd-25 border-bottom-0 ps-2">Feedback type</th>
                                <th class="wd-25 border-bottom-0 ps-2">Name</th>
                                <th class="wd-25 border-bottom-0 ps-2">Email</th>
                                <th class="wd-25 border-bottom-0 ps-2">Message</th>
                                <th class="wd-25 border-bottom-0 ps-2">Created At</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($feedbacks as $feedback)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td class="text-left px-4"><span class="text-xs font-weight-bold">{{ $i++ }}</span></td>
                                <td> {{ $feedback->feedback_type }} </td>
                                <td> {{ $feedback->user_fullname }} </td>
                                <td> {{ $feedback->user_email }} </td>
                                <td> {{ $feedback->feedback_msg }} </td>
                                <td> {{ $feedback->created_at->diffForHumans() }} </td>
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
