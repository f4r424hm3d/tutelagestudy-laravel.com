@extends('front.layouts.main')

@push('seo_meta_tag')
  @include('front.layouts.dynamic_page_meta_tag')
@endpush

@push('breadcrumb_schema')
  <!-- Breadcrumb Schema -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org/",
    "@type": "BreadcrumbList",
    "name": "{{ ucwords($meta_title) }}",
    "description": "{{ $meta_description }}",
    "itemListElement": [
      {
        "@type": "ListItem",
        "position": 1,
        "name": "Home",
        "item": "{{ url('/') }}/"
      },
      {
        "@type": "ListItem",
        "position": 2,
        "name": "{{ ucfirst($examType->exam_type) }}",
        "item": "{{ url()->current() }}/"
      }
    ]
  }
  </script>
  <!-- Breadcrumb Schema End -->

  <!-- Article Schema -->
  <script type="application/ld+json">
  {
    "@context": "http://schema.org",
    "@type": "Article",
    "inLanguage": "en",
    "headline": "{{ $meta_title }}",
    "description": "{{ $meta_description }}",
    "keywords": "{{ $meta_keyword }}",
    "dateModified": "{{ getISOFormatTime($examType->updated_at) }}",
    "datePublished": "{{ getISOFormatTime($examType->updated_at) }}",
    "mainEntityOfPage": {
      "id": "{{ $page_url }}/",
      "@type": "WebPage"
    },
    "author": {
      "@type": "Person",
      "name": "Tutelage Team",
      "url": "https://www.tutelagestudy.com/author/tutelage-team/"
    },
    "publisher": {
      "@type": "Organization",
      "name": "Tutelage Study",
      "logo": {
        "@type": "ImageObject",
        "name": "Tutelage Study",
        "url": "https://www.tutelagestudy.com/front/img/logo_light.png",
        "height": "65",
        "width": "258"
      }
    },
    "image": {
      "@type": "ImageObject",
      "url": "{{ asset($og_image_path) }}"
    }
  }
  </script>
@endpush

@section('main-section')
  <style>
    .child-heading {
      margin-left: 30px;
      /* Adjust the value to set the desired indentation */
    }
  </style>

  <div class="ps-page--single ps-page--vendor">
    <div class="ps-breadcrumb">
      <div class="container">
        <div class="col-md-12">
          <ul class="breadcrumb bread-scrollbar">
            <li><a href="{{ url('/') }}">Home</a></li>
            <li><span>{{ ucfirst($examType->exam_type) }}</span></li>
          </ul>
        </div>
      </div>
    </div>

    <div class="ps-page--blog widget_features">
      <div class="container">
        <div class="ps-blog--sidebar row">
          <div class="mb-20 col-md-9">
            <div class="ps-post--detail sidebar">
              <div class="ps-post__content card">
                {{-- <div class="ps-post__header">
                  <h1 class="mb-1" style="font-size: 20px">{{ ucfirst($examType->headline) }}</h1>
                  <p style="font-size:12px">
                    {{ getFormattedDate($examType->updated_at, 'd M, Y') }}, <b>{{ $examType->getAuthor->name }}</b>,
                    <a href="{{ url('blog/' . $examType->getCategory->slug) }}/">{{ $examType->getCategory->cate_name }}</a>
                  </p>
                </div> --}}
                {{-- <div>
                  <img data-src="{{ asset($examType->imgpath) }}" alt="{{ ucfirst($examType->headline) }}" class="mb-20"
                    width="1000">
                </div> --}}
                {{-- <br>
                <div class="pt-0 pb-20 get-detail text-center">
                  <h4 class="mb-0">Get Free Counselling</h4>
                  <a class="ps-btn" onclick="window.location.href='{{ url('mbbs-abroad-counselling/') }}/'"
                    href="javascript:void()">Enquire Now</a>
                </div> --}}
                <div class="row">
                  @if ($examType->years->count() > 0)
                    @foreach ($examType->years as $row)
                      <div class="col-md-3">
                        <div class="card">
                          <a href="{{ url($examType->slug . '/' . $row->slug) }}" target="_blank">
                            {{ $row->year }}
                          </a>
                        </div>
                      </div>
                    @endforeach
                  @endif
                </div>
                <br>
                @if ($examType->contents->count() > 0)
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
                          @foreach ($examType->parentContents as $row)
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
                          @if ($examType->faqs->count() > 0)
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
                  @foreach ($examType->parentContents as $row)
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
                <br>

                @if ($examType->faqs->count() > 0)
                  <div class="accordion faq-accordian " id="accordionExample">
                    <h2 id="faqs">FAQ </h2>
                    @foreach ($examType->faqs as $row)
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
          </div>

          <div class="col-md-3">
            <div class="ps-section__left">
              <aside class="ps-widget--account-dashboard">
                <h3 style="background:#cd2122; color:#fff; font-size:16px; padding:10px 20px; margin:0px">More Categories
                </h3>
                <div class="ps-widget__content" style="background:#fff">
                  <ul>

                  </ul>
                </div>
              </aside>

              <aside class="ps-widget--account-dashboard">
                <h3 style="background:#cd2122; color:#fff; font-size:16px; padding:10px 20px; margin:0px">Recent Posts
                </h3>
                <div class="ps-widget__content" style="background:#fff">
                  <ul>

                  </ul>
                </div>
              </aside>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
