@extends('front.layouts.main')
@push('seo_meta_tag')
@include('front.layouts.static_page_meta_tag')
@endpush
@section('main-section')
<script type="application/ld+json">
  {

    "@context":"https://schema.org",

    "@type":"FAQPage",

    "mainEntity":[

            {

      "@type":"Question",

      "name":"Why do Indian students opt for MBBS abroad?",

      "acceptedAnswer":

        {

          "@type":"Answer",

          "text":"There are a limited number of seats available for medical students in India. In addition, the fees charged by private medical colleges in India are much higher than that of many medical institutes in other countries."

        }

    },    		{

      "@type":"Question",

      "name":"What are the basic eligibility criteria for MBBS abroad?",

      "acceptedAnswer":

        {

          "@type":"Answer",

          "text":"Candidates must achieve a minimum of 50% in Class 12 examinations with Physics, Chemistry, and Biology as the main subjects. SC/ST/OBC candidates need to have a minimum of 45%. Candidates must also clear NEET."

        }

    },    		{

      "@type":"Question",

      "name":"Is NEET required for studying MBBS abroad?",

      "acceptedAnswer":

        {

          "@type":"Answer",

          "text":"Yes, all medical universities around the world need applicants from India to clear the National Eligibility cum Entrance Test (NEET) and present the eligibility certificate. Some universities also have their own entrance exams in addition to NEET."

        }

    },    		{

      "@type":"Question",

      "name":"What is the duration of MBBS abroad?",

      "acceptedAnswer":

        {

          "@type":"Answer",

          "text":"Most MBBS courses around the world typically last for 5 years. However, some medical institutions and universities also expect their medical students to spend an additional year as an intern in their internship programs."

        }

    },    		{

      "@type":"Question",

      "name":"What is the standard fee structure for MBBS courses abroad?",

      "acceptedAnswer":

        {

          "@type":"Answer",

          "text":"While the tuition fees for different medical institutes vary, most medical universities charge tuition fees between $20,000 and $50,000 for a 5+1 year course. Hostel accommodation and food expenses account for separate expenses."

        }

    }]

  }
