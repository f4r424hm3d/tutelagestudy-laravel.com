<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Destination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeFc extends Controller
{
  public function index(Request $request)
  {
    $blogs = Blog::limit(10)->get();
    $destinations = Destination::where(['status' => 1])->limit(10)->get();
    $data = compact('destinations','blogs');
    return view('front.index')->with($data);
  }
  public function privacyPolicy(Request $request)
  {
    return view('front.privacy-policy');
  }
  public function termsConditions(Request $request)
  {
    return view('front.terms-conditions');
  }
  public function searchUniversity(Request $request)
  {
    $keyword = $request->keyword;
    $field = DB::table('universities')->where('name','LIKE','%'.$keyword.'%')->get();
    $output = '<li class="active">UNIVERSITIES</li>';
    foreach ($field as $row) {
      $output .= '<li><a href="'.$row->slug.'">'.$row->name.'</a></li>';
    }
    echo $output;
  }
}
