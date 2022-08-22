@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">

    <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            
            <div class="card-header d-flex justify-content-between pb-0">
              <h4>Update Setting</h4>
              @if (session('success'))
                <div style="position: absolute; right: 30px; top: 20px" class="alert alert-info alert-dismissible fade show" role="alert">
                <strong>{{ session('success') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
            @endif
            </div>
            <div class="card-body p-4">
              <form method="POST" action="{{ route('settings.update', $id) }}">
                @csrf
                @method('PUT')

                <h5>Donation APi Keys Settings</h5>
                <div class="form-group row">
                  <label for="paystack_api_key">Paystack Api Key</label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" id="paystack_api_key" name="paystack_api_key" value="{{ $paystack_api_key }}">
                  </div>

                  @error('paystack_api_key')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>

                <div class="form-group row">
                  <label for="flutterwave_api_key">FlutterWave Api Key</label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" id="flutterwave_api_key" name="flutterwave_api_key" value="{{ $flutterwave_api_key }}">
                  </div>

                  @error('flutterwave_api_key')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>

                <div class="form-group row">
                  <label for="flutterwave_currency_code">FlutterWave Api Key</label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" id="flutterwave_currency_code" value="NGN" name="flutterwave_currency_code" value="{{ $flutterwave_currency_code }}">
                  </div>

                  @error('flutterwave_currency_code')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>

              
                <div class="form-group row">
                  <label for="paypal_donation_url">FlutterWave Api Key</label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" id="paypal_donation_url" name="paypal_donation_url" value="{{ $paypal_donation_url }}">
                  </div>

                  @error('paypal_donation_url')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>

                
                <h5 class="mt-5">Firebase Settings</h5>
                <div class="form-group">
                  <label for="fcm_server_key">Firebase Server Key</label>
                  <input type="text" class="form-control @error('fcm_server_key') is-invalid @enderror" id="fcm_server_key" value="{{ $fcm_server_key ?? old('fcm_server_key') }}" name="fcm_server_key" placeholder="Key">

                  @error('fcm_server_key')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>

                <h5 class="mt-5">SMTP Settings</h5>
                <div class="form-group">
                  <label for="mail_username">Mail Username</label>
                  <input type="text" class="form-control @error('mail_username') is-invalid @enderror" id="mail_username" value="{{ $mail_username ?? old('mail_username') }}" name="mail_username" placeholder="Username">

                  @error('mail_username')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="mail_password">Mail Password</label>
                  <input type="text" class="form-control @error('mail_password') is-invalid @enderror" id="mail_password" value="{{ $mail_password ?? old('mail_password') }}" name="mail_password" placeholder="Password">

                  @error('mail_password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>

                 
                <div class="form-group">
                  <label for="mail_smtp_host">Mail SMTP Host</label>
                  <input type="text" class="form-control @error('mail_smtp_host') is-invalid @enderror" id="mail_smtp_host" value="{{ $mail_smtp_host ?? old('mail_smtp_host') }}" name="mail_smtp_host" placeholder="Host">

                  @error('mail_smtp_host')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>

                
                <div class="form-group">
                  <label for="mail_protocol">Mail Protocol</label>
                  <input type="text" class="form-control @error('mail_protocol') is-invalid @enderror" id="mail_protocol" value="{{ $mail_protocol ?? old('mail_protocol') }}" name="mail_protocol" placeholder="Protocol">

                  @error('mail_protocol')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>

                
                <div class="form-group">
                  <label for="mail_port">Mail Port</label>
                  <input type="text" class="form-control @error('mail_port') is-invalid @enderror" id="mail_port" value="{{ $mail_port ?? old('mail_port') }}" name="mail_port" placeholder="Port">

                  @error('mail_port')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>

                <h5 class="mt-5">Social Profile Settings</h5>
                <div class="form-group">
                  <label for="facebook_page">Facebook Page</label>
                  <input type="text" class="form-control @error('facebook_page') is-invalid @enderror" id="facebook_page" value="{{ $facebook_page ?? old('facebook_page') }}" name="facebook_page" placeholder="Facebook Page">

                  @error('facebook_page')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>

                
                <div class="form-group">
                  <label for="youtube_page">Youtube Page</label>
                  <input type="text" class="form-control @error('youtube_page') is-invalid @enderror" id="youtube_page" value="{{ $youtube_page ?? old('youtube_page') }}" name="youtube_page" placeholder="Youtube Page">

                  @error('youtube_page')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>

                
                <div class="form-group">
                  <label for="twitter_page">Twitter Page</label>
                  <input type="text" class="form-control @error('twitter_page') is-invalid @enderror" id="twitter_page" value="{{ $twitter_page ?? old('twitter_page') }}" name="twitter_page" placeholder="Twitter Page">

                  @error('twitter_page')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>

                
                <div class="form-group">
                  <label for="instagram_page">Instagram Page</label>
                  <input type="text" class="form-control @error('instagram_page') is-invalid @enderror" id="instagram_page" value="{{ $instagram_page ?? old('instagram_page') }}" name="instagram_page" placeholder="Instagram Page">

                  @error('instagram_page')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>

                
                <div class="form-group">
                  <label for="phone_number">Phone Number</label>
                  <input type="text" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number" value="{{ $phone_number ?? old('phone_number') }}" name="phone_number" placeholder="Phone Number">

                  @error('phone_number')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>

                
                <div class="form-group">
                  <label for="whatsapp_number">Whatsapp Number</label>
                  <input type="text" class="form-control @error('whatsapp_number') is-invalid @enderror" id="whatsapp_number" value="{{ $whatsapp_number ?? old('whatsapp_number') }}" name="whatsapp_number" placeholder="Whatsapp Number">

                  @error('whatsapp_number')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                

                
                <button type="submit" class="btn btn-primary">Update</button>

              </form>
            </div>
          </div>
        </div>
      </div>

    @include('footer.nonguest')
  </div>
@endsection