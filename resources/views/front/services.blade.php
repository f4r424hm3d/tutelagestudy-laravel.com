@extends('front.layouts.main')
@push('seo_meta_tag')
  @include('front.layouts.static_page_meta_tag')
@endpush
@section('main-section')
  <div class="ps-page--single ps-page--vendor">
    <div class="ps-breadcrumb">
      <div class="ps-container">
        <ul class="breadcrumb bread-scrollbar">
          <li><a href="<?php echo url('/'); ?>">Home</a></li>
          <li><span>Services</span></li>
        </ul>
      </div>
    </div>

    <div class="ps-vendor-banner ban py-0">
      <img class="bannerfullsd" src="{{ asset('front/img/services.webp') }}"alt="destinations mbbs abroad">
    </div>

    <section class="ps-store-list pt-5">
      <div class="container">
        <div class="ps-section__wrapper">
          <div class="">
            <section class="ps-store-box">

              <div class="ps-blog__content mt-30">
                <div class="row">
                  <?php foreach ($services as $row) { ?>
                  <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 mb-4">
                    <a href="<?php echo url('services/' . $row->slug); ?>/" class="ps-post ps-product shadow mb-0 h-100 ">
                      <div class="ps-post__thumbnail img-nail">
                        <img src="<?php echo cdn($row->imgpath); ?>" alt="<?php echo $row->headline; ?>">
                      </div>
                      <div class="ps-post__content" style="border:0px; padding:20px 25px">
                        <div class="ps-post__title mb-3"><?php echo $row->headline; ?></div>
                        <div><button class="ps-btn btn">Read More</button></div>
                      </div>
                    </a>
                  </div>
                  <?php } ?>
                </div>
              </div>
            </section>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection
