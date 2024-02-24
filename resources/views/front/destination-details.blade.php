@php
  $seg2 = Request::segment(2);
  // printArray($otabs->toArray());
  // die;
@endphp
@extends('front.layouts.main')
@push('seo_meta_tag')
  @include('front.layouts.dynamic_page_meta_tag')
@endpush
@push('breadcrumb_schema')
  <!-- breadcrumb schema Code -->
  <script type="application/ld+json">
  { "@context": "https://schema.org/", "@type": "BreadcrumbList", "name": "<?php echo ucwords($meta_title); ?>", "description": "<?php echo $meta_description; ?>", "itemListElement": [{ "@type": "ListItem", "position": 1, "name": "Home", "item": "<?php echo url('/'); ?>" }, { "@type": "ListItem", "position": 2, "name": "Destinations", "item": "<?php echo url('destinations/'); ?>/" }, { "@type": "ListItem", "position": 3, "name": "<?php echo $c_destination->page_name; ?>", "item": "<?php echo url(Request::segment(1)); ?>/" }] }
</script>
  <!-- breadcrumb schema Code End -->
  <!-- webpage schema Code Destinations -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org/",
    "@type": "webpage",
    "url": "<?php echo url(Request::segment(1)); ?>/",
    "name": "<?php echo $c_destination->page_name; ?>",
    "description": "<?php echo $meta_description; ?>",
    "inLanguage": "en-US",
    "keywords": [
      "<?php echo $meta_keyword; ?>"
    ]
  }
</script>
  <!-- rating schema Code -->
  <script type="application/ld+json"> { "@context": "https://schema.org/", "@type": "CreativeWorkSeries", "name": "<?php echo ucwords($meta_title); ?>", "aggregateRating": { "@type": "AggregateRating", "ratingValue": "5", "bestRating": "5", "ratingCount": "<?php echo $c_destination->seo_rating; ?>" } } </script>
