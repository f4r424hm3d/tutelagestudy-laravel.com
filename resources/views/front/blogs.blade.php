@extends('front.layouts.main')
@push('seo_meta_tag')
  @include('front.layouts.static_page_meta_tag')
@endpush
@section('main-section')
  <div class="ps-page--single ps-page--vendor">
    <div class="ps-breadcrumb">
      <div class="container">
        <ul class="breadcrumb bread-scrollbar">
          <li><a href="<?= url('/') ?>">Home</a></li>
          <li><a href="<?= url('blog') ?>/"> Blog</a></li>
        </ul>
      </div>
    </div>
    <section class="ps-store-list" style="background:#eeeeee">
      <div class="container">
        <div class="ps-section__wrapper">
          <section class="ps-store-box">
            <div class="ps-blog__content">
              <a href="" class="btn btn-lg btn-outline-info">Category One <span>34</span></a>
              <a href="" class="btn btn-lg btn-info">Category One <span>34</span></a>
              <a href="" class="btn btn-lg btn-outline-info">Category One <span>34</span></a>
              <div class="row">
                @foreach ($blogs as $row)
                  <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 col-12 ">
                    <div class="ps-post ps-product">
                      <div class="ps-post__thumbnail">
                        <a class="ps-post__overlay"
                          href="{{ route('blog.detail', ['category_slug' => $row->getCategory->slug, 'slug' => $row->slug]) }}/"></a><img
                          data-src="{{ asset($row->imgpath) }}" alt="{{ $row->headline }}"
                          style="height: 150px;!important">
                      </div>
                      <div class="ps-post__content">
                        <div class="ps-post__meta"><a
                            href="{{ url('blog/' . $row->getCategory->slug) }}/">{{ $row->getCategory->slug }}</a></div>

                        <a class="ps-post__title"
                          href="{{ route('blog.detail', ['category_slug' => $row->getCategory->slug, 'slug' => $row->slug]) }}/"
                          title="{{ $row->headline }}" data-toggle="tooltip">
                          {{ strlen($row->headline) > 48 ? substr($row->headline, 0, 48) . '...' : $row->headline }}
                        </a>
                        <p style="margin-bottom:0px; font-size:11px">
                          <?php echo getFormattedDate($row->created_at, 'd M, Y'); ?> by<span> {{ $row->getAuthor->name }}</span>
                        </p>
                      </div>
                    </div>
                  </div>
                @endforeach
              </div>
              {!! $blogs->links('pagination::bootstrap-5') !!}
            </div>
          </section>
        </div>
      </div>
    </section>
  </div>
  <script>
    $(document).ready(function() {
      $('#newscate').change(function() {
        var newscate = $('#newscate').val();
        //alert(newscate);
        if (newscate != '') {
          window.location.replace("{{ url('/blog') }}/" + newscate);
        } else {
          window.location.replace("{{ url('blog') }}/");
        }
      });
    });

    function myfunction(val) {
      //var limit_per_page = $('#limit_per_page').val();
      var col = 'newslist_page_number';
      if (val != '') {
        $.ajax({
          url: "<?php echo url('/'); ?>Welcome/setNewPageNumber",
          method: "POST",
          data: {
            col: col,
            val: val
          },
          success: function(data) {
            location.reload(true);
          }
        });
      }
    }
  </script>
@endsection
