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
                    <a class="btn btn-default modal-effect" href="#Sub Category" data-bs-effect="effect-scale" data-bs-toggle="modal"> <span><i class="fa fa-plus-circle px-2" aria-hidden="true"></i></span> Subcategory </a>
                </div>
            </div>

            <!-- MODAL EFFECTS -->
            <div class="modal fade" id="new">

                <div class="modal-dialog modal-dialog-centered" role="document">

                    <div class="modal-content modal-content-demo">
                        <form style="margin: 0; padding: 0" method="POST" action="{{ route('kidzone.store') }}" enctype="multipart/form-data">
                            @csrf
                        <div class="modal-header">
                            <h6 class="modal-title">New Kids Video</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label>Title</label>
                                <input type="title" id="title" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Enter title" required>

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label>Url</label>
                                <input type="url" id="url" name="url" class="form-control @error('url') is-invalid @enderror" placeholder="Enter url" required>

                                @error('url')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label>Thumbnail</label>
                                <input type="file" id="image" name="image" class="form-control @error('image') is-invalid @enderror" placeholder="Enter image" required>

                                @error('image')
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
                                <th class="wd-25p border-bottom-0">ID</th>
                                <th class="wd-25 border-bottom-0 ps-2">Tag</th>
                                <th class="wd-25 border-bottom-0 ps-2">Description</th>
                                <th class="wd-25 border-bottom-0">Author</th>
                                <th class="wd-25 border-bottom-0 ps-2">Category</th>
                                <th class="wd-25 border-bottom-0 ps-2">Sub Category</th>
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
                                <td>{{ $book->tag }}</td>
                                <td>{{ $book->description }}</td>
                                <td>{{ $book->author }}</td>
                                <td>{{ $book->bookcategory->title }}</td>
                                <td>{{ $book->booksubcategory->title }}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="#edit" type="button" class="btn btn-sm modal-effect btn-warning" data-bs-effect="effect-scale" data-bs-toggle="modal"><i class="fe fe-edit-3"></i> Edit</a>


                                        <!-- MODAL EFFECTS -->
                                        @include('book.edit')

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
