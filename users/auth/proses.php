<?php
   session_start();
   require_once("../../config/conn.php");
   $nm_proyek = $_POST['nm_proyek'];
   $userp = $_POST['userp'];
   $sql = "SELECT * FROM users WHERE password = '$userp'";
   $query = $conn->query($sql);
   $row = $query->fetch_assoc();
   if($query->num_rows == 0) {
     header('location:fail');
   } else {
     if($userp <> $row['password']) {
       header('location:fail');
     } else {
       $_SESSION['userp'] = $row['password'];
       header('location:/');
     }
   }
?>
