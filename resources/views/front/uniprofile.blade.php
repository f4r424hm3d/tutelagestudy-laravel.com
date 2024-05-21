<div class="ps-page--single ps-page--vendor">
  <section class="ps-store-list">
    <div class="container-fluid" style="padding: 0px!important;">
      <aside class="ps-block--store-banner">
        <div class="ps-block__content bg--cover lazyload" data-background="<?php echo url($university->bannerpath); ?>">
        </div>
        <div class="ps-block__user">
          <div class="ps-block__user-avatar">
            <img data-src="<?php echo url($university->imgpath); ?>" alt="<?php echo $university->name; ?> Logo">
          </div>
          <div class="ps-block__user-content" style="margin-top:20px;">
            <h1 class="white"><i class="icon-graduation-hat"></i> <?php echo $university->name; ?> <?php echo $university->country; ?>: MBBS Fees, Admission</h1>
            <p>
              <i class="icon-map-marker"></i><?php echo $university->country; ?>
            </p>
          </div>
        </div>
      </aside>
    </div>
  </section>
</div>
