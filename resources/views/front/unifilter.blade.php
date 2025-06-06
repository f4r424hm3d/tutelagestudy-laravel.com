<style>
  .widget_shop {
    padding: 0px;
    background: #fff;
    border: 1px solid #eee !important;
    margin-bottom: 0px
  }

  .ps-list--categories li {
    padding: 0px
  }

  .ps-list--categories li a {
    background: #eeeeee;
    font-weight: 500;
    padding: 7px 15px
  }

  .ps-list--categories li a:before {
    background: #319a9a;
    content: "";
    width: 3px;
    height: 100%;
    position: absolute;
    left: 0;
    top: 0;
  }

  .ps-list--categories li .sub-toggle {
    height: 36px
  }

  .ps-list--categories li .sub-menu {
    display: block;
    padding: 8px;
  }

  .ps-scrl-bar {
    width: 100%;
    height: 140px;
    overflow-x: none;
    overflow-y: scroll;
    overflow-x: hidden;
  }

  .ps-scrl-bar::-webkit-scrollbar {
    width: 4px
  }

  .ps-scrl-bar::-webkit-scrollbar-track {
    background: #f8f8f8
  }

  .ps-scrl-bar::-webkit-scrollbar-thumb {
    background-color: #319a9a;
    border-radius: 5px
  }

  .ps-form--widget-search {
    padding: 5px 0px;
    margin-bottom: 0px;
  }

  .ps-form--widget-search input {
    height: 25px;
    padding-right: 0px;
    padding-left: 25px;
  }

  .ps-form--widget-search button {
    left: 1px;
    padding-top: 4px;
  }

  .widget_shop figure {
    margin-top: 0px;
    padding-top: 0px;
    margin-bottom: 0px;
    padding-bottom: 0px
  }

  .check-filter {
    display: block;
    position: relative;
    padding-left: 17px;
    margin-top: 2px;
    margin-bottom: 0px;
    cursor: pointer;
    font-size: 12px;
    letter-spacing: 0;
    text-transform: uppercase;
    color: #1c1b1b;
    font-weight: 400;
    line-height: 20px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    text-align: left
  }

  .check-filter input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
    height: 0;
    width: 0
  }

  .checkmark {
    position: absolute;
    top: 3px;
    left: 0;
    height: 14px;
    width: 14px;
    border-radius: 2px;
    background-color: #fff;
    border: 1px solid #ddd;
    -webkit-transition: all .3s ease;
    transition: all .3s ease
  }

  .check-filter:hover input~.checkmark {
    border: 1px solid #319a9a;
    -webkit-transition: all .3s ease;
    transition: all .3s ease
  }

  .check-filter input:checked~.checkmark {
    background-color: #319a9a;
    border: 1px solid #319a9a
  }

  .checkmark:after {
    content: "";
    position: absolute;
    display: none
  }

  .check-filter input:checked~.checkmark:after {
    display: block
  }

  .check-filter .checkmark:after {
    left: 4px;
    top: -1px;
    width: 5px;
    height: 10px;
    border: solid #fff;
    border-width: 0 2px 2px 0;
    -webkit-transform: rotate(45deg);
    -ms-transform: rotate(45deg);
    transform: rotate(45deg)
  }
</style>
<div class="ps-layout__left">
  <aside class="widget widget_shop">
    <ul class="ps-list--categories">
      <li class="current-menu-item menu-item-has-children hide-this">
        <a data-toggle="collapse">Select Institute Type</a><span class="sub-toggle"><i
            class="fa fa-angle-down"></i></span>
        <ul class="sub-menu">
          <figure>
            <div class="ps-scrl-bar">
              <?php
              $getInstType = $this->mm->getInstType();
              foreach ($getInstType as $row) {
              ?>
              <label class="check-filter">
                <?php echo $row->type; ?> <input type="checkbox" id="pub" name="check" value="<?php echo $row->slug; ?>"
                  onclick="<?php echo $_SESSION['unifilter_instype'] == $row->id ? "
                  removeAppliedFilter('unifilter_instype')" : "AppliedFilter('unifilter_instype','" . $row->slug . "')";
                ?>"
                <?php echo $_SESSION['unifilter_instype'] == $row->id ? "checked" : ""; ?> /><span
                  class="checkmark"></span>
              </label>
              <?php } ?>
            </div>
          </figure>
        </ul>
      </li>
      <li class="current-menu-item menu-item-has-children">
        <a data-toggle="collapse">Select Country</a><span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
        <ul class="sub-menu">
          <figure>
            <div class="ps-scrl-bar">
              <?php
              $destination = $this->mm->getDestinationFromUniversity();
              //printArray($destination);
              foreach ($destination as $row) {
              ?>
              <label class="check-filter">
                <?php echo $row->page_name; ?>
                <input type="checkbox" id="pub" name="check" value="<?php echo $row->uni_country_slug; ?>"
                  onclick="<?php echo $_SESSION['unifilter_destination'] == $row->page_name ? "
                  removeAppliedFilter('unifilter_destination')" : "AppliedFilter('unifilter_destination','" .
                  $row->uni_country_slug . "')"; ?>"
                <?php echo $_SESSION['unifilter_destination'] == $row->page_name ? "checked" : ""; ?> />
                <span class="checkmark"></span>
              </label>
              <?php } ?>
            </div>
          </figure>
        </ul>
      </li>
    </ul>
  </aside>
</div>
<script>
  $(document).ready(function() {
    $('#filterlevel').change(function() {
      var val = $('#filterlevel').val();
      var col = 'unifilter_instype';
      //alert(col+' '+val);
      if (val != '') {
        $.ajax({
          url: "<?php echo base_url(); ?>Welcome/setFilterSession",
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
    });
  });

  function AppliedFilter(col, val) {
    alert(col + ' ' + val);
    if (val != '') {
      $.ajax({
        url: "<?php echo base_url(); ?>Welcome/setFilterSession",
        method: "POST",
        data: {
          col: col,
          val: val
        },
        success: function(data) {
          if (col == 'unifilter_instype') {
            window.location.replace("<?php echo base_url(); ?>" + val);
          } else {
            location.reload(true);
          }
        }
      });
    }
  }
</script>
