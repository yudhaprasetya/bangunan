<?php
   session_start();
   require_once("../config/conn.php");
   $username = $_POST['username'];
   $pass = $_POST['password'];
   $sql = "SELECT * FROM admin WHERE nama = '$username'";
   $query = $conn->query($sql);
   $hasil = $query->fetch_assoc();
   if($query->num_rows == 0) {
     header('location:login-fail.php');
   } else {
     if($pass <> $hasil['sandi']) {
       header('location:login-fail.php');
     } else {
       $_SESSION['username'] = $hasil['nama'];
       header('location:/index.php');
     }
   }
?>
