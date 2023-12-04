<?php

require "../config/connect.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
 #code...
 $response = array();
 $invoiceid = $_POST['invoiceid'];
 $produkid = $_POST['produkid'];
 $qty = $_POST['qty'];
 $total = $_POST['total'];
 
 $insert = "INSERT INTO invoice_detail VALUE(NULL, '$invoiceid','$produkid','$qty','$total')";

 if (mysqli_query($con, $insert)) {
  # code...
  $response['value'] = 1;
  $response['message'] = "Invoice Detail berhasil ditambahkan";
  echo json_encode($response);
 } else {
  # code...
  $response['value'] = 0;
  $response['message'] = "Invoice Detail gagal ditambahkan";
  echo json_encode($response);
 }
}
