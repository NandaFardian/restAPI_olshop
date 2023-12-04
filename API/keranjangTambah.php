<?php

require "../config/connect.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
 #code...
 $response = array();
 $produkid = $_POST['produkid'];
 $userid = $_POST['userid'];
 $qty = $_POST['qty'];
 $total = $_POST['total'];
 
 $insert = "INSERT INTO keranjang VALUE(NULL, '$produkid','$userid','$qty','$total')";

 if (mysqli_query($con, $insert)) {
  # code...
  $response['value'] = 1;
  $response['message'] = "keranjang berhasil ditambahkan";
  echo json_encode($response);
 } else {
  # code...
  $response['value'] = 0;
  $response['message'] = "keranjang gagal ditambahkan";
  echo json_encode($response);
 }
}
