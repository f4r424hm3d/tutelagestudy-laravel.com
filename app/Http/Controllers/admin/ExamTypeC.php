<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ExamType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Validator;

class ExamTypeC extends Controller
{
  protected $page_route;
  public function __construct()
  {
    $this->page_route = 'exam-types';
  }
  public function index($id = null)
  {
    $page_no = $_GET['page'] ?? 1;
    $rows = ExamType::get();
    if ($id != null) {
      $sd = ExamType::find($id);
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
    $page_title = "Exam Types";
    $page_route = $this->page_route;
    $data = compact('rows', 'sd', 'ft', 'url', 'title', 'page_title', 'page_route', 'page_no');
    return view('admin.exam-types')->with($data);
  }
  public function getData(Request $request)
  {
    $rows = ExamType::where('id', '!=', '0');
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
    $validator = Validator::make($request->all(), [
      'exam_type' => 'required|unique:exam_types,exam_type',
    ]);

    if ($validator->fails()) {
      return response()->json([
        'error' => $validator->errors(),
      ]);
    }

    $field = new ExamType;
    $field->exam_type = $request['exam_type'];
    $field->slug = slugify($request['exam_type']);
    // $field->business_category = $request['business_category'];
    $field->save();
    return response()->json(['success' => 'Record hase been added succesfully.']);
  }
  public function update($id, Request $request)
  {
    $request->validate(
      [
        'exam_type' => 'required|unique:exam_types,exam_type,' . $id,
      ]
    );
    $field = ExamType::find($id);
    $field->exam_type = $request['exam_type'];
    $field->slug = slugify($request['exam_type']);
    // $field->business_category = $request['business_category'];
    $field->save();
    session()->flash('smsg', 'Record has been updated successfully.');
    return redirect('admin/' . $this->page_route);
  }
  public function delete($id)
  {
    if ($id) {
      $row = ExamType::findOrFail($id);

      $row->delete();
      return response()->json(['success' => true]);
    } else {
      return response()->json(['success' => false]);
    }
  }
}
