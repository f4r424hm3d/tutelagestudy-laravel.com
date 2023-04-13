<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Imports\CourseCategoryImport;
use App\Models\CourseCategory;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class CourseCategoryC extends Controller
{
  public function index($id = null)
  {
    $rows = CourseCategory::get();
    if ($id != null) {
      $sd = CourseCategory::find($id);
      if (!is_null($sd)) {
        $ft = 'edit';
        $url = url('admin/course-category/update/' . $id);
        $title = 'Update';
      } else {
        return redirect('admin/course-category');
      }
    } else {
      $ft = 'add';
      $url = url('admin/course-category/store');
      $title = 'Add New';
      $sd = '';
    }
    $page_title = "Course Category";
    $page_route = "course-category";
    $data = compact('rows', 'sd', 'ft', 'url', 'title', 'page_title', 'page_route');
    return view('admin.course-category')->with($data);
  }
  public function store(Request $request)
  {
    // printArray($request->all());
    // die;
    $request->validate(
      [
        'category_name' => 'required|unique:course_categories,category_name',
      ]
    );
    $field = new CourseCategory;
    $field->category_name = $request['category_name'];
    $field->category_slug = slugify($request['category_name']);
    $field->meta_title = $request['meta_title'];
    $field->meta_keyword = $request['meta_keyword'];
    $field->meta_description = $request['meta_description'];
    $field->page_content = $request['page_content'];
    $field->seo_rating = $request['seo_rating'];
    $field->save();
    session()->flash('smsg', 'New record has been added successfully.');
    return redirect('admin/course-category');
  }
  public function delete($id)
  {
    //echo $id;
    echo $result = CourseCategory::find($id)->delete();
  }
  public function update($id, Request $request)
  {
    $request->validate(
      [
        'category_name' => 'required|unique:course_categories,category_name,' . $id,
      ]
    );
    $field = CourseCategory::find($id);
    $field->category_name = $request['category_name'];
    $field->category_slug = slugify($request['category_name']);
    $field->meta_title = $request['meta_title'];
    $field->meta_keyword = $request['meta_keyword'];
    $field->meta_description = $request['meta_description'];
    $field->page_content = $request['page_content'];
    $field->seo_rating = $request['seo_rating'];
    $field->save();
    session()->flash('smsg', 'Record has been updated successfully.');
    return redirect('admin/course-category');
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
        $result = Excel::import(new CourseCategoryImport, $file);
        // session()->flash('smsg', 'Data has been imported succesfully.');
        return redirect('admin/course-category');
      } catch (\Exception $ex) {
        dd($ex);
      }
    }
  }
}
