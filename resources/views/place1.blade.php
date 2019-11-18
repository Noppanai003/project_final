<?php

use App\Post;
use Illuminate\Support\Facades\DB;

$post = DB::select('select * from posts');
$kilometers = [];

?>
@foreach($post as $posts)
<?php
$lat1 = 18.788917966602572;
$lon1 = 98.97104434543462;

$lat2 = $posts->lat;
$lon2 = $posts->long;

$theta = $lon1 - $lon2;
$miles = (sin(deg2rad($lat1)) * sin(deg2rad($lat2))) + (cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta)));
$miles = acos($miles);
$miles = rad2deg($miles);
$miles = $miles * 60 * 1.1515;
$feet = $miles * 5280;
$yards = $feet / 3;

$km = $miles * 1.609344;

array_push($kilometers, $km);

$array[] = array('id_shop' => $posts->id,'title' => $posts->title, 'kilometers' => $km);
$distance = array('id_shop' => $posts->id, 'title' => $posts->title, 'kilometers' => $km);
// 'title'=>$posts->title,
array_multisort(array_map(function ($element) {
	return $element['kilometers'];
}, $array), SORT_ASC, $array);
// echo  $array['id_shop'] .'<br>'. $array['title'] .'<br>'. $array['kilometers'].'<br>';
// echo  'id : ' . $distance['id_shop'] . '<br>' . ' ร้าน : ' . $distance['title'] . '<br>' . ' ระยะห่างจากตำแหน่งปัจจุบัน : ' . $distance['kilometers'] . '<br>';
?>

@endforeach
<?php
$i = 0;
// $columns = array_column($array, 'kilimeters');
//array_multisort($columns, SORT_ASC, $array);

array_multisort(array_map(function ($element) {
	return $element['kilometers'];
}, $array), SORT_ASC, $array);
// print_r($array).'<br>';
echo '<pre>';
print_r($array);
echo '</pre>';

// foreach($array as $arrays) {
// 	echo $arrays['0']['id_shop'];
// for ($i = 0; $i <= 4; $i++) {
// 	echo "The number is: $i <br>";

foreach ($array as $distance) {
	// echo $child['kilometers'] .'<br>';
	echo  'id : ' . $distance['id_shop'] . '<br>' . ' ร้าน : ' . $distance['title'] . '<br>' . ' ระยะห่างจากตำแหน่งปัจจุบัน : ' . $distance['kilometers'] . '<br>';
	// $i = $i + 1;
// }
}
//   }

// แสดงค่าในคอลัมภ์
// $arr = array(
// 	array("name" => $posts->id, "mob" => $km),
// 	array("name" => "rohit", "mob" => 34235),
// 	array("name" => "deepak", "mob" => 33534)
// );

// echo '<table border="2">';

// echo '<tr>';

// echo '<td align="center">Name:</td>';

// echo '<td align="center">MOb:</td>';

// foreach ($arr as $k) {

// 	echo '<tr>';

// 	foreach ($k as $v) {

// 		echo '<td align="center">' . $v . '</td>';
// 	}

// 	echo '</tr>';
// }

// echo '</table>';

// $columns =array_column($array,'id_shop');
// array_multisort($columns, SORT_ASC,$array);
?>