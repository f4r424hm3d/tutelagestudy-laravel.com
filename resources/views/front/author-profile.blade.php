@extends('front.layouts.main')
@push('seo_meta_tag')
  @include('front.layouts.author_page_meta_tag')
@endpush
@section('main-section')

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
        <div class="row">
          <div class="col-md-3">
            <div class="ufull-div">
            <img data-src="{{ asset($author->profile_pic_path) }}" alt="{{ $author->name }}"
            class="rounded img-fluid">
            </div>
          </div>
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
        <ul class="nav nav-tabs-mains vertically-scrollbar" role="tablist">

          <li role="presentation"><a class="active" href="#blogs" aria-controls="blogs" role="tab" data-toggle="tab"
              aria-expanded="false">Blogs</a></li>

          <li role="presentation"><a class="" href="#Destinations" aria-controls="Destinations" role="tab"
              data-toggle="tab" aria-expanded="false">Destinations</a></li>

          <li role="presentation"><a class="" href="#Exams" aria-controls="Exams" role="tab" data-toggle="tab"
              aria-expanded="false">Exams</a></li>

        </ul>

        <!-- Tab panes -->
        <div class="tab-contentmains latest-info bg-white" style="margin-top:0px">

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
                          href="{{ url('blog/' . $row->getCategory->slug) }}/">{{ $row->getCategory->cate_name }}</a>
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
