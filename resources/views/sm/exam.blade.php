<?php
header("Content-Type: application/xml; charset=utf-8");
echo '<?xml version="1.0" encoding="UTF-8" ?>';
?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xhtml="http://www.w3.org/1999/xhtml">

  <!-- Sitemap -->
  <?php foreach ($rows as $row) { ?>
    <url>
      <loc><?php echo base_url($row->uri); ?></loc>
      <priority>0.5</priority>
      <changefreq>always</changefreq>
      <lastmod><?php echo date("Y-m-d", strtotime($row->updated_at)); ?></lastmod>
    </url>
    <?php
    $whr = array('pageid' => $row->id);
    $tabs = $this->mm->getDataByOWG('id', 'ASC', ['exam_id' => $row->id], 'tab_title', 'exam_page_contents');
    if (count($tabs) > 0) {
      foreach ($tabs as $tab) {
    ?>
        <url>
          <loc><?php echo base_url($row->uri . '/' . $tab->tab_title); ?></loc>
          <priority>0.5</priority>
          <changefreq>always</changefreq>
          <lastmod><?php echo date("Y-m-d", strtotime($tab->updated_on)); ?></lastmod>
        </url>
      <?php } ?>
  <?php }
  } ?>

</urlset>