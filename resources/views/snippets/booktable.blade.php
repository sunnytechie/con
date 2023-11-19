
  <div class="row mt-5">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header d-flex justify-content-between pb-0">
          <h6>Books Sold</h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                    <thead>
                        <tr>
                            <th class="wd-25 border-bottom-0 ps-2">S/N</th>
                            <th class="wd-25 border-bottom-0 ps-2">Books</th>
                            <th class="wd-25 border-bottom-0 ps-2">Sold</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i=1;
                        @endphp
                        @foreach ($totalPurchaseByBookId as $item)
                        <tr>
                            <td> {{ $i++ }} </td>
                            <td>{{ $item->book->title ?? "deleted" }}</td>
                            <td>{{ $item->total }}</td>


                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>

        </div>
    </div>
</div>
