@extends('front.layouts.main')
@push('seo_meta_tag')
@include('front.layouts.dynamic_page_meta_tag')
@endpush
@push('breadcrumb_schema')
<!-- breadcrumb schema Code -->
<script type="application/ld+json">
  {
    "@context": "https://schema.org/",
    "@type": "BreadcrumbList",
    "name": "<?php echo ucwords($meta_title); ?>",
    "description": "<?php echo ucwords($meta_description); ?>",
    "itemListElement": [{
      "@type": "ListItem",
      "position": 1,
      "name": "Home",
      "item": "<?php echo url('/'); ?>"
    }, {
      "@type": "ListItem",
      "position": 2,
      "name": "Services",
      "item": "<?php echo url('services'); ?>/"
    }, {
      "@type": "ListItem",
      "position": 3,
      "name": "<?php echo $row->headline; ?>",
      "item": "{{ $page_url }}/"
    }]
  }
</script>
<!-- breadcrumb schema Code End -->
@endpush
@section('main-section')
<style>
  .ps-product__box h2 {
    background: #ebeded;
    padding: 10px;
    font-size: 20px;
    font-weight: 400
  }

  .ps-product__box h3 {
    margin: 15px 0px 0px 0px;
    font-size: 18px;
  }

  .ps-product__box ul {
    padding-left: 25px;
    list-style: none;
  }

  .ps-product__box ul li:before {
    content: "\f046";
    /* FontAwesome Unicode */
    font-family: FontAwesome;
    color: #0047ab;
    display: inline-block;
    margin-left: -1.3em;
    /* same as padding-left set on li */
    width: 1.3em;
    /* same as padding-left set on li */
  }

  .ps-product__box p {
    text-align: justify
  }

  .ps-product__box p:last-child {
    margin-bottom: 0px;
  }

  .ps-product__box table {
    margin: 5px 0px 10px 0px;
  }

  .ps-product__box td {
    padding-left: 10px !important;
  }
</style>

<div class="ps-breadcrumb">
  <div class="ps-container">
    <ul class="breadcrumb bread-scrollbar">
      <li><a href="<?php echo url('/'); ?>">Home</a></li>
      <li><a href="<?php echo url('services'); ?>/"> Services</a></li>
      <li><span>
          <?php echo $row->headline; ?>
        </span></li>
    </ul>
  </div>
</div>
<div class="ps-page--single ps-page--vendor">

  <div class="container mt-30 mb-30">

    <div class="row">
      <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">

        <div class="ps-product__box mb-20">
          <aside class="widget widget_best-sale shadow" style="border:0px; padding:20px">
            <h2>
              <?php echo $row->headline; ?>
            </h2>
            <div class="widget__content tbl-cntnt">
              <img data-src="<?php echo asset($row->imgpath); ?>" alt="<?php echo $row->headline; ?>" class="mb-15">
              <?php echo $row->description; ?>
            </div>
          </aside>
        </div>
        <br>
        <div class="pt-0 pb-20 get-detail">
          <center>
            <h4 class="mb-0">Get Free Counselling</h4>
            <br>
            <a class="ps-btn" href="javascript:void()"
              onclick="window.location.href='<?php echo url('mbbs-abroad-counselling/'); ?>/'">Enquire Now</a>
          </center>
        </div>
        <hr>
        @if(count($destinations)>0)
        <div class="ps-product__box mb-20" id="2">
          <aside class="widget widget_best-sale" data-mh="dealhot">
            <h3 class="widget-title">You might be interested in related destination</h3>
            <div class="widget__content">
              <div class="owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000" data-owl-gap="0"
                data-owl-nav="false" data-owl-dots="false" data-owl-item="4" data-owl-item-xs="2" data-owl-item-sm="2"
                data-owl-item-md="4" data-owl-item-lg="4" data-owl-duration="1000" data-owl-mousedrag="on">
                <?php
                foreach ($destinations as $oe) {
                ?>
                <div class="ps-product-group">
                  <div class="ps-product--horizontal">
                    <div class="ps-product__thumbnail ml-10" style="background:#fff">
                      <img data-src="<?php echo asset($oe->thumbnail); ?>" alt="<?php echo $oe->page_name; ?>">
                    </div>
                    <div class="ps-product__content">
                      <a class="ps-product__title" href="<?php echo url($oe->slug); ?>/">
                        <?php echo $oe->page_name; ?>
                      </a>
                    </div>
                  </div>
                </div>
                <?php } ?>
              </div>
            </div>
          </aside>
        </div>
        @endif
      </div>

      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
        <div class="ps-section__left shadow" style="position:sticky; top:20px; background:#fff">
          <aside class="ps-widget--account-dashboard">
            <div class="ps-widget__content">
              <div style=" font-size:18px; color:#fff; background:#cd2122; padding:10px; text-align:center">Quick links
              </div>
              <ul style="max-height:480px; overflow:auto">
                <?php foreach ($services as $s) { ?>
                <li><a href="<?php echo url('services/' . $s->slug); ?>/"><i class="icon-arrow-right"></i>
                    <?php echo $s->headline; ?>
                  </a></li>
                <?php } ?>
              </ul>
            </div>
          </aside>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection