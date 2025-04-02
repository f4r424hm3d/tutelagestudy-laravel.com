@extends('front.layouts.main')
@push('seo_meta_tag')
@include('front.layouts.static_page_meta_tag')
@endpush
@section('main-section')
<!-- Content -->
<section class="bg-light pt-5 pb-5 mt-5">
  <div class="log-space">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-5 col-12 mx-auto">
<div class="all-signsin">
<div class="no-gutters position-relative log_rads">
            <div class="log_wraps">
              <img class="set-mails"  src="/front/img/send-mail.png" alt="">
            <div class="log__heads">
                      <h4 class="mt-0 logs_title ">Email Sent</h4>
                    </div>
             
              <p class="mb-3">
                We sent an email to <b>{{ session()->get('forget_password_email') }}</b> with a link to get back into
                your
                account.
              </p>
              <a class="button home-btn py-2 w-100" href="{{ url('account/password/reset') }}">Ok</a>

            </div>
          </div>
</div>
          

        </div>
      </div>
    </div>
  </div>
</section>


<!-- Content -->
@endsection
