
@extends('front.layouts.main')
@push('seo_meta_tag')
@include('front.layouts.dynamic_page_meta_tag')
@endpush
@push('breadcrumb_schema')
 <!-- breadcrumb schema Code -->
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
      "item": "<?php echo url('/'); ?>/"
    }, {
      "@type": "ListItem",
      "position": 2,
      "name": "Destinations",
      "item": "<?php echo url(Request::segment(1)); ?>/"
    }, {
      "@type": "ListItem",
      "position": 3,
      "name": "<?php echo $exam_page->page_name; ?>",
      "item": "<?php echo $page_url; ?>/"
    }]
  }
  </script> <!-- breadcrumb schema Code End -->

  <!-- webpage schema Code Destinations -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org/",
    "@type": "webpage",
    "url": "<?php echo url(Request::segment(1)); ?>",
    "name": "<?php echo $exam_page->page_name; ?>",
    "description": "<?php echo $meta_description; ?>",
    "inLanguage": "en-US",
    "keywords": [
      "<?php echo $meta_keyword; ?>"
    ]
  }
  </script>

  <!-- rating schema Code -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org/",
    "@type": "CreativeWorkSeries",
    "name": "<?php echo ucwords($meta_title); ?>",
    "aggregateRating": {
      "@type": "AggregateRating",
      "ratingValue": "5",
      "bestRating": "5",
      "ratingCount": "<?php echo $exam_page->seo_rating; ?>"
    }
  }
  </script>
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
  .ps-document h2,h3 {
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
      <li><a href="<?php echo url('/'); ?>">Home</a></li>
      <li><a href="<?php echo url($exam->exam_slug); ?>/"><?php echo $exam->exam_name ?></a></li>
      <li><?php echo $exam_page->page_name; ?></li>
    </ul>
  </div>
</div>
<!-- header background section ends -->

<div class="ps-page--product ps-page--product-box">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <?php if (session()->has('smsg')) { ?>
        <div class="alert alert-success alert-outline-coloured alert-dismissible" role="alert">
          <div class="alert-message">
            <strong><?php echo session()->get('smsg'); ?></strong>
          </div>
        </div>
        <?php } ?>
        <?php if (session()->has('emsg')) { ?>
        <div class="alert alert-danger alert-outline-coloured alert-dismissible" role="alert">
          <div class="alert-message">
            <strong><?php echo session()->get('emsg'); ?></strong>
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
          <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12 mb-20">
            <div class="ps-product__box">
              <div class="ps-document">
                <center><img src="<?php echo url($exam_page->image_path); ?>" alt="<?php echo $exam_page->page_name; ?>" class="img-responsive"></center>
              </div>
            </div>
            <br>
            <div class="pt-0 pb-20 get-detail">
              <span style="font-size:18px; color:#cd2122;">Get Free NEET Counselling from Experts</span>
              <a class="ps-btn" onclick="window.location.href='<?php echo url('neet-counselling'); ?>/'" href="javascript:void()" rel="nofollow">Enquire Now</a>
            </div>

            <?php if (count($exam_page_contents) > 1) { ?>
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
                    <?php foreach ($exam_page_contents as $t) { ?>
                    <li><a href="#<?php echo slugify($t->title); ?>"><?php echo $t->title; ?></a></li>
                    <?php } ?>
                  </ol>
                </div>
              </aside>
            </div>
            <?php } ?>
            <?php foreach ($exam_page_contents as $c) { ?>
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
            <?php if (count($faqs)>0) { ?>
            <div class="ps-product__box mb-20">
              <div class="ps-section--default">
                <div class="ps-section__header" style="margin-bottom:0px; padding-bottom:10px; border:0px">
                  <h3>Faqs</h3>
                </div>
                <div id="accordion">
                  <?php foreach ($faqs as $faq) { ?>
                  <div class="card">
                    <div class="card-header">
                      <a onclick="toggleFaq('<?php echo $faq->id; ?>')" class="card-link text-dark" href="javascript:void()">
                        <span class="float-right"><i class="fa fa-arrow-down"></i></span>
                        <h5 class="mb-0" style="font-size:15px"><?php echo $faq->question; ?></h5>
                      </a>
                    </div>
                    <div id="a<?php echo $faq->id; ?>" style="display:none;">
                      <div class="card-body"><?php echo $faq->answer; ?></div>
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

            <style>
              .author{align-items:center; margin-bottom:15px;}
              .author .img-div{width:100%;}
              .author .img-div img{width:100%; border-radius:100%;}
              .author .img-div i{padding:2px; color:green; border-radius:100%; font-size:20px; margin-left:-30px; margin-top:5px; position:absolute; background: #fff;}
              .author .img-div .bio-btn{ font-size:14px; border:1px solid #cd2122; color:#cd2122; border-radius:5px; font-weight:400; padding:5px 12px; display:block; text-align:center; margin-top: 10px;}
              .author .img-div .bio-btn:hover{border:1px solid #117888; background:#117888; color:#fff}
              .author .cont-div{width:auto}
              .author .cont-div p{font-size:15px; margin-bottom:3px!important}
              .author .cont-div p strong{ text-transform:uppercase; color:#cd2122; font-weight:800!important;}
              .author .cont-div h6{ font-size:20px; color:#000; font-weight:800; margin-bottom:6px!important;}
              .author a{font-size:16px; font-weight:600; color:#da0b4e}
              .author span{ display:block; font-size:13px; padding-bottom:10px; margin-bottom:10px; border-bottom:1px dashed #e2e2e2}
              @media (max-width: 767px){
              .author{margin-bottom:0px;}
              .author .img-div{width:50%; margin:auto}
              .author .cont-div{ text-align:center}
              .author .cont-div h6{ font-size:18px;margin-top:20px}
              .author .cont-div p{font-size:14px;}
              }
            </style>
            <?php if($exam_page->author_id != null){ ?>
              <div class="ps-page--product" style="background-color:white;">
                <div class="ps-container pt-10" id="topuniversities">
                  <div class="ps-section--default pb-2" style="margin-bottom:0px">
                    <div class="ps-section__header" style="margin-bottom:0px; padding-bottom:0px; border:0px">
                      <div class="row author">
                        <div class="col-md-2">
                          <div class="img-div">
                            <img src="<?php echo asset($exam_page->getAuthor->profile_pic_path); ?>" alt="<?php echo $exam_page->getAuthor->name; ?>"><i class="fa fa-check-circle"></i>
                          </div>
                        </div>
                        <div class="col-md-10">
                          <div class="cont-div">
                            <h6>{{ $exam_page->getAuthor->name }}</h6>
                            <span>Content Curator | Updated on - <?php echo getFormattedDate($exam_page->updated_at,'M d, Y'); ?></span>
                            <?php if($exam_page->getAuthor->shortnote!=null){ ?>
                              <p><?php echo $exam_page->getAuthor->shortnote; ?></p><br>
                            <?php } ?>
                            <a style="float:right" href="<?php echo url('author/'.$exam_page->getAuthor->slug); ?>/" class="bio-btn">Read Full Bio</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <?php } ?>

            <!-- INQUIRY FORM START -->
            <?php //$this->load->view('web/form/university-side-form'); ?>
            <!-- INQUIRY FORM END -->
          </div>
          <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
            <?php if (count($exam_pages)>0) { ?>
            <div class="ps-section__left" style="position:sticky; top:0;">
              <aside class="ps-widget--account-dashboard">
                <h3 style=" background:#cd2122; color:#fff; font-size:16px; padding:10px 20px; margin:0px">News Categories</h3>
                <div class="ps-widget__content" style="background:#fff">
                  <ul>
                    <?php foreach ($exam_pages as $row) { ?>
                    <li><a href="<?php echo url($exam->exam_slug.'/' . $row->slug); ?>/"><i class="icon-arrow-right"></i> <?php echo $row->page_name; ?></a></li>
                    <?php } ?>
                  </ul>
                </div>
              </aside>
            </div>
            <?php } ?>
            <br>
            <?php if (count($exams)) { ?>
            <div class="ps-section__left" style="position:sticky; top:60px; background:#fff">
              <aside class="ps-widget--account-dashboard">
                <div class="ps-widget__content">
                  <div style=" font-size:18px; color:#fff; background:#045dab; padding:10px; text-align:center">Other Exam</div>
                  <ul style="max-height:480px; overflow:auto">
                    <?php foreach ($exams as $row) { ?>
                    <li>
                      <a href="<?php echo url($row->exam_slug); ?>/"><i class="icon-arrow-right"></i><?php echo $row->exam_name; ?></a>
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
