<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\ExamPaper;
use Illuminate\Http\Request;

class ExamPaperFc extends Controller
{
  public function index(Request $request)
  {
    $years = ExamPaper::select('exam_year')->groupBy('exam_year')->get();

    $examPapers = collect(); // Empty collection by default

    // Check if any filter is applied
    if ($request->has('exam_year') || $request->has('exam_type') || $request->has('paper')) {
      $query = ExamPaper::query();

      if (!empty($request->exam_year)) {
        $query->where('exam_year', $request->exam_year);
      }

      if (!empty($request->exam_type)) {
        $query->where('exam_type_id', $request->exam_type);
      }

      if (!empty($request->paper)) {
        $query->where('paper_name', $request->paper);
      }

      // Fetch only if form is submitted
      $examPapers = $query->get();
    }

    $data = compact('years', 'examPapers');
    return view('front.downloads')->with($data);
  }

  public function getExamTypes(Request $request)
  {
    $year = $request->year;
    $examTypes = ExamPaper::where('exam_year', $year)
      ->select('exam_type_id')
      ->groupBy('exam_type_id')
      ->with('exam') // Eager loading to avoid N+1 queries
      ->get();

    return response()->json($examTypes->map(function ($row) {
      return [
        'id' => $row->exam->id,
        'name' => $row->exam->exam_type
      ];
    }));
  }

  public function getPapers(Request $request)
  {
    $examType = $request->exam_type;
    $papers = ExamPaper::where('exam_type_id', $examType)
      ->select('paper_name')
      ->groupBy('paper_name')
      ->get();

    return response()->json($papers->map(function ($row) {
      return [
        'id' => $row->paper_name,
        'name' => $row->paper_name
      ];
    }));
  }
}
