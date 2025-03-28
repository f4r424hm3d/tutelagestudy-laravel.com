@extends('front.layouts.main')
@push('seo_meta_tag')
  @include('front.layouts.static_page_meta_tag')
@endpush
@section('main-section')
  
  <section class="bg-light pt-5 my-5">
    <div class="log-space">
      <div class="container">
        <div class="row justify-content-center">
   
             

              <div class="col-lg-6 col-md-5 col-12 mx-auto">
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
                <form action="{{ url('login') }}/" method="post">
                  @csrf
                  <input type="hidden" name="return_to" value="{{ $_GET['return_to'] ?? null }}">
                  <input type="hidden" name="paper_id" value="{{ $_GET['paper_id'] ?? null }}">
                  <div class="log_wraps">
                    <div class="log__heads">
                      <h4 class="mt-0 logs_title">Sign <span class="theme-cl1">In</span></h4>
                    </div>

                    <div class="form-group">
                      <div class="input-group main-rel">
                        <div class="input-icon">
                        <i class="fa-solid fa-envelope"></i>
                        </div>
                        <input type="email" name="email" class="form-control"
                          placeholder="Your email address" value="{{ old('email') }}">
                      </div>
                    </div>

                    <div class="form-group ">
                      <div class="input-group main-rel">
                        <div class="input-icon">
                        <i  id="password_icon_hide"  class="fa-solid fa-lock hide-this " onclick="hidePassword('password')"></i>
                        <i  id="password_icon_show"  class="fa-solid fa-lock-open  " onclick="showPassword('password')"></i>
                          <!-- <span id="password_icon_show" class="ti-eye" onclick="showPassword('password')"></span> -->
                          <!-- <span id="password_icon_hide" class="ti-eye hide-this"
                            onclick="hidePassword('password')"></span> -->
                        </div>
                        <input type="password" class="form-control" placeholder="Your password"
                          id="password" name="password">
                      </div>
                    </div>

                    <div class="social-login mb-3">
                      <ul class="main-socials" >
                        <li>
                        <div class="form-group form-check mb-0">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label mb-0 main-labels" for="exampleCheck1">Check me out</label>
  </div>
                        </li>
                        <li class="right"><a href="{{ url('account/password/reset') }}" class="theme-cl1">Forgot
                            Password?</a>
                        </li>
                      </u>
                    </div>

                    <div class="form-group">
                      <button type="submit" class="button home-btn py-2 w-100">Sign In</button>
                    </div>

                    <div class="form-group text-center mb-0">
                      Don't have an account?&nbsp;&nbsp;
                      <a href="{{ url('/sign-up/?') }}{{ isset($_GET['return_to']) && $_GET['return_to'] != null ? 'return_to=' . $_GET['return_to'] : '' }}{{ isset($_GET['paper_id']) && $_GET['paper_id'] != null ? '&paper_id=' . $_GET['paper_id'] : '' }}"
                        class="theme-cl1">Sign Up</a>
                    </div>

                  </div>
                </form>
                </div>
              </div>
         
        </div>
      </div>
    </div>
  </section>
  <!-- Content -->
  <script>
    function showPassword(id) {
      $("#" + id).attr('type', 'text');
      $("#" + id + '_icon_show').hide();
      $("#" + id + '_icon_hide').show();
    }

    function hidePassword(id) {
      $("#" + id).attr('type', 'password');
      $("#" + id + '_icon_show').show();
      $("#" + id + '_icon_hide').hide();
    }
  </script>
@endsection
