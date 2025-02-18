<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class CurrencyConverterService
{
  protected $apiUrl;
  protected $apiKey;

  public function __construct()
  {
    $this->apiUrl = env('CURRENCY_API_URL');
    $this->apiKey = env('CURRENCY_API_KEY');
  }

  public function convert($from, $to, $amount)
  {
    try {
      // Make API request
      $response = Http::get($this->apiUrl, [
        'apikey' => $this->apiKey,
        'base_currency' => $from,
        'currencies' => $to
      ]);

      // Decode response
      $data = $response->json();

      if ($response->failed() || !isset($data['data'][$to])) {
        return [
          'success' => false,
          'message' => 'Failed to fetch exchange rate'
        ];
      }

      // Convert amount
      $exchangeRate = $data['data'][$to];
      $convertedAmount = $amount * $exchangeRate;

      return [
        'success' => true,
        'rate' => $exchangeRate,
        'converted_amount' => round($convertedAmount, 2)
      ];
    } catch (\Exception $e) {
      return [
        'success' => false,
        'message' => 'Error: ' . $e->getMessage()
      ];
    }
  }
}