@endpush
@section('main-section')
  <style type="text/css">
    .header-bg1 .col-box {
      width: 100%;
      display: block;
      padding: 10px 0 15px;
      color: white !important;
    }

    .header-bg1 .col-box .media-left {
      padding: 0 10px 0 0;
      min-width: 145px;
    }

    .text-danger {
      color: red !important;
    }

    .fcolor {
      color: white !important;
      margin-bottom: 0px !important
    }

    .media-body,
    .media-left,
    .media-right {
      display: table-cell;
      vertical-align: top;
    }

    .media-left,
    .media>.pull-left {
      padding-right: 10px;
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

    .modal-content {
      margin: 18% auto
    }

    .modal {
      padding-right: 0px !important;
      z-index: 13
    }

    .modal-text-p {
      padding-top: 20px
    }

    .modal-backdrop.show {
      z-index: 12
    }

    .collegeTabs {
      z-index: 11
    }

    .ps-block--categories-tabs .ps-tab-list a span {
      background: none;
      -webkit-text-fill-color: #000 !important;
    }

    .ps-block--categories-tabs .ps-tab-list a:hover {
      box-shadow: none !important
    }

    .tbl-cntnt ul {
      list-style: inside !important;
      display: flow-root !important;
      padding-left: 5px !important
    }

    .tbl-cntnt ul li {
      width: 50%;
      float: left;
      line-height: 24px
    }

    .tbl-cntnt ul li:before {
      display: none !important;
    }

    .tbl-cntnt ul li a {
      color: #cd2122;
      margin-left: -7px
    }

    .tbl-cntnt ul li a:hover {
      text-decoration: underline;
      color: #348fd6;
    }

    .widget_best-sale .widget-title {
      background: #f8f8f8;
      padding: 10px;
      border-bottom: 0px;
      font-weight: 400;
      margin-top: 0px;
    }

    .ps-document h2 {
      background: #ebeded;
      padding: 8px 15px;
      font-size: 20px;
      font-weight: 400
    }

    .ps-document h3 {
      background: #ebeded;
      padding: 8px 15px;
      font-size: 20px;
      font-weight: 400
    }

    .ps-document h4 {
      background: #ebeded;
      padding: 8px 15px;
      font-size: 20px;
      font-weight: 400
    }

    .ps-product__content h3 {
      background: #f8f8f8;
      padding: 10px;
      font-size: 20px;
      font-weight: 400
    }

    .ps-section--default h3 {
      background: #f8f8f8;
      padding: 10px;
      font-size: 20px;
      font-weight: 400
    }

    .ps-document p {
      text-align: justify
    }

    .ps-product__box h3 {
      margin: 12px 0px 0px 0px;
      font-size: 18px;
    }

    .ps-document ol {
      padding-left: 20px;
    }

    .ps-product__box ul li a {
      color: #cd2122
    }

    .ps-product__box ul li a:hover {
      color: #117888;
      text-decoration: underline
    }

    .ps-product__box table a {
      color: #cd2122
    }

    .ps-product__box table a:hover {
      color: #117888;
    }

    .tbl-cntnt ol {
      padding-left: 20px;
    }

    .tbl-cntnt ol li a {
      color: #cd2122
    }

    .tbl-cntnt ol li a:hover {
      color: #117888;
      text-decoration: underline
    }

    .ps-product__box ul {
      padding-left: 20px;
      list-style: none;
    }

    .ps-product__box ul li:before {
      content: "\e999";
      font-family: Linearicons;
      /* speak: none; */
      font-style: normal;
      font-weight: 400;
      font-variant: normal;
      text-transform: none;
      line-height: 1;
      color: #cd2122;
      display: inline-block;
      margin-left: -1.3em;
      width: 1.5em;
    }

    .ps-product__box p {
      text-align: justify
    }

    .ps-product__box p:last-child {
      margin-bottom: 0px;
    }

    .ps-product__box table {
      margin: 5px 0px;
    }

    .ps-product__box td {
      padding-left: 10px !important;
    }

    .ps-block--categories-tabs .ps-block__header {
      padding: 0 30px;
      overflow-y: hidden;
    }

    .ps-block--categories-tabs .ps-tab-list a:hover {
      background: #fff
    }

    @media screen and (max-width:767px) {
      .get-detail {
        display: block;
        text-align: center !important
      }

      .get-detail p {
        margin-bottom: 10px !important
      }

      .get-detail a {
        margin-left: 0px
      }

      .ps-block--store .ps-block__content {
        padding: 0px 10px 10px 10px
      }

      .ps-carousel--nav {
        margin: 0px;
        padding-bottom: 10px
      }

      .modal-content {
        margin: 16% auto
      }

      .modal-text-p {
        padding-top: 10px
      }

      .ps-carousel--nav .owl-nav>* i {
        font-size: 22px !important
      }

      .ps-carousel--nav .owl-nav {
        display: block !important;
      }

      .tbl-cntnt ul li {
        width: 100% !important;
        float: none !important
      }

      .ps-block--categories-tabs .ps-block__header {
        padding: 0 30px;
      }

      .ps-block--categories-tabs .ps-block__header .ps-tab-list a.active {
        -webkit-text-fill-color: #c01874 !important;
        border-bottom: 2px solid #c01874 !important;
      }

      .ps-block--categories-tabs .ps-block__header .ps-tab-list a:hover {
        border-bottom: 2px solid #c01874 !important;
      }
    }

    .sph {
      font-size: 18px;
      margin-bottom: 10px;
      color: #cd2122;
      font-weight: 600;
    }
  </style>
  <div class="ps-breadcrumb">
    <div class="ps-container">
      <ul class="breadcrumb bread-scrollbar">
        <li><a href="{{ url('/') }}">Home</a></li>
        <li><a href="{{ url('destinations') }}/">Destinations</a></li>
        <li>{{ $c_destination->page_name }}</li>
      </ul>
    </div>
  </div>

  <!-- header background section ends -->
  <div class="ps-page--product-box">
    <div class="container-fluid">
      @if ($tabs != null && count($tabs) > 1)
        <div class="ps-block--categories-tabs ps-tab-root" data-gssticky="1"
          style="top: 0px; position: sticky; overflow: auto; font-weight: 600; z-index:99; box-shadow: 0px 4px 20px rgb(0 0 0 / 10%);">
          <div class="ps-block__header">
            <div class="ps-carousel--nav ps-tab-list owl-slider" data-owl-auto="false" data-owl-speed="1000"
              data-owl-gap="0" data-owl-nav="true" data-owl-dots="false" data-owl-item="8" data-owl-item-xs="3"
              data-owl-item-sm="4" data-owl-item-md="6" data-owl-item-lg="6" data-owl-duration="500"
              data-owl-mousedrag="on">
              @foreach ($tabs as $tab)
                <a class="{{ $tab->getTab->slug == $tabTitleDet->id ? 'active' : '' }}"
                  href="{{ url($c_destination->getTab->slug) }}/{{ $tab->getTab->slug == 'overview' ? '' : $tab->getTab->slug }}">
                  {{ ucwords($tab->getTab->tab) }}
                </a>
              @endforeach
            </div>
          </div>
        </div>
      @endif
      <div class="ps-product--detail ps-product--box" style="background: #eee; margin-bottom:0px!important">
        <div class="ps-section__right">
          <div class="ps-tab-root">
            <div class="row">
              <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 mb-20">
                @if ($seg2 == null)
                  <!-- header background section ends -->
                  <div class="container-fluid"
                    style="background:linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(25,136,158,1) 100%); padding:5px 1% 15px;">
                    <div class="row">
                      <div class="col-md-12 col-sm-12 p-5">
                        <h2 class="fcolor">Quick Details about {{ $c_destination->page_name }} for the academic year 2024-25</h2>
                        <div class="row" style="margin-top:10px">
                          <div class="col-md-7 col-sm-12 col-xs-12 pad no-padding">
                            <div class="media-left">
                              <p class="fcolor"><i class="icon-clock pr-1"></i> Duration :</p>
                            </div>
                            <div class="media-right">
                              <p class="fcolor">{{ $c_destination->course_duration }}</p>
                            </div>
                          </div>
                          <div class="col-md-5 col-sm-12 col-xs-12 pad no-padding">
                            <div class="media-left">
                              <p class="fcolor"><i class="icon-pencil-line pr-1"></i> NEET Required :</p>
                            </div>
                            <div class="media-right">
                              <p class="fcolor">{{ $c_destination->neet }}</p>
                            </div>
                          </div>
                          <div class="col-md-7 col-sm-12 col-xs-12 pad no-padding">
                            <div class="media-left">
                              <p class="fcolor"><i class="icon-document pr-1"></i> IELTS/TOEFL :</p>
                            </div>
                            <div class="media-right">
                              <p class="fcolor">{{ $c_destination->english_profiency_exam }}</p>
                            </div>
                          </div>
                          <div class="col-md-5 col-sm-12 col-xs-12 pad no-padding">
                            <div class="media-left">
                              <p class="fcolor"><i class="icon-calendar-check pr-1"></i> Intake :</p>
                            </div>
                            <div class="media-right">
                              <p class="fcolor">{{ $c_destination->intake }}</p>
                            </div>
                          </div>
                          <div class="col-md-7 col-sm-12 col-xs-12 pad no-padding">
                            <div class="media-left">
                              <p class="fcolor"><i class="icon-graduation-hat pr-1"></i> Eligibility :</p>
                            </div>
                            <div class="media-right">
                              <p class="fcolor">{{ $c_destination->eligibility }}</p>
                            </div>
                          </div>
                          <div class="col-md-5 col-sm-12 col-xs-12 pad no-padding">
                            <div class="media-left">
                              <p class="fcolor"><i class="icon-desktop pr-1"></i> Medium of Teaching :</p>
                            </div>
                            <div class="media-right">
                              <p class="fcolor">{{ $c_destination->medium_of_teaching }}</p>
                            </div>
                          </div>
                        </div>

                        <div class="pt-20 pb-20 get-detail text-center">
                          <a class="ps-btn" onclick="window.location.href='{{ url('mbbs-abroad-counselling/') }}/'"
                            href="javascript:void()">GET FREE COUNSELLING</a>
                          <a class="ps-btn hide-this" href="#brochureForm">Get Brochure</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="ps-product__box">
                    <div class="ps-document">
                      <img src="<?php echo url($c_destination->image_path); ?>" alt="<?php echo $c_destination->page_name; ?>" class="img-responsive shadow">
                    </div>
                  </div>
                  <div class="ps-product__box mb-20">
                    <div class="ps-tabs">
                      <div class="ps-tab active">
                        <div class="ps-document">
                          <?php echo $c_destination->top_description; ?>
                        </div>
                      </div>
                    </div>
                  </div>
                @endif

                <div class="pt-0 pb-20 get-detail">
                  <span style="font-size:18px; color:#cd2122;">Get Free Counselling</span>
                  <a class="ps-btn" onclick="window.location.href='{{ url('mbbs-abroad-counselling/') }}/'"
                    href="javascript:void()">Enquire Now</a>
                  <a class="ps-btn hide-this" href="#brochureForm">Get Brochure</a>
                </div>
                @if ($count_content > 1)
                  <div class="ps-product__box mb-20">
                    <aside class="widget widget_best-sale">
                      <h3 class="widget-title"> Table of Contents <span style="float:right;">
                          <button class="btn btn-outline-info tglBtn hide-this">+</button>
                          <button class="btn btn-outline-info tglBtn">-</button>
                        </span>
                      </h3>
                      <div class="widget__content tbl-cntnt " id="tblCDiv">
                        <ol style="list-style:circle;">
                          <?php foreach ($content as $t) { ?>
                          <li><a href="#<?php echo slugify($t->title); ?>">
                              <?php echo $t->title; ?>
                            </a></li>
                          <?php } ?>
                        </ol>
                      </div>
                    </aside>
                  </div>
                @endif
                @foreach ($content as $c)
                  <div class="ps-product__box mb-20" id="<?php echo slugify($c->title); ?>">
                    <div class="ps-tabs">
                      <div class="ps-tab active">
                        <div class="ps-document">
                          <?php echo $c->tab_content; ?>
                        </div>
                      </div>
                    </div>
                  </div>
                @endforeach
                @if ($faqs->count() > 0)
                  <div class="ps-product__box mb-20">
                    <div class="ps-section--default">
                      <div class="ps-section__header" style="margin-bottom:0px; padding-bottom:10px; border:0px">
                        <h3>Faqs</h3>
                      </div>
                      <div id="accordion">
                        <?php foreach ($faqs as $faq) { ?>
                        <div class="card">
                          <div class="card-header">
                            <a onclick="toggleFaq('<?php echo $faq->id; ?>')" class="card-link text-dark"
                              href="javascript:void()">
                              <span class="float-right"><i class="fa fa-arrow-down"></i></span>
                              <h5 class="mb-0">
                                <?php echo $faq->question; ?>
                              </h5>
                            </a>
                          </div>
                          <div id="a<?php echo $faq->id; ?>" style="display:none;">
                            <div class="card-body">
                              <?php echo $faq->answer; ?>
                            </div>
                          </div>
                        </div>
                        <?php } ?>
                      </div>
                    </div>
                  </div>
                  @push('breadcrumb_schema')
                    <!-- FAQ SCHEMA START -->
                    <script type="application/ld+json">
                {
                  "@context": "https:\/\/schema.org",
                  "@type": "FAQPage",
                  "mainEntity": [
                    <?php
                  $i = 1;
                  $tfaq = count($faqs);
                  foreach ($faqs as $faq) {
                  ?> {
                        "@type": "Question",
                        "name": "<?php echo $faq->question; ?>",
                        "acceptedAnswer": {
                          "@type": "Answer",
                          "text": "<?php echo str_replace('/', '\/', str_replace('"', '\"', $faq->answer)); ?>"
                        }
                      }
                      <?php if ($i < $tfaq) { ?>, <?php } ?>
                    <?php $i++;
                  } ?>
                  ]
                }
              </script>
                    <!-- FAQ SCHEMA END -->
                  @endpush
                @endif

                <div class="pt-0 pb-20 get-detail text-center">
                  <a class="ps-btn" href="<?php echo url('destinations'); ?>/" target="blank" rel="noopener noreferrer">View All
                    Countries</a>
                </div>
                @if ($c_destination->author_id != null)
                  <div class="ps-page--product" style="background-color:white;">
                    <div class="ps-container pt-10" id="topuniversities">
                      <div class="ps-section--default pb-2" style="margin-bottom:0px">
                        <div class="ps-section__header" style="margin-bottom:0px; padding-bottom:0px; border:0px">
                          <div class="row author">
                            <div class="col-md-2">
                              <div class="img-div">
                                <img data-src="<?php echo url($author->profile_pic_path); ?>" alt="<?php echo $author->name; ?>"><i
                                  class="fa fa-check-circle"></i>
                              </div>
                            </div>
                            <div class="col-md-10">
                              <div class="cont-div">
                                <h6>
                                  <?php echo $author->name; ?>
                                </h6>
                                <span>Content Curator | Updated on -
                                  <?php echo getFormattedDate($c_destination->updated_at, 'M d, Y'); ?>
                                </span>
                                <?php if($author->shortnote!=null){ ?>
                                <p><b>
                                    <?php echo $author->shortnote; ?>
                                  </b></p>
                                <br>
                                <?php } ?>
                                <a style="float:right" href="<?php echo url('author/' . $author->slug); ?>/" class="bio-btn">Read Full Bio</a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                @endif

                @if ($tu->count() > 0)
                  <!-- BROCHURE FORM START -->
                  <div class="ps-page--product hide-this" id="brochureForm">
                    <div class="row">
                      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="ps-product__box">
                          <h4>Get Brochure</h4>
                          <div class="ps-section__content">
                            <form action="{{ url('inquiry/get-brochure') }}/" method="post">
                              @csrf
                              <input type="hidden" class="form-control" name="page_url" value="{{ $page_url }}">
                              <input type="hidden" class="form-control" name="destination"
                                value="{{ $c_destination->page_name }}">
                              <div class="ps-form__content">
                                <div class="row">
                                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                    <div class="ps-form__billing-info">
                                      <div class="row">
                                        <div class="col-sm-5">
                                          <div class="form-group">
                                            <input type="text" name="name" id="name" class="form-control"
                                              placeholder="Enter Name" value="{{ old('name') ?? '' }}" required="">
                                            @error('name')
                                              {{ '<span class="text-danger">' . $message . '</span>' }}
                                            @enderror
                                          </div>
                                        </div>
                                        <div class="col-sm-7">
                                          <div class="form-group">
                                            <input type="email" class="form-control" name="email" id="email"
                                              value="{{ old('email') ?? '' }}" placeholder="Enter Email"
                                              required="">
                                            @error('email')
                                              {{ '<span class="text-danger">' . $message . '</span>' }}
                                            @enderror
                                          </div>
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-sm-3">
                                          <div class="form-group">
                                            <input type="c_code" class="form-control" name="c_code" id="c_code"
                                              value="{{ old('c_code') ?? '+91' }}" placeholder="Country Code"
                                              required="">
                                            @error('c_code')
                                              {{ '<span class="text-danger">' . $message . '</span>' }}
                                            @enderror
                                          </div>
                                        </div>
                                        <div class="col-sm-9">
                                          <div class="form-group">
                                            <input type="text" class="form-control u-ltr"
                                              placeholder="Enter Mobile Number"
                                              data-error="Please enter a valid phone number" name="mobile"
                                              id="mobile" value="<?php echo old('mobile'); ?>" required>
                                            @error('mobile')
                                              {{ '<span class="text-danger">' . $message . '</span>' }}
                                            @enderror
                                          </div>
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-sm-6">
                                          <div class="form-group">
                                            <select class="form-control" name="university" id="university"
                                              required="">
                                              <option value="">Select University</option>
                                              @foreach ($brochureUniversities as $row)
                                                <option value="{{ $row->id }}"
                                                  {{ old('university') == $row->id ? 'Selected' : '' }}>
                                                  {{ $row->university_name ?? $row->name }}
                                                </option>
                                              @endforeach
                                            </select>
                                            @error('university')
                                              {{ '<span class="text-danger">' . $message . '</span>' }}
                                            @enderror
                                          </div>
                                        </div>
                                      </div>

                                      <div class="form-group">
                                        <label for="keep-update">By clicking Submit, you agree to our <a
                                            href="{{ url('term-and-condition') }}/" class="b black">Terms and
                                            Conditions</a> & <a href="<?php echo url('privacy-policy'); ?>/" class="b black">Privacy
                                            Policy</a></label>
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
                      </div>
                    </div>
                  </div>
                  <!-- BROCHURE FORM END -->
                @endif
              </div>
              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                @if (count($otabs) > 1)
                  <div class="ps-section__left" style="top:60px; background:#fff">
                    <aside class="ps-widget--account-dashboard">
                      <div class="ps-widget__content">
                        <div style=" font-size:18px; color:#fff; background:#045dab; padding:10px; text-align:center">
                          Quick
                          links</div>
                        <ul style="max-height:480px; overflow:auto">
                          <?php foreach ($otabs as $tab) { ?>
                          <li><a href="<?php echo url($c_destination->getTab->slug); ?><?php echo $tab->getTab->slug == 'overview' ? '' : '/' . $tab->getTab->slug; ?>/"><i class="icon-arrow-right"></i>
                              <?php echo ucwords($tab->getTab->page_name); ?>
                              <?php echo ucwords($tab->getTab->tab); ?>
                            </a></li>
                          <?php } ?>
                        </ul>
                      </div>
                    </aside>
                  </div>
                @endif
                @if (count($otherexam) > 1)
                  <div class="ps-section__left" style="top:60px; background:#fff">
                    <aside class="ps-widget--account-dashboard">
                      <div class="ps-widget__content">
                        <div style="font-size:18px; color:#fff; background:#9D0E0E; padding:10px; text-align:center">
                          Other
                          Destination</div>
                        <ul style="max-height:480px; overflow:auto">
                          <?php foreach ($otherexam as $row) { ?>
                          <li><a href="<?php echo url($row->slug); ?>/"><i class="icon-arrow-right"></i> MBBS From
                              <?php echo $row->country; ?>
                            </a></li>
                          <?php } ?>
                        </ul>
                      </div>
                    </aside>
                  </div>
                @endif

                @if ($tu->count() > 0)
                  <div class="ps-section__left" style="top:60px; background:#fff">
                    <aside class="ps-widget--account-dashboard">
                      <div class="ps-widget__content">
                        <div style="font-size:18px; color:#fff; background:#9D0E0E; padding:10px; text-align:center">MBBS
                          Universities</div>
                        <ul style="max-height:480px; overflow:auto">
                          @foreach ($tu as $tu)
                            <li>
                              <a href="<?php echo url($tu->country_slug . '/' . $tu->uname); ?>/"><i class="icon-arrow-right"></i>
                                <?php echo $tu->name; ?>
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
            <style>
              .ps-carousel--nav .owl-nav .owl-prev {
                margin-left: -20px;
              }

              .ps-carousel--nav .owl-nav .owl-next {
                margin-right: -20px;
              }
            </style>
            @if ($testimonials->count() > 0)
              <!-- Testimonials -->
              <div class="ps-section--vendor">
                <div class="container-fluid">
                  <div class="ps-section__header pb-0">
                    <p class="mb-2">WHAT STUDENTS SAY ABOUT US</p>
                    <h4>
                      <?php echo $c_destination->page_name; ?> Students Feedback
                    </h4>
                  </div>
                  <div class="ps-section__content">
                    <div class="ps-carousel--nav owl-slider" data-owl-auto="true" data-owl-loop="true"
                      data-owl-speed="10000" data-owl-gap="30" data-owl-nav="true" data-owl-dots="false"
                      data-owl-item="2" data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="3"
                      data-owl-item-lg="3" data-owl-duration="1000" data-owl-mousedrag="on">
                      <?php foreach ($testimonials as $test) { ?>
                      <div class="ps-block--testimonial pt-3 pb-3 pl-5 pr-5">
                        <div class="ps-block__header"><img data-src="<?php echo $test->image != null ? asset($test->image) : asset('front/user-tesimonial-photo.jpg'); ?>"
                            alt="MBBS Abroad Testimonial"></div>
                        <div class="ps-block__content pt-5 pb-3">
                          <i class="icon-quote-close"></i>
                          <span class="sph">
                            <?php echo $test->name; ?>
                          </span>
                          <p>
                            <?php echo $test->review; ?>
                          </p>
                        </div>
                      </div>
                      <?php } ?>
                    </div>
                  </div>
                </div>
              </div>
            @endif
            @if ($photos->count() > 0)
              <!-- Photo Gallery -->
              <div class="ps-section--vendor pt-0">
                <div class="container-fluid">
                  <div class="ps-section__header pb-0">
                    <h4>Photo Gallery</h4>
                    <p class="mb-5">
                      <?php echo $c_destination->page_name; ?> Practical Training, Classrooms, Indian Food, Hostel, Indian
                      Students
                    </p>
                  </div>
                  <div class="row">
                    @foreach ($photos as $row)
                      <div class="col-md-3 col-sm-6 col-6 mb-5">
                        <img data-src="{{ asset($row->image_path) }}" alt="<?php echo $row->title; ?>"
                          class="img-fluid rounded-lg" style="height: 100%;">
                      </div>
                    @endforeach
                  </div>
                </div>
              </div>
            @endif
          </div>
        </div>
      </div>
    </div>
    <div class="ps-search-trending">
      <div class="container">
        <div class="ps-section__header text-center">
          <h3 style="color:white">Most Popular Countries for MBBS Abroad</h3>
          <small style="color:white">With Tutelage Study you can get MBBS Abroad Admission in world top Medical
            Universities</small>
        </div>
        <div class="row">
          <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">

            <div class="ps-post ps-product shadow">
              <div class="ps-post__thumbnail"><img data-src="{{ asset('/front/') }}/img/mbbs-malaysia.jpg"
                  alt="MBBS in Malaysia"></div>
              <div class="ps-post__content" style="border:0px; padding:12px 0px; background:#fff">
                <a class="ps-post__title text-center" href="https://www.tutelagestudy.com/mbbs-in-malaysia/">MBBS IN
                  MALAYSIA</a>
              </div>
            </div>

          </div>
          <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
            <a href="https://www.tutelagestudy.com/mbbs-in-russia/">
              <div class="ps-post ps-product shadow">
                <div class="ps-post__thumbnail"><img data-src="{{ asset('/front/') }}/img/mbbs-russia.jpg"
                    alt="MBBS in russia">
                </div>
                <div class="ps-post__content" style="border:0px; padding:12px 0px; background:#fff">
                  <div class="ps-post__title text-center">MBBA IN RUSSIA</div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
            <div class="ps-post ps-product shadow">
              <div class="ps-post__thumbnail"><img data-src="{{ asset('/front/') }}/img/mbbs-mauritius.jpg"
                  alt="MBBS in Mauritius"></div>
              <div class="ps-post__content" style="border:0px; padding:12px 0px; background:#fff">
                <a href="https://www.tutelagestudy.com/mbbs-in-mauritius/" class="ps-post__title text-center">MBBS IN
                  MAURITUS</a>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
            <div class="ps-post ps-product shadow">
              <div class="ps-post__thumbnail"><img data-src="{{ asset('/front/') }}/img/mbbs-iran.jpg"
                  alt="MBBS in Iran"></div>
              <div class="ps-post__content" style="border:0px; padding:12px 0px; background:#fff">
                <a href="https://www.tutelagestudy.com/mbbs-in-iran/" href="https://www.tutelagestudy.com/mbbs-in-iran/"
                  class="ps-post__title text-center">MBBS IN IRAN</a>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
            <div class="ps-post ps-product shadow">
              <div class="ps-post__thumbnail"><img data-src="{{ asset('/front/') }}/img/mbbs-vietnam.jpg"
                  alt="MBBS in Vietnam">
              </div>
              <div class="ps-post__content" style="border:0px; padding:12px 0px; background:#fff">
                <a href="https://www.tutelagestudy.com/mbbs-in-vietnam/" class="ps-post__title text-center">MBBS IN
                  VIETNAM</a>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
            <div class="ps-post ps-product shadow">
              <div class="ps-post__thumbnail"><img data-src="{{ asset('/front/') }}/img/mbbs-cyprus.jpg"
                  alt="MBBS in Cyprus">
              </div>
              <div class="ps-post__content" style="border:0px; padding:12px 0px; background:#fff">
                <a href="https://www.tutelagestudy.com/mbbs-in-cyprus/" class="ps-post__title text-center">MBBS IN
                  CYPRUS</a>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
            <div class="ps-post ps-product shadow">
              <div class="ps-post__thumbnail"><img data-src="{{ asset('/front/') }}/img/mbbs-belarus.jpg"
                  alt="MBBS in Belarus">
              </div>
              <div class="ps-post__content" style="border:0px; padding:12px 0px; background:#fff">
                <a href="https://www.tutelagestudy.com/mbbs-in-belarus/" class="ps-post__title text-center">MBBS IN
                  BELARUS</a>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
            <div class="ps-post ps-product shadow">
              <div class="ps-post__thumbnail"><img data-src="{{ asset('/front/') }}/img/mbbs-bangladesh.jpg"
                  alt="MBBS in Bangladesh"></div>
              <div class="ps-post__content" style="border:0px; padding:12px 0px; background:#fff">
                <a href="https://www.tutelagestudy.com/mbbs-in-bangladesh/" class="ps-post__title text-center">MBBS IN
                  BANGLADESH</a>
              </div>
            </div>
          </div>
        </div>
        <div class="pt-20" align="center"><a href="/destinations/" target="_blank" rel="noopener noreferrer"
            class="button home-btn">Browse All
            Destinations</a></div>
      </div>
    </div>
  </div>
  <script>
    $(document).ready(function() {
      $('.tglBtn').on('click', function() {
        $('.tglBtn').toggle();
        $('#tblCDiv').toggle();
      });
    });

    function toggleFaq(id) {
      $('#a' + id).toggle(500);
    }
  </script>
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
      font-size: 14px;
      text-align: justify;
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
@endsection