</script>
<div id="homepage-1">
  <div class="ps-home-banner ps-home-banner--1">
    <div class="ps-container" style="padding:0px!important">
      <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12">
        <!--div class="ps-section__left"-->
        <div class="ps-carousel--nav-inside owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="1" data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="1000" data-owl-mousedrag="on">
          <div class="ps-banner"><a href="/contact-us/"><img src="{{ asset('front/') }}/img/slider/home-1/germany-banner-3.jpg" alt="study mbbs abroad"></a></div>
          <div class="ps-banner"><a href="/contact-us/"><img src="{{ asset('front/') }}/img/slider/home-1/germany-banner-2.jpg" alt="study mbbs abroad"></a></div>
          <div class="ps-banner"><a href="/destinations/"><img src="{{ asset('front/') }}/img/slider/home-1/germany-banner-4.jpg" alt="study mbbs abroad"></a></div>
        </div>
      </div>
      <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
        <aside class="widget widget_best-sale" data-mh="dealhot">
          <h1 class="widget-title">Medical Universities</h1>
          <div class="widget__content">
            <div class="owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000" data-owl-gap="0" data-owl-nav="false" data-owl-dots="false" data-owl-item="1" data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="1000" data-owl-mousedrag="on">
              <div class="ps-product-group">
                @foreach ($universities1 as $tu)
                <div class="ps-product--horizontal">
                  <div class="ps-product__thumbnail"> <a href="<?php echo url($tu->country_slug . '/' . $tu->uname); ?>/"> <img src="<?php echo url($tu->imgpath); ?>" alt="<?php echo $tu->name; ?>"> </a> </div>
                  <div class="ps-product__content"> <a class="ps-product__title" href="<?php echo url($tu->country_slug . '/' . $tu->uname); ?>/"><?php echo $tu->name; ?></a> </div>
                </div>
                @endforeach
              </div>
              <div class="ps-product-group">
                @foreach ($universities2 as $tu)
                <div class="ps-product--horizontal">
                  <div class="ps-product__thumbnail"> <a href="<?php echo url($tu->country_slug . '/' . $tu->uname); ?>/"> <img src="<?php echo url($tu->imgpath); ?>" alt="<?php echo $tu->name; ?>"> </a> </div>
                  <div class="ps-product__content"> <a class="ps-product__title" href="<?php echo url($tu->country_slug . '/' . $tu->uname); ?>/"><?php echo $tu->name; ?></a> </div>
                </div>
                @endforeach
              </div>
              <div class="ps-product-group">
                @foreach ($universities3 as $tu)
                <div class="ps-product--horizontal">
                  <div class="ps-product__thumbnail"> <a href="<?php echo url($tu->country_slug . '/' . $tu->uname); ?>/"> <img src="<?php echo url($tu->imgpath); ?>" alt="<?php echo $tu->name; ?>"> </a> </div>
                  <div class="ps-product__content"> <a class="ps-product__title" href="<?php echo url($tu->country_slug . '/' . $tu->uname); ?>/"><?php echo $tu->name; ?></a> </div>
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
      <div class="col-xl-5 col-lg-5 col-md-5 col-sm-6 col-12"><img src="{{ asset('/front/') }}/img/who-we-are.jpg" alt="Who we are ?" border="0" width="w-100"></div>
      <div class="col-xl-7 col-lg-7 col-md-7 col-sm-6 col-12">
        <h2 class="main-h1">Who we are ?</h2>
        <p class="onlinePrepare">We're #1 MBBS Abroad Consultants in India</p>
        <p>Tutelage Study is currently dealing with study MBBS Abroad Education for Indian Students.</p>
        <p>You will be able to enroll in the best medical colleges in the world thanks to Tutelage Study. The desire of many students is to join MBBS Abroad in top countries like Cyprus, Belarus, Vietnam, Georgia, Russia, and more. If you belong to such a group, we can direct you in the correct direction. Your future visions will be built by your international education, so start laying the groundwork today for bigger accomplishments. You can get in touch with us to talk about the next steps because we have partnerships with many schools, universities, and medical facilities throughout the world.</p>
        <br />
        <a href="<?php echo url('about-us'); ?>/" class="button home-btn">Know More</a>
      </div>
    </div>
  </div>
