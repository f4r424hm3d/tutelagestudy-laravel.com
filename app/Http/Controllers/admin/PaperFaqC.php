<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ExamTypeYearPaper;
use App\Models\PaperFaq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Validator;

class PaperFaqC extends Controller
{
  protected $page_route;
  public function __construct()
  {
    $this->page_route = 'paper-faqs';
  }
  public function index(Request $request, $paper_id, $id = null)
  {
    $paper = ExamTypeYearPaper::find($paper_id);
    $page_no = $_GET['page'] ?? 1;
    $rows = PaperFaq::where('paper_id', $paper_id)->get();
    if ($id != null) {
      $sd = PaperFaq::find($id);
      if (!is_null($sd)) {
        $ft = 'edit';
        $url = url('admin/' . $this->page_route . '/' . $paper_id . '/update/' . $id . '/');
        $title = 'Update';
      } else {
        return redirect('admin/' . $this->page_route . '/' . $paper_id);
      }
    } else {
      $ft = 'add';
      $url = url('admin/' . $this->page_route . '/store');
      $title = 'Add New';
      $sd = '';
    }
    $page_title = "Paper Faqs";
    $page_route = $this->page_route;
    $data = compact('rows', 'sd', 'ft', 'title', 'page_title', 'page_route', 'page_no', 'url', 'paper_id', 'paper');
    return view('admin.paper-faqs')->with($data);
  }
  public function store(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'paper_id' => 'required',
      'question' => 'required',
      'answer' => 'required',
    ]);

    if ($validator->fails()) {
      return response()->json([
        'error' => $validator->errors(),
      ]);
    }

    $field = new PaperFaq();
    $field->paper_id = $request['paper_id'];
    $field->question = $request['question'];
    $field->answer = $request['answer'];
    $field->save();
    return response()->json(['success' => 'Records inserted succesfully.']);
  }
  public function update($paper_id, $id, Request $request)
  {
    $request->validate(
      [
        'paper_id' => 'required',
        'question' => 'required',
        'answer' => 'required',
      ]
    );
    $field = PaperFaq::find($id);
    $field->paper_id = $request['paper_id'];
    $field->question = $request['question'];
    $field->answer = $request['answer'];
    $field->save();
    session()->flash('smsg', 'Record has been updated successfully.');
    return redirect('admin/' . $this->page_route . '/' . $paper_id);
  }
  public function getData(Request $request)
  {
    // return $request;
    // die;
    $rows = PaperFaq::where('paper_id', $request->paper_id)->paginate(10)->withPath('/admin/' . $this->page_route . '/' . $request->paper_id);
    $i = 1;
    $output = '<table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
    <thead>
      <tr>
        <th>Sr. No.</th>
        <th>Question</th>
        <th>Answer</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>';
    foreach ($rows as $row) {
      $output .= '<tr id="row'
        . $row->id . '">
            <td>' . $i . '</td>
            <td>' . $row->question . '</td>
            <td>
              ' . Blade::render('<x-content-view-modal :row="$row" field="answer" title="Answer" />', ['row' => $row]) . '
            </td>
            <td>
             ' . Blade::render('<x-delete-button :id="$id" />', ['id' => $row->id]) . '
              ' . Blade::render('<x-edit-button :url="$url" />', ['url' => url('admin/' . $this->page_route . '/' . $request->paper_id . '/update/' . $row->id)]) . '
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
      $row = PaperFaq::findOrFail($id);
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
