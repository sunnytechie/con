@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">

    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-end pb-0">
                <div class="btn-group" role="group" aria-label="Button group">
                    <a class="btn btn-warning" href="{{ route('provinces.index') }}">Province</a>
                    <a class="btn btn-secondary" href="{{ route('provinces.profile') }}">Profiles</a>
                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#provinceModal">New Province</button>
                    <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#dioceseModal">New Diocese</button>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#cycModal">New CYC Profile</button>
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
                <h5 class="card-header pb-0">Edit Profiles</h5>

                <div class="card-body">

                    
                    <form method="POST" action="{{ route('province.profile.update', $profileID) }}">
                        @csrf
                      @method('PUT')
                      <div class="modal-body">
                
                        <div class="form-group">
                          <label for="my-input">Rev. Title</label>
                          <input id="my-input" class="form-control" type="text" value="{{ $rev_title }}" placeholder="Rev. Title" name="rev_title" required>
                        </div>
                        
                        <div class="form-group">
                          <label for="my-input">Rev. Name</label>
                          <input id="my-input" class="form-control" type="text" value="{{ $rev_name }}" placeholder="Rev. Name" name="rev_name" required>
                        </div>
                
                        <div class="form-group">
                          <label for="province_id">Province</label>
                          <select class="form-select" id="province" name="province_id" required>
                            <option disabled selected>{{ $province_name }}</option>
                            @foreach ($provinces as $province)
                              <option value="{{ $province->id }}">{{ $province->name }} {{ $province->state_name }}</option>
                            @endforeach
                          </select>
                        </div>
                
                        <div class="form-group">
                          <label for="diocese">Diocese</label>
                          {{-- <select class="form-select" id="diocese" name="diocese" required>
                            <option disabled selected>Choose...</option>
                            @foreach ($dioceses as $diocese)
                            <option>{{ $diocese->name }}</option>
                            @endforeach
                          </select> --}}
                          <br><span>{{ $diocese }}</span>
                          <select class="form-select" id="diocese" name="diocese">
                            
                          </select>
                        </div>
                
                        <div class="form-group">
                          <label for="my-input">Inagurated</label>
                          <input id="my-input" class="form-control" type="text" value="{{ $inagurated }}" placeholder="Inagurated" name="inagurated" required>
                        </div>
                
                        <div class="form-group">
                          <label for="my-input">img url</label>
                          <input id="my-input" class="form-control" type="text" value="{{ $img_url }}" placeholder="http..." name="img_url" required>
                        </div>
                
                        <div class="form-group">
                          <label for="my-input">Court</label>
                          <input id="my-input" class="form-control" type="text" value="{{ $court }}" placeholder="Court" name="court" required>
                        </div>
                
                        <div class="form-group">
                          <label for="my-input">Address</label>
                          <input id="my-input" class="form-control" type="text" value="{{ $address }}" placeholder="Location Address" name="address" required>
                        </div>
                
                        <div class="form-group">
                          <label for="my-input">P.O Box</label>
                          <input id="my-input" class="form-control" type="text" value="{{ $po_box }}" placeholder="P.O Box" name="po_box" required>
                        </div>
                
                        <div class="form-group">
                          <label for="my-input">Phone</label>
                          <input id="my-input" class="form-control" type="tel" value="{{ $tel }}" placeholder="08011111111" name="tel" required>
                        </div>
                
                        <div class="form-group">
                          <label for="my-input">Email</label>
                          <input id="my-input" class="form-control" type="email" value="{{ $email }}" placeholder="Email Address" name="email" required>
                        </div>
                
                        <div class="form-group">
                          <label for="my-input">Email 2</label>
                          <input id="my-input" class="form-control" type="email" value="{{ $email_2 }}" placeholder="Email Address" name="email_2" required>
                        </div>
                
                        <div class="form-group">
                          <label for="my-input">Website</label>
                          <input id="my-input" class="form-control" type="text" value="{{ $website }}" placeholder="www.yourwebsite.com" name="website" required>
                        </div>
                
                        <div class="form-group">
                          <label for="my-input">Synod Name</label>
                          <input id="my-input" class="form-control" type="text" value="{{ $synod_name }}" placeholder="Name" name="synod_name" required>
                        </div>
                
                        <div class="form-group">
                          <label for="my-input">Synod Title</label>
                          <input id="my-input" class="form-control" type="text" value="{{ $synod_title }}" placeholder="Title" name="synod_title" required>
                        </div>
                
                        <div class="form-group">
                          <label for="my-input">Synod Location Address</label>
                          <input id="my-input" class="form-control" type="text" value="{{ $synod_address }}" placeholder="address" name="synod_address" required>
                        </div>
                
                        <div class="form-group">
                          <label for="my-input">Synod Email</label>
                          <input id="my-input" class="form-control" type="text" value="{{ $synod_email }}" placeholder="Email Address" name="synod_email" required>
                        </div>
                
                        <div class="form-group">
                          <label for="my-input">Synod Phone</label>
                          <input id="my-input" class="form-control" type="tel" value="{{ $synod_tel }}" placeholder="0801111111" name="synod_tel" required>
                        </div>
                
                      </div>
                
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Update Province</button>
                      </div>
                      </form>
                    

                </div>
        </div>
      </div>
      {{-- Modal for Province --}}
    <div class="modal fade" id="provinceModal" tabindex="-1" aria-labelledby="provinceModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="provinceModalLabel">New Province</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form method="POST" action="{{ route('provinces.store') }}">
            @csrf

          <div class="modal-body">
            <div class="form-group">
              <label for="my-input">Name</label>
              <input id="my-input" class="form-control" type="text" placeholder="Ecclesiastical province" name="name" required>
            </div>

            <div class="form-group">
              <label for="my-input">State</label>
              <input id="my-input" class="form-control" type="text" placeholder="Abuja" name="state_name" required>
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success">Save Province</button>
          </div>
          </form>
        </div>
      </div>
    </div>

    {{-- Modal for diocese --}}
    <!-- Modal -->
<div class="modal fade" id="dioceseModal" tabindex="-1" aria-labelledby="dioceseModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="dioceseModalLabel">New Diocese</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" action="{{ route('diocese.store') }}">
        @csrf
      <div class="modal-body">
        <div class="form-group">
              <label for="name">Name</label>
              <input id="name" class="form-control" type="text" placeholder="Diocese of Abuja" name="name" required>
            </div>

            <div class="form-group">
              <label for="province_id">Province</label>
              <select class="form-select" id="province_id" name="province_id" required>
                <option disabled selected>Choose...</option>
                @foreach ($provinces as $province)
                <option value="{{ $province->id }}">{{ $province->name }} {{ $province->state_name }}</option>
                @endforeach
              </select>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save Diocese</button>
      </div>
      </form>
    </div>
  </div>
</div>

{{-- Modal for CYC --}}
<div class="modal fade" id="cycModal" tabindex="-1" aria-labelledby="cycModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="cycModalLabel">New CYC</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" action="{{ route('cyc.provinces.store') }}">
        @csrf

      <div class="modal-body">

        <div class="form-group">
          <label for="my-input">Rev. Title</label>
          <input id="my-input" class="form-control" type="text" placeholder="Rev. Title" name="rev_title" required>
        </div>
        
        <div class="form-group">
          <label for="my-input">Rev. Name</label>
          <input id="my-input" class="form-control" type="text" placeholder="Rev. Name" name="rev_name" required>
        </div>

        <div class="form-group">
          <label for="province_id">Province</label>
          <select class="form-select" id="province" name="province_id" required>
            <option disabled selected>Choose...</option>
            @foreach ($provinces as $province)
            <option value="{{ $province->id }}">{{ $province->name }} {{ $province->state_name }}</option>
            @endforeach
          </select>
        </div>

        <div class="form-group">
          <label for="diocese">Diocese</label>
          {{-- <select class="form-select" id="diocese" name="diocese" required>
            <option disabled selected>Choose...</option>
            @foreach ($dioceses as $diocese)
            <option>{{ $diocese->name }}</option>
            @endforeach
          </select> --}}
          <select class="form-select" id="diocese" name="diocese"></select>
        </div>

        <div class="form-group">
          <label for="my-input">Inagurated</label>
          <input id="my-input" class="form-control" type="text" placeholder="Inagurated" name="inagurated" required>
        </div>

        <div class="form-group">
          <label for="my-input">img url</label>
          <input id="my-input" class="form-control" type="text" placeholder="http..." name="img_url" required>
        </div>

        <div class="form-group">
          <label for="my-input">Court</label>
          <input id="my-input" class="form-control" type="text" placeholder="Court" name="court" required>
        </div>

        <div class="form-group">
          <label for="my-input">Address</label>
          <input id="my-input" class="form-control" type="text" placeholder="Location Address" name="address" required>
        </div>

        <div class="form-group">
          <label for="my-input">P.O Box</label>
          <input id="my-input" class="form-control" type="text" placeholder="P.O Box" name="po_box" required>
        </div>

        <div class="form-group">
          <label for="my-input">Phone</label>
          <input id="my-input" class="form-control" type="tel" placeholder="08011111111" name="tel" required>
        </div>

        <div class="form-group">
          <label for="my-input">Email</label>
          <input id="my-input" class="form-control" type="email" placeholder="Email Address" name="email" required>
        </div>

        <div class="form-group">
          <label for="my-input">Email 2</label>
          <input id="my-input" class="form-control" type="email" placeholder="Email Address" name="email_2" required>
        </div>

        <div class="form-group">
          <label for="my-input">Website</label>
          <input id="my-input" class="form-control" type="text" placeholder="www.yourwebsite.com" name="website" required>
        </div>

        <div class="form-group">
          <label for="my-input">Synod Name</label>
          <input id="my-input" class="form-control" type="text" placeholder="Name" name="synod_name" required>
        </div>

        <div class="form-group">
          <label for="my-input">Synod Title</label>
          <input id="my-input" class="form-control" type="text" placeholder="Title" name="synod_title" required>
        </div>

        <div class="form-group">
          <label for="my-input">Synod Location Address</label>
          <input id="my-input" class="form-control" type="text" placeholder="address" name="synod_address" required>
        </div>

        <div class="form-group">
          <label for="my-input">Synod Email</label>
          <input id="my-input" class="form-control" type="text" placeholder="Email Address" name="synod_email" required>
        </div>

        <div class="form-group">
          <label for="my-input">Synod Phone</label>
          <input id="my-input" class="form-control" type="tel" placeholder="0801111111" name="synod_tel" required>
        </div>

      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Save Profile</button>
      </div>
      </form>
    </div>
  </div>
</div>
    @include('footer.nonguest')
  </div>
@endsection