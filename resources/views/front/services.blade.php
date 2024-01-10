@extends('front.layouts.main')
@push('seo_meta_tag')
@include('front.layouts.static_page_meta_tag')
@endpush
@section('main-section')
<style>
  .ps-vendor-banner h2 {
    font-weight: 300;
    text-shadow: 0 4px 0 rgb(0 0 0 / 24%)
  }

  .ps-post__thumbnail img {
    height: 245px;
  }

  .ps-post .ps-post__title {
    font-size: 20px !important;
    margin-bottom: 10px !important;
  }


  @media(max-width:767px) {}
</style>
<div class="ps-page--single ps-page--vendor">
  <div class="ps-breadcrumb">
    <div class="ps-container">
      <ul class="breadcrumb bread-scrollbar">
        <li><a href="<?php echo url('/'); ?>">Home</a></li>
        <li><span>Services</span></li>
      </ul>
    </div>
  </div>

  <div class="ps-vendor-banner bg--cover" data-background="https://www.educationmalaysia.in/assets/uploadFiles/study/IMG_20221210_133900.jpg" style="background:url(https://www.educationmalaysia.in/assets/uploadFiles/study/IMG_20221210_133900.jpg)">
  </div>

  <section class="ps-store-list">
    <div class="container">
      <div class="ps-section__wrapper">
        <div class="">
          <section class="ps-store-box">

            <div class="ps-blog__content mt-30">
              <div class="row">
                <?php foreach ($services as $row) { ?>
                  <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                    <div class="ps-post ps-product shadow">
                      <div class="ps-post__thumbnail">
                        <img data-src="<?php echo asset($row->imgpath); ?>" alt="<?php echo $row->headline; ?>">
                      </div>
                      <div class="ps-post__content" style="border:0px; padding:20px 25px">
                        <div class="ps-post__title"><?php echo $row->headline; ?></div>
                        <div><a href="<?php echo url('services/' . $row->slug); ?>/" class="ps-btn btn">Read More</a></div>
                      </div>
                    </div>
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
