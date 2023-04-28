<?php

$stream = $_GET['stream'];

$level = $_GET['level'];

$where = ['id !=' => 0, 'sub_slug' => $stream, 'level' => $level];

$allprog = $this->mm->getDataByOW('id', 'ASC', $where, 'university_programs');

//printArray($allprog);

?>
@extends('front.layouts.main')
@push('seo_meta_tag')
@include('front.layouts.static_page_meta_tag')
@endpush
@section('main-section')
<link rel='stylesheet' id='wb-table-grid-public-css-css' href='<?php echo base_url('assets/web/') ?>compare/wb-table-grid-public.css' type='text/css' media='all' />

<link rel='stylesheet' id='style-responsive-css' href='<?php echo base_url('assets/web/') ?>compare/style-responsive.css' type='text/css' media='all' />

<link rel='stylesheet' id='style-custom-css' href='<?php echo base_url('assets/web/') ?>compare/style-custom.css' type='text/css' media='all' />



<link rel='stylesheet' id='searchwp-live-search-css' href='<?php echo base_url('assets/web/') ?>compare/style.css' type='text/css' media='all' />

<link rel='stylesheet' id='tablepress-default-css' href='<?php echo base_url('assets/web/') ?>compare/tablepress-combined.min.css' type='text/css' media='all' />

<script type='text/javascript' src='<?php echo base_url('assets/web/') ?>compare/jquery.js'></script>

<script type='text/javascript' src='<?php echo base_url('assets/web/') ?>compare/jquery-migrate.min.js'></script>

<script type='text/javascript' src='<?php echo base_url('assets/web/') ?>compare/wb-table-grid-public.js'></script>

<style>
  ul:not(.browser-default) {

    margin-left: 0px
  }
</style>



<div class="ps-breadcrumb">

  <div class="ps-container">

    <ul class="breadcrumb bread-scrollbar">

      <li><a href="<?php echo base_url(); ?>">Home</a></li>

      <li><a href="<?php echo base_url('compare'); ?>">Compare Universities</a></li>

      <li><span><?php echo $allprog[0]->subject; ?></span></li>

    </ul>

  </div>

</div>



