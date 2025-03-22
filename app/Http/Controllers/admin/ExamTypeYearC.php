<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ExamType;
use App\Models\ExamTypeYear;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class ExamTypeYearC extends Controller
{
  protected $page_route;
  public function __construct()
  {
    $this->page_route = 'exam-type-years';
  }
  public function index(Request $request, $exam_type_id, $id = null)
  {
    $examType = ExamType::find($exam_type_id);
    $page_no = $_GET['page'] ?? 1;
    $rows = ExamTypeYear::where('exam_type_id', $exam_type_id)->get();
    if ($id != null) {
      $sd = ExamTypeYear::find($id);
      if (!is_null($sd)) {
        $ft = 'edit';
        $url = url('admin/' . $this->page_route . '/' . $exam_type_id . '/update/' . $id . '/');
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
    $page_title = "Exam Type Years";
    $page_route = $this->page_route;
    $data = compact('rows', 'sd', 'ft', 'title', 'page_title', 'page_route', 'page_no', 'url', 'exam_type_id', 'examType');
    return view('admin.exam-type-years')->with($data);
  }
  public function store(Request $request)
  {
    // Apply slugify before validation
    $request->merge([
      'slug' => Str::slug($request->input('slug'))
    ]);

    $validator = Validator::make($request->all(), [
      'exam_type_id' => 'required',
      'year' => [
        'required',
        Rule::unique('exam_type_years')->where(function ($query) use ($request) {
          return $query->where('exam_type_id', $request->exam_type_id);
        }),
      ],

      'slug' => [
        'required',
        Rule::unique('exam_type_years')->where(function ($query) use ($request) {
          return $query->where('exam_type_id', $request->exam_type_id);
        }),
      ],
      'title' => 'required',
    ]);

    if ($validator->fails()) {
      return response()->json([
        'error' => $validator->errors(),
      ]);
    }

    $field = new ExamTypeYear();
    $field->exam_type_id = $request['exam_type_id'];
    $field->year = $request['year'];
    $field->slug = slugify($request['slug']);
    $field->title = $request['title'];
    $field->meta_title = $request['meta_title'];
    $field->meta_keyword = $request['meta_keyword'];
    $field->meta_description = $request['meta_description'];
    $field->save();
    return response()->json(['success' => 'Records inserted succesfully.']);
  }
  public function update($exam_type_id, $id, Request $request)
  {
    // Apply slugify before validation
    $request->merge([
      'slug' => Str::slug($request->input('slug'))
    ]);
    $request->validate(
      [
        'exam_type_id' => 'required',
        'year' => [
          'required',
          Rule::unique('exam_type_years')->ignore($id)->where(function ($query) use ($request) {
            return $query->where('exam_type_id', $request->exam_type_id);
          }),
        ],

        'slug' => [
          'required',
          Rule::unique('exam_type_years')->ignore($id)->where(function ($query) use ($request) {
            return $query->where('exam_type_id', $request->exam_type_id);
          }),
        ],
        'title' => 'required',
      ]
    );
    $field = ExamTypeYear::find($id);
    $field->exam_type_id = $request['exam_type_id'];
    $field->year = $request['year'];
    $field->slug = slugify($request['slug']);
    $field->title = $request['title'];
    $field->meta_title = $request['meta_title'];
    $field->meta_keyword = $request['meta_keyword'];
    $field->meta_description = $request['meta_description'];
    $field->save();
    session()->flash('smsg', 'Record has been updated successfully.');
    return redirect('admin/' . $this->page_route . '/' . $exam_type_id);
  }
  public function getData(Request $request)
  {
    // return $request;
    // die;
    $rows = ExamTypeYear::where('exam_type_id', $request->exam_type_id)->paginate(10)->withPath('/admin/' . $this->page_route . '/' . $request->exam_type_id);
    $i = 1;
    $output = '<table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
    <thead>
      <tr>
        <th>Sr. No.</th>
        <th>Year</th>
        <th>Title</th>
        <th>Contents</th>
        <th>Faqs</th>
        <th>Papers</th>
        <th>SEO</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>';
    foreach ($rows as $row) {
      $output .= '<tr id="row'
        . $row->id . '">
            <td>' . $i . '</td>
            <td><a href="' . url($row->examType->slug . '/' . $row->slug) . '" target="_blank">' . $row->year . '</a></td>
            <td>' . $row->title . '</td>
            <td>
        ' . Blade::render('<x-custom-button :url="$url" label="Contents" :count="$count" />', ['url' => url('admin/exam-type-year-contents/' . $row->id), 'count' => $row->contents->count()]) . '
      </td>
      <td>
      ' . Blade::render('<x-custom-button :url="$url" label="Faqs" :count="$count" />', ['url' => url('admin/exam-type-year-faqs/' . $row->id), 'count' => $row->faqs->count()]) . '
      </td>
      <td>
      ' . Blade::render('<x-custom-button :url="$url" label="Papers" :count="$count" />', ['url' => url('admin/exam-type-year-papers/' . $row->id), 'count' => $row->papers->count()]) . '
      </td>
        <td>
          ' . Blade::render('<x-seo-view-model :row="$row" />', ['row' => $row]) . '
      </td>
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
      $row = ExamTypeYear::findOrFail($id);
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
