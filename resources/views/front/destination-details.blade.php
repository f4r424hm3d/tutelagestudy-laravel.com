@php
  $seg2 = Request::segment(3);
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

  <!-- rating schema Code -->
  <script type="application/ld+json"> { "@context": "https://schema.org/", "@type": "CreativeWorkSeries", "name": "<?php echo ucwords($meta_title); ?>", "aggregateRating": { "@type": "AggregateRating", "ratingValue": "5", "bestRating": "5", "ratingCount": "<?php echo $c_destination->seo_rating; ?>" } } </script>

  <script type="application/ld+json">
    {
      "@context": "http://schema.org",
      "@type": "Article",
      "inLanguage": "en",
      "headline": "<?= $meta_title ?>",
      "description": "<?= $meta_description ?>",
      "keywords": "<?= $meta_keyword ?>",
      "dateModified": "<?= getISOFormatTime($c_destination->updated_at) ?>",
      "datePublished": "<?= getISOFormatTime($c_destination->created_at) ?>",
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
  <style>
    .content-div {
      scroll-margin-top: 100px !important;
    }

    .content-div-child {
      scroll-margin-top: 100px !important;
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
      <div class="ps-product--detail ps-product--box" style="background: #eee; margin-bottom:0px!important">
        <div class="ps-section__right">
          <div class="ps-tab-root">
            <div class="row">
              <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 mb-20">
                @if ($seg2 == null)
                  <!-- header background section ends -->
                  <div class="ps-product__box main-bx mb-20">
                    <div class="ps-document ps-check pt-10">
                      <img src="<?php echo url($c_destination->image_path); ?>" alt="<?php echo $c_destination->page_name; ?>" class="img-responsive">
                    </div>
                    <div class="ps-tabs">
                      <div class="ps-tab active">
                        <div class="ps-document ps-check">
                          <?php echo $c_destination->top_description; ?>
                        </div>
                      </div>
                    </div>
                  </div>
                @endif
                <div class="pt-0 pb-20 get-detail detailss">
                  <span style="font-size:18px; color:#cd2122;">Get Free Counselling</span>
                  <a class="ps-btn" onclick="window.location.href='{{ url('mbbs-abroad-counselling/') }}/'"
                    href="javascript:void()">Enquire Now</a>
                </div>

                @if ($c_destination->contents->count() > 0)
                  {{-- TABLE OF CONTENT START HERE --}}
                  <div class="ps-product__box main-bx mb-20">
                    <aside class="widget widget_best-sale sale-check">
                      <p class="widget-title"> Table of Contents <span style="float:right;">
                          <button class="btn btn-outline-info tglBtn hide-this"><i class="fa-solid fa-plus"></i></button>
                          <button class="btn btn-outline-info tglBtn"><i class="fa-solid fa-minus"></i></button>
                        </span>
                      </p>
                      <div class="widget__content tbl-cntnt counts" id="tblCDiv">
                        @php
                          $mh = 1;
                        @endphp
                        @foreach ($c_destination->parentContents as $row)
                          <span class="main-heading">
                            <a href="#{{ slugify($row->title) }}"><b>{{ $mh }}.
                                {{ $row->title }}</b></a><br>
                            @if ($row->childContents->count() > 0)
                              <div class="child-heading mainhe">
                                @php
                                  $sh = 1;
                                @endphp
                                @foreach ($row->childContents as $child)
                                  <span>
                                    <a href="#{{ slugify($child->title) }}">
                                      {{ $mh }}.{{ $sh }} {{ $child->title }}
                                    </a>
                                  </span> <br>
                                  @php $sh++; @endphp
                                @endforeach
                              </div>
                            @endif
                          </span>
                          @php $mh++; @endphp
                        @endforeach
                        @if ($c_destination->faqs->count() > 0)
                          <span class="main-heading"><a href="#faqs"><b>{{ $mh }}. Faqs</b></a></span>
                        @endif
                      </div>
                    </aside>
                  </div>
                  {{-- TABLE OF CONTENT END HERE --}}
                  @php
                    $cmh = 1;
                  @endphp
                  @foreach ($c_destination->parentContents as $row)
                    {{-- Main CONTENT START HERE --}}
                    <div class="ps-product__box main-bx mb-20">
                      <div class="ps-tabs">
                        <div class="ps-tab active">
                          <div class="ps-document ps-check content-div" id="{{ slugify($row->title) }}">
                            {!! $row->tab_content !!}
                          </div>
                          @if ($row->childContents->count() > 0)
                            @php
                              $csh = 1;
                            @endphp
                            @foreach ($row->childContents as $child)
                              {{-- CHILD CONTENT START HERE --}}
                              <div class="ps-document ps-check content-div-child" id="{{ slugify($child->title) }}">
                                {!! $child->tab_content !!}
                              </div>
                              {{-- CHILD CONTENT END HERE --}}
                              @php $csh++; @endphp
                            @endforeach
                          @endif
                        </div>
                      </div>
                    </div>
                    {{-- Main CONTENT end HERE --}}
                    @php $cmh++; @endphp
                  @endforeach
                @endif
                @if ($faqs->count() > 0)
                  <div class="ps-product__box main-bx mb-20" id="faqs">
                    <div class="ps-section--default fault">
                      <div class="ps-section__header" style="margin-bottom:0px; padding-bottom:10px; border:0px">
                        <h3>FAQ's for MBBS in <?php echo $c_destination->country; ?></h3>
                      </div>
                      <div id="accordion">
                        <?php foreach ($faqs as $faq) { ?>
                        <div class="card">
                          <div class="card-header">
                            <a onclick="toggleFaq('<?php echo $faq->id; ?>')" class="card-link text-dark"
                              href="javascript:void()">
                              <span class="float-right"><i class="fa fa-arrow-down"></i></span>
                              <h6>
                                <?php echo $faq->question; ?>
                              </h6>
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
                  @endpush
                @endif
                @if ($c_destination->author_id != null)
                  <div class="ps-page--product" style="background-color:white;">
                    <div class="ps-container pt-10" id="topuniversities">
                      <div class="ps-section--default fault  pb-2" style="margin-bottom:0px">
                        <div class="ps-section__header" style="margin-bottom:0px; padding-bottom:0px; border:0px">
                          <div class="row author main-auther">
                            <div class="col-md-2">
                              <div class="img-div">
                                <img src="<?php echo url($author->profile_pic_path); ?>" alt="<?php echo $author->name; ?>"><i
                                  class="fa fa-check-circle"></i>
                              </div>
                            </div>
                            <div class="col-md-10">
                              <div class="cont-div">
                                <?php echo $author->name; ?>
                                <span>Content Curator | Updated on -
                                  <?php echo getFormattedDate($c_destination->updated_at, 'M d, Y'); ?>
                                </span>
                                <?php if($author->shortnote!=null){ ?>
                                <p>
                                  <?php echo $author->shortnote; ?>
                                </p>
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
                @endif
              </div>
              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                @if ($tu->count() > 0)
                  <div class="ps-section__left" style="top:60px; background:#fff">
                    <aside class="ps-widget--account-dashboard">
                      <div class="ps-widget__content">
                        <div class="main-postss">
                          Medical Colleges in <?php echo $c_destination->country; ?></div>
                        <ul style="max-height:480px; overflow:auto">
                          @foreach ($tu as $tu)
                            <li>
                              <a href="<?php echo url('medical-universities/' . $tu->uname); ?>/"><i class="icon-arrow-right"></i>
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
            @if ($testimonials->count() > 0)
              <!-- Testimonials -->
              <div class="ps-section--vendor">
                <div class="container-fluid">
                  <div class="ps-section__header pb-0">
                    <h4><?php echo $c_destination->page_name; ?> Students Feedback</h4>
                  </div>
                  <div class="ps-section__content">
                    <div class="ps-carousel--nav carouseld owl-slider" data-owl-auto="true" data-owl-loop="true"
                      data-owl-speed="10000" data-owl-gap="30" data-owl-nav="true" data-owl-dots="false"
                      data-owl-item="2" data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="3"
                      data-owl-item-lg="3" data-owl-duration="1000" data-owl-mousedrag="on">
                      <?php foreach ($testimonials as $test) { ?>
                      <div class="ps-block--testimonial pt-3 pb-3 pl-5 pr-5">
                        <div class="ps-block__header"><img src="<?php echo $test->image != null ? asset($test->image) : asset('front/user-tesimonial-photo.jpg'); ?>"
                            alt="Study <?php echo $c_destination->page_name; ?> Testimonial man icon"></div>
                        <div class="ps-block__content pt-5 pb-3">
                          <i class="icon-quote-close"></i>
                          <span class="sph sps">
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
              <div class="ps-section--vendor  pt-0">
                <div class="container-fluid">
                  <div class="ps-section__header pb-0">
                    <div class="gallery-title">Photo Gallery</div>
                    <div class=" gallery-detials">
                      {{ $c_destination->page_name }} Practical Training, Classrooms, Indian Food, Hostel, Indian
                      Students
                    </div>
                  </div>
                  <div class="row">
                    @foreach ($photos as $row)
                      <div class="col-md-3 col-sm-6 col-6 mb-4">
                        <div class="main-gallery-shows">
                          <img src="{{ cdn($row->image_path) }}" alt="<?php echo $row->title; ?>"
                            class="img-fluid rounded-lg" style="height: 100%;">
                        </div>
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

  </div>
  <script>
    $(document).ready(function() {
      $('.tglBtn').on('click', function() {
        $('.tglBtn').toggle();
        $('#tblCDiv').toggle();
      });
    });

    function toggleFaq(id) {
      $('#a' + id).toggle();
    }
  </script>

@endsection
