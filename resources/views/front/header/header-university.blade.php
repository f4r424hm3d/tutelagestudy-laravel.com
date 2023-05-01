<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="googlebot" content=" index, follow " />
  <title><?php echo ucwords($meta_title); ?></title>
  <meta name="description" content="<?php echo $meta_description; ?>">
  <meta name="keywords" content="<?php echo $meta_keyword; ?>">
  <link rel="canonical" href="<?php echo $fullurl; ?>/" />
  <meta name="copyright" content="TutelageStudy.com" />
  <meta name="author" content="Tutelage Study" />
  <meta name="email" content="info@tutelagestudy.com" />
  <meta name="Distribution" content="Global" />
  <meta name="page-topic" content="<?php echo $page_content; ?>" />
  <meta name="language" content="EN" />
  <meta name="revisit-after" content="7 days" />
  <meta name="expires" content="never" />
  <meta name="robots" content="index,follow" />
  <meta property="og:title" content="<?php echo $meta_title; ?>" />
  <meta property="og:description" content="<?php echo $meta_description; ?>" />
  <link rel="shortcut icon" href="{{ asset('/front/') }}/img/icon.png" type="image/x-icon">
  <meta property="og:locale" content="en_US" />
  <meta property="og:type" content="article" />
  <meta property="og:site_name" content="Tutelage Study Education Consultants : India" />
  <link rel="apple-touch-icon" href="{{ asset('/front/') }}/img/icon.png"/>
  <meta property="og:type" content="website" />
  <meta property="og:image" content="<?php echo base_url($ogimgpath); ?>" />
  <meta property="og:locale" content="en_US" />
  <meta property="og:url" content="<?php echo $fullurl; ?>/" />
  <meta property="og:image:alt" content="<?php echo $page_content; ?>" />
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:site" content="Tutelage Study" />
  <meta name="twitter:creator" content="@tutelagestudy" />
  <meta name="twitter:url" content="<?php echo $fullurl; ?>/" />
  <meta name="twitter:title" content="<?php echo $meta_title; ?>" />
  <meta name="twitter:description" content="<?php echo $meta_description; ?>" />
  <meta name="twitter:image" content="<?php echo base_url($ogimgpath); ?>" />
  <meta property="twitter:image:type" content="image/jpeg" />

  <link rel="shortcut icon" href="<?php echo base_url('assets/web/'); ?>img/icon.png" type="image/x-icon">

  <?php $this->load->view('web/cssjs'); ?>
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

  <!-- breadcrumb schema Code -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org/",
    "@type": "BreadcrumbList",
    "name": "<?php echo ucwords($meta_title); ?>",
    "description": "<?php echo $meta_description; ?>",
    "itemListElement": [{
      "@type": "ListItem",
      "position": 1,
      "name": "Home",
      "item": "<?php echo base_url(); ?>"
    }, {
      "@type": "ListItem",
      "position": 2,
      "name": "Universities",
      "item": "<?php echo base_url('medical-universities/'); ?>"
    }, {
      "@type": "ListItem",
      "position": 3,
      "name": "<?php echo $university->name; ?>",
      "item": "<?php echo base_url($this->uri->uri_string() . '/'); ?>"
    }]
  }
  </script> <!-- breadcrumb schema Code End -->

  <!-- webpage schema Code Destinations -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org/",
    "@type": "webpage",
    "url": "<?php echo base_url($this->uri->segment(1) . '/'); ?>",
    "name": "<?php echo $university->name; ?>",
    "description": "<?php echo $meta_description; ?>",
    "inLanguage": "en-US",
    "keywords": [
      "<?php echo $meta_keyword; ?>"
    ]
  }
  </script>

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
  <script defer src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9059329067714963"
    crossorigin="anonymous"></script>

</head>

<?php $this->load->view('web/header/menu-bar-top'); ?>
