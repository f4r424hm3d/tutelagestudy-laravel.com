<?php
  header("Content-Type: application/xml; charset=utf-8");
  echo'<?xml version="1.0" encoding="UTF-8" ?>';
?>
<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
  <sitemap>
    <loc><?php echo base_url(); ?>sitemap-home.xml</loc>
  </sitemap>
  <sitemap>
    <loc><?php echo base_url(); ?>sitemap-exams.xml</loc>
  </sitemap>
  <sitemap>
    <loc><?php echo base_url(); ?>sitemap-articles.xml</loc>
  </sitemap>
  <sitemap>
    <loc><?php echo base_url(); ?>sitemap-about-us.xml</loc>
  </sitemap>
  <sitemap>
    <loc><?php echo base_url(); ?>sitemap-course.xml</loc>
  </sitemap>
  <sitemap>
    <loc><?php echo base_url(); ?>sitemap-university.xml</loc>
  </sitemap>
</sitemapindex>
