@extends('front.layouts.main')
@push('seo_meta_tag')
  @include('front.layouts.static_page_meta_tag')
@endpush
@section('main-section')
  <script type="application/ld+json">
  {"@context":"https://schema.org","@type":"FAQPage","mainEntity":[{"@type":"Question","name":"Why do Indian students opt for MBBS abroad?","acceptedAnswer":{"@type":"Answer","text":"There are a limited number of seats available for medical students in India. In addition, the fees charged by private medical colleges in India are much higher than that of many medical institutes in other countries."}},{"@type":"Question","name":"What are the basic eligibility criteria for MBBS abroad?","acceptedAnswer":{"@type":"Answer","text":"Candidates must achieve a minimum of 50% in Class 12 examinations with Physics, Chemistry, and Biology as the main subjects. SC/ST/OBC candidates need to have a minimum of 45%. Candidates must also clear NEET."}},{"@type":"Question","name":"Is NEET required for studying MBBS abroad?","acceptedAnswer":{"@type":"Answer","text":"Yes, all medical universities around the world need applicants from India to clear the National Eligibility cum Entrance Test (NEET) and present the eligibility certificate. Some universities also have their own entrance exams in addition to NEET."}},{"@type":"Question","name":"What is the duration of MBBS abroad?","acceptedAnswer":{"@type":"Answer","text":"Most MBBS courses around the world typically last for 5 years. However, some medical institutions and universities also expect their medical students to spend an additional year as an intern in their internship programs."}},{"@type":"Question","name":"What is the standard fee structure for MBBS courses abroad?","acceptedAnswer":{"@type":"Answer","text":"While the tuition fees for different medical institutes vary, most medical universities charge tuition fees between $20,000 and $50,000 for a 5+1 year course. Hostel accommodation and food expenses account for separate expenses."}}]}
