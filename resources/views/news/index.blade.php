@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">

    <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            
            <div class="card-header d-flex justify-content-between pb-0">
              <h6>Publish News</h6>
              @if (session('success'))
                <div style="position: absolute; right: 30px; top: 20px" class="alert alert-info alert-dismissible fade show" role="alert">
                <strong>{{ session('success') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
            @endif
              <a class="btn btn-default" type="button" href="{{ route('news.create') }}"> <span><i class="fa fa-plus-circle px-2" aria-hidden="true"></i></span> Add New </a>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center table-striped justify-content-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Title</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Author</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                      $i = 1;
                    @endphp

                    @foreach ($news as $new)
                        
                    <tr>
                        <td class="text-left px-4">
                            <span class="text-xs font-weight-bold">{{ $i++ }}</span>
                        </td>
                      <td>
                        <div class="d-flex px-2">
                          <div>
                            <img src="/storage/{{ $new->thumbnail }}" class="avatar avatar-sm rounded-circle me-2" alt="No Image">
                          </div>
                          <div class="my-auto">
                            <h6 class="mb-0 text-sm">{{ $new->title }}</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-sm font-weight-bold mb-0">{{ $new->author }}</p>
                      </td>
                      
                      <td class="align-middle">
                        <div class="btn-group" role="group" aria-label="Button group">

                          
                          <a class="shadow border-radius-md bg-white btn btn-link text-secondary m-2" href="{{ route('news.edit', $new->id) }}">
                            <i class="fa fa-pencil text-xs"></i>
                          </a>
                         
                                 
                            <form method="post" action="{{ route('news.destroy', $new->id) }}">
                              @method('delete')
                              @csrf
                              <button type="submit" onclick="return confirm('Are you sure you want to delete this news?')" class="shadow border-radius-md bg-white btn btn-link text-secondary m-2"><i class="fa fa-trash text-xs"></i></button>
                          </form>
                            
                          
                        </div>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <div class="d-flex">
                {!! $news->links() !!}
              </div>
            </div>
          </div>
        </div>
      </div>

    @include('footer.nonguest')
  </div>
@endsection