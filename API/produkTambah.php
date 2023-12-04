<?php

require "../config/connect.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
 #code...
 $response = array();
 $nama = $_POST['nama'];
 $kategoriid = $_POST['kategoriid'];
 $harga = $_POST['harga'];
 $keterangan =utf8_encode($_POST['keterangan']);
 $tanggal = $_POST['tanggal'];

 $gambar = date('dmYHis') . str_replace(" ", "", basename($_FILES['gambar']['name']));
 $imagePath = "../imageProduk/" . $gambar;
 move_uploaded_file($_FILES['gambar']['tmp_name'], $imagePath);
 
 $insert = "INSERT INTO produk VALUE(NULL, '$nama','$kategoriid','$harga','$keterangan','$tanggal','$gambar')";

 if (mysqli_query($con, $insert)) {
  # code...
  $response['value'] = 1;
  $response['message'] = "produk berhasil ditambahkan";
  echo json_encode($response);
 } else {
  # code...
  $response['value'] = 0;
  $response['message'] = "produk gagal ditambahkan";
  echo json_encode($response);
 }
}
