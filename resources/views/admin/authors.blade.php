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
          <div class="card-body  {{ $ft=='edit'?'':'hide-this' }}" id="tblCDiv">
            <form action="{{ $url }}/" class="needs-validation" method="post" enctype="multipart/form-data" novalidate>
              @csrf
              <div class="row">
                <div class="col-md-4 col-sm-12 mb-3">
                  <x-InputField type="text" label="Enter Name" name="name" id="name" :ft="$ft" :sd="$sd"></x-InputField>
                </div>
                <div class="col-md-4 col-sm-12 mb-3">
                  <x-InputField type="text" label="Enter URL" name="slug" id="slug" :ft="$ft" :sd="$sd"></x-InputField>
                </div>
                <div class="col-md-4 col-sm-12 mb-3">
                  <x-InputField type="text" label="Enter Mobile" name="mobile" id="mobile" :ft="$ft" :sd="$sd"></x-InputField>
                </div>
                <div class="col-md-4 col-sm-12 mb-3">
                  <x-InputField type="text" label="Enter Email" name="email" id="email" :ft="$ft" :sd="$sd"></x-InputField>
                </div>
                <div class="col-md-4 col-sm-12 mb-3">
                  <x-InputField type="file" label="Thumbnail" name="thumbnail" id="thumbnail" :ft="$ft" :sd="$sd"></x-InputField>
                </div>
                <div class="col-md-12 col-sm-12 mb-3">
                  <x-TextareaField label="Shortnote" name="shortnote" id="shortnote" :ft="$ft" :sd="$sd"></x-TextareaField>
                </div>
                <div class="col-md-12 col-sm-12 mb-3">
                  <x-TextareaField label="highlights" name="highlights" id="highlights" :ft="$ft" :sd="$sd"></x-TextareaField>
                </div>
                <div class="col-md-12 col-sm-12 mb-3">
                  <x-TextareaField label="experiance" name="experiance" id="experiance" :ft="$ft" :sd="$sd"></x-TextareaField>
                </div>
                <div class="col-md-12 col-sm-12 mb-3">
                  <x-TextareaField label="education" name="education" id="education" :ft="$ft" :sd="$sd"></x-TextareaField>
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
          <div class="card-body">
            <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
              <thead>
                <tr>
                  <th>S.No.</th>
                  <th>Name</th>
                  <th>Pic</th>
                  <th>Details</th>
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
                  <td>
                    <span><?php echo $row->name; ?></span><br>
                    <span><?php echo $row->email; ?></span><br>
                    <span><?php echo $row->mobile; ?></span>
                  </td>
                  <td>
                    @if ($row->profile_pic_path != null)
                    <img src="{{ asset($row->profile_pic_path) }}" alt="" height="80" width="80">
                    @else
                    N/A
                    @endif
                  </td>
                  <td>
                    @if ($row->shortnote != null)
                    <button type="button" class="btn btn-xs btn-outline-info waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#SModalScrollable{{ $row->id }}">View</button>
                    <div class="modal fade" id="SModalScrollable{{ $row->id }}" tabindex="-1" role="dialog"
                      aria-labelledby="SModalScrollableTitle{{ $row->id }}" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <h4>Shortnote</h4>
                            <?php echo $row->shortnote; ?>
                            <hr>
                            <h4>Highlights</h4>
                            <?php echo $row->highlights; ?>
                            <hr>
                            <h4>Education</h4>
                            <?php echo $row->education; ?>
                            <hr>
                            <h4>Experiance</h4>
                            <?php echo $row->experiance; ?>
                            <hr>
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
  $(document).ready(function() {
    $('#name').change(function() {
      var val = $('#name').val();
      if (val != '') {
        $.ajax({
          url: "{{ url('common/slugify/') }}",
          method: "GET",
          data: {
            val: val,
          },
          success: function(data) {
            $('#slug').val(data);
          }
        });
      }
    });
  });

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

  CKEDITOR.replace("highlights");
  CKEDITOR.replace("experiance");
  CKEDITOR.replace("education");
</script>
@endsection
