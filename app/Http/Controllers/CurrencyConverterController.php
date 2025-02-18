<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CurrencyConverterService;
use Illuminate\Support\Facades\Http;

class CurrencyConverterController extends Controller
{
  protected $currencyService;

  public function __construct(CurrencyConverterService $currencyService)
  {
    $this->currencyService = $currencyService;
  }

  public function convert(Request $request)
  {
    $request->validate([
      'from' => 'required|string|size:3',
      'to' => 'required|string|size:3',
      'amount' => 'required|numeric|min:0.01'
    ]);

    $result = $this->currencyService->convert(
      strtoupper($request->from),
      strtoupper($request->to),
      $request->amount
    );

    return response()->json($result);
  }
  public function getCurrencies()
  {
    try {
      // Fetch data from Restcountries API
      $response = Http::get('https://restcountries.com/v3.1/all');
      $countries = $response->json();

      $currencies = [];

      // Extract currency codes and country names
      foreach ($countries as $country) {
        if (isset($country['currencies'])) {
          foreach ($country['currencies'] as $code => $currency) {
            $currencies[] = [
              'code' => $code,
              'name' => $currency['name'] ?? 'Unknown Currency',
              'country' => $country['name']['common'] ?? 'Unknown Country'
            ];
          }
        }
      }

      return response()->json($currencies);
    } catch (\Exception $e) {
      return response()->json(['error' => 'Failed to fetch currencies'], 500);
    }
  }
}
