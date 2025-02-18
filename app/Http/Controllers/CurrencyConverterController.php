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
  public function getCurrencies_X()
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
  public function getCurrencies()
  {
    try {
      // Fetch supported currencies from ExchangeRate API (same as Google)
      $response = Http::get('https://api.exchangerate-api.com/v4/latest/USD');
      $data = $response->json();

      if (!isset($data['rates'])) {
        return response()->json(['error' => 'Failed to fetch currency list'], 500);
      }

      // Convert to an array of supported currencies
      $currencies = [];
      foreach ($data['rates'] as $code => $rate) {
        $currencies[] = [
          'code' => $code,
          'name' => $this->getCurrencyFullName($code)
        ];
      }

      return response()->json($currencies);
    } catch (\Exception $e) {
      return response()->json(['error' => 'Failed to fetch currencies'], 500);
    }
  }


  // Function to map currency codes to their full names
  private function getCurrencyFullName($code)
  {
    $currencyNames = [
      'USD' => 'United States Dollar',
      'EUR' => 'Euro',
      'GBP' => 'British Pound Sterling',
      'INR' => 'Indian Rupee',
      'JPY' => 'Japanese Yen',
      'AUD' => 'Australian Dollar',
      'CAD' => 'Canadian Dollar',
      'CNY' => 'Chinese Yuan',
      'SGD' => 'Singapore Dollar',
      'AED' => 'United Arab Emirates Dirham',
      'CHF' => 'Swiss Franc',
      'HKD' => 'Hong Kong Dollar',
      'NZD' => 'New Zealand Dollar',
      'ZAR' => 'South African Rand',
      'SEK' => 'Swedish Krona',
      'MXN' => 'Mexican Peso',
      'THB' => 'Thai Baht',
      'NOK' => 'Norwegian Krone',
      'BRL' => 'Brazilian Real',
      'RUB' => 'Russian Ruble',
      'KRW' => 'South Korean Won',
      'MYR' => 'Malaysian Ringgit',
      'ARS' => 'Argentine Peso',
      'DKK' => 'Danish Krone',
      'EGP' => 'Egyptian Pound',
      'IDR' => 'Indonesian Rupiah',
      'PHP' => 'Philippine Peso',
      'PLN' => 'Polish Zloty',
      'TRY' => 'Turkish Lira',
      'VND' => 'Vietnamese Dong',
      'ILS' => 'Israeli New Shekel',
      'SAR' => 'Saudi Riyal',
      'HUF' => 'Hungarian Forint',
      'TWD' => 'New Taiwan Dollar',
      'CZK' => 'Czech Koruna',
      'PKR' => 'Pakistani Rupee',
      'COP' => 'Colombian Peso',
      'BDT' => 'Bangladeshi Taka',
      'CLP' => 'Chilean Peso',
      'KES' => 'Kenyan Shilling',
      'NGN' => 'Nigerian Naira',
      'LKR' => 'Sri Lankan Rupee',
      'OMR' => 'Omani Rial',
      'QAR' => 'Qatari Rial',
      'BHD' => 'Bahraini Dinar',
      'MAD' => 'Moroccan Dirham',
      'JOD' => 'Jordanian Dinar',
      'KWD' => 'Kuwaiti Dinar',
      'RON' => 'Romanian Leu',
      'UAH' => 'Ukrainian Hryvnia',
      'BGN' => 'Bulgarian Lev',
      'HRK' => 'Croatian Kuna',
      'ISK' => 'Icelandic Krona',
      'LTL' => 'Lithuanian Litas',
      'LVL' => 'Latvian Lats',
      'MTL' => 'Maltese Lira',
      'MUR' => 'Mauritian Rupee',
      'NPR' => 'Nepalese Rupee',
      'SYP' => 'Syrian Pound',
      'GHS' => 'Ghanaian Cedi',
      'UGX' => 'Ugandan Shilling',
      'MZN' => 'Mozambican Metical',
      'BND' => 'Brunei Dollar',
      'XOF' => 'West African CFA Franc',
      'XAF' => 'Central African CFA Franc',
      'SCR' => 'Seychellois Rupee',
      'ETB' => 'Ethiopian Birr',
      'TZS' => 'Tanzanian Shilling',
      'BWP' => 'Botswana Pula',
      'ZMW' => 'Zambian Kwacha',
      'FJD' => 'Fijian Dollar',
      'GEL' => 'Georgian Lari',
      'MGA' => 'Malagasy Ariary',
      'BAM' => 'Bosnia and Herzegovina Convertible Mark',
      'MKD' => 'Macedonian Denar',
      'XCD' => 'East Caribbean Dollar',
      'BSD' => 'Bahamian Dollar',
      'HTG' => 'Haitian Gourde',
      'JMD' => 'Jamaican Dollar',
      'BBD' => 'Barbadian Dollar',
      'KYD' => 'Cayman Islands Dollar',
      'TTD' => 'Trinidad and Tobago Dollar',
      'NAD' => 'Namibian Dollar',
      'PAB' => 'Panamanian Balboa',
      'AWG' => 'Aruban Florin',
      'ANG' => 'Netherlands Antillean Guilder',
      'GIP' => 'Gibraltar Pound',
      'FKP' => 'Falkland Islands Pound',
      'SHP' => 'Saint Helena Pound',
      'GNF' => 'Guinean Franc',
      'LSL' => 'Lesotho Loti',
      'SLL' => 'Sierra Leonean Leone',
      'BIF' => 'Burundian Franc',
      'RWF' => 'Rwandan Franc',
      'MWK' => 'Malawian Kwacha',
      'SZL' => 'Swazi Lilangeni',
      'PGK' => 'Papua New Guinean Kina',
      'TOP' => 'Tongan Paʻanga',
      'VUV' => 'Vanuatu Vatu',
      'WST' => 'Samoan Tala',
      'KMF' => 'Comorian Franc',
      'STD' => 'São Tomé and Príncipe Dobra',
      'CDF' => 'Congolese Franc',
      'DJF' => 'Djiboutian Franc',
      'ERN' => 'Eritrean Nakfa',
      'KPW' => 'North Korean Won',
      'SSP' => 'South Sudanese Pound',
      'YER' => 'Yemeni Rial',
      'AOA' => 'Angolan Kwanza',
      'MOP' => 'Macanese Pataca',
      'TMT' => 'Turkmenistani Manat',
      'UZS' => 'Uzbekistani Som',
      'MMK' => 'Burmese Kyat',
      'KHR' => 'Cambodian Riel',
      'LAK' => 'Lao Kip',
      'KGS' => 'Kyrgyzstani Som',
      'TJS' => 'Tajikistani Somoni',
    ];

    return $currencyNames[$code] ?? $code;
  }
}
