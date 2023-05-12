<style>
  .hide-this {
    display: none;
  }
</style>

<body>
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-T4ZDHCD" height="0" width="0"
      style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->
  <header class="header header--1">
    <div class="header__top">
      <div class="ps-container">
        <div class="header__left">
          <div class="menu--product-categories">
            <div class="menu__toggle"><i class="icon-menu"></i><span> Tutelage Study</span></div>
            <div class="menu__content">
              <ul class="menu--dropdown">
                <?php
                $whr = ['id !=' => 0];
                $allcat = $this->mm->getDataByOWG('cate_slug', 'ASC', $whr, 'cate_id', 'news');
                foreach ($allcat as $cat) {
                ?>
                <li class="current-menu-item"><a href="<?php echo base_url('blog/' . $cat->cate_slug); ?>"><i
                      class="icon-star"></i>
                    <?php echo ucwords(str_replace('-', ' ', $cat->cate_slug)); ?>
                  </a></li>
                <?php } ?>
              </ul>
            </div>
          </div>
          <a class="ps-logo" href="<?php echo base_url(); ?>"><img
              src="<?php echo base_url('assets/web/'); ?>img/logo_light.png" alt="indian universities logo"></a>
        </div>
        <div class="header__center">
          <form class="ps-form--quick-search" action="<?php echo base_url('medical-universities/') ?>" method="get">
            <input class="form-control" name="search" type="text" placeholder="Search Universities" id="input-search"
              value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
            <button>Search</button>
          </form>
        </div>
        <div class="header__right">
          <div class="header__actions">
            <div class="ps-block--user-header">
              <!-- <div class="ps-block__left"><i class="icon-envelope-open"></i></div>&nbsp;&nbsp; -->
              <div class="ps-block__left"><i class="icon-telephone2"></i></div>
              <div class="ps-block__right">
                <a class="ps-btn" href="tel:+919818560331">Call Now</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <nav class="navigation">
      <div class="ps-container">
        <div class="navigation__left">
          <div class="menu--product-categories">
            <div class="menu__toggle"><i class="icon-menu"></i><span>News Category</span></div>
            <div class="menu__content">
              <ul class="menu--dropdown">
                <?php
                $whr = ['id !=' => 0];
                $allcat = $this->mm->getDataByOWG('cate_slug', 'ASC', $whr, 'cate_id', 'news');
                foreach ($allcat as $cat) {
                ?>
                <li class="current-menu-item">
                  <a href="<?php echo base_url('category/' . $cat->cate_slug); ?>/"><i class="icon-star"></i>
                    <?php echo ucwords(str_replace('-', ' ', $cat->cate_slug)); ?>
                  </a>
                </li>
                <?php } ?>
              </ul>
            </div>
          </div>
        </div>
        <div class="navigation__right">
          <ul class="menu">
            <li><a href="<?php echo base_url(); ?>">Home</a><span class="sub-toggle"></span> </li>

            <li class="menu-item-has-children has-mega-menu"> <a href="javascript:void()">Find Universities</a> <span
                class="sub-toggle"></span>
              <div class="mega-menu">
                <div class="mega-menu__column">
                  <h4>Popular Universities<span class="sub-toggle"></span></h4>
                  <ul class="mega-menu__list">
                    <?php
                    $whrcoe = ['homeview' => 1, 'status' => 1];
                    $tu = $this->mm->getDataByOWL('id', 'RANDOM', $whrcoe, 'universities', '4', '0');
                    foreach ($tu as $tu) {
                    ?>
                    <li class="current-menu-item "><a target="_blank"
                        href="<?php echo base_url($tu->country_slug . '/' . $tu->uname); ?>/">
                        <?php echo $tu->name; ?>
                      </a> </li>
                    <?php } ?>
                  </ul>
                </div>
                <div class="mega-menu__column">
                  <h4>Top Universities<span class="sub-toggle"></span></h4>
                  <ul class="mega-menu__list">
                    <?php
                    $tu = $this->mm->getDataByOWL('id', 'RANDOM', $whrcoe, 'universities', '4', '4');
                    foreach ($tu as $tu) {
                    ?>
                    <li class="current-menu-item ">
                      <a target="_blank" href="<?php echo base_url($tu->country_slug . '/' . $tu->uname); ?>/">
                        <?php echo $tu->name; ?>
                      </a>
                    </li>
                    <?php } ?>
                    <br>
                    <a href="<?php echo base_url('medical-universities/'); ?>/" class="ps-btn btn">All Universities</a>
                  </ul>
                </div>
                <!-- <div class="mega-menu__column">
                  <h4>By Category<span class="sub-toggle"></span></h4>
                  <ul class="mega-menu__list">
                    <?php
                    $getInstType = $this->mm->getInstType();
                    foreach ($getInstType as $row) {
                    ?>
                      <li class="current-menu-item "><a href="<?php echo base_url($row->slug); ?>"><?php echo $row->type; ?></a> </li>
                    <?php } ?>
                  </ul>
                </div> -->
              </div>
            </li>

            <li class="menu-item-has-children has-mega-menu">
              <a href="<?php echo base_url('destinations'); ?>">Destinations</a>
              <span class="sub-toggle"></span>
              <div class="mega-menu">
                <div class="mega-menu__column">
                  <ul class="mega-menu__list">
                    <?php
                    $whr = ['status' => 1];
                    $destinations = $this->mm->getDataByOWL('id', 'RANDOM', $whr, 'destinations', '5', '0');
                    foreach ($destinations as $row) {
                    ?>
                    <li class="current-menu-item"><a href="<?php echo base_url($row->slug); ?>/">
                        <?php echo ucwords($row->page_name); ?>
                      </a> </li>
                    <?php } ?>
                  </ul>
                </div>
              </div>
            </li>

            <li><a href="<?php echo base_url('services'); ?>/">Services</a><span class="sub-toggle"></span></li>
            <li><a href="<?php echo base_url('blog'); ?>/">Blog</a><span class="sub-toggle"></span></li>
            <li><a href="<?php echo base_url('contact-us'); ?>/">Contact Us</a><span class="sub-toggle"></span></li>
            <!-- </ul>
          <ul class="navigation__extra">
            <li><a href="https://www.britannicaoverseas.com/crm/agent-login" target="_blank" class="b1">Be a Partner</a></li>
          </ul> -->
        </div>
      </div>
    </nav>
  </header>
  <header class="header header--mobile" data-sticky="false">
    <div class="navigation--mobile">
      <div class="navigation__left">
        <a class="ps-logo" href="<?php echo base_url(); ?>/">
          <img src="<?php echo base_url('assets/web/'); ?>img/logo_light.png" alt="indian universities logo">
        </a>
      </div>
      <div class="navigation__right">
        <div class="header__actions">
          <div class="ps-block--user-header">
            <div class="ps-block__left pt-15">
              <a href="tel:+8801841661344"><i class="icon-telephone"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <div class="ps-panel--sidebar" id="navigation-mobile">
    <div class="ps-panel__header">
      <h3>Tutelage Study</h3>
    </div>
    <div class="ps-panel__content">
      <ul class="menu--mobile">
        <?php
        $whr = ['id !=' => 0];
        $allcat = $this->mm->getDataByOWG('cate_slug', 'ASC', $whr, 'cate_id', 'news');
        foreach ($allcat as $cat) {
        ?>
        <li class="current-menu-item">
          <a href="<?php echo base_url('category/' . $cat->cate_slug); ?>/">
            <i class="icon-star"></i>
            <?php echo ucwords(str_replace('-', ' ', $cat->cate_slug)); ?>
          </a>
        </li>
        <?php } ?>
      </ul>
    </div>
  </div>
  <div class="navigation--list">
    <div class="navigation__content">
      <a class="navigation__item ps-toggle--sidebar" href="#menu-mobile" aria-label="Left Align">
        <i class="icon-menu" aria-hidden="true"></i><span> Menu</span>
      </a>
      <a class="navigation__item ps-toggle--sidebar" href="#navigation-mobile" aria-label="Left Align">
        <i class="icon-list4" aria-hidden="true"></i><span> Blog</span>
      </a>
      <a class="navigation__item ps-toggle--sidebar" href="#search-sidebar" aria-label="Left Align">
        <i class="icon-magnifier" aria-hidden="true"></i><span> Search</span>
      </a>
    </div>
  </div>
  <div class="ps-panel--sidebar" id="search-sidebar">
    <div class="ps-panel__header">
      <form class="ps-form--search-mobile" action="<?php echo base_url('medical-universities/') ?>" method="get">
        <div class="form-group--nest">
          <input class="form-control" type="text" name="search"
            value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>" placeholder="Search Universities...">
          <button aria-label="Left Align" type="submit"><i class="icon-magnifier" aria-hidden="true"></i></button>
        </div>
      </form>
    </div>
    <div class="navigation__content"></div>
  </div>
  <div class="ps-panel--sidebar" id="menu-mobile">
    <div class="ps-panel__header">
      <h3>Menu</h3>
    </div>
    <div class="ps-panel__content">
      <ul class="menu--mobile">
        <li><a href="<?php echo base_url(); ?>">Home</a><span class="sub-toggle"></span></li>

        <li class="menu-item-has-children has-mega-menu">
          <a href="javascript:void()">Find Universities</a> <span class="sub-toggle"></span>
          <div class="mega-menu">
            <div class="mega-menu__column">
              <h4>Popular Universities<span class="sub-toggle"></span></h4>
              <ul class="mega-menu__list">
                <?php
                $tu = $this->mm->getDataByOWL('id', 'RANDOM', $whrcoe, 'universities', '4', '0');
                foreach ($tu as $tu) {
                ?>
                <li class="current-menu-item ">
                  <a target="_blank" href="<?php echo base_url($tu->country_slug . '/' . $tu->uname); ?>/">
                    <?php echo $tu->name; ?>
                  </a>
                </li>
                <?php } ?>
              </ul>
            </div>
            <div class="mega-menu__column">
              <h4>Top Universities<span class="sub-toggle"></span></h4>
              <ul class="mega-menu__list">
                <?php
                $tu = $this->mm->getDataByOWL('id', 'RANDOM', $whrcoe, 'universities', '4', '4');
                foreach ($tu as $tu) {
                ?>
                <li class="current-menu-item ">
                  <a target="_blank" href="<?php echo base_url($tu->country_slug . '/' . $tu->uname); ?>/">
                    <?php echo $tu->name; ?>
                  </a>
                </li>
                <?php } ?>
                <br>
                <a href="<?php echo base_url('medical-universities/'); ?>/" class="ps-btn btn">All Universities</a>
              </ul>
            </div>
            <div class="mega-menu__column">
              <h4>By Category<span class="sub-toggle"></span></h4>
              <ul class="mega-menu__list">
                <?php
                foreach ($getInstType as $row) {
                  $itslug = slugify($row->inst_type);
                ?>
                <li class="current-menu-item ">
                  <a href="<?php echo base_url($itslug); ?>/">
                    <?php echo $row->inst_type; ?>
                  </a>
                </li>
                <?php } ?>
              </ul>
            </div>
          </div>
        </li>
        <li class="menu-item-has-children has-mega-menu"> <a
            href="<?php echo base_url('destinations'); ?>">Destinations</a><span class="sub-toggle"></span>
          <div class="mega-menu">
            <div class="mega-menu__column">
              <ul class="mega-menu__list" style="display:block">
                <?php
                $whr = ['status' => 1];
                $destinations = $this->mm->getDataByOWL('id', 'RANDOM', $whr, 'destinations', '5', '0');
                foreach ($destinations as $row) {
                ?>
                <li class="current-menu-item"><a href="<?php echo base_url($row->slug); ?>/">
                    <?php echo ucwords($row->page_name); ?>
                  </a> </li>
                <?php } ?>
              </ul>
            </div>
          </div>
        </li>
        <li>
          <a href="<?php echo base_url('compare'); ?>/" class="hidden">Compare Universities</a><span
            class="sub-toggle"></span>
        </li>
      </ul>
    </div>
  </div>