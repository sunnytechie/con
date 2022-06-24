@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">

    <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header d-flex justify-content-between pb-0">
              <h6>Sub Category</h6>
              <a href="#addSubCategory" class="btn btn-default" type="button" data-toggle="modal" type="button"> 
                <span><i class="fa fa-plus-circle px-2" aria-hidden="true"></i></span> Add New 
              </a>
              @include('modals.add.subcategory')
            </div>

             {{-- Success Message --}}
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
                <table class="table align-items-center justify-content-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Title</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Category</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Slug</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $id = 1; ?>
                    @foreach ($subcategories as $subcategory)
                    <tr>
                        <td class="text-left px-4">
                            <span class="text-xs font-weight-bold">{{ $id++ }}</span>
                        </td>
                      <td>
                        <div class="px-2">
                          <div class="my-auto">
                            <h6 class="mb-0 text-sm">{{ $subcategory->title }}</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-sm font-weight-bold mb-0">{{ $subcategory->category_id }}</p>
                      </td>

                      <td>
                        <p class="text-sm font-weight-bold mb-0">{{ $subcategory->slug }}</p>
                      </td>
                      
                      <td class="align-middle">
                        <div class="btn-group" role="group" aria-label="Button group">

                          
                          <a class="shadow border-radius-md bg-white btn btn-link text-secondary m-2" href="{{ route('subcategories.edit', $subcategory->id) }}">
                            <i class="fa fa-pencil text-xs"></i>
                          </a>
                          
                            <a href="{{ route('subcategories.destroy', $subcategory->id) }}" class="shadow border-radius-md bg-white btn btn-link text-secondary m-2" onclick="return confirm('Are you sure you want to delete this record?')">
                              <i class="fa fa-trash text-xs"></i>
                            </a>
                            
                            @include('modals.delete.subcategory')
                          
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

    @include('footer.nonguest')
  </div>
@endsection