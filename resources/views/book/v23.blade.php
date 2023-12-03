@extends('layouts.v23')
@section('content')

 <!-- Row -->
 <div class="row row-sm">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h3 class="card-title">PDFs</h3>
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a class="btn btn-default modal-effect" href="#new" data-bs-effect="effect-scale" data-bs-toggle="modal"> <span><i class="fa fa-plus-circle px-2" aria-hidden="true"></i></span> PDF </a>
                    <a class="btn btn-default modal-effect" href="#category" data-bs-effect="effect-scale" data-bs-toggle="modal"> <span><i class="fa fa-plus-circle px-2" aria-hidden="true"></i></span> Category </a>
                    <a class="btn btn-default modal-effect" href="#subcategory" data-bs-effect="effect-scale" data-bs-toggle="modal"> <span><i class="fa fa-plus-circle px-2" aria-hidden="true"></i></span> Subcategory </a>
                </div>
            </div>

            <!-- MODAL EFFECTS -->
            @include('modals.add.newbook')
            @include('modals.add.book_category')
            @include('modals.add.book_sub_category')


            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                        <thead>
                            <tr>
                                <th class="wd-25p border-bottom-0">ID</th>
                                <th class="wd-25 border-bottom-0 ps-2">Title</th>
                                <th class="wd-25 border-bottom-0 ps-2">Tag</th>
                                {{-- <th class="wd-25 border-bottom-0 ps-2">Description</th>
                                <th class="wd-25 border-bottom-0">Author</th>
                                <th class="wd-25 border-bottom-0 ps-2">Category</th>
                                <th class="wd-25 border-bottom-0 ps-2">Sub Category</th> --}}
                                <td class="wd-25 border-bottom-0 ps-2">Options</td>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($books as $book)
                            <tr>
                                <td>{{ $i++ }}. <img width="30px" width="30px" src="/storage/{{ $book->image }}" alt=""></td>
                                <td>{{ $book->title }}</td>
                                <td>{{ $book->tag }}</td>
                                {{-- <td>{{ Illuminate\Support\Str::limit($book->description, 35) }}</td>
                                <td>{{ Illuminate\Support\Str::limit($book->author, 35) }}</td>
                                <td>{{ $book->bookcategory->title }}</td>
                                <td>{{ $book->booksubcategory->title }}</td> --}}
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="{{ route('books.edit', $book->id) }}" class="btn btn-sm btn-warning"><i class="fe fe-edit-3"></i> Edit</a>

                                        <form style="margin: 0; padding: 0" method="post" action="{{ route('books.destroy', $book->id) }}">
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
