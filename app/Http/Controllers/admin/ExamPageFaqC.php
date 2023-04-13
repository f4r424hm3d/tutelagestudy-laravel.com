<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use App\Models\ExamPage;
use App\Models\ExamPageFaq;
use Illuminate\Http\Request;

class ExamPageFaqC extends Controller
{
  public function index($page_id,$id = null)
  {
    $exampage = ExamPage::find($page_id);
    $exam = Exam::find($exampage->exam_id);
    $rows = ExamPageFaq::where('page_id',$page_id)->get();
    if ($id != null) {
      $sd = ExamPageFaq::find($id);
      if (!is_null($sd)) {
        $ft = 'edit';
        $url = url('admin/exam-page-faqs/update/' . $id);
        $title = 'Update';
      } else {
        return redirect('admin/exam-page-faqs');
      }
    } else {
      $ft = 'add';
      $url = url('admin/exam-page-faqs/store');
      $title = 'Add New';
      $sd = '';
    }
    $page_title = "Exam Page FAQs";
    $page_route = "exam-page-faqs";
    $data = compact('rows', 'sd', 'ft', 'url', 'title', 'page_title', 'page_route','page_id','exampage','exam');
    return view('admin.exam-page-faqs')->with($data);
  }
  public function store(Request $request)
  {
    // printArray($request->all());
    // die;
    $request->validate(
      [
        'question' => 'required',
      ]
    );
    $field = new ExamPageFaq;
    $field->page_id = $request['page_id'];
    $field->question = $request['question'];
    $field->answer = $request['answer'];
    $field->save();
    session()->flash('smsg', 'New record has been added successfully.');
    return redirect('admin/exam-page-faqs/'.$request['page_id']);
  }
  public function delete($id)
  {
    //echo $id;
    echo $result = ExamPageFaq::find($id)->delete();
  }
  public function update($id, Request $request)
  {
    $request->validate(
      [
        'question' => 'required',
      ]
    );
    $field = ExamPageFaq::find($id);
    $field->page_id = $request['page_id'];
    $field->question = $request['question'];
    $field->answer = $request['answer'];
    $field->save();
    session()->flash('smsg', 'Record has been updated successfully.');
    return redirect('admin/exam-page-faqs/'.$request['page_id']);
  }
}
