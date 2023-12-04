<?php
require "../config/connect.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
 #code...

 $produkid = $_POST['produkid'];
 $userid = $_POST['userid'];
 $qty = $_POST['qty'];
 $total = $_POST['total'];
 $keranjangid = $_POST['keranjangid'];

 $insert = "UPDATE keranjang SET produkid='$produkid',userid='$userid', qty= '$qty', total='$total' WHERE id='$keranjangid'";

 if (mysqli_query($con, $insert)) {
  # code...
  $response['value'] = 1;
  $response['message'] = "Keranjang berhasil diedit";
  echo json_encode($response);
 } else {
  # code...
  $response['value'] = 0;
  $response['message'] = "Keranjang gagal diedit";
  echo json_encode($response);
 }
}
