<?php
require "../config/connect.php";

$response = array();
$sql = mysqli_query($con, "SELECT * FROM invoice_detail  order by id desc");

while ($a = mysqli_fetch_array($sql)) {
 # code...
 $b['id'] = $a['id'];
 $b['invoiceid'] = $a['invoiceid'];
 $b['produkid'] = $a['produkid'];
 $b['qty'] = $a['qty'];
 $b['total'] = $a['total'];

 array_push($response, $b);
}

echo json_encode($response);
