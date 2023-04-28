<?php error_reporting(0); ?>
<?php
$baseurl = base_url();
$seg = $this->uri->uri_string();
$fullurl = $baseurl . $seg;

$headline = $row->headline;
$site =  'tutelagestudy.com';

$meta_title = $row->meta_title;
if ($meta_title == '') {
  $meta_title = $dseo->title;
} else {
  $meta_title = $meta_title;
}
$meta_title = str_replace('%title%', $headline, $meta_title);
$meta_title = str_replace('%currentmonth%', date('M'), $meta_title);
$meta_title = str_replace('%currentyear%', date('Y'), $meta_title);
$meta_title = str_replace('%site%', $site, $meta_title);

$meta_keyword = $row->meta_keyword;
if ($meta_keyword == '') {
  $meta_keyword = $dseo->keyword;
} else {
  $meta_keyword = $meta_keyword;
}
$meta_keyword = str_replace('%title%', $headline, $meta_keyword);
$meta_keyword = str_replace('%currentmonth%', date('M'), $meta_keyword);
$meta_keyword = str_replace('%currentyear%', date('Y'), $meta_keyword);
$meta_keyword = str_replace('%site%', $site, $meta_keyword);

$page_content = $row->page_content;
if ($page_content == '') {
  $page_content = $dseo->page_content;
} else {
  $page_content = $page_content;
}
$page_content = str_replace('%title%', $headline, $page_content);
$page_content = str_replace('%currentmonth%', date('M'), $page_content);
$page_content = str_replace('%currentyear%', date('Y'), $page_content);
$page_content = str_replace('%site%', $site, $page_content);

$meta_description = $row->meta_description;
if ($meta_description == '') {
  $meta_description = $dseo->description;
} else {
  $meta_description = $meta_description;
}
$meta_description = str_replace('%title%', $headline, $meta_description);
$meta_description = str_replace('%currentmonth%', date('M'), $meta_description);
$meta_description = str_replace('%currentyear%', date('Y'), $meta_description);
$meta_description = str_replace('%site%', $site, $meta_description);

$ogimgpath = $row->ogimgpath;
if ($ogimgpath == '') {
  $ogimgpath = $dseo->ogimgpath;
} else {
  $ogimgpath = $ogimgpath;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title><?php echo ucwords($meta_title); ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <meta name="description" content="<?php echo $meta_description; ?>">
  <meta name="keywords" content="<?php echo $meta_keyword; ?>">
  <link rel="canonical" href="<?php echo $fullurl; ?>" />
  <meta name="copyright" content="tutelagestudy.com" />
  <meta name="author" content="Tutelage Study" />
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
  <link rel="shortcut icon" href="<?php echo base_url('assets/web/'); ?>img/icon.png" type="image/x-icon">
  <link href="<?php echo base_url('assets/web/'); ?>img/icon.png" rel="apple-touch-icon">
  <meta property="og:type" content="website" />
  <meta property="og:image" content="" />
  <meta property="og:locale" content="en_US" />
  <meta property="og:url" content="<?php echo $fullurl; ?>" />

  <?php $this->load->view('web/cssjs'); ?>
</head>
<?php $this->load->view('web/header/menu-bar-top'); ?>