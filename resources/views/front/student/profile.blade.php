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
    <a class="nav-link active" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="true"><i class="fa-solid fa-user mr-2 "></i> Profile</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-edit-profile-tab" data-toggle="pill" href="#pills-edit-profile" role="tab" aria-controls="pills-edit-profile" aria-selected="false"><i class="fa-solid fa-pen-to-square mr-2"></i>  Edit Profile</a>
  </li>

</ul>
<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
  <div class="row">
<div class="col-12 col-sm-12 col-md-4 col-lg-4 mb-4">
<div class="user-profiled h-100 mb-3">
  <div class="row no-gutters">
    <div class=" col-12 col-sm-12 col-md-12 col-lg-12 mx-auto">
     <div class="profile-mains" >
     <img src="/front/img/user-profile.png" class="card-img" alt="...">
     </div>
    </div>
    <div class="col-12 col-sm-12 col-md-12 col-lg-12 ">
      <div class="user-detials">
        <h2 class="card-title">Gourav Britannica</h2>
        <div class="user-mail">
    <div class="form-group">
    <label for="class1">Email address</label>
    <b class="usrer-addeds">gouravbritannica@gmai.com</b>
  </div>
    <div class="form-group">
    <label for="class1">Mobile number</label>
    <b class="usrer-addeds">1234567890</b>
  </div>
        </div>

        
      </div>

    </div>
  </div>
</div>
</div>
<div class="col-12 col-sm-12 col-md-8 col-lg-8 mb-4">
<div class="main-preferrance h-100">
  <h5 class="preference" >Your Preference</h5>

  <div class="row">
    <div class="col-12 col-sm-6">
    <div class="form-group">
    <label for="class1">Class</label>
    <b class="usrer-addeds"></b>
  </div>
    </div>
    <div class="col-12 col-sm-6">
    <div class="form-group">
    <label for="class1">Stream</label>
    <b class="usrer-addeds"></b>
  </div>
    </div>
    <div class="col-12 col-sm-6">
    <div class="form-group">
    <label for="class1">Board</label>
    <b class="usrer-addeds"></b>
  </div>
    </div>
    <div class="col-12 col-sm-6">
    <div class="form-group">
    <label for="class1">State</label>
    <b class="usrer-addeds"></b>
  </div>
    </div>
    <div class="col-12 col-sm-6">
    <div class="form-group">
    <label for="class1">City</label>
    <b class="usrer-addeds"></b>
  </div>
    </div>

  </div>
</div>
</div>
      </div>
  </div>
  <div class="tab-pane fade" id="pills-edit-profile" role="tabpanel" aria-labelledby="pills-edit-profile-tab">
    <div class="main-edit">
      <div class="row align-items-center">
        <div class="col-12 col-sm-6 mb-4">
      <div class="d-flex main-editables">
      <div>
      <div class="edit-users">
      <img src="/front/img/user-profile.png" class="card-img" alt="...">
      </div>
      </div>
      <div class="upload-file">
      <input type="file" name="" id="">
        <button class="ps-btn" > <i class="fa-solid fa-upload mr-2"></i> Upload Image</button>
      </div>
      </div>
        </div>
        <div class="col-12 col-sm-6 mb-4">
        <div class="form-group">
    <label for="exampleInputName1">Name</label>
    <input type="text" class="form-control" id="exampleInputName1" >
  </div>
        </div>
        <div class="col-12 col-sm-6 mb-4">
        <div class="form-group">
    <label for="exampleInputEmail1">Email</label>
    <input type="text" class="form-control" id="exampleInputEmail1" >
  </div>
        </div>
        <div class="col-12 col-sm-6 mb-4">
        <div class="form-group">
    <label for="exampleInputMobile1">Mobile Number</label>
    <input type="text" class="form-control" id="exampleInputMobile1" >
  </div>
        </div>
        <div class="col-12 col-sm-6 mb-4">
        <div class="form-group">
    <label for="exampleInputMobile1">Mobile Number</label>
    <input type="text" class="form-control" id="exampleInputMobile1" >
  </div>
        </div>
        <div class="col-12 col-sm-6 mb-4">
        <div class="form-group">
    <label for="exampleInputMobile1">Class</label>
    <select class="form-control ">
  <option>Large select</option>
</select>
  </div>
        </div>
        <div class="col-12 col-sm-6 mb-4">
        <div class="form-group">
    <label for="exampleInputMobile1">Stream</label>
    <select class="form-control ">
  <option>Stream select</option>
</select>
  </div>
        </div>
        <div class="col-12 col-sm-6 mb-4">
        <div class="form-group">
    <label for="exampleInputMobile1">Board</label>
    <select class="form-control ">
  <option>Board select</option>
</select>
  </div>
        </div>
        <div class="col-12 col-sm-6 mb-4">
        <div class="form-group">
    <label for="exampleInputMobile1">State</label>
    <select class="form-control ">
  <option>State select</option>
</select>
  </div>
        </div>
        <div class="col-12 col-sm-6 mb-4">
        <div class="form-group">
    <label for="exampleInputMobile1">City</label>
    <select class="form-control ">
  <option>City select</option>
</select>
  </div>
        </div>
        <div class="col-12 col-sm-6 mb-4">
        <div class="form-group">
    <label for="exampleInputMobile1">Gender</label>
    <select class="form-control ">
  <option>Gender select</option>
  <option>Male</option>
  <option>Female</option>
</select>
  </div>
        </div>
        <div class="col-12 col-sm-6 mb-4">
        <div class="form-group">
    <label for="exampleInputMobile1">DOB</label>
 <div class="set-date">
  <input type="date">
 </div>
  </div>
        </div>

       <div class="col-12 col-sm-6 mb-4 ">
       <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label mt-2" for="exampleCheck1">I agree to the <a href="#">Terms of Use</a>& <a href="#">Privacy Policy</a></label>
  </div>
       </div>
       <div class="col-12 col-sm-12 mb-4 ">

       <div class="d-flex set-submit">
  <button type="button" class="btn btn-outline-primary">Cancel</button>
  <button type="button" class="ps-btn">Submit</button>
</div>
       </div>


      </div>
     
      
    </div>
  </div>
</div>
  </div>
    </div>
  </section>
@endsection
