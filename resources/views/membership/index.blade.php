@extends('layouts.v23')
@section('content')

 <!-- Row -->
 <div class="row row-sm">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h3 class="card-title">{{ $memberships->count() }} - Memberships</h3>

                <div class="btn-group" role="group" aria-label="Basic example">
                    <a class="btn btn-default modal-effect" href="#report" data-bs-effect="effect-scale" data-bs-toggle="modal"> <span><i class="fa fa-filter px-2" aria-hidden="true"></i></span> Filter Report </a>
                </div>
            </div>

            <div class="modal fade" id="report">

                <div class="modal-dialog modal-dialog-centered" role="document">

                    <div class="modal-content modal-content-demo">
                        <form style="margin: 0; padding: 0" method="POST" action="{{ route('memberships.search') }}" enctype="multipart/form-data">
                            @csrf
                        <div class="modal-header">
                            <h6 class="modal-title">Filter</h6>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <button type="button" onclick="clearModalInputs()" class="btn btn-default btn-sm" style="background-color: #aaa">Clear Input</button>
                                <button type="button" aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                            </div>
                        </div>

                        <div class="modal-body">

                            <div class="mb-2">
                                <label>Province</label>
                                <select name="province" id="province" class="form-control">
                                    <option value="" selected>Select</option>
                                    @foreach ($provinces as $province)
                                    <option
                                    @if ($province->id == $prov)
                                    selected
                                    @endif
                                    value="{{ $province->id }}">{{ $province->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-12">
                                <label for="diocese">Diocese</label>
                                <select name="diocese" id="diocese" class="form-control">
                                    <option value="" selected>Select</option>
                                    @foreach ($dioceses as $diocese)
                                    <option
                                    @if ($diocese->id == $dio)
                                    selected
                                    @endif
                                     value="{{ $diocese->id }}">{{ $diocese->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Filter</button>
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
                                <th class="wd-25 border-bottom-0 ps-2">Full Name</th>
                                <th class="wd-25 border-bottom-0 ps-2 ps-2">Email</th>
                                <th class="wd-25 border-bottom-0 ps-2 ps-2">Phone</th>
                                <th class="wd-25 border-bottom-0 ps-2 ps-2">Email2</th>
                                <th class="wd-25 border-bottom-0 ps-2 ps-2">State</th>
                                <th class="wd-25 border-bottom-0 ps-2 ps-2">Diocese</th>
                                <th class="wd-25 border-bottom-0 ps-2 ps-2">Province</th>
                                <th class="wd-25 border-bottom-0 ps-2 ps-2">Street</th>
                                <th class="wd-25 border-bottom-0 ps-2 ps-2">City</th>
                                <th class="wd-25 border-bottom-0 ps-2 ps-2">Date of Birth</th>
                                <th class="wd-25 border-bottom-0 ps-2 ps-2">Local Church Address</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                      $i = 1;
                    @endphp
                            @foreach ($memberships as $membership)
                            <tr>
                                <td>{{ $i++ }}
                                    <td>{{ $membership->fullname }} </td>
                                    <td>{{ $membership->email }} </td>
                                    <td>{{ $membership->phone }} </td>
                                    <td>{{ $membership->email2 }} </td>
                                    <td>{{ $membership->state }} </td>
                                    <td>{{ $membership->diocease }} </td>
                                    <td>{{ $membership->province }} </td>
                                    <td>{{ $membership->street }} </td>
                                    <td>{{ $membership->city }} </td>
                                    <td>{{ $membership->date_of_birth }} </td>
                                    <td>{{ $membership->local_church_address }} </td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        {{-- <a href="#" class="btn btn-sm btn-warning"><i class="fe fe-edit-3"></i> Edit</a> --}}

                                        <form style="margin: 0; padding: 0" method="post" action="{{ route('memberships.destroy', $membership->id) }}">
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
