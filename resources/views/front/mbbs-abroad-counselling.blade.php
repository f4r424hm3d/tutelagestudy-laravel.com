@extends('front.layouts.main')
@push('seo_meta_tag')
  @include('front.layouts.form_page_meta_tag')
@endpush
@section('main-section')
  <div class="mbbs-abroad-counselling counsel mt-5">
    <div class="row justify-content-center align-items-center">
      <div class="col-12 col-sm-12  col-md-10 col-lg-8 mx-auto">
        @if (session()->has('smsg'))
          <div class="alert alert-success alert-outline-coloured alert-dismissible" role="alert">
            <div class="alert-message">
              <strong>
                {{ session()->get('smsg') }}
              </strong>
            </div>
          </div>
        @endif
        @if (session()->has('emsg'))
          <div class="alert alert-danger alert-outline-coloured alert-dismissible" role="alert">
            <div class="alert-message">
              <strong>
                {{ session()->get('emsg') }}
              </strong>
            </div>
          </div>
        @endif
        @error('g-recaptcha-response')
          <span class="text-danger">{{ $message }}</span>
        @enderror
        @error('captcha')
          <span class="text-danger">{{ $message }}</span>
        @enderror
        <div class="applyfroms main-appply main">
          <h1>Apply Now for MBBS Upcoming Intake & Free Couselling Session</h1>
          <form class="ps-form--visa" action="{{ url('inquiry/submit-mbbs-inquiry') }}/" method="post">
            @csrf
            <input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response">
            <input type="hidden" name="source" value="MBBS Abroad Counselling">
            <input type="hidden" name="source_path" value="{{ url()->previous() }}">
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6 col-12 ">
                <div class="form-group">
                  <input type="text" name="name" id="name" class="form-control" placeholder="Enter Name"
                    value="{{ old('name') ?? '' }}" required>
                  @error('name')
                    {!! '<span class="text-danger">' . $message . '</span>' !!}
                  @enderror
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="form-group">
                  <input type="email" class="form-control" name="email" id="email"
                    value="{{ old('email') ?? '' }}" placeholder="Enter Email" required>
                  @error('email')
                    {!! '<span class="text-danger">' . $message . '</span>' !!}
                  @enderror
                </div>
              </div>
              <div class="col-12 col-sm-2 col-md-2  col-lg-2">
                <div class="form-group">
                  <input type="c_code" class="form-control" name="c_code" id="c_code"
                    value="{{ old('c_code') ?? '91' }}" placeholder="Enter Country Code" required>
                  @error('c_code')
                    {!! '<span class="text-danger">' . $message . '</span>' !!}
                  @enderror
                </div>
              </div>
              <div class="col-12 col-sm-10 col-md-10  col-lg-10">
                <div class="form-group">
                  <input type="text" class="form-control u-ltr" placeholder="Enter Mobile Number"
                    data-error="Please enter a valid phone number" name="mobile" id="mobile"
                    value="{{ old('mobile') }}" required>
                  @error('mobile')
                    {!! '<span class="text-danger">' . $message . '</span>' !!}
                  @enderror
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6  ">
                <div class="form-group">
                  <input type="nationality" class="form-control" name="nationality" id="nationality"
                    value="{{ old('nationality') ?? 'India' }}" placeholder="Enter Nationality" required>
                  @error('nationality')
                    {!! '<span class="text-danger">' . $message . '</span>' !!}
                  @enderror
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-group">
                  <select class="form-control" name="destination" id="destination" required>
                    <option value="">Preferred MBBS Country</option>

                    @foreach ($destinations as $row)
                      <option value="{{ $row->page_name }}"
                        {{ old('destination') == $row->page_name ? 'Selected' : '' }}>
                        {{ $row->page_name }}
                      </option>
                    @endforeach
                  </select>
                  @error('destination')
                    {!! '<span class="text-danger">' . $message . '</span>' !!}
                  @enderror
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-5">
                <div class="d-flex align-items-center full-captcha  form-group">
                  <!-- <label class="mr-2 mb-0" for="captcha">CAPTCHA:</label> -->
                  <img class="mb-0" src="{{ Captcha::src('math/') }}" alt="CAPTCHA">
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-7">
                <div class="form-group">
                  <input type="text" id="captcha" placeholder="Enter the captcha" name="captcha"
                    class="form-control">
                </div>
                @error('captcha')
                  {!! '<span class="text-danger">' . $message . '</span>' !!}
                @enderror
              </div>
              <div class="col-12">
                <div class="form-group">
                  <div class="ps-checkbox">
                    <input class="form-control " type="checkbox" name="terms" id="terms" required>
                    <label for="terms">I agree to the <a href="{{ url('/') }}/term-and-condition/"
                        style="color: blue;" target="_blank" rel="noopener noreferrer">terms & conditions</a>
                      .*</label>
                    @error('terms')
                      {!! '<span class="text-danger">' . $message . '</span>' !!}
                    @enderror
                  </div>
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <div class="ps-checkbox ">
                    <input class="form-control " type="checkbox" name="contact_me" id="contact_me" required>
                    <label for="contact_me">Contact me by phone, email or SMS to assist me .*</label>
                    @error('contact_me')
                      {!! '<span class="text-danger">' . $message . '</span>' !!}
                    @enderror
                  </div>
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <div class="ps-checkbox ">
                    <input class="form-control" type="checkbox" name="update" id="update" required>
                    <label for="update">I would like to receive updates and offers from Tutelage Study.*</label>
                  </div>
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
  <div class="ps-search-trending trend">
    <div class="container">
      <div class="text-center">
        <h2 style="color:#fff!important">Related Destinations</h2>
      </div>
      <div class="row">
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
          <a href="{{ url('/') }}/destinations/mbbs-in-malaysia/">
            <div class="ps-post ps-product shadow">
              <div class="ps-post__thumbnail"><img src="{{ cdn('/front/') }}/img/mbbs-malaysia.jpg" alt="">
              </div>
              <div class="ps-post__content" style="border:0px; padding:12px 0px; background:#fff">
                <div class="ps-post__title text-center">MBBS IN MALAYSIA</div>
              </div>
            </div>
          </a>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
          <a href="{{ url('/') }}/destinations/mbbs-in-russia/">
            <div class="ps-post ps-product shadow">
              <div class="ps-post__thumbnail"><img src="{{ cdn('/front/') }}/img/mbbs-russia.jpg" alt="">
              </div>
              <div class="ps-post__content" style="border:0px; padding:12px 0px; background:#fff">
                <div class="ps-post__title text-center">MBBS IN RUSSIA</div>
              </div>
            </div>
          </a>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
          <a href="{{ url('/') }}/destinations/mbbs-in-mauritius/">
            <div class="ps-post ps-product shadow">
              <div class="ps-post__thumbnail"><img src="{{ cdn('/front/') }}/img/mbbs-mauritius.jpg" alt="">
              </div>
              <div class="ps-post__content" style="border:0px; padding:12px 0px; background:#fff">
                <div class="ps-post__title text-center">MBBS IN MAURITUS</div>
              </div>
            </div>
          </a>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
          <a href="{{ url('/') }}/destinations/mbbs-in-iran/">
            <div class="ps-post ps-product shadow">
              <div class="ps-post__thumbnail"><img src="{{ cdn('/front/') }}/img/mbbs-iran.jpg" alt="">
              </div>
              <div class="ps-post__content" style="border:0px; padding:12px 0px; background:#fff">
                <div class="ps-post__title text-center">MBBS IN IRAN</div>
              </div>
            </div>
          </a>
        </div>
      </div>
      <div class="pt-20" align="center"><a href="{{ url('/destinations/') }}" target="_blank"
          rel="noopener noreferrer" class="button home-btn">Browse All Destinations</a></div>
    </div>
  </div></br>
  <div class="container">
    <div class="ps-product__box mb-20" id="2">
      <aside class="widget widget_best-sale" data-mh="dealhot">
        <h3 class="widget-title">You might be interested in related destination</h3>
        <div class="widget__content">
          <div class="owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000" data-owl-gap="0"
            data-owl-nav="false" data-owl-dots="false" data-owl-item="4" data-owl-item-xs="2" data-owl-item-sm="2"
            data-owl-item-md="4" data-owl-item-lg="4" data-owl-duration="1000" data-owl-mousedrag="on">
            @foreach ($destinations as $oe)
              <div class="ps-product-group">
                <div class="ps-product--horizontal">
                  <div class="ps-product__thumbnail ml-10" style="background:#fff">
                    <img src="{{ cdn($oe->thumbnail) }}" alt="{{ $oe->page_name }}" loading="lazy">
                  </div>
                  <div class="ps-product__content">
                    <a class="ps-product__title"
                      href="{{ route('destination.detail', ['destination_slug' => $oe->slug]) }}/">
                      {{ $oe->page_name }}
                    </a>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </aside>
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
