@extends('front.layouts.main')
@push('seo_meta_tag')
  @include('front.layouts.static_page_meta_tag')
@endpush
@section('main-section')
  <style>
    .mb30 {
      margin-bottom: 30px
    }

    .img-content {
      background: #0047ab;
      text-align: center
    }

    .img-content .img-responsive {
      opacity: 1;
    }

    .img-content:hover .img-responsive {
      opacity: 0.2;
    }

    .img-content:hover i {
      padding-left: 5px;
      transition: all 0.5s
    }

    .detail-link {
      font-size: 18px;
      color: #fff;
      line-height: 45px;
      -webkit-transition: all .3s ease;
      transition: all .3s ease;
      text-shadow: 1px 2px 3px #212121;
    }

    .detail-link i {
      font-size: 20px;
      bottom: -2px !important;
      position: relative;
      transition: all 0.5s
    }
  </style>
  <div class="ps-breadcrumb">
    <div class="ps-container">
      <ul class="breadcrumb bread-scrollbar">
        <li><a href="<?php echo url('/'); ?>">Home</a></li>
        <li>Destinations</li>
      </ul>
    </div>
  </div>
  <div class="ps-page--single" id="about-us">
    <img data-src="https://www.educationmalaysia.in/assets/uploadFiles/study/IMG_20221210_133900.jpg"
      alt="destinations mbbs abroad">
    <div class="ps-about-intro">
      <div class="container">
        <div class="row">
          <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
            <div class="ps-section__header" style="max-width:100%; margin:0px">
              <h2>Study MBBS Abroad Education Consultant - Tutelage Study</h2>
              <p class="jsfy">Tutelage Study came to into existence when some of the like-minded and highly professional
                individuals came forward together to create a mastermind educational consultation that undertakes the
                students & recruitments from India. Tutelage study is here to fulfill every Indian student’s dream of
                international education. You can fulfill your ambition of studying abroad with our support as we are
                partnered with lots of medical universities and colleges along with other educational institutions all
                over the world. So, you can not only study abroad in the best universities but also you can stay there and
                enjoy learning in a hassle-free environment.
              </p>
            </div>
          </div>
          <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
            <div class="ps-section__left">
              <div class="ps-block--testimonial-bg bg--top" data-background="{{ asset('front/img/about-image.png') }}">
                <div class="ps-block__content">
                  <h3>“I'm addicted to the idea of creating things that are both deep and simple.”</h3>
                  <figure>
                    <figcaption>Tutelage Study</figcaption>
                    <p>Overseas Education Parnter</p>
                  </figure>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <?php foreach ($destinations as $row) { ?>
          <div class="col-md-3 mt-3 mb30">
            <div class="img-content">
              <a href="{{ url('destinations/' . $row->slug) }}/">
                <img data-src="{{ asset($row->thumbnail) }}" alt="{{ $row->page_name }}" style="width:100%">
                <span class="detail-link">
                  {{ $row->page_name }} <i class="icon-arrow-right"></i>
                </span>
              </a>
            </div>
          </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
@endsection
