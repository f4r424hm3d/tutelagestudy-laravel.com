@php
  $page_id = Request::segment(3);
  $tab_id = Request::segment(4) ?? null;
@endphp
@extends('admin.layouts.main')
@push('title')
  <title>{{ $page_title }}</title>
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
      @include('admin.destination-tab-menu')
      @if ($tab_id != null)
        <div class="row">
          <div class="col-xl-12">
            <!-- NOTIFICATION FIELD START -->
            <x-ResultNotificationField></x-ResultNotificationField>
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
              <div class="card-body {{ $ft == 'edit' ? '' : 'hide-this' }}" id="tblCDiv">
                <!-- IMPORT FORM START -->
                {{--  <x-ImportForm :pageRoute="$page_route" fileName="course-specializations"></x-ImportForm>
            <hr>  --}}
                <!-- IMPORT FORM END -->
                <form action="{{ $url }}/" class="needs-validation" method="post" enctype="multipart/form-data"
                  novalidate>
                  @csrf
                  <input type="hidden" name="page_id" value="{{ $page_id }}">
                  <input type="hidden" name="tab_id" value="{{ $tab_id }}">
                  <div class="row">
                    <div class="col-md-12 col-sm-12 mb-3">
                      <x-InputField type="text" label="Title" name="title" id="title" :ft="$ft"
                        :sd="$sd"></x-InputField>
                    </div>
                    <div class="col-md-12 col-sm-12 mb-3">
                      <x-TextareaField label="Tab Content" name="tab_content" id="tab_content" :ft="$ft"
                        :sd="$sd"></x-TextareaField>
                    </div>
                    <div class="col-md-6 col-sm-12 mb-3">
                      <x-select-field type="text" label="Select Parent Title" name="parent_id" id="parent_id"
                        :ft="$ft" :sd="$sd" :list="$parentContents" showv="title" savev="id">
                      </x-select-field>
                    </div>
                    <div class="col-md-2 col-sm-12 mb-3">
                      <x-number-input type="number" label="Position" name="priority" id="priority" :ft="$ft"
                        :sd="$sd">
                      </x-number-input>
                    </div>
                  </div>
                  @if ($ft == 'add')
                    <button type="reset" class="btn btn-sm btn-warning  mr-1"><i class="ti-trash"></i> Reset</button>
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
              <div class="card-header">
                <h4 class="card-title">
                  {{ $page_title }} List
                </h4>
              </div>
              <div class="card-body">
                <table id="datatable" class="table table-bordered dt-responsiv nowra w-100">
                  <thead>
                    <tr>
                      <th>S.No.</th>
                      <th>Position</th>
                      <th>Title</th>
                      <th>Content</th>
                      <th>Parent Title</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                      $i = 1;
                    @endphp
                    @foreach ($rows as $row)
                      <tr id="row{{ $row->id }}">
                        <td>{{ $i }}</td>
                        <td><input onchange="updatePriority('<?php echo $row->id; ?>',this.value)"
                            style="width:60px!important;" type="number" value="<?php echo $row->priority; ?>" min="0"></td>
                        <td><?php echo $row->title; ?></td>
                        <td>
                          @if ($row->tab_content != null)
                            <button type="button" class="btn btn-xs btn-outline-info waves-effect waves-light"
                              data-bs-toggle="modal"
                              data-bs-target="#DesModalScrollable{{ $row->id }}">View</button>
                            <div class="modal fade" id="DesModalScrollable{{ $row->id }}" tabindex="-1"
                              role="dialog" aria-labelledby="DesModalScrollableTitle{{ $row->id }}"
                              aria-hidden="true">
                              <div class="modal-dialog modal-dialog-scrollable">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="DesModalScrollableTitle{{ $row->id }}">
                                      SEO
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                      aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                    {!! $row->tab_content !!}
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                          @else
                            Null
                          @endif
                        </td>
                        <td>
                          {{ $row->parent->title ?? 'N/A' }}
                        </td>
                        <td>
                          <a href="javascript:void()" onclick="DeleteAjax('{{ $row->id }}')"
                            class="waves-effect waves-light btn btn-xs btn-outline btn-danger">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                          </a>
                          <a href="{{ url('admin/' . $page_route . '/' . $page_id . '/' . $tab_id . '/update/' . $row->id) }}"
                            class="waves-effect waves-light btn btn-xs btn-outline btn-info">
                            <i class="fa fa-edit" aria-hidden="true"></i>
                          </a>
                        </td>
                      </tr>
                      @php
                        $i++;
                      @endphp
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      @endif
    </div>
  </div>
  <script>
    setPosition();

    function setPosition() {
      //alert('Hello');
      var ft = '{{ $ft }}';
      var lastPosition = '{{ $lastPosition }}';
      if (ft == 'add') {
        $("#priority").val(lastPosition);
      }
    }

    function updatePriority(id, val) {
      var tbl = 'destination_page_contents';
      var col = 'priority';
      //alert(id + ' , ' + val + ' , ' + tbl + ' , ' + col);
      $.ajax({
        url: "{{ url('common/update-field/') }}",
        method: "GET",
        data: {
          id: id,
          tbl: tbl,
          col: col,
          val: val
        },
        success: function(data) {
          //alert(data);
        }
      });
    }

    function DeleteAjax(id) {
      //alert(id);
      var cd = confirm("Are you sure ?");
      if (cd == true) {
        $.ajax({
          url: "{{ url('admin/' . $page_route . '/delete') }}" + "/" + id,
          success: function(data) {
            if (data == '1') {
              var h = 'Success';
              var msg = 'Record deleted successfully';
              var type = 'success';
              $('#row' + id).remove();
              $('#toastMsg').text(msg);
              $('#liveToast').show();
              showToastr(h, msg, type);
            }
          }
        });
      }
    }
    CKEDITOR.replace('tab_content');
  </script>
@endsection
