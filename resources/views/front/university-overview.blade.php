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
    "description": "<?php echo $meta_description; ?>",
    "itemListElement": [{
    "@type": "ListItem",
    "position": 1,
    "name": "Home",
    "item": "{{  url('/') }}/"
    }, {
    "@type": "ListItem",
    "position": 2,
    "name": "Medical Universities",
    "item": "{{ url('medical-universities') }}/"
    }, {
      "@type": "ListItem",
      "position": 3,
      "name": "{{ $university->name }}",
      "item": "{{ url()->current() }}/"
    }]
  }
</script>
  <!-- breadcrumb schema Code End -->
  <!-- webpage schema Code Destinations -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org/",
    "@type": "webpage",
    "url": "{{ $page_url }}/",
    "name": "<?php echo $university->name; ?>",
    "description": "<?php echo $meta_description; ?>",
    "inLanguage": "en-US",
    "keywords": [
    "<?php echo $meta_keyword; ?>"
    ]
  }
</script>
  <script type="application/ld+json">
  {
    "@context": "http://schema.org",
    "@type": "Article",
    "inLanguage": "en",
    "headline": "<?= $meta_title ?>",
    "description": "<?= $meta_description ?>",
    "keywords": "<?= $meta_keyword ?>",
    "dateModified": "<?= getISOFormatTime($oschema->updated_at) ?>",
    "datePublished": "<?= getISOFormatTime($oschema->created_at) ?>",
    "mainEntityOfPage": { "id": "<?= $page_url ?>/", "@type": "WebPage" },
    "author": { "@type": "Person", "name": "Tutelage Team", "url": "https://www.tutelagestudy.com/author/tutelage-team/" },
    "publisher": {
        "@type": "Organization",
        "name": "Tutelage Study",
        "logo": { "@type": "ImageObject", "name": "Tutelage Study", "url": "https://www.tutelagestudy.com/front/img/logo_light.png", "height": "65", "width": "258" }
    },
    "image": { "@type": "ImageObject", "url": "<?= asset($og_image_path) ?>" }
  }
