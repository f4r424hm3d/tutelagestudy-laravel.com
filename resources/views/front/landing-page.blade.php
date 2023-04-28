@extends('front.layouts.main')
@push('seo_meta_tag')
@include('front.layouts.static_page_meta_tag')
@endpush
@section('main-section')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="ps-page--single ps-page--vendor">
  <div class="ps-breadcrumb">
    <div class="container">
      <ul class="breadcrumb bread-scrollbar">
        <li><a href="<?= base_url() ?>">Home</a></li>
        <li><?php echo $lp->exam_name; ?></li>
      </ul>
    </div>
  </div>
  <section class="ps-store-list" style="background:#eeeeee">
    <div class="container">
      <div class="ps-section__wrapper">
        <div class="">
          <section class="ps-store-box">
            <div class="ps-section__header mt-20">
              <p>Showing 1 - 8 of 22 results</p>
              <select class="form-control" style="width:200px; background:#fff" id="newscate">
                <option value="">Select</option>
                <?php
                foreach ($alllp as $alp) {
                ?>
                  <option value="<?php echo $alp->exam_slug; ?>/" <?php echo $this->uri->segment(2) == $alp->exam_slug ? 'Selected' : ''; ?>><?php echo $alp->exam_name; ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="ps-blog__content">
              <div class="row">
                <?php

                foreach ($rows as $row) {
                ?>
                  <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 col-12 ">
                    <div class="ps-post ps-product">
                      <div class="ps-post__thumbnail">
                        <a class="ps-post__overlay" href="<?php echo base_url($lp->exam_slug.'/'.$row->slug); ?>/"></a>
                        <img src="<?php echo base_url($row->image_path); ?>" alt="<?php echo $row->page_name; ?>" style="height: 150px;!important">
                      </div>
                      <div class="ps-post__content">
                        <div class="ps-post__meta">
                          <a href="<?php echo base_url($lp->exam_slug); ?>/"><?php echo $lp->exam_name; ?></a>
                        </div>
                        <a class="ps-post__title" href="<?php echo base_url($lp->exam_slug.'/'.$row->slug); ?>/" title="<?php echo $row->page_name; ?>" data-toggle="tooltip"><?php echo strlen($row->page_name) > 48 ? substr($row->page_name, 0, 48) . '...' : $row->page_name; ?></a>
                        <p style="margin-bottom:0px; font-size:11px"><?php echo getFormattedDate($row->created_at, 'd M, Y'); ?> by<span> admin</span></p>
                      </div>
                    </div>
                  </div>
                <?php } ?>
              </div>
              <div class="ps-pagination">
                <?php
                $segment4 = $page_number;
                $count;
                $tpc = $count / $limit_per_page;
                $tp = intval(($count / $limit_per_page));
                if ($tpc > $tp) {
                  $tp = intval(($count / $limit_per_page) + 1);
                } else {
                  $tp = intval(($count / $limit_per_page));
                }
                $b1 = $segment4 - 2;
                $ppage = $segment4 - 1;
                $b2 = $segment4 - 1;
                $b3 = $segment4;
                $b4 = $segment4 + 1;
                $b5 = $segment4 + 2;
                $npage = $segment4 + 1;
                if ($tp > 1) {
                ?>
                  <ul class="pagination">
                    <?php if ($ppage > 0) { ?>
                      <li><a href="javascript:void()" onclick="myfunction(<?php echo $ppage; ?>)">Pre</a></li>
                    <?php } ?>
                    <?php if ($b3 > 4) { ?>
                      <li><a href="javascript:void()" onclick="myfunction('1')">1</a></li>
                      <li><a href="javascript:void()">...</a></li>
                    <?php } ?>
                    <?php if ($b2 > 0) { ?>
                      <li><a href="javascript:void()" onclick="myfunction(<?php echo $b2; ?>)"><?php echo $b2; ?></a></li>
                    <?php } ?>
                    <?php if ($b3 > 0) { ?>
                      <li class="active"><a style="background-color:#ee6e73;border-color:#ee6e73" href="javascript:void()" onclick="myfunction(<?php echo $b3; ?>)"><?php echo $b3; ?></a></li>
                    <?php } ?>
                    <?php if ($b4 <= $tp) { ?>
                      <li><a href="javascript:void()" onclick="myfunction(<?php echo $b4; ?>)"><?php echo $b4; ?></a></li>
                    <?php } ?>
                    <?php if ($tp > 3 && $tp != $segment4 && $b5 != $tp && $b4 != $tp) { ?>
                      <li><a href="javascript:void()">...</a></li>
                      <li><a href="javascript:void()" onclick="myfunction(<?php echo $tp; ?>)"><?php echo $tp; ?></a></li>
                    <?php } ?>
                    <?php if ($npage <= $tp) { ?>
                      <li><a href="javascript:void()" onclick="myfunction(<?php echo $npage; ?>)">Next</a></li>
                    <?php } ?>
                  </ul>
                <?php } ?>
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
      window.location.replace("<?php echo base_url() ?>" + newscate);
    });
  });

  function myfunction(val) {
    //var limit_per_page = $('#limit_per_page').val();
    var col = 'newslist_page_number';
    if (val != '') {
      $.ajax({
        url: "<?php echo base_url(); ?>Welcome/setNewPageNumber",
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
