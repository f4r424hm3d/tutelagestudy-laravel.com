@php
  echo $utf;
@endphp
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xhtml="http://www.w3.org/1999/xhtml">
  <url>
    <loc><?php echo url('/'); ?></loc>
    <lastmod><?php echo date('Y-m-d'); ?></lastmod>
    <changefreq>always</changefreq>
    <priority>1</priority>
  </url>
</urlset>
