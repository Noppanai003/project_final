<?php

/* These are two points in New York City */
$point1 = array('lat' => 40.770623, 'long' => -73.964367);
$point2 = array('lat' => 40.758224, 'long' => -73.917404);

$distance = getDistanceBetweenPoints($point1['lat'], $point1['long'], $point2['lat'], $point2['long']);
foreach ($distance as $unit => $value) {
    echo $unit . ': ' . number_format($value, 4) . '<br />';
}

/**
 * Calculates the distance between two points, given their 
 * latitude and longitude, and returns an array of values 
 * of the most common distance units
 *
 * @param  {coord} $lat1 Latitude of the first point
 * @param  {coord} $lon1 Longitude of the first point
 * @param  {coord} $lat2 Latitude of the second point
 * @param  {coord} $lon2 Longitude of the second point
 * @return {array}       Array of values in many distance units
 */
function getDistanceBetweenPoints($lat1, $lon1, $lat2, $lon2)
{
    $theta = $lon1 - $lon2;
    $miles = (sin(deg2rad($lat1)) * sin(deg2rad($lat2))) + (cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta)));
    $miles = acos($miles);
    $miles = rad2deg($miles);
    $miles = $miles * 60 * 1.1515;
    $feet = $miles * 5280;
    $yards = $feet / 3;
    $kilometers = $miles * 1.609344;
    $meters = $kilometers * 1000;
    // return compact('miles','feet','yards','kilometers','meters');
    return compact('kilometers');
}
/*
Output:
miles: 2.6025
feet: 13,741.4350
yards: 4,580.4783
kilometers: 4.1884
meters: 4,188.3894
*/
