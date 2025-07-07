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

  <!-- Modal -->
  <div class="modal counselling-main fade" id="exampleModalCenter" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">

      <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <div class="counselling-impt">
          <!-- <img src="/front/img/free-counselling.png" alt=""> -->
          <img src="{{ url('front/') }}/img/logo_light.png" alt="Tutelage Study logo">
        </div>
        <div class="modal-header">
          <h5 class="modal-title">Study MBBS Abroad Most Affordable MBBS Package
            <p class="goldden"> ( UpTo 100% Scholarship by Gyandeep NGO )
            </p>
            <div class="bouncediv"><i class="fa fa-phone mr-2" aria-hidden="true"></i>
              Free Counselling
          </h5>
        </div>
        <div class="modal-body pb-0">
          <form id="counsellingForm" class="row">
            <input type="hidden" name="return_to" value="{{ request()->path() }}">
            <input type="hidden" name="source" value="Modal Form">
            <input type="hidden" name="source_path" value="{{ url()->current() }}">
            <div class="col-12 col-sm-12">
              <div class="form-group">
                <input type="text" name="name" class="form-control" placeholder="Full Name">
                <span class="text-danger error-name"></span>
              </div>
            </div>
            <div class="col-12 col-sm-12">
              <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="Email">
                <span class="text-danger error-email"></span>
              </div>
            </div>
            <div class="col-12 col-sm-12">
              <div class="form-group">
                <div class="d-flex set-counsell">
                  {{-- <input type="text" name="c_code" class="form-control mobiles" placeholder="Country Code"> --}}
                  <select name="c_code" id="c_code" class="form-control">
                    <option value="">Country Code</option>
                    @foreach ($phonecodesSF as $item)
                      <option value="{{ $item->phonecode }}">{{ $item->phonecode }} ({{ $item->name }})</option>
                    @endforeach
                  </select>
                  <input type="text" name="mobile" class="form-control" placeholder="Mobile Number">
                </div>
                <span class="text-danger error-c_code"></span>
                <span class="text-danger error-mobile"></span>
              </div>
            </div>
            <div class="col-12 col-sm-4">
              <div class="form-group">
                {{-- <input type="text" name="nationality" class="form-control" placeholder="Nationality"> --}}
                <select name="nationality" id="nationality" class="form-control">
                  <option value="">Nationality</option>
                  @foreach ($countriesSF as $item)
                    <option value="{{ $item->name }}">{{ $item->name }}</option>
                  @endforeach
                </select>
                <span class="text-danger error-nationality"></span>
              </div>
            </div>
            <div class="col-12 col-sm-8">
              <div class="form-group">
                <select class="form-control" name="destination">
                  <option value="">Preferred MBBS Country</option>
                  @foreach ($preferredMbbsCountries as $row)
                    <option value="{{ $row->page_name }}" {{ old('destination') == $row->page_name ? 'Selected' : '' }}>
                      {{ $row->page_name }}
                    </option>
                  @endforeach
                </select>
                <span class="text-danger error-destination"></span>
              </div>
            </div>
            <div class="col-12 text-center">
              <button type="submit" class="btn btn-primary  popup-submit" id="submitBtn">Submit</button>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>

  <header class="header header--1 ">
    <div class="header__top">
      <div class="ps-container">
        <div class="header__left">
          <a class="ps-logo" href="<?php echo url('/'); ?>"><img src="{{ url('front/') }}/img/logo_light.png"
              alt="Tutelage Study logo"></a>
        </div>
        <div class="d-flex main-headcenter ">
          <div class="header__center">
            <form class="ps-form--quick-search" action="{{ url('medical-universities/') }}" method="get">
              <input class="form-control" name="search" type="text" placeholder="Search Universities"
                id="input-search" value="{{ request('search', '') }}">
              <button><i class="fa-solid fa-magnifying-glass search-iconss"></i></button>
            </form>
          </div>
          <div class="header__right">
            <div class="header__actions">
              <div class="ps-block--user-header">
                <!-- <div class="ps-block__left"><i class="icon-envelope-open"></i></div>&nbsp;&nbsp; -->
                <div class="ps-block__right btns-block">
                  <a class="ps-btn" href="https://www.tutelagestudy.com/mbbs-abroad-counselling/">Free MBBS
                    Counselling
                  </a>
                </div>
              </div>
            </div>
          </div>
          <div class="d-flex btn-profiles">
            @if (session()->has('studentLoggedIn'))
              <div class="dropdown profile-show">
                <button class="ps-btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="false">
                  <i class="fa-solid fa-user mr-2"></i> {{ session('student_name') }}
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="{{ url('student/profile') }}"><i class="fa-solid fa-user mr-2"></i>
                    Profile</a>
                  <a class="dropdown-item" href="{{ url('student/logout') }}"><i class="fa fa-sign-out mr-2"
                      aria-hidden="true"></i>
                    Sign Out</a>
                </div>
              </div>
            @else
              <a href="{{ url('sign-in') }}" class="ps-btn">Sign in</a>
              <a href="{{ url('sign-up') }}" class="btn btn-outline-primary">Sign up</a>
            @endif

          </div>

        </div>

      </div>
    </div>
    <nav class="navigation sticky-head">
      <div class="ps-container">
        <div class="navigation__left">
          <ul class="menu">
            <li><a href="<?php echo url('blog'); ?>"><i class="icon-menu"></i> Blog</a><span class="sub-toggle"></span>
            </li>
          </ul>

        </div>
        <div class="navigation__right">
          <ul class="menu">
            <li><a href="<?php echo url('/'); ?>">Home</a><span class="sub-toggle"></span> </li>

            <li><a href="<?php echo url('medical-universities'); ?>/">Medical Universities</a><span class="sub-toggle"></span></li>
            <li><a href="<?php echo url('mbbs-in-abroad'); ?>/">MBBS Abroad</a><span class="sub-toggle"></span></li>

            <li class="menu-item-has-children has-mega-menu">
              <a href="{{ url('destinations') }}/">Destinations</a>
              <span class="sub-toggle"></span>
              <div class="mega-menu">
                <div class="mega-menu__column p-0">
                  <ul class="mega-menu__list">
                    @foreach ($destinationsInLimit as $row)
                      <li class="current-menu-item"><a
                          href="{{ route('destination.detail', ['destination_slug' => $row->slug]) }}/">
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

            <li class="menu-item-has-children has-mega-menu exam-mega">
              <a href="javascript:void()">Exams</a>
              <span class="sub-toggle"></span>
              <div class="mega-menu">
                <div class="mega-menu__column p-0">
                  <ul class="mega-menu__list">

                    <div class="row">
                      <div class="col-12 col-sm-6 col-md-3 col-lg-4 col-xl-4 mb-3">
                        <ul class="meet-us">
                          <a class="ug-link" href=" https://www.tutelagestudy.com/neet-ug/">NEET UG</a>
                          @foreach ($examTypes as $row)
                            <li><a
                                href="{{ route('paper1', ['exam_type_slug' => $row->exam_type_slug, 'exam_type_title_slug' => $row->slug]) }}/">{{ $row->title }}</a>
                            </li>
                          @endforeach
                        </ul>

                      </div>
                      <div class="col-12 col-sm-6 col-md-3 col-lg-4 col-xl-4 mb-3">
                        <ul class="meet-us">
                          <a class="ug-link" href=" https://www.tutelagestudy.com/neet-pg/">NEET PG</a>
                          @foreach ($examTypesPg as $row)
                            <li><a
                                href="{{ route('paper1', ['exam_type_slug' => $row->exam_type_slug, 'exam_type_title_slug' => $row->slug]) }}/">{{ $row->title }}</a>
                            </li>
                          @endforeach
                        </ul>

                      </div>
                      <div class="col-12 col-sm-6 col-md-3 col-lg-4 col-xl-4 mb-3">
                        <ul class="meet-us">
                          <p>Medical Licensing Exams</p>
                          <li><a href="#">NEXT Exam</a></li>
                          <li><a href="#">FMGE Exam</a></li>
                          <li><a href="{{ url('plab-exam') }}/">PLAB Exam</a></li>
                          <li><a href="#">PLAB Exam 2025</a></li>
                          <li><a href="#">PLAB Exam Syllabus</a></li>
                        </ul>
                      </div>

                    </div>

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
      <h3>Download Brochure</h3> <a href="#navigation-mobile" class="ps-toggle--sidebar mainclose"
        id="navigation-mobile"><i class="fa fa-times  " aria-hidden="true"></i></a>

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
                  <div class="col-lg-6 col-md-6 col-sm-6 col-5 pl7">
                    <div class="form-group">
                      <!-- <label for="captcha">Enter the CAPTCHA:</label><br> -->
                      <img src="{{ Captcha::src('math') }}" alt="CAPTCHA">
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 col-7 pl7">
                    <div class="form-group">
                      <input type="text" id="captcha" placeholder="Enter the CAPTCHA" name="text_captcha"
                        class="form-control">
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
      <a class="navigation__item" href="https://www.tutelagestudy.com/mbbs-abroad-counselling/">
        <i class="icon-pencil-line" aria-hidden="true"></i><span> Enquire</span>
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
                @foreach ($preferredMbbsCountries as $row)
                  <li class="current-menu-item"><a
                      href="{{ route('destination.detail', ['destination_slug' => $row->slug]) }}/">
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
            <div class="mega-menu__column p-0">

              <ul class="mega-menu__list menu-lists " style="display:block">

                <div class="row">
                  <div class="col-12 col-sm-6 col-md-3 col-lg-4 col-xl-4 mb-3">
                    <ul class="meet-us">
                      <a class="ug-link  " href=" https://www.tutelagestudy.com/neet-ug/">NEET UG</a>
                      @foreach ($examTypes as $row)
                        <li><a
                            href="{{ route('paper1', ['exam_type_slug' => $row->exam_type_slug, 'exam_type_title_slug' => $row->slug]) }}/">{{ $row->title }}</a>
                        </li>
                      @endforeach
                    </ul>

                  </div>
                  <div class="col-12 col-sm-6 col-md-3 col-lg-4 col-xl-4 mb-3">
                    <ul class="meet-us">
                      <a class="ug-link  " href=" https://www.tutelagestudy.com/neet-pg/">NEET PG</a>
                      @foreach ($examTypesPg as $row)
                        <li><a
                            href="{{ route('paper1', ['exam_type_slug' => $row->exam_type_slug, 'exam_type_title_slug' => $row->slug]) }}/">{{ $row->title }}</a>
                        </li>
                      @endforeach
                    </ul>

                  </div>
                  <div class="col-12 col-sm-6 col-md-3 col-lg-4 col-xl-4 mb-3">
                    <ul class="meet-us">
                      <p>Medical Licensing Exams</p>
                      <li><a href="#">NEXT Exam</a></li>
                      <li><a href="#">FMGE Exam</a></li>
                      <li><a href="{{ url('plab-exam') }}/">PLAB Exam</a></li>
                      <li><a href="#">PLAB Exam 2025</a></li>
                      <li><a href="#">PLAB Exam Syllabus</a></li>
                    </ul>
                  </div>

                </div>
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

  <!-- gourav jquery added -->
  <script>
    $(document).ready(function() {
      $(window).scroll(function() {
        if ($(this).scrollTop() > 90) {
          $(".sticky-head").css("top", "0px");
        } else {
          $(".sticky-head").css("top", "90px");
        }
      });
    });
  </script>
  <script>
    const studentLoggedIn = {{ session()->has('studentLoggedIn') ? 'true' : 'false' }};
    const excludedPaths = [
      '/sign-in/',
      '/sign-up/',
      '/mbbs-abroad-counselling/',
      '/neet-counselling/'
    ];
    $(document).ready(function() {
      const modalKey = 'counselling_modal_status';
      const currentPath = window.location.pathname;
      // Do not show modal on excluded pages
      if (excludedPaths.includes(currentPath)) {
        return;
      }

      function openModal() {
        $('#exampleModalCenter').modal('show');
      }

      let modalStatus = localStorage.getItem(modalKey);

      if (!studentLoggedIn && modalStatus !== 'submitted') {
        if (modalStatus !== 'closed') {
          openModal();
        } else {
          const lastClosed = localStorage.getItem('counselling_modal_closed_time');
          if (lastClosed) {
            const diff = Date.now() - parseInt(lastClosed);
            // if (diff > 5 * 60 * 1000) {
            //   openModal();
            // }
            if (diff > 1 * 1000) {
              openModal();
            }
          }
        }
      }

      $('#exampleModalCenter').on('hidden.bs.modal', function() {
        if (localStorage.getItem(modalKey) !== 'submitted') {
          localStorage.setItem(modalKey, 'closed');
          localStorage.setItem('counselling_modal_closed_time', Date.now().toString());
        }
      });



      $('#counsellingForm').on('submit', function(e) {
        e.preventDefault();

        // Disable the button and show loading
        let submitBtn = $('#submitBtn');
        submitBtn.prop('disabled', true).html('Submitting...');

        $('.text-danger').text(''); // Clear previous errors

        $.ajax({
          url: "{{ route('counselling.submit') }}/",
          method: 'POST',
          data: $(this).serialize(),
          headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
          },
          success: function(res) {
            if (res.success) {
              localStorage.setItem(modalKey, 'submitted');
              // window.location.href = "{{ url('thank-you') }}";
              window.location.href = "{{ url('confirmed-email') }}" + "?" + res.seg;
            }
          },
          error: function(xhr) {
            // Re-enable the button
            submitBtn.prop('disabled', false).html('Submit');

            if (xhr.status === 422) {
              let errors = xhr.responseJSON.errors;
              $.each(errors, function(key, val) {
                $('.error-' + key).text(val[0]);
              });
            } else {
              alert('Something went wrong. Please try again.');
            }
          }
        });
      });

    });
  </script>
