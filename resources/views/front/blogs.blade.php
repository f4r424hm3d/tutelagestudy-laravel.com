@extends('front.layouts.main')
@push('seo_meta_tag')
@include('front.layouts.static_page_meta_tag')
@endpush
@section('main-section')
<div class="ps-page--single ps-page--vendor">
  <div class="ps-breadcrumb">
    <div class="container">
      <ul class="breadcrumb bread-scrollbar">
        <li><a href="<?= url('/') ?>">Home</a></li>
        <li><a href="<?= url('blog') ?>/"> Articles</a></li>
      </ul>
    </div>
  </div>
  <section class="ps-store-list" style="background:#eeeeee">
    <div class="container">
      <div class="ps-section__wrapper">
        <div class="">
          <section class="ps-store-box">
            <div class="ps-section__header mt-20">
              {{-- <p>Showing 1 - 8 of 22 results</p> --}}
              <p>&nbsp;</p>
              <select class="form-control" style="width:200px; background:#fff" id="newscate">
                <option value="">Select Category</option>
                <?php foreach ($categories as $cat) { ?>
                <option value="<?php echo $cat->slug; ?>/">
                  <?php echo $cat->cate_name; ?>
                </option>
                <?php } ?>
              </select>
            </div>
            <div class="ps-blog__content">
              <div class="row">
                <?php
                foreach ($blogs as $row) {
                ?>
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 col-12 ">
                  <div class="ps-post ps-product">
                    <div class="ps-post__thumbnail">
                      <a class="ps-post__overlay" href="<?php echo url($row->slug); ?>/"></a><img
                        src="<?php echo asset($row->imgpath); ?>" alt="<?php echo $row->headline; ?>"
                        style="height: 150px;!important">
                    </div>
                    <div class="ps-post__content">
                      <div class="ps-post__meta"><a href="<?php echo url('category/' . $row->getCategory->slug); ?>/">{{
                          $row->getCategory->slug }}</a></div>

                      <a class="ps-post__title" href="<?php echo url($row->slug); ?>/"
                        title="<?php echo $row->headline; ?>" data-toggle="tooltip">
                        <?php echo strlen($row->headline) > 48 ? substr($row->headline, 0, 48) . '...' : $row->headline; ?>
                      </a>
                      <p style="margin-bottom:0px; font-size:11px">
                        <?php echo getFormattedDate($row->created_at, 'd M, Y'); ?> by<span> {{ $row->getAuthor->name
                          }}</span>
                      </p>
                    </div>
                  </div>
                </div>
                <?php } ?>
              </div>
              {!! $blogs->links('pagination::bootstrap-5') !!}
            </div>
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
      //alert(newscate);
      if (newscate != '') {
        window.location.replace("{{ url('/category') }}/" + newscate);
      } else {
        window.location.replace("{{ url('blog') }}/");
      }
    });
  });

  function myfunction(val) {
    //var limit_per_page = $('#limit_per_page').val();
    var col = 'newslist_page_number';
    if (val != '') {
      $.ajax({
        url: "<?php echo url('/'); ?>Welcome/setNewPageNumber",
        method: "POST",
        data: {
          col: col,
          val: val
        },
        success: function(data) {
          location.reload(true);
        }
      });
    }
  }
</script>
@endsection
