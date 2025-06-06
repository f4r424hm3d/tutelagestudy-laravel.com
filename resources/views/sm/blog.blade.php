@php
  echo $utf;
@endphp
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xhtml="http://www.w3.org/1999/xhtml">
  <url>
    <loc>{{ url('/blog/') }}/</loc>
    <lastmod><?php echo date('Y-m-d'); ?></lastmod>
    <changefreq>always</changefreq>
    <priority>1</priority>
  </url>
  <?php foreach ($categories as $row) { ?>
  <url>
    <loc>{{ url('/blog/' . $row->slug) }}/</loc>
    <priority>0.80</priority>
    <changefreq>always</changefreq>
    <lastmod><?php echo date('Y-m-d', strtotime($row->updated_at)); ?></lastmod>
  </url>
  <?php } ?>

  <?php foreach ($news as $row) { ?>
  <url>
    <loc>{{ url('/blog/' . $row->getCategory->slug . '/' . $row->slug) }}/</loc>
    <priority>0.50</priority>
    <changefreq>always</changefreq>
    <lastmod><?php echo date('Y-m-d', strtotime($row->updated_at)); ?></lastmod>
  </url>
  <?php } ?>

</urlset>
