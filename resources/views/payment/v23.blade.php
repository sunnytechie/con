@extends('layouts.v23')
@section('content')

 <!-- Row -->
 <div class="row row-sm">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h3 class="card-title">Books/Materials Payments Report</h3>

                <div class="btn-group" role="group" aria-label="Basic example">
                <a class="btn btn-default modal-effect" href="#report" data-bs-effect="effect-scale" data-bs-toggle="modal"> <span><i class="fa fa-filter px-2" aria-hidden="true"></i></span> Filter Report </a>
                <a class="btn btn-default modal-effect" href="#newPurchase" data-bs-effect="effect-scale" data-bs-toggle="modal"> <span><i class="fa fa-plus-circle px-2" aria-hidden="true"></i></span> Purchase manually </a>
                </div>
            </div>

            <!-- MODAL EFFECTS -->
            <div class="modal fade" id="newPurchase">

                <div class="modal-dialog modal-dialog-centered" role="document">

                    <div class="modal-content modal-content-demo">
                        <form style="margin: 0; padding: 0" method="POST" action="{{ route('payments.store') }}" enctype="multipart/form-data">
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

                            {{-- Select books tile, price and book id --}}
                            <div class="mb-3">
                                <label>Book title</label>
                                <select name="book_id" id="book_id" class="form-control @error('book_id') is-invalid @enderror" required>
                                    <option value="">Select book</option>
                                    @foreach ($books as $book)
                                        <option value="{{ $book->id }}">{{ $book->title }} ({{ $book->price }})</option>
                                    @endforeach
                                </select>

                                @error('book_id')
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
                        <form style="margin: 0; padding: 0" method="POST" action="{{ route('payments.search') }}" enctype="multipart/form-data">
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
                                <label>Book title</label>
                                <select name="book" id="book" class="form-control @error('book') is-invalid @enderror">
                                    <option value="">Select book</option>
                                    @foreach ($books as $book)
                                        <option
                                        @if ($book->id == $bk)
                                            selected
                                        @endif
                                         value="{{ $book->id }}">{{ $book->title }}</option>
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
                                <th class="wd-25 border-bottom-0">Book title</th>
                                <th class="wd-25 border-bottom-0 ps-2">User email</th>
                                <th class="wd-25 border-bottom-0 ps-2">Price</th>
                                <th class="wd-25 border-bottom-0 ps-2">Transaction ref</th>
                                <th class="wd-25 border-bottom-0 ps-2">Date created</th>
                                <td class="wd-25 border-bottom-0 ps-2">Options</td>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($purchasedBooks as $purchase)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $purchase->book_title }}</td>
                                <td>{{ $purchase->email }}</td>
                                <td>{{ $purchase->price }}</td>
                                <td>{{ $purchase->transaction_ref ?? "Manual" }}</td>
                                <td>{{ $purchase->created_at->diffForHumans() }}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        {{-- <a href="{{ route('payments.edit', $purchase->id) }}" type="button" class="btn btn-sm btn-warning"><i class="fe fe-edit-3"></i> Edit</a> --}}
                                        <form style="margin: 0; padding: 0" method="post" action="{{ route('payments.destroy', $purchase->id) }}">
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
