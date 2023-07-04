@extends('front.layouts.main')
@push('seo_meta_tag')
@include('front.layouts.static_page_meta_tag')
@endpush
@section('main-section')
<?php
  $infra = 0;



  $infrac = 0;



  $fac = 0;



  $facc = 0;



  $plc = 0;



  $plcc = 0;



  $hostel = 0;



  $hostelc = 0;



  $ovrall = 0;



  $ovrallc = 0;



  foreach ($reviews as $row) {



    $infra = $infra + $row->infra_rating;



    $infrac = $infrac + 1;







    $fac = $fac + $row->faculty_rating;



    $facc = $facc + 1;







    $plc = $plc + $row->placement_rating;



    $plcc = $plcc + 1;







    $hostel = $hostel + $row->hostel_rating;



    $hostelc = $hostelc + 1;







    $ovrall = $ovrall + $row->rating;



    $ovrallc = $ovrallc + 1;
  }



  $avrg_infra = round($infra / $infrac);



  $avrg_fac = round($fac / $facc);



  $avrg_plc = round($plc / $plcc);



  $avrg_hostel = round($hostel / $hostelc);



  $avrg_ovrall = $ovrall / $ovrallc;



?>
<div class="ps-breadcrumb">
  <div class="ps-container">
    <ul class="breadcrumb bread-scrollbar">
      <li><a href="index.php">Home</a></li>
      <li><a href="#">
          <?php echo $university->name; ?>
        </a></li>
      <li>Review</li>
    </ul>
  </div>
