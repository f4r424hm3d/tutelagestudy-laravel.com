@extends('front.layouts.main')
@push('seo_meta_tag')
@include('front.layouts.dynamic_page_meta_tag')
@endpush
@section('main-section')
<style>
  .pagination li.active span {
    background-color: #117888!important;
    color: #fff;
  }
</style>
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

  .ps-form--quick-search a {
    background-color: #000000;
    color: #fff;
    border: none;
    font-weight: 700;
    padding: 12px 24px;
    border-radius: 4px;
    margin-left: 10px;
  }

  .ps-form--quick-search a:hover {
    background-color: #117888;
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
      <li><a href="<?php echo url('/'); ?>">Home</a></li>
      <li>Medical Universities</li>
    </ul>
  </div>
</div>
<?php if (isset($_SESSION['unifilter_destination'])) { ?>
  <!-- top filter start -->
  <div class="ps-section--default ps-home-blog">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
          <div class="ps-block--recent-viewed">
            <div class="ps-block__header">
              <h4>TOP Medical UNIVERSITIES/COLLEGES IN Abroad</h4>
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
              <?php if (isset($_SESSION['unifilter_destination'])) { ?>
                <a href="javascript:void(0)" onclick="removeAppliedFilter('unifilter_destination')"><?php echo $_SESSION['unifilter_destination']??''; ?> <span>×</span></a>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php } ?>
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
              @include('front.filter-medical-universities')
              <div class="ps-layout__right">
                <div class="ps-shopping ps-tab-root">
                  <?php if (session()->has('smsg')) { ?>
                    <div class="alert"> <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> <strong><?php echo session()->get('smsg'); ?></strong> </div>
                  <?php } ?>
                  <div class="ps-shopping__header">
                    <p><?php echo $pageHeadingTitle; ?></p>
                  </div>

                  <div class="row">
                    <div class="col-md-8">
                      <div class="header__center">
                        <form class="ps-form--quick-search" method="get">
                          <input class="form-control" name="search" type="text" placeholder="Search Universities" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>" id="input-search" style="background:#fff; height: 45px;">
                          <button>Search</button>
                          <a href="<?php echo url('medical-universities/'); ?>">Reset</a>
                        </form>
                      </div>
                    </div>
                  </div>
                  <br>
                  <div class="ps-tabs">
                    <?php
                    if ($total > 0) {
                      foreach ($rows as $key) {
                    ?>
                        <div class="ps-tab active" id="tab-2">
                          <div>
                            <div class="ps-product ps-product--wide">
                              <div class="ps-product__thumbnail universitylogo text-center col-md-2 col-sm-12 col-xs-12"><img src="<?php echo url($key->imgpath); ?>" alt="<?php echo $key->name; ?>" loading="lazy"> </div>
                              <div class="ps-product__container col-md-7 col-sm-12 col-xs-12">
                                <div class="ps-product__content">
                                  <a class="ps-product__title b" href="<?php echo url($key->country_slug . '/' . $key->uname); ?>/">
                                    <h5><?php echo $key->name; ?></h5>
                                  </a>
                                  <p>
                                    <i class="fa fa-university"></i><span> <?php echo $key->getInstType->type??'N/A'; ?></span>
                                  </p>
                                </div>
                              </div>
                              <div class="ps-product__container col-md-3 col-sm-12 col-xs-12 text-center">
                                <p style="margin:0px">
                                  <!-- <a target="_blank" class="ps-btn w-100" style="background:#0047ab" href="<?php echo url($key->uname . '/write-review'); ?>"><i class=" fa fa-comments"></i> Write review</a> -->

                                  <a onclick="setModelAttr('<?php echo $key->imgpath ?>','<?php echo $key->name ?>')" class="ps-btn mt-2 w-100" href="javascript:void()" data-toggle="modal" data-target="#exampleModalLong"><i class="icon-question-circle"></i> Request Info</a>
                                </p>
                              </div>
                            </div>
                          </div>
                        </div>
                      <?php
                      }
                    } else {
                      ?>
                      <div class="ps-shopping__header">
                        <div class="row">
                          <div class="header">
                            <span>No data found</span>
                          </div>
                        </div>
                      </div>
                    <?php } ?>

                    <div class="ps-pagination">
                      {!! $rows->links('pagination::bootstrap-4') !!}
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
@include('front.unimbl-filter')
<div id="back2top"><i class="pe-7s-angle-up"></i></div>
<div class="ps-site-overlay"></div>
<div id="loader-wrapper">
  <div class="loader-section section-left"></div>
  <div class="loader-section section-right"></div>
</div>

<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header w-100">
        <h5 class="modal-title row" id="exampleModalLongTitle" style="width: inherit;">
          <div class="ps-product__thumbnail universitylogo col-md-2 col-sm-2 col-xs-2 col-3" style="padding-right:0px">
            <img id="uniImgTag" src="" class="img-responsive" alt="" style="width: 80px; height:80px; box-shadow:rgb(0 0 0 / 12%) 0 1px 3px, rgb(0 0 0 / 24%) 0 1px 2px; border-radius: 50%; display:flex;align-items:center; padding:5px; float:left; margin:auto">
          </div>
          <div class="ps-product__container col-md-10 col-sm-10 col-xs-9  col-9 modal-text-p">
            <span id="UniNameSpan"></span>
            <p>Please fill in this form so we may contact you.</p>
          </div>
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
      </div>
      <div class="modal-body">
        <form class="ps-form--visa" action="{{ url('inquiry/submit-university-inquiry') }}" method="post">
          @csrf
          <input type="hidden" name="page_url" value="<?php echo $page_url; ?>">
          <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
              <div class="form-group">
                <input type="text" name="name" id="name" class="form-control" placeholder="Enter Name" value="{{ old('name')??'' }}" required>
                @error('name')
                  {{ '<span class="err-clr">' . $message . '</span>' }}
                @enderror
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
              <div class="form-group">
                <input type="email" class="form-control" name="email" id="email" value="{{ old('email')??'' }}" placeholder="Enter Email" required>
                @error('email')
                  {{ '<span class="err-clr">' . $message . '</span>' }}
                @enderror
              </div>
            </div>
            <div class="col-4 col-lg-4 col-md-4 col-sm-4 col-xs-6" style="padding-right:0px">
              <div class="form-group">
                <select class="form-control" name="c_code" id="c_code" required>
                  <option value="">Select Code</option>
                  <?php
                  foreach ($countries as $row) {
                  ?>
                    <option value="<?php echo $row->phonecode; ?>" <?php echo old('c_code') == $row->phonecode ? 'Selected' : ''; ?>> +<?php echo $row->phonecode; ?> (<?php echo $row->name; ?>)</option>
                  <?php } ?>
                </select>
                @error('c_code')
                  {{ '<span class="err-clr">' . $message . '</span>' }}
                @enderror
              </div>
            </div>
            <div class="col-8 col-lg-8 col-md-8 col-sm-8 col-xs-6">
              <div class="form-group">
                <input type="text" class="form-control u-ltr" placeholder="Enter Mobile Number" data-error="Please enter a valid phone number" name="mobile" id="mobile" value="<?php echo old('mobile'); ?>" required>
                @error('mobile')
                  {{ '<span class="err-clr">' . $message . '</span>' }}
                @enderror
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
              <div class="form-group">
                <select class="form-control" name="nationality" id="nationality" required>
                  <option value="">Select Your Country</option>
                  <?php
                  foreach ($countries as $row) {
                  ?>
                    <option value="<?php echo $row->name; ?>" <?php echo old('nationality') == $row->name ? 'Selected' : ''; ?>> <?php echo $row->name; ?></option>
                  <?php } ?>
                </select>
                @error('nationality')
                  {{ '<span class="err-clr">' . $message . '</span>' }}
                @enderror
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
              <div class="form-group">
                <select class="form-control" name="destination" id="destination" required>
                  <option value="">Select Destination</option>
                  <?php
                  foreach ($destinations as $row) {
                  ?>
                    <option value="<?php echo $row->getDestination->page_name; ?>" <?php echo old('destination') == $row->getDestination->page_name ? 'Selected' : ''; ?>><?php echo $row->getDestination->page_name; ?></option>
                  <?php } ?>
                </select>
                @error('destination')
                  {{ '<span class="err-clr">' . $message . '</span>' }}
                @enderror
              </div>
            </div>
            {{-- <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
              <div class="form-group">
                <div class="g-recaptcha" data-sitekey="<?php echo recaptcha_site_key; ?>" required></div>
              </div>
            </div> --}}
            <div class="form-group">
              <div class="ps-checkbox pl-20">
                <input class="form-control " type="checkbox" id="remember-me" name="remember-me" value checked disabled>
                <label for="remember-me">By submitting this form, I agree to the <a href="<?php echo url('term-and-condition/'); ?>" style="color: blue;" target="_blank">terms & conditions</a></label>
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

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
<script>
  function removeAppliedFilter(a) {
    if (a != "") {
      $.ajax({
        url: "<?php echo url('university/remove-filter'); ?>",
        method: "get",
        data: {
          value: a
        },
        success: function(b) {
          if (a == "unifilter_destination") {
            window.location.replace("<?php echo url('medical-universities/'); ?>");
          } else {
            location.reload(true);
          }
        }
      });
    }
  }

  function setModelAttr(img, name) {
    //alert(img + ' , ' + name);
    var imgpath = "<?php echo url('/'); ?>" + img;
    $('#UniNameSpan').text(name);
    $('#uniImgTag').attr('src', imgpath);
  }
</script>
@endsection
