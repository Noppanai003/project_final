<?php
$db = new mysqli("localhost","root","","carcare3");
// $sql = ;
$rs = mysqli_query($db,"Select count(carcare3.notifications.id) as deadline From carcare3.notifications where DATEDIFF(deadline, startdate) = 363");
$day3 = mysqli_fetch_assoc($rs);
if ($day3['day3'] > 0) {
    $noti_day3 ='<span class="noti-alert"> '.$day3['day3'].'</span>';
} else {
    $noti_day3 = "";
}
?>
