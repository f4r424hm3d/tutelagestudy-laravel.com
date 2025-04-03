@extends('front.layouts.main')
@push('seo_meta_tag')
  @include('front.layouts.static_page_meta_tag')
@endpush

@section('main-section')
  <div class="ps-page--single ps-page--vendor">
    <div class="ps-breadcrumb">
      <div class="container">
        <ul class="breadcrumb bread-scrollbar">
          <li><a href="{{ url('/') }}/">Home</a></li>
          <li>Exams</li>
        </ul>
      </div>
    </div>
    <section class="ps-store-list" style="background:#eeeeee">
      <div class="container">
        <div class="ps-section__wrapper">
          <div class="">
            <section class="ps-store-box">

              <div class="ps-blog__content">
                <div class="row">
                  @foreach ($exams as $row)
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 col-12 ">
                      <div class="ps-post ps-product">
                        <div class="ps-post__thumbnail">
                          <a class="ps-post__overlay" href="{{ url($row->exam_slug) }}/"></a>
                        </div>
                        <div class="ps-post__content">
                          <div class="ps-post__meta">
                            <a href="{{ url($row->exam_slug) }}/">
                              {{ $row->exam_name }}
                            </a>
                          </div>
                          <a class="ps-post__title" href="{{ url($row->exam_slug) }}/" title="{{ $row->exam_name }}"
                            data-toggle="tooltip">
                          </a>
                        </div>
                      </div>
                    </div>
                  @endforeach
                </div>
              </div>
            </section>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection
