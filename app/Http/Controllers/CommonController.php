<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class CommonController extends Controller
{
  public function getSubStatusByStatus(Request $request)
  {
    //echo $id;
    $field = DB::table('lead_sub_statuses')->where('status_id', $request['status_id'])->get();
    $output = '<option value="">Select</option>';
    foreach ($field as $row) {
      $output .= '<option value="' . $row->id . '">' . $row->sub_status . '</option>';
    }
    return $output;
  }
  public function changeStatus(Request $request)
  {
    echo $result = DB::table($request->tbl)->where('id', $request->id)->update(['status' => $request->val]);
  }
  public function updateField(Request $request)
  {
    echo $result = DB::table($request->tbl)->whereIn('id', $request->ids)->update([$request->col => $request->val]);
  }
  public function updateFieldById(Request $request)
  {
    $result = DB::table($request->tbl)->where('id', $request->id)->update([$request->col => $request->val]);
    return response()->json(['success' => $result]);
  }

  public function updateBulkField(Request $request)
  {
    echo $result = DB::table($request->tbl)->whereIn('id', $request->ids)->update([$request->col => $request->val]);
  }

  public function slugifyString(Request $request)
  {
    $output = slugify($request->val);
    echo $output;
  }

  public function bulkDelete(Request $request)
  {
    $result = DB::table($request->tbl)->whereIn('id', $request->ids)->delete();
    return response()->json(['affected_rows' => $result]);
  }
}
