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
    "name": "{{ $university->name }}",
    "description": "{{ $meta_description }}",
    "inLanguage": "en-US",
    "keywords": [
    "{{ $meta_keyword }}"
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
  <div class="ps-page--product ps-page--product-box  dddd">
    <div class="container-fluid mplr0">
      @include('front.university-profile-tabs')
      <div class="row">
        <div class="col-lg-12">
          <div class="ps-product--detail ps-product--box">
            <div class="ps-tab-root" style=" margin-top:10px">
              <div class="row">
                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
                  @if ($university->contents->count() > 0)
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
                            @foreach ($university->parentContents as $row)
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
                            @if ($university->faqs->count() > 0)
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
                    @foreach ($university->parentContents as $row)
                      {{-- Main CONTENT START HERE --}}
                      <div class="ps-product__box update-bx mb-20">
                        <div class="show-more-box new-bxx">
                          <div class="text show-more-heigh">
                            <div class="ps-document ps-docs ps-docs">
                              <h2 id="{{ $row->slug }}">{{ $row->title }}</h2>
                              @if ($row->imgpath != null)
                                <center>
                                  <img src="{{ cdn($row->image_path) }}" alt="<?php echo $row->h; ?>" class="img-responsive"
                                    loading="lazy" style="padding: 10px">
                                </center>
                              @endif
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
                          </div>
                        </div>
                      </div>
                      {{-- Main CONTENT end HERE --}}
                      @if ($cmh == 1)
                        <div class="pb-0 get-detail newli">
                          <h4 class="mb-0">Get details on Fee, Admission, Intake.</h4>
                          <a class="ps-btn" href="{{ url('mbbs-abroad-counselling') }}/">Get Free Counselling</a>
                        </div>
                      @endif
                      @php $cmh++; @endphp
                    @endforeach
                  @endif

                  @if ($university->faqs->count() > 0)
                    <div class="accordion faq-accordian " id="accordionExample">
                      <h2 id="faqs">FAQ </h2>
                      @foreach ($university->faqs as $row)
                        <div class="card">
                          <div class="card-header" id="headingTwo{{ $row->id }}">
                            <h5 class="mb-0">
                              <button
                                class="btn btn-link collapsed w-100 d-flex align-items-center justify-content-between"
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
                  <br>

                  @if (count($destinations))
                    <div class="ps-product__box update-bx mb-20" id="2">
                      <aside class="widget widget_best-sale" data-mh="dealhot">
                        <h3 class="widget-title">You might be interested in related destination</h3>
                        <div class="widget__content">
                          <div class="owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000"
                            data-owl-gap="0" data-owl-nav="false" data-owl-dots="false" data-owl-item="4"
                            data-owl-item-xs="2" data-owl-item-sm="2" data-owl-item-md="4" data-owl-item-lg="4"
                            data-owl-duration="1000" data-owl-mousedrag="on">
                            @foreach ($destinations as $oe)
                              <div class="ps-product-group">
                                <div class="ps-product--horizontal">
                                  <div class="ps-product__thumbnail ml-10" style="background:#fff">
                                    <img src="{{ cdn($oe->thumbnail) }}" alt="{{ $oe->page_name }}" loading="lazy">
                                  </div>
                                  <div class="ps-product__content products">
                                    <a class="ps-product__title" href="{{ url('destinations/' . $oe->slug) }}">
                                      {{ $oe->page_name }}
                                    </a>
                                  </div>
                                </div>
                              </div>
                            @endforeach
                          </div>
                        </div>
                      </aside>
                    </div>
                  @endif

                  @if ($university->author_id != null)
                    <div class="ps-page--product mb-3" style="background-color:white;">
                      <div class="ps-container pt-10" id="topuniversities">
                        <div class="ps-section--default new-default pb-2" style="margin-bottom:0px">
                          <div class="ps-section__header" style="margin-bottom:0px; padding-bottom:0px; border:0px">
                            <div class="row author new-author">
                              <div class="col-md-2">
                                <div class="img-div"> <img src="<?php echo cdn($university->getAuthor->profile_pic_path); ?>" alt="<?php echo $university->getAuthor->name; ?>"><i
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
                  @endif
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                  <!-- Sidebar ads -->
                  <aside class="ps-widget--account-dashboard">
                    <h3 class="main-postss">Blog</h3>
                    <div class="ps-widget__content" style="background:#fff">
                      <ul>
                        @foreach ($categories as $cat)
                          <li><a href="<?php echo url('blog/' . $cat->slug); ?>/"><i class="icon-arrow-right"></i>
                              {{ $cat->cate_name }}</a>
                          </li>
                        @endforeach
                      </ul>
                    </div>
                  </aside>
                  @if (count($destinations))
                    <div class="ps-section__left" style="top:60px; background:#fff">
                      <aside class="ps-widget--account-dashboard">
                        <div class="ps-widget__content">
                          <div class="main-postss">
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

@endsection
