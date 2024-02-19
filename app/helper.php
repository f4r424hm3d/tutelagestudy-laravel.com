<?php

define('TO_EMAIL', 'studytutelage@gmail.com');
define('TO_NAME', 'Team tutelage Study');
define('CC_EMAIL', 'amanahlawat1918@gmail.com');
define('CC_NAME', 'Aman Ahlawat');
define('BCC_EMAIL', 'farazahmad280@gmail.com');
define('BCC_NAME', 'Mohd Faraz');
// define('CC_EMAIL', '4hm3df4r42@gmail.com');
// define('CC_NAME', 'Tutelage Study');

if (!function_exists('printArray')) {
  function printArray($data)
  {
    echo "<pre>";
    print_r($data);
    echo "</pre>";
  }
}
if (!function_exists('getFormattedDate')) {
  function getFormattedDate($date, $formate)
  {
    return date($formate, strtotime($date));
  }
}
if (!function_exists('slugify')) {
  function slugify($text)
  {
    // Swap out Non "Letters" with a -
    $text = preg_replace('/[^\\pL\d]+/u', '-', $text);
    // Trim out extra -'s
    $text = trim($text, '-');
    // Convert letters that we have left to the closest ASCII representation
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
    // Make text lowercase
    $text = strtolower($text);
    // Strip out anything we haven't been able to convert
    $text = preg_replace('/[^-\w]+/', '', $text);
    return $text;
  }
}
if (!function_exists('dateDiff')) {
  function dateDiff($date1, $date2)
  {
    $date1_ts = strtotime($date1);
    $date2_ts = strtotime($date2);
    return $days_between = ceil(abs($date2_ts - $date1_ts) / 86400);
  }
}
if (!function_exists('aurl')) {
  function aurl($path = null)
  {
    $path = strtolower($path);
    if ($path != '') {
      return url('/admin/' . $path);
    } else {
      return url('/admin/');
    }
  }
}
if (!function_exists('uurl')) {
  function uurl($path = null)
  {
    $path = strtolower($path);
    if ($path != '') {
      return url('/user/' . $path);
    } else {
      return url('/user/');
    }
  }
}
if (!function_exists('replaceTag')) {
  function replaceTag($string, $array)
  {
    foreach ($array as $key => $value) {
      $string = $string == null ? null : str_replace('%' . $key . '%', $value, $string);
    }
    $string = trim(preg_replace('/\s+/', ' ', $string));
    $string = ucwords($string);
    return $string;
  }
}
if (!function_exists('ip_details')) {

  function ip_details($ip)
  {
    $json = file_get_contents("http://ipinfo.io/{$ip}");
    $details = json_decode($json);
    return $details;
  }
}

function cdnq($asset)
{
  return url($asset);
}
// global CDN link helper function
function cdn($asset)
{

  // Verify if KeyCDN URLs are present in the config file
  if (!Config::get('app.cdn'))
    return asset($asset);

  // Get file name incl extension and CDN URLs
  $cdns = Config::get('app.cdn');
  $assetName = basename($asset);

  // Remove query string
  $assetName = explode("?", $assetName);
  $assetName = $assetName[0];

  // Select the CDN URL based on the extension
  foreach ($cdns as $cdn => $types) {
    if (preg_match('/^.*\.(' . $types . ')$/i', $assetName))
      return cdnPath($cdn, $asset);
  }

  // In case of no match use the last in the array
  end($cdns);
  return cdnPath(key($cdns), $asset);
}

function cdnPath($cdn, $asset)
{
  return  "//" . rtrim($cdn, "/") . "/" . ltrim($asset, "/");
}
if (!function_exists('gr_site_key')) {
  function gr_site_key()
  {
    return "6LcXpncpAAAAAAk9gbC73-Ea2C6YGb-YLVz6fnqb";
  }
}
if (!function_exists('gr_secret_key')) {
  function gr_secret_key()
  {
    return "6LcXpncpAAAAAIvnMfK39FxixoVlNnnEMp5b1U_H";
  }
}
