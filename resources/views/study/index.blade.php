@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">

    <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header d-flex justify-content-between pb-0">
              <div>
                <div class="dropdown">
                    <button id="my-dropdown" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Publish new book</button>
                    <div class="dropdown-menu" aria-labelledby="my-dropdown" style="position: absolute; left: -20px">
                        <a class="dropdown-item active" href="#addFountain" data-toggle="modal">Daily Fountain</a>
                        <a class="dropdown-item active" href="#addBibleStudy" data-toggle="modal">Bible Study</a>
                        <a class="dropdown-item active" href="#addDynamite" data-toggle="modal">Daily Dynamite</a>
                    </div>
                </div>
              </div>
              @include('modals.add.biblestudy')
              @include('modals.add.fountain')
              @include('modals.add.dynamite')

              {{-- Search --}}
              <div class="search-form">
                <div class="input-group">
                  <input type="text" id="search" name="search" class="form-control" placeholder="Search...">
                </div>
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
                <table class="table align-items-center table-striped justify-content-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Topic</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Study Date</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Slug</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Created</th>
                      <th></th>
                    </tr>
                  </thead>
                   <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($studies as $book)
                    <tr>
                      <td class="text-left px-4">
                          <span class="text-xs font-weight-bold">{{ $i++ }}</span>
                      </td>
                   
                    <td> <p class="text-sm font-weight-bold mb-0">  </p> {{ $book->topic }} </td>

                    <td> <p class="text-sm font-weight-bold mb-0">  </p> {{ date('l, d F Y', strtotime($book->study_date)) }} </td>
                    
                    <td> <p class="text-sm font-weight-bold mb-0">  </p> {{ $book->study_type_name }} {{ $book->study_year }} </td>
                    
                    <td> <p class="text-sm font-weight-bold mb-0">  </p> {{ $book->created_at->diffForHumans() }} </td>
                    

                    <td class="align-middle">
                      <div class="btn-group" role="group" aria-label="Button group">

                        
                        <a class="shadow border-radius-md bg-white btn btn-link text-secondary m-2" href="{{ route('studies.edit', $book->id) }}">
                          <i class="fa fa-pencil text-xs"></i>
                        </a>

                          <form method="post" action="{{ route('studies.destroy', $book->id) }}">
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
              <div class="d-flex">
                 {!! $studies->links() !!}
              </div>
            </div>
          </div>
        </div>
      </div>

    @include('footer.nonguest')
  </div>
@endsection