<?php
use App\{Merchant,Admin};

/**
* @param number 125 in minit
* @return string 01:59
**/
function hoursandmins($time, $format = '%02d:%02d')
{
    if ($time < 1) {
        return;
    }
    $hours = floor($time / 60);
    $minutes = ($time % 60);
    return sprintf($format, $hours, $minutes);
}

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