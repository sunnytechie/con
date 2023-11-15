@extends('layouts.v23')
@section('content')
 <!-- Row -->
 <div class="row row-sm">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h3 class="card-title">Donations</h3>
                <a class="btn btn-default modal-effect" href="#new" data-bs-effect="effect-scale" data-bs-toggle="modal"> <span><i class="fa fa-plus-circle px-2" aria-hidden="true"></i></span> Manual Donation </a>
            </div>

            <!-- MODAL EFFECTS -->
            <div class="modal fade" id="new">

                <div class="modal-dialog modal-dialog-centered" role="document">

                    <div class="modal-content modal-content-demo">
                        <form style="margin: 0; padding: 0" method="POST" action="{{ route('donations.store') }}" enctype="multipart/form-data">
                            @csrf
                        <div class="modal-header">
                            <h6 class="modal-title">New Donation</h6><button type="button" aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">

                            @include('modals.add.donation')

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Save</button>
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
                                <th class="wd-25p border-bottom-0">ID</th>
                                <th class="wd-25p border-bottom-0">Name</th>
                                <th class="wd-25p border-bottom-0">Email</th>
                                {{-- <th class="wd-25p border-bottom-0">Reason</th> --}}
                                <th class="wd-25p border-bottom-0">Province</th>
                                <th class="wd-25p border-bottom-0">Diocese</th>
                                <th class="wd-25p border-bottom-0">Currency</th>
                                <th class="wd-25p border-bottom-0">Amount</th>
                                <th class="wd-25p border-bottom-0">Method</th>
                                <th class="wd-25p border-bottom-0">Created</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($donations as $donation)
                        <tr>
                        <td>{{ $i++ }}
                        </td>

                        <td>
                            {{ $donation->name }}
                        </td>
                        <td>
                            <a href="mailto:  {{ $donation->email }}">  {{ $donation->email }}</a>
                        </td>


                      <td>
                        {{ $donation->province }}
                    </td>

                    <td>
                        {{ $donation->diocese }}
                    </td>

                    <td>
                        {{ $donation->currency }}
                    </td>

                    <td>
                        {{ $donation->amount }}
                    </td>

                    <td>
                        {{ $donation->method }}
                    </td>

                    <td>
                        {{ $donation->created_at->diffForHumans() }}
                    </td>

                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">

                            <form style="margin: 0; padding: 0" method="post" action="{{ route('donations.destroy', $donation->id) }}">
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

