<?php
require "../config/connect.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
 # code...
 $response = array();

 $userid = $_POST['userid'];

 if (empty($_FILES)) {
  $image = $_POST['gambar'];
 } else {
  $image = date('dmYHis') . str_replace("", "", basename($_FILES['gambar']['name']));
  $imagePath = "../imageUser/" . $image;
  move_uploaded_file($_FILES['gambar']['tmp_name'], $imagePath);
 }

 $insert = "UPDATE user SET gambar = '$image' WHERE id='$userid'";
 if (mysqli_query($con, $insert)) {
  # code...
  $response['value'] = 1;
  $response['message'] = "Berhasil Edit Gambar Profil";
  echo json_encode($response);
 } else {
  # code...
  $response['value'] = 0;
  $response['message'] = "Gagal Edit Gambar Profil";
  echo json_encode($response);
 }
}
