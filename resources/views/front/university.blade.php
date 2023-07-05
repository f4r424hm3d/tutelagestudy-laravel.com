<?php
$uri = $this->uri->segment(1);
if ($uri != 'universities') {
  $instDet = $this->mm->getAllData9(['slug' => $uri], 'institute_types');
  $_SESSION['unifilter_instype'] = $instDet->id;
}
if (isset($_GET['pn'])) {
  $page_number = $_GET['pn'];
} else {
  $page_number = 1;
}
?>
@extends('front.layouts.main')
@push('seo_meta_tag')
@include('front.layouts.static_page_meta_tag')
@endpush
@section('main-section')
<style type="text/css">
  .m-left1 {
    float: center;
    width: 100%;
    margin-right: 25%;
  }

  .common1 {
    float: left;
    margin-right: 5%;
  }

  .modal-content {
    margin: 22% auto
  }

  .modal {
    padding-right: 0px !important;
    z-index: 9
  }

  .modal-text-p {
    padding-top: 20px
  }

  .modal-header {
    padding: 2rem 1rem;
  }

  @media screen and (max-width:767px) {
    .modal-content {
      margin: 20% auto
    }

    .modal-text-p {
      padding-top: 10px
    }

    .mplr0 {
      padding-left: 0px !important;
      padding-right: 0px !important;
    }
  }
</style>
<header class="header header--mobile header--mobile-categories" data-sticky="true">
  <div class="header__filter">
    <button class="ps-shop__filter-mb" id="filter-sidebar"><i class="icon-equalizer"></i><span>Filter</span></button>
  </div>
</header>
<div class="ps-breadcrumb">
  <div class="container-fluid mplr0">
    <ul class="breadcrumb bread-scrollbar">
      <li><a href="<?php echo base_url(); ?>">Home</a></li>
      <li>Universities</li>
    </ul>
  </div>
