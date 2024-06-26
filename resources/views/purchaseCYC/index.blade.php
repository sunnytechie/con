@extends('layouts.v23')
@section('content')

 <!-- Row -->
 <div class="row row-sm">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h3 class="card-title">CYC Puchased Payments</h3>
                <div class="btn-group" role="group" aria-label="Basic example">
                    <div class="dropdown">
                        <form id="all" action="{{ route('export.cyc') }}" method="POST">@csrf<input type="hidden" id="tag" name="tag" value="all"></form>
                        <form id="thismonth" action="{{ route('export.cyc') }}" method="POST">@csrf<input type="hidden" id="tag" name="tag" value="thismonth"></form>
                        <button class="btn btn-info modal-effect dropdown-toggle" data-bs-effect="effect-scale" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                          Download Report
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                          <li><button type="submit" form="thismonth" class="dropdown-item">This Month</button></li>
                          <li><button type="submit" form="all" class="dropdown-item">All Report</button></li>
                        </ul>
                    </div>
                    <a class="btn btn-default modal-effect" href="#newPurchase" data-bs-effect="effect-scale" data-bs-toggle="modal"> <span><i class="fa fa-plus-circle px-2" aria-hidden="true"></i></span> Purchase manually </a>
                </div>
            </div>

            <!-- MODAL EFFECTS -->
            <div class="modal fade" id="newPurchase">

                <div class="modal-dialog modal-dialog-centered" role="document">

                    <div class="modal-content modal-content-demo">
                        <form style="margin: 0; padding: 0" method="POST" action="{{ route('purchased.cyc.store') }}" enctype="multipart/form-data">
                            @csrf
                        <div class="modal-header">
                            <h6 class="modal-title">Manual purchase</h6><button type="button"aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label>Email</label>
                                <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter email" required>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="mb-3">
                                <label>Price</label>
                                <input type="number" id="price" name="price" class="form-control @error('price') is-invalid @enderror" value="3000" required>

                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
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

                                <th class="class="wd-25 border-bottom-0 ps-2">ID</th>
                                <th class="class="wd-25 border-bottom-0 ps-2">Email</th>
                                <th class="class="wd-25 border-bottom-0 ps-2">Transaction Ref</th>
                                <th class="class="wd-25 border-bottom-0 ps-2 ps-2">Purchased time</th>
                                <th class="class="wd-25 border-bottom-0 ps-2 ps-2">Option</th>

                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($purchasedCycs as $item)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $item->email }} </td>
                                <td>{{ $item->transaction_ref }} </td>
                                <td>{{ $item->created_at->diffForHumans() }} </td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        {{-- <a href="{{ route('payments.edit', $purchase->id) }}" type="button" class="btn btn-sm btn-warning"><i class="fe fe-edit-3"></i> Edit</a> --}}
                                        <form style="margin: 0; padding: 0" method="post" action="{{ route('purchased.cyc.destory', $item->id) }}">
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

