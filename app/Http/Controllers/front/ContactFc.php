<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Country;
use App\Models\Destination;
use Illuminate\Http\Request;

class ContactFc extends Controller
{
  public function index(Request $request)
  {
    $locations = Address::select('country')->groupBy('country')->get();
    $countries = Country::orderBy('name','asc')->get();
    $phonecodes = Country::select('phonecode','name')->distinct()->orderBy('phonecode','asc')->get();
    $destinations = Destination::where(['status' => 1])->get();
    $data = compact('locations','destinations','countries','phonecodes');
    return view('front.contactus')->with($data);
  }
}
