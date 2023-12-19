<?php
require "../config/connect.php";

$response = array();
$sql = mysqli_query($con, "SELECT a.*, a.nama as namakategori
                                       FROM kategori a 
                                       order by id asc");

while ($a = mysqli_fetch_array($sql)) {
 # code...
 $kategoriid = $a['id'];
 $key['id'] = $kategoriid;
 $key['id'] = $a['id'];
 $key['namakategori'] = $a['namakategori'];

 $key['produk'] = array();

 $query = mysqli_query($con, "SELECT a.*, a.nama as namakategori
                              FROM produk a
                              left join kategori b on a.kategoriid = b.id
                              where kategoriid='$kategoriid'");
 while ($b = mysqli_fetch_array($query)) {
  # code...
  $key['produk'][] = array(
   'id' => $b['id'],
   'nama' => $b['nama'],
   'kategoriid' => $b['kategoriid'],
   'harga' => $b['harga'],
   'keterangan' => $b['keterangan'],
   'gambar' => $b['gambar'],
  );
 }
 array_push($response, $key);
}
echo json_encode($response);
