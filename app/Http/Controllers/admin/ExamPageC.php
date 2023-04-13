<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Exam;
use App\Models\ExamPage;
use Illuminate\Http\Request;

class ExamPageC extends Controller
{
  public function index($exam_id,$id = null)
  {
    $exam = Exam::find($exam_id);
    $authors = Author::all();
    $rows = ExamPage::where('exam_id',$exam_id)->get();
    if ($id != null) {
      $sd = ExamPage::find($id);
      if (!is_null($sd)) {
        $ft = 'edit';
        $url = url('admin/exam-pages/update/' . $id);
        $title = 'Update';
      } else {
        return redirect('admin/exam-pages');
      }
    } else {
      $ft = 'add';
      $url = url('admin/exam-pages/store');
      $title = 'Add New';
      $sd = '';
    }
    $page_title = "Exams";
    $page_route = "exam-pages";
    $data = compact('rows', 'sd', 'ft', 'url', 'title', 'page_title', 'page_route','authors','exam_id','exam');
    return view('admin.exam-pages')->with($data);
  }
  public function store(Request $request)
  {
    // printArray($request->all());
    // die;
    $request->validate(
      [
        'page_name' => 'required|unique:exam_pages,page_name',
      ]
    );
    $field = new ExamPage;
    if ($request->hasFile('thumbnail')) {
      $fileOriginalName = $request->file('thumbnail')->getClientOriginalName();
      $fileNameWithoutExtention = pathinfo($fileOriginalName, PATHINFO_FILENAME);
      $file_name_slug = slugify($fileNameWithoutExtention);
      $fileExtention = $request->file('thumbnail')->getClientOriginalExtension();
      $file_name = $file_name_slug . '_' . time() . '.' . $fileExtention;
      $move = $request->file('thumbnail')->move('uploads/destinations/', $file_name);
      if ($move) {
        $field->image_name = $file_name;
        $field->image_path = 'uploads/destinations/' . $file_name;
      } else {
        session()->flash('emsg', 'Some problem occured. File not uploaded.');
      }
    }
    $field->exam_id = $request['exam_id'];
    $field->page_name = $request['page_name'];
    $field->slug = slugify($request['slug']);
    $field->author_id = $request['author_id'];
    $field->meta_title = $request['meta_title'];
    $field->meta_keyword = $request['meta_keyword'];
    $field->meta_description = $request['meta_description'];
    $field->page_content = $request['page_content'];
    $field->seo_rating = $request['seo_rating'];
    $field->save();
    session()->flash('smsg', 'New record has been added successfully.');
    return redirect('admin/exam-pages/'.$request['exam_id']);
  }
  public function delete($id)
  {
    //echo $id;
    echo $result = ExamPage::find($id)->delete();
  }
  public function update($id, Request $request)
  {
    $request->validate(
      [
        'page_name' => 'required|unique:exam_pages,page_name,' . $id,
      ]
    );
    $field = ExamPage::find($id);
    if ($request->hasFile('thumbnail')) {
      $fileOriginalName = $request->file('thumbnail')->getClientOriginalName();
      $fileNameWithoutExtention = pathinfo($fileOriginalName, PATHINFO_FILENAME);
      $file_name_slug = slugify($fileNameWithoutExtention);
      $fileExtention = $request->file('thumbnail')->getClientOriginalExtension();
      $file_name = $file_name_slug . '_' . time() . '.' . $fileExtention;
      $move = $request->file('thumbnail')->move('uploads/destinations/', $file_name);
      if ($move) {
        $field->image_name = $file_name;
        $field->image_path = 'uploads/destinations/' . $file_name;
      } else {
        session()->flash('emsg', 'Some problem occured. File not uploaded.');
      }
    }
    $field->page_name = $request['page_name'];
    $field->slug = slugify($request['slug']);
    $field->author_id = $request['author_id'];
    $field->meta_title = $request['meta_title'];
    $field->meta_keyword = $request['meta_keyword'];
    $field->meta_description = $request['meta_description'];
    $field->page_content = $request['page_content'];
    $field->seo_rating = $request['seo_rating'];
    $field->save();
    session()->flash('smsg', 'Record has been updated successfully.');
    return redirect('admin/exam-pages/'.$request['exam_id']);
  }
}
