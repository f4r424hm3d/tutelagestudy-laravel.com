<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceContent;
use Illuminate\Http\Request;

class ServiceFc extends Controller
{
  public function index(Request $request)
  {
    $services = Service::where(['status' => 1])->get();
    $data = compact('services');
    return view('front.services')->with($data);
  }
  public function serviceDetail(Request $request)
  {
    $slug = $request->segment(1);
    $row = Service::where('slug',$slug)->first();
    $services = Service::where(['status' => 1])->where('slug','!=',$slug)->get();
    $servicecontent = ServiceContent::where(['service_id' => $row->id])->get();
    $data = compact('services','servicecontent','row');
    return view('front.service-detail')->with($data);
  }
}
