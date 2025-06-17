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
      "name": "<?php echo $service->headline; ?>",
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

    .ps-product__box p:last-child {
      margin-bottom: 0px;
    }

    .ps-product__box table {
      margin: 5px 0px 10px 0px;
    }
  </style>

  <div class="ps-breadcrumb">
    <div class="ps-container">
      <ul class="breadcrumb bread-scrollbar">
        <li><a href="<?php echo url('/'); ?>">Home</a></li>
        <li><a href="<?php echo url('services'); ?>/"> Services</a></li>
        <li><span>
            <?php echo $service->headline; ?>
          </span></li>
      </ul>
    </div>
  </div>
  <div class="ps-page--single ps-page--vendor">

    <div class="container mt-30 mb-30">

      <div class="row">
        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
          <div class="ps-post--detail sidebar">
            <div class="ps-post__content card">
              <div class="ps-post__header">
                <h1 class="mb-1" style="font-size: 20px">{{ ucfirst($service->headline) }}</h1>
              </div>
              <div>
                <img data-src="{{ asset($service->imgpath) }}" alt="{{ ucfirst($service->headline) }}" class="mb-20"
                  width="1000">
              </div>
              <br>
              <div class="pt-0 pb-20 get-detail text-center">
                <h4 class="mb-0">Get Free Counselling</h4>
                <a class="ps-btn" onclick="window.location.href='{{ url('mbbs-abroad-counselling/') }}/'"
                  href="javascript:void()">Enquire Now</a>
              </div>
              @if ($service->contents->count() > 0)
                {{-- TABLE OF CONTENT START HERE --}}
                <div class="card">
                  <div class="card-header">
                    <h3>Table of Content</h3>
                  </div>
                  <div class="card-body pl-4 pr-4 bg-light">
                    <div class="table-of-content">
                      <div class="top-level">
                        @php
                          $mh = 1;
                        @endphp
                        @foreach ($service->parentContents as $row)
                          <span class="main-heading">
                            <a href="#{{ $row->slug }}"><b>{{ $mh }}. {{ $row->title }}</b></a><br>
                            @if ($row->childContents->count() > 0)
                              <div class="child-heading">
                                @php
                                  $sh = 1;
                                @endphp
                                @foreach ($row->childContents as $child)
                                  <span>
                                    <a href="#{{ $child->slug }}">
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
                        @if ($service->faqs->count() > 0)
                          <span class="main-heading"><a href="#faqs"><b>{{ $mh }}. Faqs</b></a></span>
                        @endif
                      </div>
                    </div>
                  </div>
                </div>
                <hr>
                {{-- TABLE OF CONTENT END HERE --}}
                @php
                  $cmh = 1;
                @endphp
                @foreach ($service->parentContents as $row)
                  {{-- Main CONTENT START HERE --}}
                  <div class="ps-document">
                    <h2 id="{{ $row->slug }}">{{ $row->title }}</h2>
                    <p>{!! $row->description !!}</p>

                    @if ($row->childContents->count() > 0)
                      @php
                        $csh = 1;
                      @endphp
                      @foreach ($row->childContents as $child)
                        {{-- CHILD CONTENT START HERE --}}
                        <h2 id="{{ $child->slug }}">{{ $csh }}. {{ $child->title }}</h2>
                        <p>{!! $child->description !!}</p>
                        {{-- CHILD CONTENT END HERE --}}
                        @php $csh++; @endphp
                      @endforeach
                    @endif
                  </div>
                  {{-- Main CONTENT end HERE --}}
                  @php $cmh++; @endphp
                @endforeach
              @endif
              <div class="ps-document">
                {!! $service->description !!}
              </div>
              <br>

              @if ($service->faqs->count() > 0)
                <div class="accordion faq-accordian " id="accordionExample">
                  <h2 id="faqs">FAQ </h2>
                  @foreach ($service->faqs as $row)
                    <div class="card">
                      <div class="card-header" id="headingTwo{{ $row->id }}">
                        <h5 class="mb-0">
                          <button class="btn btn-link collapsed w-100 d-flex align-items-center justify-content-between"
                            type="button" data-toggle="collapse" data-target="#collapseTwo{{ $row->id }}"
                            aria-expanded="false" aria-controls="collapseTwo{{ $row->id }}">
                            {{ $row->question }}
                            {{-- <img src="/front/img/down.png" class="img-down" alt=""> --}}
                            <i style="font-size:24px" class="fa">&#xf107;</i>
                          </button>
                        </h5>
                      </div>
                      <div id="collapseTwo{{ $row->id }}" class="collapse"
                        aria-labelledby="headingTwo{{ $row->id }}" data-parent="#accordionExample">
                        <div class="card-body">
                          {!! $row->answer !!}
                        </div>
                      </div>
                    </div>
                  @endforeach
                </div>
              @endif
              <hr>

            </div>

          </div>
          <hr>
          @if (count($destinations) > 0)
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
                <div class="main-postss">Quick links
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
