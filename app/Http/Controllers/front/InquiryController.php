<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Destination;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Mail;

class InquiryController extends Controller
{
  public function __construct()
  {
    $this->mail_to = Config::get('constants.mail.to');
    $this->mail_cc = Config::get('constants.mail.cc');
  }
  public function universityIniquiry(Request $request)
  {
    $from_email = 'info@britannicaoverseas.com';
    $from = 'Tutelage Study';
    // printArray($request->all());
    // die;
    $request->validate(
      [
        'name' => 'required|regex:/^[a-zA-Z ]*$/',
        'email' => 'required|email',
        'c_code' => 'required|numeric',
        'mobile' => 'required|numeric',
        'nationality' => 'required',
        'destination' => 'required'
      ]
    );
    $field = new Student();
    $field->name = $request['name'];
    $field->email = $request['email'];
    $field->c_code = $request['c_code'];
    $field->mobile = $request['mobile'];
    $field->nationality = $request['nationality'];
    $field->destination = $request['destination'];
    $field->save();

    session()->flash('smsg', ' Your inquiry has been submitted. we will contact you soon..');

    $emaildata = [
      'name' => $request['name'],
      'email' => $request['email'],
      'c_code' => $request['c_code'],
      'mobile' => $request['mobile'],
      'nationality' => $request['nationality'],
      'destination' => $request['destination'],
    ];
    $dd = ['to' => $request['email'], 'to_name' => $request['name'], 'subject' => 'Inquiry'];

    Mail::send(
      'mails.inquiry-reply',
      $emaildata,
      function ($message) use ($dd) {
        $message->to($dd['to'], $dd['to_name']);
        $message->subject($dd['subject']);
        $message->priority(1);
      }
    );

    $emaildata2 = ['name' => $request['name'], 'email' => $request['email'], 'mobile' => $request['mobile'],];

    $dd2 = ['to' => TO_EMAIL, 'cc' => CC_EMAIL, 'to_name' => TO_NAME, 'cc_name' => CC_NAME, 'subject' => 'New Inquiry'];

    Mail::send(
      'mails.get-quote-mail-to-admin',
      $emaildata2,
      function ($message) use ($dd2) {
        $message->to($dd2['to'], $dd2['to_name']);
        $message->cc($dd2['cc'], $dd2['cc_name']);
        $message->subject($dd2['subject']);
        $message->priority(1);
      }
    );

    $api_url = "https://www.tutelagestudy.com/crm/Api/submitInquiryFromTutelageWeb";
    $form_data = $emaildata;
    //echo json_encode($form_data, true);
    $client = curl_init($api_url);
    curl_setopt($client, CURLOPT_POST, true);
    curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
    curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($client);
    curl_close($client);

    return redirect($request->page_url);
  }
  public function mbbs(Request $request)
  {
    $title = 'Neet Counselling';
    $page_url = url()->current();

    $countries = Country::orderBy('name','asc')->get();
    $phonecodes = Country::select('phonecode','name')->distinct()->orderBy('phonecode','asc')->get();
    $destinations = Destination::where(['status' => 1])->get();

    $data = compact('title','page_url','countries','phonecodes','destinations');
    return view('front.mbbs-abroad-counselling')->with($data);
  }
  public function submitMbbsInquiry(Request $request)
  {
    $from_email = 'info@britannicaoverseas.com';
    $from = 'Tutelage Study';
    // printArray($request->all());
    // die;
    $request->validate(
      [
        'name' => 'required|regex:/^[a-zA-Z ]*$/',
        'email' => 'required|email',
        'c_code' => 'required|numeric',
        'mobile' => 'required|numeric',
        'nationality' => 'required',
        'destination' => 'required'
      ]
    );
    $field = new Student();
    $field->name = $request['name'];
    $field->email = $request['email'];
    $field->c_code = $request['c_code'];
    $field->mobile = $request['mobile'];
    $field->nationality = $request['nationality'];
    $field->destination = $request['destination'];
    $field->page_url = $request['source_url'];
    $field->save();

    session()->flash('smsg', ' Your inquiry has been submitted. we will contact you soon..');

    $emaildata = [
      'name' => $request['name'],
      'email' => $request['email'],
      'c_code' => $request['c_code'],
      'mobile' => $request['mobile'],
      'nationality' => $request['nationality'],
      'destination' => $request['destination'],
      'page_url' => $request['source_url'],
    ];
    $dd = ['to' => $request['email'], 'to_name' => $request['name'], 'subject' => 'Inquiry'];

    Mail::send(
      'mails.inquiry-reply',
      $emaildata,
      function ($message) use ($dd) {
        $message->to($dd['to'], $dd['to_name']);
        $message->subject($dd['subject']);
        $message->priority(1);
      }
    );

    $emaildata2 = [
      'name' => $request['name'],
      'email' => $request['email'],
      'c_code' => $request['c_code'],
      'mobile' => $request['mobile'],
      'nationality' => $request['nationality'],
      'destination' => $request['destination'],
      'page_url' => $request['source_url'],
      'neet_qualified' => false,
      'question' => false,
    ];

    $dd2 = ['to' => TO_EMAIL, 'cc' => CC_EMAIL, 'to_name' => TO_NAME, 'cc_name' => CC_NAME, 'subject' => 'New Inquiry'];

    Mail::send(
      'mails.get-quote-mail-to-admin',
      $emaildata2,
      function ($message) use ($dd2) {
        $message->to($dd2['to'], $dd2['to_name']);
        $message->cc($dd2['cc'], $dd2['cc_name']);
        $message->subject($dd2['subject']);
        $message->priority(1);
      }
    );

    $api_url = "https://www.tutelagestudy.com/crm/Api/submitDestinationInquiryFromTutelageWeb";
    $form_data = $emaildata;
    //echo json_encode($form_data, true);
    $client = curl_init($api_url);
    curl_setopt($client, CURLOPT_POST, true);
    curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
    curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($client);
    curl_close($client);

    return redirect(url('thank-you/'));
  }
  public function neet(Request $request)
  {
    $title = 'MBBS Abroad Counselling';
    $page_url = url()->current();
    $data = compact('title','page_url');
    return view('front.neet-counselling')->with($data);
  }
  public function submitNeetInquiry(Request $request)
  {
    $from_email = 'info@britannicaoverseas.com';
    $from = 'Tutelage Study';
    // printArray($request->all());
    // die;
    $request->validate(
      [
        'name' => 'required|regex:/^[a-zA-Z ]*$/',
        'email' => 'required|email',
        'mobile' => 'required|numeric',
        'state' => 'required',
        'neet_qualified' => 'required',
        'question' => 'required'
      ]
    );
    $field = new Student();
    $field->name = $request['name'];
    $field->email = $request['email'];
    $field->mobile = $request['mobile'];
    $field->state = $request['state'];
    $field->neet_qualified = $request['neet_qualified'];
    $field->question = $request['question'];
    $field->page_url = $request['source_url'];
    $field->save();

    session()->flash('smsg', ' Your inquiry has been submitted. we will contact you soon..');

    $emaildata = [
      'name' => $request['name'],
      'email' => $request['email'],
      'state' => $request['state'],
      'mobile' => $request['mobile'],
      'neet_qualified' => $request['neet_qualified'],
      'question' => $request['question'],
      'page_url' => $request['source_url'],
    ];
    $dd = ['to' => $request['email'], 'to_name' => $request['name'], 'subject' => 'Inquiry'];

    Mail::send(
      'mails.neet-inquiry-reply',
      $emaildata,
      function ($message) use ($dd) {
        $message->to($dd['to'], $dd['to_name']);
        $message->subject($dd['subject']);
        $message->priority(1);
      }
    );

    $emaildata2 = [
      'name' => $request['name'],
      'email' => $request['email'],
      'state' => $request['state'],
      'mobile' => $request['mobile'],
      'neet_qualified' => $request['neet_qualified'],
      'question' => $request['question'],
      'page_url' => $request['source_url'],
      'nationality' => false,
      'destination' => false,
    ];

    $dd2 = ['to' => TO_EMAIL, 'cc' => CC_EMAIL, 'to_name' => TO_NAME, 'cc_name' => CC_NAME, 'subject' => 'New Inquiry'];

    Mail::send(
      'mails.get-quote-mail-to-admin',
      $emaildata2,
      function ($message) use ($dd2) {
        $message->to($dd2['to'], $dd2['to_name']);
        $message->cc($dd2['cc'], $dd2['cc_name']);
        $message->subject($dd2['subject']);
        $message->priority(1);
      }
    );

    $api_url = "https://www.tutelagestudy.com/crm/Api/submitNeetInquiryFromTutelageWeb";
    $form_data = $emaildata;
    //echo json_encode($form_data, true);
    $client = curl_init($api_url);
    curl_setopt($client, CURLOPT_POST, true);
    curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
    curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($client);
    curl_close($client);

    return redirect(url('thank-you/'));
  }

  public function thankyou(Request $request)
  {
    $title = 'Thank You';
    $page_url = url()->current();

    $countries = Country::orderBy('name','asc')->get();
    $phonecodes = Country::select('phonecode','name')->distinct()->orderBy('phonecode','asc')->get();
    $destinations = Destination::where(['status' => 1])->get();

    $data = compact('title','page_url','countries','phonecodes','destinations');
    return view('front.thank-you')->with($data);
  }
}