</div>
<?php if (isset($_SESSION['unifilter_instype'])) { ?>
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
              margin-bottom: 30px !important
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
          </style>
          <div class="row filter-hdr">
            <?php if (isset($_SESSION['unifilter_instype'])) { ?>
            <a href="javascript:void(0)" onclick="removeAppliedFilter('unifilter_instype')">
              <?php echo $instDet->type; ?> <span>×</span>
            </a>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php } ?>
<?php
if (isset($_SESSION['unifilter_instype'])) {
  $wd['institute_type'] = $_SESSION['unifilter_instype'];
}
$wd['status'] = '1';
$page = is_numeric($page_number) ? ($page_number - 1) : 0;
$limit_per_page = '10';
$resultlist = $this->mm->getDataByOWL('id', 'DESC', $wd, 'universities', $limit_per_page, $page * $limit_per_page);
$totalr = $this->mm->getDataByOW('id', 'DESC', $wd, 'universities');
$u_ida = array();
foreach ($totalr as $key) {
  $u_ida[] = $key->id;
}
$totaluniofrcrs = count(array_unique($u_ida));
if ($totalr == false) {
  $count = '0';
} else {
  $count = count($totalr);
}
$pn =  $page_number;
$start = ((($pn - 1) * $limit_per_page) + 1);
$tp = intval(($count / $limit_per_page));
if ($pn > $tp) {
  $end = $count;
} else {
  $end = $start + ($limit_per_page - 1);
}
?>
<?php $fullurl = base_url($this->uri->uri_string()); ?>
<style>
  .alert {
    padding: 20px;
    background-color: #4CAF50;
    color: white;
  }

  .closebtn {
    margin-left: 15px;
    color: white;
    font-weight: bold;
    float: right;
    font-size: 22px;
    line-height: 20px;
    cursor: pointer;
    transition: 0.3s;
  }

  .closebtn:hover {
    color: black;
  }
</style>
<div class="ps-page--product ps-page--product-box pt-0">
  <div class="container-fluid mplr0">
    <div class="row">
      <div class="col-lg-12">
        <div class="ps-page--shop">
          <div class="">
            <div class="ps-layout--shop">
              <?php $this->load->view('web/unifilter'); ?>
              <div class="ps-layout__right">
                <div class="ps-shopping ps-tab-root">
                  <?php if ($this->session->flashdata('smsg')) { ?>
                  <div class="alert"> <span class="closebtn"
                      onclick="this.parentElement.style.display='none';">&times;</span> <strong>
                      <?php echo $this->session->flashdata('smsg'); ?>
                    </strong> </div>
                  <?php } ?>
                  <div class="ps-shopping__header">
                    <p>Found<strong>
                        <?php echo $totaluniofrcrs; ?>
                      </strong> Universities</p>
                  </div>
                  <div class="ps-tabs">
                    <?php
                    foreach ($resultlist as $key) {
                      $instType = $this->mm->getDataById($key->institute_type, 'institute_types');
                    ?>
                    <div class="ps-tab active" id="tab-2">
                      <div>
                        <div class="ps-product ps-product--wide">
                          <div class="ps-product__thumbnail universitylogo text-center col-md-2 col-sm-12 col-xs-12">
                            <img src="<?php echo base_url($key->imgpath); ?>" alt="u<?php echo $key->name; ?>">
                          </div>
                          <div class="ps-product__container col-md-7 col-sm-12 col-xs-12">
                            <div class="ps-product__content">
                              <a class="ps-product__title b"
                                href="<?php echo base_url($key->country_slug . '/' . $key->uname); ?>">
                                <h5>
                                  <?php echo $key->name; ?>
                                </h5>
                              </a>
                              <p>
                                <i class="fa fa-university"></i><span>
                                  <?php echo $instType->type; ?>
                                </span>
                              </p>
                            </div>
                          </div>
                          <div class="ps-product__container col-md-3 col-sm-12 col-xs-12 text-center">
                            <p style="margin:0px">
                              <!-- <a target="_blank" rel="noopener noreferrer" class="ps-btn w-100" style="background:#0047ab" href="<?php echo base_url($key->uname . '/write-review'); ?>"><i class=" fa fa-comments"></i> Write review</a> -->

                              <a onclick="setModelAttr('<?php echo $key->imgpath ?>','<?php echo $key->name ?>')"
                                class="ps-btn mt-2 w-100" href="javascript:void()" data-toggle="modal"
                                data-target="#exampleModalLong"><i class="icon-question-circle"></i> Request Info</a>
                            </p>
                          </div>
                        </div>
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
                      $segment4 = $page_number;
                      $tp = ceil($count / $limit_per_page);
                      $ppage = $segment4 - 1;
                      $npage = $segment4 + 1;
                      $b1 = $segment4 - 2;
                      $b2 = $segment4 - 1;
                      $b3 = $segment4;
                      $b4 = $segment4 + 1;
                      $b5 = $segment4 + 2;
                      if ($tp > 1) {
                      ?>
                      <ul class="pagination">
                        <?php if ($ppage > 0) { ?>
                        <li class="page-item"><a class="page-link " href="javascript:void()"
                            onclick="myfunction(<?php echo $ppage; ?>)"><i class="icon-chevron-left"></i></a></li>
                        <?php } ?>

                        <?php if ($b1 > 0) { ?>
                        <li class="page-item"><a class="page-link " href="javascript:void()"
                            onclick="myfunction(<?php echo $b1; ?>)">
                            <?php echo $b1; ?>
                          </a></li>
                        <?php } ?>
                        <?php if ($b2 > 0) { ?>
                        <li class="page-item"><a class="page-link " href="javascript:void()"
                            onclick="myfunction(<?php echo $b2; ?>)">
                            <?php echo $b2; ?>
                          </a></li>
                        <?php } ?>
                        <?php if ($b3 > 0) { ?>
                        <li class="page-item active"><a class="page-link " href="javascript:void()"
                            onclick="myfunction(<?php echo $b3; ?>)">
                            <?php echo $b3; ?>
                          </a></li>
                        <?php } ?>
                        <?php if ($b4 <= $tp) { ?>
                        <li class="page-item"><a class="page-link " href="javascript:void()"
                            onclick="myfunction(<?php echo $b4; ?>)">
                            <?php echo $b4; ?>
                          </a></li>
                        <?php } ?>
                        <?php if ($b5 <= $tp) { ?>
                        <li class="page-item"><a class="page-link " href="javascript:void()"
                            onclick="myfunction(<?php echo $b5; ?>)">
                            <?php echo $b5; ?>
                          </a></li>
                        <?php } ?>
                        <?php if ($npage <= $tp) { ?>
                        <li class="page-item"><a class="page-link " href="javascript:void()"
                            onclick="myfunction(<?php echo $npage; ?>)"><i class="icon-chevron-right"></i></a></li>
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
    </div>
  </div>
</div>
</div>
<?php $this->load->view('web/unimbl-filter'); ?>
<div id="back2top"><i class="pe-7s-angle-up"></i></div>
<div class="ps-site-overlay"></div>
<div id="loader-wrapper">
  <div class="loader-section section-left"></div>
  <div class="loader-section section-right"></div>
</div>

<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header w-100">
        <h5 class="modal-title row" id="exampleModalLongTitle" style="width: inherit;">
          <div class="ps-product__thumbnail universitylogo col-md-2 col-sm-2 col-xs-2 col-3" style="padding-right:0px">
            <img id="uniImgTag" src="" class="img-responsive" alt=""
              style="width: 80px; height:80px; box-shadow:rgb(0 0 0 / 12%) 0 1px 3px, rgb(0 0 0 / 24%) 0 1px 2px; border-radius: 50%; display:flex;align-items:center; padding:5px; float:left; margin:auto">
          </div>
          <div class="ps-product__container col-md-10 col-sm-10 col-xs-9  col-9 modal-text-p">
            <span id="UniNameSpan"></span>
            <p>Please fill in this form so we may contact you.</p>
          </div>
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span
            aria-hidden="true">&times;</span> </button>
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
  function setModelAttr(img, name) {
    //alert(img + ' , ' + name);
    var imgpath = '<?php echo base_url(); ?>' + img;
    $('#UniNameSpan').text(name);
    $('#uniImgTag').attr('src', imgpath);
  }

  function myfunction(id1) {
    if (id1 != '') {
      window.open('<?php echo base_url($this->uri->uri_string() . '/?pn='); ?>' + id1, '_SELF');
    }
  }

  function removeAppliedFilter(a) {
    if (a != "") {
      $.ajax({
        url: "<?php echo base_url(); ?>Welcome/removeAppliedFilter",
        method: "POST",
        data: {
          value: a
        },
        success: function(b) {
          if (a == "unifilter_instype") {
            window.location.replace("<?php echo base_url(); ?>universities")
          } else {
            location.reload(true)
          }
        }
      })
    }
  };
</script>
@endsection
