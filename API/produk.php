<?php
require "../config/connect.php";

$response = array();
$sql = mysqli_query($con, "SELECT a.*, b.nama as namakategori
                            FROM produk a left join kategori b on a.kategoriid = b.id 
                            order by id desc");

while ($a = mysqli_fetch_array($sql)) {
 # code...
 $b['id'] = $a['id'];
 $b['nama'] = $a['nama'];
 $b['kategoriid'] = $a['kategoriid'];
 $b['harga'] = $a['harga'];
 $b['keterangan'] = $a['keterangan'];
 $b['tanggal'] = $a['tanggal'];
 $b['gambar'] = $a['gambar'];
 $b['namakategori'] = $a['namakategori'];

 array_push($response, $b);
}

echo json_encode($response);
