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
      "name": "<?php echo $exam->exam_name; ?>",
      "item": "<?php echo url()->current(); ?>/"
    }]
  }
</script> <!-- breadcrumb schema Code End -->

<!-- webpage schema Code Destinations -->
<script type="application/ld+json">
  {
    "@context": "https://schema.org/",
    "@type": "webpage",
    "url": "<?php echo url(Request::segment(1)); ?>",
    "name": "<?php echo $exam->page_name; ?>",
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
      "ratingCount": "<?php echo $exam->seo_rating; ?>"
    }
  }
</script>
@endpush
@section('main-section')
<div class="ps-page--single ps-page--vendor">
  <div class="ps-breadcrumb">
    <div class="container">
      <ul class="breadcrumb bread-scrollbar">
        <li><a href="<?= url('/') ?>">Home</a></li>
        <li>
          <?php echo $exam->exam_name; ?>
        </li>
      </ul>
    </div>
  </div>
  <section class="ps-store-list" style="background:#eeeeee">
    <div class="container">
      <div class="ps-section__wrapper">
        <div class="">
          <section class="ps-store-box">
            <div class="ps-section__header mt-20">
              <p>&nbsp;</p>
              <select class="form-control" style="width:200px; background:#fff" id="newscate">
                <option value="">Select</option>
                <?php foreach ($exams as $alp) { ?>
                <option value="<?php echo $alp->exam_slug; ?>/" <?php echo $exam->exam_slug == $alp->exam_slug ?
                  'Selected' : ''; ?>>
                  <?php echo $alp->exam_name; ?>
                </option>
                <?php } ?>
              </select>
            </div>
            <div class="ps-blog__content">
              <div class="row">
                <?php foreach ($exam_pages as $row) { ?>
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 col-12 ">
                  <div class="ps-post ps-product">
                    <div class="ps-post__thumbnail">
                      <a class="ps-post__overlay" href="<?php echo url($exam->exam_slug.'/'.$row->slug); ?>/"></a>
                      <img data-src="<?php echo asset($row->image_path); ?>" alt="<?php echo $row->page_name; ?>"
                        style="height: 150px;!important">
                    </div>
                    <div class="ps-post__content">
                      <div class="ps-post__meta">
                        <a href="<?php echo url($exam->exam_slug); ?>/">
                          <?php echo $exam->exam_name; ?>
                        </a>
                      </div>
                      <a class="ps-post__title" href="<?php echo url($exam->exam_slug.'/'.$row->slug); ?>/"
                        title="<?php echo $row->page_name; ?>" data-toggle="tooltip">
                        <?php echo strlen($row->page_name) > 48 ? substr($row->page_name, 0, 48) . '...' : $row->page_name; ?>
                      </a>
                      <p style="margin-bottom:0px; font-size:11px">
                        <?php echo getFormattedDate($row->created_at, 'd M, Y'); ?> by<span> admin</span>
                      </p>
                    </div>
                  </div>
                </div>
                <?php } ?>
              </div>
              {{-- <div class="ps-pagination">

              </div> --}}
            </div>
          </section>
        </div>
      </div>
    </div>
  </section>
</div>
<script>
  $(document).ready(function() {
    $('#newscate').change(function() {
      var newscate = $('#newscate').val();
      window.location.replace("<?php echo url('/') ?>" + newscate);
    });
  });
</script>
@endsection
