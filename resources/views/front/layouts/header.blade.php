<!DOCTYPE html>
<html lang="en">

<head>
  <!--Meta Tag Seo-->
  @stack('seo_meta_tag')

  <script src="https://www.google.com/recaptcha/api.js?render={{ gr_site_key() }}"></script>

  @stack('breadcrumb_schema')

</head>
@include('front.header.menu-bar-top')
