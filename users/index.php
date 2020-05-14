<?php
require_once("../config/conn.php");
session_start();
if(isset($_SESSION['username'])) {
  header('location:/index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Proyek Bangunan - Login</title>

  <style media="screen">
  <?php include '../style/login.css'; ?>
  </style>
</head>
<body>

  <header>
    <p>Proyek Bangunan - Login</p>
  </header>

  <div class="main">
    <select class="" name="">
      <option value="">Pilih Nama Proyek</option>
    </select>

    <input type="password" name="" value="" placeholder="PIN / Password">
    <input type="submit" name="" value="( Masuk )">
  </div>

</body>
</html>
