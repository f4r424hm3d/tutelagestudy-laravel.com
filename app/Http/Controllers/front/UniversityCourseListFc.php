<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\CourseCategory;
use App\Models\CourseSpecialization;
use App\Models\Level;
use App\Models\StudyMode;
use App\Models\University;
use App\Models\UniversityProgram;
use Illuminate\Http\Request;

class UniversityCourseListFc extends Controller
{
  public function index(Request $request)
  {
    $university_slug = $request->segment(1);
    $university = University::where(['slug' => $university_slug])->first();
    $rows = UniversityProgram::where(['university_id' => $university->id, 'status' => 1]);

    if (session()->has('UCF_level')) {
      $rows = $rows->where(['level_id' => session()->get('UCF_level')]);
      $filter_level = Level::find(session()->get('UCF_level'));
    } else {
      $filter_level = null;
    }
    if (session()->has('UCF_course_category')) {
      $rows = $rows->where(['course_category_id' => session()->get('UCF_course_category')]);
      $filter_category = CourseCategory::find(session()->get('UCF_course_category'));
    } else {
      $filter_category = null;
    }
    if (session()->has('UCF_specialization')) {
      $rows = $rows->where(['specialization_id' => session()->get('UCF_specialization')]);
      $filter_specialization = CourseSpecialization::find(session()->get('UCF_specialization'));
    } else {
      $filter_specialization = null;
    }
    if (session()->has('UCF_study_mode')) {
      //$rows = $rows->where(['specialization_id' => session()->get('UCF_specialization')]);
      $rows = $rows->whereJsonContains('study_mode', session()->get('UCF_study_mode'));
    }

    $rows = $rows->paginate(5)->withQueryString();

    $total = $rows->total();
    $cp = $rows->currentPage();
    $pp = $rows->perPage();
    $i = ($cp - 1) * $pp + 1;

    $levels = UniversityProgram::select('level_id')->where(['university_id' => $university->id, 'status' => 1])->distinct()->get();

    $categories = UniversityProgram::select('course_category_id')->where(['university_id' => $university->id, 'status' => 1])->distinct();
    if (session()->has('UCF_level')) {
      $categories = $categories->where(['level_id' => session()->get('UCF_level')]);
    }
    $categories = $categories->get();

    $specializations = UniversityProgram::select('specialization_id')->where(['university_id' => $university->id, 'status' => 1])->distinct();
    if (session()->has('UCF_level')) {
      $specializations = $specializations->where(['level_id' => session()->get('UCF_level')]);
    }
    if (session()->has('UCF_course_category')) {
      $specializations = $specializations->where(['course_category_id' => session()->get('UCF_course_category')]);
    }
    $specializations = $specializations->get();

    $study_modes = StudyMode::all();

    $data = compact('university', 'rows', 'i', 'levels', 'categories', 'specializations', 'study_modes', 'total', 'filter_level', 'filter_category', 'filter_specialization');
    return view('front.university-course-list')->with($data);
  }

  public function applyLevelFilter(Request $request)
  {
    session()->forget('UCF_course_category');
    session()->forget('UCF_specialization');
    session()->forget('UCF_study_mode');
    $level_id = $request->level_id;
    $level = Level::find($level_id);
    $request->session()->put('UCF_level', $level_id);
    return $level->slug . '-courses';
  }
  public function applyCategoryFilter(Request $request)
  {
    session()->forget('UCF_specialization');
    $course_category_id = $request->course_category_id;
    $category = CourseCategory::find($course_category_id);
    $request->session()->put('UCF_course_category', $course_category_id);
    return $category->category_slug . '-courses';
  }
  public function applySpecializationFilter(Request $request)
  {
    $specialization_id = $request->specialization_id;
    $specialization = CourseSpecialization::find($specialization_id);
    $request->session()->put('UCF_specialization', $specialization_id);
    $request->session()->put('UCF_course_category', $specialization->course_category_id);
    return $specialization->specialization_slug . '-courses';
  }
  public function applyFilter(Request $request)
  {
    $request->session()->put($request->col, $request->val);
  }

  public function removeFilter(Request $request)
  {
    session()->forget($request->value);
  }
  public function removeAllFilter(Request $request)
  {
    session()->forget('UCF_level');
    session()->forget('UCF_course_category');
    session()->forget('UCF_specialization');
    session()->forget('UCF_study_mode');
  }
}
