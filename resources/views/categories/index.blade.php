{{-- <div class="container-fluid py-4">

    <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header d-flex justify-content-between pb-0">
              <h6>Categories</h6>
              <a href="#addCategory" class="btn btn-default" data-toggle="modal" type="button"> <span><i class="fa fa-plus-circle px-2" aria-hidden="true"></i></span> Add New </a>
              @include('modals.add.category')
            </div>

             @if (session('success'))
                <div style="position: absolute; right: 30px; top: 20px" class="alert alert-info alert-dismissible fade show" role="alert">
                <strong>{{ session('success') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
            @endif
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center table-striped justify-content-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Title</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Belongs to</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>

                    @foreach ($categories as $category)
                    <tr>
                      <td class="text-left px-4">
                          <span class="text-xs font-weight-bold">{{ $id++ }}</span>
                      </td>
                    <td>
                      <div class="d-flex px-2">
                        <div>
                          <img src="/storage/{{ $category->thumbnail }}" class="avatar avatar-sm rounded-circle me-2" alt="spotify">
                        </div>
                        <div class="my-auto">
                          <h6 class="mb-0 text-sm">{{ $category->title }}</h6>
                        </div>

                      </div>
                    </td>

                    <td>
                      <div class="my-auto">
                        <h6 class="mb-0 text-sm">{{ $category->type }}</h6>
                      </div>
                    </td>


                    <td class="align-middle">
                      <div class="btn-group" role="group" aria-label="Button group">


                        <a class="shadow border-radius-md bg-white btn btn-link text-secondary m-2" href="{{ route('categories.edit', $category->id) }}">
                          <i class="fa fa-pencil text-xs"></i>
                        </a>

                          <form method="post" action="{{ route('categories.destroy', $category->id) }}">
                            @method('delete')
                            @csrf
                            <button type="submit" onclick="return confirm('Are you sure you want to delete this record?')" class="shadow border-radius-md bg-white btn btn-link text-secondary m-2"><i class="fa fa-trash text-xs"></i></button>
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


  </div> --}}
@extends('layouts.v23')

@section('content')

<div class="row row-sm">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h3 class="card-title">Video, Audio and Gallery Categories</h3>
                <a class="btn btn-default modal-effect" href="#new" data-bs-effect="effect-scale" data-bs-toggle="modal"> <span><i class="fa fa-plus-circle px-2" aria-hidden="true"></i></span> New </a>
            </div>

            <!-- MODAL EFFECTS -->
            <div class="modal fade" id="new">

                <div class="modal-dialog modal-dialog-centered" role="document">

                    <div class="modal-content modal-content-demo">
                        <form style="margin: 0; padding: 0" method="POST" action="{{ route('categories.store') }}"" enctype="multipart/form-data">
                            @csrf
                        <div class="modal-header">
                            <h6 class="modal-title">Create new Category</h6><button type="button" aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">

                            @include('modals.add.category')

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Publish</button>
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
                                <th class="wd-25 border-bottom-0 ps-2">ID</th>
                                <th class="wd-25 border-bottom-0 ps-2">Title</th>
                                <th class="wd-25 border-bottom-0 ps-2">Belongs to</th>
                                <th class="wd-25 border-bottom-0 ps-2 ps-2">Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i=1;
                            @endphp
                            @foreach ($categories as $category)
                            <tr>
                                 <td> {{ $i++ }} </td>

                                 <td>
                                    <div class="d-flex px-2">
                                      <div>
                                        <img src="/storage/{{ $category->thumbnail }}" class="avatar avatar-sm rounded-circle me-2" alt="spotify">
                                      </div>
                                      <div class="my-auto">
                                        <h6 class="mb-0 text-sm">{{ $category->title }}</h6>
                                      </div>

                                    </div>
                                  </td>

                                  <td>
                                    <div class="my-auto">
                                      <h6 class="mb-0 text-sm">{{ $category->type }}</h6>
                                    </div>
                                  </td>

                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-warning"><i class="fe fe-edit-3"></i> Edit</a>

                                        <form style="margin: 0; padding: 0" method="post" action="{{ route('categories.destroy', $category->id) }}">
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

@endsection
