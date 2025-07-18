@extends('front.layouts.main')
@push('seo_meta_tag')
  @include('front.layouts.form_page_meta_tag')
@endpush
@section('main-section')

  <div class="neet-counselling neet mt-md-5">
    <div class="row justify-content-center ">
      <div class="col-md-6 mx-auto">
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
        @error('captcha')
          <span class="text-danger">{{ $message }}</span>
        @enderror
        <div class="neet-counselling-box boxx">
          <h1>NEET Counselling</h1>
          <form class="ps-form--visa" action="{{ url('inquiry/submit-neet-inquiry') }}/" method="post">
            @csrf
            <input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response">
            <input type="hidden" name="source" value="Exam Form">
            <input type="hidden" name="source_path" value="{{ url()->previous() }}">
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
              <div class="col-6 col-lg-6 col-md-6 col-sm-6 col-xs-6 pl7">
                <div class="form-group">
                  <input type="text" class="form-control u-ltr" placeholder="Enter Mobile Number"
                    data-error="Please enter a valid phone number" name="mobile" id="mobile"
                    value="<?php echo old('mobile'); ?>" required>
                  @error('mobile')
                    {!! '<span class="text-danger">' . $message . '</span>' !!}
                  @enderror
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl7">
                <div class="form-group">
                  <input type="text" class="form-control u-ltr" placeholder="Enter State"
                    data-error="Please Enter State" name="state" id="state" value="<?php echo old('state'); ?>" required>
                  @error('state')
                    {!! '<span class="text-danger">' . $message . '</span>' !!}
                  @enderror
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl7">
                <div class="form-group">
                  <select class="form-control" name="neet_qualified" id="neet_qualified" required>
                    <option value="">Are you qualified NEET</option>
                    <option value="Yes" <?php echo old('neet_qualified') == 'Yes' ? 'selected' : ''; ?>>Yes</option>
                    <option value="No" <?php echo old('neet_qualified') == 'No' ? 'selected' : ''; ?>>No</option>
                  </select>
                  @error('neet_qualified')
                    {!! '<span class="text-danger">' . $message . '</span>' !!}
                  @enderror
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl7">
                <div class="form-group">
                  <select class="form-control" name="question" id="question" required>
                    <option value="">My Questions is regardiing</option>
                    <option value="Neet Counselling" <?php echo old('question') == 'Neet Counselling' ? 'selected' : ''; ?>>Neet Counselling</option>
                    <option value="MBBS Abroad Query" <?php echo old('question') == 'MBBS Abroad Query' ? 'selected' : '';
                    ?>>MBBS Abroad Query</option>
                    <option value="MBBS Abroad Scholarship" <?php echo old('question') == 'MBBS Abroad Scholarship' ? 'selected' : ''; ?>>MBBS Abroad Scholarship</option>
                    <option value="Visa Counselling" <?php echo old('question') == 'Visa Counselling' ? 'selected' : ''; ?>>Visa Counselling</option>
                  </select>
                  @error('question')
                    {!! '<span class="text-danger">' . $message . '</span>' !!}
                  @enderror
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl7">
                <div class="form-group">
                  <!-- <label for="captcha">Enter the CAPTCHA:</label><br> -->
                  <img src="{{ Captcha::src('math') }}" alt="CAPTCHA">
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl7">
                <div class="form-group">
                  <input type="text" id="captcha" name="captcha" placeholder="Enter the CAPTCHA" class="form-control">
                </div>
                @error('captcha')
                  {!! '<span class="text-danger">' . $message . '</span>' !!}
                @enderror
              </div>
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
  <div class="ps-search-trending tdd">
    <div class="container">
      <div class="text-center">
        <h2>Related Destinations</h2>
      </div>
      <div class="row">
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
          <a href="https://www.tutelagestudy.com/mbbs-in-malaysia/">
            <div class="ps-post ps-product shadow">
              <div class="ps-post__thumbnail"><img src="{{ asset('/front/') }}/img/mbbs-malaysia.jpg" alt="">
              </div>
              <div class="ps-post__content" style="border:0px; padding:12px 0px; background:#fff">
                <div class="ps-post__title text-center">MBBS IN MALAYSIA</div>
              </div>
            </div>
          </a>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
          <a href="https://www.tutelagestudy.com/mbbs-in-russia/">
            <div class="ps-post ps-product shadow">
              <div class="ps-post__thumbnail"><img src="{{ asset('/front/') }}/img/mbbs-russia.jpg" alt="">
              </div>
              <div class="ps-post__content" style="border:0px; padding:12px 0px; background:#fff">
                <div class="ps-post__title text-center">MBBA IN RUSSIA</div>
              </div>
            </div>
          </a>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
          <a href="https://www.tutelagestudy.com/mbbs-in-mauritius/">
            <div class="ps-post ps-product shadow">
              <div class="ps-post__thumbnail"><img src="{{ asset('/front/') }}/img/mbbs-mauritius.jpg" alt="">
              </div>
              <div class="ps-post__content" style="border:0px; padding:12px 0px; background:#fff">
                <div class="ps-post__title text-center">MBBS IN MAURITUS</div>
              </div>
            </div>
          </a>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
          <a href="https://www.tutelagestudy.com/mbbs-in-iran/">
            <div class="ps-post ps-product shadow">
              <div class="ps-post__thumbnail"><img src="{{ asset('/front/') }}/img/mbbs-iran.jpg" alt="">
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