<div class="gdlr-content">



  <div class="compare-header">

    <div class="container">

      <h2>Compare the Top Universities in the India</h2>

      <div class="row">

        <div class="col-md-4">

          <select id="flevel" name="flevel">

            <option value="">Select Level</option>

            <option value="CERTIFICATE">CERTIFICATE</option>

            <option value="PRE-UNIVERSITY">PRE-UNIVERSITY</option>

            <option value="DIPLOMA">DIPLOMA</option>

            <option value="UNDER-GRADUATE">UNDER-GRADUATE</option>

            <option value="POST-GRADUATE">POST-GRADUATE</option>

            <option value="PHD-DOCTORATE">PHD-DOCTORATE</option>

          </select>

        </div>

        <div class="col-md-4">

          <select id="fsg" name="fsg">

            <option value="">Select Course</option>

          </select>

        </div>

        <div class="col-md-4">

          <select id="fspclzn" name="fspclzn">

            <option value="">Select Specialization</option>

          </select>

        </div>

        <!-- <div class="col-md-3">

          <select id="f_prog" name="f_prog">

            <option value="">Select Program</option>

          </select>

        </div> -->

      </div>

      <center>

        <a class="compare-btn">

          <span onclick="compareCollege()"><i class="fa fa-compress" aria-hidden="true"></i> Compare University</span>

        </a>

      </center>

    </div>

  </div>





  <div class="main-content-container container gdlr-item-start-content">

    <div class="gdlr-item gdlr-main-content">

      <h1>Find &amp; Compare <a target="_blank" href="<?php echo base_url($allprog[0]->sub_slug); ?>"><?php echo $allprog[0]->subject; ?></a> Courses in India</h1>

      <h3 style="font-weight: normal;">Gain practical &amp; industry-specific knowledge in the field of Accounting through a <strong><a target="_blank" href="<?php echo base_url($allprog[0]->sub_slug); ?>"><?php echo $allprog[0]->subject; ?></a></strong> course. Learn more about each institution&#8217;s <strong><a target="_blank" href="<?php echo base_url($allprog[0]->sub_slug); ?>"><?php echo $allprog[0]->subject; ?></a></strong> and find out which college / university suits you best.</h3>

      <div class="clear"></div>

      <div class="gdlr-space" style="margin-top: 40px;"></div>

      <div style="width: 2107px; margin-left: auto; margin-right: auto;">



        <div class="WBGridPublic-table">

          <div class="WBGridPublic-arrow">

            <button class="WBGridArrow-preview">

              <svg width="30px" viewBox="0 0 32 32" version="1.1" id="Layer_1" height="50px" enable-background="new 0 0 32 32">

                <path d="M7.701,14.276l9.586-9.585c0.879-0.878,2.317-0.878,3.195,0l0.801,0.8c0.878,0.877,0.878,2.316,0,3.194L13.968,16l7.315,7.315c0.878,0.878,0.878,2.317,0,3.194l-0.801,0.8c-0.878,0.879-2.316,0.879-3.195,0l-9.586-9.587C7.229,17.252,7.02,16.62,7.054,16C7.02,15.38,7.229,14.748,7.701,14.276z" />

              </svg>

            </button>

          </div>

          <div class="WBGridPublic-content">

            <div class="WBGridContent-table">

              <div class="WBGridSidebar">

                <ul>

                  <div class="WBGridTable-topRow">



                    <li class="WBGridTable-data toprow column1-row1">

                      <div class="WBGridTable-middle ">

                        <span>

                        </span>

                      </div>

                    </li>

                    <li class="WBGridTable-data toprow column1-row2">

                      <div class="WBGridTable-middle ">

                        <span>

                        </span>

                      </div>

                    </li>

                    <li class="WBGridTable-data toprow column1-row3">

                      <div class="WBGridTable-middle ">

                        <span>

                        </span>

                      </div>

                    </li>

                  </div>



                  <li class="column1-row4">

                    <div class="WBGridTable-middle ">

                      <span>

                        <strong>Qualification</strong> </span>

                    </div>

                  </li>

                  <li class="column1-row5">

                    <div class="WBGridTable-middle ">

                      <span>

                        <strong>Campus</strong> </span>

                    </div>

                  </li>

                  <li class="column1-row6">

                    <div class="WBGridTable-middle ">

                      <span>

                        <strong>Intakes</strong> </span>

                    </div>

                  </li>

                  <li class="column1-row7">

                    <div class="WBGridTable-middle ">

                      <span>

                        <strong>Course Duration</strong> </span>

                    </div>

                  </li>

                  <li class="column1-row8">

                    <div class="WBGridTable-middle ">

                      <span>

                        <strong>Entry Requirements</strong> </span>

                    </div>

                  </li>

                  <li class="column1-row9">

                    <div class="WBGridTable-middle ">

                      <span>

                        <strong>Total Estimated Fees</strong> </span>

                    </div>

                  </li>

                  <li class="column1-row10">

                    <div class="WBGridTable-middle ">

                      <span>

                        <strong>Exam Required</strong> </span>

                    </div>

                  </li>

                  <li class="column1-row11">

                    <div class="WBGridTable-middle ">

                      <span>

                        <strong>Study Mode</strong> </span>

                    </div>

                  </li>

                  <li class="column1-row12">

                    <div class="WBGridTable-middle ">

                      <span>

                        <strong>Mode Of Instruction</strong> </span>

                    </div>

                  </li>

                  <li class="column1-row13">

                    <div class="WBGridTable-middle ">

                      <span>

                        <strong>Scholarships</strong> </span>

                    </div>

                  </li>

                  <li class="column1-row11">

                    <div class="WBGridTable-middle ">

                      <span>

                      </span>

                    </div>

                  </li>

                </ul>

              </div>



              <div class="WBGridContent">

                <div class="WBGridContent-hidden">

                  <div class="WBGridContent-hiddenWidth">

                    <?php

                    foreach ($allprog as $row) {

                      $unv = $this->mm->getDataById($row->u_id, 'universities');

                    ?>

                      <ul class="WBGridContent-cell">



                        <div class="WBGridTable-topRow">

                          <li class="WBGridTable-data toprow column2-row1">

                            <div class="WBGridTable-middle">

                              <span>

                                <div class="WBGridTable-content ">

                                  <a href="<?php echo base_url($unv->uname); ?>" target="_blank">

                                    <img src="<?php echo $unv->imgpath; ?>" alt="<?php echo $unv->name; ?>" />

                                  </a>

                                </div>

                              </span>

                            </div>

                          </li>

                          <li class="WBGridTable-data toprow column2-row2">

                            <div class="WBGridTable-middle">

                              <span>

                                <div class="WBGridTable-content ">

                                  <div style="margin: 8px;">

                                    <strong><?php echo $unv->name; ?></strong>

                                  </div>

                                </div>

                              </span>

                            </div>

                          </li>

                          <li class="WBGridTable-data toprow column2-row3">

                            <div class="WBGridTable-middle">

                              <span>

                                <div class="WBGridTable-content wbGrids-button">

                                  <?php if (!isset($_SESSION['isUserloggedin'])) { ?>

                                    <a class="gdlr-button small" href="<?php echo base_url('sign-up'); ?>" style="margin: 5px 0px">Apply</a>

                                  <?php } else { ?>

                                    <a class="gdlr-button small" href="<?php echo base_url('Welcome/directApply/' . $row->id); ?>" target="_self" style="margin: 5px 0px">Apply</a>

                                  <?php } ?>

                                </div>

                              </span>

                            </div>

                          </li>

                        </div>



                        <li class="WBGridTable-data column2-row4">

                          <div class="WBGridTable-middle">

                            <span>

                              <div class="WBGridTable-title ">

                                <strong>Qualification</strong>

                              </div>

                              <div class="WBGridTable-content "><?php echo $row->course_name; ?></div>

                            </span>

                          </div>

                        </li>

                        <li class="WBGridTable-data column2-row5">

                          <div class="WBGridTable-middle">

                            <span>

                              <div class="WBGridTable-title ">

                                <strong>Campus</strong>

                              </div>

                              <div class="WBGridTable-content "><?php echo $unv->city != '' ? $unv->city : 'N/A'; ?></div>

                            </span>

                          </div>

                        </li>

                        <li class="highlight column2-row6">

                          <div class="WBGridTable-middle">

                            <span>

                              <div class="WBGridTable-title ">

                                <strong>Intakes</strong>

                              </div>

                              <div class="WBGridTable-content "><?php echo $row->intake != '' ? $row->intake : 'N/A'; ?></div>

                            </span>

                          </div>

                        </li>

                        <li class="WBGridTable-data column2-row7">

                          <div class="WBGridTable-middle">

                            <span>

                              <div class="WBGridTable-title ">

                                <strong>Course Duration</strong>

                              </div>

                              <div class="WBGridTable-content "><?php echo $row->duration != '' ? $row->duration : 'N/A'; ?></div>

                            </span>

                          </div>

                        </li>

                        <li class="WBGridTable-data column2-row8">

                          <div class="WBGridTable-middle">

                            <span>

                              <div class="WBGridTable-title ">

                                <strong>Entry Requirements</strong>

                              </div>

                              <div class="WBGridTable-content "><?php echo $row->entry_requirement != '' ? $row->entry_requirement : 'N/A'; ?></div>

                            </span>

                          </div>

                        </li>

                        <li class="highlight column2-row9">

                          <div class="WBGridTable-middle">

                            <span>

                              <div class="WBGridTable-title ">

                                <strong>Total Estimated Fees</strong>

                              </div>

                              <div class="WBGridTable-content "><?php echo $row->tution_fee != '' ? $row->tution_fee : 'N/A'; ?></div>

                            </span>

                          </div>

                        </li>

                        <li class="WBGridTable-data column2-row10">

                          <div class="WBGridTable-middle">

                            <span>

                              <div class="WBGridTable-title">

                                <strong>Exam Required</strong>

                              </div>

                              <div class="WBGridTable-content "><?php echo $row->exam_required != '' ? $row->exam_required : 'N/A'; ?></div>

                            </span>

                          </div>

                        </li>

                        <li class="WBGridTable-data column2-row11">

                          <div class="WBGridTable-middle">

                            <span>

                              <div class="WBGridTable-title">

                                <strong>Study Mode</strong>

                              </div>

                              <div class="WBGridTable-content "><?php echo $row->study_mode != '' ? $row->study_mode : 'N/A'; ?></div>

                            </span>

                          </div>

                        </li>

                        <li class="WBGridTable-data column2-row12">

                          <div class="WBGridTable-middle">

                            <span>

                              <div class="WBGridTable-title">

                                <strong>Mode Of Instruction</strong>

                              </div>

                              <div class="WBGridTable-content "><?php echo $row->mode_of_instruction != '' ? $row->mode_of_instruction : 'N/A'; ?></div>

                            </span>

                          </div>

                        </li>

                        <li class="WBGridTable-data column2-row13">

                          <div class="WBGridTable-middle">

                            <span>

                              <div class="WBGridTable-title ">

                                <strong>Scholarships</strong>

                              </div>

                              <div class="WBGridTable-content "><?php echo $row->scholarship_info != '' ? $row->scholarship_info : 'N/A'; ?></div>

                            </span>

                          </div>

                        </li>

                        <li class="WBGridTable-data column2-row14">

                          <div class="WBGridTable-middle">

                            <span>

                              <div class="WBGridTable-content wbGrids-button">

                                <?php if (!isset($_SESSION['isUserloggedin'])) { ?>

                                  <a data-toggle="modal" data-target="#modal1" class="gdlr-button small" href="#" target="_self" style="margin: 5px 0px">Apply</a>

                                <?php } else { ?>

                                  <a class="gdlr-button small" href="<?php echo base_url('Welcome/directApply/' . $row->id); ?>" target="_self" style="margin: 5px 0px">Apply</a>

                                <?php } ?>

                              </div>

                            </span>

                          </div>

                        </li>

                        <li class="WBGrid-lessMoreButton">

                          <button>MORE</button>

                        </li>

                      </ul>

                    <?php } ?>

                  </div>

                </div>

              </div>

            </div>

          </div>

          <div class="WBGridPublic-arrow">

            <button class="WBGridArrow-next">

              <svg width="30px" viewBox="0 0 32 32" height="50px" enable-background="new 0 0 32 32">

                <path d="M24.291,14.276L14.705,4.69c-0.878-0.878-2.317-0.878-3.195,0l-0.8,0.8c-0.878,0.877-0.878,2.316,0,3.194L18.024,16l-7.315,7.315c-0.878,0.878-0.878,2.317,0,3.194l0.8,0.8c0.878,0.879,2.317,0.879,3.195,0l9.586-9.587c0.472-0.471,0.682-1.103,0.647-1.723C24.973,15.38,24.763,14.748,24.291,14.276z" />

              </svg>

            </button>

          </div>

        </div>

      </div>

      <div class="clear"></div>

    </div>

  </div>

