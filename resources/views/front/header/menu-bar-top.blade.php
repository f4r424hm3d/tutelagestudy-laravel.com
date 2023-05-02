@php
  use App\Models\News;
  use App\Models\Destination;
  use App\Models\Country;

  $countriesSF = Country::orderBy('name','asc')->get();
  $phonecodesSF = Country::select('phonecode','name')->distinct()->orderBy('phonecode','asc')->get();
  $destinationsSF = Destination::where(['status' => 1])->get();
@endphp
<style>
  .hide-this {
    display: none;
  }
</style>

<body>
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-T4ZDHCD" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->
  <header class="header header--1">
    <div class="header__top">
      <div class="ps-container">
        <div class="header__left">

          <a class="ps-logo" href="<?php echo url('/'); ?>"><img src="{{ url('front/') }}/img/logo_light.png" alt="Tutelage Study logo"></a>
        </div>
        <div class="header__center">
          <form class="ps-form--quick-search" action="<?php echo url('medical-universities/') ?>" method="get">
            <input class="form-control" name="search" type="text" placeholder="Search Universities" id="input-search" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
            <button>Search</button>
          </form>
        </div>
        <div class="header__right">
          <div class="header__actions">
            <div class="ps-block--user-header">
              <!-- <div class="ps-block__left"><i class="icon-envelope-open"></i></div>&nbsp;&nbsp; -->
              <div class="ps-block__right">
                <a class="ps-btn" style="background-color:#1d4d7a" href="mailto:studytutelage@gmail.com">
                  <div class="ps-block__left"><i class="icon-envelope-open"></i></div>
                </a>
              </div>
              <div class="ps-block__right">
                <a class="ps-btn" href="tel:+919818560331">
                  <div class="ps-block__left"><i class="icon-telephone"></i></div>
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
            <div class="menu__toggle"><i class="icon-menu"></i><a href="{{ url('/blog/') }}">News & Articles</a></div>
            {{-- <div class="menu__toggle"><i class="icon-menu"></i><span>News Category</span></div> --}}
            {{-- <div class="menu__content">
              <ul class="menu--dropdown">
                <?php
                $allcat = News::orderBy('id','asc')->distinct('cate_id')->get();
                foreach ($allcat as $cat) {
                ?>
                  <li class="current-menu-item">
                    <a href="<?php echo url('category/' . $cat->cate_slug); ?>/"><i class="icon-star"></i> {{ $cat->getCategory->cate_name }}</a>
                  </li>
                <?php } ?>
              </ul>
            </div> --}}
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
                    <?php
                    $destinations = Destination::where(['status' => 1])->orderBy('id','asc')->limit('8')->get();
                    foreach ($destinations as $row) {
                    ?>
                      <li class="current-menu-item"><a href="<?php echo url($row->slug); ?>/"><?php echo ucwords($row->page_name); ?></a> </li>
                    <?php } ?>
                    <br>
                    <a href="<?php echo url('destinations'); ?>/" class="ps-btn btn">MBBS Countries</a>
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
                      <li class="current-menu-item"><a href="<?php echo url('neet-ug'); ?>/">NEET UG</a></li>
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
        <a class="ps-logo" href="<?php echo url('/'); ?>">
          <img src="{{ url('front/') }}/img/logo_light.png" alt="Tutelage Study logo">
        </a>
      </div>
      <div class="navigation__right">
        <div class="header__actions">
          <div class="ps-block--user-header">
            <div class="ps-block__left pt-15">
              <a href="tel:+919818560331" class="ps-btn"><i class="icon-telephone2"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <div class="ps-panel--sidebar" id="navigation-mobile">
    <div class="ps-panel__header">
      <h3>Latest News</h3>
    </div>
    <div class="ps-panel__content">
      <ul class="menu--mobile">
        <?php
        $allcat = News::orderBy('id','asc')->distinct('cate_id')->get();
        foreach ($allcat as $cat) {
        ?>
          <li class="current-menu-item">
            <a href="<?php echo url('category/' . $cat->cate_slug); ?>/">
              <i class="icon-star"></i> {{ $cat->getCategory->cate_name }}
            </a>
          </li>
        <?php } ?>
      </ul>
    </div>
  </div>
  <div class="navigation--list">
    <div class="navigation__content">
      <a class="navigation__item ps-toggle--sidebar" href="#menu-mobile" aria-label="Left Align">
        <i class="icon-menu" aria-hidden="true"></i><span> Menu</span>
      </a>
      <a class="navigation__item ps-toggle--sidebar" href="#navigation-mobile" aria-label="Left Align">
        <i class="icon-list4" aria-hidden="true"></i><span> Blog</span>
      </a>
      <a class="navigation__item ps-toggle--sidebar" href="#search-sidebar" aria-label="Left Align">
        <i class="icon-pencil-line" aria-hidden="true"></i><span> Enquire Now</span>
      </a>
    </div>
  </div>
  <div class="ps-panel--sidebar" id="search-sidebar">
    <div class="ps-panel__header">
      <form class="ps-form--search-mobile" action="<?php echo url('medical-universities/') ?>" method="get">
        <div class="form-group--nest">
          <input class="form-control" type="text" name="search" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>" placeholder="Search Universities...">
          <button aria-label="Left Align" type="submit"><i class="icon-magnifier" aria-hidden="true"></i></button>
        </div>
      </form>
    </div>



    <div class="navigation__content">
      <div class="p-5">
      <div class="row shadow">
        <div class="col-md-8">
          <div style="font-size:16px; margin-bottom:10px; color:#cd2122; font-weight:500; margin-top:15px; text-align:center">Apply Now for MBBS Upcoming Intake</div>
          <form class="ps-form--visa" action="{{ url('inquiry/submit-mbbs-inquiry') }}/" method="post">
            @csrf
            <input type="hidden" name="source_url" value="<?php echo $_GET['page']??''; ?>">
            <input type="hidden" name="page_url" value="{{ url()->current() }}">
            <div class="row">
              <div class="col-lg-6 col-md-5 col-sm-12 col-xs-12 pr7">
                <div class="form-group">
                  <input type="text" name="name" id="name" class="form-control" placeholder="Enter Name" value="{{ old('name')??'' }}" required>
                  @error('name')
                    {!! '<span class="text-danger">' . $message . '</span>' !!}
                  @enderror
                </div>
              </div>
              <div class="col-lg-6 col-md-7 col-sm-12 col-xs-12 pl7">
                <div class="form-group">
                  <input type="email" class="form-control" name="email" id="email" value="{{ old('email')??'' }}" placeholder="Enter Email" required>
                  @error('email')
                    {!! '<span class="text-danger">' . $message . '</span>' !!}
                  @enderror
                </div>
              </div>
              <div class="col-4 col-lg-4 col-md-4 col-sm-4 col-xs-6 pr7">
                <div class="form-group">
                  <select class="form-control" name="c_code" id="c_code" required >
                    <option value="">Select Code</option>
                    <?php
                    foreach ($phonecodesSF as $row) {
                    ?>
                      <option value="<?php echo $row->phonecode; ?>" <?php echo old('c_code') && old('c_code') == $row->phonecode ? 'Selected' : ''; ?>> +<?php echo $row->phonecode; ?> (<?php echo $row->name; ?>)</option>
                    <?php } ?>
                  </select>
                  @error('c_code')
                    {!! '<span class="text-danger">' . $message . '</span>' !!}
                  @enderror
                </div>
              </div>
              <div class="col-8 col-lg-8 col-md-8 col-sm-8 col-xs-6 pl7">
                <div class="form-group">
                  <input type="text" class="form-control u-ltr" placeholder="Enter Mobile Number" data-error="Please enter a valid phone number" name="mobile" id="mobile" value="<?php echo old('mobile'); ?>" required >
                  @error('mobile')
                    {!! '<span class="text-danger">' . $message . '</span>' !!}
                  @enderror
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr7">
                <div class="form-group">
                  <select class="form-control" name="nationality" id="nationality" required >
                    <option value="">Select Nationality</option>
                    <?php
                    foreach ($countriesSF as $row) {
                    ?>
                      <option value="<?php echo $row->name; ?>" <?php echo old('nationality') == $row->name ? 'Selected' : ''; ?>> <?php echo $row->name; ?></option>
                    <?php } ?>
                  </select>
                  @error('nationality')
                    {!! '<span class="text-danger">' . $message . '</span>' !!}
                  @enderror
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl7">
                <div class="form-group">
                  <select class="form-control" name="destination" id="destination" required >
                    <option value="">Preferred MBBS Country</option>
                    <?php
                    foreach ($destinationsSF as $row) {
                    ?>
                      <option value="<?php echo $row->page_name; ?>" <?php echo old('destination') == $row->page_name ? 'Selected' : ''; ?>><?php echo $row->page_name; ?></option>
                    <?php } ?>
                  </select>
                  @error('destination')
                    {!! '<span class="text-danger">' . $message . '</span>' !!}
                  @enderror
                </div>
              </div>
              {{-- <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="form-group">
                  <div class="g-recaptcha" data-sitekey="6LfEJo4jAAAAAIEVgbaWIR-uic-I3h9RBYFCqOTS" ></div>
                </div>
              </div> --}}
              <div class="form-group">
                <div class="ps-checkbox pl-20">
                  <input class="form-control " type="checkbox" name="terms" id="terms" >
                  <label for="terms">I agree to the <a href="https://www.tutelagestudy.com/term-and-condition/" style="color: blue;" target="_blank">terms & conditions</a> .*</label>
                  @error('terms')
                    {!! '<span class="text-danger">' . $message . '</span>' !!}
                  @enderror
                </div>
              </div>
              <div class="form-group">
                <div class="ps-checkbox pl-20">
                  <input class="form-control " type="checkbox" name="contact_me" id="contact_me" >
                  <label for="contact_me">Contact me by phone, email or<br>SMS to assist me .*</label>
                  @error('contact_me')
                    {!! '<span class="text-danger">' . $message . '</span>' !!}
                  @enderror
                </div>
              </div>
              <div class="form-group">
                <div class="ps-checkbox pl-20">
                  <input class="form-control" type="checkbox" name="update" id="update" >
                  <label for="update">I would like to receive updates and offers<br>from Tutelage Study.*</label>
                </div>
              </div>
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <button type="submit" class="ps-btn ps-btn--fullwidth">Submit</button>
              </div>
              <br>
              <br>
              <br>
              <br>
              <br>
              <br>
            </div>
          </form>
        </div>
      </div>
      </div>
    </div>



  </div>
  <div class="ps-panel--sidebar" id="menu-mobile">
    <div class="ps-panel__header">
      <h3>Menu</h3>
    </div>
    <div class="ps-panel__content">
      <ul class="menu--mobile">
        <li><a href="<?php echo url('/'); ?>">Home</a><span class="sub-toggle"></span></li>
        <li><a href="<?php echo url('medical-universities'); ?>/">All Universities</a><span class="sub-toggle"></span></li>
        <li><a href="<?php echo url('mbbs-in-abroad'); ?>/">MBBS Abroad</a><span class="sub-toggle"></span></li>
        <li class="menu-item-has-children has-mega-menu">
              <a href="javascript:void()">Destinations</a>
              <span class="sub-toggle"></span>
          <div class="mega-menu">
            <div class="mega-menu__column">
              <ul class="mega-menu__list" style="display:block">
                <?php
                $destinations = Destination::where(['status' => 1])->orderBy('id','asc')->limit('8')->get();
                foreach ($destinations as $row) {
                ?>
                  <li class="current-menu-item"><a href="<?php echo url($row->slug); ?>/"><?php echo ucwords($row->page_name); ?></a> </li>
                <?php } ?>
                <br>
                    <a href="<?php echo url('destinations'); ?>/" class="ps-btn btn">MBBS Countries</a>
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
              </ul>
            </div>
          </div>
        </li>
        <li>
          <a href="<?php echo url('about-us'); ?>/">About Tutelage Study</a><span class="sub-toggle"></span>
        </li>
      </ul>
    </div>
  </div>
