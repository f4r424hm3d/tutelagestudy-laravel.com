<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\FeesAndDeadline;
use App\Models\University;
use App\Models\UniversityGallery;
use App\Models\UniversityOverview;
use App\Models\UniversityVideoGallery;
use Illuminate\Http\Request;

class UniversityProfileFc extends Controller
{
  public function index(Request $request)
  {
    $slug = $request->segment(1);
    $university = University::where(['slug'=>$slug])->first();
    $overview = UniversityOverview::where(['university_id'=>$university->id])->get();
    $gallery = UniversityGallery::where(['university_id'=>$university->id])->get();
    $video = UniversityVideoGallery::where(['university_id'=>$university->id])->get();
    $feesandapp = FeesAndDeadline::where(['university_id'=>$university->id])->get();
    $trendingUniversity = University::where(['destination_id'=>$university->destination_id])->limit(10)->get();
    $data = compact('university','overview','gallery','video','trendingUniversity','feesandapp');
    return view('front.university-overview')->with($data);
  }
}