</script>
@endpush
@section('main-section')
  <div class="ps-breadcrumb">
    <div class="ps-container">
      <ul class="breadcrumb bread-scrollbar">
        <li><a href="{{ url('/') }}">Home</a></li>
        <li><a href="{{ url('medical-universities') }}">Medical Universities</a></li>
        <li>{{ $university->name }}</li>
      </ul>
    </div>
  </div>
  @include('front.uniprofile')
  <div class="ps-page--product ps-page--product-box">
    <div class="container-fluid mplr0">
      @include('front.university-profile-tabs')
      <div class="row">
        <div class="col-lg-12">
          <div class="ps-product--detail ps-product--box">
            <div class="ps-tab-root" style=" margin-top:10px">
              <div class="row">
                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
                  @foreach ($overview as $row)
                    <div class="ps-product__box mb-20">
                      <div class="show-more-box">
                        <div class="text show-more-heigh">
                          <div class="ps-document">
                            <h2>
                              <?php echo $row->h; ?>
                            </h2>
                            <?php if ($row->imgpath != null) { ?>
                            <center>
                              <img data-src="<?php echo asset($row->imgpath); ?>" alt="<?php echo $row->h; ?>" class="img-responsive"
                                loading="lazy" style="padding: 10px">
                            </center>
                            <?php } ?>
                            <?php echo $row->p; ?>
                          </div>
                        </div>
                      </div>
                    </div>
                  @endforeach
                  <div class="pb-0 get-detail mb-20">
                    <h4 class="mb-0">Get details on Fee, Admission, Intake.</h4>
                    <a class="ps-btn" href="{{ url('mbbs-abroad-counselling') }}/">Get Free Counselling</a>
                  </div>
                  @if ($allcont->count())
                    @foreach ($allcont as $row)
                      <div class="ps-product__box mb-20">
                        <div class="show-more-box">
                          <div class="text">
                            <?php echo mb_strimwidth($row->p, 0, 400, '...'); ?>
                          </div>
                          <div><a href="<?php echo url(Request::segment(1) . '/' . Request::segment(2) . '/' . $row->tab_slug); ?>" class="read-more">Read More <i
                                class="fa fa-external-link"></i></a></div>
                        </div>
                      </div>
                    @endforeach
                    <div class="pt-20 pb-0 get-detail">
                      <h4 class="mb-0">Get details on Fee, Admission, Intake.</h4>
                      <a class="ps-btn" href="#contact">Get Free Counselling</a>
                    </div>
                    <br>
                  @endif

                  <?php if (count($destinations)) { ?>
                  <div class="ps-product__box mb-20" id="2">
                    <aside class="widget widget_best-sale" data-mh="dealhot">
                      <h3 class="widget-title">You might be interested in related destination</h3>
                      <div class="widget__content">
                        <div class="owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000"
                          data-owl-gap="0" data-owl-nav="false" data-owl-dots="false" data-owl-item="4"
                          data-owl-item-xs="2" data-owl-item-sm="2" data-owl-item-md="4" data-owl-item-lg="4"
                          data-owl-duration="1000" data-owl-mousedrag="on">
                          <?php foreach ($destinations as $oe) { ?>
                          <div class="ps-product-group">
                            <div class="ps-product--horizontal">
                              <div class="ps-product__thumbnail ml-10" style="background:#fff">
                                <img data-src="<?php echo asset($oe->thumbnail); ?>" alt="<?php echo $oe->page_name; ?>" loading="lazy">
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
                  <?php } ?>

                  <style>
                    .author {
                      align-items: center;
                      margin-bottom: 15px;
                    }

                    .author .img-div {
                      width: 100%;
                    }

                    .author .img-div img {
                      width: 100%;
                      border-radius: 100%;
                    }

                    .author .img-div i {
                      padding: 2px;
                      color: green;
                      border-radius: 100%;
                      font-size: 20px;
                      margin-left: -30px;
                      margin-top: 5px;
                      position: absolute;
                      background: #fff;
                    }

                    .author .img-div .bio-btn {
                      font-size: 14px;
                      border: 1px solid #cd2122;
                      color: #cd2122;
                      border-radius: 5px;
                      font-weight: 400;
                      padding: 5px 12px;
                      display: block;
                      text-align: center;
                      margin-top: 10px;
                    }

                    .author .img-div .bio-btn:hover {
                      border: 1px solid #117888;
                      background: #117888;
                      color: #fff
                    }

                    .author .cont-div {
                      width: auto
                    }

                    .author .cont-div p {
                      font-size: 15px;
                      margin-bottom: 3px !important
                    }

                    .author .cont-div p strong {
                      text-transform: uppercase;
                      color: #cd2122;
                      font-weight: 800 !important;
                    }

                    .author .cont-div h6 {
                      font-size: 20px;
                      color: #000;
                      font-weight: 800;
                      margin-bottom: 6px !important;
                    }

                    .author a {
                      font-size: 16px;
                      font-weight: 600;
                      color: #da0b4e
                    }

                    .author span {
                      display: block;
                      font-size: 13px;
                      padding-bottom: 10px;
                      margin-bottom: 10px;
                      border-bottom: 1px dashed #e2e2e2
                    }

                    @media (max-width: 767px) {
                      .author {
                        margin-bottom: 0px;
                      }

                      .author .img-div {
                        width: 50%;
                        margin: auto
                      }

                      .author .cont-div {
                        text-align: center
                      }

                      .author .cont-div h6 {
                        font-size: 18px;
                        margin-top: 20px
                      }

                      .author .cont-div p {
                        font-size: 14px;
                      }
                    }
                  </style>
                  <?php if($university->author_id != null){ ?>
                  <div class="ps-page--product" style="background-color:white;">
                    <div class="ps-container pt-10" id="topuniversities">
                      <div class="ps-section--default pb-2" style="margin-bottom:0px">
                        <div class="ps-section__header" style="margin-bottom:0px; padding-bottom:0px; border:0px">
                          <div class="row author">
                            <div class="col-md-2">
                              <div class="img-div"> <img data-src="<?php echo asset($university->getAuthor->profile_pic_path); ?>" alt="<?php echo $university->getAuthor->name; ?>"><i
                                  class="fa fa-check-circle"></i>
                              </div>
                            </div>
                            <div class="col-md-10">
                              <div class="cont-div">
                                <h6>
                                  <?php echo $university->getAuthor->name; ?>
                                </h6>
                                <span>Content Curator | Updated on -
                                  <?php echo getFormattedDate($university->updated_at, 'M d, Y'); ?>
                                </span>
                                <?php if($university->getAuthor->shortnote!=null){ ?>
                                <p>
                                  <?php echo $university->getAuthor->shortnote; ?>
                                </p>
                                <br>
                                <?php } ?>
                                <a style="float:right" href="<?php echo url('author/' . $university->getAuthor->slug); ?>/" class="bio-btn">Read Full Bio</a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php } ?>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                  <!-- Sidebar ads -->
                  <aside class="ps-widget--account-dashboard">
                    <h3 style=" background:#cd2122; color:#fff; font-size:16px; padding:10px 20px; margin:0px">Blog</h3>
                    <div class="ps-widget__content" style="background:#fff">
                      <ul>
                        @foreach ($categories as $cat)
                          <li><a href="<?php echo url('blog/' . $cat->slug); ?>/"><i class="icon-arrow-right"></i> {{ $cat->cate_name }}</a>
                          </li>
                        @endforeach
                      </ul>
                    </div>
                  </aside>
                  @if (count($destinations))
                    <div class="ps-section__left" style="top:60px; background:#fff">
                      <aside class="ps-widget--account-dashboard">
                        <div class="ps-widget__content">
                          <div style="font-size:18px; color:#fff; background:#045dab; padding:10px; text-align:center">
                            Other
                            Destination</div>
                          <ul style="max-height:480px; overflow:auto">
                            @foreach ($destinations as $row)
                              <li>
                                <a href="{{ route('destination.detail', ['destination_slug' => $row->slug]) }}/">
                                  <i class="icon-arrow-right"></i> MBBS From {{ $row->country }}
                                </a>
                              </li>
                            @endforeach
                          </ul>
                        </div>
                      </aside>
                    </div>
                  @endif
                </div>
              </div>
            </div>
            <br>
            <!-- TOP TRENDING UNIVERSITIES -->
            @include('front.top-trending-universities')
            <!-- TOP TRENDING UNIVERSITIES -->
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    function AppliedFilter(e, l) {
      "" != l && $.ajax({
        url: "<?php echo url('Welcome/setFilterSession'); ?>",
        method: "GET",
        data: {
          col: e,
          val: l
        },
        success: function(e) {
          window.location.replace("<?php echo url(Request::segment(1)); ?>/courses")
        }
      })
    }
    $("[id^=infopanelcollapse]").click(function() {
      $(this).toggleClass("btn-more"), $(this).prev().toggleClass("expand")
    });
  </script>
  <style>
    .get-detail a,
    .get-detail p {
      font-size: 13px !important
    }

    .fancy-btn,
    .fancy-btn span,
    .show-more-box,
    .show-more-box .text {
      position: relative
    }

    .ps-product__content p,
    .show-more-box li,
    .show-more-box p {
      text-align: justify
    }

    .info-box {
      padding: 20px 5px;
      border: 1px solid #f2f2f2;
      text-align: center;
      transition: .4s
    }

    .info-box .icon {
      width: 50px;
      height: 50px;
      border-radius: 100%;
      font-size: 25px;
      line-height: 50px;
      color: #045dab;
      background: #e2f3fc;
      margin: auto auto 5px
    }

    .info-box .text {
      font-size: 13px
    }

    .info-box .text span,
    .tbl-cntnt ul li a {
      color: #c01874
    }

    .info-box:hover {
      background: #045dab;
      border: 1px solid #045dab;
      transition: .4s
    }

    .info-box:hover .icon {
      color: #045dab;
      background: #fff
    }

    .info-box:hover .text {
      font-size: 13px;
      color: #fff
    }

    .info-box:hover .text span {
      color: #fff
    }

    .modal-header {
      border-bottom: 1px solid #dee2e6 !important
    }

    .get-detail {
      display: flex;
      align-items: center;
      justify-content: center;
      text-transform: uppercase
    }

    .get-detail a {
      margin-left: 10px
    }

    .ps-block--categories-tabs .ps-tab-list a span {
      background: 0 0;
      -webkit-text-fill-color: #000 !important
    }

    .ps-block--categories-tabs .ps-tab-list a:hover {
      box-shadow: none !important
    }

    .tbl-cntnt ul {
      list-style: inside;
      display: flow-root;
      padding-left: 5px
    }

    .tbl-cntnt ul li {
      width: 50%;
      float: left;
      line-height: 24px
    }

    .tbl-cntnt ul li a:hover {
      text-decoration: underline;
      color: #348fd6
    }

    .show-more-box .title {
      background: #f8f8f8;
      padding: 10px
    }

    .show-more-box .text {
      margin-bottom: 5px;
      display: block
    }

    .show-more-box .show-more {
      background: #c5dadd;
      color: #000;
      position: relative;
      padding: 7px;
      text-align: center;
      cursor: pointer;
      margin: 0 -15px -16px;
      font-weight: 500
    }

    .show-more-box .show-more:hover {
      background: #cd2122;
      color: #fff
    }

    .show-more-box .show-more-height {
      height: 600px;
      overflow: hidden
    }

    .show-more-box ul {
      background: #fff;
      padding-left: 10px
    }

    .show-more-box ul li {
      list-style: none
    }

    .show-more-box ul li::before {
      content: "\2B9E";
      color: #045dab;
      padding-right: 4px
    }

    .show-more-box p {
      font-size: 15px;
      margin-bottom: 10px
    }

    .show-more-box li {
      font-size: 15px
    }

    .fancy-btn {
      display: inline-block;
      overflow: hidden;
      transition: .4s;
      padding: 12px 20px;
      text-align: center;
      border: 1px solid #045dab;
      font-size: 15px;
      font-weight: 600;
      text-decoration: none;
      color: #fff;
      background-color: #045dab;
      letter-spacing: 1px;
      margin-bottom: 10px
    }

    .fancy-btn:before {
      content: "";
      position: absolute;
      padding: .1em;
      margin: 0 1em 0 0;
      top: 0;
      right: 100%;
      height: 100%;
      width: 120%;
      background-color: #fff;
      transform: skewX(-30deg);
      transition: inherit
    }

    .fancy-btn:hover:before {
      right: -20%
    }

    .fancy-btn:hover {
      color: #045dab !important
    }

    .btn-full {
      width: 100%
    }

    .show-more-box .read-more {
      background: #f8f8f8;
      color: #045dab;
      width: 100%;
      display: block;
      padding: 7px;
      text-align: center;
      cursor: pointer;
      font-weight: 500;
      margin-bottom: -5px
    }

    .show-more-box .read-more:hover {
      background: #c01874;
      color: #fff
    }

    .ps-product__content h2 small {
      font-size: 15px;
      color: #000;
      font-weight: 400
    }

    .ps-product__content h1,
    .ps-product__content h2,
    .ps-product__content h3,
    .ps-product__content h4,
    .ps-section--default h3,
    .ps-section--default h4 {
      background: #f8f8f8;
      padding: 10px;
      font-size: 20px;
      font-weight: 400
    }

    .ps-document ol,
    .tbl-cntnt ol {
      padding-left: 20px
    }

    .ps-product__box table a,
    .ps-product__box ul li a,
    .tbl-cntnt ol li a {
      color: #cd2122
    }

    .ps-product__box ul li a:hover,
    .tbl-cntnt ol li a:hover {
      color: #117888;
      text-decoration: underline
    }

    .ps-product__box table a:hover {
      color: #117888
    }

    @media screen and (max-width:767px) {
      .get-detail {
        display: block;
        text-align: center
      }

      .get-detail p {
        margin-bottom: 10px !important
      }

      .get-detail a {
        margin-left: 0;
        margin-bottom: 20px
      }

      .ps-carousel--nav {
        margin-bottom: 0;
        padding-bottom: 0
      }

      .ps-carousel--nav .owl-nav>* i {
        font-size: 22px !important
      }

      .ps-carousel--nav .owl-nav {
        display: block !important
      }

      .tbl-cntnt ul li {
        width: 100% !important;
        float: none !important
      }

      .ps-block--categories-tabs .ps-block__header {
        padding: 0 30px
      }

      .ps-block--categories-tabs .ps-block__header .ps-tab-list a.active {
        -webkit-text-fill-color: #c01874 !important;
        border-bottom: 2px solid #c01874 !important
      }

      .ps-block--categories-tabs .ps-block__header .ps-tab-list a:hover {
        border-bottom: 2px solid #c01874 !important
      }

      .show-more-box .title {
        font-size: 20px !important
      }

      .fancy-btn {
        padding: 8px 10px;
        font-size: 14px
      }
    }

    .ps-document h2,
    h3 {
      background: #ebeded;
      padding: 10px;
      font-size: 20px;
      font-weight: 400
    }
  </style>
@endsection
