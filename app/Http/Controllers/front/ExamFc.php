<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use App\Models\ExamContent;
use Illuminate\Http\Request;

class ExamFc extends Controller
{
  public function index(Request $request)
  {
    $exams = Exam::where(['status' => 1])->get();
    $data = compact('exams');
    return view('front.exams')->with($data);
  }
  public function examDetail(Request $request)
  {
    $slug = $request->segment(1);
    $row = Exam::where('exam_slug',$slug)->first();
    $exams = Exam::where(['status' => 1])->where('exam_slug','!=',$slug)->get();
    $examcontent = ExamContent::where(['exam_id' => $row->id])->get();
    $data = compact('exams','examcontent','row');
    return view('front.exam-detail')->with($data);
  }
}
