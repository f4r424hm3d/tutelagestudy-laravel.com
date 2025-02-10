<div class="ps-block--categories-tabs ps-tab-root" data-gssticky="1"
  style="top: 0px; position: sticky; overflow: auto; font-weight: 600; z-index:99; box-shadow: 0px 4px 20px rgb(0 0 0 / 10%);display:none">
  <div class="ps-block__header">
    <div class="ps-carousel--nav ps-tab-list owl-slider" data-owl-auto="false" data-owl-speed="1000" data-owl-gap="0"
      data-owl-nav="true" data-owl-dots="false" data-owl-item="8" data-owl-item-xs="3" data-owl-item-sm="4"
      data-owl-item-md="6" data-owl-item-lg="6" data-owl-duration="500" data-owl-mousedrag="on">

      <a class="{{ Request::segment(3) == '' ? 'active' : '' }}"
        href="{{ url(Request::segment(1) . '/' . Request::segment(2)) }}/">Overview</a>

      @if (count($gc))
        <a class="{{ Request::segment(3) == 'gallery' ? 'active' : '' }}"
          href="{{ url(Request::segment(1) . '/' . Request::segment(2) . '/gallery') }}/">Gallery</a>
      @endif
    </div>
  </div>
</div>
