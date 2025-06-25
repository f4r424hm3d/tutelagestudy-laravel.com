<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Destination;
use App\Models\Country;
use App\Models\ExamType;

class ViewServiceProvider extends ServiceProvider
{
  public function boot()
  {
    View::composer('*', function ($view) {
      $preferredMbbsCountries = Destination::where(['status' => 1])->get();
      $destinationsInLimit = Destination::where(['status' => 1])->inRandomOrder()->limit(10)->get();
      $destinationsSF = Destination::where('status', 1)->get();
      $phonecodesSF = Country::select('phonecode', 'name')
        ->where('phonecode', '!=', '0')
        ->orderBy('phonecode', 'asc')
        ->get();
      $countriesSF = Country::orderBy('name', 'asc')->get();
      $examTypes = ExamType::where('exam_type', 'NEET UG')->get();
      $examTypesPg = ExamType::where('exam_type', 'NEET PG')->get();

      $view->with(compact('preferredMbbsCountries', 'destinationsInLimit', 'destinationsSF', 'phonecodesSF', 'countriesSF', 'examTypes', 'examTypesPg'));
    });
  }

  public function register()
  {
    //
  }
}
