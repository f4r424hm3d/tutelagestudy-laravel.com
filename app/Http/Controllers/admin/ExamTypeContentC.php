<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ExamType;
use App\Models\ExamTypeContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Validator;

class ExamTypeContentC extends Controller
{
  protected $page_route;
  public function __construct()
  {
    $this->page_route = 'exam-type-contents';
  }
  public function index(Request $request, $exam_type_id, $id = null)
  {
    $examType = ExamType::find($exam_type_id);
    $page_no = $_GET['page'] ?? 1;
    $rows = ExamTypeContent::where('exam_type_id', $exam_type_id)->get();
    $parentContents = ExamTypeContent::where('exam_type_id', $exam_type_id)->where('parent_id', null)->get();
    if ($id != null) {
      $sd = ExamTypeContent::find($id);
      if (!is_null($sd)) {
        $ft = 'edit';
        $url = url('admin/' . $this->page_route . '/' . $exam_type_id . '/update/' . $id);
        $title = 'Update';
      } else {
        return redirect('admin/' . $this->page_route . '/' . $exam_type_id);
      }
    } else {
      $ft = 'add';
      $url = url('admin/' . $this->page_route . '/store');
      $title = 'Add New';
      $sd = '';
    }
    $page_title = "Exam Type Contents";
    $page_route = $this->page_route;
    $lastPosition = $rows->count() + 1;
    $data = compact('rows', 'sd', 'ft', 'title', 'page_title', 'page_route', 'page_no', 'url', 'exam_type_id', 'examType', 'parentContents', 'lastPosition');
    return view('admin.exam-type-contents')->with($data);
  }
  public function store(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'exam_type_id' => 'required',
      'title' => 'required',
      'description' => 'required',
    ]);

    if ($validator->fails()) {
      return response()->json([
        'error' => $validator->errors(),
      ]);
    }

    $field = new ExamTypeContent();
    $field->exam_type_id = $request['exam_type_id'];
    $field->title = $request['title'];
    $field->slug = slugify($request['title']);
    $field->description = $request['description'];
    $field->position = $request['position'];
    $field->parent_id = $request['parent_id'];
    $field->save();
    return response()->json(['success' => 'Records inserted succesfully.']);
  }
  public function update($exam_type_id, $id, Request $request)
  {
    // echo $exam_type_id;
    // die;
    $request->validate(
      [
        'exam_type_id' => 'required',
        'title' => 'required',
        'description' => 'required',
      ]
    );
    $field = ExamTypeContent::find($id);
    $field->exam_type_id = $request['exam_type_id'];
    $field->title = $request['title'];
    $field->slug = slugify($request['title']);
    $field->description = $request['description'];
    $field->position = $request['position'];
    $field->parent_id = $request['parent_id'];
    $field->save();
    session()->flash('smsg', 'Record has been updated successfully.');
    return redirect('admin/' . $this->page_route . '/' . $exam_type_id);
  }
  public function getData(Request $request)
  {
    // return $request;
    // die;
    $rows = ExamTypeContent::orderBy('position')->where('exam_type_id', $request->exam_type_id)->paginate(10)->withPath('/admin/' . $this->page_route . '/' . $request->exam_type_id);
    $i = 1;
    $output = '<table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
    <thead>
      <tr>
        <th>Sr. No.</th>
        <th>Position</th>
        <th>Title</th>
        <th>Description</th>
        <th>Parent Title</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>';
    foreach ($rows as $row) {
      $parentTitle = $row->parent_id != null ? $row->parent->title : 'N/A';
      $output .= '<tr id="row'
        . $row->id . '">
            <td>' . $i . '</td>
            <td>' . $row->position . '</td>
            <td>' . $row->title . '</td>
            <td>
              ' . Blade::render('<x-content-view-modal :row="$row" field="description" title="Description" />', ['row' => $row]) . '
            </td>
            <td>' . $parentTitle . '</td>
            <td>
             ' . Blade::render('<x-delete-button :id="$id" />', ['id' => $row->id]) . '
              ' . Blade::render('<x-edit-button :url="$url" />', ['url' => url('admin/' . $this->page_route . '/' . $request->exam_type_id . '/update/' . $row->id)]) . '
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
      $row = ExamTypeContent::findOrFail($id);
      //   if ($row->thumbnail_path != null) {
      //     unlink($row->thumbnail_path);
      //   }
      $row->delete();
      return response()->json(['success' => true]);
    } else {
      return response()->json(['success' => false]);
    }
  }
  public function getPosition(Request $request)
  {
    $rows = ExamTypeContent::where('exam_type_id', $request->exam_type_id)->count();
    $lastPosition = $rows + 1;
    return $lastPosition;
  }
  public function getParentHeadings(Request $request)
  {
    $rows = ExamTypeContent::where('exam_type_id', $request->exam_type_id)->where('parent_id', null)->get();
    $output = '<option value="">Select</option>';
    foreach ($rows as $row) {
      $output .= '<option value="' . $row->id . '">' . $row->title . '</option>';
    }
    return $output;
  }
}
