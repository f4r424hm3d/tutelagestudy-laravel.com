<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentLoginFc extends Controller
{
  public function signUp(Request $request)
  {
    return view('front.sign-up');
  }
}
