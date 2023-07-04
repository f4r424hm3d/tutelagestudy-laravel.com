<?php
  $whrco = ['page_id' => $row->id];
  $content = $this->mm->getDataByOW('priority', 'ASC', $whrco, 'exam_page_contents');
  $count_content = $this->mm->getCount($whrco, 'exam_page_contents');
  $error = $this->session->flashdata('val_err');
  $old = $this->session->flashdata('post_value');
  $chk = $this->session->flashdata('chk');
?>
@extends('front.layouts.main')
@push('seo_meta_tag')
@include('front.layouts.static_page_meta_tag')
@endpush
@section('main-section')
<style type="text/css">
  .header-bg1 .col-box {
    width: 100%;
    display: block;
    padding: 10px 0 15px;
    color: white !important;
  }

  .header-bg1 .col-box .media-left {
    padding: 0 10px 0 0;
    min-width: 145px;
  }

  .err-clr {
    color: red !important;
  }

  .fcolor {
    color: white !important;
    margin-bottom: 0px !important
  }

  .media-body,
  .media-left,
  .media-right {
    display: table-cell;
    vertical-align: top;
  }

  .media-left,
  .media>.pull-left {
    padding-right: 10px;
  }

  .get-detail {
    display: flex;
    align-items: center;
    justify-content: center;
    text-transform: uppercase
  }

  .get-detail a {
    margin-left: 10px
  }

  .modal-content {
    margin: 18% auto
  }

  .modal {
    padding-right: 0px !important;
    z-index: 13
  }

  .modal-text-p {
    padding-top: 20px
  }

  .modal-backdrop.show {
    z-index: 12
  }

  .collegeTabs {
    z-index: 11
  }

  .ps-block--categories-tabs .ps-tab-list a span {
    background: none;
    -webkit-text-fill-color: #000 !important;
  }

  .ps-block--categories-tabs .ps-tab-list a:hover {
    box-shadow: none !important
  }

  .tbl-cntnt ul {
    list-style: inside !important;
    display: flow-root !important;
    padding-left: 5px !important
  }

  .tbl-cntnt ul li {
    width: 50%;
    float: left;
    line-height: 24px
  }

  .tbl-cntnt ul li:before {
    display: none !important;
  }

  .tbl-cntnt ul li a {
    color: #cd2122;
    margin-left: -7px
  }

  .tbl-cntnt ul li a:hover {
    text-decoration: underline;
    color: #348fd6;
  }

  .widget_best-sale .widget-title {
    background: #f8f8f8;
    padding: 10px;
    border-bottom: 0px;
    font-weight: 400;
    margin-top: 0px;
  }

  .ps-document h2 {
    background: #ebeded;
    padding: 8px;
    font-size: 20px;
    font-weight: 400
  }

  .ps-product__content h3 {
    background: #f8f8f8;
    padding: 10px;
    font-size: 20px;
    font-weight: 400
  }

  .ps-section--default h3 {
    background: #f8f8f8;
    padding: 10px;
    font-size: 20px;
    font-weight: 400
  }

  .ps-document p {
    text-align: justify
  }

  .ps-product__box h3 {
    margin: 12px 0px 0px 0px;
    font-size: 18px;
  }

  .ps-product__box ul {
    padding-left: 20px;
    list-style: none;
  }

  .ps-product__box ul li:before {
    content: "\f046";
    /* FontAwesome Unicode */
    font-family: FontAwesome;
    color: #0047ab;
    display: inline-block;
    margin-left: -1.3em;
    width: 1.3em;
  }

  .ps-product__box p {
    text-align: justify
  }

  .ps-product__box p:last-child {
    margin-bottom: 0px;
  }

  .ps-product__box table {
    margin: 5px 0px;
  }

  .ps-product__box td {
    padding-left: 10px !important;
  }

  .ps-block--categories-tabs .ps-block__header {
    padding: 0 30px;
    overflow-y: hidden;
  }

  .ps-block--categories-tabs .ps-tab-list a:hover {
    background: #fff
  }

  @media screen and (max-width:767px) {
    .get-detail {
      display: block;
      text-align: center !important
    }

    .get-detail p {
      margin-bottom: 10px !important
    }

    .get-detail a {
      margin-left: 0px
    }

    .ps-block--store .ps-block__content {
      padding: 0px 10px 10px 10px
    }

    .ps-carousel--nav {
      margin: 0px;
      padding-bottom: 10px
    }

    .modal-content {
      margin: 16% auto
    }

    .modal-text-p {
      padding-top: 10px
    }

    .ps-carousel--nav .owl-nav>* i {
      font-size: 22px !important
    }

    .ps-carousel--nav .owl-nav {
      display: block !important;
    }

    .tbl-cntnt ul li {
      width: 100% !important;
      float: none !important
    }

    .ps-block--categories-tabs .ps-block__header {
      padding: 0 30px;
    }

    .ps-block--categories-tabs .ps-block__header .ps-tab-list a.active {
      -webkit-text-fill-color: #c01874 !important;
      border-bottom: 2px solid #c01874 !important;
    }

    .ps-block--categories-tabs .ps-block__header .ps-tab-list a:hover {
      border-bottom: 2px solid #c01874 !important;
    }
  }
