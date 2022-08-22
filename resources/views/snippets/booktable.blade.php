<div class="row mt-5">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header d-flex justify-content-between pb-0">
          <h6>Books Sold</h6>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-0">
            <table class="table align-items-center table-striped justify-content-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">S/N</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Books</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Amount Sold</th>
                </tr>
              </thead>
              <tbody>
                @php
                  $i = 1;
                @endphp
                @foreach ($totalPurchaseByBookId as $item)
                <tr>
                    <td class="text-left px-4">
                        <span class="text-xs font-weight-bold">{{ $i++ }}</span>
                    </td>
                  <td>
                    <div class="d-flex px-2">
                      {{-- @php
                        $defaultImage = 'assets/img/default.png';
                        $image = $item->thumbnail;
                        if($image == null){
                            $image = 'assets/img/default.png';
                        }

                      @endphp
                      <div>
                        <img src="/storage/{{ $image }}" class="avatar avatar-sm rounded-circle me-2" alt="spotify">
                      </div> --}}
                      @php
                          $deleted = "Book deleted";
                      @endphp
                      <div class="my-auto">
                        <h6 class="mb-0 text-sm">{{ $item->book->title ?? $deleted }}</h6>
                      </div>
                    </div>
                  </td>
                  <td>
                    <p class="text-sm font-weight-bold mb-0">{{ $item->total }}</p>
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