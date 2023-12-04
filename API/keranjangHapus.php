<?php

require "../config/connect.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
 #code...
 $response = array();
 $keranjangid = $_POST['keranjangid'];

 $insert = "DELETE FROM keranjang WHERE id= '$keranjangid'";
 if (mysqli_query($con, $insert)) {
  # code...
  $response['value'] = 1;
  $response['message'] = "keranjang berhasil dihapus";
  echo json_encode($response);
 } else {
  # code...
  $response['value'] = 0;
  $response['message'] = "keranjang gagal dihapus";
  echo json_encode($response);
 }
}
