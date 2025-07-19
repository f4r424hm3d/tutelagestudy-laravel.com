@extends('front.layouts.main')
@push('seo_meta_tag')
  @include('front.layouts.form_page_meta_tag')
@endpush
@section('main-section')
  <div class="mbbs-abroad-counselling coun">
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
        <div class="row">
          <div class="col-md-12">
            <header class="site-header" id="header">
              <h1 class="site-header__title" data-lead-id="site-header-title">THANK YOU!</h1>
            </header>
            <div class="main-content">
              <i class="fa fa-check main-content__checkmark shortbox" id="checkmark"></i>
              <p class="main-content__body" data-lead-id="main-content-body">Thank you for your interest in studying MBBS
                abroad! We have received your inquiry and one of our admissions counselors will be in touch with you
                shortly to provide you with the information you need to make an informed decision about your educational
                goals. In the meantime, please feel free to scroll down to learn more about the MBBS Abroad Countries and
                services we offer. We look forward to connecting with you soon!</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="ps-search-trending desti">
    <div class="container">
      <div class="text-center">
        <h2 style="color:#fff!important">Related Destinations</h2>
      </div>
      <div class="row">
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
          <a href="https://www.tutelagestudy.com/mbbs-in-malaysia/">
            <div class="ps-post ps-product shadow">
              <div class="ps-post__thumbnail"><img src="{{ cdn('/front/') }}/img/mbbs-malaysia.jpg" alt=""></div>
              <div class="ps-post__content" style="border:0px; padding:12px 0px; background:#fff">
                <div class="ps-post__title text-center">MBBS IN MALAYSIA</div>
              </div>
            </div>
          </a>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
          <a href="https://www.tutelagestudy.com/mbbs-in-russia/">
            <div class="ps-post ps-product shadow">
              <div class="ps-post__thumbnail"><img src="{{ cdn('/front/') }}/img/mbbs-russia.jpg" alt=""></div>
              <div class="ps-post__content" style="border:0px; padding:12px 0px; background:#fff">
                <div class="ps-post__title text-center">MBBA IN RUSSIA</div>
              </div>
            </div>
          </a>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
          <a href="https://www.tutelagestudy.com/mbbs-in-mauritius/">
            <div class="ps-post ps-product shadow">
              <div class="ps-post__thumbnail"><img src="{{ cdn('/front/') }}/img/mbbs-mauritius.jpg" alt=""></div>
              <div class="ps-post__content" style="border:0px; padding:12px 0px; background:#fff">
                <div class="ps-post__title text-center">MBBS IN MAURITUS</div>
              </div>
            </div>
          </a>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
          <a href="https://www.tutelagestudy.com/mbbs-in-iran/">
            <div class="ps-post ps-product shadow">
              <div class="ps-post__thumbnail"><img src="{{ cdn('/front/') }}/img/mbbs-iran.jpg" alt=""></div>
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
@endsection
