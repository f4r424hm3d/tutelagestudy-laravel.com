<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use App\Models\AppliedProgram;
use App\Models\Country;
use App\Models\Destination;
use App\Models\Gender;
use App\Models\Level;
use App\Models\MaritalStatus;
use App\Models\SchoolAttended;
use App\Models\ShortlistedProgram;
use App\Models\Student;
use App\Models\StudentDocument;
use Illuminate\Http\Request;

class StudentFc extends Controller
{
  public function profile()
  {
    $id = session()->get('student_id');
    $student = Student::find($id);

    $phonecodes = Country::orderBy('phonecode')->groupBy('phonecode')->where('phonecode', '!=', '0')->get();
    $countries = Country::orderBy('name')->get();
    $destinations = Destination::all();
    // $genders = Gender::all();
    // $marital_statuses = MaritalStatus::all();
    // $levels = Level::all();
    // $schools = SchoolAttended::where('student_id', $id)->get();
    // $stdDocs = StudentDocument::where('student_id', $id)->get();

    $piurl = url('student/personal-information');
    $eduurl = url('student/education-summary');
    $schoolurl = url('student/add-school');
    $editschoolurl = url('student/update-school');

    $data = compact('student', 'countries', 'phonecodes', 'destinations');
    return view('front.student.profile')->with($data);
  }
  public function editProfile()
  {
    $id = session()->get('student_id');
    $student = Student::find($id);
    $data = compact('student');
    return view('front.student.edit-profile')->with($data);
  }
  public function updateProfile(Request $request)
  {
    // printArray($request->all());
    // die;
    $request->validate(
      [
        'gender' => 'required|in:Male,Female,Other',
        'dob' => 'required|date',
        'destination' => 'required',
        'nationality' => 'required',
        'city' => 'regex:/^[a-zA-Z ]*$/',
        'state' => 'regex:/^[a-zA-Z ]*$/',
        // 'country' => 'regex:/^[a-zA-Z ]*$/',
      ]
    );
    $field = Student::find(session('student_id'));
    $field->gender = $request['gender'];
    $field->dob = $request['dob'];
    $field->nationality = $request['nationality'];
    $field->destination = $request['destination'];
    $field->city = $request['city'];
    $field->state = $request['state'];
    $field->save();
    session()->flash('smsg', 'Record has been updated successfully.');
    return redirect('student/profile');
  }
  public function viewChangePassword()
  {
    $id = session()->get('student_id');
    $student = Student::find($id);
    $data = compact('student');
    return view('front.student.change-password')->with($data);
  }
  public function changePassword(Request $request)
  {
    $id = session()->get('student_id');
    $student = Student::find($id);

    $request->validate(
      [
        'old_password' => 'required|in:' . $student->password,
        'new_password' => 'required|min:8',
        'confirm_new_password' => 'required|min:8|same:new_password',
      ]
    );
    $field = Student::find($request['id']);
    $field->password = $request['new_password'];
    $field->save();
    session()->flash('smsg', 'Password has been changed.');
    return redirect('student/change-password');
  }
  public function submitPersonalInfo(Request $request)
  {
    $id = session()->get('student_id');
    $request->validate(
      [
        'name' => 'required|regex:/^[a-zA-Z ]*$/',
        'email' => 'required',
        'c_code' => 'required|numeric',
        'mobile' => 'required|numeric',
        'father' => 'required',
        'mother' => 'required',
        'dob' => 'required|date',
        'first_language' => 'required',
        'nationality' => 'required',
        'passport_number' => 'required',
        'passport_expiry' => 'required|date',
        'marital_status' => 'required',
        'gender' => 'required',
        'home_address' => 'required',
        'city' => 'regex:/^[a-zA-Z ]*$/',
        'state' => 'regex:/^[a-zA-Z ]*$/',
        'country' => 'regex:/^[a-zA-Z ]*$/',
        'zip_code' => 'required',
        'home_contact_number' => 'required|numeric',
      ]
    );
    $field = Student::find($id);
    $field->name = $request['name'];
    $field->email = $request['email'];
    $field->c_code = $request['c_code'];
    $field->mobile = $request['mobile'];
    $field->father = $request['father'];
    $field->mother = $request['mother'];
    $field->dob = $request['dob'];
    $field->first_language = $request['first_language'];
    $field->nationality = $request['nationality'];
    $field->passport_number = $request['passport_number'];
    $field->passport_expiry = $request['passport_expiry'];
    $field->marital_status = $request['marital_status'];
    $field->gender = $request['gender'];
    $field->home_address = $request['home_address'];
    $field->city = $request['city'];
    $field->state = $request['state'];
    $field->country = $request['country'];
    $field->zip_code = $request['zip_code'];
    $field->home_contact_number = $request['home_contact_number'];
    $field->save();
    session()->flash('smsg', 'Record has been updated successfully.');
    return redirect('student/profile');
  }
}
