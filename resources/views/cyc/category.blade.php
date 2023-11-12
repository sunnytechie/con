@extends('layouts.v23')

@section('content')
<div class="container-fluid py-4">

    <div class="row">
        <div class="col-md-12">
          <div class="card mb-4">
            <div class="card-header d-flex justify-content-between pb-0">
                <h5>
                    Category form
                </h5>
            </div>


            <div class="card-body px-4 pt-0 pb-2">

                <form method="POST" action="{{ route('cyc.subcategory.store') }}" enctype="multipart/form-data">
                    @csrf

                <div class="mb-3 mt-2">
                    <label>Title</label>
                    <input type="title" id="title" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" placeholder="Enter title" required>

                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label>SubCategory</label>
                    <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror" required>
                        <option value="" disabled>Select SubCategory</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                        @endforeach
                    </select>

                    @error('category_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                    <div class="btn-group my-4" role="group" aria-label="Button group">
                        {{-- <a class="btn btn-success" href="{{ route('bcp.index') }}">Goto Bcp List</a> --}}
                        <button type="submit" class="btn btn-primary">Add new</button>
                    </div>
                  </form>

            </div>
          </div>


          <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h3 class="card-title">CYC SubCategories</h3>
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a class="btn btn-default" href="{{ route('cyc.index') }}"> <span><i class="fa fa-reply px-2" aria-hidden="true"></i></span> Goto to CYC list </a>
                </div>
            </div>


            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                        <thead>
                            <tr>
                                <th class="wd-25p border-bottom-0">ID</th>
                                <th class="wd-25 border-bottom-0 ps-2">Title</th>
                                <th class="wd-25 border-bottom-0 ps-2">Category</th>
                                <td class="wd-25 border-bottom-0 ps-2">Options</td>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($subcategories as $category)
                            <tr>
                                <td>{{ $i++ }}
                                <td>{{ $category->title }}</td>
                                <td>{{ $category->cyccategory->title }}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        {{-- <a href="#" class="btn btn-sm btn-warning"><i class="fe fe-edit-3"></i> Edit</a> --}}

                                        <form style="margin: 0; padding: 0" method="post" action="{{ route('cyc.subcategory.destroy', $category->id) }}">
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

  </div>
@endsection
