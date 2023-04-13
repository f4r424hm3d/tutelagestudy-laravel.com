<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Destination;
use App\Models\University;
use Illuminate\Http\Request;

class DestinationFc extends Controller
{
  public function index(Request $request)
  {
    $destination_slug = $request->segment(1);
    $destinations = Destination::where(['status' => 1])->where('destination_slug','!=',$destination_slug)->limit(10)->get();
    $destination = Destination::where(['destination_slug' => $destination_slug])->first();
    $data = compact('destination','destinations');
    return view('front.destination')->with($data);
  }
  public function destinationList(Request $request)
  {
    $destinations = University::select('destination_id')->where(['status' => 1])->groupBy('destination_id')->get();
    //printArray($destinations->toArray());
    $data = compact('destinations');
    return view('front.destination-list')->with($data);
  }
}
