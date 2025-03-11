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
                <li class="breadcrumb-item active" aria-current="page">{{ $page_title }}</li>
              </ol>
            </div>

          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xl-12">
          <!-- NOTIFICATION FIELD START -->
          <x-result-notification-field />
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
              <!-- IMPORT FORM START -->
              {{-- <x-import-form :pageRoute="$page_route" fileName="exam-papers" /> --}}
              {{-- <hr> --}}
              <!-- IMPORT FORM END -->
              <form action="{{ $url }}/" class="needs-validation" method="post" enctype="multipart/form-data"
                novalidate>
                @csrf
                <div class="row">
                  <div class="col-md-3 col-sm-12 mb-3">
                    <x-number-input type="number" label="Enter Exam Year" name="exam_year" id="exam_year"
                      :ft="$ft" :sd="$sd" min="2000" max="{{ date('Y') }}" />
                  </div>
                  <div class="col-md-3 col-sm-12 mb-3">
                    <x-select-field label="Enter Exam Type" name="exam_type_id" id="exam_type_id" :ft="$ft"
                      :sd="$sd" :list="$examTypes" savev="id" showv="exam_type" />
                  </div>
                  <div class="col-md-3 col-sm-12 mb-3">
                    <x-datalist-field type="text" label="Enter Paper Name" name="paper_name" id="paper_name"
                      :ft="$ft" :sd="$sd" :list="$papers" showv="paper_name" savev="paper_name" />
                  </div>
                  <div class="col-md-3 col-sm-12 mb-3">
                    <x-input-field type="text" label="Enter Shift" name="shift" id="shift" :ft="$ft"
                      :sd="$sd" />
                  </div>
                  <div class="col-md-3 col-sm-12 mb-3">
                    <x-input-field type="date" label="Date of Exam" name="date_of_exam" id="date_of_exam"
                      :ft="$ft" :sd="$sd" />
                  </div>
                  <div class="col-md-3 col-sm-12 mb-3">
                    <x-input-field type="file" label="Upload Question Paper" name="question_paper" id="question_paper"
                      :ft="$ft" :sd="$sd" />
                  </div>
                  <div class="col-md-3 col-sm-12 mb-3">
                    <x-input-field type="file" label="Upload Answer Key" name="answer_key" id="answer_key"
                      :ft="$ft" :sd="$sd" />
                  </div>
                </div>
                <hr>

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
              <table id="datatabl" class="table table-bordered dt-responsive nowrap w-100">
                <thead>
                  <tr>
                    <th>Sr. No.</th>
                    <th>Year</th>
                    <th>Exam Name</th>
                    <th>Paper Name</th>
                    <th>Shift</th>
                    <th>Exam date</th>
                    <th>Questio Paper</th>
                    <th>Answer Key</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @if ($rows->count() > 0)
                    @foreach ($rows as $row)
                      <tr id="row{{ $row->id }}">
                        <td>{{ $i }}</td>
                        <td>{{ $row->exam_year }}</td>
                        <td>{{ $row->exam->exam_type }}</td>
                        <td>{{ $row->paper_name }}</td>
                        <td>{{ $row->shift }}</td>
                        <td>{{ $row->date_of_exam }}</td>
                        <td>
                          @if ($row->question_paper != null && file_exists($row->question_paper))
                            <a href="{{ url($row->question_paper) }}" class="btn btn-xs btn-info"
                              target="_blank">view</a>
                          @else
                            N/A
                          @endif
                        </td>
                        <td>
                          @if ($row->answer_key != null && file_exists($row->answer_key))
                            <a href="{{ url($row->answer_key) }}" class="btn btn-xs btn-info" target="_blank">view</a>
                          @else
                            N/A
                          @endif
                        </td>
                        <td>
                          <x-delete-button :id="$row->id" />
                          <x-edit-button :url="url('admin/' . $page_route . '/update/' . $row->id)" />
                        </td>
                      </tr>
                      @php
                        $i++;
                      @endphp
                    @endforeach
                  @else
                    <tr>
                      <td colspan="9">
                        <center>No data found</center>
                      </td>
                    </tr>
                  @endif
                </tbody>
              </table>
              <div>{!! $rows->links('pagination::bootstrap-5') !!}</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @include('admin.js.delete-data')
@endsection
