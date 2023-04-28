<?php
// $userIP = $_SERVER["REMOTE_ADDR"];
// $details = ip_details($userIP);
// printArray($details);
// die;
// $curCountry = $details->country;
?>
<div class="ps-product__content ps-tab-root mb-20" id="contact">
  <div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
      <div class="ps-product__box">
        <h4>Interested in <?php echo $row->page_name; ?> ?<br>We can help – fill in your details get free counselling from experts team.</h4>
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
        <div class="ps-section__content">
          <form action="{{ url('inquiry/submit-university-inquiry') }}" method="post">
            @csrf
            <input type="hidden" class="form-control" name="page_url" value="{{ $page_url }}">
            <div class="ps-form__content">
              <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                  <div class="ps-form__billing-info">
                    <div class="row">
                      <div class="col-sm-5">
                        <div class="form-group">
                          <input type="text" name="name" id="name" class="form-control" placeholder="Enter Name" value="{{ old('name')??'' }}" required>
                          @error('name')
                            {{ '<span class="err-clr">' . $message . '</span>' }}
                          @enderror
                        </div>
                      </div>
                      <div class="col-sm-7">
                        <div class="form-group">
                          <input type="email" class="form-control" name="email" id="email" value="{{ old('email')??'' }}" placeholder="Enter Email" required>
                          @error('email')
                            {{ '<span class="err-clr">' . $message . '</span>' }}
                          @enderror
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-3">
                        <div class="form-group">
                          <select class="form-control" name="c_code" id="c_code" required>
                            <option value="">Select Code</option>
                            <?php
                            foreach ($phonecodes as $row) {
                            ?>
                              <option value="<?php echo $row->phonecode; ?>" <?php echo old('c_code') && old('c_code') == $row->phonecode ? 'Selected' : ''; ?>> +<?php echo $row->phonecode; ?> (<?php echo $row->name; ?>)</option>
                            <?php } ?>
                          </select>
                          @error('c_code')
                            {{ '<span class="err-clr">' . $message . '</span>' }}
                          @enderror
                        </div>
                      </div>
                      <div class="col-sm-9">
                        <div class="form-group">
                          <input type="text" class="form-control u-ltr" placeholder="Enter Mobile Number" data-error="Please enter a valid phone number" name="mobile" id="mobile" value="<?php echo old('mobile'); ?>" required>
                          @error('mobile')
                            {{ '<span class="err-clr">' . $message . '</span>' }}
                          @enderror
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
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
                      <div class="col-sm-6">
                        <div class="form-group">
                          <select class="form-control" name="destination" id="destination" required>
                            <option value="">Select Destination</option>
                            <?php
                            foreach ($destinations as $row) {
                            ?>
                              <option value="<?php echo $row->page_name; ?>" <?php echo old('destination') == $row->page_name ? 'Selected' : ''; ?>><?php echo $row->page_name; ?></option>
                            <?php } ?>
                          </select>
                          @error('destination')
                            {{ '<span class="err-clr">' . $message . '</span>' }}
                          @enderror
                        </div>
                      </div>
                    </div>
                    {{-- <div class="row">
                      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                        <div class="form-group">
                          <div class="g-recaptcha" data-sitekey="<?php echo recaptcha_site_key; ?>" required></div>
                        </div>
                      </div>
                    </div> --}}
                    <div class="form-group">
                      <label for="keep-update">By clicking Submit, you agree to our <a href="<?php echo url('term-and-condition'); ?>/" class="b black">Terms and Conditions</a> & <a href="<?php echo url('privacy-policy'); ?>/" class="b black">Privacy Policy</a></label>
                    </div>
                    <button class="ps-btn w-100" type="submit">
                      <span class="b">Send</span>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
