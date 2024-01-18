<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Destination;
use App\Models\ExamPage;
use App\Models\News;
use Illuminate\Http\Request;

class AuthorFc extends Controller
{
  public function index($slug, Request $request)
  {
    $author = Author::where(['slug' => $slug])->firstOrfail();

    $exam_pages = ExamPage::where('author_id', $author->id)->limit(40)->get();
    $destinations = Destination::where('author_id', $author->id)->limit(40)->get();
    $news = News::where('author_id', $author->id)->limit(40)->get();
    $title = $author->name . ', Author at Tutelage Study';
    $page_url = url()->current();
    $data = compact('author', 'exam_pages', 'destinations', 'news', 'title', 'page_url');
    return view('front.author-profile')->with($data);
  }
}