</style>
<div class="ps-breadcrumb">
  <div class="ps-container">
    <ul class="breadcrumb bread-scrollbar">
      <li><a href="<?php echo base_url(); ?>">Home</a></li>
      <li><a href="<?php echo base_url($lp->exam_slug); ?>/">
          <?php echo $lp->exam_name ?>
        </a></li>
      <li>
        <?php echo $row->page_name; ?>
      </li>
    </ul>
  </div>
</div>
<!-- header background section ends -->
<div class="header-bg1"
  style="background:linear-gradient(to right, #215697 0%, #ab2700 100%); padding:5px 1% 15px;display:none">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12 col-sm-12 pt-5 pb-4">
        <h1 class="fcolor">
          <?php echo $row->page_name; ?> For Indian Students: Fees, Admission, Intake 2023
        </h1>
        <div class="row" style="margin-top:10px">
          <div class="col-md-4 col-sm-6 col-xs-12 pad no-padding">
            <div class="media-left">
              <p class="fcolor"><i class="icon-clock pr-1"></i> Duration :</p>
            </div>
            <div class="media-right">
              <p class="fcolor">
                <?php echo $row->course_duration; ?>
              </p>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 col-xs-12 pad no-padding">
            <div class="media-left">
              <p class="fcolor"><i class="icon-pencil-line pr-1"></i> Neet Required :</p>
            </div>
            <div class="media-right">
              <p class="fcolor">
                <?php echo $row->neet; ?>
              </p>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 col-xs-12 pad no-padding">
            <div class="media-left">
              <p class="fcolor"><i class="icon-document pr-1"></i> IELTS/TOEFL :</p>
            </div>
            <div class="media-right">
              <p class="fcolor">
                <?php echo $row->english_profiency_exam; ?>
              </p>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 col-xs-12 pad no-padding">
            <div class="media-left">
              <p class="fcolor"><i class="icon-calendar-check pr-1"></i> Intake :</p>
            </div>
            <div class="media-right">
              <p class="fcolor">
                <?php echo $row->intake; ?>
              </p>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 col-xs-12 pad no-padding">
            <div class="media-left">
              <p class="fcolor"><i class="icon-graduation-hat pr-1"></i> Eligibility :</p>
            </div>
            <div class="media-right">
              <p class="fcolor">
                <?php echo $row->eligibility; ?>
              </p>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 col-xs-12 pad no-padding">
            <div class="media-left">
              <p class="fcolor"><i class="icon-desktop pr-1"></i> Medium of Teaching :</p>
            </div>
            <div class="media-right">
              <p class="fcolor">
                <?php echo $row->medium_of_teaching; ?>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="ps-page--product ps-page--product-box">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <?php if ($this->session->flashdata('smsg')) { ?>
        <div class="alert alert-success alert-outline-coloured alert-dismissible" role="alert">
          <div class="alert-message">
            <strong>
              <?php echo $this->session->flashdata('smsg'); ?>
            </strong>
          </div>
        </div>
        <?php } ?>
        <?php if ($this->session->flashdata('emsg')) { ?>
        <div class="alert alert-danger alert-outline-coloured alert-dismissible" role="alert">
          <div class="alert-message">
            <strong>
              <?php echo $this->session->flashdata('emsg'); ?>
            </strong>
          </div>
        </div>
        <?php } ?>
      </div>
    </div>
  </div>
