<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\DefaultSeo;
use App\Models\Destination;
use App\Models\DestinationGallery;
use App\Models\DestinationPageContent;
use App\Models\DestinationPageFaq;
use App\Models\DestinationPageTabs;
use App\Models\News;
use App\Models\NewsCategory;
use App\Models\Testimonial;
use App\Models\University;
use Illuminate\Http\Request;

class DestinationFc extends Controller
{
  public function index(Request $request)
  {
    $destinations = Destination::where(['status' => 1])->get();
    $data = compact('destinations');
    return view('front.destination')->with($data);
  }
  public function destinationDetail(Request $request)
  {
    $tab_title = $request->segment(2) == '' ? 'overview' : $request->segment(2);
    $tabTitleDet = DestinationPageTabs::where(['slug' => $tab_title])->first();

    $c_destination = Destination::where(['slug' => $request->segment(1)])->first();

    $testimonials = Testimonial::where(['country' => $c_destination->country])->get();
    $photos = DestinationGallery::where(['destination_id' => $c_destination->id])->get();

    $author = Author::find($c_destination->author_id);

    $faqs = DestinationPageFaq::where(['page_id' => $c_destination->id])->get();

    if ($request->segment(2) != '') {
      $wrdseo = ['url' => 'destination-detail-page-tab'];
    } else {
      $wrdseo = ['url' => 'destination-detail-page'];
    }
    $dseo = DefaultSeo::where($wrdseo)->first();

    $page_url = url()->current();
    $title = $c_destination->page_name;
    $site = 'tutelagestudy.com';

    $tagArray = ['title' => $title, 'currentmonth' => date('M'), 'currentyear' => date('Y'), 'site' => $site];

    $meta_title = $c_destination->meta_title == '' ? $dseo->title : $c_destination->meta_title;
    $meta_title = replaceTag($meta_title, $tagArray);

    $meta_keyword = $c_destination->meta_keyword == '' ? $dseo->keyword : $c_destination->meta_keyword;
    $meta_keyword = replaceTag($meta_keyword, $tagArray);

    $page_content = $c_destination->page_content == '' ? $dseo->page_content : $c_destination->page_content;
    $page_content = replaceTag($page_content, $tagArray);

    $meta_description = $c_destination->meta_description == '' ? $dseo->description : $c_destination->meta_description;
    $meta_description = replaceTag($meta_description, $tagArray);

    $og_image_path = $c_destination->image_path == '' ? $dseo->ogimgpath : $c_destination->image_path;

    $otherexam = Destination::where(['status' => 1])->where('id', '!=', $c_destination->id)->limit('10')->get();

    $tu = University::where(['status' => 1, 'country' => $c_destination->country])->get();
    $brochureUniversities = University::where(['status' => 1, 'country' => $c_destination->country])->where('brochure_path', '!=', null)->get();

    $tslug = $tabTitleDet->id;
    $whrco = ['page_id' => $c_destination->id, 'tab_id' => $tslug];
    $content = DestinationPageContent::where($whrco)->orderBy('priority', 'ASC')->get();
    $count_content = $content->count();
    $tabs = DestinationPageContent::with('getTab')->select('tab_id')->groupBy('tab_id')->where(['page_id' => $c_destination->id])->get();
    // printArray($tabs->toArray());
    // die;
    $otabs = DestinationPageContent::with('getTab')->select('tab_id')->groupBy('tab_id')->where(['page_id' => $c_destination->id])->where('tab_id', '!=', $tslug)->get();

    $allcat = NewsCategory::all();
    $allnews = News::limit(20)->get();

    $destinations =

      $data = compact('c_destination', 'tabTitleDet', 'testimonials', 'photos', 'author', 'faqs', 'meta_title', 'meta_keyword', 'meta_description', 'page_content', 'og_image_path', 'otherexam', 'tu', 'site', 'content', 'count_content', 'tabs', 'otabs', 'allcat', 'allnews', 'page_url', 'brochureUniversities');

    return view('front.destination-details')->with($data);
  }
}
