<div class="ps-page--product mb-20" style="background-color: white;">
  <div class="ps-container pt-10" id="topuniversities">
    <div class="show-more-box">
      <div class="text">
        <h3 class="title">Top Trending Universities</h3>
        <div class="ps-section__content pb-10">
          <div class="ps-carousel--nav owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="10000"
            data-owl-gap="20" data-owl-nav="true" data-owl-dots="false" data-owl-item="4" data-owl-item-xs="1"
            data-owl-item-sm="1" data-owl-item-md="4" data-owl-item-lg="4" data-owl-item-xl="4" data-owl-duration="1000"
            data-owl-mousedrag="on">
            @foreach ($toptenuni as $row)
              <article class="ps-block--store mb-10">
                <br><br><br>
                <div class="ps-block__content">
                  <div class="ps-block__author">

                    <img src="{{ url($row->imgpath) }}" alt="{{ $row->name }}"
                      style="height:100px!important;border:1px solid #0047ab;" loading="lazy">

                  </div>
                  <p>
                    <a class="ps-block__user" style="height:60px!important"
                      href="{{ url('medical-universities/' . $row->uname) }}">
                      {{ $row->name }}
                    </a>
                  </p>
                </div>
              </article>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
