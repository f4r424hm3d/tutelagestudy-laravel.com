@extends('admin.layouts.main')
@push('title')
<title>Add Student</title>
@endpush
@section('main-section')
<div class="page-content">
  <div class="container-fluid">

    <!-- start page title -->
    <div class="row">
      <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
          <h4 class="mb-sm-0 font-size-18">Add Student</h4>

          <div class="page-title-right">
            <ol class="breadcrumb m-0">
              <li class="breadcrumb-item"><a href="{{ url('/admin/') }}"><i class="mdi mdi-home-outline"></i></a></li>
              <li class="breadcrumb-item active" aria-current="page">Add Student</li>
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
    <!-- end page title -->
    <div class="row">
      <div class="col-xl-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Add Record</h4>
          </div>
          <div class="card-body">
            <form action="{{ $url }}/" class="needs-validation" method="post" enctype="multipart/form-data" novalidate>
              @csrf
              <div class="row">
                <div class="form-group mb-3 col-md-3">
                  <label>Student Name</label>
                  <input name="name" type="text" class="form-control" placeholder="Enter name"
                    value="{{ $ft == 'edit' ? $sd->name : old('name') }}" required>
                  <span class="text-danger">
                    @error('name')
                    {{ $message }}
                    @enderror
                  </span>
                </div>
                <div class="form-group mb-3 col-md-3">
                  <label>Email</label>
                  <input name="email" type="text" class="form-control" placeholder="Enter email"
                    value="{{ $ft == 'edit' ? $sd->email : old('email') }}">
                  <span class="text-danger">
                    @error('email')
                    {{ $message }}
                    @enderror
                  </span>
                </div>
                <div class="form-group mb-3 col-md-3">
                  <label>Mobile</label>
                  <input name="mobile" type="number" class="form-control" placeholder="Enter Mobile"
                    value="{{ $ft == 'edit' ? $sd->mobile : old('mobile') }}">
                  <span class="text-danger">
                    @error('mobile')
                    {{ $message }}
                    @enderror
                  </span>
                </div>
                <div class="form-group mb-3 col-md-3">
                  <label>Gender</label>
                  <select name="gender" id="gender" type="text" class="form-control select2"
                    data-placeholder="Select Country">
                    <option value="">Select</option>
                    @php
                    $genders = ['Male', 'Female', 'Other'];
                    @endphp
                    @foreach ($genders as $gender)
                    <option value="{{ $gender }}" {{ $ft=='edit' && $sd->gender == $gender ? 'Selected' : '' }}>
                      {{ $gender }}</option>
                    @endforeach
                  </select>
                  <span class="text-danger">
                    @error('gender')
                    {{ $message }}
                    @enderror
                  </span>
                </div>
                <div class="form-group mb-3 col-md-2">
                  <label>Nationality</label>
                  <select name="nationality" id="nationality" class="form-control select2">
                    <option value="">Select</option>
                    @foreach ($country as $row)
                    <option value="{{ $row->name }}" {{ $ft=='edit' && $sd->nationality == $row->name ? 'Selected' : ''
                      }}>
                      {{ $row->name }}</option>
                    @endforeach
                  </select>
                  <span class="text-danger">
                    @error('nationality')
                    {{ $message }}
                    @enderror
                  </span>
                </div>
                <div class="form-group mb-3 col-md-2">
                  <label>Source</label>
                  <input name="source" type="text" class="form-control" placeholder="Enter Source"
                    value="{{ $ft == 'edit' ? $sd->source : old('source') }}">
                  <span class="text-danger">
                    @error('source')
                    {{ $message }}
                    @enderror
                  </span>
                </div>
                <div class="form-group mb-3 col-md-2">
                  <label>D.O.B</label>
                  <input name="dob" type="date" class="form-control" placeholder="Enter Mobile"
                    value="{{ $ft == 'edit' ? $sd->dob : old('dob') }}">
                  <span class="text-danger">
                    @error('dob')
                    {{ $message }}
                    @enderror
                  </span>
                </div>
                <div class="form-group mb-3 col-md-3">
                  <label>Intrested Program</label>
                  <select name="intrested_program" id="intrested_program" class="form-control select2" required>
                    <option value="">Select</option>
                    <option value="ielts" Selected>IELTS</option>
                  </select>
                  <span class="text-danger">
                    @error('intrested_program')
                    {{ $message }}
                    @enderror
                  </span>
                </div>
                <div class="form-group mb-3 col-md-3">
                  <label>Program Branch</label>
                  <select name="intrested_program_branch" id="intrested_program_branch" class="form-control select2"
                    required>
                    <option value="">Select</option>
                    <option value="ac" {{ old('intrested_program_branch')=='ac' ? 'Selected' : '' }}>Academic
                      (AC)
                    </option>
                    <option value="gt" {{ old('intrested_program_branch')=='gt' ? 'Selected' : '' }}>General
                      Training
                      (GT)</option>
                  </select>
                  <span class="text-danger">
                    @error('intrested_program_branch')
                    {{ $message }}
                    @enderror
                  </span>
                </div>
                <div class="form-group mb-3 col-md-6">
                  <label>Address</label>
                  <input name="address" type="text" class="form-control" placeholder="Enter address"
                    value="{{ $ft == 'edit' ? $sd->address : old('address') }}">
                  <span class="text-danger">
                    @error('address')
                    {{ $message }}
                    @enderror
                  </span>
                </div>
                <div class="form-group mb-3 col-md-2">
                  <label>city</label>
                  <input name="city" type="text" class="form-control" placeholder="Enter city"
                    value="{{ $ft == 'edit' ? $sd->city : old('city') }}">
                  <span class="text-danger">
                    @error('city')
                    {{ $message }}
                    @enderror
                  </span>
                </div>
                <div class="form-group mb-3 col-md-2">
                  <label>state</label>
                  <input name="state" type="text" class="form-control" placeholder="Enter state"
                    value="{{ $ft == 'edit' ? $sd->state : old('state') }}">
                  <span class="text-danger">
                    @error('state')
                    {{ $message }}
                    @enderror
                  </span>
                </div>
                <div class="form-group mb-3 col-md-2">
                  <label>Country</label>
                  <select name="country" id="country" class="form-control select2">
                    <option value="">Select</option>
                    @foreach ($country as $row)
                    <option value="{{ $row->name }}" {{ $ft=='edit' && $sd->country == $row->name ? 'Selected' : '' }}>
                      {{ $row->name }}</option>
                    @endforeach
                  </select>
                  <span class="text-danger">
                    @error('country')
                    {{ $message }}
                    @enderror
                  </span>
                </div>
              </div>
              <div class="row">
                <div class="form-group mb-3 col-md-3">
                  @if ($ft == 'add')
                  <button type="reset" class="btn btn-sm btn-warning mr-1">
                    <i class="ti-trash"></i> Reset
                  </button>
                  @endif
                  @if ($ft == 'edit')
                  <a href="{{ aurl('student/add') }}" class="btn btn-sm btn-primary">
                    <i class="ti-trash"></i> Cancel
                  </a>
                  @endif
                  <button class="btn btn-sm btn-primary" type="submit">Submit</button>
                </div>
              </div>
            </form>
          </div>
          <div class="card-body">
            <form method="post" action="{{ aurl('student/import') }}" id="import_csv" enctype="multipart/form-data">
              @csrf
              <div class="row">
                <div class="col-md-4 mb-3">
                  <label class="form-label">Select CSV File</label>
                  <input type="file" name="file" id="file" required class="form-control mb-2 mr-sm-2" />
                </div>
                <div class="form-group col-md-4 mb-3">
                  <label class="form-label">&nbsp;&nbsp;</label>
                  <button style="margin-top:28px" type="submit" name="import_csv" class="btn btn-sm btn-info"
                    id="import_csv_btn">Import</button>
                  <a download href="{{ asset('format/import-student-format.xlsx') }}" style="margin-top:28px"
                    class="btn btn-sm btn-primary" title="Download Format">Format</a>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script></script>
@endsection
