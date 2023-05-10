<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Currency;
use App\Models\Destination;
use App\Models\News;
use App\Models\University;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeFc extends Controller
{
  public function index(Request $request)
  {
    $universities1 = University::where(['homeview' => 1, 'status' => 1])->orderBy('id', 'ASC')->offset('0')->limit('4')->get();
    $universities2 = University::where(['homeview' => 1, 'status' => 1])->orderBy('id', 'ASC')->offset('4')->limit('4')->get();
    $universities3 = University::where(['homeview' => 1, 'status' => 1])->orderBy('id', 'ASC')->offset('8')->limit('4')->get();
    $news = News::orderBy('id', 'DESC')->limit('20')->get();
    $country = Currency::all();
    $data = compact('universities1', 'country', 'news', 'universities2', 'universities3');
    return view('front.index')->with($data);
  }
  public function mbbsAbroad(Request $request)
  {
    return view('front.mbbs-in-abroad');
  }
  public function privacyPolicy(Request $request)
  {
    return view('front.privacypolicy');
  }
  public function termsConditions(Request $request)
  {
    return view('front.termandcondition');
  }
  public function searchUniversity(Request $request)
  {
    $keyword = $request->keyword;
    $field = DB::table('universities')->where('name', 'LIKE', '%' . $keyword . '%')->get();
    $output = '<li class="active">UNIVERSITIES</li>';
    foreach ($field as $row) {
      $output .= '<li><a href="' . $row->slug . '">' . $row->name . '</a></li>';
    }
    echo $output;
  }
}
