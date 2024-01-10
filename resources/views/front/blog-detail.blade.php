@extends('front.layouts.main')
@push('seo_meta_tag')
@include('front.layouts.dynamic_page_meta_tag')
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

  .ps-document h2,
  h3,
  h4,
  h5 {
    background: #ebeded;
    padding: 8px;
    font-size: 20px;
    font-weight: 400;
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
      display: inline-block;
      text-align: center
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
<div class="ps-page--single ps-page--vendor">
  <div class="ps-breadcrumb">
    <div class="container">
      <div class="col-md-12">
        <ul class="breadcrumb bread-scrollbar">
          <li><a href="<?= url('/') ?>">Home</a></li>
          <li><a href="<?= url('blog') ?>/"> Blog</a></li>
          <li><span>
              <?php echo ucfirst($blog->headline); ?>
            </span></li>
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
                <h1 class="mb-1" style="font-size: 20px">
                  <?php echo ucfirst($blog->headline); ?>
                </h1>
                <p style="font-size:12px">
                  <?php echo getFormattedDate($blog->created_at, 'd M, Y'); ?>, <b>By Tutelage Team</b>, <a
                    href="<?php echo url('category/' . $blog->cate_slug); ?>/">
                    <?php echo ucwords(str_replace('-', ' ', $blog->cate_slug)); ?>
                  </a>
                </p>
              </div>
              <div>
                <img data-src="<?php echo asset($blog->imgpath); ?>" alt="<?php echo ucfirst($blog->headline); ?>"
                  class="mb-20" width="1000">
              </div>
              <br>
              <div class="pt-0 pb-20 get-detail">
                <h4 class="mb-0">Get Free Counselling</h4>
                <a class="ps-btn" onclick="window.location.href='<?php echo url('mbbs-abroad-counselling/'); ?>/'"
                  href="javascript:void()">Enquire
                  Now</a>
              </div>
              <hr>
              <div class="ps-document">
                <?php echo $blog->description; ?>
              </div><br>
              <hr>

            </div>
          </div>
          <br>
          <style>
            .author {
              align-items: center;
              margin-bottom: 15px;
            }

            .author .img-div {
              width: 100%;
            }

            .author .img-div img {
              width: 100%;
              border-radius: 100%;
            }

            .author .img-div i {
              padding: 2px;
              color: green;
              border-radius: 100%;
              font-size: 20px;
              margin-left: -30px;
              margin-top: 5px;
              position: absolute;
              background: #fff;
            }

            .author .img-div .bio-btn {
              font-size: 14px;
              border: 1px solid #cd2122;
              color: #cd2122;
              border-radius: 5px;
              font-weight: 400;
              padding: 5px 12px;
              display: block;
              text-align: center;
              margin-top: 10px;
            }

            .author .img-div .bio-btn:hover {
              border: 1px solid #117888;
              background: #117888;
              color: #fff
            }

            .author .cont-div {
              width: auto
            }

            .author .cont-div p {
              font-size: 15px;
              margin-bottom: 3px !important
            }

            .author .cont-div p strong {
              text-transform: uppercase;
              color: #cd2122;
              font-weight: 800 !important;
            }

            .author .cont-div h6 {
              font-size: 20px;
              color: #000;
              font-weight: 800;
              margin-bottom: 6px !important;
            }

            .author a {
              font-size: 16px;
              font-weight: 600;
              color: #da0b4e
            }

            .author span {
              display: block;
              font-size: 13px;
              padding-bottom: 10px;
              margin-bottom: 10px;
              border-bottom: 1px dashed #e2e2e2
            }

            @media (max-width: 767px) {
              .author {
                margin-bottom: 0px;
              }

              .author .img-div {
                width: 50%;
                margin: auto
              }

              .author .cont-div {
                text-align: center
              }

              .author .cont-div h6 {
                font-size: 18px;
                margin-top: 20px
              }

              .author .cont-div p {
                font-size: 14px;
              }
            }
          </style>
          <?php if($blog->author_id != null){ ?>
          <div class="ps-page--product" style="background-color:white;">
            <div class="ps-container pt-10" id="topuniversities">
              <div class="ps-section--default pb-2" style="margin-bottom:0px">
                <div class="ps-section__header" style="margin-bottom:0px; padding-bottom:0px; border:0px">
                  <div class="row author">
                    <div class="col-md-2">
                      <div class="img-div">
                        <img data-src="<?php echo asset($blog->getAuthor->profile_pic_path); ?>"
                          alt="<?php echo $blog->getAuthor->name; ?>"><i class="fa fa-check-circle"></i>
                      </div>
                    </div>
                    <div class="col-md-10">
                      <div class="cont-div">
                        <h6>{{ $blog->getAuthor->name }}</h6>
                        <span>Content Curator | Updated on -
                          <?php echo getFormattedDate($blog->updated_at, 'M d, Y'); ?>
                        </span>
                        <?php if($blog->getAuthor->shortnote!=null){ ?>
                        <p>
                          <?php echo $blog->getAuthor->shortnote; ?>
                        </p><br>
                        <?php } ?>
                        <a style="float:right" href="<?php echo url('author/' . $blog->getAuthor->slug); ?>/"
                          class="bio-btn">Read Full Bio</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php } ?>
        </div>
        <div class="col-md-3">
          <div class="ps-section__left">
            <aside class="ps-widget--account-dashboard">
              <h3 style=" background:#cd2122; color:#fff; font-size:16px; padding:10px 20px; margin:0px">More Categories
              </h3>
              <div class="ps-widget__content" style="background:#fff">
                <ul>
                  <?php
                  foreach ($categories as $cat) {
                  ?>
                  <li><a href="<?php echo url('category/' . $cat->slug); ?>/"><i class="icon-arrow-right"></i> {{
                      $cat->cate_name }}</a></li>
                  <?php } ?>
                </ul>
              </div>
            </aside>
            <!-- Sidebar ads -->

            <aside class="ps-widget--account-dashboard">
              <h3 style=" background:#cd2122; color:#fff; font-size:16px; padding:10px 20px; margin:0px">Recent Posts
              </h3>
              <div class="ps-widget__content" style="background:#fff">
                <ul>
                  <?php
                  foreach ($blogs as $rn) {
                  ?>
                  <li><a href="<?php echo url($rn->slug); ?>/"><i class="icon-arrow-right"></i>
                      <?php echo ucwords($rn->headline); ?>
                    </a></li>
                  <?php } ?>
                </ul>
              </div>
            </aside>

            <aside class="ps-widget--account-dashboard">
              <h3 style=" background:#cd2122; color:#fff; font-size:16px; padding:10px 20px; margin:0px">Destinations
              </h3>
              <div class="ps-widget__content" style="background:#fff">
                <ul>
                  <?php foreach ($destinations as $row) { ?>
                  <li>
                    <a href="<?php echo url($row->slug); ?>/">
                      <i class="icon-arrow-right"></i> MBBS From
                      <?php echo $row->country; ?>
                    </a>
                  </li>
                  <?php } ?>
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
