
              {{-- @include('modals.generate.purchasedstudy') --}}
              {{-- @include('modals.add.purchasedstudy') --}}




@extends('layouts.v23')
@section('content')

 <!-- Row -->
 <div class="row row-sm">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h3 class="card-title">{{ $purchasedstudies->count() }} - Daily Fountain, Dynamite and Bible Study</h3>
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a class="btn btn-default modal-effect" href="#report" data-bs-effect="effect-scale" data-bs-toggle="modal"> <span><i class="fa fa-filter px-2" aria-hidden="true"></i></span> Filter Report </a>
                    <a class="btn btn-default modal-effect" href="#newPurchase" data-bs-effect="effect-scale" data-bs-toggle="modal"> <span><i class="fa fa-plus-circle px-2" aria-hidden="true"></i></span> Purchase manually </a>
                </div>
                </div>

            <!-- MODAL EFFECTS -->
            <div class="modal fade" id="newPurchase">

                <div class="modal-dialog modal-dialog-centered" role="document">

                    <div class="modal-content modal-content-demo">
                        <form style="margin: 0; padding: 0" method="POST" action="{{ route('purchase.studies.store') }}" enctype="multipart/form-data">
                            @csrf
                        <div class="modal-header">
                            <h6 class="modal-title">Manual book purchase</h6><button type="button"aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
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

                            {{-- Select Study tile, price and book id --}}
                            <div class="mb-3">
                                <label>Devotional</label>
                                <select name="study_id" id="study_id" class="form-control @error('study_id') is-invalid @enderror" required>
                                    <option disabled selected>Select book</option>
                                    <option value="2">Bible Study</option>
                                    <option value="1">Daily Fountain</option>
                                    <option value="3">Daily Dynamite</option>
                                </select>

                                @error('study_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label>Valid through</label>
                                <select name="valid_year" id="valid_year" class="form-control @error('valid_year') is-invalid @enderror" required>
                                    <option disabled selected>Select book</option>
                                    <option>2022</option>
                                    <option>2023</option>
                                    <option>2024</option>
                                    <option>2025</option>
                                </select>

                                @error('valid_year')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="mb-3">
                                <label>Price</label>
                                <input type="number" id="price" name="price" class="form-control @error('price') is-invalid @enderror" value="500" required>

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

            <div class="modal fade" id="report">

                <div class="modal-dialog modal-dialog-centered" role="document">

                    <div class="modal-content modal-content-demo">
                        <form style="margin: 0; padding: 0" method="POST" action="{{ route('purchase.studies.search') }}" enctype="multipart/form-data">
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
                                <label>Range From</label>
                                <input type="date" id="from" name="from" value="{{ old('from') ?? $from ?? '' }}" class="form-control">
                            </div>

                            <div class="mb-2">
                                <label>Range To</label>
                                <input type="date" id="to" name="to" value="{{ old('to') ?? $to ?? '' }}" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label>studies</label>
                                <select name="study" id="study" class="form-control @error('study') is-invalid @enderror">
                                    <option value="">Select study</option>
                                    <option value="1">Daily Fountain</option>
                                    <option value="2">Bible Study</option>
                                    <option value="3">Daily Dynamite</option>
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
                                <th class="class="wd-25 border-bottom-0 ps-2">ID</th>
                                <th class="class="wd-25 border-bottom-0 ps-2">Email</th>
                                <th class="class="wd-25 border-bottom-0 ps-2">Title</th>
                                <th class="class="wd-25 border-bottom-0 ps-2">Price</th>
                                <th class="class="wd-25 border-bottom-0 ps-2">Year</th>
                                <th class="class="wd-25 border-bottom-0 ps-2">Transaction Ref</th>
                                <th class="class="wd-25 border-bottom-0 ps-2 ps-2">Purchased time</th>
                                <th class="class="wd-25 border-bottom-0 ps-2 ps-2">Options</th>

                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($purchasedstudies as $purchase)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $purchase->email }}</td>
                                <td>{{ $purchase->study_title }}</td>
                                <td>{{ $purchase->price }}</td>
                                <td>{{ $purchase->valid_year }}</td>
                                <td>{{ $purchase->transaction_ref }}</td>
                                <td>{{ $purchase->created_at->diffForHumans() }}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        {{-- <a href="{{ route('payments.edit', $purchase->id) }}" type="button" class="btn btn-sm btn-warning"><i class="fe fe-edit-3"></i> Edit</a> --}}
                                        <form style="margin: 0; padding: 0" method="post" action="{{ route('purchase.studies.destroy', $purchase->id) }}">
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

