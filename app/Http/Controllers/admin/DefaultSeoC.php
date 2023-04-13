<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\DefaultSeo;
use Illuminate\Http\Request;

class DefaultSeoC extends Controller
{
  public function index($id = null)
  {
    $rows = DefaultSeo::get();
    if ($id != null) {
      $sd = DefaultSeo::find($id);
      if (!is_null($sd)) {
        $ft = 'edit';
        $url = url('admin/default-seos/update/' . $id);
        $title = 'Update';
      } else {
        return redirect('admin/default-seos');
      }
    } else {
      $ft = 'add';
      $url = url('admin/default-seos/store');
      $title = 'Add New';
      $sd = '';
    }
    $page_title = "Default SEO";
    $page_route = "default-seos";
    $data = compact('rows', 'sd', 'ft', 'url', 'title', 'page_title', 'page_route');
    return view('admin.default-seos')->with($data);
  }
  public function store(Request $request)
  {
    // printArray($request->all());
    // die;
    $request->validate(
      [
        'url' => 'required|unique:default_seos,url',
      ]
    );
    $field = new DefaultSeo;
    $field->url = $request['url'];
    $field->title = $request['title'];
    $field->keyword = $request['keyword'];
    $field->description = $request['description'];
    $field->page_content = $request['page_content'];
    $field->save();
    session()->flash('smsg', 'New record has been added successfully.');
    return redirect('admin/default-seos');
  }
  public function delete($id)
  {
    //echo $id;
    echo $result = DefaultSeo::find($id)->delete();
  }
  public function update($id, Request $request)
  {
    $request->validate(
      [
        'url' => 'required|unique:default_seos,url,'.$id,
      ]
    );
    $field = DefaultSeo::find($id);
    $field->url = $request['url'];
    $field->title = $request['title'];
    $field->keyword = $request['keyword'];
    $field->description = $request['description'];
    $field->page_content = $request['page_content'];
    $field->save();
    session()->flash('smsg', 'Record has been updated successfully.');
    return redirect('admin/default-seos');
  }
}
