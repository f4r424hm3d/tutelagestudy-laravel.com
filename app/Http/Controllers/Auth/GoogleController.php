<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class GoogleController extends Controller
{
  // Redirect to Google
  public function redirectToGoogle(Request $request)
  {
    // Save the redirect parameters into session
    if ($request->has('return_to')) {
      session(['google_return_to' => $request->return_to]);
    }
    if ($request->has('paper_id')) {
      session(['google_paper_id' => $request->paper_id]);
    }

    return Socialite::driver('google')->redirect();
  }

  // Handle Google callback
  public function handleGoogleCallback()
  {
    try {
      $googleUser = Socialite::driver('google')->user();
      // $raw = $googleUser->user;

      // $phone = $raw['phoneNumbers'][0]['value'] ?? null;

      // Check if user exists
      $user = Student::where('email', $googleUser->getEmail())->first();

      if (!$user) {
        // Create new user
        $user = Student::create([
          'name' => $googleUser->getName(),
          'email' => $googleUser->getEmail(),
          'google_id' => $googleUser->getId(),
          'avatar' => $googleUser->getAvatar(),
          'password' => uniqid(), // Dummy password
        ]);

        $form_data = [
          'name' => $googleUser->getName(),
          'email' => $googleUser->getEmail(),
          'c_code' => null,
          'mobile' => $phone ?? null,
          'source' => 'SignUP With Google',
          'source_url' => session('google_return_to') ?? NUll,
        ];


        $api_url = "https://www.crm.tutelagestudy.com/Api/signup";
        $client = curl_init($api_url);
        curl_setopt($client, CURLOPT_POST, true);
        curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($client);
        curl_close($client);
      }

      // Log the user in
      //Auth::login($user);
      session()->flash('smsg', 'Succesfully logged in');
      session()->put('studentLoggedIn', true);
      session()->put('student_id', $user->id);
      session()->put('student_name', $user->name);

      // Retrieve redirect parameters from session
      $return_to = session('google_return_to', 'student/profile');
      $paper_id = session('google_paper_id', null);

      // Optional: clear them from session
      session()->forget(['google_return_to', 'google_paper_id']);

      // Build final redirect URL
      $redirect_url = $return_to;
      if ($paper_id) {
        $redirect_url .= (str_contains($redirect_url, '?') ? '&' : '?') . 'paper_id=' . $paper_id;
      }

      return redirect($redirect_url);

      //return redirect('student/profile');
    } catch (\Exception $e) {
      // dd($e->getMessage(), $e->getTraceAsString());
      // \Log::error('Google Login Error: ' . $e->getMessage());
      // \Log::error($e->getTraceAsString());
      return redirect('sign-in')->with('emsg', 'Something went wrong. Please try again.');
      //return redirect('sign-in');
    }
  }
}
