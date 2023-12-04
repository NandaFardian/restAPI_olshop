<?php

require "../config/connect.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
 #code...
 $response = array();
 $kategoriid = $_POST['kategoriid'];

 $insert = "DELETE FROM kategori WHERE id= '$kategoriid'";
 if (mysqli_query($con, $insert)) {
  # code...
  $response['value'] = 1;
  $response['message'] = "kategori berhasil dihapus";
  echo json_encode($response);
 } else {
  # code...
  $response['value'] = 0;
  $response['message'] = "kategori gagal dihapus";
  echo json_encode($response);
 }
}
