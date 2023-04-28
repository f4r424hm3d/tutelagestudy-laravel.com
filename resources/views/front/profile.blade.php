    <?php

    $id = $_SESSION['isUserloggedin']['userid'];

    $studentdetail = $this->mm->getAllData3('id', $id, 'students');

    ?>
  @extends('front.layouts.main')
  @push('seo_meta_tag')
  @include('front.layouts.static_page_meta_tag')
  @endpush
  @section('main-section')
    <div class="ps-breadcrumb">

      <div class="ps-container">

        <ul class="breadcrumb bread-scrollbar">

          <li><a href="<?php echo base_url(); ?>">Home</a></li>

          <li>Dashboard</li>

        </ul>

      </div>

    </div>

    <section class="ps-section--account">

      <div class="container">

        <div class="row">

          <?php $this->load->view('web/studentprofilesidebar'); ?>

          <div class="col-lg-9">

            <div class="row">

              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">

                <figure class="ps-block--vendor-status">

                  <figcaption>User Info</figcaption>

                  <table class="table ps-table ps-table--vendor-status">

                    <tbody>

                      <tr>

                        <td width="50%">Student Name</td>

                        <td><?php echo $studentdetail->name; ?></td>

                      </tr>

                      <tr>

                        <td>Eamil</td>

                        <td><?php echo $studentdetail->email; ?></td>

                      </tr>

                      <tr>

                        <td>Phone</td>

                        <td>+<?php echo $studentdetail->c_code . ' ' . $studentdetail->mobile; ?></td>

                      </tr>

                    </tbody>

                  </table>

                </figure>

                <div class="form-group submit">

                  <a href="<?php echo base_url('edit-profile'); ?>" class="ps-btn">Edit Info</a>

                </div>

              </div>

              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 " style="display:<?php echo $studentdetail->d1 == '2' ? 'block' : 'none'; ?>">

                <figure class="ps-block--vendor-status">

                  <figcaption>Student Personal Details</figcaption>

                  <table class="table ps-table ps-table--vendor-status">

                    <tbody>

                      <tr>

                        <td>Passport Number</td>

                        <td><?php echo $studentdetail->passport_number; ?></td>

                      </tr>

                      <tr>

                        <td>Home address</td>

                        <td><?php echo $studentdetail->home_address; ?></td>

                      </tr>

                      <tr>

                        <td>Alternate Contact No</td>

                        <td><?php echo $studentdetail->home_contact_number; ?></td>

                      </tr>

                      <tr>

                        <td>Gender</td>

                        <td><?php echo $studentdetail->gender; ?></td>

                      </tr>

                      <tr>

                        <td>D.O.B</td>

                        <td><?php echo $studentdetail->dob; ?></td>

                      </tr>

                      <tr>

                        <td>Nationality</td>

                        <td><?php echo $studentdetail->nationality; ?></td>

                      </tr>

                      <tr>

                        <td>Religion</td>

                        <td><?php echo $studentdetail->religion; ?></td>

                      </tr>

                    </tbody>

                  </table>

                </figure>

                <!-- <div class="form-group submit">

                  <a href="<?php echo base_url('edit-profile'); ?>" class="ps-btn">Edit Info</a>

                </div> -->

              </div>

              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 " style="display:<?php echo $studentdetail->d4 == '1' ? 'block' : 'none'; ?>">

                <figure class="ps-block--vendor-status">

                  <figcaption>Education and Qualifications</figcaption>

                  <table class="table ps-table ps-table--vendor-status">

                    <thead>

                      <tr>

                        <th>Name</th>

                        <th>School/College Name</th>

                        <th>Passing year</th>

                        <th>result</th>

                      </tr>

                    </thead>

                    <tbody>

                      <?php if ($studentdetail->hs != '') { ?>

                        <tr>

                          <td><?php echo $studentdetail->hs; ?></td>

                          <td><?php echo $studentdetail->hs_school_name; ?></td>

                          <td><?php echo $studentdetail->hs_passing_year; ?></td>

                          <td><?php echo $studentdetail->hs_result; ?></td>

                        </tr>

                      <?php } ?>

                      <?php if ($studentdetail->intr != '') { ?>

                        <tr>

                          <td><?php echo $studentdetail->intr; ?></td>

                          <td><?php echo $studentdetail->intr_school_name; ?></td>

                          <td><?php echo $studentdetail->intr_passing_year; ?></td>

                          <td><?php echo $studentdetail->intr_result; ?></td>

                        </tr>

                      <?php } ?>

                      <?php if ($studentdetail->dip != '') { ?>

                        <tr>

                          <td><?php echo $studentdetail->dip; ?></td>

                          <td><?php echo $studentdetail->dip_school_name; ?></td>

                          <td><?php echo $studentdetail->dip_passing_year; ?></td>

                          <td><?php echo $studentdetail->dip_result; ?></td>

                        </tr>

                      <?php } ?>

                      <?php if ($studentdetail->ug != '') { ?>

                        <tr>

                          <td><?php echo $studentdetail->ug; ?></td>

                          <td><?php echo $studentdetail->ug_school_name; ?></td>

                          <td><?php echo $studentdetail->ug_passing_year; ?></td>

                          <td><?php echo $studentdetail->ug_result; ?></td>

                        </tr>

                      <?php } ?>

                      <?php if ($studentdetail->pg != '') { ?>

                        <tr>

                          <td><?php echo $studentdetail->pg; ?></td>

                          <td><?php echo $studentdetail->pg_school_name; ?></td>

                          <td><?php echo $studentdetail->pg_passing_year; ?></td>

                          <td><?php echo $studentdetail->pg_result; ?></td>

                        </tr>

                      <?php } ?>

                    </tbody>

                  </table>

                </figure>

                <!-- <div class="form-group submit">

                  <a href="<?php echo base_url('edit-profile'); ?>" class="ps-btn">Edit Info</a>

                </div> -->

              </div>

            </div>

          </div>

        </div>

      </div>

    </section>

    <div id="back2top"><i class="pe-7s-angle-up"></i></div>

    <div class="ps-site-overlay"></div>

    <div class="ps-search" id="site-search">

      <a class="ps-btn--close" href="#"></a>

      <div class="ps-search__content">

        <form class="ps-form--primary-search" action="#" method="post">

          <input class="form-control" type="text" placeholder="Search for...">

          <button><i class="aroma-magnifying-glass"></i></button>

        </form>

      </div>

    </div>
    @endsection
