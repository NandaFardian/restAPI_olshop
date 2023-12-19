<?php
require "../config/connect.php";

$userid = $_GET['userid'];
$response = array();
$sql = mysqli_query($con, "SELECT a.*, b.nama as namaproduk
                           FROM keranjang a
                           left join produk b on a.produkid = b.id
                           WHERE a.userid= '$userid'
                           order by a.id desc");

while ($a = mysqli_fetch_array($sql)) {
 # code...
 $b['id'] = $a['id'];
 $b['userid'] = $a['userid'];
 $b['produkid'] = $a['produkid'];
 $b['qty'] = $a['qty'];
 $b['harga'] = $a['harga'];
 $b['namaproduk'] = $a['namaproduk'];

 array_push($response, $b);
}

echo json_encode($response);