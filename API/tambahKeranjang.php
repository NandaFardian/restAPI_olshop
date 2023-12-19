<?php

require "../config/connect.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
 #code...
 $response = array();
 $userid = $_POST['userid'];
 $produkid = $_POST['produkid'];

 $cek = mysqli_query($con, "SELECT * FROM keranjang WHERE userid='$userid' AND produkid='$produkid'");

 $result = mysqli_fetch_array($cek);

 if (isset($result)) {
  $response['value'] = 2;
  $response['message'] = "Produk sudah ada di keranjang";
  echo json_encode($response);
 } else {

  $cekProduk = mysqli_query($con, "SELECT * FROM produk WHERE id='$produkid'");
  $ab = mysqli_fetch_array($cekProduk);
  $harga = $ab['harga'];

  $insert = "INSERT INTO keranjang VALUE(NULL,'$produkid','$userid','1','$harga')";

  if (mysqli_query($con, $insert)) {
   $response['value'] = 1;
   $response['message'] = "Berhasil menambahkan produk kedalam keranjang";
   echo json_encode($response);
  } else {
   $response['value'] = 0;
   $response['message'] = "Gagal menambahkan produk kedalam keranjang";
   echo json_encode($response);
  }
 }
}