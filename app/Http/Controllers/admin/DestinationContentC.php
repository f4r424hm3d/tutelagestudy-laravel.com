<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\DestinationPageContent;
use App\Models\DestinationPageTabs;
use App\Models\DestinationTabs;
use Illuminate\Http\Request;

class DestinationContentC extends Controller
{
  public function index($page_id, $tab_id = null, $id = null)
  {
    $tabs = DestinationPageTabs::all();
    $rows = DestinationPageContent::where('page_id', $page_id);
    if ($tab_id != null) {
      $rows = $rows->where('tab_id', $tab_id);
    }
    $rows = $rows->orderBy('priority', 'ASC')->get();
    $parentContents = DestinationPageContent::where('page_id', $page_id)->where('parent_id', null)->get();
    $lastPosition = $rows->count() + 1;
    if ($id != null) {
      $sd = DestinationPageContent::find($id);
      if (!is_null($sd)) {
        $ft = 'edit';
        $url = url('admin/destination-content/update/' . $id);
        $title = 'Update';
      } else {
        return redirect('admin/destination-content');
      }
    } else {
      $ft = 'add';
      $url = url('admin/destination-content/store');
      $title = 'Add New';
      $sd = '';
    }
    $page_title = "Destination Page Tabs";
    $page_route = "destination-content";
    $lastPosition = $rows->count() + 1;
    $data = compact('rows', 'sd', 'ft', 'url', 'title', 'page_title', 'page_route', 'tabs', 'lastPosition', 'parentContents', 'lastPosition');
    return view('admin.destination-content')->with($data);
  }
  public function store(Request $request)
  {
    // printArray($request->all());
    // die;
    $request->validate(
      [
        'page_id' => 'required',
        'tab_id' => 'required',
        'title' => 'required',
        'tab_content' => 'required',
      ]
    );
    $field = new DestinationPageContent;
    $field->page_id = $request['page_id'];
    $field->tab_id = $request['tab_id'];
    $field->title = $request['title'];
    $field->tab_content = $request['tab_content'];
    $field->priority = $request['priority'];
    $field->parent_id = $request['parent_id'];
    $field->save();
    session()->flash('smsg', 'New record has been added successfully.');
    return redirect('admin/destination-content/' . $request['page_id'] . '/' . $request['tab_id']);
  }
  public function delete($id)
  {
    //echo $id;
    echo $result = DestinationPageContent::find($id)->delete();
  }
  public function update($id, Request $request)
  {
    $request->validate(
      [
        'page_id' => 'required',
        'tab_id' => 'required',
        'title' => 'required',
        'tab_content' => 'required',
      ]
    );
    $field = DestinationPageContent::find($id);
    $field->page_id = $request['page_id'];
    $field->tab_id = $request['tab_id'];
    $field->title = $request['title'];
    $field->tab_content = $request['tab_content'];
    $field->priority = $request['priority'];
    $field->parent_id = $request['parent_id'];
    $field->save();
    session()->flash('smsg', 'Record has been updated successfully.');
    return redirect('admin/destination-content/' . $request['page_id'] . '/' . $request['tab_id']);
  }
}
