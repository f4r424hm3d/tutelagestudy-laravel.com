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
    <div class="row">
      <div class="col-12 col-md-12 mb-4">
        <div class="download-files">
          <h4 class="maingeneral" > <i class="fa-solid fa-cloud-arrow-down"></i> General</h4>

          <div class="allinput-bx">
            <input type="file" >
            <button> <i class="fa-solid fa-download mr-2 "></i>  DOWNLOAD MOCK TEST</button>
          </div>
        </div>
      </div>



    </div>
  <div class="tables-detailss">
    <h4><i class="fa-solid fa-magnifying-glass-plus"></i>  Previous years Exam Papers</h4>
<div class="all-tables">
<div class="row align-items-end ">
      <div class="col-12 col-sm-6 col-md-4 col-lg-3 ">
      <div class="form-group">
    <label for="exampleFormControlSelect1">Year</label>
    <select class="form-control" id="exampleFormControlSelect1">
      <option>2021</option>
      <option>2022</option>
      <option>2023</option>
      <option>2024</option>
      <option>2025</option>
    </select>
  </div>
      </div>
      <div class="col-12 col-sm-6 col-md-4 col-lg-3 ">
      <div class="form-group">
    <label for="exampleFormControlSelect1">Exam Type:</label>
    <select class="form-control" id="exampleFormControlSelect1">
      <option>DUET</option>
      <option>DUET1</option>
      <option>DUET2</option>
      <option>DUET3</option>
      <option>DUET4</option>
    </select>
  </div>
      </div>
      <div class="col-12 col-sm-6 col-md-4 col-lg-3 ">
      <div class="form-group">
    <label for="exampleFormControlSelect1">Paper:</label>
    <select class="form-control" id="exampleFormControlSelect1">
      <option>select</option>
      <option>select</option>
      <option>select</option>
      <option>select</option>
      <option>select</option>
    </select>
  </div>
      </div>
      <div class="col-12 col-sm-6 col-md-4 col-lg-3 ">
      <div class="form-group">
      <label ></label>
     <a href="#" class="btn btn-outline-secondary w-100" >Search</a>
  </div>
  </div>
      </div>

      <div class="table-responsive t-alltables">
      <div class="d-flex justify-content-between align-items-center mt-4 mb-2">
        <ul class="showing-uers d-flex" >
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
          <span class="mr-2" >Search</span>
          <input type="text" class="form-control" placeholder="....">
        </div>
      </div>
      <table class="table table-bordered table-hover">
  <thead class="thead-light  " >
    <tr>
      <th >S/N</th>
      <th >Exam Name</th>
      <th >Paper Name</th>
      <th >Year</th>
      <th >Date of Exam</th>
      <th >Shift</th>
      <th >QP</th>
      <th >AK</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>1</td>
      <td>NEET</td>
      <td>English 1E</td>
      <td>2023</td>
      <td>07-05-2023</td>
      <td>1</td>
      <td class="text-center" >  <a href="#" class="btn btn-success download-ar"><i class="fa-solid fa-download mx-1 "></i>DOWNLOAD</a> </td>
      <td>-</td>
    </tr>
    <tr>
      <td>1</td>
      <td>NEET</td>
      <td>English 1E</td>
      <td>2023</td>
      <td>07-05-2023</td>
      <td>1</td>
      <td class="text-center" >  <a href="#" class="btn btn-success download-ar"><i class="fa-solid fa-download mx-1 "></i>DOWNLOAD</a> </td>
      <td>-</td>
    </tr>
    <tr>
      <td>1</td>
      <td>NEET</td>
      <td>English 1E</td>
      <td>2023</td>
      <td>07-05-2023</td>
      <td>1</td>
      <td class="text-center" >  <a href="#" class="btn btn-success download-ar"><i class="fa-solid fa-download mx-1 "></i>DOWNLOAD</a> </td>
      <td>-</td>
    </tr>
</table>
      </div>
</div>
  </div>
    </div>
  </div>
</section>

@endsection