</script>
  <div id="homepage-1">
    <div class="ps-home-banner ps-home-banner--1">
      <div class="ps-container" style="padding:0px!important">
        <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12">
          <h1 class="widget-title text-center">Most Trusted Study MBBS Abroad Consultants in India</h1>
          <!--div class="ps-section__left"-->
          <div class="ps-carousel--nav-inside owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000"
            data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="1" data-owl-item-xs="1"
            data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="1000"
            data-owl-mousedrag="on">
            <div class="ps-banner"><a href="https://www.tutelagestudy.com/mbbs-in-abroad/"><img
                  src="{{ asset('front/') }}/img/slider/home-1/germany-banner-3.jpg" alt="study mbbs abroad"></a></div>
            <div class="ps-banner"><a href="https://www.tutelagestudy.com/medical-universities/"><img
                  src="{{ asset('front/') }}/img/slider/home-1/germany-banner-2.jpg" alt="study mbbs abroad"></a></div>
            <div class="ps-banner"><a href="/destinations/"><img
                  src="{{ asset('front/') }}/img/slider/home-1/germany-banner-4.jpg" alt="study mbbs abroad"></a></div>
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
                      <div class="ps-product__thumbnail"> <a href="<?php echo url('medical-universities/' . $tu->uname); ?>/"> <img src="<?php echo url($tu->imgpath); ?>"
                            alt="<?php echo $tu->name; ?>"> </a> </div>
                      <div class="ps-product__content"> <a class="ps-product__title" href="<?php echo url('medical-universities/' . $tu->uname); ?>/">
                          <?php echo $tu->name; ?>
                        </a> </div>
                    </div>
                  @endforeach
                </div>
                <div class="ps-product-group">
                  @foreach ($universities2 as $tu)
                    <div class="ps-product--horizontal">
                      <div class="ps-product__thumbnail"> <a href="<?php echo url('medical-universities/' . $tu->uname); ?>/"> <img src="<?php echo url($tu->imgpath); ?>"
                            alt="<?php echo $tu->name; ?>"> </a> </div>
                      <div class="ps-product__content"> <a class="ps-product__title" href="<?php echo url('medical-universities/' . $tu->uname); ?>/">
                          <?php echo $tu->name; ?>
                        </a> </div>
                    </div>
                  @endforeach
                </div>
                <div class="ps-product-group">
                  @foreach ($universities3 as $tu)
                    <div class="ps-product--horizontal">
                      <div class="ps-product__thumbnail"> <a href="<?php echo url('medical-universities/' . $tu->uname); ?>/"> <img src="<?php echo url($tu->imgpath); ?>"
                            alt="<?php echo $tu->name; ?>"> </a> </div>
                      <div class="ps-product__content"> <a class="ps-product__title" href="<?php echo url('medical-universities/' . $tu->uname); ?>/">
                          <?php echo $tu->name; ?>
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
  <section class="onlineCoaching">
    <div class="container">
      <div class="row">
        <div class="col-xl-5 col-lg-5 col-md-5 col-sm-6 col-12"><img data-src="{{ asset('/front/') }}/img/who-we-are.jpg"
            alt="Best MBBS Abroad Consultants – Secure Your Medical Future Today!" border="0" width="w-100"></div>
        <div class="col-xl-7 col-lg-7 col-md-7 col-sm-6 col-12">
          <h2 class="main-h1">Best MBBS Abroad Consultants – Secure Your Medical Future Today!</h2>
          <p class="jsfy">
            Want to Study MBBS Abroad? Get expert guidance from Tutelage Study, India’s #1 MBBS Abroad Consultant, helping
            Indian students get admission to top NMC-Guidelines approved medical universities worldwide.
          </p>
          <p class="jsfy">
            Choosing to study MBBS abroad with us means accessing top-ranked universities in countries like Russia,
            Georgia, Kazakhstan, and Kyrgyzstan, offering globally recognized medical degrees. Our affordable fees and
            budget-friendly options make medical education accessible, while our 100% admission support covers everything
            from university selection to visa and travel assistance. With English-medium MBBS courses, you’ll experience a
            fully English-taught curriculum. Our partner colleges are NMC and WHO-Guidelines approved, ensuring you
            graduate with a degree recognized worldwide. Let India’s best consultants guide you through a hassle-free
            admission process and start your journey toward becoming a doctor today! Apply now for a smooth and successful
            path to your medical career.
          </p>
          <br />
          <a href="<?php echo url('mbbs-in-abroad'); ?>/" class="button home-btn">Know More</a>
        </div>
      </div>
    </div>
  </section>
  <section style="background:#e5e6eb">
    <div class="container" style="padding:30px 15px">
      <h3 class="text-center">Discover the Best Global Medical Education Opportunities</h3>
      <p class="text-center">
        Tutelage Study is a comprehensive platform for students, parents, and education industry professionals seeking
        trusted information on MBBS abroad, top universities, admission processes, and career prospects.
      </p>
      <div class="row pt-10">
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
          <div class="ps-block--category">
            <a class="ps-block__overlay" href="<?php echo url('medical-universities'); ?>/" target="_blank" rel="noopener noreferrer">All
              Universities</a>
            <img data-src="<?php echo url('front'); ?>/img/find-university.jpg" alt="All Universities"
              style="width:100%!important">
            <h4 class="pt-10 mb-0 button cur-conver-btn">Find All Universities</h4>
          </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 ">
          <div class="ps-block--category">
            <br>
            <a class="ps-block__overlay" href="<?php echo url('services'); ?>/" target="_blank"
              rel="noopener noreferrer">Services</a>
            <img data-src="<?php echo url('front'); ?>/img/top-courses.jpg" alt="Services" style="width:100%!important">
            <h4 class="pt-10 mb-0 button cur-conver-btn">Our Services</h4>
          </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 ">
          <div class="ps-block--category">
            <br>
            <a class="ps-block__overlay" href="<?php echo url('destinations'); ?>/" target="_blank" rel="noopener noreferrer">MBBS
              Countries</a>
            <img data-src="<?php echo url('front'); ?>/img/exams.jpg" alt="All Destinations" style="width:100%!important">
            <h4 class="pt-10 mb-0 button cur-conver-btn">All Destinations</h4>
          </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 ">
          <div class="ps-block--category">
            <br>
            <a class="ps-block__overlay" href="{{ url('blog') }}/" target="_blank"
              rel="noopener noreferrer">Blog</a> <img data-src="<?php echo url('front'); ?>/img/news.jpg" alt="latest news"
              style="width:100%!important">
            <h4 class="pt-10 mb-0 button cur-conver-btn">Blog & Article</h4>
          </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 ">
          <div class="ps-block--category">
            <br>
            <a class="ps-block__overlay" href="<?php echo url('mbbs-abroad-counselling'); ?>/" target="_blank"
              rel="noopener noreferrer">Inquiry
              Now</a> <img data-src="<?php echo url('front'); ?>/img/scholarship.jpg" alt="Enquire Now"
              style="width:100%!important">
            <h4 class="pt-10 mb-0 button cur-conver-btn">Free Counselling</h4>
          </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 ">
          <div class="ps-block--category">
            <br>
            <a class="ps-block__overlay" href="<?php echo url('neet-ug'); ?>/">Explore Neet Exam</a><img
              src="<?php echo url('front'); ?>/img/compare.jpg" alt="compare universities" style="width:100%!important">
            <h4 class="pt-10 mb-0 button cur-conver-btn">NEET UG</h4>
          </div>
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
      width: 300px;
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

    @media screen and (max-width:1000px) {
      .servicebox {
        margin-bottom: 30px;
      }
    }
  </style>
  <section class="onlineCoaching" style="background-color:#e5e6eb">
    <div class="container" style="padding:30px 15px">
      <h1 class="main-h1 text-center mb-2">Why Study MBBS Abroad?</h1>
      <p class="text-center">Tutelage Studies gives you several reasons to Study MBBS Abroad</p>
      <div class="row pt-10">
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
          <div class="ps-block--category customcard">
            <div class="servicebox">
              <div class="service-icon"><span><i class="fa fa-money"></i></span></div>
              <h3 class="title">Low Tuition Fees</h3>
              <p>Studying MBBS abroad doesn't require paying a huge amount of fees. When you apply via Tutelage, you can
                experience a low tuition fee structure and minimal living cost.</p>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
          <div class="ps-block--category customcard">
            <div class="servicebox">
              <div class="service-icon"><span><i class="fa fa-stethoscope"></i></span></div>
              <h3 class="title">Top Medical Universities</h3>
              <p>Our mentors get you seats in the high-ranked international universities for higher studies. Just connect
                with our expert faculty, and we will help you chase your dreams.</p>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
          <div class="ps-block--category customcard">
            <div class="servicebox">
              <div class="service-icon"><span><i class="fa fa-check-square-o"></i></span></div>
              <h3 class="title">NMC/WHO Guidelines Approved</h3>
              <p>When you opt for higher studies abroad, try to get enrolled to WHO/NMC Guidelines approved universities.
                You
                need to complete your course from any authorized university.</p>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
          <div class="ps-block--category customcard">
            <div class="servicebox">
              <div class="service-icon"><span><i class="fa fa-check-square-o"></i></span></div>
              <h3 class="title">No Entrance Exam</h3>
              <p>You don't have to worry about entrance examinations while applying for further studies abroad. If you
                meet the eligibility criteria, you can apply for the course.</p>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
          <div class="ps-block--category customcard">
            <div class="servicebox">
              <div class="service-icon"><span><i class="fa fa-dollar"></i></span></div>
              <h3 class="title">No Hidden Charges</h3>
              <p>There will be no hidden charges or donation except for the fee structure when you apply for MBBS courses
                abroad</p>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
          <div class="ps-block--category customcard">
            <div class="servicebox">
              <div class="service-icon"><span><i class="fa fa-language"></i></span></div>
              <h3 class="title">Study in English medium</h3>
              <p>
                Studying MBBS abroad doesn't require
                paying a huge amount of fees. When you apply via Tutelage, you can
                experience a low tuition fee structure and minimal living cost
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <div class="ps-search-trending">
    <div class="container">
      <div class="ps-section__header text-center">
        <h3 style="color:white">Most Popular Countries for MBBS Abroad</h3>
        <small style="color:white">With Tutelage Study you can get MBBS Abroad Admission in world top Medical
          Universities</small>
      </div>
      <div class="row">
        @foreach ($destinations as $row)
          <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
            <div class="ps-post ps-product shadow">
              <div class="ps-post__thumbnail"><img data-src="{{ asset($row->destination_image ?? $row->thumbnail) }}"
                  alt="MBBS in Malaysia"></div>
              <div class="ps-post__content" style="border:0px; padding:12px 0px; background:#fff">
                <a class="ps-post__title text-center" href="{{ url($row->slug) }}">
                  {{ $row->page_name }}
                </a>
              </div>
            </div>
          </div>
        @endforeach
      </div>
      <div class="pt-20" align="center"><a href="{{ url('destinations') }}" target="_blank"
          rel="noopener noreferrer" class="button home-btn">Browse All
          Destinations</a></div>
    </div>
  </div>
  <section class="onlineCoaching" style="background:#e5e6eb">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h2 class="main-h1">Why Contact Us?</h2>
          <p class="jsfy">
            At Tutelage Study, we guide students and parents through the MBBS abroad journey with expert advice and
            reliable support. Our experienced counselors help you choose the best medical universities, understand
            admission processes, and plan your budget effectively. With our trusted guidance, you can make informed
            decisions for a bright medical career.At Tutelage Study, we understand that choosing to study MBBS abroad is a
            big decision for both students and parents. That’s why our expert counselors provide personalized guidance to
            help you every step of the way. How we help:
          </p>
          <div class="counselling-content">
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
        <div class="col-md-6">
          <div class="cur-conver">
            <h2>Real-Time Currency Converter for Study Abroad Aspirants</h2>
            <p class="jsfy">
              A simple currency converter to help aspiring students calculate their study abroad budget. Check real-time
              exchange rates and estimate expenses easily to plan your finances effectively. Students can estimate their
              study abroad expenses, including food, travel, and living costs using the converter.
            </p>
            <form id="currencyConvertForm" class="cur-conver-form customcard" method="post">

              <div class="row">
                <div class="col-md-6">
                  <div class="row">
                    <div class="col-md-12">
                      <select name="from" id="from" required>
                        <option value="">-Select Country-</option>
                        @foreach ($country as $c)
                          <option value="{{ $c->code }}">{{ $c->country }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="col-md-5">
                      <input name="from_code" id="from_code" placeholder="" readonly>
                    </div>
                    <div class="col-md-7">
                      <input name="amount" id="from_amount" placeholder="Enter Amount">
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="row">
                    <div class="col-md-12">
                      <select name="to" id="to" required>
                        <option value="">-Select Country-</option>
                        @foreach ($country as $c)
                          <option value="{{ $c->code }}">{{ $c->country }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="col-md-5">
                      <input id="to_code" readonly>
                    </div>
                    <div class="col-md-7">
                      <input id="to_amount" readonly>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <input onclick="convert()" id="submitBtnCC" type="button" class="button cur-conver-btn"
                    value="Convert">
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
  </section>
  <div class="ps-page--product pt-70 pb-40" style="background:#e5e6eb;">
    <div class="ps-container">
      <div class="ps-section--default customcard"
        style="pad customcardding:15px 20px;background: #fff; border-radius:5px">
        <aside class="widget widget_best-sale " data-mh="dealhot">
          <h2 class="widget-title">Top Medical Universities of MBBS Abroad</h2>
          <div class="widget__content">
            <div class="owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000" data-owl-gap="0"
              data-owl-nav="false" data-owl-dots="false" data-owl-item="1" data-owl-item-xs="1" data-owl-item-sm="1"
              data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="1000" data-owl-mousedrag="on">
              <div class="ps-product-group">
                @foreach ($universities1 as $tu)
                  <div class="ps-product--horizontal">
                    <div class="ps-product__thumbnail"> <a href="<?php echo url($tu->country_slug . '/' . $tu->uname); ?>/"> <img
                          src="<?php echo url($tu->imgpath); ?>" alt="<?php echo $tu->name; ?>"> </a> </div>
                    <div class="ps-product__content"> <a class="ps-product__title" href="<?php echo url($tu->country_slug . '/' . $tu->uname); ?>/">
                        <?php echo $tu->name; ?>
                      </a> </div>
                  </div>
                @endforeach
              </div>
              <div class="ps-product-group">
                @foreach ($universities2 as $tu)
                  <div class="ps-product--horizontal">
                    <div class="ps-product__thumbnail"> <a href="<?php echo url($tu->country_slug . '/' . $tu->uname); ?>/"> <img
                          src="<?php echo url($tu->imgpath); ?>" alt="<?php echo $tu->name; ?>"> </a> </div>
                    <div class="ps-product__content"> <a class="ps-product__title" href="<?php echo url($tu->country_slug . '/' . $tu->uname); ?>/">
                        <?php echo $tu->name; ?>
                      </a> </div>
                  </div>
                @endforeach
              </div>
              <div class="ps-product-group">
                @foreach ($universities3 as $tu)
                  <div class="ps-product--horizontal">
                    <div class="ps-product__thumbnail"> <a href="<?php echo url($tu->country_slug . '/' . $tu->uname); ?>/"> <img
                          src="<?php echo url($tu->imgpath); ?>" alt="<?php echo $tu->name; ?>"> </a> </div>
                    <div class="ps-product__content"> <a class="ps-product__title" href="<?php echo url($tu->country_slug . '/' . $tu->uname); ?>/">
                        <?php echo $tu->name; ?>
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
                  <span class="counselling-right-image"><img data-src="{{ asset('front/') }}/img/Cicon1.png"
                      alt="Conselling Icon"></span>
                  <p>No Hidden <br>
                    Charges
                  </p>
                </div>
              </li>
              <li>
                <div>
                  <span class="counselling-right-image"><img data-src="{{ asset('front/') }}/img/Cicon2.png"
                      alt="Conselling Icon"></span>
                  <p>7+ <br>
                    Career Counsellors
                  </p>
                </div>
              </li>
              <li>
                <div>
                  <span class="counselling-right-image"><img data-src="{{ asset('front/') }}/img/Cicon3.png"
                      alt="Conselling Icon"></span>
                  <p>100% Online <br>
                    Process
                  </p>
                </div>
              </li>
              <li>
                <div>
                  <span class="counselling-right-image"><img data-src="{{ asset('front/') }}/img/Cicon4.png"
                      alt="Conselling Icon"></span>
                  <p>Counselling by<br />
                    Experts
                  </p>
                </div>
              </li>
              <li>
                <div>
                  <span class="counselling-right-image"><img data-src="{{ asset('front/') }}/img/Cicon5.png"
                      alt="Conselling Icon"></span>
                  <p>No need to step <br>
                    out of home
                  </p>
                </div>
              </li>
              <li>
                <div>
                  <span class="counselling-right-image"><img data-src="{{ asset('front/') }}/img/Cicon6.png"
                      alt="Conselling Icon"></span>
                  <p>Loan Support @ <br>
                    0% Interest
                  </p>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <div class="ps-page--product pt-30 pb-20" style="background:#eee;">
    <div class="ps-container">
      <div class="ps-section--default" style="padding:15px 20px;background: #fff; border-radius:5px">
        <div class="ps-section__header" style="margin-bottom:10px; padding-bottom:0px; border:0px!important">
          <h3>Latest Articles</h3>
        </div>
        <div class="ps-section__content" id="topuniversities">
          <div class="ps-carousel--nav owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="10000"
            data-owl-gap="30" data-owl-nav="true" data-owl-dots="true" data-owl-item="4" data-owl-item-xs="1"
            data-owl-item-sm="2" data-owl-item-md="4" data-owl-item-lg="4" data-owl-item-xl="4"
            data-owl-duration="1000" data-owl-mousedrag="on" style="margin-bottom:0px!important">
            @foreach ($news as $row)
              <div class="ps-post ps-product">
                <div class="ps-post__thumbnail">
                  <img data-src="{{ asset($row->imgpath) }}" alt="<?php echo $row->headline; ?>"
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
                    title="<?php echo $row->headline; ?>" data-toggle="tooltip">
                    <?php echo strlen($row->headline) > 44 ? substr($row->headline, 0, 44) . '...' : $row->headline; ?>
                  </a>
                  <p style="margin-bottom:0px; font-size:11px">
                    <?php echo getFormattedDate($row->created_at, 'd M, Y'); ?> by<span> admin</span>
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
      $.getJSON(url, function(data) {
        $('#from_code').val(from);
        $('#to_code').val(to);
        $('#to_amount').val(data.rates[to].rate_for_amount);
        $('#submitBtnCC').val('Convert');
      });
    }
  </script>
@endsection
