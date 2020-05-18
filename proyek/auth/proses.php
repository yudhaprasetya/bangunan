<?php
   session_start();
   require_once("../../config/conn.php");
   $uname = $_POST['uname'];
   $password = $_POST['password'];
   $sql = "SELECT * FROM admin WHERE uname = '$uname'";
   $query = $conn->query($sql);
   $row = $query->fetch_assoc();
   if($query->num_rows == 0) {
     header('location:fail');
   } else {
     if($password <> $row['password']) {
       header('location:fail');
     } else {
       $_SESSION['uname'] = $row['uname'];
       header('location:../new');
     }
   }
?>