</div>
<!-- header background section ends -->
<div class="ps-page--product ps-page--product-box">
  <div class="ps-product--detail ps-product--box" style="background: #eee; margin-bottom:0px!important">
    <div class="ps-section__right">
      <div class="ps-tab-root container-fluid">
        <div class="row">
          <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 mb-20">

            <div class="ps-product__box">
              <div class="ps-document">
                <center><img src="<?php echo base_url($row->image_path); ?>" alt="<?php echo $row->page_name; ?>"
                    class="img-responsive"></center>
              </div>
              <h2>
                <?php echo $row->page_name; ?>
              </h2>
            </div>


            <div class="pt-0 pb-20 get-detail">
              <span style="font-size:18px; color:#cd2122;">Get Free Counselling</span>
              <a class="ps-btn" href="javascript:void()" data-toggle="modal" data-target="#aamir">Enquire Now</a>
            </div>


            <?php if ($count_content > 1) { ?>
            <div class="ps-product__box mb-20">
              <aside class="widget widget_best-sale">
                <h3 class="widget-title">
                  Table of Contents
                  <span style="float:right;">
                    <button class="btn btn-outline-info tglBtn hide-this">+</button>
                    <button class="btn btn-outline-info tglBtn">-</button>
                  </span>
                </h3>
                <div class="widget__content tbl-cntnt " id="tblCDiv">
                  <ol style="list-style:circle;">
                    <?php foreach ($content as $t) { ?>
                    <li><a href="#<?php echo slugify($t->title); ?>">
                        <?php echo $t->title; ?>
                      </a></li>
                    <?php } ?>
                  </ol>
                </div>
              </aside>
            </div>
            <?php } ?>
            <?php foreach ($content as $c) { ?>
            <div class="ps-product__box mb-20" id="<?php echo slugify($c->title); ?>">
              <div class="ps-tabs">
                <div class="ps-tab active">
                  <div class="ps-document">
                    <?php echo $c->tab_content; ?>
                  </div>
                </div>
              </div>
            </div>
            <?php } ?>
            <?php if ($faqs != false) { ?>
            <div class="ps-product__box mb-20">
              <div class="ps-section--default">
                <div class="ps-section__header" style="margin-bottom:0px; padding-bottom:10px; border:0px">
                  <h3>Faqs</h3>
                </div>
                <div id="accordion">
                  <?php foreach ($faqs as $faq) { ?>
                  <div class="card">
                    <div class="card-header">
                      <a onclick="toggleFaq('<?php echo $faq->id; ?>')" class="card-link text-dark"
                        href="javascript:void()">
                        <span class="float-right"><i class="fa fa-arrow-down"></i></span>
                        <h5 class="mb-0" style="font-size:15px">
                          <?php echo $faq->question; ?>
                        </h5>
                      </a>
                    </div>
                    <div id="a<?php echo $faq->id; ?>" style="display:none;">
                      <div class="card-body">
                        <?php echo $faq->answer; ?>
                      </div>
                    </div>
                  </div>
                  <?php } ?>
                </div>
              </div>
            </div>
            <script type="application/ld+json">
              {

                "@context": "https:\/\/schema.org",

                "@type": "FAQPage",

                "mainEntity": [

                  <?php
                $i = 1;

                $tfaq = count($faqs);

                foreach ($faqs as $faq) {

                ?> {

                      "@type": "Question",

                      "name": "<?php echo $faq->question; ?>",

                      "acceptedAnswer": {

                        "@type": "Answer",

                        "text": "<?php echo str_replace('/', '\/', str_replace('"', '\"', $faq->answer)); ?>"

                      }

                    }

                    <?php if ($i < $tfaq) { ?>, <?php } ?>

                  <?php $i++;
                } ?>

                ]

              }
            </script>
            <?php } ?>


            <!-- INQUIRY FORM START -->
            <?php $this->load->view('web/form/university-side-form'); ?>
            <!-- INQUIRY FORM END -->
          </div>
          <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
            <?php if ($otherpage != false) { ?>
            <div class="ps-section__left" style="position:sticky; top:0;">
              <aside class="ps-widget--account-dashboard">
                <h3 style=" background:#cd2122; color:#fff; font-size:16px; padding:10px 20px; margin:0px">News
                  Categories</h3>
                <div class="ps-widget__content" style="background:#fff">
                  <ul>
                    <?php foreach ($otherpage as $row) { ?>
                    <li><a href="<?php echo base_url($lp->exam_slug.'/' . $row->slug); ?>/"><i
                          class="icon-arrow-right"></i>
                        <?php echo $row->page_name; ?>
                      </a></li>
                    <?php } ?>
                  </ul>
                </div>
              </aside>
            </div>
            <?php } ?>
            <br>
            <?php if ($otherexam != false) { ?>
            <div class="ps-section__left" style="position:sticky; top:60px; background:#fff">
              <aside class="ps-widget--account-dashboard">
                <div class="ps-widget__content">
                  <div style=" font-size:18px; color:#fff; background:#045dab; padding:10px; text-align:center">Other
                    Exam</div>
                  <ul style="max-height:480px; overflow:auto">
                    <?php foreach ($otherexam as $row) { ?>
                    <li>
                      <a href="<?php echo base_url($row->exam_slug); ?>/"><i class="icon-arrow-right"></i>
                        <?php echo $row->exam_name; ?>
                      </a>
                    </li>
                    <?php } ?>
                  </ul>
                </div>
              </aside>
            </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<div class="modal fade" id="aamir" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header w-100">
        <div class="modal-title row" style="width: inherit;">
          <div class="ps-product__thumbnail universitylogo col-md-2 col-sm-2 col-xs-2 col-3" style="padding-right:0px">
            <img src="<?php echo base_url($row->thumbnail); ?>" class="img-responsive"
              alt="<?php echo $row->page_name; ?>"
              style="width: 80px; height:80px; box-shadow:rgb(0 0 0 / 12%) 0 1px 3px, rgb(0 0 0 / 24%) 0 1px 2px; border-radius: 50%; display:flex;align-items:center; padding:5px; float:left; margin:auto">
          </div>
          <div class="ps-product__container col-md-10 col-sm-10 col-xs-9  col-9 modal-text-p">
            <h3 class="mb-0">Apply Now for MBBS Upcoming Intake</h3>
            <p>
              <?php echo strtoupper($this->uri->segment(1)); ?>
            </p>
          </div>
        </div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
            aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <form class="ps-form--visa" action="<?php echo base_url('inquiry/submit-inquiry/'); ?>" method="post">
          <input type="hidden" name="page_url" value="<?php echo base_url($this->uri->uri_string()); ?>">
          <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
              <div class="form-group">
                <input type="text" name="name" id="name" class="form-control" placeholder="Enter Name"
                  value="<?php echo $old['name']; ?>" required>
                <?php
                  if (!empty($error['name'])) {
                    echo '<span class="err-clr">' . $error['name'] . '</span>';
                  }
                  ?>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
              <div class="form-group">
                <input type="email" class="form-control" name="email" id="email" value="<?php echo $old['email']; ?>"
                  placeholder="Enter Email" required>
                <?php
                  if (!empty($error['email'])) {
                    echo '<span class="err-clr">' . $error['email'] . '</span>';
                  }
                  ?>
              </div>
            </div>
            <div class="col-4 col-lg-4 col-md-4 col-sm-4 col-xs-6" style="padding-right:0px">
              <div class="form-group">
                <select class="form-control" name="c_code" id="c_code" required>
                  <option value="">Select Code</option>
                  <?php
                    $country = $this->mm->getDataByGroup3('phonecode', 'ASC', 'countries', 'phonecode');
                    foreach ($country as $row) {
                    ?>
                  <option value="<?php echo $row->phonecode; ?>" <?php echo $curCountry==$row->phonecode ||
                    $old['c_code'] == $row->phonecode ? 'Selected' : ''; ?>> +
                    <?php echo $row->phonecode; ?> (
                    <?php echo $row->name; ?>)
                  </option>
                  <?php } ?>
                </select>
                <?php if ($error['c_code']) { ?>
                <span class="text-danger">
                  <?php echo $error['c_code']; ?>
                </span>
                <?php  } ?>
              </div>
            </div>
            <div class="col-8 col-lg-8 col-md-8 col-sm-8 col-xs-6">
              <div class="form-group">
                <input type="text" class="form-control u-ltr" placeholder="Enter Mobile Number"
                  data-error="Please enter a valid phone number" name="mobile" id="mobile"
                  value="<?php echo $old['mobile']; ?>" required>
                <?php
                  if (!empty($error['mobile'])) {
                    echo '<span class="err-clr">' . $error['mobile'] . '</span>';
                  }
                  ?>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
              <div class="form-group">
                <select class="form-control" name="nationality" id="nationality" required>
                  <option value="">Select Your Country</option>
                  <?php
                    $country = $this->mm->getDataByGroup3('name', 'ASC', 'countries', 'name');
                    foreach ($country as $row) {
                    ?>
                  <option value="<?php echo $row->name; ?>" <?php echo $old['nationality']==$row->name ? 'Selected' :
                    ''; ?>>
                    <?php echo $row->name; ?>
                  </option>
                  <?php } ?>
                </select>
                <?php if ($error['nationality']) { ?>
                <span class="text-danger">
                  <?php echo $error['nationality']; ?>
                </span>
                <?php  } ?>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
              <div class="form-group">
                <select class="form-control" name="destination" id="destination" required>
                  <option value="">Select Destination</option>
                  <?php
                    $destinations = $this->mm->getDataByGroup3('page_name', 'ASC', 'destinations', 'page_name');
                    foreach ($destinations as $row) {
                    ?>
                  <option value="<?php echo $row->page_name; ?>" <?php echo $old['destination']==$row->page_name ||
                    $this->uri->segment(1) == $row->slug ? 'Selected' : ''; ?>>
                    <?php echo $row->page_name; ?>
                  </option>
                  <?php } ?>
                </select>
                <?php if ($error['destination']) { ?>
                <span class="text-danger">
                  <?php echo $error['destination']; ?>
                </span>
                <?php  } ?>
              </div>
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
              <div class="form-group">
                <div class="g-recaptcha" data-sitekey="<?php echo recaptcha_site_key; ?>" required></div>
              </div>
            </div>
            <div class="form-group">
              <div class="ps-checkbox pl-20">
                <input class="form-control " type="checkbox" id="remember-me" name="remember-me" value checked disabled>
                <label for="remember-me">By submitting this form, I agree to the <a
                    href="<?php echo base_url('term-and-condition/'); ?>" style="color: blue;" target="_blank"
                    rel="noopener noreferrer">terms & conditions</a></label>
              </div>
            </div>
            <div class="modal-footer w-100">
              <button type="submit" class="ps-btn ps-btn--fullwidth">Submit</button>
            </div>
          </div>
        </form>
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
  <?php if (isset($_GET['err'])) { ?>
    $(document).ready(function() {
      $('#aamir').modal('show');
    });
  <?php } ?>
</script>
@endsection
