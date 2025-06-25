@extends('front.layouts.main')
@push('seo_meta_tag')
@include('front.layouts.form_page_meta_tag')
@endpush
@section('main-section')
<style>
  .mbbs-abroad-counselling {
       background: #eee;
    padding: 100px 15px 60px;
    text-align: center;
  }

  .mbbs-abroad-counselling img {
    border: 4px solid #fff;
    border-radius: 4px;
    box-shadow: 0px 0px 30px 0px rgb(0 0 0 / 20%);
    margin-bottom: 15px
  }
  .main-content__checkmark {
    font-size: 46px;
    color: green;
}

  .mbbs-abroad-counselling h1 {
       padding: 0px 0px 10px 0px;
    margin-top: 0px;
    margin-bottom: 0px;
    border-bottom: 0px dashed #cd2122;
    font-weight: 600;
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
      <div class="row">
        <div class="col-md-12">
          <header class="site-header" id="header">
            <h1 class="site-header__title" data-lead-id="site-header-title">THANK YOU!</h1>
          </header>
          <div class="main-content">
            <i class="fa fa-check main-content__checkmark" id="checkmark"></i>
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
<div class="ps-search-trending">
  <div class="container">
    <div class="text-center">
      <h2 style="color:#fff!important">Related Destinations</h2>
    </div>
    <div class="row">
      <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
        <a href="https://www.tutelagestudy.com/mbbs-in-malaysia/">
          <div class="ps-post ps-product shadow">
            <div class="ps-post__thumbnail"><img src="{{ asset('/front/') }}/img/mbbs-malaysia.jpg" alt=""></div>
            <div class="ps-post__content" style="border:0px; padding:12px 0px; background:#fff">
              <div class="ps-post__title text-center">MBBS IN MALAYSIA</div>
            </div>
          </div>
        </a>
      </div>
      <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
        <a href="https://www.tutelagestudy.com/mbbs-in-russia/">
          <div class="ps-post ps-product shadow">
            <div class="ps-post__thumbnail"><img src="{{ asset('/front/') }}/img/mbbs-russia.jpg" alt=""></div>
            <div class="ps-post__content" style="border:0px; padding:12px 0px; background:#fff">
              <div class="ps-post__title text-center">MBBA IN RUSSIA</div>
            </div>
          </div>
        </a>
      </div>
      <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
        <a href="https://www.tutelagestudy.com/mbbs-in-mauritius/">
          <div class="ps-post ps-product shadow">
            <div class="ps-post__thumbnail"><img src="{{ asset('/front/') }}/img/mbbs-mauritius.jpg" alt=""></div>
            <div class="ps-post__content" style="border:0px; padding:12px 0px; background:#fff">
              <div class="ps-post__title text-center">MBBS IN MAURITUS</div>
            </div>
          </div>
        </a>
      </div>
      <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
        <a href="https://www.tutelagestudy.com/mbbs-in-iran/">
          <div class="ps-post ps-product shadow">
            <div class="ps-post__thumbnail"><img src="{{ asset('/front/') }}/img/mbbs-iran.jpg" alt=""></div>
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
