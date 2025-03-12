@extends('front.layouts.main')
@push('seo_meta_tag')
  @include('front.layouts.static_page_meta_tag')
@endpush
@section('main-section')
  <div class="ps-breadcrumb">
    <div class="ps-container">
      <ul class="breadcrumb bread-scrollbar">
        <li><a href="{{ url('/') }}">Home</a></li>
        <li>Downloads</li>
      </ul>
    </div>
  </div>

  <!-- download start 1  -->
  <section class="download-section py-5">
    <div class="container">

      <div class="tables-detailss">
        <h4><i class="fa-solid fa-magnifying-glass-plus"></i> Previous years Exam Papers</h4>
        <div class="all-tables">
          <form method="get">
            <div class="row align-items-end ">
              <div class="col-12 col-sm-6 col-md-4 col-lg-3 ">
                <div class="form-group">
                  <label for="exam_year">Year</label>
                  <select class="form-control" id="exam_year" name="exam_year">
                    <option value="">Select</option>
                    @foreach ($years as $row)
                      <option value="{{ $row->exam_year }}">{{ $row->exam_year }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-12 col-sm-6 col-md-4 col-lg-3 ">
                <div class="form-group">
                  <label for="exam_type">Exam Type:</label>
                  <select class="form-control" id="exam_type" name="exam_type">
                    <option value="">Select</option>
                  </select>
                </div>
              </div>
              <div class="col-12 col-sm-6 col-md-4 col-lg-3 ">
                <div class="form-group">
                  <label for="paper">Paper:</label>
                  <select class="form-control" id="paper" name="paper">
                    <option value="">select</option>
                  </select>
                </div>
              </div>
              <div class="col-12 col-sm-6 col-md-4 col-lg-3 ">
                <div class="form-group">
                  <label></label>
                  <button type="submit" class="btn btn-outline-secondary w-100">Search</button>
                </div>
              </div>
            </div>
          </form>

          <div class="table-responsive t-alltables">
            {{-- <div class="d-flex justify-content-between align-items-center mt-4 mb-2">
              <ul class="showing-uers d-flex">
                <li>Show</li>
                <li>
                  <select class="form-control" id="exampleFormControlSelect1">
                    <option>10</option>
                    <option>10</option>
                    <option>10</option>
                    <option>10</option>
                    <option>10</option>
                  </select>
                </li>
                <li>entries</li>
              </ul>
              <div class="d-flex align-items-center">
                <span class="mr-2">Search</span>
                <input type="text" class="form-control" placeholder="....">
              </div>
            </div> --}}
            <table id="datatable" class="table table-bordered table-hover">
              <thead class="thead-light">
                <tr>
                  <th>S/N</th>
                  <th>Exam Name</th>
                  <th>Paper Name</th>
                  <th>Year</th>
                  <th>Date of Exam</th>
                  <th>Shift</th>
                  <th>QP</th>
                  <th>AK</th>
                </tr>
              </thead>
              <tbody>
                @if ($examPapers->isEmpty())
                  <tr>
                    <td colspan="8" class="text-center">No records found</td>
                  </tr>
                @else
                  @foreach ($examPapers as $key => $exam)
                    <tr>
                      <td>{{ $key + 1 }}</td>
                      <td>{{ $exam->exam->exam_type }}</td>
                      <td>{{ $exam->paper_name }}</td>
                      <td>{{ $exam->exam_year }}</td>
                      <td>{{ getFormattedDate($exam->date_of_exam, 'd-m-Y') }}</td>
                      <td>{{ $exam->shift }}</td>
                      <td class="text-center">
                        <a href="{{ url($exam->question_paper) }}" class="btn btn-success download-ar">
                          <i class="fa-solid fa-download mx-1"></i>DOWNLOAD
                        </a>
                      </td>
                      <td class="text-center">
                        @if ($exam->answer_key != null)
                          <a href="{{ url($exam->answer_key) }}" class="btn btn-success download-ar">
                            <i class="fa-solid fa-download mx-1"></i>DOWNLOAD
                          </a>
                        @else
                          N/A
                        @endif
                      </td>
                    </tr>
                  @endforeach
                @endif
              </tbody>
            </table>

          </div>
        </div>
      </div>
    </div>
    </div>
  </section>
  <script>
    $(document).ready(function() {
      // Fetch Exam Types based on selected Year
      $('#exam_year').change(function() {
        var year = $(this).val();
        if (year) {
          $.ajax({
            url: "{{ url('get-exam-types') }}",
            type: 'GET',
            data: {
              year: year
            },
            dataType: 'json',
            success: function(response) {
              $('#exam_type').html('<option value="">Select</option>');
              $('#paper').html('<option value="">Select</option>');

              $.each(response, function(index, value) {
                $('#exam_type').append('<option value="' + value.id + '">' + value.name + '</option>');
              });
            }
          });
        } else {
          $('#exam_type').html('<option value="">Select</option>');
          $('#paper').html('<option value="">Select</option>');
        }
      });

      // Fetch Papers based on selected Exam Type
      $('#exam_type').change(function() {
        var examType = $(this).val();
        if (examType) {
          $.ajax({
            url: "{{ url('get-papers') }}",
            type: 'GET',
            data: {
              exam_type: examType
            },
            dataType: 'json',
            success: function(response) {
              $('#paper').html('<option value="">Select</option>');

              $.each(response, function(index, value) {
                $('#paper').append('<option value="' + value.id + '">' + value.name + '</option>');
              });
            }
          });
        } else {
          $('#paper').html('<option value="">Select</option>');
        }
      });
    });


    $(document).ready(function() {
      $("form").submit(function(e) {
        let year = $("#exam_year").val();
        let examType = $("#exam_type").val();
        let paper = $("#paper").val();
        let isValid = true;

        // Remove previous error messages
        $(".error-message").remove();

        if (year === "") {
          $("#exam_year").after('<span class="error-message text-danger">Please select a year.</span>');
          isValid = false;
        }

        if (examType === "") {
          $("#exam_type").after('<span class="error-message text-danger">Please select an exam type.</span>');
          isValid = false;
        }

        if (paper === "") {
          $("#paper").after('<span class="error-message text-danger">Please select a paper.</span>');
          isValid = false;
        }

        if (!isValid) {
          e.preventDefault(); // Prevent form submission if validation fails
        }
      });
    });
  </script>
@endsection
