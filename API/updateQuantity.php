<?php

include "../config/connect.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
 #code...
 $response = array();
 $keranjangid = $_POST['keranjangid'];
 $userid = $_POST['userid'];
 $tipe = $_POST['tipe'];

 $cek = mysqli_query($con, "SELECT * FROM keranjang WHERE id='$keranjangid' and userid='$userid' ");
 $result = mysqli_fetch_array($cek);
 $qty = $result['qty'];

 if (isset($result)) {
  # code...
  if ($tipe == "tambah") {
   # code...
   $insert = "UPDATE keranjang set qty = qty + 1 WHERE id='$keranjangid' and userid='$userid' ";
   if (mysqli_query($con, $insert)) {
    # code...
    $response['value'] = 1;
    $response['message'] = "Add on cart";
    echo json_encode($response);
   } else {
    # code...
    $response['value'] = 2;
    $response['message'] = "Please contact our customer service";
    echo json_encode($response);
   }
  } else {
   # code...
   if ($qty == "1") {
    # code...
    $insert = "DELETE FROM keranjang WHERE id='$keranjangid' and userid='$userid' ";
    if (mysqli_query($con, $insert)) {
     # code...
     $response['value'] = 1;
     $response['message'] = "Add on cart";
     echo json_encode($response);
    } else {
     # code...
     $response['value'] = 2;
     $response['message'] = "Please contact our customer service";
     echo json_encode($response);
    }
   } else {
    # code...
    $insert = "UPDATE keranjang set qty = qty - 1 WHERE id='$keranjangid' and userid='$userid' ";
    if (mysqli_query($con, $insert)) {
     # code...
     $response['value'] = 1;
     $response['message'] = "Add on cart";
     echo json_encode($response);
    } else {
     # code...
     $response['value'] = 2;
     $response['message'] = "Please contact our customer service";
     echo json_encode($response);
    }
   }
  }
 } else {
  #code...
  $response['value'] = 2;
  $response['message'] = "Tidak dapat dilakukan";
  echo json_encode($response);
 }
}