<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\DefaultSeo;
use App\Models\Destination;
use App\Models\FeesAndDeadline;
use App\Models\NewsCategory;
use App\Models\University;
use App\Models\UniversityContent;
use App\Models\UniversityGallery;
use App\Models\UniversityOverview;
use App\Models\UniversityVideoGallery;
use Illuminate\Http\Request;

class UniversityProfileFc extends Controller
{
  public function index(Request $request)
  {
    $uname = $request->segment(2);
    $university = University::with('getInstType','getAuthor','getDestination')->where(['uname' => $uname])->first();
    $tbl2 = 'university_overviews';
    $overview = UniversityOverview::where(['u_id'=>$university->id])->get();

    $allcont = UniversityContent::where(['u_id'=>$university->id])->get();

    $toptenuni = University::where(['status' => 1])->limit(10)->get();

    $countries = Country::orderBy('name','asc')->get();
    $phonecodes = Country::select('phonecode','name')->distinct()->orderBy('phonecode','asc')->get();

    $gc = UniversityGallery::where(['university_id'=>$university->id])->get();

    $page_url = url()->current();

    $uri3 = $request->segment(3);

    $cval = $uri3 == '' ? 'university' : $uri3;
    $wh = ['url' => $cval];
    $dseo = DefaultSeo::where($wh)->first();

    $title = $uri3 == '' ? $university->name : $uri3;
    $city = $university->city;
    $shortnote = $university->shortnote;
    $inst_type = $university->getInstType->type;

    $university_name = $university->name;

    $site = 'tutelagestudy.com';

    $tagArray = ['title' => $title, 'address' => $city, 'shortnote' => $shortnote, 'universitytype' => $inst_type, 'universityname' => $university_name, 'currentmonth' => date('M'), 'currentyear' => date('Y'), 'site' => $site];

    $meta_title = $university->meta_title == '' ? $dseo->title : $university->meta_title;
    $meta_title = replaceTag($meta_title, $tagArray);

    $meta_keyword = $university->meta_keyword == '' ? $dseo->keyword : $university->meta_keyword;
    $meta_keyword = replaceTag($meta_keyword, $tagArray);

    $page_content = $university->page_content == '' ? $dseo->page_content : $university->page_content;
    $page_content = replaceTag($page_content, $tagArray);

    $meta_description = $university->meta_description == '' ? $dseo->description : $university->meta_description;
    $meta_description = replaceTag($meta_description, $tagArray);

    $og_image_path = $university->bannerpath == '' ? $dseo->ogimgpath : $university->bannerpath;

    $destinations = Destination::where(['status' => 1])->get();
    $categories = NewsCategory::all();

    $data = compact('university','overview','page_url','uri3','title','site','meta_title','meta_keyword','meta_keyword','page_content','meta_description','og_image_path','destinations','toptenuni','gc','allcont','countries','phonecodes','categories');
    return view('front.university-overview')->with($data);
  }
}
