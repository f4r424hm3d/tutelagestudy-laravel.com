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
              @if ($exam_page->image_path != null)
                <div class="ps-product__box _boxs">
                  <div class="ps-document doc-ps">
                    <center>
                      <img src="{{ url($exam_page->image_path) }}" alt="{{ $exam_page->page_name }}"
                        class="img-responsive">
                    </center>
                  </div>
                </div>
              @endif
              <br>
              <div class="pt-0 pb-20 get-detail free-details">
                <span style="font-size:16px; color:#cd2122;">Get Free NEET Counselling from Experts</span>
                <a class="ps-btn" onclick="window.location.href='{{ url('neet-counselling') }}/'" href="javascript:void()"
                  rel="nofollow">Enquire Now</a>
              </div>

              @if ($exam_page_contents->count() > 1)
                <div class="ps-product__box _boxs mb-20">
                  <aside class="widget widget_best-sale sales">
                    <h3 class="widget-title">
                      Table of Contents
                      <span style="float:right;">
                        <button class="btn btn-outline-info tglBtn hide-this"><i class="fa-solid fa-plus"></i></button>
                        <button class="btn btn-outline-info tglBtn"><i class="fa-solid fa-minus"></i></button>
                      </span>
                    </h3>
                    <div class="widget__content tbl-cntnt main-cntent" id="tblCDiv">
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
                <div class="ps-product__box _boxs mb-20" id="{{ slugify($c->title) }}">
                  <div class="ps-tabs">
                    <div class="ps-tab active">
                      <div class="ps-document doc-ps">
                        {!! $c->tab_content !!}
                      </div>
                    </div>
                  </div>
                </div>
              @endforeach

              @if ($faqs->count() > 0)
                <div class="ps-product__box _boxs mb-20">
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

              @if ($exam_page->author_id != null)
                <div class="ps-page--product" style="background-color:white;">
                  <div class="ps-container pt-10" id="topuniversities">
                    <div class="ps-section--default pb-2" style="margin-bottom:0px">
                      <div class="ps-section__header" style="margin-bottom:0px; padding-bottom:0px; border:0px">
                        <div class="row author check-auth">
                          <div class="col-md-2">
                            <div class="img-div">
                              <img src="{{ cdn($exam_page->getAuthor->profile_pic_path) }}"
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
                      <div class="main-postss">Other
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
