<?php

include "../config/connect.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
 #code...

 $response = array();
 $userid = $_POST['userid'];
 $invoice = date('Ymdhis');
 $total = $_POST['total'];


 $cekTmpCart = mysqli_query($con, "SELECT * FROM keranjang WHERE userid= '$userid'");

 $cek = mysqli_fetch_array($cekTmpCart);
 if (isset($cek)) {
  # code...
  $insertInvoice = "INSERT INTO invoice VALUE(NULL,'$invoice','$userid','COD','$total','Belum Upload Bukti Tranfer')";
  if (mysqli_query($con, $insertInvoice)) {
   # code...
   $TmpCart = mysqli_query($con, "SELECT * FROM keranjang WHERE userid= '$userid'");
   while ($a = mysqli_fetch_array($TmpCart)) {
    # code...
    $produkid = $a['produkid'];
    $qty = $a['qty'];
    $harga = $a['harga'];

    $insertDetail = mysqli_query($con, "INSERT INTO invoice_detail VALUE(NULL,'$invoice','$produkid','$qty','$harga')");
   }
   if ($insertDetail) $success = 1;

   $detele = mysqli_query($con, "DELETE FROM keranjang WHERE userid='$userid'");
   $response['value'] = 1;
   $response['message'] = "Checkout Berhasil";
   echo json_encode($response);
  } else {
   # code...
   $response['value'] = 0;
   $response['message'] = "Mohon coba beberapa saat lagi";
   echo json_encode($response);
  }
 } else {
  # code...
  $response['value'] = 0;
  $response['message'] = "Keranjang Kosong";
  echo json_encode($response);
}
}