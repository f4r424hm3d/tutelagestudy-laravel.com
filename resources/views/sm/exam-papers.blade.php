@php
  echo $utf;
@endphp
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xhtml="http://www.w3.org/1999/xhtml">
  <!-- Sitemap -->
  @foreach ($examTypes as $row1)
    <url>
      <loc>{{ route('paper1', ['exam_type_slug' => $row1->exam_type_slug, 'exam_type_title_slug' => $row1->slug]) }}/
      </loc>
      <priority>1</priority>
      <changefreq>always</changefreq>
      <lastmod>{{ date('Y-m-d', strtotime($row1->updated_at)) }}</lastmod>
    </url>
    @foreach ($row1->years as $row2)
      <url>
        <loc>
          {{ route('paper2', ['exam_type_slug' => $row1->exam_type_slug, 'exam_type_title_slug' => $row1->slug, 'year_slug' => $row2->slug]) }}/
        </loc>
        <priority>0.50</priority>
        <changefreq>always</changefreq>
        <lastmod>{{ date('Y-m-d', strtotime($row2->updated_at)) }}</lastmod>
      </url>
      @foreach ($row2->papers as $row3)
        <url>
          <loc>
            {{ route('paper3', ['exam_type_slug' => $row1->exam_type_slug, 'exam_type_title_slug' => $row1->slug, 'year_slug' => $row2->slug, 'paper_slug' => $row3->slug]) }}/
          </loc>
          <priority>0.50</priority>
          <changefreq>always</changefreq>
          <lastmod>{{ date('Y-m-d', strtotime($row3->updated_at)) }}</lastmod>
        </url>
      @endforeach
    @endforeach
  @endforeach

</urlset>
