@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">

    <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header d-flex justify-content-between pb-0">
              <h6>Book listing</h6>
              <div class="btn-group" role="group" aria-label="Button group">
                             <a href="#newSubBookCategory" data-toggle="modal" class="btn btn-default" type="button"> <span><i class="fa fa-plus-square-o px-2" aria-hidden="true"></i></span> Create New Sub Category</a>
                             <a href="#newBookCategory" data-toggle="modal" class="btn btn-default" type="button"> <span><i class="fa fa-plus-square px-2" aria-hidden="true"></i></span> Create Book Category</a>
                             <a href="#newBook" data-toggle="modal" class="btn btn-default" type="button"> <span><i class="fa fa-plus-circle px-2" aria-hidden="true"></i></span> Publish New Book</a>
                             @include('modals.add.book')
                             @include('modals.add.book_category')
                             @include('modals.add.book_sub_category')
              </div>
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
                <table class="table align-items-center justify-content-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Title</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Description</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Author</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Category</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Sub Category</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($books as $book)
                    <tr>
                      <td class="text-left px-4">
                          <span class="text-xs font-weight-bold">{{ $i++ }}</span>
                      </td>
                   
                    <td> 
                      <div class="d-flex px-2">
                        <div>
                          <img src="/storage/{{ $book->image }}" class="avatar avatar-sm rounded-circle me-2" alt="spotify">
                        </div>
                        <div class="my-auto">
                          <h6 class="mb-0 text-sm">{{ $book->title }}</h6>
                        </div>
                      </div>
                    </td>
                    <td> <p class="text-sm font-weight-bold mb-0">  </p> {{ $book->description }} </td>
                    <td> <p class="text-sm font-weight-bold mb-0">  </p> {{ $book->author }} </td>
                    
                    <td> <p class="text-sm font-weight-bold mb-0">  </p> {{ $book->bookcategory->title }} </td>
                    <td> <p class="text-sm font-weight-bold mb-0">  </p> {{ $book->booksubcategory->title }} </td>
                    
                    <td class="align-middle">
                      <div class="btn-group" role="group" aria-label="Button group">

                        
                        <a class="shadow border-radius-md bg-white btn btn-link text-secondary m-2" href="{{ route('books.edit', $book->id) }}">
                          <i class="fa fa-pencil text-xs"></i>
                        </a>

                          <form method="post" action="{{ route('books.destroy', $book->id) }}">
                            @method('delete')
                            @csrf
                            <button type="submit" onclick="return confirm('Are you sure you want to delete this book?')" class="shadow border-radius-md bg-white btn btn-link text-secondary m-2"><i class="fa fa-trash text-xs"></i></button>
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

    @include('footer.nonguest')
  </div>
@endsection