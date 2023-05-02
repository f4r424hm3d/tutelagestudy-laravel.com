@extends('front.layouts.main')
@push('seo_meta_tag')
@include('front.layouts.form_page_meta_tag')
@endpush
@section('main-section')
<style>
  .neet-counselling{ background:#eee; padding:60px 15px}
  .neet-counselling-box{background-color:#fff; -webkit-border-radius: 5px;  -moz-border-radius: 5px;  -ms-border-radius: 5px; border-radius: 5px; padding: 20px 25px; -webkit-box-shadow: 0px 0px 30px 0px rgb(0 0 0 / 10%); -moz-box-shadow: 0px 0px 30px 0px rgba(0, 0, 0, 0.1); box-shadow: 0px 0px 30px 0px rgb(0 0 0 / 10%);}
  .neet-counselling h1{ padding:0px 0px 10px 0px; margin-top:0px; margin-bottom:15px; border-bottom:1px dashed #cd2122; font-weight:600}
  .neet-counselling select{appearance:none; -webkit-appearance:none;-moz-appearance:none;-ms-appearance:none; background-position: calc(100% - 12px) center !important;  background: url("data:image/svg+xml,
  <svg height='10px' width='10px' viewBox='0 0 16 16' fill='%23000000' xmlns='http://www.w3.org/2000/svg'>
    <path d='M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/>
  </svg>
  ") no-repeat; background-color:#fff}
  .form-control{ background:#fff; padding:5px 15px; height:45px; border-radius:4px}
  .pr7{padding-right:7px}
  .pl7{padding-left:7px}
  .ps-search-trending h2{ color:#fff; font-size:28px; margin-bottom:25px; padding:0px 0px 10px 0px; border-bottom:1px dashed #fff; font-weight:600}
  @media (max-width:768px) {
  .neet-counselling{ background:#eee; padding:30px 15px}
  .pr7{padding-right:15px}
  .pl7{padding-left:15px}
  .ps-search-trending h2{font-size:23px;}
  }
</style>
<div class="neet-counselling">
  <div class="row justify-content-center ">
    <div class="col-md-5">
      <?php if (session()->has('smsg')) { ?>
      <div class="alert alert-success alert-outline-coloured alert-dismissible" role="alert">
        <div class="alert-message">
          <strong><?php echo session()->get('smsg'); ?></strong>
        </div>
      </div>
      <?php } ?>
      <?php if (session()->has('emsg')) { ?>
      <div class="alert alert-danger alert-outline-coloured alert-dismissible" role="alert">
        <div class="alert-message">
          <strong><?php echo session()->get('emsg'); ?></strong>
        </div>
      </div>
      <?php } ?>
      <div class="neet-counselling-box">
        <h1>NEET Counselling</h1>
        <form class="ps-form--visa" action="{{ url('inquiry/submit-neet-inquiry/') }}/" method="post">
          @csrf
          <input type="hidden" name="source_url" value="<?php echo $_GET['page']??''; ?>">
          <input type="hidden" name="page_url" value="{{ $page_url }}">
          <div class="row">
            <div class="col-lg-6 col-md-5 col-sm-12 col-xs-12 pr7">
              <div class="form-group">
                <input type="text" name="name" id="name" class="form-control" placeholder="Enter Name" value="{{ old('name')??'' }}" required>
                  @error('name')
                    {!! '<span class="text-danger">' . $message . '</span>' !!}
                  @enderror
              </div>
            </div>
            <div class="col-lg-6 col-md-7 col-sm-12 col-xs-12 pl7">
              <div class="form-group">
                <input type="email" class="form-control" name="email" id="email" value="{{ old('email')??'' }}" placeholder="Enter Email" required>
                  @error('email')
                    {!! '<span class="text-danger">' . $message . '</span>' !!}
                  @enderror
              </div>
            </div>
            <div class="col-6 col-lg-6 col-md-6 col-sm-6 col-xs-6 pl7">
              <div class="form-group">
                <input type="text" class="form-control u-ltr" placeholder="Enter Mobile Number" data-error="Please enter a valid phone number" name="mobile" id="mobile" value="<?php echo old('mobile'); ?>" required>
                @error('mobile')
                  {!! '<span class="text-danger">' . $message . '</span>' !!}
                @enderror
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl7">
              <div class="form-group">
                <input type="text" class="form-control u-ltr" placeholder="Enter State" data-error="Please Enter State" name="state" id="state" value="<?php echo old('state'); ?>" required>
                @error('state')
                  {!! '<span class="text-danger">' . $message . '</span>' !!}
                @enderror
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl7">
              <div class="form-group">
                <select class="form-control" name="neet_qualified" id="neet_qualified" required>
                  <option value="">Are you qualified NEET</option>
                  <option value="Yes" <?php echo old('neet_qualified') == 'Yes' ? 'selected' : ''; ?>>Yes</option>
                  <option value="No" <?php echo old('neet_qualified') == 'No' ? 'selected' : ''; ?>>No</option>
                </select>
                @error('neet_qualified')
                  {!! '<span class="text-danger">' . $message . '</span>' !!}
                @enderror
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl7">
              <div class="form-group">
                <select class="form-control" name="question" id="question" required>
                  <option value="">My Questions is regardiing</option>
                  <option value="Neet Counselling" <?php echo old('question') == 'Neet Counselling' ? 'selected' : ''; ?>>Neet Counselling</option>
                  <option value="MBBS Abroad Query" <?php echo old('question') == 'MBBS Abroad Query' ? 'selected' : ''; ?>>MBBS Abroad Query</option>
                  <option value="MBBS Abroad Scholarship" <?php echo old('question') == 'MBBS Abroad Scholarship' ? 'selected' : ''; ?>>MBBS Abroad Scholarship</option>
                  <option value="Visa Counselling" <?php echo old('question') == 'Visa Counselling' ? 'selected' : ''; ?>>Visa Counselling</option>
                </select>
                @error('question')
                  {!! '<span class="text-danger">' . $message . '</span>' !!}
                @enderror
              </div>
            </div>
            {{-- <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
              <div class="form-group">
                <div class="g-recaptcha" data-sitekey="6LfEJo4jAAAAAIEVgbaWIR-uic-I3h9RBYFCqOTS" required></div>
              </div>
            </div> --}}
            <div class="form-group">
              <div class="ps-checkbox pl-20">
                <input class="form-control " type="checkbox" name="terms" id="terms" checked>
                <label for="terms">I agree to the <a href="https://www.tutelagestudy.com/term-and-condition/" style="color: blue;" target="_blank">terms & conditions</a> .*</label>
                @error('terms')
                  {!! '<span class="text-danger">' . $message . '</span>' !!}
                @enderror
              </div>
            </div>
            <div class="form-group">
              <div class="ps-checkbox pl-20">
                <input class="form-control " type="checkbox" name="contact_me" id="contact_me" checked>
                <label for="contact_me">Contact me by phone, email or SMS to assist me .*</label>
                @error('contact_me')
                  {!! '<span class="text-danger">' . $message . '</span>' !!}
                @enderror
              </div>
            </div>
            <div class="form-group">
              <div class="ps-checkbox pl-20">
                <input class="form-control" type="checkbox" name="update" id="update" checked>
                <label for="update">I would like to receive updates and offers from Tutelage Study.*</label>
              </div>
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
              <button type="submit" class="ps-btn ps-btn--fullwidth">Submit</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="ps-search-trending">
  <div class="container">
    <div class="text-center">
      <h2>Related Destinations</h2>
    </div>
    <div class="row">
      <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
        <a href="https://www.tutelagestudy.com/mbbs-in-malaysia/">
          <div class="ps-post ps-product shadow">
            <div class="ps-post__thumbnail"><img src="{{ asset('/front/') }}/img/mbbs-malaysia.jpg" alt=""></div>
            <div class="ps-post__content" style="border:0px; padding:12px 0px; background:#fff">
              <div class="ps-post__title text-center">MBBS IN MALAYSIA</div>
            </div>
          </div>
        </a>
      </div>
      <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
        <a href="https://www.tutelagestudy.com/mbbs-in-russia/">
          <div class="ps-post ps-product shadow">
            <div class="ps-post__thumbnail"><img src="{{ asset('/front/') }}/img/mbbs-russia.jpg" alt=""></div>
            <div class="ps-post__content" style="border:0px; padding:12px 0px; background:#fff">
              <div class="ps-post__title text-center">MBBA IN RUSSIA</div>
            </div>
          </div>
        </a>
      </div>
      <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
        <a href="https://www.tutelagestudy.com/mbbs-in-mauritius/">
          <div class="ps-post ps-product shadow">
            <div class="ps-post__thumbnail"><img src="{{ asset('/front/') }}/img/mbbs-mauritius.jpg" alt=""></div>
            <div class="ps-post__content" style="border:0px; padding:12px 0px; background:#fff">
              <div class="ps-post__title text-center">MBBS IN MAURITUS</div>
            </div>
          </div>
        </a>
      </div>
      <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
        <a href="https://www.tutelagestudy.com/mbbs-in-iran/">
          <div class="ps-post ps-product shadow">
            <div class="ps-post__thumbnail"><img src="{{ asset('/front/') }}/img/mbbs-iran.jpg" alt=""></div>
            <div class="ps-post__content" style="border:0px; padding:12px 0px; background:#fff">
              <div class="ps-post__title text-center">MBBS IN IRAN</div>
            </div>
          </div>
        </a>
      </div>
    </div>
    <div class="pt-20" align="center"><a href="/destinations/" target="_blank" class="button home-btn">Browse All Destinations</a></div>
  </div>
</div>
@endsection
