<?php

require "../config/connect.php";

$userid = $_GET['userid'];
$response = array();

$sql = mysqli_query($con, "SELECT sum(a.harga * a.qty) total FROM keranjang a
                        WHERE userid = '$userid'");
while ($a = mysqli_fetch_array($sql)) {
 # code...
 $b['total'] = $a['total'];

 array_push($response, $b);
}

echo json_encode($response);