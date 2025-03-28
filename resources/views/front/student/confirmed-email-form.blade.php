@extends('front.layouts.main')
@push('seo_meta_tag')
  @include('front.layouts.static_page_meta_tag')
@endpush
@section('main-section')
  <!-- Content -->
  <section class="bg-light py-5 mt-5">
    <div class="log-space">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6 col-md-6 col-12 mx-auto">
           <div class="all-otps">
           <i class="fa-solid fa-envelope mails"></i>

           @if (session()->has('smsg'))
              <div class="alert alert-success alert-dismissable">
                {{ session()->get('smsg') }}
              </div>
            @endif
            @if (session()->has('emsg'))
              <div class="alert alert-danger alert-dismissable">
                {{ session()->get('emsg') }}
              </div>
            @endif
            <div class="no-gutters position-relative log_rads">
              <div class="log_wraps">
                <form method="post" action="{{ url('submit-email-otp') }}/" enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" name="return_to" value="{{ $_GET['return_to'] ?? null }}">
                  <input type="hidden" name="program_id" value="{{ $_GET['program_id'] ?? null }}">
                  <input type="hidden" name="id" value="{{ session()->get('last_id') }}">
                  <div class="log__heads text-center">
                    <h4 class="mb-0">An OTP has been send to<span class="theme-cl">your registerd email
                        address</span>
                    </h4>
                  </div>
                  <div class="form-group text-center">
                    <label class="my-3" >OTP will expire in 5 minutes</label>
                    <div class="row">
                      <div class="col-md-8 mx-auto">
                        <div class="form-group mb-1">
                          <input name="otp" type="text" class="form-control" placeholder="Enter OTP"
                            value="{{ old('otp') }}" required>
                          <span class="text-danger">
                            @error('otp')
                              {{ $message }}
                            @enderror
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="button home-btn py-2 w-100">Submit</button>
                  </div>
                  <div class="form-group text-center mb-0">
                    Are you a already member?&nbsp;&nbsp;
                    <a href="{{ url('/sign-in/?') }}{{ isset($_GET['return_to']) && $_GET['return_to'] != null ? 'return_to=' . $_GET['return_to'] : '' }}{{ isset($_GET['paper_id']) && $_GET['paper_id'] != null ? '&paper_id=' . $_GET['paper_id'] : '' }}"
                      class="theme-cl1">Sign In</a>
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
