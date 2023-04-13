<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use App\Models\ExamPage;
use App\Models\ExamPageContent;
use Illuminate\Http\Request;

class ExamPageContentC extends Controller
{
  public function index($page_id,$id = null)
  {
    $exampage = ExamPage::find($page_id);
    $exam = Exam::find($exampage->exam_id);
    $rows = ExamPageContent::where('page_id',$page_id)->get();
    if ($id != null) {
      $sd = ExamPageContent::find($id);
      if (!is_null($sd)) {
        $ft = 'edit';
        $url = url('admin/exam-page-contents/update/' . $id);
        $title = 'Update';
      } else {
        return redirect('admin/exam-page-contents');
      }
    } else {
      $ft = 'add';
      $url = url('admin/exam-page-contents/store');
      $title = 'Add New';
      $sd = '';
    }
    $page_title = "Exam Page Contents";
    $page_route = "exam-page-contents";
    $data = compact('rows', 'sd', 'ft', 'url', 'title', 'page_title', 'page_route','page_id','exampage','exam');
    return view('admin.exam-page-contents')->with($data);
  }
  public function store(Request $request)
  {
    // printArray($request->all());
    // die;
    $request->validate(
      [
        'title' => 'required',
      ]
    );
    $field = new ExamPageContent;
    $field->page_id = $request['page_id'];
    $field->title = $request['title'];
    $field->tab_content = $request['tab_content'];
    $field->save();
    session()->flash('smsg', 'New record has been added successfully.');
    return redirect('admin/exam-page-contents/'.$request['page_id']);
  }
  public function delete($id)
  {
    //echo $id;
    echo $result = ExamPageContent::find($id)->delete();
  }
  public function update($id, Request $request)
  {
    $request->validate(
      [
        'title' => 'required',
      ]
    );
    $field = ExamPageContent::find($id);
    $field->page_id = $request['page_id'];
    $field->title = $request['title'];
    $field->tab_content = $request['tab_content'];
    $field->save();
    session()->flash('smsg', 'Record has been updated successfully.');
    return redirect('admin/exam-page-contents/'.$request['page_id']);
  }
}
