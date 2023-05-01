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
  <meta name="copyright" content="Tutelage Study" />
  <meta name="author" content="Tutelage" />
  <meta name="email" content="info@tutelagestudy.com" />
  <meta name="Distribution" content="Global" />
  <meta name="page-topic" content="<?php echo $page_content; ?>" />
  <meta name="language" content="EN" />
  <meta property="og:title" content="<?php echo $meta_title; ?>" />
  <meta property="og:description" content="<?php echo $meta_description; ?>" />
  <link rel="shortcut icon" href="{{ asset('/front/') }}/img/icon.png" type="image/x-icon">
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
      "name": "<?php echo ucwords($title); ?>",
      "description": "<?php echo ucwords($title); ?>",
      "itemListElement": [{
        "@type": "ListItem",
        "position": 1,
        "name": "Home",
        "item": "<?php echo base_url(); ?>"
      }, {
        "@type": "ListItem",
        "position": 2,
        "name": "Services",
        "item": "<?php echo base_url('services'); ?>"
      }, {
        "@type": "ListItem",
        "position": 3,
        "name": "<?php echo $row->headline; ?>",
        "item": "<?php echo base_url($this->uri->uri_string() . '/'); ?>"
      }]
    }
  </script>
  <!-- breadcrumb schema Code End -->
</head>
<?php $this->load->view('web/header/menu-bar-top'); ?>
