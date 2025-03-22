<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\DefaultSeo;
use App\Models\ExamType;
use App\Models\ExamTypeYear;
use App\Models\ExamTypeYearPaper;
use Illuminate\Http\Request;

class ExamPaperDownloadFc extends Controller
{
  public function index($exam_type_slug, Request $request)
  {
    $examTypes = ExamType::where('slug', '!=', $exam_type_slug)->get();
    $examType = ExamType::where(['slug' => $exam_type_slug])->firstOrFail();


    $wrdseo = ['url' => 'exam-type-page'];
    $dseo = DefaultSeo::where($wrdseo)->first();
    $page_url = url()->current();
    $title = $examType->title;
    $exam_type = $examType->exam_type;
    $site =  'tutelagestudy.com';
    $tagArray = ['title' => $title, 'exam_type' => $exam_type, 'currentmonth' => date('M'), 'currentyear' => date('Y'), 'site' => $site];

    $meta_title = $examType->meta_title == '' ? $dseo->title : $examType->meta_title;
    $meta_title = replaceTag($meta_title, $tagArray);

    $meta_keyword = $examType->meta_keyword == '' ? $dseo->keyword : $examType->meta_keyword;
    $meta_keyword = replaceTag($meta_keyword, $tagArray);

    $page_content = $examType->page_content == '' ? $dseo->page_content : $examType->page_content;
    $page_content = replaceTag($page_content, $tagArray);

    $meta_description = $examType->meta_description == '' ? $dseo->description : $examType->meta_description;
    $meta_description = replaceTag($meta_description, $tagArray);

    $og_image_path = $examType->image_path == '' ? $dseo->ogimgpath : $examType->image_path;

    $data = compact('examType', 'examTypes', 'dseo', 'page_url', 'meta_title', 'meta_keyword', 'page_content', 'meta_description', 'og_image_path');
    return view('front.exam-type-detail')->with($data);
  }
  public function yearDetail($exam_type_slug, $year_slug, Request $request)
  {
    $examType = ExamType::where(['slug' => $exam_type_slug])->firstOrFail();
    $year = ExamTypeYear::where('exam_type_id', $examType->id)->where('slug', $year_slug)->firstOrFail();


    $wrdseo = ['url' => 'exam-type-year-page'];
    $dseo = DefaultSeo::where($wrdseo)->first();
    $page_url = url()->current();
    $exam_type = $examType->exam_type;
    $exam_year = $year->year;
    $title = $year->title;
    $site =  'tutelagestudy.com';
    $tagArray = ['title' => $title, 'exam_type' => $exam_type, 'exam_year' => $exam_year, 'currentmonth' => date('M'), 'currentyear' => date('Y'), 'site' => $site];

    $meta_title = $examType->meta_title == '' ? $dseo->title : $examType->meta_title;
    $meta_title = replaceTag($meta_title, $tagArray);

    $meta_keyword = $examType->meta_keyword == '' ? $dseo->keyword : $examType->meta_keyword;
    $meta_keyword = replaceTag($meta_keyword, $tagArray);

    $page_content = $examType->page_content == '' ? $dseo->page_content : $examType->page_content;
    $page_content = replaceTag($page_content, $tagArray);

    $meta_description = $examType->meta_description == '' ? $dseo->description : $examType->meta_description;
    $meta_description = replaceTag($meta_description, $tagArray);

    $og_image_path = $examType->image_path == '' ? $dseo->ogimgpath : $examType->image_path;

    $data = compact('examType', 'year', 'dseo', 'page_url', 'meta_title', 'meta_keyword', 'page_content', 'meta_description', 'og_image_path');
    return view('front.exam-type-year-detail')->with($data);
  }
  public function paperDetail($exam_type_slug, $year_slug, $paper_slug, Request $request)
  {
    $examType = ExamType::where(['slug' => $exam_type_slug])->firstOrFail();
    $year = ExamTypeYear::where('exam_type_id', $examType->id)->where('slug', $year_slug)->firstOrFail();
    $paper = ExamTypeYearPaper::where('exam_type_year_id', $year->id)->where('slug', $paper_slug)->firstOrFail();


    $wrdseo = ['url' => 'exam-type-year-paper-page'];
    $dseo = DefaultSeo::where($wrdseo)->first();
    $page_url = url()->current();
    $title = $paper->title;
    $paper_name = $paper->paper_name;
    $exam_type = $examType->exam_type;
    $exam_year = $year->year;
    $site =  'tutelagestudy.com';
    $tagArray = ['title' => $title, 'exam_type' => $exam_type, 'exam_year' => $exam_year, 'paper_name' => $paper_name, 'currentmonth' => date('M'), 'currentyear' => date('Y'), 'site' => $site];

    $meta_title = $examType->meta_title == '' ? $dseo->title : $examType->meta_title;
    $meta_title = replaceTag($meta_title, $tagArray);

    $meta_keyword = $examType->meta_keyword == '' ? $dseo->keyword : $examType->meta_keyword;
    $meta_keyword = replaceTag($meta_keyword, $tagArray);

    $page_content = $examType->page_content == '' ? $dseo->page_content : $examType->page_content;
    $page_content = replaceTag($page_content, $tagArray);

    $meta_description = $examType->meta_description == '' ? $dseo->description : $examType->meta_description;
    $meta_description = replaceTag($meta_description, $tagArray);

    $og_image_path = $examType->image_path == '' ? $dseo->ogimgpath : $examType->image_path;

    $data = compact('examType', 'year', 'paper', 'dseo', 'page_url', 'meta_title', 'meta_keyword', 'page_content', 'meta_description', 'og_image_path');
    return view('front.paper-detail')->with($data);
  }
}
