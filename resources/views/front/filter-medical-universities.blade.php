<div class="ps-layout__left medicaal-left medical-uni">
  <aside class="widget widget_shop">
    <ul class="ps-list--categories">
      <li class="current-menu-item menu-item-has-children">
        <a data-toggle="collapse">Select Country</a><span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
        <ul class="sub-menu">
          <figure>
            <div class="ps-scrl-bar">
              @foreach ($destinations as $row)
                <label class="check-filter">
                  {{ $row->page_name }}
                  <input type="checkbox" id="pub" name="check" value="{{ $row->country }}"
                    onclick="{{ session()->has('unifilter_destination') && session('unifilter_destination') == $row->id ? "removeAppliedFilter('unifilter_destination')" : "AppliedFilter('unifilter_destination','" . $row->slug . "')" }}"
                    {{ session()->has('unifilter_destination') && session('unifilter_destination') == $row->id ? 'checked' : '' }} />
                  <span class="checkmark"></span>
                </label>
              @endforeach
            </div>
          </figure>
        </ul>
      </li>
    </ul>
  </aside>
</div>
