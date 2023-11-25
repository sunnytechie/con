@extends('layouts.v23')
@section('content')

 <!-- Row -->
 <div class="row row-sm">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h3 class="card-title">Notifications</h3>
                <a class="btn btn-default" href="{{ route('notifications.create') }}" data-bs-effect="effect-scale"> <span><i class="fa fa-plus-circle px-2" aria-hidden="true"></i></span> Compose </a>
            </div>


            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                        <thead>
                            <tr>
                                <th class="class="wd-25 border-bottom-0 ps-2">ID</th>
                                <th class="class="wd-25 border-bottom-0 ps-2">Title</th>
                                <th class="class="wd-25 border-bottom-0 ps-2">Pushed At</th>
                                <th class="class="wd-25 border-bottom-0 ps-2 ps-2">Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($notifications as $notification)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $notification->title }} </td>
                                <td>{{ Carbon\Carbon::parse($notification->created_at)->format('d-m-Y') }} </td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <form style="margin: 0; padding: 0" method="post" action="{{ route('notifications.destroy', $notification->id) }}">
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

