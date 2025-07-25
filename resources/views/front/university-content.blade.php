@extends('front.layouts.main')
@push('seo_meta_tag')
  @include('front.layouts.static_page_meta_tag')
@endpush
@section('main-section')
  <style>
    .info-box {
      padding: 20px 5px;
      border: 1px solid #f2f2f2;
      text-align: center;
      transition: all ease 0.4s;
    }

    .info-box .icon {
      width: 50px;
      height: 50px;
      border-radius: 100%;
      font-size: 25px;
      line-height: 50px;
      color: #045dab;
      background: #e2f3fc;
      margin: auto auto 5px auto
    }

    .info-box .text {
      font-size: 13px;
    }

    .info-box .text span {
      color: #c01874;
    }

    .info-box:hover {
      background: #045dab;
      border: 1px solid #045dab;
      transition: all ease 0.4s;
    }

    .info-box:hover .icon {
      color: #045dab;
      background: #fff;
    }

    .info-box:hover .text {
      font-size: 13px;
      color: #fff
    }

    .info-box:hover .text span {
      color: #fff;
    }

    .modal-header {
      border-bottom: 1px solid #dee2e6 !important
    }

    .get-detail {
      display: flex;
      align-items: center;
      justify-content: center;
      text-transform: uppercase
    }

    .get-detail a {
      margin-left: 10px;
      font-size: 13px !important
    }

    .get-detail p {
      font-size: 13px !important
    }

    .ps-block--categories-tabs .ps-tab-list a span {
      background: none;
      -webkit-text-fill-color: #000 !important;
    }

    .ps-block--categories-tabs .ps-tab-list a:hover {
      box-shadow: none !important
    }

    .tbl-cntnt ul {
      list-style: inside;
      display: flow-root;
      padding-left: 5px
    }

    .tbl-cntnt ul li {
      width: 50%;
      float: left;
      line-height: 24px
    }

    .tbl-cntnt ul li a {
      color: #c01874;
    }

    .tbl-cntnt ul li a:hover {
      text-decoration: underline;
      color: #348fd6;
    }

    .show-more-box {
      position: relative;
    }

    .show-more-box .title {
      background: #f8f8f8;
      padding: 10px
    }

    .show-more-box .text {
      margin-bottom: 5px;
      position: relative;
      display: block;
    }

    .show-more-box .show-more {
      background: #f8f8f8;
      color: #045dab;
      position: relative;
      padding: 7px;
      text-align: center;
      cursor: pointer;
      margin: 0px -15px -16px -15px;
      font-weight: 500;
    }

    .show-more-box .show-more:hover {
      background: #c01874;
      color: #fff;
    }

    .show-more-box .show-more-height {
      height: 270px;
      overflow: hidden;
    }

    .show-more-box ul {
      background: white;
      padding-left: 10px
    }

    .show-more-box ul li {
      list-style: none;
    }

    .show-more-box ul li::before {
      content: "\2B9E";
      color: #045dab;
      padding-right: 4px
    }

    .show-more-box p {
      font-size: 16px;
    }

    .show-more-box li {
      font-size: 16px;
    }

    .fancy-btn {
      position: relative;
      display: inline-block;
      overflow: hidden;
      transition: .4s;
      padding: 12px 20px;
      text-align: center;
      border: solid 1px #045dab;
      font-size: 15px;
      font-weight: 600;
      text-decoration: none;
      color: #fff;
      background-color: #045dab;
      letter-spacing: 1px;
      margin-bottom: 10px
    }

    .fancy-btn:before {
      content: "";
      position: absolute;
      padding: .1em;
      margin: 0 1em 0 0;
      top: 0;
      right: 100%;
      height: 100%;
      width: 120%;
      background-color: #fff;
      transform: skewX(-30deg);
      transition: inherit
    }

    .fancy-btn:hover:before {
      right: -20%
    }

    .fancy-btn:hover {
      color: #045dab !important
    }

    .fancy-btn span {
      position: relative
    }

    .btn-full {
      width: 100%;
    }

    .show-more-box .read-more {
      background: #f8f8f8;
      color: #045dab;
      width: 100%;
      display: block;
      padding: 7px;
      text-align: center;
      cursor: pointer;
      font-weight: 500;
      margin-bottom: -5px;
    }

    .show-more-box .read-more:hover {
      background: #c01874;
      color: #fff;
    }

    .ps-product__content h2 {
      background: #f8f8f8;
      padding: 10px;
      font-size: 20px;
      font-weight: 400
    }

    .ps-product__content h2 small {
      font-size: 15px;
      color: #000;
      font-weight: 400
    }

    .ps-product__content h1 {
      background: #f8f8f8;
      padding: 10px;
      font-size: 20px;
      font-weight: 400
    }

    .ps-product__content h2 {
      background: #f8f8f8;
      padding: 10px;
      font-size: 20px;
      font-weight: 400
    }

    .ps-product__content h3 {
      background: #f8f8f8;
      padding: 10px;
      font-size: 20px;
      font-weight: 400
    }

    .ps-section--default h3 {
      background: #f8f8f8;
      padding: 10px;
      font-size: 20px;
      font-weight: 400
    }

    @media screen and (max-width:767px) {
      .get-detail {
        display: inline-block;
        text-align: center
      }

      .get-detail p {
        margin-bottom: 10px !important
      }

      .get-detail a {
        margin-left: 0px;
        margin-bottom: 20px
      }

      .ps-carousel--nav {
        margin-bottom: 0px;
        padding-bottom: 0px
      }

      .ps-carousel--nav .owl-nav>* i {
        font-size: 22px !important
      }

      .ps-carousel--nav .owl-nav {
        display: block !important;
      }

      .tbl-cntnt ul li {
        width: 100% !important;
        float: none !important
      }

      .ps-block--categories-tabs .ps-block__header {
        padding: 0 30px;
      }

      .ps-block--categories-tabs .ps-block__header .ps-tab-list a.active {
        -webkit-text-fill-color: #c01874 !important;
        border-bottom: 2px solid #c01874 !important;
      }

      .ps-block--categories-tabs .ps-block__header .ps-tab-list a:hover {
        border-bottom: 2px solid #c01874 !important;
      }

      .show-more-box .title {
        font-size: 20px !important;
      }

      .fancy-btn {
        padding: 8px 10px;
        font-size: 14px
      }
    }
  </style>
  <div class="ps-breadcrumb">
    <div class="ps-container">
      <ul class="breadcrumb bread-scrollbar">
        <li><a href="<?php echo base_url(); ?>">Home</a></li>
        <li><a href="<?php echo base_url('medical-universities/'); ?>">Universities</a></li>
        <li>
          <?php echo $university->name; ?>
        </li>
        <li>
          <?php echo $ucont->tab; ?>
        </li>
      </ul>
    </div>
  </div>
  <?php $this->load->view('web/uniprofile'); ?>
  <div class="ps-page--product ps-page--product-box">
    <div class="container-fluid mplr0">
      <?php $this->load->view('web/university-profile-tabs'); ?>
      <div class="row">
        <div class="col-lg-12">
          <div class="ps-product--detail ps-product--box">
            <?php //$this->load->view('web/uheader');
            ?>
            <div class="ps-tab-root" style=" margin-top:10px">
              <div class="row">
                <div class="col-xl-9 col-lg-9 col-md-8 col-sm-12 col-12">

                  <div class="mb-20">
                    <a href="https://www.britannicaoverseas.com/ielts-exam/" target="_blank"
                      rel="noopener noreferrer"><img
                        src="https://www.germanyadmission.com/assets/web/img/ads/ielts-coaching-banner.jpg" height="auto;"
                        alt="ielts online coaching" class="shadow"></a>
                  </div>

                  <div class="ps-product__box mb-20">
                    <div class="show-more-box">
                      <div class="text show-more-height">
                        <?php echo $ucont->p; ?>
                      </div>
                      <div class="show-more">(Show More)</div>
                    </div>
                  </div>
                  <br>
                </div>
                <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 ">
                  <div class="ps-product__box mb-20 shadow">
                    <div class="row">
                      <div class="col-12 text-center">
                        <h3 class="widget-title">Get Exam Alerts and Guidance</h3>
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                          viewBox="0 0 444 328.381" style="margin-top:-30px">
                          <defs>
                            <clipPath id="clip-path">
                              <path id="Path_13046" data-name="Path 13046"
                                d="M4666.839-144.39c3.015-12.765,4.578-25.826-2.254-34.521-3.085-3.927-8.582-6.662-13.081-8.606-8.774-3.792-17.745-8.89-27.137-10.543-9.9-1.743-20.917-2.817-30.786-.325-6.269,1.583-12.134,4.513-17.739,7.674-4.864,2.742-10.832,5.1-13.193,10.208a347.039,347.039,0,0,0-15.013,38.225c-3.524,10.841-7.393,22.2-1.84,33.191,1.8,3.56,4.414,6.608,6.472,10.009a24.362,24.362,0,0,1,3.448,11.719c.686,9.972.419,19.974.391,29.96-.008,2.878.03,5.87,1.29,8.457,2.484,5.1,9.477,2.462,14.34,2.453,16.029-.028,32.835.378,48.864.351,6.669-.011,11.814-1.989,18.075-.7,5.269,1.083,9.588,1.551,12.116-3.352,2.393-4.641,1.712-8.118,1.969-13.334a329.94,329.94,0,0,1,8.587-60.254C4662.683-129.377,4665.022-136.695,4666.839-144.39Z"
                                transform="translate(-4543.007 199.852)" fill="#ff7900" />
                            </clipPath>
                          </defs>
                          <g id="Group_7106" data-name="Group 7106" transform="translate(8880 19752.379)">
                            <g id="Group_7104" data-name="Group 7104" transform="translate(-12937.789 -19081.48)">
                              <path id="Path_13039" data-name="Path 13039"
                                d="M4678.439-331.59c-12.84,4.543-28.325,4.078-40.008-3.415-11.484-7.366-21.946-12.686-36.076-12.428-12.625.23-23.066,7.055-35.294,8.507-9.7,1.152-19.551-3.076-26.58-9.857-6.862-6.619-11.418-16.711-8.435-25.766,1.562-4.741,4.976-8.653,6.924-13.248,4.493-10.6-7.338-16.994-4.4-28.151,2.5-9.489,12.915-16.257,12.76-26.07-.114-7.183-5.674-12.75-7.632-19.395a26.372,26.372,0,0,1,1.946-20.339,24.3,24.3,0,0,1,11.441-10.215c4.281-1.824,9.063-1.859,12.375-5.6,5.9-6.667,8.063-13.892,16.158-18.767,6.853-4.127,15.9-4.389,23.765-3.668,17.47,1.6,34.426,10.823,44.266,25.508,3.487,5.2,6,10.53,6.091,16.716.1,6.762.093,13.564,4.237,19.313,3.479,4.827,9.062,7.651,14.6,9.829s11.34,3.94,16.2,7.372,8.721,9.029,8.154,14.952c-.475,4.957-3.906,9.264-4.363,14.223-.831,9.016,7.856,15.566,13.211,22.867a35.526,35.526,0,0,1,3.1,36.031c-6.5,13.071-18.3,16.018-30.67,20.937Q4679.333-331.906,4678.439-331.59Z"
                                transform="translate(-300.109 -95.476)" fill="#233862" />
                              <g id="Group_7084" data-name="Group 7084" transform="translate(4284.979 -599.492)">
                                <path id="Path_13040" data-name="Path 13040"
                                  d="M4678.6-471.929a30.294,30.294,0,0,1,14.083-3.813,52.4,52.4,0,0,1,14.629,1.634A45.06,45.06,0,0,1,4731.7-458.15a40.314,40.314,0,0,1,6.716,13.218,50.85,50.85,0,0,1,1.614,14.733c-.049,4.922-.4,9.818-.237,14.661a26.324,26.324,0,0,0,1.13,7.047,11.064,11.064,0,0,0,3.813,5.642,13.288,13.288,0,0,0,6.527,2.25c2.373.281,4.85.3,7.323.626,4.893.658,9.869,1.822,14.132,4.629a12.436,12.436,0,0,1,4.9,5.812,12.464,12.464,0,0,1,.124,7.6c-.74,2.481-2.146,4.562-3.125,6.732a21.408,21.408,0,0,0-1.823,6.888c-.453,4.79.777,9.591,2.48,14.135,1.673,4.58,3.682,9.094,4.855,13.906a29.682,29.682,0,0,1,.885,7.351,23.177,23.177,0,0,1-1.288,7.273,24.9,24.9,0,0,1-8.571,11.738,24.72,24.72,0,0,0,8.245-11.846,24.792,24.792,0,0,0,.064-14.35c-1.226-4.71-3.268-9.171-5.019-13.762-1.777-4.562-3.132-9.5-2.725-14.537a22.55,22.55,0,0,1,1.826-7.278c1.022-2.295,2.387-4.344,3.033-6.591a11.242,11.242,0,0,0-.123-6.822,11.187,11.187,0,0,0-4.444-5.194c-3.974-2.6-8.826-3.748-13.585-4.359-2.388-.311-4.826-.312-7.322-.594a14.59,14.59,0,0,1-7.2-2.487,12.441,12.441,0,0,1-4.278-6.34,27.6,27.6,0,0,1-1.166-7.422c-.144-4.957.231-9.852.3-14.727a49.626,49.626,0,0,0-1.5-14.39,40.644,40.644,0,0,0-6.407-12.9,44.273,44.273,0,0,0-23.71-15.948,51.929,51.929,0,0,0-14.446-1.952A30.129,30.129,0,0,0,4678.6-471.929Z"
                                  transform="translate(-4678.596 475.775)" fill="#73b8d4" />
                              </g>
                              <path id="Path_13041" data-name="Path 13041"
                                d="M4679.522-326.843c.456,11.081-2.113,19.4-12.246,24.883-8.071,4.365-17.734,5.8-26.641,6.016-14.937.368-31.582-3.484-42.755-13.977-2.028-1.9-3.974-4.239-4.121-7.017-.134-2.525,1.256-4.9,1.378-7.43.206-4.26-3.105-7.788-4.586-11.788-1.955-5.282-.626-11.179,1.131-16.531s3.955-10.755,3.691-16.381c-.342-7.3-4.728-13.67-8.239-20.078s-6.274-14.2-3.274-20.864a14.914,14.914,0,0,1,11.51-8.3c5.09-.565,9.664,5.252,12.925,8.456a79.883,79.883,0,0,0,14.535,11.305c7.273,4.413,15.258,7.669,22.1,12.727,4.14,3.06,8.58,7.262,10.557,12.137,2.228,5.494-1.673,10.812,3.043,15.865,3.042,3.26,7.714,4.369,11.393,6.889C4677.8-345.536,4679.163-335.591,4679.522-326.843Z"
                                transform="translate(-332.74 -160.128)" fill="#15274b" />
                              <path id="Path_13042" data-name="Path 13042"
                                d="M4505.141-101.648c10.488-16.162,17.015-36,7.9-54.246-.924-1.85-2.034-3.867-4-4.52-4.219-1.4-9.942.106-13.61,2.258-12.726,7.466-20.513,21.516-27.662,34.017-7.428,12.987-13.878,26.507-21.342,39.473-3.023,5.252-6.076,10.574-7.7,16.413a25.964,25.964,0,0,0,.362,15.975c8.378,21.636,31.417-4.867,38.43-12.873A320.019,320.019,0,0,0,4505.141-101.648Z"
                                transform="translate(-240.85 -323.324)" fill="#ff7900" />
                              <g id="Group_7086" data-name="Group 7086" transform="translate(4235.358 -498.515)">
                                <path id="Path_13043" data-name="Path 13043"
                                  d="M4666.839-144.39c3.015-12.765,4.578-25.826-2.254-34.521-3.085-3.927-8.582-6.662-13.081-8.606-8.774-3.792-17.745-8.89-27.137-10.543-9.9-1.743-20.917-2.817-30.786-.325-6.269,1.583-12.134,4.513-17.739,7.674-4.864,2.742-10.832,5.1-13.193,10.208a347.039,347.039,0,0,0-15.013,38.225c-3.524,10.841-7.393,22.2-1.84,33.191,1.8,3.56,4.414,6.608,6.472,10.009a24.362,24.362,0,0,1,3.448,11.719c.686,9.972.419,19.974.391,29.96-.008,2.878.03,5.87,1.29,8.457,2.484,5.1,9.477,2.462,14.34,2.453,16.029-.028,32.835.378,48.864.351,6.669-.011,11.814-1.989,18.075-.7,5.269,1.083,9.588,1.551,12.116-3.352,2.393-4.641,1.712-8.118,1.969-13.334a329.94,329.94,0,0,1,8.587-60.254C4662.683-129.377,4665.022-136.695,4666.839-144.39Z"
                                  transform="translate(-4543.007 199.852)" fill="#ff9000" />
                                <g id="Group_7085" data-name="Group 7085" transform="translate(0 0)"
                                  clip-path="url(#clip-path)">
                                  <path id="Path_13044" data-name="Path 13044"
                                    d="M4699.4-190.622c3.773-6.348,4.63-14.278-.312-20.393-2.26-2.8-6.257-3.11-9.675-3.173a81.324,81.324,0,0,0-20.023,2.122c-6.245,1.461-12.613,3.935-15.317,10.24a15.771,15.771,0,0,0,1.339,14.39,17.726,17.726,0,0,0,10.845,7.834c7.187,1.711,15.6,1.481,22.458-1.4A23.467,23.467,0,0,0,4699.4-190.622Z"
                                    transform="translate(-4612.689 208.951)" fill="#ff7900" />
                                  <path id="Path_13045" data-name="Path 13045"
                                    d="M4684.511,19.313q-.074-14.682-.148-29.365c-.018-3.408,2.195-24.15-3.106-23.914a3,3,0,0,0-1.561.653c-2.637,1.887-3.993,5.045-5.225,8.044-3.863,9.4-7.108,24.454-15.149,31.037-8.175,6.691-20.745,9.512-30.9,11.118-11.864,1.876-23.922,2.015-35.91,2.745-7.754.472-16.311,1.588-21.4,7.453-3.638,4.189-5.49,10.468-7.433,15.586-1.7,4.472-3.049,9.785.4,13.836a16.065,16.065,0,0,0,5.563,3.83c7.481,3.527,15.66,5.305,23.817,6.671,22.83,3.821,46.1,4.615,69.223,3.513,4.944-.236,10.3-.728,13.951-4.075,2.713-2.49,3.992-6.155,4.9-9.723C4684.619,44.565,4684.574,31.858,4684.511,19.313Z"
                                    transform="translate(-4555 94.675)" fill="#ff7900" />
                                </g>
                              </g>
                              <path id="Path_13047" data-name="Path 13047"
                                d="M4591.828-351.074c-8.747,9-.812,30.988,13.136,27.806,14.988-3.419,12.733-26.777-.82-30.612C4598.858-355.376,4594.643-353.971,4591.828-351.074Z"
                                transform="translate(-336.281 -200.619)" fill="#045be1" />
                              <path id="Path_13048" data-name="Path 13048"
                                d="M4670.687-338.922c8.767,1.118,18,.348,25.831-3.749,9.969-5.217,14.956-14.782,15.163-25.787.149-7.972-1.394-16.281-6.206-22.639-5.232-6.912-14-11.162-17.256-19.2-2.108-5.2-1.6-12.289,2.565-16.316,2.653-2.563,4.727-5.453,4.387-9.3-.5-5.653-4.636-11.084-9.256-14.137-6.773-4.477-15.2-6.115-23.125-7.122-5.367-.682-10.716-2.191-12.377-7.972-.9-3.119-.719-6.409-.886-9.615-.357-6.835-.858-13.671-1.879-20.444-1.177-7.807-6.247-15.358-11.9-20.737q-1.218-1.158-2.526-2.217c-14.576-11.808-41.559-15.992-57.636-5.048a24.908,24.908,0,0,0-10.544,15.97c-.816,4.363-2,5.3-6.261,6.625-7.743,2.4-16.531,4.109-22.681,9.788a21.249,21.249,0,0,0-6.382,17.626c.817,8.24,6.579,12.183,10.7,18.714,4.211,6.667.9,15.056-3.991,20.558-3.768,4.237-9.113,7.332-11.241,12.587-1.958,4.835-.662,10.424,1.7,15.073.958,1.884,2.086,3.683,2.933,5.619a21.774,21.774,0,0,1-.7,18.638"
                                transform="translate(-295.746 -89.622)" fill="none" stroke="#233862"
                                stroke-miterlimit="10" stroke-width="4" />
                              <path id="Path_13049" data-name="Path 13049"
                                d="M4870.021-93.484q4.022,7.255,7.962,14.556c5.31,9.894,15.17,31.878-.615,37.308-7.952,2.736-12.5.061-17.759-5.733a334.96,334.96,0,0,1-50.284-72.851c-5-9.812-18.283-35.382-2.151-41.224a19.592,19.592,0,0,1,15.735,1.151,31.648,31.648,0,0,1,5.964,4.4c11.642,10.382,19.932,23.777,27.307,37.364C4860.738-110.115,4865.4-101.811,4870.021-93.484Z"
                                transform="translate(-470.23 -322.308)" fill="#ff9000" />
                              <path id="Path_13050" data-name="Path 13050"
                                d="M4693.285-228.57c4.8-1.541,8.759-4.527,10.242-9.273,1.345-4.308-.776-9.153-1.154-13.5a82.392,82.392,0,0,1-.135-12.526c.253-3.856.622-7.873.028-11.717-.337-2.2-1.542-1.821-3.765-2.694a19.376,19.376,0,0,0-7.13-.875c-4.944.012-17.833-.347-20.889,3.992-1.4,1.992-1.513,4.5-1.58,6.869-.08,2.863-.587,6.571-1.057,10.565-.208,1.778-.08,3.551-.352,5.316a33.4,33.4,0,0,1-1.714,5.768c-2.487,7.164-.158,13.977,7.589,17.257A30.61,30.61,0,0,0,4693.285-228.57Z"
                                transform="translate(-384.887 -248.38)" fill="#ffc29e" />
                              <path id="Path_13051" data-name="Path 13051"
                                d="M4704.68-275.586c-.336-2.2-1.542-1.821-3.765-2.694a19.378,19.378,0,0,0-7.13-.875c-4.945.012-17.833-.347-20.889,3.992-1.4,1.992-1.513,4.5-1.58,6.869-.081,2.863-.587,6.571-1.057,10.565-.208,1.778-.08,3.551-.352,5.316a24.63,24.63,0,0,1-1.234,4.41,26.2,26.2,0,0,0,15.206.946c9.007-2.217,15.829-7.823,20.694-15.113.025-.567.042-1.134.079-1.7C4704.9-267.725,4705.273-271.742,4704.68-275.586Z"
                                transform="translate(-387.326 -248.38)" fill="#e5785c" />
                              <path id="Path_13052" data-name="Path 13052"
                                d="M4672.74-414.427a60.449,60.449,0,0,0-2.649-18.066c-7.33-22.439-35.321-27.982-52.176-11.875-18.8,17.962-11.6,60.909,8.195,75.995a22.214,22.214,0,0,0,18.917,3.727C4664.479-369.863,4672.863-393.8,4672.74-414.427Z"
                                transform="translate(-348.208 -137.766)" fill="#ffc29e" />
                              <path id="Path_13053" data-name="Path 13053"
                                d="M4765.618-346.877c8.611-4.708,11.262,7.215,9.781,13.148a18.928,18.928,0,0,1-3.1,6.857c-2.048,2.716-7.909,7.221-11.284,4.25-1.532-1.348-1.689-3.638-1.737-5.678C4759.15-333.77,4759.78-343.685,4765.618-346.877Z"
                                transform="translate(-444.764 -204.761)" fill="#f8a17a" />
                              <g id="Group_7087" data-name="Group 7087" transform="translate(4286.439 -528.186)">
                                <path id="Path_13054" data-name="Path 13054"
                                  d="M4688.952-265.1a43.64,43.64,0,0,1-6.365-.47l.381-2.583a39.233,39.233,0,0,0,22.29-3.113,28.731,28.731,0,0,0,4.823-2.771,22.774,22.774,0,0,0,6.248-6.887l2.253,1.319a25.407,25.407,0,0,1-6.969,7.683,31.347,31.347,0,0,1-5.257,3.026A41.315,41.315,0,0,1,4688.952-265.1Z"
                                  transform="translate(-4682.587 280.929)" fill="#124ba1" />
                              </g>
                              <g id="Group_7088" data-name="Group 7088" transform="translate(4277.413 -519.376)">
                                <path id="Path_13055" data-name="Path 13055"
                                  d="M4659.4-254.952c3.148-2.7,10.152-2.471,12.46.335,1.711,2.08,1.189,4.719-.7,6.477-2.229,2.08-4.985,1.959-7.765,1.332C4659.919-247.593,4655.6-251.695,4659.4-254.952Z"
                                  transform="translate(-4657.922 256.855)" fill="#124ba1" />
                              </g>
                              <path id="Path_13056" data-name="Path 13056"
                                d="M4676.668-431.9c-7.716-23.624-37.187-29.46-54.933-12.5a34.953,34.953,0,0,0-8.633,13.913,16.513,16.513,0,0,0,1.369,1.84c2.435,2.82,5.8,4.663,9.177,6.226,9.879,4.567,20.527,7.247,31.225,9.251.788.147,1.581.293,2.372.449a26.457,26.457,0,0,1,8.439,2.822c7.27,4.285,4.144,13.711,9.47,17.841a5.085,5.085,0,0,0,1.456.787,79.511,79.511,0,0,0,2.848-21.607A63.631,63.631,0,0,0,4676.668-431.9Z"
                                transform="translate(-352.092 -137.435)" fill="#ffc29e" />
                              <path id="Path_13057" data-name="Path 13057"
                                d="M4663.341-428.74a26.451,26.451,0,0,1,7.881,4.132c6.494,5.39,1.9,14.2,6.5,19.123,4.075,4.366,10.263-1.4,11.884-5.435,2.986-7.428,2.811-15.694,2.59-23.7-.123-4.462-.256-8.989-1.564-13.258a32.61,32.61,0,0,0-7.518-12.383c-9.557-10.313-23.981-15.674-37.946-14.795-10.921.688-30.079,9.865-21.517,23.768,1.954,3.172,4.977,5.527,8.067,7.61,9.024,6.084,19.108,10.428,29.349,14.113C4661.825-429.29,4662.585-429.02,4663.341-428.74Z"
                                transform="translate(-357.425 -124.115)" fill="#233862" />
                              <path id="Path_13058" data-name="Path 13058"
                                d="M4766.556-354.91c-12.156,3.117-16.854,26.016-3.292,30.575,14.572,4.9,24.829-16.207,15.265-26.547C4774.8-354.914,4770.469-355.913,4766.556-354.91Z"
                                transform="translate(-442.085 -200.121)" fill="#045be1" />
                              <path id="Path_13059" data-name="Path 13059"
                                d="M4781.158-346.4c-8.391,1.349-13.56,19.175-4.912,24.082,9.292,5.272,18.013-10.6,12.546-19.747C4786.66-345.63,4783.859-346.832,4781.158-346.4Z"
                                transform="translate(-452.702 -205.693)" fill="#124ba1" />
                              <g id="Group_7089" data-name="Group 7089" transform="translate(4268.05 -611.102)">
                                <path id="Path_13060" data-name="Path 13060"
                                  d="M4694.438-449.827l-3.242-.375c2.2-19.005,1.262-43.289-15.689-51.045-8.028-3.673-31.019-7.748-41.136,5.906-1.217,1.367-2.032,2.512-2.032,2.512,6.274-19.362,35.86-15.351,44.526-11.386C4695.6-495.643,4696.762-469.907,4694.438-449.827Z"
                                  transform="translate(-4632.339 507.501)" fill="#045be1" />
                              </g>
                              <g id="Group_7090" data-name="Group 7090" transform="translate(4070.763 -462.281)">
                                <rect id="Rectangle_6464" data-name="Rectangle 6464" width="66.657" height="13.05"
                                  transform="translate(131.889 88.272)" fill="#233862" />
                                <path id="Path_13061" data-name="Path 13061"
                                  d="M4238.1-11.3l-16.823-85.644a4.823,4.823,0,0,0-4.733-3.894H4104.71a4.783,4.783,0,0,0-3.876,1.989l-.015-.014-5.164,6.106,4.582-1L4116.8-9.444a4.824,4.824,0,0,0,4.733,3.894h111.833A4.823,4.823,0,0,0,4238.1-11.3Z"
                                  transform="translate(-4094.771 100.841)" fill="#233862" />
                                <path id="Path_13062" data-name="Path 13062"
                                  d="M4114.888,10.93h111.833a4.823,4.823,0,0,0,4.733-5.753l-16.823-85.644a4.824,4.824,0,0,0-4.733-3.894H4098.065a4.823,4.823,0,0,0-4.733,5.753l16.823,85.644A4.824,4.824,0,0,0,4114.888,10.93Z"
                                  transform="translate(-4093.24 90.392)" fill="#2b478b" />
                                <path id="Path_13063" data-name="Path 13063"
                                  d="M4248.223,21.912a13.058,13.058,0,0,0,12.329,10.46c5.777,0,9.557-4.683,8.443-10.46s-6.634-10.46-12.329-10.46S4247.191,16.135,4248.223,21.912Z"
                                  transform="translate(-4191.398 29.643)" fill="#adcbf9" />
                                <path id="Path_13064" data-name="Path 13064" d="M4093.241-73.474"
                                  transform="translate(-4093.241 83.489)" fill="#3f91ac" />
                              </g>
                              <g id="Group_7095" data-name="Group 7095" transform="translate(4433.12 -473.488)">
                                <g id="Group_7092" data-name="Group 7092" transform="translate(7.736 0)">
                                  <g id="Group_7091" data-name="Group 7091">
                                    <path id="Path_13065" data-name="Path 13065"
                                      d="M5112.272-70.067a10.125,10.125,0,0,0,.235-7.655,29.641,29.641,0,0,0-3.524-6.96,31.6,31.6,0,0,1-3.86-7.845,16.868,16.868,0,0,1,.189-9.392c1.837-5.919,5.6-10.28,8.19-14.742a21.158,21.158,0,0,0,2.782-7.089,12.2,12.2,0,0,0-.924-7.714,11.14,11.14,0,0,1,3.318,7.849,19.969,19.969,0,0,1-1.755,8.634c-2.25,5.374-5.622,9.737-6.934,14.455a12.674,12.674,0,0,0-.4,6.862,37.5,37.5,0,0,0,2.748,7.206,25,25,0,0,1,2.514,8.3C5115.1-75.254,5114.437-71.971,5112.272-70.067Z"
                                      transform="translate(-5104.54 131.464)" fill="#fff" />
                                  </g>
                                </g>
                                <g id="Group_7094" data-name="Group 7094" transform="translate(0 64.651)">
                                  <g id="Group_7093" data-name="Group 7093" transform="translate(0 0)">
                                    <path id="Rectangle_6465" data-name="Rectangle 6465"
                                      d="M0,0H33.234a0,0,0,0,1,0,0V30.987A16.617,16.617,0,0,1,16.617,47.6h0A16.617,16.617,0,0,1,0,30.987V0A0,0,0,0,1,0,0Z"
                                      fill="#2b478b" />
                                    <path id="Path_13066" data-name="Path 13066"
                                      d="M5155.556,74.618a14.644,14.644,0,1,0,14.429,14.642A14.538,14.538,0,0,0,5155.556,74.618Zm0,24.062a9.422,9.422,0,1,1,9.284-9.42A9.353,9.353,0,0,1,5155.556,98.68Z"
                                      transform="translate(-5120 -63.851)" fill="#2b478b" />
                                    <path id="Path_13067" data-name="Path 13067"
                                      d="M5093.866,79.539h0a1.8,1.8,0,0,1-1.8-1.8V54.575a1.8,1.8,0,0,1,1.8-1.8h0a1.8,1.8,0,0,1,1.8,1.8V77.743A1.8,1.8,0,0,1,5093.866,79.539Z"
                                      transform="translate(-5088.896 -50.004)" fill="#fff" opacity="0.2" />
                                    <path id="Path_13068" data-name="Path 13068"
                                      d="M5138.66,45.2V84.385a8.417,8.417,0,0,1-8.417,8.417h7.675a8.417,8.417,0,0,0,8.417-8.417V45.2Z"
                                      transform="translate(-5113.101 -45.197)" fill="#233862" />
                                  </g>
                                </g>
                              </g>
                              <g id="Group_7096" data-name="Group 7096" transform="translate(4365.626 -657.126)"
                                opacity="0">
                                <rect id="Rectangle_6466" data-name="Rectangle 6466" width="136.163" height="82.682"
                                  rx="9" transform="translate(136.163 82.682) rotate(180)" fill="#ffcc80" />
                                <path id="Path_13069" data-name="Path 13069" d="M4947.943-413.69v-38l29.758,16.231Z"
                                  transform="translate(-4930.021 518.136)" fill="#ffcc80" />
                                <rect id="Rectangle_6467" data-name="Rectangle 6467" width="67.405" height="7.214"
                                  rx="3.607" transform="translate(20.74 37.85)" fill="#fff" />
                                <rect id="Rectangle_6468" data-name="Rectangle 6468" width="22.093" height="7.214"
                                  rx="3.607" transform="translate(93.33 37.85)" fill="#fff" />
                                <rect id="Rectangle_6469" data-name="Rectangle 6469" width="67.405" height="7.214"
                                  rx="3.607" transform="translate(115.423 28.683) rotate(180)" fill="#fff" />
                                <rect id="Rectangle_6470" data-name="Rectangle 6470" width="22.093" height="7.214"
                                  rx="3.607" transform="translate(42.833 28.683) rotate(180)" fill="#fff" />
                                <rect id="Rectangle_6471" data-name="Rectangle 6471" width="47.341" height="7.214"
                                  rx="3.607" transform="translate(20.74 52.827)" fill="#fff" />
                              </g>
                              <path id="Path_13070" data-name="Path 13070"
                                d="M4744.763,100.7q2.036-.348,4.08-.67,9.935-1.558,19.778-3.7a332.67,332.67,0,0,1,39.279-6.5q2.1-.2,4.207-.359c5.928-.448,12.14-.593,17.566,2.241s9.743,9.541,8.417,16.006a14.074,14.074,0,0,1-8.264,9.684c-3.859,1.723-8.107,2.023-12.275,2.3l-40.5,2.726q-10.028.669-20.052,1.372c-6.383.444-12.862,1.346-19.263,1.339a12.838,12.838,0,0,1-8-2.317c-3.163-2.511-5.066-7.857-5.372-12.035-.159-2.17.264-4.8,1.926-6.146a6.689,6.689,0,0,1,3.109-1.139C4734.523,102.561,4739.629,101.576,4744.763,100.7Z"
                                transform="translate(-422.612 -481.948)" fill="#ff9000" />
                              <path id="Path_13071" data-name="Path 13071"
                                d="M4640.789,145.885c-3.265.674-5.816,3.541-9.065,4.5a11.153,11.153,0,0,1-7.029-.517c-2.048-.769-4.132-1.18-6.235-1.853-1.639-.525-3.853-1.63-5.613-1.264-4.615.961-9.217,4.245-13.4,6.377a4.866,4.866,0,0,1-3.009.776c-1.037-.2-1.9-1.454-1.312-2.33-1.2,1.125-2.8,3.373-4.739,2.5a1.623,1.623,0,0,1-.833-2.16,6.562,6.562,0,0,1-2.289,1.851,2.245,2.245,0,0,1-2.672-.623,2.649,2.649,0,0,1-.355-1.335,10.082,10.082,0,0,1,1.072-4.642c3.294-7.19,10.745-12.525,17.085-16.809a13.673,13.673,0,0,1,3.559-1.921,12.484,12.484,0,0,1,3.6-.4,71.74,71.74,0,0,1,23.179,3.745c1.612.543,3.387.081,4.994-.22a7.786,7.786,0,0,1,3.6-.1,6.2,6.2,0,0,1,3.1,2.509,11.64,11.64,0,0,1,2.4,7.236c-.132,1.928-.278,4.008-2.546,4.412-.919.164-1.866.063-2.795.16A6.939,6.939,0,0,0,4640.789,145.885Z"
                                transform="translate(-333.785 -506.56)" fill="#f8a17a" />
                              <path id="Path_13072" data-name="Path 13072"
                                d="M4493.891,192.683h-428.2c-4.362,0-7.9-4.359-7.9-9.736h0c0-5.377,3.536-9.736,7.9-9.736h428.2c4.362,0,7.9,4.359,7.9,9.736h0C4501.789,188.324,4498.253,192.683,4493.891,192.683Z"
                                transform="translate(0 -535.201)" fill="#233862" />
                              <g id="Group_7097" data-name="Group 7097" transform="translate(4140.177 -645.934)"
                                opacity="0">
                                <path id="Path_13073" data-name="Path 13073"
                                  d="M4314.677-602.682h-17.912a13.887,13.887,0,0,0-13.846,13.846h0a13.857,13.857,0,0,0,6,11.39v9.745l9.966-7.289h15.789a13.887,13.887,0,0,0,13.846-13.846h0A13.887,13.887,0,0,0,4314.677-602.682Z"
                                  transform="translate(-4282.919 602.682)" fill="#dceaff" />
                                <circle id="Ellipse_541" data-name="Ellipse 541" cx="2.101" cy="2.101"
                                  r="2.101" transform="translate(10.668 11.745)" fill="#fff" />
                                <circle id="Ellipse_542" data-name="Ellipse 542" cx="2.101" cy="2.101"
                                  r="2.101" transform="translate(20.701 11.745)" fill="#fff" />
                                <circle id="Ellipse_543" data-name="Ellipse 543" cx="2.101" cy="2.101"
                                  r="2.101" transform="translate(30.733 11.745)" fill="#fff" />
                              </g>
                              <path id="Path_13074" data-name="Path 13074"
                                d="M5050.314-278.806c-2.762-4.726-9.732-7.1-16.471.777-6.738-7.875-13.709-5.5-16.472-.777-6.8,11.644,16.472,25.348,16.472,25.348S5057.12-267.161,5050.314-278.806Z"
                                transform="translate(-607.625 -245.841)" fill="#dceaff" opacity="0" />
                              <g id="Group_7098" data-name="Group 7098" transform="translate(4247.51 -670.899)"
                                opacity="0">
                                <rect id="Rectangle_6472" data-name="Rectangle 6472" width="41.284" height="27.545"
                                  rx="2" transform="translate(0 0)" fill="#dceaff" />
                                <path id="Path_13075" data-name="Path 13075"
                                  d="M4578.033-668.482,4597.82-649.3a.272.272,0,0,0,.376,0l19.787-19.186"
                                  transform="translate(-4577.367 669.366)" fill="none" stroke="#fff"
                                  stroke-miterlimit="10" stroke-width="2" />
                                <line id="Line_603" data-name="Line 603" y1="11.392" x2="14.831"
                                  transform="translate(0.667 15.265)" fill="none" stroke="#fff"
                                  stroke-miterlimit="10" stroke-width="2" />
                                <line id="Line_604" data-name="Line 604" x1="14.831" y1="11.392"
                                  transform="translate(25.786 15.265)" fill="none" stroke="#fff"
                                  stroke-miterlimit="10" stroke-width="2" />
                              </g>
                              <g id="Group_7103" data-name="Group 7103" transform="translate(4170.89 -568.989)"
                                opacity="0">
                                <g id="Group_7099" data-name="Group 7099" transform="translate(0 0)">
                                  <rect id="Rectangle_6473" data-name="Rectangle 6473" width="47.689" height="33.124"
                                    rx="12" fill="#dceaff" />
                                </g>
                                <g id="Group_7100" data-name="Group 7100" transform="translate(15.483 32.313)">
                                  <path id="Path_13076" data-name="Path 13076"
                                    d="M4417.514-292.851l8.361-11.277h-16.723Z" transform="translate(-4409.152 304.128)"
                                    fill="#dceaff" />
                                </g>
                                <g id="Group_7101" data-name="Group 7101" transform="translate(31.551 11.06)">
                                  <path id="Path_13077" data-name="Path 13077"
                                    d="M4457.9-352.441h-2.063v-5.648l.021-.928.033-1.015q-.515.514-.714.674l-1.122.9-.995-1.242,3.145-2.5h1.7Z"
                                    transform="translate(-4453.057 362.202)" fill="#fff" />
                                </g>
                                <g id="Group_7102" data-name="Group 7102" transform="translate(9.098 10.732)">
                                  <path id="Path_13078" data-name="Path 13078"
                                    d="M4403.7-363.1h-6.769a5.247,5.247,0,0,0-5.231,5.232h0a5.236,5.236,0,0,0,2.268,4.3v3.682l3.766-2.755h5.966a5.247,5.247,0,0,0,5.231-5.232h0A5.247,5.247,0,0,0,4403.7-363.1Z"
                                    transform="translate(-4391.704 363.1)" fill="#fff" />
                                </g>
                              </g>
                            </g>
                          </g>
                        </svg>
                      </div>
                    </div>
                    <div class="row mt-10">
                      <div class="col-6 text-center" style="padding-right:5px"><a class="ps-btn w-100"
                          style="background:#045dab; font-size:13px!important; padding:7px 0px!important"
                          href="#contact">NOTIFY ME</a></div>
                      <div class="col-6 text-center" style="padding-left:5px"><a class="ps-btn w-100"
                          style="font-size:13px!important; padding:7px 0px!important" href="#contact">TALK TO
                          EXPERTS</a>
                      </div>
                    </div>
                  </div>
                  <div class="ps-product__box mb-20 shadow" style="padding:5px!important">
                    <div class="row">
                      <div class="col-12 text-center">
                        <img src="<?php echo base_url('assets/web/'); ?>img/ieltsAd.jpg" alt="IELTS Online Coaching Apply">
                      </div>
                    </div>
                    <div class="row" style="margin-top:5px">
                      <div class="col-12 text-center"><a class="ps-btn w-100"
                          style="background:#045dab; font-size:13px!important; padding:7px 0px!important"
                          href="https://www.britannicaoverseas.com/ielts-online-coaching/" rel="nofollow sponsored"
                          target="_blank" rel="noopener noreferrer">APPLY NOW</a></div>
                    </div>
                  </div>
                  <div class="ps-product__box mb-20 shadow" style="padding:5px!important">
                    <div class="row">
                      <div class="col-12 text-center">
                        <img src="<?php echo base_url('assets/web/'); ?>img/oetAd.jpg" alt="OET Online Coaching Apply">
                      </div>
                    </div>
                    <div class="row" style="margin-top:5px">
                      <div class="col-12 text-center"><a class="ps-btn w-100"
                          style="background:#045dab; font-size:13px!important; padding:7px 0px!important"
                          href="https://www.britannicaoverseas.com/oet-exam/" rel="nofollow sponsored" target="_blank"
                          rel="noopener noreferrer">APPLY NOW</a></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- TOP TRENDING UNIVERSITIES -->
            <?php $this->load->view('web/top-trending-universities'); ?>
            <!-- TOP TRENDING UNIVERSITIES END -->
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
