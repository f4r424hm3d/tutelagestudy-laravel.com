<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\DefaultSeo;
use App\Models\Exam;
use App\Models\ExamContent;
use App\Models\ExamPage;
use App\Models\ExamPageContent;
use App\Models\ExamPageFaq;
use Illuminate\Http\Request;

class ExamFc extends Controller
{
  public function index(Request $request)
  {
    $exams = Exam::where(['status' => 1])->get();
    $data = compact('exams');
    return view('front.all-exams')->with($data);
  }
  public function examPage(Request $request)
  {
    $exams = Exam::all();
    $exam_slug = $request->segment(1);
    $exam = Exam::where(['exam_slug' => $exam_slug])->first();
    $exam_pages = ExamPage::where(['exam_id' => $exam->id])->get();

    $wrdseo = ['url' => 'exam'];
    $dseo = DefaultSeo::where($wrdseo)->first();
    $page_url = url()->current();

    $title = $exam->exam_name;
    $site =  'tutelagestudy.com';
    $tagArray = ['title' => $title, 'currentmonth' => date('M'), 'currentyear' => date('Y'), 'site' => $site];

    $meta_title = $exam->meta_title == '' ? $dseo->title : $exam->meta_title;
    $meta_title = replaceTag($meta_title, $tagArray);

    $meta_keyword = $exam->meta_keyword == '' ? $dseo->keyword : $exam->meta_keyword;
    $meta_keyword = replaceTag($meta_keyword, $tagArray);

    $page_content = $exam->page_content == '' ? $dseo->page_content : $exam->page_content;
    $page_content = replaceTag($page_content, $tagArray);

    $meta_description = $exam->meta_description == '' ? $dseo->description : $exam->meta_description;
    $meta_description = replaceTag($meta_description, $tagArray);

    $og_image_path = $exam->imgpath == '' ? $dseo->ogimgpath : $exam->imgpath;

    $data = compact('exam', 'exams', 'exam_pages', 'dseo', 'page_url', 'meta_title', 'meta_keyword', 'page_content', 'meta_description', 'og_image_path');
    return view('front.exams')->with($data);
  }
  public function examPageDetail($slug, Request $request)
  {
    $exam_slug = $request->segment(1);
    $exams = Exam::where('exam_slug', '!=', $exam_slug)->get();
    $exam = Exam::where(['exam_slug' => $exam_slug])->first();
    $exam_pages = ExamPage::where(['exam_id' => $exam->id])->where('slug', '!=', $slug)->get();

    $exam_page = ExamPage::where('slug', $slug)->firstOrFail();
    $exam_page_contents = ExamPageContent::orderBy('priority', 'asc')->where('page_id', $exam_page->id)->get();
    $faqs = ExamPageFaq::where('page_id', $exam_page->id)->get();

    $wrdseo = ['url' => 'exam-page-detail'];
    $dseo = DefaultSeo::where($wrdseo)->first();
    $page_url = url()->current();
    $title = $exam_page->headline;
    $site =  'tutelagestudy.com';
    $tagArray = ['title' => $title, 'currentmonth' => date('M'), 'currentyear' => date('Y'), 'site' => $site];

    $meta_title = $exam_page->meta_title == '' ? $dseo->title : $exam_page->meta_title;
    $meta_title = replaceTag($meta_title, $tagArray);

    $meta_keyword = $exam_page->meta_keyword == '' ? $dseo->keyword : $exam_page->meta_keyword;
    $meta_keyword = replaceTag($meta_keyword, $tagArray);

    $page_content = $exam_page->page_content == '' ? $dseo->page_content : $exam_page->page_content;
    $page_content = replaceTag($page_content, $tagArray);

    $meta_description = $exam_page->meta_description == '' ? $dseo->description : $exam_page->meta_description;
    $meta_description = replaceTag($meta_description, $tagArray);

    $og_image_path = $exam_page->image_path == '' ? $dseo->ogimgpath : $exam_page->image_path;

    $data = compact('exam', 'exams', 'exam_page', 'exam_pages', 'exam_page_contents', 'faqs', 'dseo', 'page_url', 'meta_title', 'meta_keyword', 'page_content', 'meta_description', 'og_image_path');
    return view('front.exam-page-detail')->with($data);
  }
}
