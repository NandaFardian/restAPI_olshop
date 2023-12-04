<?php
require "../config/connect.php";

$response = array();
$sql = mysqli_query($con, "SELECT * FROM kategori  order by id desc");

while ($a = mysqli_fetch_array($sql)) {
 # code...
 $b['id'] = $a['id'];
 $b['nama'] = $a['nama'];

 array_push($response, $b);
}

echo json_encode($response);
