<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Imports\ExamPaperImport;
use App\Models\ExamPaper;
use App\Models\ExamType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class ExamPaperC extends Controller
{
  protected $page_route;
  public function __construct()
  {
    $this->page_route = 'exam-papers';
  }
  public function index($id = null)
  {
    $examTypes = ExamType::all();
    $papers = ExamPaper::select('paper_name')->groupBy('paper_name')->get();
    $rows = ExamPaper::paginate(20)->withPath('/admin/' . $this->page_route . '/');
    $cp = $rows->currentPage();
    $pp = $rows->perPage();
    $i = ($cp - 1) * $pp + 1;


    if ($id != null) {
      $sd = ExamPaper::find($id);
      if (!is_null($sd)) {
        $ft = 'edit';
        $url = url('admin/' . $this->page_route . '/update/' . $id . '/');
        $title = 'Update';
      } else {
        return redirect('admin/' . $this->page_route . '');
      }
    } else {
      $ft = 'add';
      $url = url('admin/' . $this->page_route . '/store/');
      $title = 'Add New';
      $sd = '';
    }
    $page_title = "Exam Papers";
    $page_route = $this->page_route;
    $data = compact('rows', 'sd', 'ft', 'url', 'title', 'page_title', 'page_route', 'examTypes', 'i', 'papers');
    return view('admin.exam-papers')->with($data);
  }
  public function getData(Request $request)
  {
    $rows = ExamPaper::where('id', '!=', '0');
    $rows = $rows->paginate(20)->withPath('/admin/' . $this->page_route . '/');
    $cp = $rows->currentPage();
    $pp = $rows->perPage();
    $i = ($cp - 1) * $pp + 1;
    $output = '<table id="datatabl" class="table table-bordered dt-responsive nowrap w-100">
    <thead>
      <tr>
        <th>Sr. No.</th>
        <th>Id</th>
        <th>Exam Type</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>';
    if ($rows->count() > 0) {
      foreach ($rows as $row) {
        $output .= '<tr id="row' . $row->id . '">
      <td>' . $i . '</td>
      <td>' . $row->id . '</td>
      <td>' . $row->exam_type . '</td>
      <td>
        ' . Blade::render('<x-delete-button :id="$id" />', ['id' => $row->id]) . '
        ' . Blade::render('<x-edit-button :url="$url" />', ['url' => url("admin/" . $this->page_route . "/update/" . $row->id)]) . '
      </td>
    </tr>';
        $i++;
      }
    } else {
      $output .= '<tr><td colspan="4"><center>No data found</center></td></tr>';
    }
    $output .= '</tbody></table>';
    $output .= '<div>' . $rows->links('pagination::bootstrap-5') . '</div>';
    return $output;
  }
  public function store(Request $request)
  {
    $request->validate(
      [
        'exam_year' => 'required|numeric',
        'exam_type_id' => 'required|numeric',
        'paper_name' => 'required',
        'shift' => 'required',
        'date_of_exam' => 'required|date',
        'question_paper' => 'required|max:5000|mimes:jpg,jpeg,webp,pdf',
        'answer_key' => 'nullable|max:5000|mimes:jpg,jpeg,webp,pdf',
      ]
    );
    $type = ExamType::find($request['exam_type_id']);
    $path = slugify($type->exam_type) . '/' . $request['exam_year'] . '/' . slugify($request['paper_name']);
    $field = new ExamPaper;
    $field->exam_year = $request['exam_year'];
    $field->exam_type_id = $request['exam_type_id'];
    $field->paper_name = $request['paper_name'];
    $field->shift = $request['shift'];
    $field->date_of_exam = $request['date_of_exam'];
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
    session()->flash('smsg', 'Record hase been added succesfully.');
    return redirect('admin/' . $this->page_route);
  }
  public function update($id, Request $request)
  {
    $request->validate(
      [
        'exam_year' => 'required|numeric',
        'exam_type_id' => 'required|numeric',
        'paper_name' => 'required',
        'shift' => 'required',
        'date_of_exam' => 'required|date',
        'question_paper' => 'nullable|max:5000|mimes:jpg,jpeg,webp,pdf',
        'answer_key' => 'nullable|max:5000|mimes:jpg,jpeg,webp,pdf',
      ]
    );
    $type = ExamType::find($request['exam_type_id']);
    $path = slugify($type->exam_type) . '/' . $request['exam_year'] . '/' . slugify($request['paper_name']);
    $field = ExamPaper::find($id);
    $field->exam_year = $request['exam_year'];
    $field->exam_type_id = $request['exam_type_id'];
    $field->paper_name = $request['paper_name'];
    $field->shift = $request['shift'];
    $field->date_of_exam = $request['date_of_exam'];
    if ($request->hasFile('question_paper')) {
      $fileOriginalName = $request->file('question_paper')->getClientOriginalName();
      $fileNameWithoutExtention = pathinfo($fileOriginalName, PATHINFO_FILENAME);
      $file_name_slug = slugify($fileNameWithoutExtention);
      $fileExtention = $request->file('question_paper')->getClientOriginalExtension();
      $file_name = $file_name_slug . '-' . time() . '.' . $fileExtention;
      $move = $request->file('question_paper')->move('uploads/paper/' . $path . '/', $file_name);
      if ($move) {
        if ($field->question_paper != null && file_exists($field->question_paper)) {
          unlink($field->question_paper);
        }
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
        if ($field->answer_key != null && file_exists($field->answer_key)) {
          unlink($field->answer_key);
        }
        $field->answer_key = 'uploads/paper/' . $path . '/' . $file_name;
      }
    }
    $field->save();
    session()->flash('smsg', 'Record has been updated successfully.');
    return redirect('admin/' . $this->page_route);
  }
  public function delete($id)
  {
    if ($id) {
      $row = ExamPaper::findOrFail($id);
      if ($row->question_paper != null && file_exists($row->question_paper)) {
        unlink($row->question_paper);
      }
      if ($row->answer_key != null && file_exists($row->answer_key)) {
        unlink($row->answer_key);
      }
      $row->delete();
      return response()->json(['success' => true]);
    } else {
      return response()->json(['success' => false]);
    }
  }
  public function Import(Request $request)
  {
    // printArray($data->all());
    // die;
    $request->validate([
      'file' => 'required|mimes:xlsx,csv,xls'
    ]);
    $file = $request->file;
    if ($file) {
      try {
        $result = Excel::import(new ExamPaperImport, $file);
        // session()->flash('smsg', 'Data has been imported succesfully.');
        return redirect('admin/' . $this->page_route);
      } catch (\Exception $ex) {
        dd($ex);
      }
    }
  }
}
