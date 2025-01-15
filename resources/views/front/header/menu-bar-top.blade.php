@php
  use App\Models\News;
  use App\Models\Destination;
  use App\Models\Country;

  $destinationsSF = Destination::where(['status' => 1])->get();
  $phonecodesSF = Country::select('phonecode', 'name')
      ->where('phonecode', '!=', '0')
      ->orderBy('phonecode', 'asc')
      ->get();
  $countriesSF = Country::orderBy('name', 'asc')->get();

@endphp
<style>
  .hide-this {
    display: none;
  }
</style>

<body>
  <!-- Google Tag Manager (noscript) -->
  <noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-T4ZDHCD" height="0" width="0"
      style="display:none;visibility:hidden"></iframe>
  </noscript>
  <!-- End Google Tag Manager (noscript) -->
  <header class="header header--1">
    <div class="header__top">
      <div class="ps-container">
        <div class="header__left">
          <a class="ps-logo" href="<?php echo url('/'); ?>"><img src="{{ url('front/') }}/img/logo_light.png"
              alt="Tutelage Study logo"></a>
        </div>
        <div class="header__center">
          <form class="ps-form--quick-search" action="{{ url('medical-universities/') }}" method="get">
            <input class="form-control" name="search" type="text" placeholder="Search Universities"
              id="input-search" value="{{ request('search', '') }}">
            <button>Search</button>
          </form>
        </div>
        <div class="header__right">
          <div class="header__actions">
            <div class="ps-block--user-header">
              <!-- <div class="ps-block__left"><i class="icon-envelope-open"></i></div>&nbsp;&nbsp; -->
              <div class="ps-block__right">
                <a class="ps-btn" href="https://www.tutelagestudy.com/mbbs-abroad-counselling/">Free MBBS Counselling
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <nav class="navigation">
      <div class="ps-container">
        <div class="navigation__left">
          <div class="menu--product-categories">
            <div class="menu__toggle"><i class="icon-menu"></i><a href="{{ url('blog') }}/">Blog</a></div>
            <div class="menu__content">
              <ul class="menu--dropdown">
                @php
                  $allcat = News::orderBy('id', 'asc')->distinct('cate_id')->get();
                @endphp
                @foreach ($allcat as $cat)
                  <li class="current-menu-item">
                    <a href="<?php echo url('blog/' . $cat->cate_slug); ?>/"><i class="icon-star"></i> {{ $cat->getCategory->cate_name }}</a>
                  </li>
                @endforeach
              </ul>
            </div>
          </div>
        </div>
        <div class="navigation__right">
          <ul class="menu">
            <li><a href="<?php echo url('/'); ?>">Home</a><span class="sub-toggle"></span> </li>

            <li><a href="<?php echo url('medical-universities'); ?>/">All Universities</a><span class="sub-toggle"></span></li>
            <li><a href="<?php echo url('mbbs-in-abroad'); ?>/">MBBS Abroad</a><span class="sub-toggle"></span></li>

            <li class="menu-item-has-children has-mega-menu">
              <a href="javascript:void()">Destinations</a>
              <span class="sub-toggle"></span>
              <div class="mega-menu">
                <div class="mega-menu__column">
                  <ul class="mega-menu__list">
                    @php
                      $destinations = Destination::where(['status' => 1])
                          ->inRandomOrder()
                          ->limit(10)
                          ->get();
                    @endphp
                    @foreach ($destinations as $row)
                      <li class="current-menu-item"><a href="{{ url($row->slug) }}/">
                          {{ ucwords($row->page_name) }}
                        </a> </li>
                    @endforeach
                    <br>
                    <a href="{{ url('destinations') }}/" class="ps-btn btn">MBBS Countries</a>
                  </ul>
                </div>
              </div>
            </li>

            <li><a href="<?php echo url('services'); ?>/">Services</a><span class="sub-toggle"></span></li>

            <li class="menu-item-has-children has-mega-menu">
              <a href="javascript:void()">Exams</a>
              <span class="sub-toggle"></span>
              <div class="mega-menu">
                <div class="mega-menu__column">
                  <ul class="mega-menu__list">
                    <li class="current-menu-item"><a href="{{ url('neet-ug') }}/">NEET UG</a></li>
                    <li class="current-menu-item"><a href="{{ url('plab-exam') }}/">PLAB Exam</a></li>
                  </ul>
                </div>
              </div>
            </li>

        </div>
      </div>
    </nav>
  </header>
  <header class="header header--mobile" data-sticky="false">
    <div class="navigation--mobile">
      <div class="navigation__left">
        <a class="ps-logo" href="{{ url('/') }}">
          <img src="{{ url('front/') }}/img/logo_light.png" alt="Tutelage Study logo">
        </a>
      </div>

    </div>
  </header>
  <div class="ps-panel--sidebar" id="navigation-mobile">
    <div class="ps-panel__header">
      <h3>Download Brochure</h3>
    </div>
    <div class="ps-panel__content">

      @error('g-recaptcha-response')
        <span class="text-danger">{{ $message }}</span>
      @enderror
      @error('captcha')
        <span class="text-danger">{{ $message }}</span>
      @enderror
      <form action="{{ url('inquiry/download-brochure') }}/" method="post">
        @csrf
        <input type="hidden" name="source" value="Brochure">
        <input type="hidden" name="source_path" value="{{ url()->current() }}">
        <div class="ps-form__content" style="padding:20px">
          <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
              <div class="ps-form__billing-info">
                <div class="row">
                  <div class="col-sm-5">
                    <div class="form-group">
                      <input type="text" name="user_name" id="b-name" class="form-control"
                        placeholder="Enter Name" value="{{ old('user_name') ?? '' }}" required>
                      @error('user_name')
                        {!! '<span class="text-danger">' . $message . '</span>' !!}
                      @enderror
                    </div>
                  </div>
                  <div class="col-sm-7">
                    <div class="form-group">
                      <input type="email" class="form-control" name="user_email" id="b-email"
                        value="{{ old('user_email') ?? '' }}" placeholder="Enter Email" required>
                      @error('user_email')
                        {!! '<span class="text-danger">' . $message . '</span>' !!}
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-3">
                    <div class="form-group">
                      <input type="number" class="form-control" name="user_country_code" id="b-c_code"
                        value="{{ old('user_country_code') ?? '91' }}" placeholder="Country Code" required>
                      @error('user_country_code')
                        {!! '<span class="text-danger">' . $message . '</span>' !!}
                      @enderror
                    </div>
                  </div>
                  <div class="col-sm-9">
                    <div class="form-group">
                      <input type="text" class="form-control u-ltr" placeholder="Enter Mobile Number"
                        data-error="Please enter a valid phone number" name="user_mobile" id="b-mobile"
                        value="<?php echo old('user_mobile'); ?>" required>
                      @error('user_mobile')
                        {!! '<span class="text-danger">' . $message . '</span>' !!}
                      @enderror
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl7">
                    <div class="form-group">
                      <label for="captcha">Enter the CAPTCHA:</label><br>
                      <img src="{{ Captcha::src('math') }}" alt="CAPTCHA">
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl7">
                    <div class="form-group">
                      <input type="text" id="captcha" name="text_captcha" class="form-control">
                    </div>
                    @error('text_captcha')
                      {!! '<span class="text-danger">' . $message . '</span>' !!}
                    @enderror
                  </div>
                </div>

                <div class="form-group">
                  <label for="keep-update">
                    By clicking Submit, you agree to our
                    <a href="{{ url('term-and-condition') }}/" class="b black">Terms and
                      Conditions</a> & <a href="{{ url('privacy-policy') }}/" class="b black">
                      Privacy Policy
                    </a>
                  </label>
                </div>
                <button class="ps-btn w-100" type="submit">
                  <span class="b">Download</span>
                </button>
              </div>
            </div>
          </div>
        </div>
      </form>

    </div>
  </div>
  <div class="navigation--list">
    <div class="navigation__content">
      <a class="navigation__item ps-toggle--sidebar" href="#menu-mobile" aria-label="Left Align">
        <i class="icon-menu" aria-hidden="true"></i><span> Menu</span>
      </a>
      <a class="navigation__item ps-toggle--sidebar" href="#navigation-mobile" aria-label="Left Align">
        <i class="icon-list4" aria-hidden="true"></i><span> Brochure</span>
      </a>
      <!--<a class="navigation__item ps-toggle--sidebar" href="#search-sidebar" aria-label="Left Align">-->
      <a href="https://www.tutelagestudy.com/mbbs-abroad-counselling/">
        <i class="icon-pencil-line" aria-hidden="true"></i><span> Enquire Now</span>
      </a>
    </div>
  </div>
  <div class="ps-panel--sidebar" id="search-sidebar">
    <div class="ps-panel__header">
      <form class="ps-form--search-mobile" action="{{ url('medical-universities/') }}/" method="get">
        <div class="form-group--nest">
          <input class="form-control" type="text" name="search"
            value="{{ isset($_GET['search']) ? $_GET['search'] : '' }}" placeholder="Search Universities...">
          <button aria-label="Left Align" type="submit"><i class="icon-magnifier" aria-hidden="true"></i></button>
        </div>
      </form>
    </div>

  </div>
  <div class="ps-panel--sidebar" id="menu-mobile">
    <div class="ps-panel__header">
      <h3>Menu</h3>
    </div>
    <div class="ps-panel__content">
      <ul class="menu--mobile">
        <li><a href="{{ url('/') }}">Home</a><span class="sub-toggle"></span></li>
        <li><a href="{{ url('medical-universities') }}/">All Universities</a><span class="sub-toggle"></span>
        </li>
        <li><a href="{{ url('mbbs-in-abroad') }}/">MBBS Abroad</a><span class="sub-toggle"></span></li>
        <li class="menu-item-has-children has-mega-menu">
          <a href="javascript:void()">Destinations</a>
          <span class="sub-toggle"></span>
          <div class="mega-menu">
            <div class="mega-menu__column">
              <ul class="mega-menu__list" style="display:block">
                @php
                  $destinations = Destination::where(['status' => 1])
                      ->inRandomOrder()
                      ->get();
                @endphp
                @foreach ($destinations as $row)
                  <li class="current-menu-item"><a href="{{ url($row->slug) }}/">
                      {{ ucwords($row->page_name) }}
                    </a> </li>
                @endforeach
                <br>
                <a href="{{ url('destinations') }}/" class="ps-btn btn">MBBS Countries</a>
              </ul>
            </div>
          </div>
        </li>
        <li>
          <a href="<?php echo url('services'); ?>/">Our Services</a><span class="sub-toggle"></span>
        </li>
        <li class="menu-item-has-children has-mega-menu">
          <a href="javascript:void()">Exams</a>
          <span class="sub-toggle"></span>
          <div class="mega-menu">
            <div class="mega-menu__column">
              <ul class="mega-menu__list" style="display:block">
                <li class="current-menu-item"><a href="<?php echo url('neet-ug'); ?>/">NEET UG</a> </li>
                <li class="current-menu-item"><a href="<?php echo url('plab-exam'); ?>/">PLAB Exam</a> </li>
              </ul>
            </div>
          </div>
        </li>
        <li>
          <a href="{{ url('about-us') }}/">About Tutelage Study</a><span class="sub-toggle"></span>
        </li>
      </ul>
    </div>
  </div>

  <script>
    getFormData();

    function getFormData() {

      return new Promise(function(resolve, reject) {
        $.ajax({
          url: "{{ url('form/getCountryCode') }}/",
          method: "GET",
          success: function(data) {
            //alert(data);
            //alert("Hello");
            $("#mb_c_code").html(data);
          }
        });
        $.ajax({
          url: "{{ url('form/getCountry') }}/",
          method: "GET",
          success: function(data) {
            //alert(data);
            //alert("Hello");
            $("#mf_nationality").html(data);
          }
        });
      });
    }
  </script>
  <script>
    grecaptcha.ready(function() {
      grecaptcha.execute('{{ gr_site_key() }}', {
          action: 'contact_us'
        })
        .then(function(token) {
          // Set the reCAPTCHA token in the hidden input field
          document.getElementById('g-recaptcha-response-smi').value = token;
        });
    });

    grecaptcha.ready(function() {
      grecaptcha.execute('{{ gr_site_key() }}', {
          action: 'contact_us'
        })
        .then(function(token) {
          // Set the reCAPTCHA token in the hidden input field
          document.getElementById('g-recaptcha-response-db').value = token;
        });
    });
  </script>
