<?php
require "../config/connect.php";


$response = array();
$email = $_POST['email'];
$password = md5($_POST['password']);

$userid = $_POST['userid'];

$cek = mysqli_query($con, "SELECT * FROM user WHERE email='$email' AND id != '" . $userid . "' ");

$result = mysqli_fetch_array($cek);

if ($result > 0) {
 $response['value'] = 0;
 $response['message'] = "email already exists!";
 echo json_encode($response);
} else {
 $insert = "UPDATE user SET email = '$email',
                            password = '$password'
                            WHERE id='$userid'";
 if (mysqli_query($con, $insert)) {
  $response['value'] = 1;
  $response['message'] = "Successs";
  echo json_encode($response);
 } else {
  $response['value'] = 0;
  $response['message'] = "Failed";
  echo json_encode($response);
 }
}
