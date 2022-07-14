@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">

    <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header d-flex justify-content-between pb-0">
              <h6>Comment listing</h6>
                <div class="input-group" style="width: 300px">
                    <input type="text" class="form-control" placeholder="Search">
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
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">S/N</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Comment</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Email</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Type</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Created At</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($comments as $comment)
                    <tr>
                        <td class="text-left px-4">
                            <span class="text-xs font-weight-bold">{{ $i++ }}</span>
                        </td>
                    
                        <td> <p class="text-sm font-weight-bold mb-0">  </p> {{ $comment->content }} </td>
                        <td> <p class="text-sm font-weight-bold mb-0">  </p> {{ $comment->email }} </td>
                        
                        <td> <p class="text-sm font-weight-bold mb-0">  </p> {{ $comment->type }} </td>
                        <td> <p class="text-sm font-weight-bold mb-0">  </p> {{ $comment->created_at->diffForHumans() }} </td>

                        //delete
                        <td class="text-right">
                            <form action="{{ route('comment.destroy', $comment->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-icon btn-secondary" type="submit" onclick="return confirm('Are you sure you want to delete this record?')">
                                    <span class="btn-inner--icon"><i class="ni ni-fat-remove"></i></span>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    
                   
                  </tbody>
                </table>
              </div>
              <div class="d-flex">
                {!! $comments->links() !!}
              </div>
            </div>
          </div>
        </div>
      </div>

    @include('footer.nonguest')
  </div>
@endsection