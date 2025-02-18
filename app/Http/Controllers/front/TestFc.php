<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TestFc extends Controller
{
  public function index(Request $request)
  {
    $from = 'USD';
    $to = 'INR';
    $amount = 100;
    //$url = "https://api.exchangerate.host/convert?from=$from&to=$to&amount=$amount";

    $apiKey = env('EXCHANGE_RATE_API_KEY');
    $url = "https://v6.exchangerate-api.com/v6/$apiKey/pair/$from/$to/$amount";

    return $response = Http::get($url);

    if ($response->successful()) {
      return $response->json()['result'] ?? null;
    }

    return null;
  }
}
