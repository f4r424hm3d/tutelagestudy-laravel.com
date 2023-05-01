@php
  use App\Models\News;
  use App\Models\Destination;
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
        <i class="icon-magnifier" aria-hidden="true"></i><span> Search</span>
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
    <div class="navigation__content"></div>
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
