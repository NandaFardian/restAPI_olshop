<?php

require "../config/connect.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
 #code...
 $response = array();
 $invoice = $_POST['invoice'];
 $userid = $_POST['userid'];
 $mPembayaran = $_POST['mPembayaran'];
 $status = $_POST['status'];
 
 $insert = "INSERT INTO invoice VALUE(NULL, '$invoice','$userid','$mPembayaran','$status')";

 if (mysqli_query($con, $insert)) {
  # code...
  $response['value'] = 1;
  $response['message'] = "Invoice berhasil ditambahkan";
  echo json_encode($response);
 } else {
  # code...
  $response['value'] = 0;
  $response['message'] = "Invoice gagal ditambahkan";
  echo json_encode($response);
 }
}
