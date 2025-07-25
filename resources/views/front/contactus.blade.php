@php
  use App\Models\Address;
@endphp
@extends('front.layouts.main')
@push('seo_meta_tag')
  @include('front.layouts.static_page_meta_tag')
@endpush
@section('main-section')


  <div class="ps-breadcrumb">
    <div class="ps-container">
      <ul class="breadcrumb bread-scrollbar">
        <li><a href="<?php echo url('/'); ?>">Home</a></li>
        <li>Contact Us</li>
      </ul>
    </div>
  </div>

  <div class="ps-page--single" id="contact-us">
    <div class="ps-contact-info">
      <div class="container">
        <div class="ps-section__header">
          <h1>Contact Us For Any Questions</h1>
          <p>Our experts give career guidance in a well-organized way to benefit the students up choosing the correct
            career. We have credible ideas offered for the students with the required facilities to acquire Tutelage
            Studies.</p>
        </div>

        <div class="ps-section__content">
          <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12">
              <div class="contact-box">
                <h4>Head Office</h4>
                <p>B-16 Ground Floor, Mayfield Garden, Sector 50, Gurugram, Haryana, India 122002.</p>
              </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12">
              <div class="contact-box">
                <h4>Contact</h4>
                <p><strong>Directly:</strong> <a href="tel:+919870406867">+91 9870406867</a><br />
                  <strong>Enquiry:</strong> <a href="tel:+919818560331">+91 9818560331</a>
                </p>
              </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12">
              <div class="contact-box">
                <h4>Mail us</h4>
                <p><a href="mailto:info@tutelagestudy.com">info@tutelagestudy.com</a>
                </p>
              </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12">
              <div class="contact-box">
                <h4>Website</h4>
                <p><a href="https://www.tutelagestudy.com/" target="_blank"
                    rel="noopener noreferrer">www.tutelagestudy.com</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="ps-contact-info" style="padding-top:0px">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="ps-section__header">
              <h3>Our Locations</h3>
            </div>
          </div>
        </div>

        <div class="container">
          <ul class="nav nav-tabs-one vertically-scrollbar" role="tablist">
            <?php
          $i = 1;
          foreach ($locations as $row) {
        ?>
            <li role="presentation"><a class="<?php echo $i == 1 ? 'active' : ''; ?>" href="#<?php echo $row->country; ?>"
                aria-controls="<?php echo $row->country; ?>" role="tab" data-toggle="tab" aria-expanded="false">
                <?php echo $row->country; ?>
              </a></li>
            <?php  $i++; } ?>
          </ul>

          <!-- Tab panes -->
          <div class="tab-content more-info latest-info bg-white" style="margin-top:0px">

            <?php
          $i = 1;
          foreach ($locations as $row) {
        ?>
            <div role="tabpanel" class="tab-pane  <?php echo $i == 1 ? 'active' : ''; ?>" id="<?php echo $row->country; ?>">
              <div class="row">
                <?php
                $addrs = Address::where(['country'=>$row->country])->get();
                foreach ($addrs as $ro) {
              ?>
                <div class="col-md-3 mb-3">
                  <div class="city-box-one">
                    <div class="city-name-one">
                      <?php echo $ro->city; ?>
                    </div>
                    <div class="city-location-one">
                      <i class="fa fa-map-pin"></i>
                      <?php echo $ro->address; ?>
                    </div>
                    <div class="city-location-one">
                      <i class="fa fa-phone"></i>
                      <?php echo $ro->mobile; ?>
                    </div>
                    <div class="city-location-one">
                      <i class="fa fa-envelope"></i>
                      <?php echo $ro->email; ?>
                    </div>
                  </div>
                </div>
                <?php } ?>
              </div>
            </div>
            <?php $i++; } ?>
          </div>

        </div>

      </div>
    </div>

    <div class="ps-contact-form">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <?php if (session()->has('smsg')) { ?>
            <div class="alert alert-success alert-outline-coloured alert-dismissible" role="alert">
              <div class="alert-message">
                <strong>
                  <?php echo session()->get('smsg'); ?>
                </strong>
              </div>
            </div>
            <?php } ?>
            <?php if (session()->has('emsg')) { ?>
            <div class="alert alert-danger alert-outline-coloured alert-dismissible" role="alert">
              <div class="alert-message">
                <strong>
                  <?php echo session()->get('emsg'); ?>
                </strong>
              </div>
            </div>
            <?php } ?>
            @error('g-recaptcha-response')
              <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="col-md-6">
            <iframe
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3507.694307607099!2d77.0675921150787!3d28.458630082486835!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390d19f0ff999f77%3A0x21bc6aa869a4d8f8!2sTutelage%20Study!5e0!3m2!1sen!2sin!4v1602920690248!5m2!1sen!2sin"
              width="100%" height="420" style="border:2px dotted #0047ab;box-shadow: 0 0 25px rgb(0 0 0 / 29%);"
              allowfullscreen="" loading="lazy"></iframe>
          </div>
          <div class="col-md-6">
            <form class="ps-form--contact-us" action="{{ url('inquiry/submit-university-inquiry') }}/" method="post">
              @csrf
              <input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response">
              <input type="hidden" name="source" value="contact-us">
              <input type="hidden" name="source_path" value="{{ url()->previous() }}">
              <h3 style="margin-top:20px">Get In Touch</h3>
              <p class="text-danger">All field are required.</p>
              <input type="hidden" name="page_url" value="<?php echo url()->current(); ?>">
              <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                  <div class="form-group">
                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter Name"
                      value="{{ old('name') ?? '' }}" required>
                    @error('name')
                      {{ '<span class="err-clr">' . $message . '</span>' }}
                    @enderror
                  </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                  <div class="form-group">
                    <input type="email" class="form-control" name="email" id="email"
                      value="{{ old('email') ?? '' }}" placeholder="Enter Email" required>
                    @error('email')
                      {{ '<span class="err-clr">' . $message . '</span>' }}
                    @enderror
                  </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="form-group">
                    <select class="form-control" name="c_code" id="c_code" required>
                    <option value="">Select Code</option>
                    <?php
                  foreach ($phonecodes as $row) {
                  ?>
                    <option value="<?php echo $row->phonecode; ?>" <?php echo old('c_code') && old('c_code') == $row->phonecode ? 'Selected' : ''; ?>> +
                      <?php echo $row->phonecode; ?> (
                      <?php echo $row->name; ?>)
                    </option>
                    <?php } ?>
                  </select>
                </div>
                  @error('c_code')
                    {{ '<span class="err-clr">' . $message . '</span>' }}
                  @enderror
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                  <div class="form-group">
                    <input type="text" class="form-control u-ltr" placeholder="Enter Mobile Number"
                      data-error="Please enter a valid phone number" name="mobile" id="mobile"
                      value="<?php echo old('mobile'); ?>" required>
                    @error('mobile')
                      {{ '<span class="err-clr">' . $message . '</span>' }}
                    @enderror
                  </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
               <div class="form-group">
                   <select class="form-control" name="nationality" id="nationality" required>
                    <option value="">Select Your Country</option>
                    <?php
                  foreach ($countries as $row) {
                  ?>
                    <option value="<?php echo $row->name; ?>" <?php echo old('nationality') == $row->name ? 'Selected' : '';
                    ?>>
                      <?php echo $row->name; ?>
                    </option>
                    <?php } ?>
                  </select>
               </div>
                  @error('nationality')
                    {{ '<span class="err-clr">' . $message . '</span>' }}
                  @enderror
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                 <div class="form-group">
                   <select class="form-control" name="destination" id="destination" required>
                    <option value="">Select Destination</option>
                    <?php
                  foreach ($destinations as $row) {
                  ?>
                    <option value="<?php echo $row->page_name; ?>" <?php echo old('destination') == $row->page_name ? 'Selected' : ''; ?>>
                      <?php echo $row->page_name; ?>
                    </option>
                    <?php } ?>
                  </select>
                 </div>
                  @error('destination')
                    {{ '<span class="err-clr">' . $message . '</span>' }}
                  @enderror
                </div>
              </div>
              {{-- <br>
            <div class="row">
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                <div class="form-group">
                  <div class="g-recaptcha" data-sitekey="<?php echo recaptcha_site_key; ?>" required></div>
                </div>
              </div>
            </div> --}}
               <div class="col-12 text-right">
            <div class="form-group submit">
                <button class="ps-btn" type="submit">Send message</button>
              </div>
        </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  <script>
    $(".nav-tabs li a").click(function() {

      $(".nav-tabs li a").removeClass('active');

    });
  </script>
  <script>
    grecaptcha.ready(function() {
      grecaptcha.execute('{{ gr_site_key() }}', {
          action: 'contact_us'
        })
        .then(function(token) {
          // Set the reCAPTCHA token in the hidden input field
          document.getElementById('g-recaptcha-response').value = token;
        });
    });
  </script>
@endsection
