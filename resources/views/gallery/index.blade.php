@extends('layouts.v23')
@section('content')

 <!-- Row -->
 <div class="row row-sm">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h3 class="card-title">Galleries</h3>
                <a class="btn btn-default modal-effect" href="#new" data-bs-effect="effect-scale" data-bs-toggle="modal"> <span><i class="fa fa-plus-circle px-2" aria-hidden="true"></i></span> New </a>
            </div>

            <!-- MODAL EFFECTS -->
            <div class="modal fade" id="new">

                <div class="modal-dialog modal-dialog-centered" role="document">

                    <div class="modal-content modal-content-demo">
                        <form style="margin: 0; padding: 0" method="POST" action="{{ route('media.gallery.store') }}" enctype="multipart/form-data">
                            @csrf
                        <div class="modal-header">
                            <h6 class="modal-title">Upload Image</h6><button type="button" aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">


                            <div class="mb-3">
                                <label>Title(Optional)</label>
                                <input type="title" id="title" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Enter title" required>

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="mb-3">
                                <label>Category</label>
                                <select name="category_id" class="form-control @error('category_id') is-invalid @enderror" required>
                                    <option value="">Select a category</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                                    @endforeach
                                </select>

                                @error('category_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label>Thumbnail/Picture</label>
                                <input name="thumbnail" class="form-control @error('thumbnail') is-invalid @enderror" type="file" id="thumbnail" required>

                                    @error('thumbnail')
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
                                <th class="wd-25 border-bottom-0 ps-2">Image</th>
                                <td class="wd-25 border-bottom-0 ps-2">Options</td>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($galleries as $id => $image)
                            <tr>
                                <td>
                                    {{ $id }}
                                </td>

                                <td>
                                    <div class="d-flex px-2">
                                      <div>
                                        <img src="/storage/{{ $image->image }}" class="avatar avatar-sm rounded-circle me-2" alt="">
                                      </div>
                                      <div class="my-auto">
                                        <h6 class="mb-0 text-sm">{{ $image->title }}</h6>
                                      </div>
                                    </div>
                                </td>

                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        {{-- <a href="#" class="btn btn-sm btn-warning"><i class="fe fe-edit-3"></i> Edit</a> --}}


                                        <form style="margin: 0; padding: 0" method="post" action="{{ route('media.gallery.destroy', $image->id) }}">
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
