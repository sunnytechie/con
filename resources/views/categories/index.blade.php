@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">

    <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header d-flex justify-content-between pb-0">
              <h6>Categories</h6>
              <button class="btn btn-default" type="button"> <span><i class="fa fa-plus-circle px-2" aria-hidden="true"></i></span> Add New </button>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center justify-content-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Title</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                        <td class="text-left px-4">
                            <span class="text-xs font-weight-bold">1</span>
                        </td>
                      <td>
                        <div class="d-flex px-2">
                          <div>
                            <img src="../assets/img/small-logos/logo-spotify.svg" class="avatar avatar-sm rounded-circle me-2" alt="spotify">
                          </div>
                          <div class="my-auto">
                            <h6 class="mb-0 text-sm">Spotify</h6>
                          </div>
                        </div>
                      </td>
                      
                      
                      <td class="align-middle">
                        <div class="btn-group" role="group" aria-label="Button group">

                          
                          <a class="shadow border-radius-md bg-white btn btn-link text-secondary m-2" href="#">
                            <i class="fa fa-pencil text-xs"></i>
                          </a>
                         
                            <a class="shadow border-radius-md bg-white btn btn-link text-secondary m-2" href="#">
                              <i class="fa fa-eye text-xs"></i>
                            </a>
                          
                            <a href="#myModal" class="shadow border-radius-md bg-white btn btn-link text-secondary m-2" data-toggle="modal">
                              <i class="fa fa-trash text-xs"></i>
                            </a>
                            
                            @include('modals.delete.category')
                          
                        </div>
                      </td>
                    </tr>
                   
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