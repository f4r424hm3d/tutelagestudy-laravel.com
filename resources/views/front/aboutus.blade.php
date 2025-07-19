@extends('front.layouts.main')
@push('seo_meta_tag')
  @include('front.layouts.static_page_meta_tag')
@endpush
@section('main-section')
  <div class="ps-breadcrumb">
    <div class="ps-container">
      <ul class="breadcrumb bread-scrollbar">
        <li><a href="<?php echo url('/'); ?>">Home</a></li>
        <li>About Us</li>
      </ul>
    </div>
  </div>

  <div class="ps-page--single" id="about-us"><img src="{{ cdn('/front/') }}/img/about-us-cover.jpg" alt="">

    <div class="ps-about-intro" style="background:#f9f9f9">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
            <div class="ps-section__header" style="max-width:100%; margin:0px">
              <p>ABOUT TUTELAGE STUDY ABROAD</p>
              <h1>Our Vision: Make You Successful</h1>
              <p class="jsfy"><a href="https://www.tutelagestudy.com/about-us/">Tutelage Study</a> is currently dealing
                with study abroad education in Malaysia, Singapore,
                UK, New Zealand, and Canada for various courses like Business, Engineering, Tourism and Hospitality, Early
                childhood Education, Allied health Science courses, Medicine, Post Graduate courses, MBA, and Doctoral
                courses.</p>
              <p class="jsfy">We are willing to expand our reach to world-class education destinations all over the
                world. In the current era of globalization, students must have a global vision to get a successful career
                in this competitive world.</p>
              <p class="jsfy">Tutelage is a pioneer in providing such career opportunities to students who are willing
                to open doors for Global vision. The international education market is always open only for high-income
                class families but we offer unique counseling sessions for middle-class families for selection of
                university and selection of country in an easy way to send their child overseas for abroad education.</p>
              <br>

              <h1>Why should you study MBBS abroad?</h1>
              <p class="jsfy">We built a healthy relationship with our customers by maintaining the best and timely
                consultation firm in India.</p>

            </div>
          </div>
          <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
            <img src="{{ cdn('/front/') }}/img/about-image.png" alt="About us" class="img-fluid">
          </div>
        </div>
      </div>
    </div>

    <div class="ps-about-intro">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-12">
            <div class="ps-section__header" style="max-width:100%; margin:0px">
              <h2>About Tutelage</h2>
              <ul>
                <li><span>We assure you that we will give almost true consultations at all times.</span></li>
                <li><span>We ensure that the students get placed in the reputed and highly-qualified Universities to
                    pursue their education.</span></li>
                <li><span>We offer our genuine and trustworthy educational consultancy service, as we know the constancy
                    of abroad education. So, yes, you can trust us, and rely on our esteemed service for a better learning
                    experience.</span></li>
                <li><span>We have experts with years of experience.</span></li>
                <li><span>We provide an affordable <a href="https://www.tutelagestudy.com/destinations/">MBBS</a>
                    educational consultancy as per your economy.</span></li>
                <li><span>We are partnered with WHO and MCI recognized Universities.</span></li>
                <li><span>We ensure 24*7 tutelage study services for abroad education.</span></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="ps-about-intro pt-0" style="background:#f9f9f9">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 mb-4">
            <div class="ps-section__header" style="max-width:100%; margin:0px">
              <p>Tutelage Study in Abroad</p>
              <h2>What do we Stand for?</h2>
              <p class="jsfy">Tutelage is an organization that educates students in regards to unawareness of the
                advantages of professional courses over the academic courses. We can say there is a need for professional
                courses to catch the eye of students when academic courses reach their saturation point.</p>
              <p class="jsfy">We help students in selecting courses according to their education qualification, burning
                desire to study abroad, choice of destination, fee structure, scholarship, Entry requirement, duration of
                the course, and career prospects. Every student has a desire to study abroad for higher education.</p>
              <p class="jsfy">We provide a unique platform to them by giving effective counseling, consolation, and
                direction to their future.</p>
              <p class="jsfy">Our business values are to fabricate a reputation among scholars and their parents as a
                professional education consultancy for quality education and free abroad consultation. Equally important
                is our commitment to building a reputation among associate universities for consistent professional
                support and integrity.</p>
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 mb-4">
            <img src="{{ cdn('/front/') }}/img/what-do-we-stand.jpg" alt="About tutelage study" class="img-fluid">
          </div>

          <div class="col-lg-12">
            <div class="ps-section__header" style="max-width:100%; margin:0px">
              <p class="jsfy">Tutelage Study Vision to engender awareness about quality education across the world,
                career prospectus of students; deliver exceptional support to our associates.</p>
              <p class="jsfy">Our expert will have in-depth conversations with students and parents to uncover needs,
                use career profiling tools to discover aspirant strengths and explore suitable further-study options to
                help to achieve your goals.</p>
            </div>
          </div>

        </div>
      </div>
    </div>
  @endsection
