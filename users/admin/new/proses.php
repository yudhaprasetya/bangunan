<?php

session_start();

require '../../../config/conn.php';

if (isset($_POST["new_adm"])) {
  $nama = $_POST['nama'];
  $no_ktp = $_POST['no_ktp'];
  $bod = $_POST['bod'];
  $uname = $_POST['uname'];
  $email = $_POST['email'];
  $alamat = $_POST['alamat'];
  $password = $_POST['password'];

  $now = date("Y-m-d H:i:s");

  $sql = "INSERT INTO admin (nama, no_ktp, bod, uname, email, alamat, password, tanggal) VALUES
  ('$nama', '$no_ktp', '$bod', '$uname', '$email', '$alamat', '$password', '$now')";

  if (mysqli_query($conn, $sql)) {
    // code...
    $_SESSION["message"]= "Create User admin Successfully";
    header("Location:../list/");
  } else {
    // code...
    header("Location:../new/");
  }
  mysqli_close($conn);
}
?>
