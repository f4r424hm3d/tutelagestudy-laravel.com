<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\DefaultSeo;
use App\Models\Destination;
use App\Models\InstituteType;
use App\Models\University;
use Illuminate\Http\Request;

class UniversityFc extends Controller
{
  public function index(Request $request)
  {
    $currentDestinationdet = null;
    $currentCountry = 'Abroad';
    //error_reporting(0);
    $rows = University::where(['status' => 1]);
    if ($request->has('search') && $request->search != '') {
      $rows = $rows->where('name', 'like', '%' . $request->search . '%');
    }
    if (session('unifilter_destination')) {
      $rows = $rows->where(['destination_id' => session('unifilter_destination')]);
      $currentDestinationdet = Destination::where('id', session('unifilter_destination'))->firstOrFail();
      session()->put('unifilter_destination', $currentDestinationdet->id);
      $currentCountry = $currentDestinationdet->country;
    }
    $rows = $rows->paginate(20)->withPath('/medical-universities/')->withQueryString();
    //$rows = $rows->setPath('medical-universities/?');


    $total = $rows->total();
    $cp = $rows->currentPage();
    $pp = $rows->perPage();
    $i = ($cp - 1) * $pp + 1;

    $countries = Country::all();

    //$destinations = University::with('getDestination')->select('destination_id')->where(['status' => 1])->distinct()->get();
    $destinations = Destination::whereHas('universities', function ($query) {
      $query->where('status', 1); // Adjust the condition as needed
    })->get();

    // printArray($destinations->toArray());
    // die;

    $wrdseo = ['url' => 'medical-universities'];
    $dseo = DefaultSeo::where($wrdseo)->first();
    $page_url = url()->current();

    $uword = $total > 1 ? 'Universities' : 'University';
    $pageHeadingTitle = 'Found <strong>' . $total . '</strong> Medical ' . $uword . ' in <strong>' . $currentCountry . '</strong>';
    $title = $total . ' Medical ' . $uword . ' in ' . $currentCountry;
    $site =  'tutelagestudy.com';
    $tagArray = ['title' => $title, 'currentmonth' => date('M'), 'currentyear' => date('Y'), 'site' => $site];

    $meta_title = replaceTag($dseo->title, $tagArray);
    $meta_keyword = replaceTag($dseo->keyword, $tagArray);
    $page_content = replaceTag($dseo->page_content, $tagArray);
    $meta_description = replaceTag($dseo->description, $tagArray);
    $og_image_path = null;

    $data = compact('rows', 'i', 'destinations', 'total', 'dseo', 'page_url', 'meta_title', 'meta_keyword', 'page_content', 'meta_description', 'og_image_path', 'pageHeadingTitle', 'countries', 'currentDestinationdet');
    return view('front.medical-universities')->with($data);
  }
  public function universitybyCountry($destination_slug, Request $request)
  {
    $currentDestinationdet = Destination::where('slug', $destination_slug)->firstOrFail();
    session()->put('unifilter_destination', $currentDestinationdet->id);
    $currentCountry = $currentDestinationdet->country;

    // if ($request->segment(1) != 'medical-universities') {
    //   $country_slug = str_replace("medical-universities-in-", "", $request->segment(1));
    //   $country_slug = str_replace('-', ' ', $country_slug);
    //   $currentDestinationdet = Destination::where('country', $country_slug)->first();
    //   session()->put('unifilter_destination', $currentDestinationdet->page_name);
    //   $currentCountry = $currentDestinationdet->country;
    // }

    $rows = University::where(['status' => 1]);
    if (session('unifilter_destination')) {
      $rows = $rows->where(['destination_id' => session('unifilter_destination')]);
    }
    $rows = $rows->paginate(20)->withQueryString();

    $total = $rows->total();
    $cp = $rows->currentPage();
    $pp = $rows->perPage();
    $i = ($cp - 1) * $pp + 1;

    $countries = Country::all();

    //$destinations = University::with('getDestination')->select('destination_id')->where(['status' => 1])->distinct()->get();
    $destinations = Destination::whereHas('universities', function ($query) {
      $query->where('status', 1); // Adjust the condition as needed
    })->get();


    $wrdseo = ['url' => 'medical-universities'];
    $dseo = DefaultSeo::where($wrdseo)->first();
    $page_url = url()->current();

    $uword = $total > 1 ? 'Universities' : 'University';
    $pageHeadingTitle = 'Found <strong>' . $total . '</strong> Medical ' . $uword . ' in <strong>' . $currentCountry . '</strong>';
    $title = $total . ' Medical ' . $uword . ' in ' . $currentCountry;
    $site =  'tutelagestudy.com';
    $tagArray = ['title' => $title, 'currentmonth' => date('M'), 'currentyear' => date('Y'), 'site' => $site];

    $meta_title = replaceTag($dseo->title, $tagArray);
    $meta_keyword = replaceTag($dseo->keyword, $tagArray);
    $page_content = replaceTag($dseo->page_content, $tagArray);
    $meta_description = replaceTag($dseo->description, $tagArray);
    $og_image_path = null;

    $data = compact('rows', 'i', 'destinations', 'total', 'dseo', 'page_url', 'meta_title', 'meta_keyword', 'page_content', 'meta_description', 'og_image_path', 'pageHeadingTitle', 'countries', 'currentDestinationdet');
    return view('front.medical-universities')->with($data);
  }


  public function removeFilter(Request $request)
  {
    session()->forget($request->value);
  }
}
