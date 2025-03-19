<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\ExamPaper;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ExamPaperFc extends Controller
{
  public function index(Request $request)
  {
    $years = ExamPaper::select('exam_year')->groupBy('exam_year')->get();

    $examPapers = collect(); // Empty collection by default

    // Check if any filter is applied
    if ($request->has('exam_year') || $request->has('exam_type') || $request->has('paper')) {
      $query = ExamPaper::query();

      if (!empty($request->exam_year)) {
        $query->where('exam_year', $request->exam_year);
      }

      if (!empty($request->exam_type)) {
        $query->where('exam_type_id', $request->exam_type);
      }

      if (!empty($request->paper)) {
        $query->where('paper_name', $request->paper);
      }

      // Fetch only if form is submitted
      $examPapers = $query->get();
    }

    $data = compact('years', 'examPapers');
    return view('front.downloads')->with($data);
  }

  public function getExamTypes(Request $request)
  {
    $year = $request->year;
    $examTypes = ExamPaper::where('exam_year', $year)
      ->select('exam_type_id')
      ->groupBy('exam_type_id')
      ->with('exam') // Eager loading to avoid N+1 queries
      ->get();

    return response()->json($examTypes->map(function ($row) {
      return [
        'id' => $row->exam->id,
        'name' => $row->exam->exam_type
      ];
    }));
  }

  public function getPapers(Request $request)
  {
    $examType = $request->exam_type;
    $papers = ExamPaper::where('exam_type_id', $examType)
      ->select('paper_name')
      ->groupBy('paper_name')
      ->get();

    return response()->json($papers->map(function ($row) {
      return [
        'id' => $row->paper_name,
        'name' => $row->paper_name
      ];
    }));
  }

  public function submitForm(Request $request)
  {
    // printArray($request->all());
    // die;
    $validator = Validator::make($request->all(), [
      'name' => 'required|regex:/^[a-zA-Z ]*$/',
      'email' => 'required|email:rfc,dns',
      'mobile' => 'required|numeric|digits_between:9,12',
    ]);

    if ($validator->fails()) {
      return response()->json([
        'error' => $validator->errors(),
      ]);
    }

    $field = new Student();
    $field->name = $request['name'];
    $field->email = $request['email'];
    $field->mobile = $request['mobile'];
    $field->source = $request->source;
    $field->page_url = $request['source_url'];
    $field->save();

    session()->flash('smsg', 'Your inquiry has been submitted. we will contact you soon.');
    $file_path = $request['file_path'];
    $emaildata = [
      'name' => $request['name'],
      'email' => $request['email'],
      'mobile' => $request['mobile'],
      'file_path' => $file_path,
      'source' => $request['source'],
      'source_url' => $request['source_url'],
    ];

    $api_url = "https://www.crm.tutelagestudy.com/Api/submitDownloadExamPaperInquiry";
    $form_data = $emaildata;
    //echo json_encode($form_data, true);
    $client = curl_init($api_url);
    curl_setopt($client, CURLOPT_POST, true);
    curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
    curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($client);
    curl_close($client);

    $dd = ['to' => $request['user_email'], 'to_name' => $request['user_name'], 'subject' => 'Brochure Inquiry', 'file_path' => $file_path,];

    Mail::send(
      'mails.download-exam-paper',
      $emaildata,
      function ($message) use ($dd) {
        $message->to($dd['to'], $dd['to_name']);
        $message->subject($dd['subject']);
        $message->attach($dd['brochure_path']);
        $message->priority(1);
      }
    );

    $emaildata2 = [
      'name' => $request['user_name'],
      'email' => $request['user_email'],
      'mobile' => $request['user_mobile'],
      'page_url' => $request['source_url'],
      'intrested_university' => null,
      'destination' => null,
    ];

    $dd2 = ['to' => TO_EMAIL, 'cc' => CC_EMAIL, 'to_name' => TO_NAME, 'cc_name' => CC_NAME, 'subject' => 'Brochure Inquiry', 'bcc' => BCC_EMAIL, 'bcc_name' => BCC_NAME];

    Mail::send(
      'mails.get-brochure-mail-to-admin',
      $emaildata2,
      function ($message) use ($dd2) {
        $message->to($dd2['to'], $dd2['to_name']);
        $message->cc($dd2['cc'], $dd2['cc_name']);
        $message->bcc($dd2['bcc'], $dd2['bcc_name']);
        $message->subject($dd2['subject']);
        $message->priority(1);
      }
    );
    session()->put('studentLoggedIn', true);
    return response()->json(['success' => 'Records inserted succesfully.']);
  }
}
