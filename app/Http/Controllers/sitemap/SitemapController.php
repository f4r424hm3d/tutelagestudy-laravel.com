<?php

namespace App\Http\Controllers\sitemap;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SitemapController extends Controller
{
  public function mbbsAbroad(Request $request)
  {
    return view('sm.sitemap');
  }
}
