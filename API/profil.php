<?php
require "../config/connect.php";

$userid = $_GET['userid'];
$response = array();
$sql = mysqli_query($con, "SELECT * FROM user WHERE id= '$userid'");

while ($a = mysqli_fetch_array($sql)) {
 # code...
 $b['id'] = $a['id'];
 $b['nama'] = $a['nama'];
 $b['email'] = $a['email'];
 $b['alamat'] = $a['alamat'];
 $b['noHp'] = $a['noHp'];
 $b['password'] = $a['password'];
 $b['level'] = $a['level'];
 $b['gambar'] = $a['gambar'];

 array_push($response, $b);
}

echo json_encode($response);
