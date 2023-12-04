<?php


//untuk memanggil coneksi database
require "../config/connect.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
 #code...
 //meresponse data dari post menjadi array
 $response = array();
 $email = $_POST['email'];
 $password = md5($_POST['password']);

 //mengecek email dan password
 $cek = "SELECT * FROM user WHERE email='$email' and password='$password'";
 $result = mysqli_fetch_array(mysqli_query($con, $cek));

 if (isset($result)) {
  # code...
  //membuat response jika benar
  $response['value'] = 1;
  $response['message'] = "Login Berhasil";
  $response['email'] = $result['email'];
  $response['id'] = $result['id'];
  $response['nama'] = $result['nama'];
  $response['level'] = $result['level'];
  echo json_encode($response);
 } else {
  # code...
  //membuat response jika salah
  $response['value'] = 0;
  $response['message'] = "Login Gagal";
  echo json_encode($response);
 }
}
