<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\University;
use App\Models\UniversityOverview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Validator;

class UniversityOverviewC extends Controller
{
  protected $page_route;
  public function __construct()
  {
    $this->page_route = 'university-overview';
  }
  public function index(Request $request, $university_id, $id = null)
  {
    $university = University::find($university_id);
    $page_no = $_GET['page'] ?? 1;
    $rows = UniversityOverview::where('university_id', $university_id)->get();
    $parentContents = UniversityOverview::where('university_id', $university_id)->where('parent_id', null)->get();
    if ($id != null) {
      $sd = UniversityOverview::find($id);
      if (!is_null($sd)) {
        $ft = 'edit';
        $url = url('admin/' . $this->page_route . '/' . $university_id . '/update/' . $id . '/');
        $title = 'Update';
      } else {
        return redirect('admin/' . $this->page_route . '/' . $university_id);
      }
    } else {
      $ft = 'add';
      $url = url('admin/' . $this->page_route . '/store');
      $title = 'Add New';
      $sd = '';
    }
    $page_title = "University Overview";
    $page_route = $this->page_route;
    $lastPosition = $rows->count() + 1;
    $data = compact('rows', 'sd', 'ft', 'title', 'page_title', 'page_route', 'page_no', 'url', 'university_id', 'university', 'parentContents', 'lastPosition');
    return view('admin.university-overview')->with($data);
  }
  public function store(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'university_id' => 'required',
      'title' => 'required',
      'description' => 'required',
    ]);

    if ($validator->fails()) {
      return response()->json([
        'error' => $validator->errors(),
      ]);
    }

    $field = new UniversityOverview();
    $field->university_id = $request['university_id'];
    $field->title = $request['title'];
    $field->slug = slugify($request['title']);
    $field->description = $request['description'];
    $field->position = $request['position'];
    $field->parent_id = $request['parent_id'];
    if ($request->hasFile('thumbnail')) {
      $fileOriginalName = $request->file('thumbnail')->getClientOriginalName();
      $fileNameWithoutExtention = pathinfo($fileOriginalName, PATHINFO_FILENAME);
      $file_name_slug = slugify($fileNameWithoutExtention);
      $fileExtention = $request->file('thumbnail')->getClientOriginalExtension();
      $file_name = $file_name_slug . '_' . time() . '.' . $fileExtention;
      $move = $request->file('thumbnail')->move('uploads/university/', $file_name);
      if ($move) {
        $field->image_name = $file_name;
        $field->image_path = 'uploads/university/' . $file_name;
      } else {
        session()->flash('emsg', 'Some problem occured. File not uploaded.');
      }
    }
    $field->save();
    return response()->json(['success' => 'Records inserted succesfully.']);
  }
  public function update($university_id, $id, Request $request)
  {
    $request->validate(
      [
        'university_id' => 'required',
        'title' => 'required',
        'description' => 'required',
      ]
    );
    $field = UniversityOverview::find($id);
    $field->university_id = $request['university_id'];
    $field->title = $request['title'];
    $field->slug = slugify($request['title']);
    $field->description = $request['description'];
    $field->position = $request['position'];
    $field->parent_id = $request['parent_id'];
    if ($request->hasFile('thumbnail')) {
      $fileOriginalName = $request->file('thumbnail')->getClientOriginalName();
      $fileNameWithoutExtention = pathinfo($fileOriginalName, PATHINFO_FILENAME);
      $file_name_slug = slugify($fileNameWithoutExtention);
      $fileExtention = $request->file('thumbnail')->getClientOriginalExtension();
      $file_name = $file_name_slug . '_' . time() . '.' . $fileExtention;
      $move = $request->file('thumbnail')->move('uploads/university/', $file_name);
      if ($move) {
        if ($field->image_path != null && file_exists($field->image_path)) {
          unlink($field->image_path);
        }
        $field->image_name = $file_name;
        $field->image_path = 'uploads/university/' . $file_name;
      } else {
        session()->flash('emsg', 'Some problem occured. File not uploaded.');
      }
    }
    $field->save();
    session()->flash('smsg', 'Record has been updated successfully.');
    return redirect('admin/' . $this->page_route . '/' . $university_id);
  }
  public function getData(Request $request)
  {
    // return $request;
    // die;
    $rows = UniversityOverview::where('university_id', $request->university_id)->paginate(10)->withPath('/admin/' . $this->page_route . '/' . $request->university_id);
    $i = 1;
    $output = '<table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
    <thead>
      <tr>
        <th>Sr. No.</th>
        <th>Position</th>
        <th>Title</th>
        <th>Description</th>
        <th>Image</th>
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
            <td>';
      if ($row->image_path && file_exists($row->image_path)) {
        $output .= '<a href="' . asset($row->image_path) . '"><img src="' . asset($row->image_path) . '" height="20" width="20" /></a>';
      } else {
        $output .= 'N/A';
      }
      $output .= '</td>
            <td>' . $parentTitle . '</td>
            <td>
             ' . Blade::render('<x-delete-button :id="$id" />', ['id' => $row->id]) . '
              ' . Blade::render('<x-edit-button :url="$url" />', ['url' => url('admin/' . $this->page_route . '/' . $request->university_id . '/update/' . $row->id)]) . '
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
      $row = UniversityOverview::findOrFail($id);
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
    $rows = UniversityOverview::where('university_id', $request->university_id)->count();
    $lastPosition = $rows + 1;
    return $lastPosition;
  }
}
