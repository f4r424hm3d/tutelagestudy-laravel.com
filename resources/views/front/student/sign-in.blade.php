@extends('front.layouts.main')
@push('seo_meta_tag')
  @include('front.layouts.static_page_meta_tag')
@endpush
@section('main-section')
  <br><br><br>
  <section class="bg-light">
    <div class="log-space">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-12 col-md-12">
            <div class="row no-gutters position-relative log_rads">
              <div class="d-none d-md-block col-lg-3 col-md-5 bg-cover">

              </div>

              <div class="col-lg-6 col-md-7 position-static p-2">
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
                <form action="{{ url('login') }}" method="post">
                  @csrf
                  <input type="hidden" name="return_to" value="{{ $_GET['return_to'] ?? null }}">
                  <input type="hidden" name="paper_id" value="{{ $_GET['paper_id'] ?? null }}">
                  <div class="log_wraps">
                    <div class="log__heads">
                      <h4 class="mt-0 logs_title">Sign <span class="theme-cl1">In</span></h4>
                    </div>

                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-icon"><span class="ti-email"></span></div>
                        <input type="email" name="email" class="form-control bg-white b-0 b-l"
                          placeholder="Your email address" value="{{ old('email') }}">
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-icon">
                          <span id="password_icon_show" class="ti-eye" onclick="showPassword('password')"></span>
                          <span id="password_icon_hide" class="ti-eye hide-this"
                            onclick="hidePassword('password')"></span>
                        </div>
                        <input type="password" class="form-control bg-white b-0 b-l" placeholder="Your password"
                          id="password" name="password">
                      </div>
                    </div>

                    <div class="social-login mb-3">
                      <ul>
                        <li class="right"><a href="{{ url('account/password/reset') }}" class="theme-cl1">Forgot
                            Password?</a>
                        </li>
                      </ul>
                    </div>

                    <div class="form-group">
                      <button type="submit" class="btn btn-theme-2 rounded w-100">Sign In</button>
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
