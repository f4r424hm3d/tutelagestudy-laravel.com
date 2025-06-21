@extends('front.layouts.main')
@push('seo_meta_tag')
  @include('front.layouts.dynamic_page_meta_tag')
@endpush
@push('breadcrumb_schema')
  <!-- breadcrumb schema Code -->
  @if (session('unifilter_destination'))
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
        "item": "{{ url('/') }}/"
      }, {
        "@type": "ListItem",
        "position": 2,
        "name": "Medical Universities",
        "item": "{{ url('medical-universities') }}"
      }, {
        "@type": "ListItem",
        "position": 3,
        "name": "{{ $currentDestinationdet->page_name }}",
        "item": "{{ url()->current() }}/"
      }]
    }
  </script>
  @else
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
          "item": "{{ url('/') }}/"
        }, {
          "@type": "ListItem",
          "position": 2,
          "name": "Medical Universities",
          "item": "{{ url()->current() }}/"
        }]
      }
    </script>
  @endif
  <!-- webpage schema Code Destinations -->
  <script type="application/ld+json">
    {
      "@context": "https://schema.org/",
      "@type": "webpage",
      "url": "<?php echo url(Request::segment(1)); ?>/",
      "name": "Medical Universities",
      "description": "<?php echo $meta_description; ?>",
      "inLanguage": "en-US",
      "keywords": [
        "<?php echo $meta_keyword; ?>"
      ]
    }
  </script>
