@extends('front.layouts.main')
@push('seo_meta_tag')
@include('front.layouts.static_page_meta_tag')
@endpush
@section('main-section')
<style>
  .pointer {
    cursor: pointer;
  }
</style>
<?php $this->load->view('web/header-filter'); ?>
<div class="ps-breadcrumb">
  <div class="ps-container">
    <ul class="breadcrumb">
      <li><a href="<?php echo base_url(); ?>">Home</a></li>
      <li><?php echo ucwords(str_replace('-', ' ', $this->uri->segment(1))); ?></li>
    </ul>
  </div>
</div>
<!-- top filter start -->
<div class="ps-section--default ps-home-blog">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="ps-block--recent-viewed">
          <div class="ps-block__header">
            <h4>TOP UNIVERSITIES/COLLEGES IN INDIA</h4>
          </div>
          <style>
            .ps-section--default {
              margin-bottom: 0px !important
            }

            .filter-hdr {
              border: 1px solid #edeff0;
              box-shadow: 0 0 5px 0 rgb(207 207 207 / 50%);
              background: #fff;
              padding: 10px 10px 5px 10px;
            }

            .filter-hdr a {
              display: inline-block;
              color: #756d6d;
              border-radius: 100px;
              padding: 5px 10px 5px 10px;
              font-size: 11px;
              border: 1px solid;
              background-color: #eee;
              text-decoration: none;
              text-transform: uppercase;
              margin-right: 5px;
              margin-bottom: 5px
            }

            .filter-hdr a:hover {
              background: #0047ab;
              color: #fff;
              cursor: pointer;
            }

            .fc-list-icon p {
              margin-bottom: 0px;
              font-size: 13px
            }

            @media screen and (max-width:500px) {
              .fc-list-icon a.mr-5 {
                margin-right: 0px !important;
                line-height: 16px;
              }

              .fc-list-icon a {
                display: flex;
                flex-flow: row nowrap;
                align-items: center;
                margin-bottom: 8px
              }

              .fc-list-icon a i {
                font-size: 16px;
                margin-right: 7px;
              }
            }
          </style>
          <?php if (isset($_SESSION['filter_level']) || isset($_SESSION['filter_sg']) || isset($_SESSION['filter_specialization']) || isset($_SESSION['filter_studymode'])) { ?>
            <div class="row filter-hdr">
              <?php if (isset($_SESSION['filter_level'])) { ?>
                <a href="javascript:void()" onclick="removeAppliedFilter('filter_level')"><?php echo $_SESSION['filter_level']; ?> <span>×</span></a>
              <?php } ?>
              <?php if (isset($_SESSION['filter_sg'])) { ?>
                <a href="javascript:void()" onclick="removeAppliedFilter('filter_sg')"><?php echo $_SESSION['filter_sg']; ?> <span>×</span></a>
              <?php } ?>
              <?php if (isset($_SESSION['filter_specialization'])) { ?>
                <a href="javascript:void()" onclick="removeAppliedFilter('filter_specialization')"><?php echo $_SESSION['filter_specialization']; ?> <span>×</span></a>
              <?php } ?>
              <?php if (isset($_SESSION['filter_studymode'])) { ?>
                <a href="javascript:void()" onclick="removeAppliedFilter('filter_studymode')"><?php echo $_SESSION['filter_studymode']; ?> <span>×</span></a>
              <?php } ?>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- top filter end  -->
<?php
if (isset($_SESSION['filter_level'])) {

  $wd['level'] = $_SESSION['filter_level'];
}

if (isset($_SESSION['filter_sg'])) {

  $wd['sg_slug'] = $_SESSION['filter_sg'];
}

if (isset($_SESSION['filter_specialization'])) {

  $wd['sub_slug'] = $_SESSION['filter_specialization'];
}

if (isset($_SESSION['filter_studymode'])) {

  $keyword = $_SESSION['filter_studymode'];
}

$wd['u_status'] = '1';

$wd['website'] = site_var;

if (isset($_SESSION['page_number'])) {

  $page_number = $_SESSION['page_number'];
} else {

  $page_number = 1;
}

$page = is_numeric($page_number) ? ($page_number - 1) : 0;

$limit_per_page = '10';

if (isset($_SESSION['filter_studymode'])) {

  $resultlist = $this->mm->getDataByOWKL('u_id', 'RANDOM', $wd, 'university_programs', $keyword, $limit_per_page, $page * $limit_per_page);

  $totalr = $this->mm->getDataByOWK('u_id', 'RANDOM', $wd, 'university_programs', $keyword);
} else {

  $resultlist = $this->mm->getDataByOWL('u_id', 'RANDOM', $wd, 'university_programs', $limit_per_page, $page * $limit_per_page);

  $totalr = $this->mm->getDataByOW('u_id', 'RANDOM', $wd, 'university_programs');
}

$u_ida = array();

foreach ($totalr as $key) {

  $u_ida[] = $key->u_id;
}

$totaluniofrcrs = count(array_unique($u_ida));

if ($totalr == false) {

  $count = '0';
} else {

  $count = count($totalr);
}

if ($page_number == '') {

  $pn = 1;
} else {

  $pn =  $page_number;
}

$start = ((($pn - 1) * $limit_per_page) + 1);

$tp = intval(($count / $limit_per_page));

if ($pn > $tp) {

  $end = $count;
} else {

  $end = $start + ($limit_per_page - 1);
}

?>
<div class="ps-page--product-box">
  <div class="container-fluid">
    <div class="ps-layout--shop">
      <?php $this->load->view('web/filter'); ?>
      <div class="ps-layout__right">
        <div class="ps-shopping ps-tab-root">
          <div class="ps-shopping__header">
            <p><strong><?php echo $totaluniofrcrs; ?></strong> Universities offering <strong><?php echo $count; ?></strong> courses</p>
          </div>
          <div class="ps-tabs">
            <div class="ps-tab active" id="tab-2">
              <div class="ps-shopping-product">
                <?php
                foreach ($resultlist as $key) {
                  $uni = $this->mm->getDataById($key->u_id, 'universities');
                ?>
                  <div class="ps-product ps-product--wide bg-white">
                    <div class="ps-product__thumbnail universitylogo text-center text-center col-md-2">
                      <span class="pointer">
                        <img src="<?php echo $uni->imgpath; ?>" alt="<?php echo $uni->name; ?>" style="width:100%">
                      </span>
                    </div>
                    <div class="ps-product__container col-md-8" style="padding-top:0px!important;padding-bottom:0px!important;">
                      <div class="ps-product__content" style="align-items:center!important;">
                        <a class="ps-product__title" href="<?php echo base_url($uni->uname . '/' . $key->slug); ?>">
                          <h5><?php echo ucwords($key->course_name); ?></h5>
                        </a>
                        <p class="ps-product__vendor mb-2">By: <a href="<?php echo base_url($uni->uname); ?>"><?php echo ucwords($uni->name); ?></a></p>
                        <div class="fc-list-icon">
                          <p style="margin-bottom:0px; font-size:13px">
                            <span class="mr-5 pointer"> <i class="icon-book"></i><span> <?php echo $uni->inst_type; ?></span></span>
                            <span class="mr-5 pointer"><i class="icon-map-marker"></i><span> <?php echo $uni->city; ?></span></span>
                            <span class="mr-5 pointer"><i class="icon-clock3"></i><span> <?php echo $key->duration; ?></span></span>
                            <span class="mr-5 pointer"><i class="icon-wallet"></i><span> <?php echo $key->study_mode; ?></span></span>
                            <span class="mr-5 pointer"><i class="icon-earth"></i><span> <?php echo $key->language == '' ? 'English' : $key->language; ?></span></span>
                            <span class="mr-5 pointer"><i class="icon-cash-dollar"></i><span> Scholarship (<?php echo $key->scholarship; ?>)</span></span>
                          </p>
                        </div>
                      </div>
                    </div>
                    <div class="ps-product__shopping col-md-2" style="flex-basis:100%;">
                      <?php if (!isset($_SESSION['isUserloggedin'])) { ?>
                        <ul class="ps-product__actions" style="margin-top:10px">
                          <li><a href="<?php echo base_url('sign-up'); ?>"><i class="icon-heart"></i> SHORTLIST</a></li>
                        </ul>
                        <a class="ps-btn" href="<?php echo base_url('sign-up'); ?>">Apply</a>
                        <?php
                      } else {
                        $id = $_SESSION['isUserloggedin']['userid'];
                        $wslc = array('stdid' => $id, 'prog_id' => $key->id);
                        $slc = $this->mm->getCount($wslc, 'tbl_shortlist');
                        if ($slc > 0) {
                          $sld = $this->mm->getAllData9($wslc, 'tbl_shortlist');
                          if ($sld->status == 0) {
                        ?>
                            <a class="ps-btn" href="<?php echo base_url('Welcome/directApply/' . $key->id); ?>" title="Click to direct apply">Apply</a>
                          <?php
                          }
                          if ($sld->status == 1) {
                          ?>
                            <a href="javascript:void()" class="ps-btn" title="Applied"><i class="fa fa-check"></i> Applied</a>
                          <?php
                          }
                        } else {
                          ?>
                          <ul class="ps-product__actions">
                            <li>
                              <a href="<?php echo base_url('Welcome/addToShortList/' . $key->id); ?>" class="btn button" title="Click to add this program to your shortlist"><i class="icon-heart"></i> ADD TO SHORTLIST</a>
                            </li>
                          </ul>
                          <a class="ps-btn" href="<?php echo base_url('Welcome/directApply/' . $key->id); ?>" title="Click to direct apply">Apply</a>
                      <?php
                        }
                      }
                      ?>
                    </div>
                  </div>
                <?php } ?>
                <?php if ($count == 0) { ?>
                  <div>
                    <center>
                      <h2>No data found with your match.</h2>
                    </center>
                  </div>
                <?php } ?>
                <div class="ps-pagination">
                  <?php
                  if ($page_number == '') {
                    $segment4 = 1;
                  } else {
                    $segment4 = $page_number;
                  }
                  $count;
                  $tp = intval(($count / $limit_per_page) + 1);
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
                        <li><a href="javascript:void()" onclick="myfunction(<?php echo $ppage; ?>)"><i class="icon-chevron-left"></i></a></li>
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
                        <li><a href="javascript:void()" onclick="myfunction(<?php echo $npage; ?>)"><i class="icon-chevron-right"></i></a></li>
                      <?php } ?>
                    </ul>
                  <?php } ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php $this->load->view('web/mbl-filter'); ?>
  <div class="ps-site-overlay"></div>
  <div id="loader-wrapper">
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
  </div>
  <div class="ps-search" id="site-search">
    <a class="ps-btn--close" href="#"></a>
    <div class="ps-search__content">
      <form class="ps-form--primary-search" action="#" method="post">
        <input class="form-control" type="text" placeholder="Search for...">
        <button><i class="aroma-magnifying-glass"></i></button>
      </form>
    </div>
  </div>
  <script>
    function myfunction(id1) {
      //var limit_per_page = $('#limit_per_page').val();
      if (id1 != '') {
        $.ajax({
          url: "<?php echo base_url(); ?>Welcome/setPageNumber",
          method: "POST",
          data: {
            id1: id1
          },
          success: function(data) {
            location.reload(true);
          }
        });
      }
    }

    function removeAppliedFilter(value) {
      //alert(value);
      //die();
      if (value != '') {
        $.ajax({
          url: "<?php echo base_url(); ?>Welcome/removeAppliedFilter",
          method: "GET",
          data: {
            value: value
          },
          success: function(data) {
            //alert(data);
            //die();
            if (value == 'filter_specialization') {
              window.location.replace("<?php echo base_url('courses-in-india'); ?>");
            } else {
              location.reload(true);
            }
          }
        });
      }
    }
  </script>
@endsection
