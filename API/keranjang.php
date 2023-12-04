<?php
require "../config/connect.php";

$response = array();
$sql = mysqli_query($con, "SELECT * FROM keranjang  order by id desc");

while ($a = mysqli_fetch_array($sql)) {
 # code...
 $b['id'] = $a['id'];
 $b['produkid'] = $a['produkid'];
 $b['userid'] = $a['userid'];
 $b['qty'] = $a['qty'];
 $b['total'] = $a['total'];

 array_push($response, $b);
}

echo json_encode($response);
