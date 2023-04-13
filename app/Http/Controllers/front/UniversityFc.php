<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Destination;
use App\Models\InstituteType;
use App\Models\University;
use Illuminate\Http\Request;

class UniversityFc extends Controller
{
  public function index(Request $request)
  {
    $destination_slug = $request->segment(1);
    $destination = Destination::where(['destination_slug' => $destination_slug])->first();

    $seg2 = $request->segment(2);
    $rows = University::where(['destination_id' => $destination->id,'status' => 1]);
    if(session()->has('FilterState')){
      $rows = $rows->where(['state_slug' => session()->get('FilterState')]);
    }
    if(session()->has('FilterInstituteType')){
      $rows = $rows->where(['institute_type_id' => session()->get('FilterInstituteType')]);
    }
    $rows = $rows->paginate(3)->withQueryString();

    $total = $rows->total();
    $cp = $rows->currentPage();
    $pp = $rows->perPage();
    $i = ($cp - 1) * $pp + 1;

    $instTYpe = University::select('institute_type_id')->where(['destination_id' => $destination->id,'status' => 1])->groupBy('institute_type_id')->get();

    $states = University::select('state','state_slug')->where(['destination_id' => $destination->id,'status' => 1])->distinct()->get();

    $cities = University::select('city','city_slug')->where(['destination_id' => $destination->id,'status' => 1])->distinct();
    if(session()->has('FilterState')){
      $cities = $cities->where(['state_slug' => session()->get('FilterState')]);
    }
    $cities = $cities->get();

    $data = compact('destination','rows', 'i','instTYpe','seg2','states','total','cities');
    return view('front.universities')->with($data);
  }
  public function universitybyInstType(Request $request)
  {
    $destination_slug = $request->segment(1);
    $destination = Destination::where(['destination_slug' => $destination_slug])->first();

    $seg2 = $institute_type_slug = $request->segment(2);
    $institute_type = InstituteType::where(['slug' => $institute_type_slug])->first();

    $request->session()->put('FilterInstituteType', $institute_type->id);

    $rows = University::where(['destination_id' => $destination->id,'institute_type_id' => $institute_type->id,'status' => 1]);

    if(session()->has('FilterState')){
      $rows = $rows->where(['state_slug' => session()->get('FilterState')]);
    }
    if(session()->has('FilterCity')){
      $rows = $rows->where(['city_slug' => session()->get('FilterCity')]);
    }

    $rows = $rows->paginate(3)->withQueryString();

    $total = $rows->total();
    $cp = $rows->currentPage();
    $pp = $rows->perPage();
    $i = ($cp - 1) * $pp + 1;

    $instTYpe = University::select('institute_type_id')->where(['destination_id' => $destination->id,'status' => 1])->groupBy('institute_type_id')->get();

    $states = University::select('state','state_slug')->where(['destination_id' => $destination->id,'status' => 1])->distinct()->get();

    $cities = University::select('city','city_slug')->where(['destination_id' => $destination->id,'status' => 1])->distinct();
    if(session()->has('FilterState')){
      $cities = $cities->where(['state_slug' => session()->get('FilterState')]);
    }
    $cities = $cities->get();

    $data = compact('destination','rows', 'i','instTYpe','institute_type','states','seg2','total','cities');
    return view('front.universities')->with($data);
  }
  public function universitybyState(Request $request)
  {
    $destination_slug = $request->segment(1);
    $destination = Destination::where(['destination_slug' => $destination_slug])->first();

    $seg2 = $request->segment(2);
    $state_slug = str_replace('-universities','',$seg2);

    $request->session()->put('FilterState', $state_slug);

    $rows = University::where(['destination_id' => $destination->id,'state_slug' => $state_slug,'status' => 1]);

    if(session()->has('FilterInstituteType')){
      $rows = $rows->where(['institute_type_id' => session()->get('FilterInstituteType')]);
    }
    if(session()->has('FilterCity')){
      $rows = $rows->where(['city_slug' => session()->get('FilterCity')]);
    }

    $rows = $rows->paginate(3)->withQueryString();

    $total = $rows->total();
    $cp = $rows->currentPage();
    $pp = $rows->perPage();
    $i = ($cp - 1) * $pp + 1;

    $instTYpe = University::select('institute_type_id')->where(['destination_id' => $destination->id,'status' => 1])->groupBy('institute_type_id')->get();

    $states = University::select('state','state_slug')->where(['destination_id' => $destination->id,'status' => 1])->distinct()->get();

    $cities = University::select('city','city_slug')->where(['destination_id' => $destination->id,'status' => 1])->distinct();
    if(session()->has('FilterState')){
      $cities = $cities->where(['state_slug' => session()->get('FilterState')]);
    }
    $cities = $cities->get();

    $data = compact('destination','rows', 'i','instTYpe','states','total','cities');
    return view('front.universities')->with($data);
  }
  public function universitybyCity(Request $request)
  {
    $destination_slug = $request->segment(1);
    $destination = Destination::where(['destination_slug' => $destination_slug])->first();

    $seg2 = $request->segment(2);
    $city_slug = str_replace('-universities','',$seg2);

    $request->session()->put('FilterCity', $city_slug);

    $rows = University::where(['destination_id' => $destination->id,'city_slug' => $city_slug,'status' => 1]);

    if(session()->has('FilterInstituteType')){
      $rows = $rows->where(['institute_type_id' => session()->get('FilterInstituteType')]);
    }
    if(session()->has('FilterState')){
      $rows = $rows->where(['state_slug' => session()->get('FilterState')]);
    }

    $rows = $rows->paginate(3)->withQueryString();

    $total = $rows->total();
    $cp = $rows->currentPage();
    $pp = $rows->perPage();
    $i = ($cp - 1) * $pp + 1;

    $instTYpe = University::select('institute_type_id')->where(['destination_id' => $destination->id,'status' => 1])->groupBy('institute_type_id')->get();

    $states = University::select('state','state_slug')->where(['destination_id' => $destination->id,'status' => 1])->distinct()->get();

    $cities = University::select('city','city_slug')->where(['destination_id' => $destination->id,'status' => 1])->distinct();
    if(session()->has('FilterState')){
      $cities = $cities->where(['state_slug' => session()->get('FilterState')]);
    }
    $cities = $cities->get();

    $data = compact('destination','rows', 'i','instTYpe','states','total','cities');
    return view('front.universities')->with($data);
  }


  public function removeFilter(Request $request)
  {
    session()->forget($request->value);
  }
}
