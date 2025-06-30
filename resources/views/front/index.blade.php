@extends('front.layouts.main')
@push('seo_meta_tag')
  @include('front.layouts.static_page_meta_tag')
@endpush
@section('main-section')
  <script type="application/ld+json">
    {"@context":"https://schema.org","@type":"FAQPage","mainEntity":[{"@type":"Question","name":"Why do Indian students opt for MBBS abroad?","acceptedAnswer":{"@type":"Answer","text":"There are a limited number of seats available for medical students in India. In addition, the fees charged by private medical colleges in India are much higher than that of many medical institutes in other countries."}},{"@type":"Question","name":"What are the basic eligibility criteria for MBBS abroad?","acceptedAnswer":{"@type":"Answer","text":"Candidates must achieve a minimum of 50% in Class 12 examinations with Physics, Chemistry, and Biology as the main subjects. SC/ST/OBC candidates need to have a minimum of 45%. Candidates must also clear NEET."}},{"@type":"Question","name":"Is NEET required for studying MBBS abroad?","acceptedAnswer":{"@type":"Answer","text":"Yes, all medical universities around the world need applicants from India to clear the National Eligibility cum Entrance Test (NEET) and present the eligibility certificate. Some universities also have their own entrance exams in addition to NEET."}},{"@type":"Question","name":"What is the duration of MBBS abroad?","acceptedAnswer":{"@type":"Answer","text":"Most MBBS courses around the world typically last for 5 years. However, some medical institutions and universities also expect their medical students to spend an additional year as an intern in their internship programs."}},{"@type":"Question","name":"What is the standard fee structure for MBBS courses abroad?","acceptedAnswer":{"@type":"Answer","text":"While the tuition fees for different medical institutes vary, most medical universities charge tuition fees between $20,000 and $50,000 for a 5+1 year course. Hostel accommodation and food expenses account for separate expenses."}}]}
  </script>
  <div id="homepage-1">
    <div class="ps-home-banner ps-home-banner--1 mt-5">
    <div class="container">
      <div class="row">
      <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12">
        <h1 class="widget-title text-center td-uppercase">Most Trusted Study MBBS Abroad Consultants in India</h1>
        <!--div class="ps-section__left"-->
        <div class="ps-carousel--nav-inside owl-slider" data-owl-auto="true" data-owl-loop="true"
        data-owl-speed="5000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="1"
        data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="1000"
        data-owl-mousedrag="on">
        <div class="ps-banner"><a href="https://www.tutelagestudy.com/mbbs-in-abroad/"><img
            src="{{ asset('front/') }}/img/slider/home-1/germany-banner-3.webp" alt="study mbbs abroad"></a></div>
        <div class="ps-banner"><a href="https://www.tutelagestudy.com/medical-universities/"><img
            src="{{ asset('front/') }}/img/slider/home-1/germany-banner-2.webp" alt="study mbbs abroad"></a></div>
        </div>
      </div>
      <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
        <aside class="widget widget_best-sale" data-mh="dealhot">
        <h2 class="widget-title">Medical Colleges</h2>
        <div class="widget__content">
          <div class="owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000" data-owl-gap="0"
          data-owl-nav="false" data-owl-dots="false" data-owl-item="1" data-owl-item-xs="1" data-owl-item-sm="1"
          data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="1000" data-owl-mousedrag="on">
          <div class="ps-product-group">
            @foreach ($universities1 as $tu)
        <div class="ps-product--horizontal">
        <div class="ps-product__thumbnail"> <a href="{{ url('medical-universities/' . $tu->uname) }}/">
          <img src="{{ url($tu->imgpath) }}" alt="{{ $tu->name }}"> </a> </div>
        <div class="ps-product__content"> <a class="ps-product__title"
          href="{{ url('medical-universities/' . $tu->uname) }}/">
          {{ $tu->name }}
          </a> </div>
        </div>
        @endforeach
          </div>
          <div class="ps-product-group">
            @foreach ($universities2 as $tu)
        <div class="ps-product--horizontal">
        <div class="ps-product__thumbnail"> <a href="{{ url('medical-universities/' . $tu->uname) }}/">
          <img src="{{ url($tu->imgpath) }}" alt="{{ $tu->name }}"> </a> </div>
        <div class="ps-product__content"> <a class="ps-product__title"
          href="{{ url('medical-universities/' . $tu->uname) }}//">
          {{ $tu->name }}
          </a> </div>
        </div>
        @endforeach
          </div>
          <div class="ps-product-group">
            @foreach ($universities3 as $tu)
        <div class="ps-product--horizontal">
        <div class="ps-product__thumbnail"> <a href="{{ url('medical-universities/' . $tu->uname) }}/">
          <img src="{{ url($tu->imgpath) }}" alt="{{ $tu->name }}"> </a> </div>
        <div class="ps-product__content"> <a class="ps-product__title"
          href="{{ url('medical-universities/' . $tu->uname) }}/">
          {{ $tu->name }}
          </a> </div>
        </div>
        @endforeach
          </div>
          </div>
        </div>
        </aside>
      </div>
      </div>
    </div>
    </div>
  </div>
  <section class="onlineCoaching pb-0">
    <div class="container">
    <div class="row">
      <div class="col-xl-5 col-lg-5 col-md-5 col-sm-6 col-12"><img data-src="{{ asset('/front/') }}/img/who-we-are.webp"
        alt="Best MBBS Abroad Consultants – Secure Your Medical Seat Today!" border="0" width="w-100"></div>
      <div class="col-xl-7 col-lg-7 col-md-7 col-sm-6 col-12">
      <h2 class="main-h1">Best MBBS Abroad Consultants – Secure Your Medical Seat Today!</h2>
      <p class="jsfy">
        Dreaming of pursuing MBBS abroad? We at Tutelage Study, MBBS Abroad Consultant, help Indian students to secure
        medical seat in top NMC-approved medical universities worldwide. We deliver expert guidance and end-to-end
        support with smooth and hassle-free admission process.
      </p>
      <p class="jsfy">
        We are partner of medical Universities in Russia, Georgia, Kazakhstan, Kyrgyzstan, Uzbekistan, and in European
        countries, where medical students will get globally recognized medical degree with high-quality education at
        affordable tuition fees. MBBS curriculum is taught fully in English-medium for international students. Our
        100% admission support covers university selection, documentation, visa processing, and travel assistance, so
        you can focus entirely on your medical journey.
      </p>
      <p class="jsfy">At Tutelage Study, we ensure you enrol in NMC & WHO-approved universities, giving you a
        medical degree that is recognized worldwide. If you're ready to take the next step toward becoming a doctor,
        apply now and let Tutelage Study MBBS abroad consultants guide you to success!</p>
      <br />
      <a href="<?php echo url('mbbs-in-abroad'); ?>/" class="button home-btn">Know More</a>
      </div>
    </div>
    </div>
  </section>
  <section style="background:#e5e6eb">
    <div class="container" style="padding:30px 15px 0px">
    <h3 class="text-center global-size">Discover the Best Global Medical Education Opportunities</h3>
    <p class="text-center">Tutelage Study is your trusted resource for MBBS abroad, providing students, parents, and
      professionals with expert guidance on top medical universities, admission procedures, and career pathways post
      medical degree. Get accurate, up-to-date information to book your MBBS seat in Abroad.</p>
    <div class="row pt-10">
      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
      <a href="{{ url('medical-universities') }}/">
        <div class="ps-block--category">

        <img data-src="{{ url('front') }}/img/find-university.webp" alt="All Universities"
          style="width:100%!important">

        <h4 class="pt-10 mb-0 button cur-conver-btn">Find All Universities</h4>
        </div>
      </a>

      </div>
      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 ">
      <a href="{{ url('services') }}/">
        <div class="ps-block--category">

        <img data-src="{{ url('front') }}/img/top-courses.webp" alt="Services" style="width:100%!important">
        <h4 class="pt-10 mb-0 button cur-conver-btn">Our Services</h4>
        </div>
      </a>
      </div>
      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 ">
      <a href="{{ url('destinations') }}/">
        <div class="ps-block--category">

        <img data-src="{{ url('front') }}/img/exams.webp" alt="All Destinations" style="width:100%!important">
        <h4 class="pt-10 mb-0 button cur-conver-btn">All Destinations</h4>
        </div>
      </a>
      </div>
      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 ">
      <a href="{{ url('blog') }}/">
        <div class="ps-block--category">
        <img data-src="{{ url('front') }}/img/news.webp" alt="latest news" style="width:100%!important">
        <h4 class="pt-10 mb-0 button cur-conver-btn">Blog & Article</h4>
        </div>
      </a>
      </div>
      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 ">
      <a href="<?php echo url('mbbs-abroad-counselling'); ?>/">
        <div class="ps-block--category">
        <img data-src="<?php echo url('front'); ?>/img/scholarship.webp" alt="Enquire Now"
          style="width:100%!important">
        <h4 class="pt-10 mb-0 button cur-conver-btn">Free Counselling</h4>
        </div>
      </a>
      </div>
      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 ">
      <a href="<?php echo url('neet-ug'); ?>/">
        <div class="ps-block--category">
        <img src="<?php echo url('front'); ?>/img/compare.webp" alt="compare universities"
          style="width:100%!important">
        <h4 class="pt-10 mb-0 button cur-conver-btn">NEET UG</h4>
        </div>
      </a>
      </div>
    </div>
    </div>
  </section>
  <style>
    .servicebox {
    text-align: center;
    }

    .servicebox .service-icon {
    display: inline-block;
    width: 90px;
    height: 90px;
    background-color: #1d4d7a;
    margin-bottom: 20px;
    }

    .servicebox .service-icon i.fa {
    line-height: 90px;
    color: #ffffff;
    font-size: 35px;
    transition: all 0.3s ease 0s;
    }

    .servicebox:hover .service-icon i.fa {
    transform: rotateY(180deg);
    }

    .servicebox .title {
    color: #333;
    border-bottom: 1px solid #1d4d7a;
    display: block;
    line-height: 30px;
    margin: 0 auto 20px;
    padding-bottom: 20px;
    position: relative;
    text-align: center;
    text-transform: uppercase;
    }

    .servicebox .title:before,
    .servicebox .title:after {
    background: #1d4d7a;
    border-radius: 100%;
    bottom: -5px;
    content: "";
    height: 10px;
    margin: 0 -5px 0 0;
    position: absolute;
    right: 50%;
    transition: all 0.4s ease 0s;
    width: 10px;
    }

    .servicebox .title:before {
    left: 50%;
    margin: 0 0 0 -5px;
    }

    .servicebox:hover .title:before {
    left: 100%;
    }

    .servicebox:hover .title:after {
    right: 100%;
    }

    .servicebox .description {
    color: grey;
    padding: 0 15px;
    font: 14px;
    line-height: 27px;
    transition: all 300ms ease 0s;
    }
  </style>

  <section class="onlineCoaching py-0" style="background-color:#e5e6eb">
    <div class="container" style="padding:30px 15px">
    <h1 class="main-h1 text-center mb-2 global-size">Why Study MBBS Abroad?</h1>
    <p class="text-center">MBBS abroad offers access to top-ranked Medical Universities, affordable tuition fee,
      globally recognized degrees, for a successful medical career.</p>
    <div class="row pt-10">
      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 mb-4">
      <div class="ps-block--category customcard">
        <div class="servicebox">
        <div class="service-icon"><span><i class="fa fa-money"></i></span></div>
        <h3 class="title">Affordable Tuition Fees
        </h3>
        <p>Studying MBBS abroad can benefit paying a low tuition fee, less living expenses, making quality medical
          education more accessible</p>
        </div>
      </div>
      </div>
      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 mb-4">
      <div class="ps-block--category customcard">
        <div class="servicebox">
        <div class="service-icon"><span><i class="fa fa-stethoscope"></i></span></div>
        <h3 class="title">Top-Ranked Medical Universities</h3>
        <p>Secure your admission to world ranked, globally recognized universities, with high education quality and
          modern facilities.</p>
        </div>
      </div>
      </div>
      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 mb-4">
      <div class="ps-block--category customcard">
        <div class="servicebox">
        <div class="service-icon"><span><i class="fa fa-check-square-o"></i></span></div>
        <h3 class="title">NMC & WHO-Approved Universities </h3>
        <p>Institutions comply with NMC & WHO guidelines, ensuring your degree is valid for practice in India and
          worldwide.
        </p>
        </div>
      </div>
      </div>
      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 mb-4">
      <div class="ps-block--category customcard">
        <div class="servicebox">
        <div class="service-icon"><span><i class="fa fa-check-square-o"></i></span></div>
        <h3 class="title">No Entrance Exam </h3>
        <p>Meet the eligibility criteria, and Get direct admission without additional entrance tests.
        </p>
        </div>
      </div>
      </div>
      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 mb-4">
      <div class="ps-block--category customcard">
        <div class="servicebox">
        <div class="service-icon"><span><i class="fa fa-language"></i></span></div>
        <h3 class="title">100% English-Medium Programs
        </h3>
        <p>Study in a fully English-taught curriculum, as per NMC Guidelines for Indian Students
        </p>
        </div>
      </div>
      </div>
      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 mb-4">
      <div class="ps-block--category customcard">
        <div class="servicebox">
        <div class="service-icon"><span><i class="fa fa-dollar"></i></span></div>
        <h3 class="title">No Donations
        </h3>
        <p>We guarantee a transparent admission process, with no capitation fees, hidden costs, or
          unexpected expenses.</p>
        </div>
      </div>
      </div>
    </div>
    </div>
  </section>
  <div class="ps-search-trending m-education ">
    <div class="container">
    <div class="ps-section__header text-center">
      <h3 style="color:white" class="global-size">Most Popular Countries for MBBS Abroad</h3>
      <p style="color:white">
      Secure admission to NMC & WHO-approved universities in Russia, Georgia, Kazakhstan, Kyrgyzstan, Uzbekistan, and
      more with affordable fees, an English-medium curriculum, and no entrance exams
      </p>
    </div>
    <div class="row">
      @foreach ($destinations as $row)
      <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 mb-4">
      <div class="ps-post ps-product shadow">
      <div class="ps-post__thumbnail"><img data-src="{{ asset($row->destination_image ?? $row->thumbnail) }}"
        alt="MBBS in Malaysia"></div>
      <div class="ps-post__content" style="border:0px; padding:12px 0px; background:#fff">
      <a class="ps-post__title text-center"
        href="{{ route('destination.detail', ['destination_slug' => $row->slug]) }}">
        {{ $row->page_name }}
      </a>
      </div>
      </div>
      </div>
    @endforeach
    </div>
    <div class="pt-20" align="center"><a href="{{ url('destinations') }}" target="_blank" rel="noopener noreferrer"
      class="button home-btn">Browse All
      Destinations</a></div>
    </div>
  </div>
  <section class="onlineCoaching" style="background:#e5e6eb">
    <div class="container">
    <div class="row">
      <div class="col-12 col-sm-12 col-md-12 col-lg-6 mb-4">
      <div class="all-uss">
        <h2 class="main-h1">Why Contact Us?</h2>
        <p class="jsfy">
        At Tutelage Study, we provide guidance to students and parents for MBBS abroad journey with expert advice,
        ensuring compliance with NMC guidelines and embassies advisory. Our qualified counsellors support you select
        top-ranked medical universities, navigate the admission procedure, and plan your budget efficiently. We also
        deliver support in understanding post-MBBS pathways, including revalidation and career progression. With our
        personalized guidance, you can make decision for a successful medical career abroad.
        </p>
        <div class="counselling-conten">
        <ul>
          <li>
          <h4 class="customcard">Book your University</h4>
          </li>
          <li>
          <h4 class="customcard">Career Planning</h4>
          </li>
          <li>
          <h4 class="customcard">Financial Advice</h4>
          </li>
          <li>
          <h4 class="customcard">Customised Solutions</h4>
          </li>
          <li>
          <h4 class="customcard">Visa and Admission</h4>
          </li>
          <li>
          <h4 class="customcard">Accommodations</h4>
          </li>
        </ul>
        <a href="https://www.tutelagestudy.com/mbbs-abroad-counselling/" class="button home-btn">Enquire Now</a>
        </div>
      </div>
      </div>
    
    </div>
  </section>
  <div class="ps-page--product  pb-40" style="background:#e5e6eb;">
    <div class="ps-container">
    <div class="ps-section--default customcard">
      <aside class="widget widget_best-sale " data-mh="dealhot">
      <h2 class="widget-title">Top Medical Universities of MBBS Abroad</h2>
      <div class="widget__content">
        <div class="owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000" data-owl-gap="0"
        data-owl-nav="false" data-owl-dots="false" data-owl-item="1" data-owl-item-xs="1" data-owl-item-sm="1"
        data-owl-item-md="1" data-owl-item-lg="2" data-owl-item-xl="2" data-owl-duration="1000"
        data-owl-mousedrag="on">
        <div class="ps-product-group">
          @foreach ($universities1 as $tu)
        <div class="ps-product--horizontal">
        <div class="ps-product__thumbnail">
        <a href="{{ url('medical-universities/' . $tu->uname) }}/">
        <img src="{{ url($tu->imgpath) }}" alt="{{ $tu->name }}">
        </a>
        </div>
        <div class="ps-product__content">
        <a class="ps-product__title" href="{{ url('medical-universities/' . $tu->uname) }}/">
        {{ $tu->name }}
        </a>
        </div>
        </div>
      @endforeach
        </div>
        <div class="ps-product-group">
          @foreach ($universities2 as $tu)
        <div class="ps-product--horizontal">
        <div class="ps-product__thumbnail">
        <a href="{{ url('medical-universities/' . $tu->uname) }}/">
        <img src="{{ url($tu->imgpath) }}" alt="{{ $tu->name }}">
        </a>
        </div>
        <div class="ps-product__content">
        <a class="ps-product__title" href="{{ url('medical-universities/' . $tu->uname) }}/">
        {{ $tu->name }}
        </a>
        </div>
        </div>
      @endforeach
        </div>
        <div class="ps-product-group">
          @foreach ($universities3 as $tu)
        <div class="ps-product--horizontal">
        <div class="ps-product__thumbnail">
        <a href="{{ url('medical-universities/' . $tu->uname) }}/">
        <img src="{{ url($tu->imgpath) }}" alt="{{ $tu->name }}">
        </a>
        </div>
        <div class="ps-product__content">
        <a class="ps-product__title" href="{{ url('medical-universities/' . $tu->uname) }}/">
        {{ $tu->name }}
        </a>
        </div>
        </div>
      @endforeach
        </div>
        </div>
      </div>
      </aside>
    </div>
    </div>
  </div>
  <section class="image-bg endCounselling">
    <div class="container">
    <h2 class="main-h1">#1 MBBS Education Consultants</h2>
    <h3 class="sub-h1">Looking to get the best career guidance? Our experts know exactly what you need!</h3>
    <p class="main-p">Contact us without hesitation, as we are among the top MBBS educational counselors you'll
      encounter. Our sincere efforts, invaluable advice, and impartial guidance can turn your dreams into reality! As
      the most trusted abroad consultancy company in India, with over 8 years of experience, we offer premier
      educational solutions at an affordable cost. Explore our testimonials to address any doubts and let our dedicated
      team assist you thoroughly in pursuing your MBBS studies abroad.</p>
    <div class="row">
      <div class="col-12 col-md-6">
      <div class="counselling-left">
        <div class="head">How we do MBBS Abroad Counselling</div>
        <ul class="tl">
        <li class="tl-item">
          <div class="item-title">Tell us about your College / Course &amp; Location preferences.</div>
        </li>
        <li class="tl-item">
          <div class="item-title">An Expert Counsellor will be assigned to you.</div>
        </li>
        <li class="tl-item">
          <div class="item-title">Discuss your options with your counsellor.</div>
        </li>
        <li class="tl-item">
          <div class="item-title">Apply online through our COMMON APPLICATION FORM platform.</div>
        </li>
        <li class="tl-item">
          <div class="item-title">Your counselor will ensure seat allocation for you.</div>
        </li>
        <li class="tl-item">
          <div class="item-title">Deposit your fee. If you need, avail Education Loan at 0% Interest Rate.</div>
        </li>
        <li class="tl-item">
          <div class="item-title">Yippie! your dream college is right there waiting for you to join !</div>
        </li>
        </ul>
        <a href="<?php echo url('contact-us'); ?>/" class="btn home-btn">Talk to our Experts</a>
      </div>
      </div>
      <div class="col-12 col-md-6 counselling-right">
      <div class="counselling-content">
        <ul>
        <li>
          <div>
          <span class="counselling-right-image"><img data-src="{{ asset('front/') }}/img/Cicon1.webp"
            alt="Conselling Icon"></span>
          <p>No Hidden <br>
            Charges
          </p>
          </div>
        </li>
        <li>
          <div>
          <span class="counselling-right-image"><img data-src="{{ asset('front/') }}/img/Cicon2.webp"
            alt="Conselling Icon"></span>
          <p>Expert <br>
            Career Counsellors
          </p>
          </div>
        </li>
        <li>
          <div>
          <span class="counselling-right-image"><img data-src="{{ asset('front/') }}/img/Cicon3.webp"
            alt="Conselling Icon"></span>
          <p>100% Online <br>
            Process
          </p>
          </div>
        </li>
        <li>
          <div>
          <span class="counselling-right-image"><img data-src="{{ asset('front/') }}/img/Cicon4.webp"
            alt="Conselling Icon"></span>
          <p>Visa<br />
            Assistance
          </p>
          </div>
        </li>
        <li>
          <div>
          <span class="counselling-right-image"><img data-src="{{ asset('front/') }}/img/Cicon5.webp"
            alt="Conselling Icon"></span>
          <p>Forex <br>
            Assistance
          </p>
          </div>
        </li>
        <li>
          <div>
          <span class="counselling-right-image"><img data-src="{{ asset('front/') }}/img/Cicon6.webp"
            alt="Conselling Icon"></span>
          <p>Affordable Loan assistance
          </p>
          </div>
        </li>
        </ul>
      </div>
      </div>
    </div>
    </div>
  </section>
  <div class="ps-page--product pt-30 pb-20 all-ol-items" style="background:#eee;">
    <div class="ps-container">
    <div class="ps-section--default" style="padding:15px 20px;background: #fff; border-radius:5px">
      <div class="ps-section__header" style="margin-bottom:10px; padding-bottom:0px; border:0px!important">
      <h3>Latest Articles</h3>
      </div>
      <div class="ps-section__content" id="topuniversities">
      <div class="ps-carousel--nav owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="10000"
        data-owl-gap="30" data-owl-nav="true" data-owl-dots="true" data-owl-item="4" data-owl-item-xs="1"
        data-owl-item-sm="2" data-owl-item-md="4" data-owl-item-lg="4" data-owl-item-xl="4" data-owl-duration="1000"
        data-owl-mousedrag="on" style="margin-bottom:0px!important">
        @foreach ($news as $row)
      <div class="ps-post ps-product">
      <div class="ps-post__thumbnail ">
        <img data-src="{{ asset($row->imgpath) }}" alt="{{ $row->headline }}"
        style="width:100%; height: 150px;!important">
      </div>
      <div class="ps-post__content">
        <div class="ps-post__meta">
        <a href="{{ url('blog/' . $row->getCategory->slug) }}/">
        {{ $row->getCategory->cate_name }}
        </a>
        </div>
        <a class="ps-post__title"
        href="{{ route('blog.detail', ['category_slug' => $row->getCategory->slug, 'slug' => $row->slug]) }}/"
        title="{{ $row->headline }}" data-toggle="tooltip">
        {{ strlen($row->headline) > 44 ? substr($row->headline, 0, 44) . '...' : $row->headline }}
        </a>
        <p style="margin-bottom:0px; font-size:11px">
        {{ getFormattedDate($row->created_at, 'd M, Y') }} by<span> admin</span>
        </p>
      </div>
      </div>
      @endforeach
      </div>
      </div>
    </div>
    </div>
  </div>
  </div>
  <script>
    function convert() {
    //alert('hello');
    $('#submitBtnCC').val('Converting...');
    var from = $('#from').val();
    var to = $('#to').val();
    var amount = $('#from_amount').val();
    var key = "3c10af8cae94eaf3650ba0b9edb97d1eef23505e";
    var url = "https://api.getgeoapi.com/v2/currency/convert?api_key=" + key + "&from=" + from + "&to=" + to +
      "&amount=" + amount + "&format=json"
    $.getJSON(url, function (data) {
      $('#from_code').val(from);
      $('#to_code').val(to);
      $('#to_amount').val(data.rates[to].rate_for_amount);
      $('#submitBtnCC').val('Convert');
    });
    }
  </script>
@endsection