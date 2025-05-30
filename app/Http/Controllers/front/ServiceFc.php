<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\DefaultSeo;
use App\Models\Destination;
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
  public function serviceDetail($slug, Request $request)
  {
    $service = Service::where('slug', $slug)->firstOrFail();
    $services = Service::where(['status' => 1])->where('slug', '!=', $slug)->get();
    $destinations = Destination::where(['status' => 1])->limit(6)->get();

    $wrdseo = ['url' => 'servicedetailpage'];
    $dseo = DefaultSeo::where($wrdseo)->first();
    $page_url = url()->current();
    $title = $service->headline;
    $site =  'tutelagestudy.com';
    $tagArray = ['title' => $title, 'currentmonth' => date('M'), 'currentyear' => date('Y'), 'site' => $site];

    $meta_title = $service->meta_title == '' ? $dseo->title : $service->meta_title;
    $meta_title = replaceTag($meta_title, $tagArray);

    $meta_keyword = $service->meta_keyword == '' ? $dseo->keyword : $service->meta_keyword;
    $meta_keyword = replaceTag($meta_keyword, $tagArray);

    $page_content = $service->page_content == '' ? $dseo->page_content : $service->page_content;
    $page_content = replaceTag($page_content, $tagArray);

    $meta_description = $service->meta_description == '' ? $dseo->description : $service->meta_description;
    $meta_description = replaceTag($meta_description, $tagArray);

    $og_image_path = $service->imgpath == '' ? $dseo->ogimgpath : $service->imgpath;

    $data = compact('services', 'service', 'dseo', 'page_url', 'meta_title', 'meta_keyword', 'page_content', 'meta_description', 'og_image_path', 'destinations');
    return view('front.service-detail')->with($data);
  }
}
