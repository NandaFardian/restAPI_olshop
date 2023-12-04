<?php

require "../config/connect.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
 #code...
 $response = array();
 $produkid = $_POST['produkid'];

 $insert = "DELETE FROM produk WHERE id= '$produkid'";
 if (mysqli_query($con, $insert)) {
  # code...
  $response['value'] = 1;
  $response['message'] = "produk berhasil dihapus";
  echo json_encode($response);
 } else {
  # code...
  $response['value'] = 0;
  $response['message'] = "produk gagal dihapus";
  echo json_encode($response);
 }
}
