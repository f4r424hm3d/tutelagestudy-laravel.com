@extends('front.layouts.main')
@push('seo_meta_tag')
  @include('front.layouts.form_page_meta_tag')
@endpush
@section('main-section')
  <style>
    .mbbs-abroad-counselling {
      background: #eee;
      padding: 60px 15px
    }

    .mbbs-abroad-counselling img {
      border: 4px solid #fff;
      border-radius: 4px;
      box-shadow: 0px 0px 30px 0px rgb(0 0 0 / 20%);
      margin-bottom: 15px
    }

    .mbbs-abroad-counselling h1 {
      padding: 0px 0px 10px 0px;
      margin-top: 0px;
      margin-bottom: 15px;
      border-bottom: 1px dashed #cd2122;
      font-weight: 600
    }

    .mbbs-abroad-counselling select {
      appearance: none;
      -webkit-appearance: none;
      -moz-appearance: none;
      -ms-appearance: none;
      background-position: calc(100% - 12px) center !important;
      background: url("data:image/svg+xml,<svg height='10px' width='10px' viewBox='0 0 16 16' fill='%23000000' xmlns='http://www.w3.org/2000/svg'><path d='M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/></svg>") no-repeat;
      background-color: #fff
    }

    .form-control {
      background: #fff;
      padding: 5px 15px;
      height: 45px;
      border-radius: 4px
    }

    .pr7 {
      padding-right: 7px
    }

    .pl7 {
      padding-left: 7px
    }

    .ps-search-trending h2 {
      color: #fff;
      font-size: 28px;
      margin-bottom: 25px;
      padding: 0px 0px 10px 0px;
      border-bottom: 1px dashed #fff;
      font-weight: 600
    }

    @media (max-width:767px) {
      .mbbs-abroad-counselling {
        background: #eee;
        padding: 30px 15px
      }

      .mbbs-abroad-counselling img {
        display: none;
        margin-bottom: 10px;
      }

      .pr7 {
        padding-right: 15px
      }

      .pl7 {
        padding-left: 15px
      }

      .ps-search-trending h2 {
        font-size: 23px;
      }
    }
  </style>
  <div class="mbbs-abroad-counselling">
    <div class="row justify-content-center align-items-center">
      <div class="col-md-8">
        <?php if (session()->has('smsg')) { ?>
        <div class="alert alert-success alert-outline-coloured alert-dismissible" role="alert">
          <div class="alert-message">
            <strong>
              <?php echo session()->get('smsg'); ?>
            </strong>
          </div>
        </div>
        <?php } ?>
        <?php if (session()->has('emsg')) { ?>
        <div class="alert alert-danger alert-outline-coloured alert-dismissible" role="alert">
          <div class="alert-message">
            <strong>
              <?php echo session()->get('emsg'); ?>
            </strong>
          </div>
        </div>
        <?php } ?>
        @error('g-recaptcha-response')
          <span class="text-danger">{{ $message }}</span>
        @enderror
        <div class="row">
          <div class="col-md-5">
            <img data-src="https://www.tutelagestudy.com/uploads/destinations/IMG_20221213_105139.jpg" class="w-100" />
          </div>
          <div class="col-md-7">
            <h1>Apply Now for MBBS Upcoming Intake</h1>
            <form class="ps-form--visa" action="{{ url('inquiry/submit-mbbs-inquiry') }}/" method="post">
              @csrf
              <input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response">
              <input type="hidden" name="source" value="MBBS Abroad Counselling">
              <input type="hidden" name="source_path" value="{{ URL::full() }}">
              <input type="hidden" name="source_url" value="<?php echo $_GET['page'] ?? ''; ?>">
              <input type="hidden" name="page_url" value="{{ $page_url }}">
              <div class="row">
                <div class="col-lg-6 col-md-5 col-sm-12 col-xs-12 pr7">
                  <div class="form-group">
                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter Name"
                      value="{{ old('name') ?? '' }}" required>
                    @error('name')
                      {!! '<span class="text-danger">' . $message . '</span>' !!}
                    @enderror
                  </div>
                </div>
                <div class="col-lg-6 col-md-7 col-sm-12 col-xs-12 pl7">
                  <div class="form-group">
                    <input type="email" class="form-control" name="email" id="email"
                      value="{{ old('email') ?? '' }}" placeholder="Enter Email" required>
                    @error('email')
                      {!! '<span class="text-danger">' . $message . '</span>' !!}
                    @enderror
                  </div>
                </div>
                <div class="col-4 col-lg-4 col-md-4 col-sm-4 col-xs-6 pr7">
                  <div class="form-group">
                    <input type="c_code" class="form-control" name="c_code" id="c_code"
                      value="{{ old('c_code') ?? '91' }}" placeholder="Enter Country Code" required>
                    @error('c_code')
                      {!! '<span class="text-danger">' . $message . '</span>' !!}
                    @enderror
                  </div>
                </div>
                <div class="col-8 col-lg-8 col-md-8 col-sm-8 col-xs-6 pl7">
                  <div class="form-group">
                    <input type="text" class="form-control u-ltr" placeholder="Enter Mobile Number"
                      data-error="Please enter a valid phone number" name="mobile" id="mobile"
                      value="<?php echo old('mobile'); ?>" required>
                    @error('mobile')
                      {!! '<span class="text-danger">' . $message . '</span>' !!}
                    @enderror
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr7">
                  <div class="form-group">
                    <input type="nationality" class="form-control" name="nationality" id="nationality"
                      value="{{ old('nationality') ?? 'India' }}" placeholder="Enter Nationality" required>
                    @error('nationality')
                      {!! '<span class="text-danger">' . $message . '</span>' !!}
                    @enderror
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl7">
                  <div class="form-group">
                    <select class="form-control" name="destination" id="destination" required>
                      <option value="">Preferred MBBS Country</option>
                      <?php
                    foreach ($destinations as $row) {
                    ?>
                      <option value="<?php echo $row->page_name; ?>" <?php echo old('destination') == $row->page_name ? 'Selected' : ''; ?>>
                        <?php echo $row->page_name; ?>
                      </option>
                      <?php } ?>
                    </select>
                    @error('destination')
                      {!! '<span class="text-danger">' . $message . '</span>' !!}
                    @enderror
                  </div>
                </div>
                {{-- <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="form-group">
                  <div class="g-recaptcha" data-sitekey="6LfEJo4jAAAAAIEVgbaWIR-uic-I3h9RBYFCqOTS"></div>
                </div>
              </div> --}}
                <div class="form-group">
                  <div class="ps-checkbox pl-20">
                    <input class="form-control " type="checkbox" name="terms" id="terms" checked>
                    <label for="terms">I agree to the <a href="https://www.tutelagestudy.com/term-and-condition/"
                        style="color: blue;" target="_blank" rel="noopener noreferrer">terms & conditions</a> .*</label>
                    @error('terms')
                      {!! '<span class="text-danger">' . $message . '</span>' !!}
                    @enderror
                  </div>
                </div>
                <div class="form-group">
                  <div class="ps-checkbox pl-20">
                    <input class="form-control " type="checkbox" name="contact_me" id="contact_me" checked>
                    <label for="contact_me">Contact me by phone, email or SMS to assist me .*</label>
                    @error('contact_me')
                      {!! '<span class="text-danger">' . $message . '</span>' !!}
                    @enderror
                  </div>
                </div>
                <div class="form-group">
                  <div class="ps-checkbox pl-20">
                    <input class="form-control" type="checkbox" name="update" id="update" checked>
                    <label for="update">I would like to receive updates and offers from Tutelage Study.*</label>
                  </div>
                </div>
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                  <button type="submit" class="ps-btn ps-btn--fullwidth">Submit</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="ps-search-trending">
    <div class="container">
      <div class="text-center">
        <h2 style="color:#fff!important">Related Destinations</h2>
      </div>
      <div class="row">
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
          <a href="https://www.tutelagestudy.com/mbbs-in-malaysia/">
            <div class="ps-post ps-product shadow">
              <div class="ps-post__thumbnail"><img data-src="{{ asset('/front/') }}/img/mbbs-malaysia.jpg"
                  alt=""></div>
              <div class="ps-post__content" style="border:0px; padding:12px 0px; background:#fff">
                <div class="ps-post__title text-center">MBBS IN MALAYSIA</div>
              </div>
            </div>
          </a>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
          <a href="https://www.tutelagestudy.com/mbbs-in-russia/">
            <div class="ps-post ps-product shadow">
              <div class="ps-post__thumbnail"><img data-src="{{ asset('/front/') }}/img/mbbs-russia.jpg"
                  alt=""></div>
              <div class="ps-post__content" style="border:0px; padding:12px 0px; background:#fff">
                <div class="ps-post__title text-center">MBBA IN RUSSIA</div>
              </div>
            </div>
          </a>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
          <a href="https://www.tutelagestudy.com/mbbs-in-mauritius/">
            <div class="ps-post ps-product shadow">
              <div class="ps-post__thumbnail"><img data-src="{{ asset('/front/') }}/img/mbbs-mauritius.jpg"
                  alt=""></div>
              <div class="ps-post__content" style="border:0px; padding:12px 0px; background:#fff">
                <div class="ps-post__title text-center">MBBS IN MAURITUS</div>
              </div>
            </div>
          </a>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
          <a href="https://www.tutelagestudy.com/mbbs-in-iran/">
            <div class="ps-post ps-product shadow">
              <div class="ps-post__thumbnail"><img data-src="{{ asset('/front/') }}/img/mbbs-iran.jpg" alt="">
              </div>
              <div class="ps-post__content" style="border:0px; padding:12px 0px; background:#fff">
                <div class="ps-post__title text-center">MBBS IN IRAN</div>
              </div>
            </div>
          </a>
        </div>
      </div>
      <div class="pt-20" align="center"><a href="/destinations/" target="_blank" rel="noopener noreferrer"
          class="button home-btn">Browse All Destinations</a></div>
    </div>
  </div>
  <script>
    grecaptcha.ready(function() {
      grecaptcha.execute('{{ gr_site_key() }}', {
          action: 'contact_us'
        })
        .then(function(token) {
          // Set the reCAPTCHA token in the hidden input field
          document.getElementById('g-recaptcha-response').value = token;
        });
    });
  </script>
@endsection