</div>

<script src="https://www.educationmalaysia.in/em/assets/web/js/lib.min.js"></script>

<script>
  function compareCollege() {

    var stream = $('#fspclzn').val();

    var level = $('#flevel').val();

    if (stream != '') {

      window.open('<?php echo base_url('compare'); ?>' + '?stream=' + stream + '&level=' + level, '_self');

    } else {

      alert('Select stream');

    }

  }

  $(document).ready(function() {

    $('#flevel').change(function() {

      var flevel = $('#flevel').val();

      //alert(flevel);

      if (flevel != '') {

        $.ajax({

          url: "<?php echo base_url(); ?>Welcome/fetchsg",

          method: "POST",

          data: {

            flevel: flevel

          },

          success: function(data) {

            $('#fsg').html(data);

          }

        });

      }

    });

    $('#fsg').change(function() {

      var flevel = $('#flevel').val();

      var fsg = $('#fsg').val();

      if (fsg != '') {

        $.ajax({

          url: "<?php echo base_url(); ?>Welcome/fetchSpclzn",

          method: "POST",

          data: {

            fsg: fsg,

            flevel: flevel

          },

          success: function(data) {

            $('#fspclzn').html(data);

          }

        });

      }

    });

    // $('#fspclzn').change(function() {

    //   var flevel = $('#flevel').val();

    //   var fsg = $('#fsg').val();

    //   var fspcl = $('#fspclzn').val();

    //   if (fspcl != '') {

    //     $.ajax({

    //       url: "<?php echo base_url(); ?>Welcome/fetchCourse",

    //       method: "POST",

    //       data: {

    //         fsg: fsg,

    //         flevel: flevel,

    //         fspcl: fspcl,

    //       },

    //       success: function(data) {

    //         $('#f_prog').html(data);

    //       }

    //     });

    //   }

    // });

  });
</script>

<script>
  $(".accordion1 > .active").slideDown();

  $(".accordion1 > .heading").click(function() {

    $(this).siblings(".box").removeClass("active").next(".box").slideUp();

    $(this).toggleClass("active").next(".box").slideToggle();

  });
</script>
@endsection
