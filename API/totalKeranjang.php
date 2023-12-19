<?php
require "../config/connect.php";

$userid = $_GET['userid'];
$response = array();
$sql = mysqli_query($con, "SELECT count(*) total FROM `keranjang` WHERE userid='$userid'");

while ($a = mysqli_fetch_array($sql)) {
 # code...
 $b['total'] = $a['total'];

 array_push($response, $b);
}

echo json_encode($response);