@endpush
@section('main-section')
  <style>
    .pagination li.active span {
      background-color: #117888 !important;
      color: #fff;
    }
  </style>
  <style type="text/css">
    .m-left1 {
      float: center;
      width: 100%;
      margin-right: 25%;
    }

    .common1 {
      float: left;
      margin-right: 5%;
    }

    .modal-content {
      margin: 22% auto
    }

    .modal {
      padding-right: 0px !important;
      z-index: 9
    }

    .modal-text-p {
      padding-top: 20px
    }

    .modal-header {
      padding: 2rem 1rem;
    }

    @media screen and (max-width:767px) {
      .modal-content {
        margin: 20% auto
      }

      .modal-text-p {
        padding-top: 10px
      }

      .mplr0 {
        padding-left: 0px !important;
        padding-right: 0px !important;
      }
    }

    .ps-form--quick-search a {
      background-color: #000000;
      color: #fff;
      border: none;
      font-weight: 700;
      padding: 12px 24px;
      border-radius: 4px;
      margin-left: 10px;
    }

    .ps-form--quick-search a:hover {
      background-color: #117888;
    }
  </style>
  <header class="header header--mobile header--mobile-categories" data-sticky="true">
    <div class="header__filter">
      <button class="ps-shop__filter-mb" id="filter-sidebar"><i class="icon-equalizer"></i><span>Filter</span></button>
    </div>
  </header>
  <div class="ps-breadcrumb">
    <div class="container-fluid mplr0">
      <ul class="breadcrumb bread-scrollbar">
        <li><a href="{{ url('/') }}">Home</a></li>
        @if (session('unifilter_destination'))
          <li><a href="{{ url('medical-universities') }}">Medical Universities</a></li>
          <li>
            {{ $currentDestinationdet->page_name }}
          </li>
        @else
          <li>Medical Universities</li>
        @endif
      </ul>
    </div>
  </div>
  @if (session('unifilter_destination'))
    <!-- top filter start -->
    <div class="ps-section--default ps-home-blog">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="ps-block--recent-viewed">
              <div class="ps-block__header">
                <h4>TOP Medical UNIVERSITIES/COLLEGES IN Abroad</h4>
              </div>
              <style>
                .ps-section--default {
                  margin-bottom: 30px !important
                }

                .filter-hdr {
                  border: 1px solid #edeff0;
                  box-shadow: 0 0 5px 0 rgb(207 207 207 / 50%);
                  background: #fff;
                  padding: 10px 10px 5px 10px;
                }

                .filter-hdr a {
                  display: inline-block;
                  color: #756d6d;
                  border-radius: 100px;
                  padding: 5px 10px 5px 10px;
                  font-size: 11px;
                  border: 1px solid;
                  background-color: #eee;
                  text-decoration: none;
                  text-transform: uppercase;
                  margin-right: 5px;
                  margin-bottom: 5px
                }

                .filter-hdr a:hover {
                  background: #0047ab;
                  color: #fff;
                  cursor: pointer;
                }
              </style>
              <div class="row filter-hdr">
                @if (session('unifilter_destination'))
                  <a href="javascript:void(0)" onclick="removeAppliedFilter('unifilter_destination')">
                    {{ $currentDestinationdet->page_name }} <span>×</span>
                  </a>
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  @endif
  <style>
    .alert {
      padding: 20px;
      background-color: #4CAF50;
      color: white;
    }

    .closebtn {
      margin-left: 15px;
      color: white;
      font-weight: bold;
      float: right;
      font-size: 22px;
      line-height: 20px;
      cursor: pointer;
      transition: 0.3s;
    }

    .closebtn:hover {
      color: black;
    }
  </style>
  <div class="ps-page--product ps-page--product-box pt-0">
    <div class="container-fluid mplr0">
      <div class="row">
        <div class="col-lg-12">
          <div class="ps-page--shop">
            <div class="">
              <div class="ps-layout--shop">
                @include('front.filter-medical-universities')
                <div class="ps-layout__right">
                  <div class="ps-shopping ps-tab-root">
                    <?php if (session()->has('smsg')) { ?>
                    <div class="alert"> <span class="closebtn"
                        onclick="this.parentElement.style.display='none';">&times;</span> <strong>
                        <?php echo session()->get('smsg'); ?>
                      </strong> </div>
                    <?php } ?>
                    <div class="ps-shopping__header">
                      <p>
                        <?php echo $pageHeadingTitle; ?>
                      </p>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="header__center">
                          <form class="ps-form--quick-search" method="get">
                            <input class="form-control" name="search" type="text" placeholder="Search Universities"
                              value="{{ request('search', '') }}" id="input-search"
                              style="background:#fff; height: 45px;">
                            <button>Search</button>
                            <a href="<?php echo url('medical-universities/'); ?>/">Reset</a>
                          </form>
                        </div>
                      </div>
                    </div>
                    <br>
                    <div class="ps-tabs">

                      @if ($total > 0)
                        @foreach ($rows as $key)
                          <div class="ps-tab active" id="tab-2">
                            <div>
                              <div class="ps-product ps-product--wide">
                                <div
                                  class="ps-product__thumbnail universitylogo text-center col-md-2 col-sm-12 col-xs-12">
                                  <img data-src="{{ asset($key->imgpath) }}" alt="{{ $key->name }} Logo"
                                    loading="lazy">
                                </div>
                                <div class="ps-product__container col-md-7 col-sm-12 col-xs-12">
                                  <div class="ps-product__content">
                                    <a class="ps-product__title b"
                                      href="{{ url('medical-universities/' . $key->uname) }}/">
                                      <h5>
                                        {{ $key->name }}
                                      </h5>
                                    </a>
                                    <p>
                                      <i class="fa fa-university"></i><span>
                                        {{ $key->getInstType->type ?? 'N/A' }}
                                      </span>
                                    </p>
                                  </div>
                                </div>
                                <div
                                  class="ps-product__container col-md-3 col-sm-12 col-xs-12 text-center  justify-content-end ">
                                  <p style="margin:0px">
                                    <a class="ps-btn mt-2 w-100" href="{{ url('mbbs-abroad-counselling') }}/"><i
                                        class="icon-question-circle"></i> Request Info</a>
                                  </p>
                                </div>
                              </div>
                            </div>
                          </div>
                        @endforeach
                      @else
                        <div class="ps-shopping__header">
                          <div class="row">
                            <div class="col-12">
                              <div class="header">
                              <span>No data found</span>
                            </div>
                            </div>
                          </div>
                        </div>
                      @endif

                      <div class="ps-pagination">
                        {!! $rows->links('pagination::front') !!}
                      </div>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  @include('front.unimbl-filter')
  <div id="back2top"><i class="pe-7s-angle-up"></i></div>
  <div class="ps-site-overlay"></div>
  <div id="loader-wrapper">
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
  </div>

  <script>
    function setModelAttr(img, name) {
      //alert(img + ' , ' + name);
      // var imgpath = "<?php echo url('/'); ?>" + img;
      // $('#UniNameSpan').text(name);
      // $('#uniImgTag').attr('src', imgpath);
      window.open("{{ url('mbbs-abroad-counselling') }}/", "_self");
    }

    function removeAppliedFilter(a) {
      //alert(col + ' ' + val);
      if (a != "") {
        $.ajax({
          url: "{{ url('university/remove-filter') }}/",
          method: "GET",
          data: {
            value: a
          },
          success: function(b) {
            if (a == "unifilter_destination") {
              window.location.replace("{{ url('medical-universities/') }}/");
            } else {
              location.reload(true);
            }
          }
        });
      }
    }

    function AppliedFilter__XXX(col, val) {
      //alert(col + ' ' + val);
      var fval = val.toLowerCase();
      fval = fval.replace(" ", "-");

      if (col == 'unifilter_destination') {
        var path = 'medical-universities-in-' + fval;
        window.location.replace("{{ url('/') }}/" + path + "/");
      } else {
        location.reload(true);
      }
    }

    function AppliedFilter(col, val) {
      //alert(col + ' ' + val);
      var fval = val.toLowerCase();
      fval = fval.replace(" ", "-");

      if (col == 'unifilter_destination') {
        var path = fval;
        window.location.replace("{{ url('medical-universities') }}/" + path + "/");
      } else {
        location.reload(true);
      }
    }
  </script>
@endsection
