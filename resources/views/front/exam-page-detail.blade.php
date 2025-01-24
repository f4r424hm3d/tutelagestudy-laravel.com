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
      "name": "{{ ucwords($meta_title) }}",
      "description": "{{ $meta_description }}",
      "itemListElement": [{
        "@type": "ListItem",
        "position": 1,
        "name": "Home",
        "item": "{{ url('/') }}/"
      }, {
        "@type": "ListItem",
        "position": 2,
        "name": "Destinations",
        "item": "{{ url(Request::segment(1)) }}/"
      }, {
        "@type": "ListItem",
        "position": 3,
        "name": "{{ $exam_page->page_name }}",
        "item": "{{ $page_url }}/"
      }]
    }
  </script>
  <!-- breadcrumb schema Code End -->
  <!-- webpage schema Code Destinations -->
  <script type="application/ld+json">
    {
      "@context": "https://schema.org/",
      "@type": "webpage",
      "url": "{{ url(Request::segment(1)) }}",
      "name": "{{ $exam_page->page_name }}",
      "description": "{{ $meta_description }}",
      "inLanguage": "en-US",
      "keywords": [
        "{{ $meta_keyword }}"
      ]
    }
  </script>
  <!-- rating schema Code -->
  <script type="application/ld+json">
    {
      "@context": "https://schema.org/",
      "@type": "CreativeWorkSeries",
      "name": "{{ ucwords($meta_title) }}",
      "aggregateRating": {
        "@type": "AggregateRating",
        "ratingValue": "5",
        "bestRating": "5",
        "ratingCount": "{{ $exam_page->seo_rating }}"
      }
    }
  </script>
  <script type="application/ld+json">
    {
      "@context": "http://schema.org",
      "@type": "Article",
      "inLanguage": "en",
      "headline": "{{ $meta_title }}",
      "description": "{{ $meta_description }}",
      "keywords": "{{ $meta_keyword }}",
      "dateModified": "{{ getISOFormatTime($exam_page->updated_at) }}",
      "datePublished": "{{ getISOFormatTime($exam_page->created_at) }}",
      "mainEntityOfPage": { "id": "{{ $page_url }}/", "@type": "WebPage" },
      "author": { "@type": "Person", "name": "Tutelage Team", "url": "https://www.tutelagestudy.com/author/tutelage-team/" },
      "publisher": {
          "@type": "Organization",
          "name": "Tutelage Study",
          "logo": { "@type": "ImageObject", "name": "Tutelage Study", "url": "https://www.tutelagestudy.com/front/img/logo_light.png", "height": "65", "width": "258" }
      },
      "image": { "@type": "ImageObject", "url": "{{ asset($og_image_path) }}" }
    }
  </script>
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

    .err-clr {
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

    .ps-document h2,
    h3 {
      background: #ebeded;
      padding: 8px;
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

    .ps-product__box ul {
      padding-left: 20px;
      list-style: none;
    }

    .ps-product__box ul li:before {
      content: "\f046";
      /* FontAwesome Unicode */
      font-family: FontAwesome;
      color: #0047ab;
      display: inline-block;
      margin-left: -1.3em;
      width: 1.3em;
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
  </style>
  <div class="ps-breadcrumb">
    <div class="ps-container">
      <ul class="breadcrumb bread-scrollbar">
        <li><a href="{{ url('/') }}">Home</a></li>
        <li><a href="{{ url($exam->exam_slug) }}/">{{ $exam->exam_name }}</a></li>
        <li>{{ $exam_page->page_name }}</li>
      </ul>
    </div>
  </div>

  <div class="ps-page--product-box">
    <div class="ps-product--box" style="background: #eee; margin-bottom:0px!important">
      <div class="ps-section__right">
        <div class="ps-tab-root container-fluid">
          <div class="row">
            <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12 mb-20">
              <div class="ps-product__box">
                <div class="ps-document">
                  <center>
                    <img data-src="{{ url($exam_page->image_path) }}" alt="{{ $exam_page->page_name }}"
                      class="img-responsive">
                  </center>
                </div>
              </div>
              <br>
              <div class="pt-0 pb-20 get-detail">
                <span style="font-size:18px; color:#cd2122;">Get Free NEET Counselling from Experts</span>
                <a class="ps-btn" onclick="window.location.href='{{ url('neet-counselling') }}/'" href="javascript:void()"
                  rel="nofollow">Enquire Now</a>
              </div>

              @if ($exam_page_contents->count() > 1)
                <div class="ps-product__box mb-20">
                  <aside class="widget widget_best-sale">
                    <h3 class="widget-title">
                      Table of Contents
                      <span style="float:right;">
                        <button class="btn btn-outline-info tglBtn hide-this">+</button>
                        <button class="btn btn-outline-info tglBtn">-</button>
                      </span>
                    </h3>
                    <div class="widget__content tbl-cntnt" id="tblCDiv">
                      <ol style="list-style:circle;">
                        @foreach ($exam_page_contents as $t)
                          <li><a href="#{{ slugify($t->title) }}">{{ $t->title }}</a></li>
                        @endforeach
                      </ol>
                    </div>
                  </aside>
                </div>
              @endif

              @foreach ($exam_page_contents as $c)
                <div class="ps-product__box mb-20" id="{{ slugify($c->title) }}">
                  <div class="ps-tabs">
                    <div class="ps-tab active">
                      <div class="ps-document">
                        {!! $c->tab_content !!}
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
                      @foreach ($faqs as $faq)
                        <div class="card">
                          <div class="card-header">
                            <a onclick="toggleFaq('{{ $faq->id }}')" class="card-link text-dark"
                              href="javascript:void()">
                              <span class="float-right"><i class="fa fa-arrow-down"></i></span>
                              <h5 class="mb-0" style="font-size:15px">{{ $faq->question }}</h5>
                            </a>
                          </div>
                          <div id="a{{ $faq->id }}" style="display:none;">
                            <div class="card-body">{{ $faq->answer }}</div>
                          </div>
                        </div>
                      @endforeach
                    </div>
                  </div>
                </div>
                <script type="application/ld+json">
                  {
                    "@context": "https://schema.org",
                    "@type": "FAQPage",
                    "mainEntity": [
                        @foreach ($faqs as $index => $faq)
                        {
                            "@type": "Question",
                            "name": "{{ $faq->question }}",
                            "acceptedAnswer": {
                                "@type": "Answer",
                                "text": "{{ str_replace(['/', '"'], ['\/', '\"'], $faq->answer) }}"
                            }
                        } @if (!$loop->last), @endif
                        @endforeach
                    ]
                  }
                </script>
              @endif

              <style>
                /* Styles for the author section */
                .author {
                  align-items: center;
                  margin-bottom: 15px;
                }

                /* Add remaining styles here */
              </style>

              @if ($exam_page->author_id != null)
                <div class="ps-page--product" style="background-color:white;">
                  <div class="ps-container pt-10" id="topuniversities">
                    <div class="ps-section--default pb-2" style="margin-bottom:0px">
                      <div class="ps-section__header" style="margin-bottom:0px; padding-bottom:0px; border:0px">
                        <div class="row author">
                          <div class="col-md-2">
                            <div class="img-div">
                              <img data-src="{{ asset($exam_page->getAuthor->profile_pic_path) }}"
                                alt="{{ $exam_page->getAuthor->name }}">
                              <i class="fa fa-check-circle"></i>
                            </div>
                          </div>
                          <div class="col-md-10">
                            <div class="cont-div">
                              <h6>{{ $exam_page->getAuthor->name }}</h6>
                              <span>Content Curator | Updated on -
                                {{ getFormattedDate($exam_page->updated_at, 'M d, Y') }}</span>
                              @if ($exam_page->getAuthor->shortnote)
                                <p>{{ $exam_page->getAuthor->shortnote }}</p><br>
                              @endif
                              <a style="float:right" href="{{ url('author/' . $exam_page->getAuthor->slug) }}/"
                                class="bio-btn">Read Full Bio</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              @endif
            </div>

            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
              {{-- Blog Categories --}}
              @if (count($exam_pages) > 0)
                <div class="ps-section__left" style="position:sticky; top:0;">
                  <aside class="ps-widget--account-dashboard">

                    <div class="ps-widget__content" style="background:#fff">
                      <ul>
                        @foreach ($exam_pages as $row)
                          <li>
                            <a href="{{ url($exam->exam_slug . '/' . $row->slug) }}/">
                              <i class="icon-arrow-right"></i> {{ $row->page_name }}
                            </a>
                          </li>
                        @endforeach
                      </ul>
                    </div>
                  </aside>
                </div>
              @endif
              <br>
              {{-- Other Exam --}}
              @if (count($exams) > 0)
                <div class="ps-section__left" style="position:sticky; top:60px; background:#fff">
                  <aside class="ps-widget--account-dashboard">
                    <div class="ps-widget__content">
                      <div style="font-size:18px; color:#fff; background:#045dab; padding:10px; text-align:center">Other
                        Exam</div>
                      <ul style="max-height:480px; overflow:auto">
                        @foreach ($exams as $row)
                          <li>
                            <a href="{{ url($row->exam_slug) }}/">
                              <i class="icon-arrow-right"></i> {{ $row->exam_name }}
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
      </div>
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
@endsection
