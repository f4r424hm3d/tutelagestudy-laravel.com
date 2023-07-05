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
    background: linear-gradient(to right, #0047ab 0%, #0047ab 100%);
    font-weight: 500;
    padding: 7px 15px;
    color: #fff !important
  }

  .ps-list--categories li .sub-toggle {
    height: 36px;
    color: #fff !important
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
    background-color: #0047ab;
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
    background-color: #0047ab;
    border: 1px solid #0047ab
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
      <li class="current-menu-item menu-item-has-children"><a href="javascript:void()" data-toggle="collapse">Select
          Level</a><span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
        <ul class="sub-menu">
          <figure>
            <div class="ps-scrl-bar">
              <?php
              $levels = $this->mm->getLevel();
              foreach ($levels as $level) {
              ?>
              <label class="check-filter">
                <?php echo $level->level; ?>
                <input type="checkbox" id="level<?php echo $level->id; ?>" name="check"
                  value="<?php echo $level->level; ?>"
                  onclick="<?php echo isset($_SESSION['filter_level']) && $_SESSION['filter_level'] == $level->level ? "
                  removeAppliedFilter('filter_level')" : "AppliedFilter('filter_level','" . $level->level . "')"; ?>"
                <?php echo isset($_SESSION['filter_level']) && $_SESSION['filter_level'] == $level->level ? "checked" : ""; ?>>
                <span class="checkmark"></span>
              </label>
              <?php } ?>
            </div>
          </figure>
        </ul>
      </li>
      <li class="current-menu-item menu-item-has-children"><a href="javascript:void()" data-toggle="collapse">Select
          Course</a><span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
        <ul class="sub-menu">
          <figure>
            <div class="ps-scrl-bar">
              <?php
              $whrsg['sg !='] = '';
              if (isset($_SESSION['filter_level'])) {
                $whrsg['level'] = $_SESSION['filter_level'];
              }
              $whrsg['website'] = site_var;
              $sg = $this->mm->getDataByOWG('sg', 'ASC', $whrsg, 'sg', 'university_programs');
              foreach ($sg as $sg) {
              ?>
              <label class="check-filter">
                <?php echo $sg->sg; ?>
                <input type="checkbox" id="crs<?php echo $sg->id; ?>" name="check" value="<?php echo $sg->sg_slug; ?>"
                  onclick="<?php echo isset($_SESSION['filter_sg']) && $_SESSION['filter_sg'] == $sg->sg_slug ? "
                  removeAppliedFilter('filter_sg')" : "AppliedFilter('filter_sg','" . $sg->sg_slug . "')"; ?>"
                <?php echo isset($_SESSION['filter_sg']) && $_SESSION['filter_sg'] == $sg->sg_slug ? "checked" : ""; ?>>
                <span class="checkmark"></span>
              </label>
              <?php } ?>
            </div>
          </figure>
        </ul>
      </li>
      <li class="current-menu-item menu-item-has-children"><a href="javascript:void()" data-toggle="collapse">Select
          Stream</a><span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
        <ul class="sub-menu">
          <figure>
            <div class="ps-scrl-bar">
              <?php
              $whrsg['subject !='] = '';
              if (isset($_SESSION['filter_level'])) {
                $whrsg['level'] = $_SESSION['filter_level'];
              }
              if (isset($_SESSION['filter_sg'])) {
                $whrsg['sg_slug'] = $_SESSION['filter_sg'];
              }
              $whrsg['website'] = site_var;
              $subjects = $this->mm->getDataByOWG('subject', 'ASC', $whrsg, 'subject', 'university_programs');
              foreach ($subjects as $subject) {
              ?>
              <label class="check-filter">
                <?php echo $subject->subject; ?>
                <input type="checkbox" id="subject<?php echo $subject->id; ?>" name="check"
                  value="<?php echo $subject->sub_slug; ?>"
                  onclick="<?php echo isset($_SESSION['filter_specialization']) && $_SESSION['filter_specialization'] == $subject->sub_slug ? "
                  removeAppliedFilter('filter_specialization')" : "AppliedFilter('filter_specialization','" .
                  $subject->sub_slug . "')"; ?>"
                <?php echo isset($_SESSION['filter_specialization']) && $_SESSION['filter_specialization'] == $subject->sub_slug ? "checked" : ""; ?>>
                <span class="checkmark"></span>
              </label>
              <?php } ?>
            </div>
          </figure>
        </ul>
      </li>
      <li class="current-menu-item menu-item-has-children"><a href="javascript:void()" data-toggle="collapse">Select
          Mode</a><span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
        <ul class="sub-menu">
          <figure>
            <div class="ps-scrl-bar">
              <?php
              $stm = $this->mm->getAllData('study_modes');
              foreach ($stm as $stm) {
              ?>
              <label class="check-filter">
                <?php echo $stm->mode; ?>
                <input type="checkbox" id="mode<?php echo $stm->id; ?>" name="check" value="<?php echo $stm->mode; ?>"
                  onclick="<?php echo isset($_SESSION['filter_studymode']) && $_SESSION['filter_studymode'] == $stm->mode ? "
                  removeAppliedFilter('filter_studymode')" : "AppliedFilter('filter_studymode','" . $stm->mode . "')";
                ?>"
                <?php echo isset($_SESSION['filter_studymode']) && $_SESSION['filter_studymode'] == $stm->mode ? "checked" : ""; ?>>
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
  function AppliedFilter(col, val) {
    //alert(col + ' , faraz , ' + val);
    if (val != '') {
      $.ajax({
        url: "<?php echo base_url('Welcome/setFilterSession'); ?>",
        method: "GET",
        data: {
          col: col,
          val: val
        },
        success: function(data) {
          //alert(data);
          if (col == 'filter_specialization') {
            window.location.replace("<?php echo base_url(); ?>" + val + "-courses");
          } else if (col == 'filter_sg') {
            window.location.replace("<?php echo base_url(); ?>courses-in-india");
          } else {
            location.reload(true);
          }
        }
      });
    }
  }
</script>
