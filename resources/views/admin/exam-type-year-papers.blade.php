@extends('admin.layouts.main')
@push('title')
  <title>{{ $page_title }}</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
@endpush
@section('main-section')
  <div class="page-content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">{{ $page_title }}</h4>

            <div class="page-title-right">
              <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="{{ url('/admin/') }}"><i class="mdi mdi-home-outline"></i></a></li>
                <li class="breadcrumb-item"><a href="{{ url('/admin/exam-types/' . $examTypeYear->examType->id) }}">Exam
                    Types</a>
                </li>
                <li class="breadcrumb-item"><a href="{{ url('/admin/exam-type-years/' . $exam_type_year_id) }}">Years</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">{{ $page_title }}</li>
              </ol>
            </div>

          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xl-12">
          <!-- NOTIFICATION FIELD START -->
          <x-result-notification-field></x-result-notification-field>
          <!-- NOTIFICATION FIELD END -->
        </div>
      </div>
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">
                {{ $title }} Record
                <span style="float:right;">
                  <button class="btn btn-xs btn-info tglBtn">+</button>
                  <button class="btn btn-xs btn-info tglBtn hide-this">-</button>
                </span>
              </h4>
            </div>
            <div class="card-body" id="tblCDiv">
              <form id="{{ $ft == 'add' ? 'dataForm' : 'editForm' }}" {{ $ft == 'edit' ? 'action=' . $url . '/' : '' }}
                class="needs-validation" method="post" enctype="multipart/form-data" novalidate>
                @csrf
                <input type="hidden" name="exam_type_year_id" value="{{ $exam_type_year_id }}">
                <div class="row">
                  <div class="col-md-3 col-sm-12 mb-3">
                    <x-datalist-field type="text" label="Enter Paper Name" name="paper_name" id="paper_name"
                      :ft="$ft" :sd="$sd" :list="$papers" showv="paper_name" savev="paper_name" />
                  </div>
                  <div class="col-md-4 col-sm-12 mb-3">
                    <x-input-field type="text" label="Enter Slug" name="slug" id="slug" :ft="$ft"
                      :sd="$sd">
                    </x-input-field>
                  </div>
                  <div class="col-md-3 col-sm-12 mb-3">
                    <x-input-field type="file" label="Upload Question Paper" name="question_paper" id="question_paper"
                      :ft="$ft" :sd="$sd" />
                  </div>
                  <div class="col-md-3 col-sm-12 mb-3 hide-this">
                    <x-input-field type="file" label="Upload Answer Key" name="answer_key" id="answer_key"
                      :ft="$ft" :sd="$sd" />
                  </div>
                </div>
                <!--  SEO INPUT FILED COMPONENT  -->
                <x-SeoField :ft="$ft" :sd="$sd" />
                <!--  SEO INPUT FILED COMPONENT END  -->
                @if ($ft == 'add')
                  <button type="reset" class="btn btn-sm btn-warning  mr-1"><i class="ti-trash"></i>
                    Reset</button>
                @endif
                @if ($ft == 'edit')
                  <a href="{{ aurl($page_route) }}" class="btn btn-sm btn-info "><i class="ti-trash"></i> Cancel</a>
                @endif
                <button class="btn btn-sm btn-primary" type="submit">Submit</button>
              </form>
            </div>
          </div>
          <!-- end card -->
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body" id="trdata">

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    getData();

    function getData(page) {
      if (page) {
        page = page;
      } else {
        var page = '{{ $page_no }}';
      }
      var exam_type_year_id = '{{ $exam_type_year_id }}';
      return new Promise(function(resolve, reject) {
        //$("#migrateBtn").text('Migrating...');
        setTimeout(() => {
          $.ajax({
            url: "{{ aurl($page_route . '/get-data') }}/",
            method: "GET",
            data: {
              page: page,
              exam_type_year_id: exam_type_year_id,
            },
            success: function(data) {
              $("#trdata").html(data);
            }
          });
        });
      });
    }

    function setEditorBlank() {
      CKEDITOR.instances.answer.setData('');
    }

    $(function() {
      var $answer = CKEDITOR.replace('answer');

      $answer.on('change', function() {
        $answer.updateElement();
      });
    });
  </script>
  @include('admin.js.common-form-submit')
  @include('admin.js.common-delete-data')
@endsection
