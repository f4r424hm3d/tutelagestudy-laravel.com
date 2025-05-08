@php

@endphp
@extends('front.layouts.main')
@push('seo_meta_tag')
  @include('front.layouts.static_page_meta_tag')
@endpush
@section('main-section')
  <!-- Content -->
  <section class="gray py-5 mt-5">
    <div class="container">

      <div class="alltabs">
        <ul class="nav nav-pills main-userss mb-3" id="pills-tab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab"
              aria-controls="pills-profile" aria-selected="true"><i class="fa-solid fa-user mr-2 "></i> Profile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="pills-edit-profile-tab" data-toggle="pill" href="#pills-edit-profile" role="tab"
              aria-controls="pills-edit-profile" aria-selected="false"><i class="fa-solid fa-pen-to-square mr-2"></i> Edit
              Profile</a>
          </li>

        </ul>
        <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane fade show active" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
            <div class="row">
              <div class="col-12 col-sm-12 col-md-4 col-lg-4 mb-4">
                <div class="user-profiled h-100 mb-3">
                  <div class="row no-gutters">
                    <div class=" col-12 col-sm-12 col-md-12 col-lg-12 mx-auto">
                      <div class="profile-mains">
                        <img src="{{ asset($student->avatar ?? '/front/img/user-profile.png') }}" class="card-img"
                          alt="...">
                      </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 ">
                      <div class="user-detials">
                        <h2 class="card-title">{{ $student->name }}</h2>
                        <div class="user-mail">
                          <div class="form-group">
                            <label for="class1">Email address</label>
                            <b class="usrer-addeds">{{ $student->email }}</b>
                          </div>
                          <div class="form-group">
                            <label for="class1">Mobile number</label>
                            <b class="usrer-addeds">{{ $student->mobile }}</b>
                          </div>
                        </div>

                      </div>

                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12 col-sm-12 col-md-8 col-lg-8 mb-4">
                <div class="main-preferrance h-100">
                  <h5 class="preference">Your Preference</h5>

                  <div class="row">
                    <div class="col-12 col-sm-6">
                      <div class="form-group">
                        <label for="class1">Nationality</label>
                        <b class="usrer-addeds">{{ $student->nationality }}</b>
                      </div>
                    </div>
                    <div class="col-12 col-sm-6">
                      <div class="form-group">
                        <label for="class1">City</label>
                        <b class="usrer-addeds">{{ $student->city }}</b>
                      </div>
                    </div>
                    <div class="col-12 col-sm-6">
                      <div class="form-group">
                        <label for="class1">State</label>
                        <b class="usrer-addeds">{{ $student->state }}</b>
                      </div>
                    </div>
                    <div class="col-12 col-sm-6">
                      <div class="form-group">
                        <label for="class1">Destination Country</label>
                        <b class="usrer-addeds">{{ $student->destination }}</b>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="pills-edit-profile" role="tabpanel" aria-labelledby="pills-edit-profile-tab">
            <div class="main-edit">
              <form action="{{ route('student.profile.update') }}/" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row align-items-center">
                  <div class="col-12 col-sm-6 mb-4">
                    <div class="d-flex main-editables">
                      <div>
                        <div class="edit-users">
                          <img src="/front/img/user-profile.png" class="card-img" alt="...">
                        </div>
                      </div>
                      {{-- <div class="upload-file">
                        <input type="file" name="" id="">
                        <button class="ps-btn"> <i class="fa-solid fa-upload mr-2"></i> Upload Image</button>
                      </div> --}}
                    </div>
                  </div>
                  <div class="col-12 col-sm-6 mb-4">
                    <div class="form-group">
                      <label for="exampleInputMobile1">Nationality</label>
                      <input type="text" class="form-control" name="nationality"
                        value="{{ old('nationality') ?? $student->nationality }}">
                      @error('nationality')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-12 col-sm-6 mb-4">
                    <div class="form-group">
                      <label for="exampleInputMobile1">City</label>
                      <input type="text" class="form-control" name="city"
                        value="{{ old('city') ?? $student->city }}">
                      @error('city')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-12 col-sm-6 mb-4">
                    <div class="form-group">
                      <label for="exampleInputMobile1">State</label>
                      <input type="text" class="form-control" name="state"
                        value="{{ old('state') ?? $student->state }}">
                      @error('state')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-12 col-sm-6 mb-4">
                    <div class="form-group">
                      <label for="exampleInputMobile1">Preferred MBBS Country</label>
                      <select class="form-control " name="destination">
                        <option value="">Select</option>
                        @foreach ($destinations as $row)
                          <option value="{{ $row->page_name }}"
                            {{ old('destination') == $row->page_name || $student->destination == $row->page_name ? 'Selected' : '' }}>
                            {{ $row->page_name }}
                          </option>
                        @endforeach
                      </select>
                      @error('destination')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-12 col-sm-6 mb-4">
                    <div class="form-group">
                      <label for="exampleInputMobile1">Gender</label>
                      <select class="form-control " name="gender">
                        <option value="">select</option>
                        <option value="Male"
                          {{ old('gender') == 'Male' || $student->gender == 'Male' ? 'Selected' : '' }}>Male</option>
                        <option value="Female"
                          {{ old('gender') == 'Female' || $student->gender == 'Female' ? 'Selected' : '' }}>Female
                        </option>
                      </select>
                      @error('gender')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-12 col-sm-6 mb-4">
                    <div class="form-group">
                      <label for="exampleInputMobile1">DOB</label>
                      <div class="set-date">
                        <input type="date" name="dob" value="{{ old('dob') ?? $student->dob }}">
                      </div>
                      @error('dob')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>

                  <div class="col-12 col-sm-12 mb-4 ">
                    <div class="d-flex set-submit">
                      <button type="button" class="btn btn-outline-primary">Cancel</button>
                      <button type="submit" class="ps-btn">Update</button>
                    </div>
                  </div>

                </div>
              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
