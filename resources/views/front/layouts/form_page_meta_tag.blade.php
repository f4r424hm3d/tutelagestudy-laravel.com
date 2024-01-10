@php
use App\Models\Seo;
$page_url = url()->current();
$url = Request::segment(1)??'home';
$seo = Seo::where(['url' => $url])->first();
$site = url('/');
$tagArray = ['currentmonth' => date('M'), 'currentyear' => date('Y'), 'site' => $site];

$meta_title = $seo->meta_title??'';
$meta_title = replaceTag($meta_title, $tagArray);

$meta_keyword = $seo->meta_keyword??'';
$meta_keyword = replaceTag($meta_keyword, $tagArray);

$meta_description = $seo->meta_description??'';
$meta_description = replaceTag($meta_description, $tagArray);

$page_content = $seo->page_content??'';
$page_content = replaceTag($page_content, $tagArray);

$seo_rating = $seo->seo_rating??'';
$og_image_path = $seo->og_image_path??'';
@endphp

<title>
  <?php echo ucwords($meta_title); ?>
</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<meta name="description" content="<?php echo $meta_description; ?>">
<meta name="keywords" content="<?php echo $meta_keyword; ?>">
<link rel="canonical" href="<?php echo $page_url; ?>/" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="robots" content="index, follow" />
<meta property="og:locale" content="en_US" />
<meta property="og:type" content="profile" />
<meta property="og:title" content="<?php echo $title; ?>" />
<meta property="og:url" content="{{ $page_url }}/" />
<meta property="og:site_name" content="Tutelage Study" />
<meta property="og:image:alt" content="Tutelage Study" />
<meta property="og:image:type" content="image/png" />
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:title" content="<?php echo $title; ?>" />
<meta name="twitter:site" content="@tutelagestudy" />
<link rel="shortcut icon" href="{{ asset('/front/') }}/img/icon.png" type="image/x-icon">
<link rel="apple-touch-icon" href="{{ asset('/front/') }}/img/icon.png" />
@include('front.cssjs')
<!-- organization schema code -->
<script type="application/ld+json">
  {

      "@context": "https://schema.org",

      "@type": "Organization",

      "@id": "https://www.tutelagestudy.com/#organization",

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

        "item": "<?php echo url('/'); ?>"

      }, {

        "@type": "ListItem",

        "position": 2,

        "name": "<?php echo $title; ?>",

        "item": "<?php echo url('/'); ?>"

      }]

    }
</script>
<!-- breadcrumb schema Code End -->
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
