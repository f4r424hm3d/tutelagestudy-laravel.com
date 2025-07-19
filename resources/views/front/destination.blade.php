@extends('front.layouts.main')
@push('seo_meta_tag')
  @include('front.layouts.static_page_meta_tag')
@endpush
@section('main-section')
  <div class="ps-breadcrumb">
    <div class="ps-container">
      <ul class="breadcrumb bread-scrollbar">
        <li><a href="<?php echo url('/'); ?>">Home</a></li>
        <li>Destinations</li>
      </ul>
    </div>
  </div>
  <div class="ps-page--single" id="about-us">
    <img class="bannerfullsd" src="{{ asset('front/img/destination.webp') }}" alt="destinations mbbs abroad">

    <div class="ps-about-intro">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6 col-md-6 col-sm-12 col-12">
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
          <div class="col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="ps-section__left main-destinations">
              <div class="new-destionatons">
                <img src="{{ cdn('front/img/about-image.png') }}" alt="About Image" class="education-study">

              </div>
              <div class=" ps-block__content">
                <h3>“I'm addicted to the idea of creating things that are both deep and simple.”</h3>
                <div class="title-names">Tutelage study</div>
                <p>Overseas Education Parnter</p>
              </div>

            </div>
          </div>
        </div>
        <div class="row">
          <?php foreach ($destinations as $row) { ?>
          <div class="col-md-3 mb-4">
            <div class="img-content-one content-destination">
              <a href="{{ url('destinations/' . $row->slug) }}/">
                <div class="image-shows">
                  <img src="{{ cdn($row->thumbnail) }}" alt="{{ $row->page_name }}" style="width:100%">
                </div>
                <div class="full-links-one">
                  <span class="detail-link-one">
                    {{ $row->page_name }} <i class="icon-arrow-right"></i>
                  </span>
                </div>
              </a>
            </div>
          </div>
          <?php } ?>
        </div>
      </div>

    </div>
  </div>
  </div>
@endsection
