<?php
require "../config/connect.php";

$response = array();
$sql = mysqli_query($con, "SELECT * FROM invoice  order by id desc");

while ($a = mysqli_fetch_array($sql)) {
 # code...
 $b['id'] = $a['id'];
 $b['invoice'] = $a['invoice'];
 $b['userid'] = $a['userid'];
 $b['mPembayaran'] = $a['mPembayaran'];
 $b['status'] = $a['status'];

 array_push($response, $b);
}

echo json_encode($response);