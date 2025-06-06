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
          <div class="card-body" id="tblCDiv">
            <!-- IMPORT FORM START -->
            <x-ImportForm :pageRoute="$page_route" fileName="course-category"></x-ImportForm>
            <hr>
            <!-- IMPORT FORM END -->
            <form action="{{ $url }}/" class="needs-validation" method="post" enctype="multipart/form-data" novalidate>
              @csrf
              <div class="row">
                <div class="col-md-6 col-sm-12 mb-3">
                  <div class="form-group">
                    <label>Enter Name</label>
                    <input name="category_name" type="text" class="form-control" placeholder="Enter Name"
                      value="{{ $ft == 'edit' ? $sd->category_name : old('category_name') }}">
                    <span class="text-danger">
                      @error('category_name')
                      {{ $message }}
                      @enderror
                    </span>
                  </div>
                </div>
                <div class="col-md-6 col-sm-12 mb-3">
                  <div class="form-group">
                    <label>Icon Class</label>
                    <input name="icon_class" type="text" class="form-control" placeholder="Icon Class"
                      value="{{ $ft == 'edit' ? $sd->icon_class : old('icon_class') }}">
                    <span class="text-danger">
                      @error('icon_class')
                      {{ $message }}
                      @enderror
                    </span>
                  </div>
                </div>
              </div>
              <hr>

              {{--  SEO INPUT FILED COMPONENT  --}}
              <x-SeoField :ft="$ft" :sd="$sd"></x-SeoField>
              {{--  SEO INPUT FILED COMPONENT END  --}}

              @if ($ft == 'add')
              <button type="reset" class="btn btn-sm btn-warning  mr-1">
                <i class="ti-trash"></i> Reset
              </button>
              @endif
              @if ($ft == 'edit')
              <a href="{{ aurl($page_route) }}" class="btn btn-sm btn-info ">
                <i class="ti-trash"></i> Cancel
              </a>
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
          <div class="card-body">
            <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
              <thead>
                <tr>
                  <th>Sr. No.</th>
                  <th>Id</th>
                  <th>Name</th>
                  <th>SEO</th>
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
                  <td>{{ $row->id }}</td>
                  <td>{{ $row->category_name }}</td>
                  <td>
                    @if ($row->meta_title != null)
                    <button type="button" class="btn btn-xs btn-outline-info waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#SeoModalScrollable{{ $row->id }}">View</button>
                    <div class="modal fade" id="SeoModalScrollable{{ $row->id }}" tabindex="-1" role="dialog"
                      aria-labelledby="SeoModalScrollableTitle{{ $row->id }}" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="SeoModalScrollableTitle{{ $row->id }}">
                              SEO
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            {!! $row->meta_title !!} <br>
                            {!! $row->meta_keyword !!} <br>
                            {!! $row->meta_description !!} <br>
                            {!! $row->page_content !!} <br>
                            {!! $row->seo_rating !!}
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
                    <a href="javascript:void()" onclick="DeleteAjax('{{ $row->id }}')"
                      class="waves-effect waves-light btn btn-xs btn-outline btn-danger">
                      <i class="fa fa-trash" aria-hidden="true"></i>
                    </a>
                    <a href="{{ url('admin/'.$page_route.'/update/' . $row->id) }}"
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
  </div>
</div>
<script>
  CKEDITOR.replace("description");

  function DeleteAjax(id) {
      //alert(id);
      var cd = confirm("Are you sure ?");
      if (cd == true) {
        $.ajax({
          url: "{{ url('admin/'.$page_route.'/delete') }}" + "/" + id,
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
</script>
@endsection
