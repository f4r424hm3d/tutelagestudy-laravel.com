@php
  echo $utf;
@endphp
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xhtml="http://www.w3.org/1999/xhtml">
  <!-- Sitemap -->
  <?php foreach ($universities as $row) { ?>
  <url>
    <loc>{{ url('medical-universities/' . $row->uname) }}/</loc>
    <priority>0.51</priority>
    <changefreq>always</changefreq>
    <lastmod><?php echo date('Y-m-d', strtotime($row->updated_at)); ?></lastmod>
  </url>
  <?php } ?>

</urlset>
