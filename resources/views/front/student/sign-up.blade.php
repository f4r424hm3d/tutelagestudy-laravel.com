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
              <form action="{{ $url }}/" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="return_to" value="{{ $_GET['return_to'] ?? null }}">
                <input type="hidden" name="paper_id" value="{{ $_GET['paper_id'] ?? null }}">
                <div class="log_wraps">
                  <div class="log__heads">
                    <h4 class="mt-0 logs_title">Sign <span class="theme-cl1">Up</span></h4>
                  </div>
                  <div class="form-group">
                    <div class="input-group  main-rel">
                      <div class="input-icon"><i class="fa-solid fa-envelope"></i></div>
                      <input name="name" type="text" class="form-control" placeholder="Full Name"
                        value="{{ old('name') }}" required="">
                    </div>
                    <span class="text-danger">
                      @error('name')
                        {{ $message }}
                      @enderror
                    </span>
                  </div>
                  <div class="form-group">
                    <div class="input-group  main-rel">
                      <div class="input-icon"> <i class="fa-solid fa-envelope"></i></div>
                      <input name="email" type="email" class="form-control" placeholder="abc@gmail.com"
                        value="{{ old('email') }}" required="">
                    </div>
                    <span class="text-danger">
                      @error('email')
                        {{ $message }}
                      @enderror
                    </span>
                  </div>
                  <div class="row">
                    <div class="col-3 ">
                      <select name="c_code" id="c_code" class="form-control">
                        <option value="">Select</option>
                        @foreach ($phonecodes as $row)
                          <option value="{{ $row->phonecode }}"
                            {{ (old('c_code') && old('c_code') == $row->phonecode) || $row->phonecode == '91' ? 'Selected' : '' }}>
                            +{{ $row->phonecode }} ({{ $row->name }})
                          </option>
                        @endforeach
                      </select>
                      <span class="text-danger">
                        @error('c_code')
                          {{ $message }}
                        @enderror
                      </span>
                    </div>
                    <div class="col-9 ">
                      <div class="form-group  main-rel">
                        <div class="input-group">
                          <div class="input-icon"><i class="fa-solid fa-mobile-screen"></i></div>
                          <input name="mobile" type="number" class="form-control" placeholder="998866XXXX"
                            value="{{ old('mobile') }}" required="">
                        </div>
                        <span class="text-danger">
                          @error('mobile')
                            {{ $message }}
                          @enderror
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <select class="form-control" name="destination" id="destination" required>
                      <option value="">Preferred MBBS Country</option>

                      @foreach ($destinations as $row)
                        <option value="<?php echo $row->page_name; ?>" <?php echo old('destination') == $row->page_name ? 'Selected' : ''; ?>>
                          <?php echo $row->page_name; ?>
                        </option>
                      @endforeach
                    </select>
                    @error('destination')
                      {!! '<span class="text-danger">' . $message . '</span>' !!}
                    @enderror
                  </div>
                  <div class="form-group">
                    <div class="input-group main-rel">
                      <div class="input-icon  main-rel">
                        <i id="password_icon_hide" class="fa-solid fa-lock hide-this "
                          onclick="hidePassword('confirm_password')"></i>
                        <i id="password_icon_show" class="fa-solid fa-lock-open  "
                          onclick="showPassword('confirm_password')"></i>
                        <!-- <span id="password_icon_show" class="ti-eye" onclick="showPassword('password')"></span>
                                  <span id="password_icon_hide" class="ti-eye hide-this"
                                    onclick="hidePassword('password')"></span> -->
                      </div>
                      <input name="password" id="password" type="password" class="form-control" placeholder="Password">
                    </div>
                    <span class="text-danger">
                      @error('password')
                        {{ $message }}
                      @enderror
                    </span>
                  </div>
                  <div class="form-group">
                    <div class="input-group main-rel">
                      <div class="input-icon">
                        <i id="confirm_password_icon_hide" class="fa-solid fa-lock hide-this "
                          onclick="hidePassword('confirm_password')"></i>
                        <i id="confirm_password_icon_show" class="fa-solid fa-lock-open  "
                          onclick="showPassword('confirm_password')"></i>

                        <!-- <span id="confirm_password_icon_show" class="ti-eye"
                                    onclick="showPassword('confirm_password')"></span>
                                  <span id="confirm_password_icon_hide" class="ti-eye hide-this"
                                    onclick="hidePassword('confirm_password')"></span> -->
                      </div>
                      <input name="confirm_password" id="confirm_password" type="password" class="form-control"
                        placeholder="Confirm Password">
                    </div>
                    <span class="text-danger">
                      @error('confirm_password')
                        {{ $message }}
                      @enderror
                    </span>
                  </div>
                  <div class="form-group all-captcha">

                    <div class="input-group">
                      <div class="input-icon">
                        <!-- <span class="ti-captcha_answer"></span> -->
                        <label for="captcha_question">{{ $question['text'] }}</label>
                      </div>
                      <input type="number" name="captcha_answer" class="form-control"
                        placeholder="Enter Captcha Value" required="">
                    </div>
                    @error('captcha_answer')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <button type="submit" class="button home-btn py-2 w-100">Sign Up</button>
                  </div>
                  <div class="form-group text-center mb-0">
                    Are you a already member? &nbsp;&nbsp;
                    <a href="{{ url('/sign-in/?') }}{{ isset($_GET['return_to']) && $_GET['return_to'] != null ? 'return_to=' . $_GET['return_to'] : '' }}{{ isset($_GET['paper_id']) && $_GET['paper_id'] != null ? '&paper_id=' . $_GET['paper_id'] : '' }}"
                      class="theme-cl1">Sign In</a>
                  </div>
                </div>
              </form>
              @php
                $query = http_build_query([
                    'return_to' => request('return_to'),
                    'paper_id' => request('paper_id'),
                ]);
              @endphp

              <a href="{{ url('auth/google') . '?' . $query }}" class="btn btn-danger hide-this">
                Login with Google
              </a>
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
