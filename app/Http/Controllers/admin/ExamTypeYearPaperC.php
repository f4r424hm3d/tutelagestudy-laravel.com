<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ExamTypeYear;
use App\Models\ExamTypeYearPaper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ExamTypeYearPaperC extends Controller
{
  protected $page_route;
  public function __construct()
  {
    $this->page_route = 'exam-type-year-papers';
  }
  public function index(Request $request, $exam_type_year_id, $id = null)
  {
    $examTypeYear = ExamTypeYear::find($exam_type_year_id);
    $page_no = $_GET['page'] ?? 1;
    $papers = ExamTypeYearPaper::where('exam_type_year_id', $exam_type_year_id)->select('paper_name')->groupBy('paper_name')->get();
    $rows = ExamTypeYearPaper::where('exam_type_year_id', $exam_type_year_id)->get();
    if ($id != null) {
      $sd = ExamTypeYearPaper::find($id);
      if (!is_null($sd)) {
        $ft = 'edit';
        $url = url('admin/' . $this->page_route . '/' . $exam_type_year_id . '/update/' . $id . '/');
        $title = 'Update';
      } else {
        return redirect('admin/' . $this->page_route . '/' . $exam_type_year_id);
      }
    } else {
      $ft = 'add';
      $url = url('admin/' . $this->page_route . '/store');
      $title = 'Add New';
      $sd = '';
    }
    $page_title = "Papers";
    $page_route = $this->page_route;
    $data = compact('rows', 'sd', 'ft', 'title', 'page_title', 'page_route', 'page_no', 'url', 'exam_type_year_id', 'examTypeYear', 'papers');
    return view('admin.exam-type-year-papers')->with($data);
  }
  public function store(Request $request)
  {
    // Apply slugify before validation
    $request->merge([
      'slug' => Str::slug($request->input('slug'))
    ]);

    $validator = Validator::make($request->all(), [
      'exam_type_year_id' => 'required',
      'paper_name' => [
        'required',
        Rule::unique('exam_type_year_papers')->where(function ($query) use ($request) {
          return $query->where('exam_type_year_id', $request->exam_type_year_id);
        }),
      ],

      'slug' => [
        'required',
        Rule::unique('exam_type_year_papers')->where(function ($query) use ($request) {
          return $query->where('exam_type_year_id', $request->exam_type_year_id);
        }),
      ],
      'question_paper' => 'required|max:12000|mimes:jpg,jpeg,webp,pdf',
      'answer_key' => 'nullable|max:12000|mimes:jpg,jpeg,webp,pdf',
    ]);

    if ($validator->fails()) {
      return response()->json([
        'error' => $validator->errors(),
      ]);
    }

    $year = ExamTypeYear::find($request['exam_type_year_id']);
    $path = slugify($year->examType->exam_type) . '/' . slugify($year->year) . '/' . slugify($request['paper_name']);

    $field = new ExamTypeYearPaper();
    $field->exam_type_year_id = $request['exam_type_year_id'];
    $field->paper_name = $request['paper_name'];
    $field->slug = slugify($request['slug']);
    if ($request->hasFile('question_paper')) {
      $fileOriginalName = $request->file('question_paper')->getClientOriginalName();
      $fileNameWithoutExtention = pathinfo($fileOriginalName, PATHINFO_FILENAME);
      $file_name_slug = slugify($fileNameWithoutExtention);
      $fileExtention = $request->file('question_paper')->getClientOriginalExtension();
      $file_name = $file_name_slug . '-' . time() . '.' . $fileExtention;
      $move = $request->file('question_paper')->move('uploads/paper/' . $path . '/', $file_name);
      if ($move) {
        $field->question_paper = 'uploads/paper/' . $path . '/' . $file_name;
      }
    }
    if ($request->hasFile('answer_key')) {
      $fileOriginalName = $request->file('answer_key')->getClientOriginalName();
      $fileNameWithoutExtention = pathinfo($fileOriginalName, PATHINFO_FILENAME);
      $file_name_slug = slugify($fileNameWithoutExtention);
      $fileExtention = $request->file('answer_key')->getClientOriginalExtension();
      $file_name = $file_name_slug . '-' . time() . '.' . $fileExtention;
      $move = $request->file('answer_key')->move('uploads/paper/' . $path . '/', $file_name);
      if ($move) {
        $field->answer_key = 'uploads/paper/' . $path . '/' . $file_name;
      }
    }
    $field->save();
    return response()->json(['success' => 'Records inserted succesfully.']);
  }
  public function update($exam_type_year_id, $id, Request $request)
  {
    // Apply slugify before validation
    $request->merge([
      'slug' => Str::slug($request->input('slug'))
    ]);

    $request->validate(
      [
        'exam_type_year_id' => 'required',
        'paper_name' => [
          'required',
          Rule::unique('exam_type_year_papers')->ignore($id)->where(function ($query) use ($request) {
            return $query->where('exam_type_year_id', $request->exam_type_year_id);
          }),
        ],

        'slug' => [
          'required',
          Rule::unique('exam_type_year_papers')->ignore($id)->where(function ($query) use ($request) {
            return $query->where('exam_type_year_id', $request->exam_type_year_id);
          }),
        ],
        'question_paper' => 'required|max:12000|mimes:jpg,jpeg,webp,pdf',
        'answer_key' => 'nullable|max:12000|mimes:jpg,jpeg,webp,pdf',
      ]
    );

    $year = ExamTypeYear::find($request['exam_type_year_id']);
    $path = slugify($year->examType->exam_type) . '/' . slugify($year->year) . '/' . slugify($request['paper_name']);

    $field = ExamTypeYearPaper::find($id);
    $field->exam_type_year_id = $request['exam_type_year_id'];
    $field->year = $request['year'];
    $field->slug = slugify($request['slug']);
    if ($request->hasFile('question_paper')) {
      $fileOriginalName = $request->file('question_paper')->getClientOriginalName();
      $fileNameWithoutExtention = pathinfo($fileOriginalName, PATHINFO_FILENAME);
      $file_name_slug = slugify($fileNameWithoutExtention);
      $fileExtention = $request->file('question_paper')->getClientOriginalExtension();
      $file_name = $file_name_slug . '-' . time() . '.' . $fileExtention;
      $move = $request->file('question_paper')->move('uploads/paper/' . $path . '/', $file_name);
      if ($move) {
        $field->question_paper = 'uploads/paper/' . $path . '/' . $file_name;
      }
    }
    if ($request->hasFile('answer_key')) {
      $fileOriginalName = $request->file('answer_key')->getClientOriginalName();
      $fileNameWithoutExtention = pathinfo($fileOriginalName, PATHINFO_FILENAME);
      $file_name_slug = slugify($fileNameWithoutExtention);
      $fileExtention = $request->file('answer_key')->getClientOriginalExtension();
      $file_name = $file_name_slug . '-' . time() . '.' . $fileExtention;
      $move = $request->file('answer_key')->move('uploads/paper/' . $path . '/', $file_name);
      if ($move) {
        $field->answer_key = 'uploads/paper/' . $path . '/' . $file_name;
      }
    }
    $field->save();
    session()->flash('smsg', 'Record has been updated successfully.');
    return redirect('admin/' . $this->page_route . '/' . $exam_type_year_id);
  }
  public function getData(Request $request)
  {
    // return $request;
    // die;
    $rows = ExamTypeYearPaper::where('exam_type_year_id', $request->exam_type_year_id)->paginate(10)->withPath('/admin/' . $this->page_route . '/' . $request->exam_type_year_id);
    $i = 1;
    $output = '<table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
    <thead>
      <tr>
        <th>Sr. No.</th>
        <th>Paper Name</th>
        <th>QP</th>
        <th>Contents</th>
        <th>Faqs</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>';
    foreach ($rows as $row) {
      $output .= '<tr id="row' . $row->id . '">
            <td>' . $i . '</td>
            <td>' . $row->paper_name . '</td>
            <td>';
      if ($row->question_paper != null && file_exists($row->question_paper)) {
        $output .= '<a href="' . url($row->question_paper) . '" class="btn btn-xs btn-info"
                  target="_blank">view</a>';
      } else {
        $output .= 'N/A';
      }
      $output .= '</td>

            <td>' . Blade::render('<x-custom-button :url="$url" label="Contents" :count="$count" />', ['url' => url('admin/paper-contents/' . $row->id), 'count' => $row->contents->count()]) . '
      </td>
      <td>
      ' . Blade::render('<x-custom-button :url="$url" label="Faqs" :count="$count" />', ['url' => url('admin/paper-faqs/' . $row->id), 'count' => $row->faqs->count()]) . '
      </td>
            <td>
             ' . Blade::render('<x-delete-button :id="$id" />', ['id' => $row->id]) . '
              ' . Blade::render('<x-edit-button :url="$url" />', ['url' => url('admin/' . $this->page_route . '/' . $request->exam_type_year_id . '/update/' . $row->id)]) . '
            </td>
          </tr>';
      $i++;
    }
    $output .= '</tbody></table>';
    $output .= '<div>' . $rows->links('pagination::bootstrap-5') . '</div>';
    return $output;
  }
  public function delete($id)
  {
    if ($id) {
      $row = ExamTypeYearPaper::findOrFail($id);
      //   if ($row->thumbnail_path != null) {
      //     unlink($row->thumbnail_path);
      //   }
      $row->delete();
      return response()->json(['success' => true]);
    } else {
      return response()->json(['success' => false]);
    }
  }
}