</div>
<?php $this->load->view('web/uniprofile'); ?>
<div class="ps-page--product ps-page--product-box">
  <div class="container-fluid">
    <?php $this->load->view('web/university-profile-tabs'); ?>
    <div class="row">
      <div class="col-lg-12">
        <?php //$this->load->view('web/uheader');
        ?>
        <!-- header background section ends -->
        <div class="ps-page--product ps-page--product-box">
          <div class="container-fluid">
            <div class="row">
              <div class="col-lg-12">
                <div class="ps-product--detail ps-product--box">
                  <div class="ps-tab-root">
                    <div class="row">
                      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                        <div class="ps-product__box">
                          <div class="ps-tabs">
                            <div class="ps-tab active">
                              <div class="ps-document">
                                <p>alt Disclaimer: The views expressed here are those of third party reviewers, and not
                                  of example.my.
                                  <hr>
                                </p>
                                <table class="table ps-table ps-table--vendor-status">
                                  <tbody>
                                    <tr>
                                      <td>Infrastructure</td>
                                      <td>
                                        <div class="ps-product__rating">
                                          <select class="ps-rating" data-read-only="true">
                                            <?php
                                            for ($i = 0; $i < $avrg_infra; $i++) {



                                            ?>
                                            <option value="1"></option>
                                            <?php } ?>
                                            <?php
                                            for ($i = 0; $i < 5 - $avrg_infra; $i++) {



                                            ?>
                                            <option value="2"></option>
                                            <?php } ?>
                                          </select>
                                        </div>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td>Faculty</td>
                                      <td>
                                        <div class="ps-product__rating">
                                          <select class="ps-rating" data-read-only="true">
                                            <?php
                                            for ($i = 0; $i < $avrg_fac; $i++) {



                                            ?>
                                            <option value="1"></option>
                                            <?php } ?>
                                            <?php
                                            for ($i = 0; $i < 5 - $avrg_fac; $i++) {



                                            ?>
                                            <option value="2"></option>
                                            <?php } ?>
                                          </select>
                                        </div>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td>Placements</td>
                                      <td>
                                        <div class="ps-product__rating">
                                          <select class="ps-rating" data-read-only="true">
                                            <?php
                                            for ($i = 0; $i < $avrg_plc; $i++) {



                                            ?>
                                            <option value="1"></option>
                                            <?php } ?>
                                            <?php
                                            for ($i = 0; $i < 5 - $avrg_plc; $i++) {



                                            ?>
                                            <option value="2"></option>
                                            <?php } ?>
                                          </select>
                                        </div>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td>Hostel</td>
                                      <td>
                                        <div class="ps-product__rating">
                                          <select class="ps-rating" data-read-only="true">
                                            <?php
                                            for ($i = 0; $i < $avrg_hostel; $i++) {



                                            ?>
                                            <option value="1"></option>
                                            <?php } ?>
                                            <?php
                                            for ($i = 0; $i < 5 - $avrg_hostel; $i++) {



                                            ?>
                                            <option value="2"></option>
                                            <?php } ?>
                                          </select>
                                        </div>
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                                <div class="ps-block__header text-center">
                                  <h3>
                                    <?php echo number_format((float)$avrg_ovrall, 2, '.', ''); ?> out of 5 stars
                                  </h3>
                                  <select class="ps-rating" data-read-only="true">
                                    <?php
                                    for ($i = 0; $i < round($avrg_ovrall); $i++) {



                                    ?>
                                    <option value="1"></option>
                                    <?php } ?>
                                    <?php
                                    for ($i = 0; $i < 5 - round($avrg_ovrall); $i++) {



                                    ?>
                                    <option value="2"></option>
                                    <?php } ?>
                                  </select>
                                  <span>Overall Rating</span>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <br>
                        <div class="ps-product__content ps-tab-root">
                          <div class="row">
                            <?php
                            foreach ($reviews as $row) {



                            ?>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                              <div class="ps-product__box">
                                <div id="admissionrequirements">
                                  <h4>
                                    <?php if ($row->anonymous == 1) {
                                          echo "Anonymous User";
                                        } else {
                                          echo $row->name;
                                        } ?>
                                  </h4>
                                  <div class="ps-product__meta">
                                    <p>
                                      <?php echo date("M d, Y", strtotime($row->created_on)); ?>
                                    </p>
                                    <div class="ps-product__rating">
                                      <select class="ps-rating" data-read-only="true">
                                        <?php
                                          for ($i = 0; $i < $row->rating; $i++) {



                                          ?>
                                        <option value="1"></option>
                                        <?php } ?>
                                        <?php
                                          for ($i = 0; $i < 5 - $row->rating; $i++) {



                                          ?>
                                        <option value="2"></option>
                                        <?php } ?>
                                      </select>
                                    </div>
                                  </div>
                                  <h5>
                                    <?php echo $row->review_title; ?>
                                  </h5>
                                  <p>
                                    <?php echo $row->description; ?>
                                  </p>
                                  <hr>
                                </div>
                              </div>
                            </div>
                            <?php } ?>
                          </div>
                        </div>
                        <br>
                      </div>
                      <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 col-12 ">
                        <div class="ps-product__box mb-20">
                          <aside class="">
                            <?php $this->load->view('web/side-form.php'); ?>
                          </aside>
                          <div class="ps-block__slider">
                            <div class="ps-carousel--product-box owl-slider" data-owl-auto="true" data-owl-loop="true"
                              data-owl-speed="7000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="true"
                              data-owl-item="1" data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1"
                              data-owl-item-lg="1" data-owl-duration="500" data-owl-mousedrag="off"><a href="#"><img
                                  src="img/slider/home-3/healthy-1.jpg" alt=""></a><a href="#"><img
                                  src="img/slider/home-3/healthy-2.jpg" alt=""></a><a href="#"><img
                                  src="img/slider/home-3/healthy-3.jpg" alt=""></a></div>
                          </div>
                        </div>
                        <div class="ps-product__box mb-20 shadow" style="padding:5px!important">
                          <div class="row">
                            <div class="col-12 text-center">
                              <img src="<?php echo base_url('assets/web/'); ?>img/ieltsAd.jpg"
                                alt="IELTS Online Coaching Apply">
                            </div>
                          </div>
                          <div class="row" style="margin-top:5px">
                            <div class="col-12 text-center"><a class="ps-btn w-100"
                                style="background:#0047ab; font-size:13px!important; padding:7px 0px!important"
                                href="https://www.britannicaoverseas.com/ielts-online-coaching/" target="_blank"
                                rel="noopener noreferrer">APPLY NOW</a></div>
                          </div>
                        </div>
                        <div class="ps-product__box mb-20 shadow" style="padding:5px!important">
                          <div class="row">
                            <div class="col-12 text-center">
                              <img src="<?php echo base_url('assets/web/'); ?>img/oetAd.jpg"
                                alt="OET Online Coaching Apply">
                            </div>
                          </div>
                          <div class="row" style="margin-top:5px">
                            <div class="col-12 text-center"><a class="ps-btn w-100"
                                style="background:#0047ab; font-size:13px!important; padding:7px 0px!important"
                                href="https://www.britannicaoverseas.com/oet-exam/" target="_blank"
                                rel="noopener noreferrer">APPLY NOW</a></div>
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
    <div id="back2top"><i class="pe-7s-angle-up"></i></div>
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
  </div>
</div>
@endsection
