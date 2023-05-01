<?php error_reporting(0); ?>
<?php
$baseurl = base_url();
$seg = $this->uri->uri_string();
$fullurl = $baseurl . $seg.'/';
$fullurl = rtrim($fullurl,'/').'/';
$whereseoc = ['url' => $fullurl, 'id !=' => 0];
$seoc = $this->mm->getCount($whereseoc, 'seos');

if ($seoc >= 1) {
  $whereseo = ['url' => $fullurl, 'id !=' => 0];
} else {
  $whereseo = ['is_default' => 1, 'id !=' => 0];
}

$seo = $this->mm->getAllData9($whereseo, 'seos');

//printArray($seo);
$site =  'tutelagestudy.com';


$tagArray = ['currentmonth' => date('M'), 'currentyear' => date('Y'), 'site' => $site];

$meta_title = $seo->meta_title;
$data['meta_title'] = replaceTag($meta_title, $tagArray);

$meta_keyword = $seo->meta_keyword;
$data['meta_keyword'] = replaceTag($meta_keyword, $tagArray);

$page_content = $seo->page_content;
$data['page_content'] = replaceTag($page_content, $tagArray);

$meta_description = $seo->meta_description;
$data['meta_description'] = replaceTag($meta_description, $tagArray);

$data['ogimgpath'] = '';

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="robots" content="index, follow" />
  <title><?php echo ucwords($meta_title); ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <meta name="description" content="<?php echo $meta_description; ?>">
  <meta name="keywords" content="<?php echo $meta_keyword; ?>">
  <link rel="canonical" href="<?php echo $fullurl; ?>/" />
  <meta name="copyright" content="TutelageStudy.com" />
  <meta name="author" content="Tutelage Study" />
  <meta name="email" content="info@tutelagestudy.com" />
  <meta name="Distribution" content="Global" />
  <meta name="page-topic" content="<?php echo $page_content; ?>" />
  <meta name="language" content="EN" />
  <meta property="og:title" content="<?php echo $meta_title; ?>" />
  <meta property="og:description" content="<?php echo $meta_description; ?>" />
  <link rel="shortcut icon" href="{{ asset('/front/') }}/img/icon.png" type="image/x-icon">
  <link rel="apple-touch-icon" href="{{ asset('/front/') }}/img/icon.png"/>
  <meta property="og:locale" content="en_US" />
  <meta property="og:type" content="article" />
  <meta property="og:site_name" content="Tutelage Study Education Consultants : India" />
  <meta property="og:image" content="https://www.indianuniversities.net/assets/web/img/slider/home-1/germany-banner-4.jpg" />
  <meta property="og:locale" content="en_US" />
  <meta property="og:url" content="<?php echo $fullurl; ?>" />
  <meta property="og:image:alt" content="<?php echo $page_content; ?>" />
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:site" content="Tutelage Study" />
  <meta name="twitter:creator" content="@tutelagestudy" />
  <meta name="twitter:url" content="<?php echo $fullurl; ?>/" />
  <meta name="twitter:title" content="<?php echo $meta_title; ?>" />
  <meta name="twitter:description" content="<?php echo $meta_description; ?>" />
  <meta name="twitter:image" content="https://www.indianuniversities.net/assets/web/img/slider/home-1/germany-banner-4.jpg" />
  <meta property="twitter:image:type" content="image/jpeg" />
  <meta name="google-site-verification" content="SokbVdHyUAjOFBjbYT24LZso--Gh5GaYXY2TKUldJIY" />

  <?php $this->load->view('web/cssjs'); ?>
  <!-- Google Tag Manager -->
  <script>
    (function(w, d, s, l, i) {
      w[l] = w[l] || [];
      w[l].push({
        'gtm.start': new Date().getTime(),
        event: 'gtm.js'
      });
      var f = d.getElementsByTagName(s)[0],
        j = d.createElement(s),
        dl = l != 'dataLayer' ? '&l=' + l : '';
      j.async = true;
      j.src =
        'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
      f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-T4ZDHCD');
  </script>
  <!-- End Google Tag Manager -->
  <script defer src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9059329067714963" crossorigin="anonymous"></script>

  <!-- organization schema code -->
<script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "Organization",
    "@id":"https://www.tutelagestudy.com/#organization",
    "name": "Tutelage Study",
    "url": "https://www.tutelagestudy.com/",
    "logo": "{{ asset('/front/') }}/img/logo_light.png",
    "address": {
      "@type": "PostalAddress",
      "streetAddress": "B-16 Ground Floor, Mayfield Garden, Sector 50",
      "addressLocality": "Gurugram",
      "addressRegion": "Haryana",
      "postalCode": "122002",
      "addressCountry": "India"
    },
    "contactPoint": {
      "@type": "ContactPoint",
      "contactType": "contact",
      "telephone": "+91-9870406867",
      "email": "info@tutelagestudy.com"
    },
    "sameAs": [
      "https://www.facebook.com/tutelagestudyabroad/",
      "https://twitter.com/tutelagestudy",
      "https://www.youtube.com/channel/UCK2eeC1CkS3YkYrGnnzBUEQ",
      "https://in.pinterest.com/tutelagestudy/",
      "https://in.linkedin.com/in/tutelage-study-4085a51ab",
      "https://www.instagram.com/tutelagestudy/",
      "https://www.tumblr.com/tutelagestudyabroad/"
    ]
  }
  </script>

</head>

<?php $this->load->view('web/header/menu-bar-top'); ?>
