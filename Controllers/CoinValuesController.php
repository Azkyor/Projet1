<?php

namespace Controllers;

use Entity\Crypto;

class CoinValuesController extends Controller
{
    public function index()
    {
$url = 'https://pro-api.coinmarketcap.com/v1/cryptocurrency/listings/latest';
$parameters = [
  'start' => '1',
  'limit' => '5',
  'convert' => 'EUR'
];

$headers = [
  'Accepts: application/json',
  'X-CMC_PRO_API_KEY: 43caf43b-7511-45dd-938f-108658cd50ce'
];
$qs = http_build_query($parameters); // query string encode the parameters
$request = "{$url}?{$qs}"; // create the request URL


$curl = curl_init(); // Get cURL resource
// Set cURL options
curl_setopt_array($curl, array(
  CURLOPT_URL => $request,            // set the request URL
  CURLOPT_HTTPHEADER => $headers,     // set the headers 
  CURLOPT_RETURNTRANSFER => 1         // ask for raw response instead of bool
));

$response = curl_exec($curl); // Send the request, save the response
echo'<pre>';
print_r(json_decode($response)); // print json decoded response
curl_close($curl); // Close request
echo $this->twig->render('userPage.twig', $response);
echo '</pre>';
    }
}
?>