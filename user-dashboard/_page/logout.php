<?php
session_start();
session_destroy();
header("location:../../");


// Access the cryptocurrency API
// $url = "https://api.coingecko.com/api/v3/simple/price?ids=bitcoin,ethereum,ripple&vs_currencies=usd";
// $get = file_get_contents($url);
// $prices = json_decode($get, true);

// Check if the API request was successful
// if ($prices && isset($prices['bitcoin']['usd']) && isset($prices['ethereum']['usd']) && isset($prices['ripple']['usd'])) {
//     $bitcoinPrice = $prices['bitcoin']['usd'];
//     $ethereumPrice = $prices['ethereum']['usd'];
//     $ripplePrice = $prices['ripple']['usd'];
// } else {
    // Default prices if API fails
  //  $bitcoinPrice = 00000; // Replace with your default price for Bitcoin
  //  $ethereumPrice = 0000; // Replace with your default price for Ethereum
   // $ripplePrice = 1.5;    // Replace with your default price for Ripple
//}
?>