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
        "name": "Blog",
        "item": "{{ url('blog') }}/"
      },
      {
        "@type": "ListItem",
        "position": 3,
        "name": "{{ $blog->getCategory->cate_name }}",
        "item": "{{ url('blog/'.$blog->getCategory->slug) }}/"
      },
      {
        "@type": "ListItem",
        "position": 4,
        "name": "{{ ucfirst($blog->headline) }}",
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
    "dateModified": "{{ getISOFormatTime($blog->updated_at) }}",
    "datePublished": "{{ getISOFormatTime($blog->created_at) }}",
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
    /* Your CSS styles here */
  </style>

  <div class="ps-page--single ps-page--vendor">
    <div class="ps-breadcrumb">
      <div class="container">
        <div class="col-md-12">
          <ul class="breadcrumb bread-scrollbar">
            <li><a href="{{ url('/') }}">Home</a></li>
            <li><a href="{{ url('blog') }}/">Blog</a></li>
            <li><a href="{{ url('blog/' . $blog->getCategory->slug) }}/">{{ $blog->getCategory->cate_name }}</a></li>
            <li><span>{{ ucfirst($blog->headline) }}</span></li>
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
                <div class="ps-post__header">
                  <h1 class="mb-1" style="font-size: 20px">{{ ucfirst($blog->headline) }}</h1>
                  <p style="font-size:12px">
                    {{ getFormattedDate($blog->created_at, 'd M, Y') }}, <b>{{ $blog->getAuthor->name }}</b>,
                    <a href="{{ url('blog/' . $blog->getCategory->slug) }}/">{{ $blog->getCategory->cate_name }}</a>
                  </p>
                </div>
                <div>
                  <img data-src="{{ asset($blog->imgpath) }}" alt="{{ ucfirst($blog->headline) }}" class="mb-20"
                    width="1000">
                </div>
                <br>
                <div class="pt-0 pb-20 get-detail">
                  <h4 class="mb-0">Get Free Counselling</h4>
                  <a class="ps-btn" onclick="window.location.href='{{ url('mbbs-abroad-counselling/') }}/'"
                    href="javascript:void()">Enquire Now</a>
                </div>
                @if ($blog->contents->count() > 0)
                  <div class="card">
                    <div class="card-header">
                      <h3>Table of Content</h3>
                    </div>
                    <div class="card-body pl-4 pr-4 bg-light">
                      <div class="table-of-content">
                        <ol class="top-level">
                          @foreach ($blog->parentContents as $row)
                            <li>
                              <a href="#{{ $row->slug }}"><b>{{ $row->title }}</b></a>

                              @if ($row->childContents->count() > 0)
                                <ol>
                                  @foreach ($row->childContents as $child)
                                    <li><a href="#{{ $child->slug }}">{{ $child->title }}</a></li>
                                  @endforeach
                                </ol>
                              @endif
                            </li>
                          @endforeach
                        </ol>
                      </div>
                    </div>
                  </div>
                  <hr>
                  @foreach ($blog->contents as $row)
                    <div class="ps-document">
                      <h2 id="{{ $row->slug }}">{{ $row->title }}</h2>
                      <p>{!! $row->description !!}</p><br>
                    </div>
                  @endforeach
                @endif
                <div class="ps-document">
                  {!! $blog->description !!}
                </div>
                <br>
                <hr>
              </div>
            </div>
            <br>
            @if ($blog->author_id)
              <div class="ps-page--product" style="background-color:white;">
                <div class="ps-container pt-10" id="topuniversities">
                  <div class="ps-section--default pb-2">
                    <div class="ps-section__header">
                      <div class="row author">
                        <div class="col-md-2">
                          <div class="img-div">
                            <img data-src="{{ asset($blog->getAuthor->profile_pic_path) }}"
                              alt="{{ $blog->getAuthor->name }}">
                            <i class="fa fa-check-circle"></i>
                          </div>
                        </div>
                        <div class="col-md-10">
                          <div class="cont-div">
                            <h6>{{ $blog->getAuthor->name }}</h6>
                            <span>Content Curator | Updated on -
                              {{ getFormattedDate($blog->updated_at, 'M d, Y') }}</span>
                            @if ($blog->getAuthor->shortnote)
                              <p>{{ $blog->getAuthor->shortnote }}</p>
                              <br>
                            @endif
                            <a style="float:right" href="{{ url('author/' . $blog->getAuthor->slug) }}/"
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

          <div class="col-md-3">
            <div class="ps-section__left">
              <aside class="ps-widget--account-dashboard">
                <h3 style="background:#cd2122; color:#fff; font-size:16px; padding:10px 20px; margin:0px">More Categories
                </h3>
                <div class="ps-widget__content" style="background:#fff">
                  <ul>
                    @foreach ($categories as $cat)
                      <li>
                        <a href="{{ route('blog.category', ['category_slug' => $cat->slug]) }}/">
                          <i class="icon-arrow-right"></i> {{ $cat->cate_name }}
                        </a>
                      </li>
                    @endforeach
                  </ul>
                </div>
              </aside>

              <aside class="ps-widget--account-dashboard">
                <h3 style="background:#cd2122; color:#fff; font-size:16px; padding:10px 20px; margin:0px">Recent Posts
                </h3>
                <div class="ps-widget__content" style="background:#fff">
                  <ul>
                    @foreach ($blogs as $rn)
                      <li>
                        <a
                          href="{{ route('blog.detail', ['category_slug' => $rn->getCategory->slug, 'slug' => $rn->slug]) }}/"><i
                            class="icon-arrow-right"></i>
                          <?php echo ucwords($rn->headline); ?>
                        </a>
                      </li>
                    @endforeach
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
