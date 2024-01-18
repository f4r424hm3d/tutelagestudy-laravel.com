@extends('front.layouts.main')
@push('seo_meta_tag')
  @include('front.layouts.author_page_meta_tag')
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
  <style>
    .nav-tabs>li {
      z-index: 9 !important;
      display: inline-block
    }

    .nav-tabs>li>a {
      padding: 12px 15px 15px 15px;
      color: #000000;
      font-size: 16px;
      text-transform: uppercase;
      text-shadow: none;
      font-weight: normal;
      position: relative;
      display: block;
      border: 1px solid #fff;
    }

    .nav-tabs>li>a:hover {
      padding: 12px 15px 12px 15px;
      border: 1px solid rgb(215, 224, 241);
      border-bottom: 3px solid #0047ab;
      background-color: rgb(255, 255, 255);
      box-shadow: 2px 0px 10px 0px rgb(228 235 242 / 40%);
      font-size: 16px;
      border-radius: 4px 4px 0 0;
    }

    .nav-tabs>li>a.active,
    .nav-tabs>li>a.active:focus,
    .nav-tabs>li>a.active:hover {
      padding: 12px 15px;
      border: 1px solid rgb(215, 224, 241);
      border-bottom: 3px solid #0047ab;
      background-color: rgb(255, 255, 255);
      box-shadow: 2px 0px 10px 0px rgb(228 235 242 / 40%);
      font-size: 16px;
      border-radius: 4px 4px 0 0;
    }

    .tabs-left>.nav-tabs {
      width: 100% !important;
      font-size: 15px;
      font-weight: 500;
      margin-bottom: 25px;
      display: block !important
    }

    .tab-content>.tab-pane,
    .pill-content>.pill-pane {
      display: none;
    }

    .tab-content>.active,
    .pill-content>.active {
      display: flow-root;
      background: #f5f6fa !important;
      padding: 25px;
      border-top: 3px solid #d7e0f1 !important;
    }

    .tab-content p {
      font-size: 13px;
      line-height: 18px;
      padding: 0px 0px 15px 0px;
      text-align: justify;
      margin: 0;
      color: #5c5c5c;
      font-weight: 400;
      margin-top: 10px
    }

    .vertically-scrollbar {
      overflow-x: auto;
      overflow-y: none;
      width: 100%;
      display: -webkit-box;
      /* word height: 60px */
    }

    .vertically-scrollbar::-webkit-scrollbar {
      height: 5px;
      background-color: #eee;
      /* or add it to the track */
    }

    .vertically-scrollbar::-webkit-scrollbar-thumb {
      background-color: #0047ab;
      border-radius: 5px
    }

    .city-box {
      background: #fff;
      width: 100%;
      height: 100%;
      border-style: solid;
      border-width: 1px;
      border-color: rgb(215, 224, 241);
      border-radius: 6px;
      background-color: rgb(255, 255, 255);
      box-shadow: 2px 0px 10px 0px rgb(228 235 242 / 40%);
      padding: 15px;
    }

    .city-name {
      text-transform: uppercase;
      font-weight: 500;
      font-size: 15px;
      margin-bottom: 10px
    }

    .city-location {
      position: relative;
      font-size: 13px;
      color: #696969;
      line-height: 20px;
      padding: 0 0 0 25px;
      margin: 0 0 20px 0;
    }

    .city-location i {
      position: absolute;
      top: 3px;
      left: 0;
      font-size: 16px;
      color: #0047ab
    }
  </style>
  <div class="ps-breadcrumb">
    <div class="ps-container">
      <ul class="breadcrumb bread-scrollbar">
        <li><a href="https://www.tutelagestudy.com/">Home</a></li>
        <li>Author</li>
        <li><?php echo $author->name; ?></li>
      </ul>
    </div>
  </div>
  <div class="ps-page--product" style="background-color:#eee; padding:25px 0px">
    <div class="container">
      <div class="card mb-3 p-4">
        <div class="row align-items-center">
          <div class="col-md-3"><img data-src="{{ asset($author->profile_pic_path) }}" alt="{{ $author->name }}"
              class="rounded img-fluid mb-4"></div>
          <div class="col-md-9">
            <h1><?php echo $author->name; ?> <small>(Content Curator)</small></h1>
            <hr>
            <h4 class="mb-2">Highlights</h4>
            <ul style="list-style:circle; padding-left:20px">
              <?php echo $author->highlights; ?>
            </ul>
            <hr />
            <h4 class="mt-2 mb-1">Experience</h4>
            <?php echo $author->experiance; ?>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <h4 class="mt-2 mb-1">Education</h4>
            <?php echo $author->education; ?>
          </div>
        </div>
      </div>
      <div class="container">
        <ul class="nav nav-tabs vertically-scrollbar" role="tablist">

          <li role="presentation"><a class="active" href="#blogs" aria-controls="blogs" role="tab" data-toggle="tab"
              aria-expanded="false">Blogs</a></li>

          <li role="presentation"><a class="" href="#Destinations" aria-controls="Destinations" role="tab"
              data-toggle="tab" aria-expanded="false">Destinations</a></li>

          <li role="presentation"><a class="" href="#Exams" aria-controls="Exams" role="tab" data-toggle="tab"
              aria-expanded="false">Exams</a></li>

        </ul>

        <!-- Tab panes -->
        <div class="tab-content latest-info bg-white" style="margin-top:0px">

          <div role="tabpanel" class="tab-pane active" id="blogs">
            <div class="row">
              @foreach ($news as $row)
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 col-12 ">
                  <div class="ps-post ps-product">
                    <div class="ps-post__thumbnail">
                      <a class="ps-post__overlay" href="{{ url($row->slug) }}/"></a><img
                        data-src="{{ asset($row->imgpath) }}" alt="{{ $row->headline }}" style="height: 150px;!important">
                    </div>
                    <div class="ps-post__content">
                      <div class="ps-post__meta"><a
                          href="{{ url('category/' . $row->getCategory->cate_name) }}/">{{ $row->getCategory->cate_name }}</a>
                      </div>
                      <a class="ps-post__title" href="{{ url($row->slug) }}/" title="{{ $row->headline }}"
                        data-toggle="tooltip">{{ strlen($row->headline) > 48 ? substr($row->headline, 0, 48) . '...' : $row->headline }}</a>
                      <p style="margin-bottom:0px; font-size:11px">{{ getFormattedDate($row->created_at, 'd M, Y') }}
                        by<span>{{ $author->name }}</span>
                      </p>
                    </div>
                  </div>
                </div>
              @endforeach
            </div>
          </div>
          <div role="tabpanel" class="tab-pane " id="Destinations">
            <div class="row">
              <?php
								foreach ($destinations as $row) {
							?>
              <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 col-12 ">
                <div class="ps-post ps-product">
                  <div class="ps-post__thumbnail">
                    <a class="ps-post__overlay" href="<?php echo url($row->slug); ?>/"></a>
                    <img data-src="<?php echo asset($row->thumbnail); ?>" alt="<?php echo $row->page_name; ?>" style="height: 150px;!important">
                  </div>
                  <div class="ps-post__content">
                    <a class="ps-post__title" href="<?php echo url($row->slug); ?>/" title="<?php echo $row->page_name; ?>"
                      data-toggle="tooltip"><?php echo $row->page_name; ?></a>
                  </div>
                </div>
              </div>
              <?php } ?>
            </div>
          </div>
          <div role="tabpanel" class="tab-pane " id="Exams">
            <div class="row">
              <?php
							foreach ($exam_pages as $row) {
							?>
              <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 col-12 ">
                <div class="ps-post ps-product">
                  <div class="ps-post__thumbnail">
                    <a class="ps-post__overlay" href="<?php echo url($row->getExam->exam_slug . '/' . $row->slug); ?>/"></a>
                    <img data-src="<?php echo asset($row->image_path); ?>" alt="<?php echo $row->page_name; ?>" style="height: 150px;!important">
                  </div>
                  <div class="ps-post__content">
                    <div class="ps-post__meta">
                      <a href="<?php echo url($row->getExam->exam_slug); ?>/"><?php echo $row->getExam->exam_name; ?></a>
                    </div>
                    <a class="ps-post__title" href="<?php echo url($row->getExam->exam_slug . '/' . $row->slug); ?>/" title="<?php echo $row->page_name; ?>"
                      data-toggle="tooltip"><?php echo strlen($row->page_name) > 48 ? substr($row->page_name, 0, 48) . '...' : $row->page_name; ?></a>
                    <p style="margin-bottom:0px; font-size:11px"><?php echo getFormattedDate($row->created_at, 'd M, Y'); ?> by<span>
                        <?php echo $author->name; ?></span></p>
                  </div>
                </div>
              </div>
              <?php } ?>
            </div>
          </div>

        </div>

      </div>
    </div>
  </div>
@endsection
