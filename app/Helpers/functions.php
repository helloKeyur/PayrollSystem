<?php
use App\{Merchant,Admin};

function generate_random_letters($length) {
    $random = '';
    for ($i = 0; $i < $length; $i++) {
        $random .= chr(rand(ord('a'), ord('z')));
    }
    return $random;
}

function getCurrency(){
	$jsonString = file_get_contents(base_path('resources/json/currency.json'));
	$data = json_decode($jsonString, true);
	return $data;
}

function clean($string) {
   return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}

?>