@extends('front.layouts.main')
@push('seo_meta_tag')
  @include('front.layouts.static_page_meta_tag')
@endpush
@section('main-section')
  <!-- Content -->
  <section class="bg-light pt-5 pb-5 my-5">
    <div class="log-space">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-12 col-md-12">

            <div class="row no-gutters position-relative log_rads">
               <div class="col-lg-6 col-md-7 mx-auto">
                <div class="all-signsin">
                @if (session()->has('smsg'))
                  <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{ session()->get('smsg') }}
                  </div>
                @endif
                @if (session()->has('emsg'))
                  <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{ session()->get('emsg') }}
                  </div>
                @endif
                <form method="post" action="{{ url('forget-password') }}/" enctype="multipart/form-data">
                  @csrf
                  <div class="log_wraps">
                    <div class="log__heads">
                      <h4 class="mt-0 logs_title">Forgot <span class="theme-cl1">Password</span></h4>
                    </div>

                    <div class="form-group text-left">
                      <label>Enter your email we'll send you a link to reset your password.</label>
                      <div class="input-group main-rel">
                        <div class="input-icon"><i class="fa-solid fa-envelope"></i></div>
                        <input name="email" type="email" class="form-control"
                          placeholder="Enter your registered email address" value="{{ old('email') }}" required>
                        <span class="text-danger">
                          @error('email')
                            {{ $message }}
                          @enderror
                        </span>
                      </div>
                    </div>

                    <div class="form-group">
                      <button type="submit" class="button home-btn py-2 w-100">Reset Password</button>
                    </div>

                    <div class="form-group text-center mb-0">
                      Are you a already member?&nbsp;&nbsp; <a href="{{ url('sign-in') }}" class="theme-cl1">Sign In</a>
                    </div>

                  </div>
                </form>
                </div>
               
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Content -->
@endsection
