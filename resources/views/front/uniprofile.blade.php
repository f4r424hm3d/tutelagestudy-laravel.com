<div class="ps-page--single ps-page--vendor">
  <section class="ps-store-list">
    <div class="container-fluid" style="padding: 0px!important;">
      <aside class="ps-block--store-banner">
        <div class="ps-block__content bg--cover lazyload" data-background="{{ cdn($university->bannerpath) }}">
        </div>
        <div class="ps-block__user">
          <div class="ps-block__user-avatar">
            <div class="university-imaages">
              <img src="{{ url($university->imgpath) }}" alt="{{ $university->name }} Logo">
            </div>
          </div>
          <div class="ps-block__user-content" style="margin-top:20px;">
            <h1 class="white"><i class="icon-graduation-hat"></i> {{ $university->name }} {{ $university->country }}:
              MBBS Fees, Admission</h1>
            <p>
              <i class="icon-map-marker"></i>{{ $university->country }}
            </p>
          </div>
        </div>
      </aside>
    </div>
  </section>
</div>
