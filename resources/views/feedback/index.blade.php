@extends('layouts.v23')
@section('content')

 <!-- Row -->
 <div class="row row-sm">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h3 class="card-title">Feedback Recieved</h3>
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
