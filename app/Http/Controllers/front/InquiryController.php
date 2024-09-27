<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Destination;
use App\Models\Student;
use App\Models\University;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class InquiryController extends Controller
{
  public function universityIniquiry(Request $request)
  {
    $from_email = 'info@britannicaoverseas.com';
    $from = 'Tutelage Study';
    // printArray($request->all());
    // die;
    $request->validate(
      [
        'g-recaptcha-response' => 'required',
        'name' => 'required|regex:/^[a-zA-Z ]*$/',
        'email' => 'required|email',
        'c_code' => 'required|numeric|digits_between:1,5',
        'mobile' => 'required|numeric|digits_between:9,12',
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

    $api_url = "https://www.crm.tutelagestudy.com/Api/submitInquiryFromTutelageWeb";
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

    $countries = Country::orderBy('name', 'asc')->get();
    $phonecodes = Country::select('phonecode', 'name')->distinct()->orderBy('phonecode', 'asc')->get();
    $destinations = Destination::where(['status' => 1])->get();

    $data = compact('title', 'page_url', 'countries', 'phonecodes', 'destinations');
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
        'captcha' => 'required|captcha',
        'name' => 'required|regex:/^[a-zA-Z ]*$/',
        'email' => 'required|email:rfc,dns',
        'c_code' => 'required|numeric|digits_between:1,5',
        'mobile' => 'required|numeric|digits_between:9,12',
        'nationality' => 'required',
        'destination' => 'required',
        'terms' => 'required',
        'contact_me' => 'required',
      ],
      [
        'captcha.captcha' => 'Please enter the correct CAPTCHA value.',
      ]
    );
    $field = new Student();
    $field->name = $request['name'];
    $field->email = $request['email'];
    $field->c_code = $request['c_code'];
    $field->mobile = $request['mobile'];
    $field->nationality = $request['nationality'];
    $field->destination = $request['destination'];
    $field->source = $request['source'];
    $field->page_url = $request['source_path'];
    $field->save();

    session()->flash('smsg', ' Your inquiry has been submitted. we will contact you soon..');

    $emaildata = [
      'name' => $request['name'],
      'email' => $request['email'],
      'c_code' => $request['c_code'],
      'mobile' => $request['mobile'],
      'nationality' => $request['nationality'],
      'destination' => $request['destination'],
      'source' => $request['source'],
      'source_path' => $request['source_path'],
    ];

    $api_url = "https://www.crm.tutelagestudy.com/Api/submitDestinationInquiryFromTutelageWeb";
    $form_data = $emaildata;
    //echo json_encode($form_data, true);
    $client = curl_init($api_url);
    curl_setopt($client, CURLOPT_POST, true);
    curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
    curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($client);
    curl_close($client);

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
      'source' => $request['source'],
      'source_path' => $request['source_path'],
      'neet_qualified' => false,
      'question' => false,
    ];

    $dd2 = ['to' => TO_EMAIL, 'cc' => CC_EMAIL, 'to_name' => TO_NAME, 'cc_name' => CC_NAME, 'subject' => 'New Inquiry', 'bcc' => BCC_EMAIL, 'bcc_name' => BCC_NAME];

    Mail::send(
      'mails.get-quote-mail-to-admin',
      $emaildata2,
      function ($message) use ($dd2) {
        $message->to($dd2['to'], $dd2['to_name']);
        $message->cc($dd2['cc'], $dd2['cc_name']);
        $message->bcc($dd2['bcc'], $dd2['bcc_name']);
        $message->subject($dd2['subject']);
        $message->priority(1);
      }
    );

    return redirect(url('thank-you/'));
  }
  public function neet(Request $request)
  {
    $title = 'MBBS Abroad Counselling';
    $page_url = url()->current();
    $data = compact('title', 'page_url');
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
        'captcha' => 'required|captcha',
        'name' => 'required|regex:/^[a-zA-Z ]*$/',
        'email' => 'required|email:rfc,dns',
        'mobile' => 'required|numeric|digits_between:9,12',
        'state' => 'required',
        'neet_qualified' => 'required',
        'question' => 'required',
        'terms' => 'required',
        'contact_me' => 'required',
      ],
      [
        'captcha.captcha' => 'Please enter the correct CAPTCHA value.',
      ]
    );
    $field = new Student();
    $field->name = $request['name'];
    $field->email = $request['email'];
    $field->mobile = $request['mobile'];
    $field->state = $request['state'];
    $field->neet_qualified = $request['neet_qualified'];
    $field->question = $request['question'];
    $field->source = $request['source'];
    $field->page_url = $request['source_path'];
    $field->save();

    session()->flash('smsg', ' Your inquiry has been submitted. we will contact you soon..');

    $emaildata = [
      'name' => $request['name'],
      'email' => $request['email'],
      'state' => $request['state'],
      'mobile' => $request['mobile'],
      'neet_qualified' => $request['neet_qualified'],
      'question' => $request['question'],
      'source' => $request['source'],
      'source_path' => $request['source_path'],
    ];

    $api_url = "https://www.crm.tutelagestudy.com/Api/submitNeetInquiryFromTutelageWeb";
    $form_data = $emaildata;
    //echo json_encode($form_data, true);
    $client = curl_init($api_url);
    curl_setopt($client, CURLOPT_POST, true);
    curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
    curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($client);
    curl_close($client);

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
      'source' => $request['source'],
      'source_path' => $request['source_path'],
      'nationality' => false,
      'destination' => false,
    ];

    $dd2 = ['to' => TO_EMAIL, 'cc' => CC_EMAIL, 'to_name' => TO_NAME, 'cc_name' => CC_NAME, 'subject' => 'New Inquiry', 'bcc' => BCC_EMAIL, 'bcc_name' => BCC_NAME];

    Mail::send(
      'mails.get-quote-mail-to-admin',
      $emaildata2,
      function ($message) use ($dd2) {
        $message->to($dd2['to'], $dd2['to_name']);
        $message->cc($dd2['cc'], $dd2['cc_name']);
        $message->bcc($dd2['bcc'], $dd2['bcc_name']);
        $message->subject($dd2['subject']);
        $message->priority(1);
      }
    );

    return redirect(url('thank-you/'));
  }
  public function submitBrochureInquiry(Request $request)
  {
    // printArray($request->all());
    // die;
    $university = University::find($request->university);
    $request->validate(
      [
        'name' => 'required|regex:/^[a-zA-Z ]*$/',
        'email' => 'required|email:rfc,dns',
        'c_code' => 'required|numeric|digits_between:1,5',
        'mobile' => 'required|numeric|digits_between:9,12',
        'university' => 'required|numeric',
      ]
    );
    $field = new Student();
    $field->name = $request['name'];
    $field->email = $request['email'];
    $field->c_code = $request['c_code'];
    $field->mobile = $request['mobile'];
    $field->destination = $request['destination'];
    $field->page_url = $request['source_url'];
    $field->save();

    session()->flash('smsg', ' Your inquiry has been submitted. we will contact you soon..');

    $emaildata = [
      'name' => $request['name'],
      'email' => $request['email'],
      'c_code' => $request['c_code'],
      'mobile' => $request['mobile'],
      'destination' => $request['destination'],
      'intrested_university' => $university->university_name ?? $university->name,
      'brochure_path' => $university->brochure_path,
      'page_url' => $request['source_url'],
    ];

    $api_url = "https://www.crm.tutelagestudy.com/Api/submitBrochureInquiryFromTutelageWeb";
    $form_data = $emaildata;
    //echo json_encode($form_data, true);
    $client = curl_init($api_url);
    curl_setopt($client, CURLOPT_POST, true);
    curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
    curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($client);
    curl_close($client);

    $dd = ['to' => $request['email'], 'to_name' => $request['name'], 'subject' => 'Brochure Inquiry', 'brochure_path' => $university->brochure_path,];

    Mail::send(
      'mails.brochure-inquiry-reply',
      $emaildata,
      function ($message) use ($dd) {
        $message->to($dd['to'], $dd['to_name']);
        $message->subject($dd['subject']);
        $message->attach($dd['brochure_path']);
        $message->priority(1);
      }
    );

    $emaildata2 = [
      'name' => $request['name'],
      'email' => $request['email'],
      'c_code' => $request['c_code'],
      'mobile' => $request['mobile'],
      'destination' => $request['destination'],
      'intrested_university' => $university->university_name ?? $university->name,
      'page_url' => $request['source_url'],
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

    return redirect(url('thank-you/'));
  }

  public function submitDownloadBrochureInquiry__AJAX(Request $request)
  {
    // printArray($request->all());
    // die;
    $brochure_path = "tb/MBBS-brochure-table-new-printing.pdf";

    $validator = Validator::make(
      $request->all(),
      [
        'name' => 'required|regex:/^[a-zA-Z ]*$/',
        'email' => 'required|email:rfc,dns',
        'c_code' => 'required|numeric|digits_between:1,5',
        'mobile' => 'required|numeric|digits_between:9,12',
      ]
    );

    if ($validator->fails()) {
      return response()->json([
        'error' => $validator->errors(),
      ]);
    }
    // if ($validator->fails()) {
    //   // Debugging: Log validation errors
    //   Log::debug('Validation Errors: ' . json_encode($validator->errors()->all()));

    //   return response()->json([
    //     'error' => $validator->errors(),
    //   ]);
    // }

    $field = new Student();
    $field->name = $request['name'];
    $field->email = $request['email'];
    $field->c_code = $request['c_code'];
    $field->mobile = $request['mobile'];
    $field->page_url = $request['source_url'];
    $field->save();

    session()->flash('smsg', 'Your inquiry has been submitted. we will contact you soon.');

    $emaildata = [
      'name' => $request['name'],
      'email' => $request['email'],
      'c_code' => $request['c_code'],
      'mobile' => $request['mobile'],
      'brochure_path' => $brochure_path,
      'page_url' => $request['source_url'],
    ];

    $api_url = "https://www.crm.tutelagestudy.com/Api/submitBrochureInquiryFromTutelageWeb2";
    $form_data = $emaildata;
    //echo json_encode($form_data, true);
    $client = curl_init($api_url);
    curl_setopt($client, CURLOPT_POST, true);
    curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
    curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($client);
    curl_close($client);

    $dd = ['to' => $request['email'], 'to_name' => $request['name'], 'subject' => 'Brochure Inquiry', 'brochure_path' => $brochure_path,];

    Mail::send(
      'mails.brochure-inquiry-reply2',
      $emaildata,
      function ($message) use ($dd) {
        $message->to($dd['to'], $dd['to_name']);
        $message->subject($dd['subject']);
        $message->attach($dd['brochure_path']);
        $message->priority(1);
      }
    );

    $emaildata2 = [
      'name' => $request['name'],
      'email' => $request['email'],
      'c_code' => $request['c_code'],
      'mobile' => $request['mobile'],
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
    return response()->json(['success' => 'Record hase been added succesfully.']);
    //return redirect(url('thank-you/'));
  }
  public function submitDownloadBrochureInquiry(Request $request)
  {
    // printArray($request->all());
    // die;
    $brochure_path = "tb/MBBS-brochure-table-new-printing.pdf";
    $request->validate(
      [
        'text_captcha' => 'required|captcha',
        'user_name' => 'required|regex:/^[a-zA-Z ]*$/',
        'user_email' => 'required|email:rfc,dns',
        'user_country_code' => 'required|numeric|digits_between:1,5',
        'user_mobile' => 'required|numeric|digits_between:9,12',
      ],
      [
        'text_captcha.required' => 'Captcha field is required.',
        'text_captcha.captcha' => 'Please enter the correct CAPTCHA value.'
      ]
    );
    $field = new Student();
    $field->name = $request['user_name'];
    $field->email = $request['user_email'];
    $field->c_code = $request['user_country_code'];
    $field->mobile = $request['user_mobile'];
    $field->page_url = $request['source_url'];
    $field->save();

    session()->flash('smsg', 'Your inquiry has been submitted. we will contact you soon.');

    $emaildata = [
      'name' => $request['user_name'],
      'email' => $request['user_email'],
      'c_code' => $request['user_country_code'],
      'mobile' => $request['user_mobile'],
      'brochure_path' => $brochure_path,
      'page_url' => $request['source_url'],
    ];

    $api_url = "https://www.crm.tutelagestudy.com/Api/submitBrochureInquiryFromTutelageWeb2";
    $form_data = $emaildata;
    //echo json_encode($form_data, true);
    $client = curl_init($api_url);
    curl_setopt($client, CURLOPT_POST, true);
    curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
    curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($client);
    curl_close($client);

    $dd = ['to' => $request['user_email'], 'to_name' => $request['user_name'], 'subject' => 'Brochure Inquiry', 'brochure_path' => $brochure_path,];

    Mail::send(
      'mails.brochure-inquiry-reply2',
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
      'c_code' => $request['user_ccountry_code'],
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

    return redirect(url('thank-you/'));
  }

  public function thankyou(Request $request)
  {
    $title = 'Thank You';
    $page_url = url()->current();

    $countries = Country::orderBy('name', 'asc')->get();
    $phonecodes = Country::select('phonecode', 'name')->distinct()->orderBy('phonecode', 'asc')->get();
    $destinations = Destination::where(['status' => 1])->get();

    $data = compact('title', 'page_url', 'countries', 'phonecodes', 'destinations');
    return view('front.thank-you')->with($data);
  }


  public function getCountryCode(Request $request)
  {
    $phonecodesSF = Country::select('phonecode', 'name')->distinct()->orderBy('phonecode', 'asc')->get();

    $output = '';
    foreach ($phonecodesSF as $row) {
      $sel = $row->phonecode == 91 ? 'Selected' : '';
      $output .= '<option value="' . $row->phonecode . '" ' . $sel . '> +
                        ' . $row->phonecode . '
                        (' . $row->name . ')
                      </option>';
    }
    return $output;
  }
  public function getCountry(Request $request)
  {
    $countriesSF = Country::orderBy('name', 'asc')->get();
    $output = '';
    foreach ($countriesSF as $row) {
      $sel = $row->name == 'INDIA' ? 'Selected' : '';
      $output .= '<option value="' . $row->name . '" ' . $sel . '>' . $row->name . '</option>';
    }
    return $output;
  }
}