</section>
<section style="background:#eee">
  <div class="container" style="padding:30px 15px">
    <h3 class="text-center">EXPLORE ALMOST EVERYTHING</h3>
    <p class="text-center">Tutelage Study is an extensive search engine for the students, parents, <br>
      and education industry players who are seeking information
    </p>
    <div class="row pt-10">
      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
        <div class="ps-block--category">
          <br>
          <a class="ps-block__overlay" href="<?php echo url('medical-universities'); ?>/" target="_blank">All Universities</a>
          <img src="<?php echo url('front'); ?>/img/find-university.jpg" alt="All Universities" style="width:100%!important">
          <h4 class="pt-10 mb-0 button cur-conver-btn">Find All Universities</h4>
        </div>
      </div>
      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 ">
        <div class="ps-block--category">
          <br>
          <a class="ps-block__overlay" href="<?php echo url('services'); ?>/" target="_blank">Services</a>
          <img src="<?php echo url('front'); ?>/img/top-courses.jpg" alt="Services" style="width:100%!important">
          <h4 class="pt-10 mb-0 button cur-conver-btn">Our Services</h4>
        </div>
      </div>
      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 ">
        <div class="ps-block--category">
          <br>
          <a class="ps-block__overlay" href="<?php echo url('destinations'); ?>/" target="_blank">MBBS Countries</a> <img src="<?php echo url('front'); ?>/img/exams.jpg" alt="All Destinations" style="width:100%!important">
          <h4 class="pt-10 mb-0 button cur-conver-btn">All Destinations</h4>
        </div>
      </div>
      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 ">
        <div class="ps-block--category">
          <br>
          <a class="ps-block__overlay" href="<?php echo url('blog'); ?>/" target="_blank">Blog</a> <img src="<?php echo url('front'); ?>/img/news.jpg" alt="latest news" style="width:100%!important">
          <h4 class="pt-10 mb-0 button cur-conver-btn">News & Article</h4>
        </div>
      </div>
      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 ">
        <div class="ps-block--category">
          <br>
          <a class="ps-block__overlay" href="<?php echo url('mbbs-abroad-counselling'); ?>/" target="_blank">Inquiry Now</a> <img src="<?php echo url('front'); ?>/img/scholarship.jpg" alt="Enquire Now" style="width:100%!important">
          <h4 class="pt-10 mb-0 button cur-conver-btn">Free Counselling</h4>
        </div>
      </div>
      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 ">
        <div class="ps-block--category">
          <br>
          <a class="ps-block__overlay" href="<?php echo url('neet-ug'); ?>/">Explore Neet Exam</a><img src="<?php echo url('front'); ?>/img/compare.jpg" alt="compare universities" style="width:100%!important">
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
  width:90px;
  height:90px;
  background-color:#1d4d7a;
  margin-bottom: 20px;
  }
  .servicebox .service-icon i.fa {
  line-height:90px;
  color: #ffffff;
  font-size: 35px;
  transition:all 0.3s ease 0s;
  }
  .servicebox:hover .service-icon i.fa {
  transform:rotateY(180deg);
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
  width:300px;
  }
  .servicebox .title:before,  .servicebox .title:after {
  background:#1d4d7a;
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
  color:grey;
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
<section class="onlineCoaching">
  <div class="container" style="padding:30px 15px">
    <h1 class="main-h1 text-center mb-2">Why Study MBBS Abroad?</h1>
    <p class="text-center">Tutelage Studies gives you several reasons to Study MBBS Abroad</p>
    <div class="row pt-10">
      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
        <div class="ps-block--category">
          <div class="servicebox">
            <div class="service-icon"><span><i class="fa fa-money"></i></span></div>
            <h3 class="title">Low Tuition Fees</h3>
            <p>Studying MBBS abroad doesn't require paying a huge amount of fees. When you apply via Tutelage, you can experience a low tuition fee structure and minimal living cost.</p>
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
        <div class="ps-block--category">
          <div class="servicebox">
            <div class="service-icon"><span><i class="fa fa-stethoscope"></i></span></div>
            <h3 class="title">Top Medical Universities</h3>
            <p>Our mentors get you seats in the high-ranked international universities for higher studies. Just connect with our expert faculty, and we will help you chase your dreams.</p>
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
        <div class="ps-block--category">
          <div class="servicebox">
            <div class="service-icon"><span><i class="fa fa-check-square-o"></i></span></div>
            <h3 class="title">NMC/WHO Approved</h3>
            <p>When you opt for higher studies abroad, try to get admitted to universities approved by WHO or NMC. You need to complete your course from any authorized university.</p>
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
        <div class="ps-block--category">
          <div class="servicebox">
            <div class="service-icon"><span><i class="fa fa-file"></i></span></div>
            <h3 class="title">No Entrance Exam</h3>
            <p>You don't have to worry about entrance examinations while applying for further studies abroad. If you meet the eligibility criteria, you can apply for the course.</p>
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
        <div class="ps-block--category">
          <div class="servicebox">
            <div class="service-icon"><span><i class="fa fa-dollar"></i></span></div>
            <h3 class="title">There is no donation</h3>
            <p>There will be no donation or hidden charges except for the fee structure when you apply for MBBS courses abroad</p>
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
        <div class="ps-block--category">
          <div class="servicebox">
            <div class="service-icon"><span><i class="fa fa-language"></i></span></div>
            <h3 class="title">Study in English medium</h3>
            <p>Studying MBBS abroad doesn't require paying a huge amount of fees. When you apply via Tutelage, you can experience a low tuition fee structure and minimal living cost</p>
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
      <small style="color:white">With Tutelage Study you can get MBBS Abroad Admission in world top Medical Universities</small>
    </div>
    <div class="row">
      <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">

          <div class="ps-post ps-product shadow">
            <div class="ps-post__thumbnail"><img src="{{ asset('/front/') }}/img/mbbs-malaysia.jpg" alt="MBBS in Malaysia"></div>
            <div class="ps-post__content" style="border:0px; padding:12px 0px; background:#fff">
              <a class="ps-post__title text-center" href="https://www.tutelagestudy.com/mbbs-in-malaysia/">MBBS IN MALAYSIA</a>
            </div>
          </div>

      </div>
      <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
        <a href="https://www.tutelagestudy.com/mbbs-in-russia/">
          <div class="ps-post ps-product shadow">
            <div class="ps-post__thumbnail"><img src="{{ asset('/front/') }}/img/mbbs-russia.jpg" alt="MBBS in russia"></div>
            <div class="ps-post__content" style="border:0px; padding:12px 0px; background:#fff">
              <div class="ps-post__title text-center">MBBA IN RUSSIA</div>
            </div>
          </div>
        </a>
      </div>
      <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
          <div class="ps-post ps-product shadow">
            <div class="ps-post__thumbnail"><img src="{{ asset('/front/') }}/img/mbbs-mauritius.jpg" alt="MBBS in Mauritius"></div>
            <div class="ps-post__content" style="border:0px; padding:12px 0px; background:#fff">
              <a href="https://www.tutelagestudy.com/mbbs-in-mauritius/" class="ps-post__title text-center">MBBS IN MAURITUS</a>
            </div>
          </div>
      </div>
      <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
          <div class="ps-post ps-product shadow">
            <div class="ps-post__thumbnail"><img src="{{ asset('/front/') }}/img/mbbs-iran.jpg" alt="MBBS in Iran"></div>
            <div class="ps-post__content" style="border:0px; padding:12px 0px; background:#fff">
              <a href="https://www.tutelagestudy.com/mbbs-in-iran/" href="https://www.tutelagestudy.com/mbbs-in-iran/" class="ps-post__title text-center">MBBS IN IRAN</a>
            </div>
          </div>
      </div>
      <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
          <div class="ps-post ps-product shadow">
            <div class="ps-post__thumbnail"><img src="{{ asset('/front/') }}/img/mbbs-vietnam.jpg" alt="MBBS in Vietnam"></div>
            <div class="ps-post__content" style="border:0px; padding:12px 0px; background:#fff">
              <a href="https://www.tutelagestudy.com/mbbs-in-vietnam/" class="ps-post__title text-center">MBBS IN VIETNAM</a>
            </div>
          </div>
      </div>
      <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
          <div class="ps-post ps-product shadow">
            <div class="ps-post__thumbnail"><img src="{{ asset('/front/') }}/img/mbbs-cyprus.jpg" alt="MBBS in Cyprus"></div>
            <div class="ps-post__content" style="border:0px; padding:12px 0px; background:#fff">
              <a href="https://www.tutelagestudy.com/mbbs-in-cyprus/" class="ps-post__title text-center">MBBS IN CYPRUS</a>
            </div>
          </div>
      </div>
      <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
          <div class="ps-post ps-product shadow">
            <div class="ps-post__thumbnail"><img src="{{ asset('/front/') }}/img/mbbs-belarus.jpg" alt="MBBS in Belarus"></div>
            <div class="ps-post__content" style="border:0px; padding:12px 0px; background:#fff">
              <a href="https://www.tutelagestudy.com/mbbs-in-belarus/" class="ps-post__title text-center">MBBS IN BELARUS</a>
            </div>
          </div>
      </div>
      <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
          <div class="ps-post ps-product shadow">
            <div class="ps-post__thumbnail"><img src="{{ asset('/front/') }}/img/mbbs-bangladesh.jpg" alt="MBBS in Bangladesh"></div>
            <div class="ps-post__content" style="border:0px; padding:12px 0px; background:#fff">
              <a href="https://www.tutelagestudy.com/mbbs-in-bangladesh/" class="ps-post__title text-center">MBBS IN BANGLADESH</a>
            </div>
          </div>
      </div>
    </div>
    <div class="pt-20" align="center"><a href="/destinations/" target="_blank" class="button home-btn">Browse All Destinations</a></div>
  </div>
</div>
<section class="onlineCoaching" style="background:#eee">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h2 class="main-h1">Online Coaching</h2>
        <p class="onlinePrepare">Prepare for your future course of study of professional growth!</p>
        <p class="main-p">Take advantage of easy-to-access courses to your degree by renowed subject-matter faculty and continue to expand your learning curve.</p>
        <div class="counselling-content">
          <ul>
            <li>
              <div>
                <span class="counselling-right-image"><img src="{{ asset('front/') }}/img/Oicon1.png" alt="Online Coaching Icon"></span>
                <p>Unlimited Access to Course</p>
              </div>
            </li>
            <li>
              <div>
                <span class="counselling-right-image"><img src="{{ asset('front/') }}/img/Oicon2.png" alt="Online Coaching Icon"></span>
                <p>Live Online Classes</p>
              </div>
            </li>
            <li>
              <div>
                <span class="counselling-right-image"><img src="{{ asset('front/') }}/img/Oicon3.png" alt="Online Coaching Icon"></span>
                <p>Learn from Subject Matter Experts</p>
              </div>
            </li>
            <li>
              <div>
                <span class="counselling-right-image"><img src="{{ asset('front/') }}/img/Oicon4.png" alt="Online Coaching Icon"></span>
                <p>Consult Experts Anytime</p>
              </div>
            </li>
          </ul>
          <a href="https://www.britannicaoverseas.com/ielts-coaching-in-gurgaon/" target="_blank" class="button home-btn">Know More</a>
        </div>
      </div>
      <div class="col-md-6">
        <div class="cur-conver">
          <h2>Time & Currency Converter</h2>
          <p>Tutelage Study currency converter is an excellent tool to convert currency from one exchange to another.</p>
          <p class="main-p">Check the currency rates against all the world currencies here. The currency converter below is easy to use and the currency rates are updated frequently. This is very much needed given the extreme volatility in global currencies lately.</p>
          <form id="currencyConvertForm" class="cur-conver-form" method="post">

            <div class="row">
              <div class="col-md-6">
                <div class="row">
                  <div class="col-md-12">
                    <select name="from" id="from" required>
                      <option value="">-Select Country-</option>
                      <?php
                        foreach ($country as $c) {
                          echo '<option value="' . $c->code . '">' . $c->country . '</option>';
                        }
                      ?>
                    </select>
                  </div>
                  <div class="col-md-5">
                    <input name="from_code" id="from_code" placeholder="">
                  </div>
                  <div class="col-md-7">
                    <input name="amount" id="from_amount" placeholder="0.00">
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="row">
                  <div class="col-md-12">
                    <select name="to" id="to" required>
                      <option value="">-Select Country-</option>
                      <?php
                        foreach ($country as $c) {
                          echo '<option value="' . $c->code . '">' . $c->country . '</option>';
                        }
                      ?>
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
                <input onclick="convert()" id="submitBtnCC" type="button" class="button cur-conver-btn" value="Convert">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
</section>
<section class="image-bg endCounselling">
  <div class="container">
    <h2 class="main-h1">End-to-End Free Counselling</h2>
    <h3 class="sub-h1">Looking to get the best career guidance? Our experts know exactly what you need!</h3>
    <p class="main-p">At Tutelage Study, academic experts help you evaluate your career and course choices accurately while taking into account your educational background, strengths &amp; skills. From shortlisting the best colleges to tracking your entire admission process, the counselling by our experts will make your higher education journey hassle-free and put you on the path of success.</p>
    <div class="row">
      <div class="col-12 col-md-6">
        <div class="counselling-left">
          <div class="head">How it works</div>
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
                <span class="counselling-right-image"><img src="{{ asset('front/') }}/img/Cicon1.png" alt="Conselling Icon"></span>
                <p>No Hidden <br>
                  Charges
                </p>
              </div>
            </li>
            <li>
              <div>
                <span class="counselling-right-image"><img src="{{ asset('front/') }}/img/Cicon2.png" alt="Conselling Icon"></span>
                <p>1 on 1 <br>
                  Counselling
                </p>
              </div>
            </li>
            <li>
              <div>
                <span class="counselling-right-image"><img src="{{ asset('front/') }}/img/Cicon3.png" alt="Conselling Icon"></span>
                <p>100% Online <br>
                  Process
                </p>
              </div>
            </li>
            <li>
              <div>
                <span class="counselling-right-image"><img src="{{ asset('front/') }}/img/Cicon4.png" alt="Conselling Icon"></span>
                <p>Counselling by<br />
                  Experts
                </p>
              </div>
            </li>
            <li>
              <div>
                <span class="counselling-right-image"><img src="{{ asset('front/') }}/img/Cicon5.png" alt="Conselling Icon"></span>
                <p>No need to step <br>
                  out of home
                </p>
              </div>
            </li>
            <li>
              <div>
                <span class="counselling-right-image"><img src="{{ asset('front/') }}/img/Cicon6.png" alt="Conselling Icon"></span>
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
        <div class="ps-carousel--nav owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="10000" data-owl-gap="30" data-owl-nav="true" data-owl-dots="true" data-owl-item="4" data-owl-item-xs="1" data-owl-item-sm="2" data-owl-item-md="4" data-owl-item-lg="4" data-owl-item-xl="4" data-owl-duration="1000" data-owl-mousedrag="on" style="margin-bottom:0px!important">
          <?php
            foreach ($news as $row) {
          ?>
          <div class="ps-post ps-product">
            <div class="ps-post__thumbnail">
              <img src="<?php echo url($row->imgpath); ?>" alt="<?php echo $row->headline; ?>" style="width:100%; height: 150px;!important">
            </div>
            <div class="ps-post__content">
              <div class="ps-post__meta">
                <a href="<?php echo url('category/' . $row->cate_slug); ?>/"><?php echo ucwords(str_replace('-', ' ', $row->cate_slug)); ?></a>
              </div>
              <a class="ps-post__title" href="<?php echo url($row->slug); ?>/" title="<?php echo $row->headline; ?>" data-toggle="tooltip">
                <?php echo strlen($row->headline) > 44 ? substr($row->headline, 0, 44) . '...' : $row->headline; ?>
              </a>
              <p style="margin-bottom:0px; font-size:11px"> <?php echo getFormattedDate($row->created_at, 'd M, Y'); ?> by<span> admin</span> </p>
            </div>
          </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
  function convert() {
    //alert('hello');
    $('#submitBtnCC').val('Converting...');
    var from = $('#from').val();
    var to = $('#to').val();
    var amount = $('#from_amount').val();
    var key = "3c10af8cae94eaf3650ba0b9edb97d1eef23505e";
    var url = "https://api.getgeoapi.com/v2/currency/convert?api_key=" + key + "&from=" + from + "&to=" + to + "&amount=" + amount + "&format=json"
    $.getJSON(url, function(data) {
      $('#from_code').val(from);
      $('#to_code').val(to);
      $('#to_amount').val(data.rates[to].rate_for_amount);
      $('#submitBtnCC').val('Convert');
    });
  }


</script>
@endsection
