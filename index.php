<?php
session_start();
if(!isset($_SESSION['username'])) {
  header('location:/users/');
} else {
  $username = $_SESSION['username'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Proyek Bangunan</title>

  <style media="screen">
    <?php include 'style/master.css'; ?>
  </style>
</head>
<body>

  <header>
    <p>Proyek Bangunan</p>
  </header>

</body>
</html>
