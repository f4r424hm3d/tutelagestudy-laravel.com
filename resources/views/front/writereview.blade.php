@extends('front.layouts.main')
@push('seo_meta_tag')
@include('front.layouts.static_page_meta_tag')
@endpush
@section('main-section')
<style>
  .alert {
    padding: 20px;
    background-color:#4CAF50;
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
  .ps-form--review .form-group__rating label {
    display:flex
  }
</style>
<div class="ps-breadcrumb">
  <div class="ps-container">
    <ul class="breadcrumb bread-scrollbar">
      <li><a href="">Home</a></li>
      <li><a href="<?php echo base_url($this->uri->segment(1)); ?>"><?php echo ucwords(str_replace('-', ' ', $this->uri->segment(1))); ?></a></li>
      <li>Curtin University, Geremany</li>
    </ul>
  </div>
</div>
<!-- header background section ends -->
<div class="ps-page--product ps-page--product-box">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <div class="ps-product--detail ps-product--box">
          <div class="ps-tab-root">
            <div class="row">
              <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12">
                <div class="ps-product__box">
                  <div class="ps-tabs">
                    <div class="ps-tab active" >
                      <div class="ps-document">
                        <h5>Your Review of Your Institution Experience Can Help Others</h5>
                        <p>Thank you for writing a review of your experience at <span class="b">Curtin University</span>, Malaysia.Your honest feedback can help future students make the right decision about their choice of institution and course.
                        <hr>
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
                <?php if($this->session->flashdata('smsg')){ ?>
                <div class="alert"> <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> <strong><?php echo $this->session->flashdata('smsg'); ?></strong> </div>
                <?php } ?>
                <br>
                <div class="ps-product__content ps-tab-root">
                  <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                      <div class="ps-product__box">
                        <div id="admissionrequirements">
                          <h4 style="color: red;">1.Rate the University</h4>
                          <form class="ps-form--review" method="post" action="<?php echo base_url('Welcome/addReview') ?>">
                            <input type="hidden" name="uname" value="<?php echo $this->uri->segment(1); ?>">
                            <h4>Submit Your Review</h4>
                            <p>Your email address will not be published. Required fields are marked<sup>*</sup></p>
                            <div class="form-group form-group__rating">
                              <label class="col-sm-4 pl-0">
                              Do you want to post anonymously?
                              <div class="ps-variant ps-variant--size"><span class="ps-variant__tooltip">Choose 'Yes' if you do not want your name to appear with your review.</span>&nbsp;<i class="fa fa-info-circle"></i></div>
                              </label>
                              <label class="radio-inline text-center">
                                <input type="radio" name="anonymous" value="1" checked />
                                &nbsp;Yes </label>
                              <label class="radio-inline text-center">
                                <input type="radio" name="anonymous" value="0">
                                &nbsp;No </label>
                            </div>
                            <div class="form-group form-group__rating">
                              <label class="col-sm-4 pl-0">
                              Overall Rating
                              <div class="ps-variant ps-variant--size"><span class="ps-variant__tooltip">Your general experience in the university.</span>&nbsp;<i class="fa fa-info-circle"></i></div>
                              </label>
                              <select name="rating" class="ps-rating" data-read-only="false" required="">
                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                              </select>
                            </div>
                            <div class="form-group form-group__rating">
                              <label class="col-sm-4 pl-0">
                              Infrastructure
                              <div class="ps-variant ps-variant--size"><span class="ps-variant__tooltip">Your general experience in the university.</span>&nbsp;<i class="fa fa-info-circle"></i></div>
                              </label>
                              <select name="infra_rating" class="ps-rating" data-read-only="false" required="">
                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                              </select>
                            </div>
                            <div class="form-group form-group__rating">
                              <label class="col-sm-4 pl-0">
                              Faculty
                              <div class="ps-variant ps-variant--size"><span class="ps-variant__tooltip">The quality of the teaching methods in class e.g. lectures, seminars, and the engagement between lecturer and student.</span>&nbsp;<i class="fa fa-info-circle"></i></div>
                              </label>
                              <select name="faculty_rating" class="ps-rating" data-read-only="false" required="">
                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                              </select>
                            </div>
                            <div class="form-group form-group__rating">
                              <label class="col-sm-4 pl-0">
                              Placements
                              <div class="ps-variant ps-variant--size"><span class="ps-variant__tooltip">Your general experience in the university.</span>&nbsp;<i class="fa fa-info-circle"></i></div>
                              </label>
                              <select required name="placement_rating" class="ps-rating" data-read-only="false" required="">
                              <option value="0">0</option>
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                              </select>
                            </div>
                            <div class="form-group form-group__rating">
                              <label class="col-sm-4 pl-0">
                              Hostel
                              <div class="ps-variant ps-variant--size"><span class="ps-variant__tooltip">Your general experience in the university.</span>&nbsp;<i class="fa fa-info-circle"></i></div>
                              </label>
                              <select required name="hostel_rating" class="ps-rating" data-read-only="false" required="">
                              <option value="0">0</option>
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                              </select>
                            </div>
                            <div class="row">
                              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12  ">
                                <div class="form-group mb-2">
                                  <label class="col-sm-12 pl-0 mb-0">
                                  Review Title*
                                  <div class="ps-variant ps-variant--size"><span class="ps-variant__tooltip">Give your review title</span>&nbsp;<i class="fa fa-info-circle"></i></div>
                                  <br />
                                  <span style="font-size:11px;color: red;">(Max. 60 Characters)</span>
                                  </label>
                                </div>
                              </div>
                              <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12  ">
                                <div class="form-group">
                                  <textarea name="review_title" class="form-control" placeholder="How would you sum up your experience studying at this institution in a sentence?" required=""></textarea>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12  ">
                                <div class="form-group mb-2">
                                  <label class="col-sm-12 pl-0 mb-0">
                                  Write a Review*
                                  <div class="ps-variant ps-variant--size"><span class="ps-variant__tooltip">Give your review</span>&nbsp;<i class="fa fa-info-circle"></i></div>
                                  <br />
                                  <span style="font-size:11px;color: red;">(Max. 250 Characters)</span>
                                  </label>
                                </div>
                              </div>
                              <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12  ">
                                <div class="form-group">
                                  <textarea required name="description" class="form-control" rows="4" placeholder="Share your experience at this institution from the time you first enrolled to its various course subjects, student lifestyle, teaching and facilities."></textarea>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12  ">
                                <div class="form-group mb-2">
                                  <label class="col-sm-12 pl-0 mb-0"> Name </label>
                                </div>
                              </div>
                              <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12">
                                <div class="form-group">
                                  <input type="text" name="name" class="form-control" placeholder="Enter your name" required="">
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12  ">
                                <div class="form-group mb-2">
                                  <label class="col-sm-12 pl-0 mb-0"> Email </label>
                                </div>
                              </div>
                              <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12  ">
                                <div class="form-group">
                                  <input type="email" name="email" class="form-control" placeholder="Enter your email" required="">
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12  ">
                                <div class="form-group mb-2">
                                  <label class="col-sm-12 pl-0 mb-0"> Mobile </label>
                                </div>
                              </div>
                              <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12">
                                <div class="form-group">
                                  <input type="number" name="mobile" class="form-control" placeholder="Enter your mobile" required="">
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-sm-12">
                                <div class="form-group submit">
                                  <button style="float:right!important;" class="ps-btn" type="submit">Submit Review</button>
                                </div>
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <br>
              </div>
              <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 col-12 ">
                <div class="ps-product__box">
                  <?php $this->load->view('web/side-form');?>
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
<div class="ps-search" id="site-search"> <a class="ps-btn--close" href="#"></a>
  <div class="ps-search__content">
    <form class="ps-form--primary-search" action="#" method="post">
      <input class="form-control" type="text" placeholder="Search for...">
      <button><i class="aroma-magnifying-glass"></i></button>
    </form>
  </div>
</div>
@endsection
