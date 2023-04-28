<!DOCTYPE html>
<html lang="en">

<head>
  <title><?php echo ucwords($meta_title); ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <meta name="description" content="<?php echo $meta_description; ?>">
  <meta name="keywords" content="<?php echo $meta_keyword; ?>">
  <link rel="canonical" href="<?php echo $fullurl; ?>/" />
  <meta name="copyright" content="Tutelage Study" />
  <meta name="author" content="Tutelage" />
  <meta name="email" content="info@tutelagestudy.com" />
  <meta name="Distribution" content="Global" />
  <meta name="page-topic" content="<?php echo $page_content; ?>" />
  <meta name="language" content="EN" />
  <meta name="revisit-after" content="7 days" />
  <meta name="expires" content="never" />
  <meta name="bingbot" content=" index, follow " />
  <meta name="googlebot" content=" index, follow " />
  <meta name="robots" content="index,follow" />
  <meta property="og:title" content="<?php echo $meta_title; ?>" />
  <meta property="og:description" content="<?php echo $meta_description; ?>" />
  <link rel="shortcut icon" href="https://www.tutelagestudy.com/assets/web/img/icon.png" type="image/x-icon">
  <meta property="og:type" content="website" />
  <meta property="og:image" content="" />
  <meta property="og:locale" content="en_US" />
  <meta property="og:url" content="<?php echo $fullurl; ?>/" />
  <meta property="og:image:alt" content="<?php echo $page_content; ?>" />
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:site" content="Tutelage Study" />
  <meta name="twitter:creator" content="@tutelagestudy" />
  <meta name="twitter:url" content="<?php echo $fullurl; ?>/" />
  <meta name="twitter:title" content="<?php echo $meta_title; ?>" />
  <meta name="twitter:description" content="<?php echo $meta_description; ?>" />
  <meta name="twitter:image" content="" />
  <meta property="twitter:image:type" content="image/jpeg" />



  <?php $this->load->view('web/cssjs'); ?>

</head>

<?php $this->load->view('web/header/menu-bar-top'); ?>