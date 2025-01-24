<?php

namespace App\Http\Controllers\sitemap;

use App\Http\Controllers\Controller;
use App\Models\Destination;
use App\Models\Exam;
use App\Models\ExamPage;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Service;
use App\Models\University;
use Illuminate\Http\Request;

class SitemapController extends Controller
{
  public function sitemap(Request $request)
  {
    $utf = '<?xml version="1.0" encoding="UTF-8"?>';
    return response()->view('sm.sitemap', compact('utf'))->header('Content-Type', 'application/xml; charset=utf-8');
  }

  public function home(Request $request)
  {
    $utf = '<?xml version="1.0" encoding="UTF-8"?>';
    return response()->view('sm.home', compact('utf'))->header('Content-Type', 'application/xml; charset=utf-8');
  }

  public function blog(Request $request)
  {
    $utf = '<?xml version="1.0" encoding="UTF-8"?>';
    $categories = BlogCategory::all();
    $news = Blog::all();
    $data = compact('categories', 'news', 'utf');
    return response()->view('sm.blog', $data)->header('Content-Type', 'application/xml; charset=utf-8');
  }

  public function medicalUniversity(Request $request)
  {
    $utf = '<?xml version="1.0" encoding="UTF-8"?>';
    $universities = University::groupBy('country_slug')->get();
    $data = compact('universities', 'utf');
    return response()->view('sm.medical-universities', $data)->header('Content-Type', 'application/xml; charset=utf-8');
  }

  public function destination(Request $request)
  {
    $utf = '<?xml version="1.0" encoding="UTF-8"?>';
    $destinations = Destination::all();
    $data = compact('destinations', 'utf');
    return response()->view('sm.destinations', $data)->header('Content-Type', 'application/xml; charset=utf-8');
  }

  public function services(Request $request)
  {
    $utf = '<?xml version="1.0" encoding="UTF-8"?>';
    $services = Service::all();
    $data = compact('services', 'utf');
    return response()->view('sm.services', $data)->header('Content-Type', 'application/xml; charset=utf-8');
  }

  public function exam(Request $request)
  {
    $utf = '<?xml version="1.0" encoding="UTF-8"?>';
    $exams = Exam::all();
    $exampages = ExamPage::all();
    $data = compact('exams', 'exampages', 'utf');
    return response()->view('sm.exam', $data)->header('Content-Type', 'application/xml; charset=utf-8');
  }

  public function university(Request $request)
  {
    $utf = '<?xml version="1.0" encoding="UTF-8"?>';
    $universities = University::all();
    $data = compact('universities', 'utf');
    return response()->view('sm.university', $data)->header('Content-Type', 'application/xml; charset=utf-8');
  }
}
