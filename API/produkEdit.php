<?php
require "../config/connect.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
 #code...

 $nama = $_POST['nama'];
 $kategoriid = $_POST['kategoriid'];
 $harga = $_POST['harga'];
 $keterangan = $_POST['keterangan'];
 $tanggal = $_POST['tanggal'];
 $produkid = $_POST['produkid'];

 if (empty($_FILES)) {
  $gambar = $_POST['gambar'];
 } else {
  $gambar = date('dmYHis') . str_replace("", "", basename($_FILES['gambar']['name']));
  $imagePath = "../imageProduk/" . $gambar;
  move_uploaded_file($_FILES['gambar']['tmp_name'], $imagePath);
 }

 $insert = "UPDATE produk SET nama='$nama', kategoriid='$kategoriid', harga='$harga', keterangan='$keterangan',tanggal='$tanggal', gambar='$gambar' WHERE id='$produkid'";

 if (mysqli_query($con, $insert)) {
  # code...
  $response['value'] = 1;
  $response['message'] = "Produk berhasil diedit";
  echo json_encode($response);
 } else {
  # code...
  $response['value'] = 0;
  $response['message'] = "Produk gagal diedit";
  echo json_encode($response);
 }
}
